<style type="text/css">
    label{
        margin-bottom: 0;
    }
</style>

<div style="
    border-bottom: 3px solid #000000;
    /*margin-bottom: 17px;*/
    font-size: 18px;
">
    Candidate C.V Profile
</div>


<div class="col-xs-12" style="border: 1px solid #bbb;border-top: none;padding: 5px;padding-left: 15px;">


@if (!is_null($data))

<div>
    <label style="font-weight: bold;text-decoration: underline;font-size: 14px;">
       General Information
    </label>
</div>


<div>
    <label style="font-weight: bold;color: #888;">
       Full Name
    </label>
</div>

<div>
    {{$data->name}}
</div>
<br />


<div>
    <label style="font-weight: bold;color: #888;">
       E-mail
    </label>
</div>

<div>
    {{$data->email}}
</div>



<div>
    <label style="font-weight: bold;color: #888;">
       Phone Number
    </label>
</div>

<div>
    {{$data->phone_number}}
</div>
<br />


<div>
    <label style="font-weight: bold;color: #888;">
       Address
    </label>
</div>

<div>
    {{$data->address}}
</div>
<br />


<div>
    <label style="font-weight: bold;color: #888;">
       Cover Letter
    </label>
</div>

<div>
    {{$data->cover_letter}}
</div>
<br />


<div>
    <label style="font-weight: bold;color: #888;">
       Age
    </label>
</div>

<div>
    {{$data->age}}
</div>
<br />


<div>
    <label style="font-weight: bold;color: #888;">
       Gender
    </label>
</div>

<div>
    {{$data->gender}}
</div>
<br />


<div>
    <label style="font-weight: bold;color: #888;">
       Marital Status
    </label>
</div>

<div>
    {{$data->marital_status}}
</div>

<br />

<div>
    <label style="font-weight: bold;color: #888;">
       Discipline
    </label>
</div>

<div>
    {{ !is_null($data->discipline)? $data->discipline->name : 'N/A'  }}
</div>
<br />


<div>
    <label style="font-weight: bold;text-decoration: underline;font-size: 14px;">
      Skills
    </label>
</div>
<div>
    <ol style="padding: none;list-style: inherit;padding-left: 15px;">
        @foreach ($skills as $skill)
          <li> {{ $skill->name }} </li>
        @endforeach
    </ol>
</div>





<div>
    <label style="font-weight: bold;text-decoration: underline;font-size: 14px;">
      Educations
    </label>
</div>
<div>
    <ol style="padding: none;list-style: inherit;padding-left: 15px;">
        @foreach ($data->candidateEducations as $candidateEducation)
          <li>{{$candidateEducation->education->name}} &nbsp;<span>( {{$candidateEducation->date_from}}  - {{$candidateEducation->date_to}} )</span></li>
        @endforeach
    </ol>
</div>



<div>
    <label style="font-weight: bold;text-decoration: underline;font-size: 14px;">
      Certifications
    </label>
</div>
<div>
    <ol style="padding: none;list-style: inherit;padding-left: 15px;">
        @foreach ($data->candidateCertifications as $candidateCertification)
          <li>{{$candidateCertification->certification->name}} &nbsp;<span>( {{$candidateCertification->date_certified}} )</span></li>
        @endforeach
    </ol>
</div>




<div>
    <label style="font-weight: bold;text-decoration: underline;font-size: 14px;">
      Work Experience
    </label>
</div>
<div>
    <ol style="padding: none;list-style: inherit;padding-left: 15px;">
        @foreach ($data->candidateWorkExperience as $candidateWorkExperience)
          <li>{{$candidateWorkExperience->company_name}} , {{$candidateWorkExperience->company_role}} &nbsp;<span>( {{$candidateWorkExperience->work_from}} )</span></li>
        @endforeach
    </ol>
</div>




<div align="right">

	<form method="post" action="{{ route('download.cv') }}">

     @csrf

     <input type="hidden" name="file_name" value="{{ $data->cv_upload }}" />

     <button type="submit" class="btn btn-sm btn-primary">Download Cv</button>

    </form>

    <label style="font-weight: bold;text-decoration: underline;font-size: 14px;">

    </label>
</div>


@else

  <div class="alert alert-warning" style="margin-top: 11px;">No Data Found for this individual.</div>

@endif





</div>




<div style="clear: both;">&nbsp;</div>

