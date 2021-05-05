@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card-header" style="background-color: #100a46;color: #fff;">Job Detail</div>



            <div class="col-md-12" style="border: 1px solid #ddd;border-top: 0;">

                    <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=5dd6a68d42f12900126c90cd&product=inline-share-buttons" async="async"></script>


               <div class="sharethis-inline-share-buttons" style="margin-top: 11px;margin-bottom: 13px;"></div>



               <div class="col-md-12">
                 <label style="font-weight: bold;">
                   Role
                 </label>
               </div>

               <div class="col-md-12">
                 {{$job->role}}
               </div>



               <div class="col-md-12">
                 <label style="font-weight: bold;">
                   Recruitment Level
                 </label>
               </div>

               <div class="col-md-12">
                <ol style="list-style: inherit;margin-left: 23px;">
                 @foreach ($job->jobRecruitmentTypes as $jobRecruitmentType)

                  <li>{{$jobRecruitmentType->recruitmentType->name}}</li>

                 @endforeach
                </ol>
               </div>



               <div class="col-md-12">
                 <label style="font-weight: bold;">
                   Description
                 </label>
               </div>

               <div class="col-md-12">
                 {!! $job->description !!}
               </div>


               {{--<div class="col-md-12">--}}
                 {{--<label style="font-weight: bold;">--}}
                   {{--Required Certifications--}}
                 {{--</label>--}}
               {{--</div>--}}

               {{--<div class="col-md-12">--}}
                {{--<ol style="list-style: inherit;margin-left: 23px;">--}}
                 {{--@foreach ($job->jobCertifications as $jobCertification)--}}

                  {{--<li>{{$jobCertification->certification->name}}</li>--}}

                 {{--@endforeach--}}
                {{--</ul>--}}
               {{--</div>--}}



               {{--<div class="col-md-12">--}}
                 {{--<label style="font-weight: bold;">--}}
                   {{--Required Skills--}}
                 {{--</label>--}}
               {{--</div>--}}

               {{--<div class="col-md-12">--}}
                {{--<ol style="list-style: inherit;margin-left: 23px;">--}}
                 {{--@foreach ($skills as $jobSkill)--}}

                  {{--<li>{{$jobSkill->name}}</li>--}}

                 {{--@endforeach--}}
                {{--</ul>--}}
               {{--</div>--}}



               {{--<div class="col-md-12">--}}
                 {{--<label style="font-weight: bold;">--}}
                   {{--Required Competencies--}}
                 {{--</label>--}}
               {{--</div>--}}

               {{--<div class="col-md-12">--}}
                {{--<ol style="list-style: inherit;margin-left: 23px;">--}}
                 {{--@foreach ($job->jobCompetencies as $jobCompetence)--}}

                  {{--<li>{{$jobCompetence->competence->name}}</li>--}}

                 {{--@endforeach--}}
                {{--</ul>--}}
               {{--</div>--}}


            </div>


<style>
    .apply-btn{
        font-size: 13px;
        margin-top: 5px;
        width: 11%;
        padding: 6px;border-radius: 0;
        background-color: #100a46;
        border: 1px solid #100a46;
    }
</style>


            <div class="col-md-12" align="right">

                @php

                    $valuePort = app()->make(\App\Packages\ValuePort::class);
                    $booleanPort = app()->make(\App\Packages\BooleanPort::class);

                    $jobId = $job->id;




                @endphp

                    @if (Auth::check() && $booleanPort->hasCv(Auth::user()->id))

                        @php
                          $candidateId = $valuePort->getCurrentCandidateId();
                        @endphp

                        @if (!$booleanPort->hasApplication($jobId,$candidateId,Auth::user()->id))

                         <form method="post" action="{{ route('process.action',['candidate-job-apply']) }}" style="display: inline;margin-top: 5px;">

                             @csrf

                             <input type="hidden" name="jb_candidate_id" value="{{ $candidateId }}" />

                             <input type="hidden" name="jb_job_id" value="{{ $job->id }}" />

                             <button class="btn btn-info btn-sm apply-btn" style="font-size: 13px;margin-top: 5px;">Apply</button>

                         </form>
                         @else

                         <div class="alert alert-info" style="margin-top: 11px;">
                          <p style="font-weight: bold;text-align: center;">You have applied for this job!</p>
                         </div>

                         @endif

                     @else
                       <a href="{{ route('app.get',['candidate-create']) }}" class="btn btn-info btn-sm apply-btn" style=";font-size: 13px;margin-top: 5px;"> Apply </a>
                     @endif
                        {{--route('candidate.create')--}}
                     {{-- <a href="" class="btn btn-warning btn-sm" style="font-size: 13px;margin-top: 5px;">Share</a> --}}

                     <a href="{{ route('home.main') }}" class="btn btn-primary btn-sm apply-btn" style="font-size: 13px;margin-top: 5px;">Back</a>
            </div>



        </div>
    </div>
</div>
@endsection
