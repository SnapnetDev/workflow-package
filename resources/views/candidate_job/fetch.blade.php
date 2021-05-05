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


                @foreach ($list as $job)


{{--                    @include('job.edit')--}}


                @endforeach


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
                            <select style="border: 1px solid #100a46;" data-value="{{ request()->prefSelection }}" name="prefSelection" id="prefSelection" class="form-control" onchange="location.href ='{{ route('app.get',['applicants']) }}?prefSelection=' + this.value;">
                                <option value="">-- Filter --</option>
                                @foreach ($filters['list'] as $k=>$v)

                                    <option value="{{ $v->id }}">{{ $v->name }}</option>

                                @endforeach
                            </select>
                        </div>



                        <div class="col-md-12">
                            Select Job Role
                        </div>
                        <div class="col-md-12">
                            <select data-value="{{ request()->jobId }}" name="" id="" class="form-control" onchange="location.href ='{{ route('app.get',['applicants']) }}?jobId=' + this.value;">
                                <option value="">-- Job Role --</option>
                                @foreach ($jobs['list'] as $k=>$v)

                                    <option value="{{ $v->id }}">{{ $v->role }}</option>

                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-12">
                            <button style="margin-top: 11px;background-color: #ff9636;color: #000;font-weight: bold;font-size: 15px;border: 0;" class="btn btn-success form-control">Filter</button>
                        </div>




                    </div>

                    <div class="col-md-9">


                        @include('candidate_job.candidate_profile_partial')

                        <table class="table table-striped">
                            <tr>
                                <th>
                                    <input type="checkbox" data-check-all>
                                </th>
                                <th>
                                    Applicant
                                </th>
                                <th>
                                    Role
                                </th>
                                <th>
                                    E-mail
                                </th>
                                <th>
                                    Phone
                                </th>
                                <th>
                                    Status
                                </th>
                                {{--<th>--}}
                                    {{--Created--}}
                                {{--</th>--}}
                                <th>

                                    <select id="on_board" style="display: inline-block;margin: 0;">
                                        <option value="">--Apply To Selected--</option>
                                        <option value="onboarded_to_hcm">On-board To HCM</option>
                                        <option value="shortisted_for_interview">Shortlist For Interview</option>
                                        <option value="confirmed">Confirm Application</option>
                                        <option value="reviewed">Cancel Application</option>
                                    </select>

                                </th>
                            </tr>
                            @php
                                $valuePort = app()->make(\App\Packages\ValuePort::class);
                            @endphp
                            @foreach ($list as $index=>$job)

                                @php
                                    $item = $job;

                                    $repoPort = app()->make(\App\Packages\RepoPort::class);
                                    $candidate = $repoPort->candidateGet($item->jb_candidate_id);

                        $skills = $repoPort->candidateSkillFetch($candidate['data']->id);
                         $educations = $repoPort->candidateEducationFetch($candidate['data']->id);
                         $workExperience = $repoPort->candidateWorkExperienceFetch($candidate['data']->id);

                         $discipline = $repoPort->disciplineGet($candidate['data']->jb_discipline_id);

                         $userId = $candidate['data']->user_id;
                         $myDocument = $repoPort->candidateDocumentFetch($userId);

                                @endphp


                                <script>
                                    var $obj = {};
                                    $obj['name'] = '{{ $valuePort->resolveRelation($job,'candidate','name') }}';
                                    $obj['role'] = '{{ $valuePort->resolveRelation($job,'job','role') }}';
                                    $obj['email'] = '{{ $valuePort->resolveRelation($job,'candidate','email') }}';
                                    $obj['gender'] = '{{ $candidate['data']->gender  }}';
                                    $obj['phone_number'] = '{{ $candidate['data']->phone_number }}';
                                    $obj['address'] = '{{ $candidate['data']->address }}';
                                    $obj['cover_letter'] = `{!! $candidate['data']->cover_letter  !!}`;
                                    $obj['profile_photo'] = '{{ asset('uploads/' . $candidate['data']->profile_photo) }}';
                                    $obj['cv_upload'] = '{{ asset('uploads/' . $candidate['data']->cv_upload) }}';
                                    $obj['discipline'] = '{{ (!is_null($discipline['data']))? $discipline['data']->name : 'N/A' }}';

                                    $obj['skills'] = {!! $skills['list'] !!};
                                    $obj['educations'] = {!! $educations['list'] !!};
                                    $obj['workExperiences'] = {!! $workExperience['list'] !!};
                                    $obj['myDocuments'] = {!! $myDocument['list'] !!};
                                    $obj['profile_video'] = '{{ asset('uploads/' . $valuePort->resolveRelation($job,'candidate','profile_video') ) }}';  //profile_video


                                    $list.push($obj);

                                 </script>

                                <tr>

                                    <td>
                                        <input data-candidate-id="{{ $job->jb_candidate_id }}" type="checkbox" data-check-id="{{ $job->id }}">
                                    </td>

                                    <td>
                                        {{ $valuePort->resolveRelation($job,'candidate','name') }}
                                    </td>

                                    <td>
                                        {{ $valuePort->resolveRelation($job,'job','role') }}

                                    </td>
                                    <td>
                                        {{ $valuePort->resolveRelation($job,'candidate','email') }}
                                    </td>
                                    <td>
                                        {{ $valuePort->resolveRelation($job,'candidate','phone_number') }}
                                    </td>
                                    <td style="
    width: 100px;
    display: inline-block;
    overflow-x: hidden;
    text-overflow: ellipsis;
">
                                        {{ (empty($job->status))? 'Pending' : $job->status }}
                                    </td>
                                    {{--<td>--}}
{{--                                        {{ $job->created_at }}--}}
                                    {{--</td>--}}
                                    <td>
                                        <div class="dropdown show">
                                            <button class="btn btn-success dropdown-toggle btn-sm pull-right" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                Actions
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" x-placement="bottom-start" style="position: absolute; transform: translate3d(-5px, 38px, 0px); top: 0px; left: 0px; will-change: transform;">

                                                <button data-c-select="{{ $index }}"  data-toggle="modal" data-target="#candidate-profile-preview" class="dropdown-item" data-backdrop="false">View Applicant</button>

                                            </div>
                                        </div>
                                    </td>
                                </tr>

                            @endforeach
                        </table>

                        <div class="col-md-12">
                            {{  $list->appends($_GET)->links()  }}
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

    <form method="post" id="frm-server" action="{{ route('process.action',['update-applicant-status']) }}">


        <input type="hidden" name="status" id="jb-status" />

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

    <script>


        (function($){
            $(function(){

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
                        $('#candidate-onboard-to-hcm').modal();
                        fetchCandidateDataForHCM();
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
                    $frmServer.append('<input type="hidden" data-check-idx="' + id + '" name="ids[]" value="' + id + '" />');
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

                    });
                });

                $('#on_board').attr('disabled','disabled');











            });
        })(jQuery);


    </script>




    <script>


        (function($){

            $(function(){

                var page = 0;
                var list_ = [];

                var descriptor = {

                    name: observable(''),
                    email: observable(''),
                    role: observable(''),
                    gender: observable(''),
                    phone_number: observable(''),
                    address: observable(''),
                    cover_letter: observable(''),
                    profile_photo: observable(''),
                    cv_upload: observable(''),
                    discipline: observable(''),
                    skills: observableArray([]),
                    educations: observableArray([]),
                    workExperiences: observableArray([]),
                    myDocuments: observableArray([]),
                    profile_video: observable(''),
                    page: observable('')


                };


                descriptor.page.listen(function(newVal){

                    $('[data-c-page]').html(newVal);

                });

                descriptor.name.listen(function(newVal){

                    $('[data-c-name]').html(newVal);

                });

                descriptor.email.listen(function(newVal){

                    $('[data-c-email]').html(newVal);

                });

                descriptor.role.listen(function(newVal){
                    $('[data-c-role]').html(newVal);
                });

                descriptor.gender.listen(function(newVal){
                    $('[data-c-gender]').html(newVal);
                });

                descriptor.phone_number.listen(function(newVal){
                    $('[data-c-phone_number]').html(newVal);
                });

                descriptor.address.listen(function(newVal){
                    $('[data-c-address]').html(newVal);
                });

                descriptor.cover_letter.listen(function(newVal){
                    $('[data-c-cover_letter]').html(newVal);
                });

                descriptor.profile_photo.listen(function(newVal){
                    $('[data-c-profile_photo]').attr('src',newVal);
                });


                descriptor.cv_upload.listen(function(newVal){
                    $('[data-c-cv_upload]').attr('href',newVal);
                });

                descriptor.discipline.listen(function (newVal) {
                    $('[data-c-discipline]').html(newVal);
                });

                descriptor.skills.listen(function loop(data,arr){
                   $('[data-c-skills]').append('<li>' + data.name + '</li>');
                },function garbage(){
                  $('[data-c-skills]').html('');
                });

                descriptor.educations.listen(function loop(data,arr){
                    $('[data-c-educations]').append('<li>' + data.name + ' / <b style="color: #000;">' + data.qualifications + '</b> ( <i>' + data.date_from + ' - ' + data.date_to + '</i> )</li>');
                },function garbage(){
                    $('[data-c-educations]').html('');
                });

                descriptor.workExperiences.listen(function loop(data,arr){
                    var templ = [];
                    templ.push('<li>');
                    templ.push(data.company_name + '/ <b style="color: #000;">' + data.company_role + '</b> / ( <i>' + data.work_from + ' - ' + data.work_to + '</i> )');
                    templ.push('<div>');
                    templ.push('<b style="color: #000;">Projects</b>');
                    templ.push('</div>');
                    templ.push('<div>');
                    templ.push(data.role_description);
                    templ.push('</div>');
                    templ.push('</li>');

                  $('[data-c-workExperiences]').append(templ.join(''));
                },function garbage(){
                   $('[data-c-workExperiences]').html('');
                });

                descriptor.myDocuments.listen(function loop(data,arr){

                    //asset('uploads/'
                    var templ = [];
                    templ.push('<li><div>' + data.name);
                    templ.push('<a href="{{ asset('uploads/') }}/' + data.file + '">');
                    templ.push('&nbsp;Download</a></div></li>');

                    $('[data-c-myDocuments]').append(templ.join(''));

                },function garbage(){
                    $('[data-c-myDocuments]').html('');
                });

                descriptor.profile_video.listen(function(vl){
                    $('[data-c-profile_video]').attr('src',vl);
                });


                function initPager(list){
                    list_ = list;
                }

                function prev(){
                    page-=1;
                    if (page < 0 ) page = 0;
                    updateObject();
                }

                function next(){
                    page+=1;
                    if (page >= list_.length) page = 0;
                    updateObject()
                }

                function selectIndex(index){
                    page = index;
                    updateObject();
                }

                function updateObject(){
                    var obj = list_[page];
                    descriptor.name.set(obj.name);
                    descriptor.email.set(obj.email);
                    descriptor.role.set(obj.role);
                    descriptor.gender.set(obj.gender);
                    descriptor.phone_number.set(obj.phone_number);
                    descriptor.address.set(obj.address);
                    descriptor.cover_letter.set(obj.cover_letter);
                    descriptor.profile_photo.set(obj.profile_photo);
                    descriptor.cv_upload.set(obj.cv_upload);
                    descriptor.skills.set(obj.skills);
                    descriptor.educations.set(obj.educations);
                    descriptor.workExperiences.set(obj.workExperiences);
                    descriptor.myDocuments.set(obj.myDocuments);
                    descriptor.discipline.set(obj.discipline);
                    // profile_video
                    descriptor.profile_video.set(obj.profile_video);
                    descriptor.page.set('#000' + (page + 1) );

                }


                window.next_ = next;
                window.prev_ = prev;

                initPager($list);


                $('[data-c-prev]').on('click',function(){
                    prev();
                });

                $('[data-c-next]').on('click',function(){
                    next();
                });

                $('[data-c-select]').on('click',function(){
                    var index_ = $(this).attr('data-c-select');
                    selectIndex(+index_);
                });


            });

        })(jQuery);


    </script>
@endsection