  <div class="col-lg-12 sidebar" style="padding: 0;">
              <div class="single-slidebar" style="
    padding-top: 5px;
    position: relative;
    top: 4px;
    left: 29px;
    /*height: 417px;*/
    /*overflow-y: scroll;*/
    z-index: 964;
">
                <h4 style="text-decoration: underline;">Filter Applicants </h4>
                <ul class="cat-list">
<!-- skills -->
          <div class="row">
            <div class="form-group" style="width:100%"  >
              <label class="control-label sm-select-label">Job Skill</label>
              
              <select class=" form-control" id="skill" multiple="multiple">
                <option value="">-Select Skill-</option>
                @foreach ($jobSkills as $jobSkill)
                   <option value="{{$jobSkill->skill->id}}">{{$jobSkill->skill->name}}</option>
                @endforeach
              </select>
            </div>
          </div>






<!-- certifications -->
          <div class="row">
            <div class="form-group" style="width:100%"  >
              <label class="control-label sm-select-label">Job Certification</label>
              <select class=" form-control" id="certification" multiple="multiple">
                <option value="">-Select Certification-</option>
                @foreach ($jobCertifications as $jobCertification)
                   <option value="{{$jobCertification->certification->id}}">{{$jobCertification->certification->name}}</option>
                @endforeach
              </select>
            </div>
          </div>







<!-- competences -->
<!--           <div class="row">
            <div class="form-group" style="width:100%"  >
              <label class="control-label sm-select-label">Job Competence</label>
              <select class=" form-control" id="competence">
                <option value="">-Select Competence-</option>
                @foreach ($jobCompetencies as $jobCompetence)
                   <option value="{{$jobCompetence->competence->id}}">{{$jobCompetence->competence->name}}</option>
                @endforeach
              </select>
            </div>
          </div>
 -->


<!-- jobRecruitmentTypes -->
<!--           <div class="row">
            <div class="form-group" style="width:100%"  >
              <label class="control-label sm-select-label">Recruitment Level</label>
              <select class=" form-control" id="recruitment">
                <option value="">-Select Recruitment Level-</option>
                @foreach ($jobRecruitmentTypes as $jobRecruitmentType)
                   <option value="{{$jobRecruitmentType->recruitmentType->id}}">{{$jobRecruitmentType->recruitmentType->name}}</option>
                @endforeach
              </select>
            </div>
          </div>
 -->

          <div class="row">
            <div class="form-group" style="width:100%"  >
              <label class="control-label sm-select-label">Keywords</label>
              <select class="form-control" id="keyword" multiple="true">
                @foreach ($tags as $tag)
                  <option value="{{$tag->name}}">{{$tag->name}}</option>
                @endforeach
              </select>
            </div>
          </div>




<script type="text/javascript">
  

$('#skill').select2({
  placeholder:'Skills',
  tags:true
});  
$('#certification').select2({
  placeholder:'Certifications',
  tags:true
});  
$('#keyword').select2({

  tags:true,
  placeholder:'Keywords , tags'

});


</script>

          <div class="row">
            <div class="form-group" style="width:100%"  >
              <label class="control-label sm-select-label">Age From</label>
              <input type="number" name="" id="age-start" class="form-control" placeholder="Age From" /> 
            </div>
          </div>


          <div class="row">
            <div class="form-group" style="width:100%"  >
              <label class="control-label sm-select-label">Age To</label>
              <input type="number" name="" id="age-stop" class="form-control" placeholder="Age To" /> 
            </div>
          </div>



<div class="row">
     <div class="form-group" style="width:100%"  >
	    <div class="filter-percentage"></div>
	 </div>  
</div>
<script type="text/javascript">
	(function($){
		$(function(){

$( ".filter-percentage" ).slider({
  animate: "fast",
 change: function( event, ui ) {
       
       $('#precision-percentage').html(ui.value + '%');

 } 
});

		});
	})(jQuery);
</script>





          <div class="row">
            <button type="submit" id="filter-btn" class="btn btn-warning btn-raised btn-animate btn-animate-side"  >
              <span><i class="icon fa fa-filter" aria-hidden="true"></i>Filter</span>
            </button>
            <span style="margin-left: 11px;">Precision : </span><span id="precision-percentage" style="font-weight: bold;margin-left: 7px;">0%</span>
          </div>
        <!-- </form> -->
                </ul>
              </div>

</div>