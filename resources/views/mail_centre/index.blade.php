@extends('layouts.main')



@extends('layouts.logged_user')



@section('side-bar')





@endsection



@section('inner-content')





    <style>



        @media (min-width: 992px){

            .container {

                max-width: 1103px !important;

            }

        }



        select{

            margin-top: 7px;

            margin-bottom: 19px;

        }



        label{

            font-weight: bold;

        }



    </style>







    <div class="container">

        <div class="row justify-content-center">




            <div class="col-md-12">




                {{--start--}}



                <div>
                    {{-- The best athlete wants his opponent at his best. --}}


                    <h4>
                        Applicants Mail Centre
                    </h4>

                    <div class="row">

                        <div class="col-md-3" style="
    background-color: #888888;
    color: #fff;
    padding-top: 11px;
    letter-spacing: 2px;
    border-top: 4px solid #000;">

                            {{--{{ $filterSelect }}--}}

                            <div class="col-md-12">
                                <label for="">
                                    Filters
                                </label>
                                <select class="form-control" name="keyword-filter" id="">
                                    <option value="">--Select-</option>
                                    @foreach ($filters as $filter)
                                        <option value="{{ $filter->id }}">{{ $filter->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-12">
                                <label for="">
                                    Job Role
                                </label>
                                <select class="form-control" name="role-filter" id="">
                                    <option value="">--Select--</option>
                                    @foreach ($jobRoles as $jobRole)
                                        <option value="{{ $jobRole->id }}">{{ $jobRole->role }}</option>
                                    @endforeach
                                </select>
                            </div>



                            <div class="col-md-12">
                                <label for="">
                                    Folder/Groups
                                </label>
                                <select class="form-control" name="folder-filter" id="">
                                    <option value="">--Select--</option>
                                    @foreach ($folders as $folder)
                                        <option value="{{ $folder->id }}">{{ $folder->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>

                        <div class="col-md-6" style="
    background-color: #eee;
    padding: 11px;">

                            <div class="col-md-12">
                                <h5 style="text-transform: uppercase;">
                                    {{--subject--}}
                                </h5>
                            </div>


                            <form method="post" >


                                <div class="col-md-12">
                                    <label for="">To : </label>
                                    <input type="text" class="form-control" name="to" />
                                </div>

                                <div class="col-md-12">
                                    <label for="">Subject : </label>
                                    <input type="text" class="form-control" name="subject" />
                                </div>

                                <div class="col-md-12">
                                    <label for="">Message : </label>
                                    <textarea class="form-control" id="" cols="30" rows="10" name="message"></textarea>
                                </div>

                                <div>
                                    &nbsp;
                                </div>

                                <div class="col-md-12">
                                    <button id="send-mail" type="button" class="btn btn-primary">Send</button>
                                </div>

                            </form>



                        </div>

                        <div class="col-md-3" style="height: 300px;overflow-y: scroll;">

                            <h5><u style="color: #000;">Selected E-mails</u></h5>
                            <div id="check-list">
                                {{--@foreach ($applicants as $k=>$item)--}}

                                    {{--<div>--}}
                                        {{--<input type="checkbox" name="applicants" value="{{ $item->id }}" checked   />--}}
                                        {{--&nbsp;{{ $item->email }}--}}
                                    {{--</div>--}}

                                {{--@endforeach--}}
                            </div>

                        </div>




                    </div>


                </div>



                {{--stop--}}



            </div>



        </div>


        <div class="col-lg-12" style="margin: 11.4%;"></div>

    </div>


    {{--hidden form here--}}



@endsection




@section('script')


    <script>


        (function($){
            $(function(){


                function GetMailList($type,$id){

                    //applicant_by_role
                    $.ajax({
                        url:'{{ route('mail.centre.query',['']) }}/' + $type + '?id=' + $id,
                        method:'GET',
                        success:function(response){

                           $('#check-list').html('');

                           response.list.forEach((v,k)=>{

                               var r = `<div>
                                       <input type="checkbox" data-check-list="${v.email}" checked  />
                                       &nbsp;${v.email}
                                       </div>`;

                               var $el = $(r);

                               $el.on('click',function(){
                                   GetToList();
                               });

                               $('#check-list').append($el);

                           });

                           GetToList();

                        }
                    });

                }

                function clearAll(){
                    $('[name=to]').val('');
                    $('#check-list').html('');
                }


                function GetToList(){

                    var $el = $('[name=to]');
                    var r = [];
                    $('[data-check-list]').each(function(){
                       if ($(this).is(':checked')){
                           r.push($(this).attr('data-check-list'));
                       }
                    });

                    $el.val(r.join(','));

                }


                function sendMail(){

                    var to = $('[name=to]').val();
                    var subject = $('[name=subject]').val();
                    var message = $('[name=message]').val();

                    toastr.info('Sending Mail ... ');

                    $.ajax({
                        url:'{{ route('mail.centre.send.mail') }}',
                        type:'POST',
                        data:{
                            _token:'{{ csrf_token() }}',
                            to:to,
                            subject:subject,
                            message:message
                        },
                        success:function(response){

                            toastr.success(response.message);

                        }
                    });

                }


                $('[name="role-filter"]').on('change',function(){

                    if ($(this).val()){
                        GetMailList('applicant_by_role',$(this).val());
                        return;
                    }
                    clearAll();

                    // alert($(this).val());

                });


                $('[name="keyword-filter"]').on('change',function(){
                    if ($(this).val()) {
                        GetMailList('filter_keywords', $(this).val());
                        return;
                    }
                    clearAll();

                });


                $('[name="folder-filter"]').on('change',function(){

                    // filter_folder
                    if ($(this).val()){
                        GetMailList('filter_folder',$(this).val());
                        return;
                    }
                    clearAll();

                });


                $('#send-mail').on('click',function(){
                    sendMail();
                    return false;
                });








            });
        })(jQuery);


    </script>



@endsection