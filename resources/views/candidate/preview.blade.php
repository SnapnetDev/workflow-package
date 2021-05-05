@extends('layouts.main')

@extends('layouts.logged_user')

@section('body-style')
    background-color: #eee;
@endsection


@section('inner-content')

    <div style="
    border-bottom: 3px solid #8c76f7;
    margin-bottom: 17px;
    font-size: 18px;
">
        Preview Your C.V {!! (session()->has('jobName'))? '<br />(Currently applying for <b style="color: #000;font-size: 18px;">' . session()->get('jobName') . '</b>)' : '' !!}
    </div>



    <style type="text/css">
        .cv label{
            font-weight: bold;
        }
    </style>





    <script>

        JQ.add(function(){


            //$("#wizard").steps();


        });

    </script>


    <div class="card" style="color: #1b1515;">
        @csrf
        @method('PATCH')
        <input type="hidden" name="id" value="{{ $data->id }}"/>

        <div class="cv" style="padding: 10px;">

            <!-- jb_recruitment_type_id -->


            <!-- jb_competency_id -->


            <!-- years_of_experience -->
            @include('notifications.message')


            <div id="wizard">

                <h1 class="cv-title">Preview</h1>
                <div>

                    <div class="row">

                        <div class="col-md-6">
                            <div>
                                <label class="cv-label">Full Name</label>
                            </div>
                            <div>
                                {{$data->name}}
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div>
                                <label class="cv-label">E-mail</label>
                            </div>
                            <div>
                                {{$data->email}}
                            </div>
                        </div>

                    </div>



                    <div class="row">

                        <div class="col-md-6">
                            <div>
                                <label class="cv-label">Age</label>
                            </div>
                            <div>
                                {{$data->age}}
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div>
                                <label class="cv-label">Gender</label>
                            </div>
                            <div>
                                {{$data->gender}}
                            </div>
                        </div>

                    </div>




                    <div class="row">

                        <div class="col-md-6">
                            <div>
                                <label class="cv-label">Discipline</label>
                            </div>
                            <div>
                                {{ (!is_null($data->discipline))? $data->discipline->name : 'N/A' }}
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div>
                                <label class="cv-label">Phone Number</label>
                            </div>
                            <div>
                                {{$data->phone_number}}
                            </div>
                        </div>

                    </div>



                    <div class="row">

                        <div class="col-md-6">
                            <div>
                                <label class="cv-label">Address</label>
                            </div>
                            <div>
                                {{$data->address}}
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div>
                                <label class="cv-label">Cover Letter</label>
                            </div>
                            <div>
                                {!! $data->cover_letter !!}
                            </div>
                        </div>

                    </div>

                    {{-- <div>
                        <label>Marital Status</label>
                    </div>
                    <div>
                        <select class="form-control" name="marital_status" data-value="{{$data->marital_status}}">
                            <option value="">--Select Marital Status--</option>
                            <option value="single">Single</option>
                            <option value="married">Married</option>
                        </select>
                    </div> --}}

                </div>


                <div>

                    <div align="right">
                        <a href="{{ route('app.get',['candidate-update']) }}?id={{ $data->id }}" style="margin-top: 17px;" class="btn btn-warning cv-button">Modify Profile</a>

                        @php
                          $valuePort = app()->make(\App\Packages\ValuePort::class);
                        @endphp
                        <form method="post" style="display: inline-block;" action="{{ route('process.action',['candidate-job-apply']) }}">
                            @csrf
                            <input type="hidden" name="jb_candidate_id" value="{{ $data->id }}" />
                            <input type="hidden" name="jb_job_id" value="{{ $valuePort->getCurrentJobId() }}" />

                            <button style="margin-top: 17px;width: 198px;" class="btn btn-success cv-button">Proceed To Apply</button>

                        </form>

                    </div>

                </div>

            </div>



        </div>
    </div>


    <div style="clear: both;">&nbsp;</div>


@endsection
