@include('reuse.modal_start',[
 'id'=>'candidate-onboard-to-hcm',
 'title'=>'Initiate Process'
])

<form action="{{ route('candidate_stage.store') }}" method="post" onsubmit="submitForm(this);return false;">
    @csrf
<div class="col-md-12">

    <div class="form-group">

        <label for="">
            Candidates
        </label>

    </div>

    <div class="form-group">

        <div class="col-md-12 form-control" style="height: auto;" id="hcm-candidates"></div>

    </div>

    <input type="hidden" name="job_id" />

    <div style="clear: both;">&nbsp;</div>

    <div class="form-control1">
        <button type="submit" class="btn btn-success form-control">Start</button>
    </div>


</div>
</form>

@include('reuse.modal_stop')

