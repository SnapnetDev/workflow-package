<div>
    <b data-pull-record="{{ $candidate->getPrevId() }}" style="cursor: pointer;font-size: 38px;position: fixed;left: 16%;top: 50%;color: #fff;z-index: 9000;" class="fas fa-arrow-left"></b>

    <b data-pull-record="{{ $candidate->getNextId() }}" style="cursor: pointer;font-size: 38px;position: fixed;left: 79%;top: 50%;color: #fff;z-index: 9000;" class="fas fa-arrow-right"></b>
</div>


<div class="modal-header" style="background-color: #ff9636;">
    {{--#ff9636--}}
    <div>
        <b style="color: #000;" data-progress>Candidate Profile</b>
    </div>
    <button style="color: #000;" type="button" class="close" data-dismiss="modal">&times;</button>
    <!--         <h4 class="modal-title">Modal Header</h4> -->
</div>
<div class="modal-body">
    <!--         <p>Some text in the modal.</p> -->



    <div class="row">
        <div class="col-md-12">
            <div>
                <h3>Bio</h3>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12" align="right">
            <b data-c-page style="color: #000;font-size: 15px;"></b>
        </div>
    </div>


    <div class="row">



        <div class="col-md-4">
            <div class="col-md-12" style="text-align: left;padding: 0;height: 278px;overflow-y: hidden;">

                @if (!empty($candidate->profile_photo))
                  <img data-c-profile_photo src="{{ asset('uploads/' . $candidate->profile_photo) }}" style="width: 100%;border-radius: 13px;/* margin-top: 1px; */margin-bottom: 6px;" alt="" />
                @else
                  <b>No Photo Uploaded</b>
                @endif

            </div>
        </div>
        <div class="col-md-8">


            <div>
                <label>Name : </label>
                <span data-c-name>
                                          {{ $candidate->name }}
                                    </span>
            </div>

            <div>
                <label>E-mail : </label>
                <span data-c-email>
                                        {{ $candidate->email }}
                                    </span>
            </div>


            <div>
                <label>Phone Number : </label>
                <span data-c-phone_number>
                                        {{ $candidate->phone_number }}
                                    </span>
            </div>



            <div>
                <label>Address : </label>
                <span data-c-address>
                                        {{ $candidate->address }}
                                    </span>
            </div>



            <div>
                <label>Gender : </label>
                <span data-c-gender>
                                        {{ $candidate->gender }}
                                    </span>
            </div>




            <div>
                <label>
                    Discipline :
                </label>
                <span data-c-discipline>
                                     {{ $candidate->getDiscipline() }}
                                    </span>
            </div>

            <div>
                <a data-c-cv_upload href="{{ asset('uploads/' . $candidate->cv_upload) }}">Download CV</a>
            </div>


        </div>



        <div class="col-md-12" style="border-bottom: 1px solid #ddd;margin-top: 7px;margin-bottom: 11px;"></div>

        <div class="col-md-6">


            <div>
                <h3>
                    Cover Letter
                </h3>
                <div data-c-cover_letter style="overflow-y: scroll;height: 244px;">
                    {!! $candidate->cover_letter !!}
                </div>
            </div>

        </div>

        <div class="col-md-6" >

            <div>
                <h3>
                    Introductory Video
                </h3>
            </div>

            <div class="col-md-12" style="padding: 0;">
               @if (!empty($candidate->profile_video))
                  <video controls style="width: 100%;height: 200px;" src="{{ asset('uploads/' . $candidate->profile_video) }}" data-c-profile_video></video>
               @else
                   <b>No Profile Video Uplaoded.</b>
               @endif
            </div>


        </div>




    </div>


    <div class="row">




        <div class="form-group col-md-12" style="border-top: 1px solid #ddd;margin-top: 8px;padding-top: 8px;">


            <div>
                <h3>Corporate Profile</h3>
            </div>

            <div>

            </div>



            <div style="font-weight: bold">

                Skill

            </div>

            <div>

                <ul data-c-skills>
                    @foreach ($candidate->candidateSkills as $skill)
                        <li>{{ $skill->name }}</li>
                    @endforeach
                </ul>

            </div>




            <div style="font-weight: bold">

                Education

            </div>

            <div>

                <ul data-c-educations>
                    @foreach ($candidate->candidateEducations as $education)
                        <li>{{ $education->name }} / <b style="color: #000;">{{ $education->qualifications }}</b> ( <i>{{ $education->date_from }} - {{ $education->date_to }}</i> )</li>
                    @endforeach
                </ul>

            </div>


            <div style="font-weight: bold">

                Work Experience

            </div>

            <div>

                <ul data-c-workExperiences>
                    @foreach ($candidate->candidateWorkExperience as $experience)
                        <li>{{ $experience->company_name }}/ <b style="color: #000;">{{ $experience->company_role }}</b> / ( <i>{{ $experience->work_from }} - {{ $experience->work_to }}</i> )
                            <div><b style="color: #000;">Projects</b></div>
                            <div>{!! $experience->role_description !!}</div>
                        </li>
                    @endforeach
                </ul>

            </div>



            <div style="font-weight: bold">

                My Documents

            </div>

            <div>

                <ul data-c-myDocuments>
                    @foreach ($candidate->user->documents as $document)
                        <li><div>{{ $document->name }}<a href="{{ asset('uploads/' .  $document->file ) }}">&nbsp;Download</a></div></li>
                    @endforeach
                </ul>

            </div>



        </div>


    </div>


    {{--<div class="row">--}}
    {{--<div class="col-md-12">--}}
    {{--<h2>No Candidate profile created yet!</h2>--}}
    {{--</div>--}}
    {{--</div>--}}

    {{--end--}}
</div>
