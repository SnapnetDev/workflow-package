<script id="stage-manage" type="text/html">

    <span>


      {{--table-listing modal--}}

        @include('reuse.modal_start',[
          "id"=>"stage-manage-list",
          "title"=>"Manage Stages",
          "size"=>"lg"
        ])

        <div class="col-md-12">

          <div class="col-md-12" align="right" style="margin-bottom: 11px;">
              <a href="#" data-toggle="modal" data-target="#stage-manage-create" class="btn btn-sm btn-success">Review Stage</a>
          </div>

          <div class="col-md-12" align="right" style="margin-bottom: 11px;">

              <div class="row"  id="filter-container">

                  <div class="col-md-3">
                      <select name="job_select" class="form-control" id="">
                          <option value="">--Select Job--</option>
                          @foreach ($jobs as $job)
                              <option value="{{ $job->id }}">{{ $job->role }}</option>
                          @endforeach
                      </select>
                  </div>


                  <div class="col-md-3">
                      <select name="stage_select" class="form-control" id="">
                          <option value="">--Select Stage--</option>
                          @foreach ($stages as $stage)
                              <option value="{{ $stage->id }}">{{ $stage->stage_name }}</option>
                          @endforeach
                      </select>
                  </div>


              </div>

          </div>

          <table class="table-striped table">

              <tr>

                  <th>
                      <input type="checkbox" id="check-all">
                  </th>

                  <th>
                      E-mail
                  </th>
                  <th>
                      Name
                  </th>
                  <th>
                      Stage
                  </th>
                  <th>
                      Progress
                  </th>
                  {{--<th>--}}
                      {{--Actions--}}
                  {{--</th>--}}

              </tr>

          </table>


      </div>

        @include('reuse.modal_stop')



        {{--create modal--}}
        @include('reuse.modal_start',[
          "id"=>"stage-manage-create",
          "title"=>"Stage Review",
          "size"=>"md"
        ])

        <form action="" method="post">

          @csrf

            <div class="col-md-12">

                <input type="hidden" name="stage_id" value="" />

          <div class="col-md-12" style="margin-top: 11px;">
              <label for="">
                  Comment
              </label>
              <textarea name="comment" class="form-control" id="" cols="30" rows="5"></textarea>
              {{--<input type="text" class="form-control" name="stage_name" />--}}
          </div>

          <div class="col-md-12" style="margin-top: 11px;">
                <div class="form-control" style="height: auto;" id="candidate-list"></div>
          </div>



          <div class="col-md-12" style="margin-top: 11px;">
              <label for="">
                  &nbsp;
              </label>
              <button class="btn btn-sm btn-success">Progress Stage</button>
          </div>

      </div>

      </form>

        @include('reuse.modal_stop')



        {{--edit modal--}}

        {{--create modal--}}
        @include('reuse.modal_start',[
          "id"=>"stage-manage-edit",
          "title"=>"Review Edit",
          "size"=>"md"
        ])

        <form action="" method="post">

          @csrf

            @method('PUT')

            <div class="col-md-12">

                  <div class="col-md-12" style="margin-top: 11px;">
                      <label for="">
                          Comment
                      </label>
                      <textarea name="comment" class="form-control" id="" cols="30" rows="10"></textarea>
                      {{--<input type="text" class="form-control" name="stage_name" />--}}
                  </div>


                  <div class="col-md-12" style="margin-top: 11px;">
                      <label for="">
                          &nbsp;
                      </label>
                      <button class="btn btn-sm btn-success">Update Review</button>
                  </div>

           </div>

      </form>

        @include('reuse.modal_stop')





  </span>


</script>


<script>
    (function($){


        function checkAll(){
            $('[candidate_job_id]').each(function(){
               $(this).prop('checked',true);
            });
        }

        function controlReviewButton(){
            //data-target="#stage-manage-create"
            var isChecked = false;
            $('[candidate_job_id]').each(function(){
                if ($(this).is(':checked')){
                   isChecked = true;
                }
            });
            if (isChecked){
                $('[data-target="#stage-manage-create"]').show();
                return;
            }
            $('[data-target="#stage-manage-create"]').hide();
        }


        function unCheckAll(){
            $('[candidate_job_id]').each(function(){
                $(this).prop('checked',false);
            });
        }

        function getCheckedList(){

            var r = [];

            $('[candidate_job_id]').each(function(){
                if ($(this).is(':checked')){
                    r.push(`
                      <input type="hidden" name="candidate_job_id[]" value="${$(this).attr('candidate_job_id')}" />
                      <span>${$(this).attr('email')}</span>
                      <input type="hidden" name="candidate_stage_id[]" value="${$(this).attr('candidate_stage_id')}" />
                    `);
                }
            });

            $('#candidate-list').html(r.join(','));

            controlReviewButton();

        }


        var $stagemanage = $('#stage-manage').mv2m();

        $stagemanage.hook('indexUrl',function($query){

            // console.log($query);

            return `{{ route('candidate_stage.index') }}${$query}`;

        }).hook('filter_container',function ($el) {

            return $el.find('#filter-container');

        }).hook('before.filter',function ($el,$fetch) {

            $el.find('[name=job_select],[name=stage_select]').on('change',function(){

                $fetch();

            });

        }).hook('filter',function ($el) {

            var r = [];

            if ($el.find('[name=job_select]').val()){

                r.push(`job_select=${$el.find('[name=job_select]').val()}`);

            }


            if ($el.find('[name=stage_select]').val()){

                r.push(`stage_select=${$el.find('[name=stage_select]').val()}`);

            }


            return r.join('&');

        }).hook('container',function ($el) {

            return 'table';

        }).hook('closeModal',function ($el) {

            return $el.find('#stage-manage-create,#stage-manage-edit').find('[data-dismiss="modal"]').trigger('click');

        }).hook('storeUrl',function () {

            return '{{ route('stage.store') }}';

        }).hook('createModal',function ($el) {

            return $el.find('#stage-manage-create');

        }).hook('editModal',function ($el) {

            return $el.find('#stage-manage-edit');

        }).hook('storeUrl',function (){

            return '{{ route('progress.stage') }}';

        }).hook('updateUrl',function(data){

            return `{{ route('stage.update',['']) }}/${data.id}`;

        }).hook('list.loaded',function ($el) {


            $el.find('[candidate_job_id]').each(function(){
                $(this).on('click',function () {
                    getCheckedList();
                });
            });

            //stage_id
            $('[name=stage_select]').on('change',function () {

                $el.find('[name=stage_id]').val($(this).val());

                // alert(9);

                // stage_select
            });

            $el.find('#check-all').on('click',function () {

                if ($(this).is(':checked')){

                    checkAll();
                    getCheckedList();
                    return;

                }

                unCheckAll();
                getCheckedList();
                return;

            });

            getCheckedList();


        }).hook('onAppendRow',function(data){

            return `<tr>

                  <td>
                    <input type="checkbox" candidate_stage_id="${data.id}" email="${data.candidate_job.candidate.email}" candidate_job_id="${data.candidate_job_id}"/>
                  </td>

                  <td>
                      ${data.candidate_job.candidate.email}
                  </td>
                  <td>
                      ${data.candidate_job.candidate.name}
                  </td>
                  <td>
                      ${data.stage.stage_name}
                  </td>
                  <td>
                      ${data.stage.percentage}%
                  </td>

        </tr>`;

        // <td>
        //     <a href="#" id="edit" class="btn btn-sm btn-info">Edit</a>
        //         </td>


        }).hook('onSelectRow',function(findGlobal,findLocal,data,showEditForm,submitForm){



            findLocal('#edit').on('click',function () {

                showEditForm();

            });


            findLocal('#delete-btn').on('click',function (){

                if (confirm('Do you want to confirm this action')){
                    submitForm(findLocal('#delete').get(0));
                }

            });


        }).mount(function($el){

            $('body').append($el);

        }).init().fetch();



    })(jQuery);
</script>