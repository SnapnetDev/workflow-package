<script>
    (function($){

        //MVVM (Mv2M)
        class Mv2M{


            constructor($this){
                this.listeners = {};
                this.loaded = false;
                this.$el = $($this.html());
            }

            init(){

                if (!this.loaded){
                    this.$headerText = this.$el.find(this.hook('container')()).html();
                    this.$container = this.$el.find(this.hook('container')());
                    this.loaded = true;
                }
                // this.fetch();
                console.log(this);

                var $createModal = this.hook('createModal')(this.$el);

                this.hook('onFillForm')($createModal,{});

                this.initFormSubmission();

                var $filterContainer = this.hook('filter_container')(this.$el);
                this.hook('before.filter')($filterContainer,()=>{
                    this.fetch();
                });
                this.hook('init')(this.$el);

                return this;

            }



            hook(evt,cb){
                if (cb){
                    this.listeners[evt] = cb;
                    return this;
                }

                if (this.listeners[evt]){
                    return this.listeners[evt];
                }

                return function(){return '';};
            }


            initFormSubmission(){

                var $createModal = this.hook('createModal')(this.$el);
                var $frm = $createModal.find('form');
                $frm.attr('action',this.hook('storeUrl')());
                var $editModal = this.hook('editModal')(this.$el);

                this.handleFormSubmissionEvent($frm);

                $frm = $editModal.find('form');

                this.handleFormSubmissionEvent($frm);

            }

            handleFormSubmissionEvent($frm){

                $frm.off('submit');
                $frm.on('submit',(evt)=>{
                    this.submitForm($frm.get(0));
                    return false;
                });
            }


            fetch(){

                this.hook('closeModal')(this.$el);

                //before.indexUrl
                this.hook('before.indexUrl')(this.$el);

                var $filterContainer = this.hook('filter_container')(this.$el);
                var filter = this.hook('filter')($filterContainer);
                var indexUrl = this.hook('indexUrl')('?' + filter);

                // + '?' + filter
                this.callApi(indexUrl).then(res=>res.json()).then((res)=>{

                    if (res.error){
                        toastr.error(res.message);
                        return;
                    }

                    var list = res;

                    if (res.list){
                        list = res.list;
                    }

                    var $container = this.$container; // this.hook('container')();
                    $container.html('');

                    console.log(this.$headerText);

                    var $header = $(this.$headerText);

                    $container.append($header);

                    list.forEach((v,k)=>{

                        var $el = $(this.hook('onAppendRow')(v));
                        this.hook('onSelectRow')((sel)=>{ //find global
                            //$el
                            return this.$el.find(sel);

                        },(sel)=>{

                            return $el.find(sel);

                        },v,()=>{ //showEditForm
                            var $editModal = this.hook('editModal')(this.$el);

                            var $frm = $editModal.find('form');
                            $frm.attr('action',this.hook('updateUrl')(v));
                            // var $editModal = this.hook('editModal')(this.$el);

                            this.fillForm($editModal,v);
                            $editModal.modal();
                            this.hook('onFillForm')($editModal,v);
                        },($frm)=>{ //submitForm
                            this.submitForm($frm);
                        });

                        $container.append($el);

                    });
                    this.hook('list.loaded')(this.$el,list);

                });

                return this;
            }

            fillForm($el,data){

                // console.log($el,data);

                // window.gData = data;

                var that = this;


                for (var i in data){

                    (function(k,v){


                        if (data.hasOwnProperty(i)){

                            // console.log(i,data[i]);

                            if ($el.find(`[name=${i}]`).is('input') || $el.find(`[name=${i}]`).is('select') ||
                                $el.find(`[name=${i}]`).is('textarea')){
                                $el.find(`[name=${i}]`).val('');
                                console.log(i,v);
                                $el.find(`[name=${i}]`).val(v);
                                // console.log('found');
                                return;
                            }
                            $el.find(`[name=${i}]`).html('');
                            $el.find(`[name=${i}]`).html(v);
                            // console.log('html',i,data[i]);

                        }


                    })(i,data[i]);

                    // ((k,v)=>{
                    //     console.log(k,v);
                    // })(i,data[i]);

                    // console.log(i,data[i]);

                }

            }

            callApi(url){
                return fetch(url,{
                    method:'GET'
                });
            }

            submitForm($form){

                // console.log($form);
                // alert('0.0' + JSON.stringify($form));

                fetch($form.action,{
                    method:$form.method,
                    body:(new FormData($form))
                }).then((res)=>res.json()).then((res)=>{

                    if (res.error){
                        toastr.error(res.message);
                        return;
                    }

                    toastr.success(res.message);

                    this.fetch();

                    return;

                }).catch((res)=>{
                    toastr.error('Something went wrong!');
                    return;
                });

                // alert('1.0');

                return this;
            }

            el(){
                return this.$el;
            }

            mount(cb){
                cb(this.el());
                return this;
            }


        }



        $.fn.mv2m = function(){

            return new Mv2M($(this));

        };



    })(jQuery);




</script>