{{--'applicantUser'=>$applicantUser,--}}
{{--'candidateObj'=>$candidateObj,--}}
{{--'jobObj'=>$jobObj--}}
<b>Dear SiteAdmin</b>,<br />
A Job request has been made on your platform with the below details: <br />
<div>
    <b>Applicant:</b>
    <hr />
    <div>
        <img src="{{ asset('uploads/' . $candidateObj->profile_photo) }}" alt="" style="max-width: 19%;border-radius: 15px;border: 1px solid #ddd;" />
    </div>
    <div>
        {{ $candidateObj->name }}
    </div>

    <div>
        {{ $candidateObj->email }}
    </div>
    <div>
        {{ $candidateObj->phone }}
    </div>
    <div>
        {{ $candidateObj->Gender }}
    </div>

</div>



<div>
    <b>Job Role:</b>
    <hr />
    <div>
        <div>
            {{ $jobObj->role }}
        </div>
        <div>
            {!! $jobObj->description !!}
        </div>
    </div>
</div>