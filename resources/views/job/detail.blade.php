@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card-header" style="background-color: #100a46;color: #fff;">Job Detail</div>



            <div class="col-md-12" style="border: 1px solid #ddd;border-top: 0;">

               <div class="col-md-12" align="right">
                @if (Auth::user()->hasUploadedCv())
                 @if (!$job->hasCandidate(Auth::user()->candidate()->id))
                 <form method="post" action="/jobs/{{$job->id}}/apply" style="display: inline-block;margin-top: 5px;">
                   @csrf
                   <button class="btn btn-info btn-sm" style="font-size: 13px;">Apply</button>
                 </form>
                 @else
                  <p style="font-weight: bold;color: red;">You have already applied for this job!</p>
                 @endif
                 @else
                   <a href="/my-cv/{{Auth::user()->id}}" class="btn btn-info btn-sm" style="font-size: 13px;">Please upload your C.V before proceeding</a>
                 @endif
               </div>

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


               <div class="col-md-12">
                 <label style="font-weight: bold;">
                   Required Certifications
                 </label>
               </div>

               <div class="col-md-12">
                <ol style="list-style: inherit;margin-left: 23px;">
                 @foreach ($job->jobCertifications as $jobCertification)

                  <li>{{$jobCertification->certification->name}}</li>

                 @endforeach
                </ol>
               </div>



               <div class="col-md-12">
                 <label style="font-weight: bold;">
                   Required Skills
                 </label>
               </div>

               <div class="col-md-12">
                <ol style="list-style: inherit;margin-left: 23px;">
                 @foreach ($job->jobSkills as $jobSkill)

                  <li>{{$jobSkill->skill->name}}</li>

                 @endforeach
                </ol>
               </div>



               <div class="col-md-12">
                 <label style="font-weight: bold;">
                   Required Competencies.
                 </label>
               </div>

               <div class="col-md-12">
                <ol style="list-style: inherit;margin-left: 23px;">
                 @foreach ($job->jobCompetencies as $jobCompetence)

                  <li>{{$jobCompetence->competence->name}}</li>

                 @endforeach
                </ol>
               </div>


            </div>




        </div>
    </div>
</div>
@endsection
