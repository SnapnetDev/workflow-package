@extends('layouts.main')

@extends('layouts.logged_user')

@section('side-bar')


@endsection

@section('inner-content')

    <script>

        var $list = [];

    </script>

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


    @include('candidate_job.hcm_onboard')

    @include('applicants.folders')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

            <!-- <div class="card-header">{{ __('Change Password') }}</div> -->

                <div style="
    border-bottom: 3px solid #000000;
    margin-bottom: 17px;
    font-size: 18px;
">
                    Applicants
                </div>



{{--                @include('job.create')--}}


                <div class="row">

                    <div class="col-md-3" style="
    background-color: #eee;
    padding-top: 16px;
    padding-bottom: 25px;
">



                        <div class="col-md-12">
                            Select Filters
                        </div>
                        <div class="col-md-12">
                            <select style="border: 1px solid #100a46;" data-value="{{ $filter }}" name="prefSelection" id="filter" class="form-control" onchange="location.href ='{{ route('app.get',['applicants']) }}?prefSelection=' + this.value;">
                                <option value="">-- Filter --</option>
                                @foreach ($filters as $k=>$v)

                                    <option value="{{ $v->id }}">{{ $v->name }}</option>

                                @endforeach
                            </select>
                        </div>



                        <div class="col-md-12">
                            Select Job Role
                        </div>
                        <div class="col-md-12">
                            <select data-value="{{ $job }}" name="" id="job" class="form-control">
                                <option value="">-- Job Role --</option>
                                @foreach ($roles as $k=>$v)

                                    <option value="{{ $v->id }}">{{ $v->role }}</option>

                                @endforeach
                            </select>
                        </div>


                        <div class="col-md-12">
                            Select Folder
                        </div>
                        <div class="col-md-12">
                            <select data-value="{{ $folder_s }}"  name="folder" id="folder_s" class="form-control">
                                <option value="">-- Folder --</option>
                                @foreach ($folders as $k=>$v)

                                    <option value="{{ $v->id }}">{{ $v->name }}</option>

                                @endforeach
                            </select>
                        </div>



                        <div class="col-md-12">
                            <button style="margin-top: 11px;background-color: #ff9636;color: #000;font-weight: bold;font-size: 15px;border: 0;" class="btn btn-success form-control">Filter</button>
                        </div>



                    </div>

                    <div class="col-md-9">

                        @foreach ($candidates as $index=>$candidate)
                           @include('applicants.candidate_profile_partial')
                        @endforeach

                        <table class="table table-striped">
                            <tr>
                                <th>
                                    <input type="checkbox" data-check-all>
                                </th>
                                <th>
                                    Applicant
                                </th>
                                <th>
                                    E-mail
                                </th>
                                <th>
                                    Phone
                                </th>
                                @if (isset($jobObject))
                                <th>
                                    Role
                                </th>
                                <th>
                                    Status
                                </th>
                                @endif
                                {{--<th>--}}
                                    {{--Created--}}
                                {{--</th>--}}
                                <th>

                                @if (isset($jobObject))


                                    <select data-job-id="{{ $jobObject->id }}" id="on_board" style="display: inline-block;margin: 0;">

                                        <option value=""> -- Apply To Selected -- </option>

                                        <option value="onboarded_to_hcm">Begin Process</option>

                                        {{--<option value="shortisted_for_interview">Shortlist For Interview</option>--}}
                                        {{--<option value="confirmed">Confirm Application</option>--}}
                                        {{--<option value="reviewed">Cancel Application</option>--}}
                                    </select>

                               @endif

                                </th>
                            </tr>
                            @foreach ($candidates as $index=>$candidate)

                                @php
                                    $item = $candidate;
                                @endphp


                                <tr>

                                    <td>
                                        <input data-candidate-email="{{ $candidate->email }}" data-candidate-id="{{ $candidate->id }}" type="checkbox" data-check-id="{{ $candidate->id }}">
                                    </td>

                                    <td>
                                        {{ $candidate->name }}
                                    </td>

                                    <td>
                                        {{ $candidate->email }}
                                    </td>
                                    <td>
                                        {{ $candidate->phone_number }}
                                    </td>
                                    @if (isset($jobObject))
                                    <td>
                                        {{ $jobObject->role }}
                                    </td>
                                    <td style="
    width: 100px;
    display: inline-block;
    overflow-x: hidden;
    text-overflow: ellipsis;
">
                                        {{ $candidate->getJobStatus($jobObject->id) }}
                                    </td>
                                    @endif
                                    {{--<td>--}}
{{--                                        {{ $job->created_at }}--}}
                                    {{--</td>--}}
                                    <td>
                                        <div class="dropdown show">
                                            <button class="btn btn-success dropdown-toggle btn-sm pull-right" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                Actions
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" x-placement="bottom-start" style="position: absolute; transform: translate3d(-5px, 38px, 0px); top: 0px; left: 0px; will-change: transform;">

                                                <button data-c-select="{{ $index }}"  data-toggle="modal" data-target="#candidate-profile-preview{{ $candidate->id }}" class="dropdown-item" data-backdrop="false">View Applicant</button>

                                                <button onclick="window.candidateId={{ $candidate->id }};document.getElementById('candidate-id').value = {{ $candidate->id }};" data-toggle="modal" data-target="#folders" class="dropdown-item" data-backdrop="false">Assign To Folder</button>

                                                @if (request()->filled('folder_s'))

                                                    <form action="{{ route('app.exec',['update-candidate-folder']) }}" method="post" style="display: inline-block;">
                                                        @csrf
                                                        <input type="hidden" name="remove" value="1" />
                                                        <input type="hidden" name="candidate" value="{{ $candidate->id }}" />
                                                        <input type="hidden" name="folder" value="{{ request('folder_s') }}">
                                                        <button type="submit" class="dropdown-item" data-backdrop="false">
                                                           <span style="color: red;">
                                                            Remove From Folder </span>
                                                            (<b style="color: #000;"> {{ $folder_s_obj->name }} </b>)
                                                        </button>
                                                    </form>

                                                @endif



                                            </div>
                                        </div>
                                    </td>
                                </tr>

                            @endforeach
                        </table>

                        <div class="col-md-12">
                            {{  $candidates->appends($_GET)->links()  }}
                        </div>

                        <div class="col-md-12">
{{--&nbsp;--}}
                        </div>



                    </div>


                </div>






            </div>
        </div>

        <div class="col-lg-12" style="margin: 11.4%;"></div>
    </div>


    {{--hidden form here--}}

    <form method="post" id="frm-server" action="{{ route('app.exec',['update-candidate-job-status-collection']) }}">



        <input type="hidden" name="status" id="jb-status" />

        @if (isset($jobObject))
            <input type="hidden" name="jobId" value="{{ $jobObject->id }}" />
        @endif

        @csrf

    </form>

    <!-- dialog -->
    <div class="modal fade modal-3d-slit show" id="profileView" aria-labelledby="exampleModalTitle" role="dialog" style="display: none; padding-right: 17px;">

        <div class="modal-dialog modal-lg">


            <!-- [end] -->
        </div>
    </div>
    <!-- dialog -->


@endsection


@section('script')

    @include('applicants.js')

    <script>



        function submitForm($form){

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

                // this.fetch();

                return;

            }).catch((res)=>{
                toastr.error('Something went wrong!');
                return;
            });

            // alert('1.0');


        }


        (function($){
            $(function(){

                function getCandidateList(){
                    var r = [];
                    $('[data-candidate-id]').each(function () {

                        // hcm-candidates

                        if ($(this).is(':checked')){

                            r.push(`<span>
                           ${$(this).attr('data-candidate-email')}
                           <input type="hidden" name="candidates[]" value="${$(this).attr('data-candidate-id')}" />
                        </span>`);

                        }



                    });

                    $('#hcm-candidates').html(r.join(''));

                }

                $('[data-candidate-id]').each(function() {

                    $(this).on('click',function(){

                       getCandidateList();

                    });

                });





                //queryString
                var queryStringJs = {!! json_encode($queryStringJs) !!};

                function getQueryString(){
                    var r = '?';
                    for (var i in queryStringJs){
                        if (queryStringJs.hasOwnProperty(i)){
                            r+=i + '=' + queryStringJs[i] + '&';
                        }
                    }
                    return r;
                }

                function handleFilterChange($el,vl){
                   $el.on('change',function(){
                       queryStringJs[vl] = $(this).val();
                       var r = getQueryString();
                       // for (var i in queryStringJs){
                       //     if (queryStringJs.hasOwnProperty(i)){
                       //         r+=i + '=' + queryStringJs[i] + '&';
                       //     }
                       // }
                       location.href = '{{ route('app.run',['get-applicants']) }}' + r;
                   });
                }

                handleFilterChange($('#job'),'job');
                handleFilterChange($('#filter'),'filter');
                handleFilterChange($('#folder_s'),'folder_s');


                function loadCursor(){

                    $('[data-applicant-content]').each(function(){

                        var $el = $(this);
                        var $progress = $el.find('[data-progress]');


                        $(this).find('[data-pull-record]').each(function(){

                            var id = $(this).attr('data-pull-record');

                            $(this).on('click',function(){

                                if (id == ''){
                                    toastr.error('No more records to navigate to.');
                                    return;
                                }

                                $progress.html('Loading ...');
                                $progress.css('color','white');


                                $.ajax({
                                    url:'{{ route('app.run',['get-candidate-view']) }}' + getQueryString() + '&cid=' + id,
                                    type:'GET',
                                    success:function(response){
                                        $('[data-applicant-content]').each(function(){
                                            $el.html(response);
                                            loadCursor();
                                            $progress.html('Candidate Profile');
                                            $progress.css('color','black');
                                        });
                                    }
                                });


                                return false;

                            });


                        });


                    });


                }

                loadCursor();


                // alert('jq loaded ... 123 ... ');
                // frm-server
                //on_board


                function fetchCandidateDataForHCM(){
                    $.ajax({
                        url:'{{ route('ajax.get.candidate',['']) }}/' + current_candidate(),
                        type:'GET',
                        success:function(response){
                            // alert(JSON.stringify(response));
                            $('#hcm-email').html(response.email);
                        }
                    });
                }

                var $frmServer = $('#frm-server');
                var $jbStatus = $('#jb-status');

                window.triggerFormSubmitForApplicantStatus = function(){
                    $frmServer.trigger('submit');
                };


                $('#on_board').on('change',function(){

                    if ($(this).val() == ''){
                        return;
                    }

                    if ($(this).val() == 'onboarded_to_hcm'){

                        $jbStatus.val('onboarded_to_hcm');

                    }else if ($(this).val() == 'shortisted_for_interview'){
                        $jbStatus.val('shortisted_for_interview');
                    }else if ($(this).val() == 'reviewed'){
                        $jbStatus.val('reviewed');
                    }else if ($(this).val() == 'confirmed'){
                        $jbStatus.val('confirmed');
                    }

                    if ($(this).val() == 'onboarded_to_hcm'){


                        $('#candidate-onboard-to-hcm').find('[name=job_id]').val($(this).attr('data-job-id'));

                        $('#candidate-onboard-to-hcm').modal();
                        // fetchCandidateDataForHCM();
                        $(this).val('');
                    }else{
                        $frmServer.trigger('submit');
                    }


                });

                function groupCheckIsValid(){
                    return $('[data-check-idx]').length > 0;
                }

                function removeGroupCheck(id){
                    $('[data-check-idx=' + id + ']').remove();
                }

                function addGroupCheck(id){
                    $frmServer.append('<input type="hidden" data-check-idx="' + id + '" name="candidateIds[]" value="' + id + '" />');
                }


                $('[data-check-id]').each(function(){
                    $(this).on('click',function(){

                        var id =  $(this).data('check-id');

                        window.checkedCandidates = window.checkedCandidates || [];
                        window.current_candidate = function(){
                           if (checkedCandidates.length){
                              return checkedCandidates[checkedCandidates.length - 1];
                           }else{
                               return null;
                           }
                        };

                       if ($(this).is(':checked')){
                           // alert('checked');
                           window.checkedCandidates.push($(this).attr('data-candidate-id'));
                           // window.current_candidate = $(this).attr('data-candidate-id');
                           // window.prev_current_candidate = $(this).attr('data-candidate-id');
                           addGroupCheck(id);
                       }else{
                           // alert('un-checked');
                           window.checkedCandidates.pop();
                           removeGroupCheck(id);
                       }

                       if (groupCheckIsValid()){
                           $('#on_board').removeAttr('disabled');
                       }else{
                           $('#on_board').attr('disabled','disabled');
                       }

                        // populateCandidates();

                    });
                });

                $('#on_board').attr('disabled','disabled');

            });

        })(jQuery);

        //data-candidate-id



    </script>




    <script>



    </script>
@endsection