
<div class="modal fade modal-3d-slit" id="addjobs" aria-labelledby="exampleModalTitle" role="dialog"  aria-hidden="true" style="display: none;" >

  <div class="modal-dialog modal-lg">

    <div class="modal-content" id="sumjob">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="exampleFormModalLabel">{{('Add Job')}}</h4>
      </div>
      <div class="modal-body">
        <div class="row">

          <div class="col-xs-12 col-xl-12 form-group">
            <label class="bold">Job Reference Number</label>
            <input required  type="text" class="form-control job_ref" name="job_ref" placeholder="Job reference number">
          </div>
      <!--     
          <div class="col-xs-12 col-xl-12 form-group">
           <select data-plugin="select2" class="form-control" id="taketest"  >
            <option value="0">-{{('Take Apptitude Test')}}-</option>

            <option value="1">{{('Yes')}}</option>
            <option value="0">{{('No')}}</option>

          </select>
        </div> -->

        <div class="col-xs-12 col-xl-12 form-group">

          <label class="bold">Job Title</label>
          <input required  type="text" class="form-control titleText" name="title" placeholder="job title">
        </div>
        <div class="col-xs-12 col-xl-12 form-group">  
          <label class="bold">Job Level</label>
          <select  class="form-control level_id" name="level_id"  >
            <option value="0">-{{('Select Level')}}-</option>
            @if(count($level)>0)
            @foreach($level as $level)
            <option value="{{$level->id}}">{{$level->level}}</option>
            @endforeach
            @endif
          </select>
        </div>
        <div class="col-xs-12 col-xl-12 form-group">

          <label class="bold">Location</label>
          <select  class="form-control location_id" name="location_id"  >
            <option value="0">{{('Location (all)')}}</option>
            @foreach($state as $state)
            <option value="{{$state->id}}">{{$state->state}}</option>
            @endforeach
          </select>
        </div>
        <div class="col-xs-12 col-xl-12 form-group expreq">

          <label class="bold">Years of Experience Required</label>
          <div class="input-group mb-3">    
            <input id="msg" type="number" class="form-control min_exp" name="min_exp" placeholder="Year From">
            <div class="input-group-append">
              <span class="input-group-text">to</span>
            </div>
            <input id="msg" type="number" class="form-control max_exp" name="max_exp" placeholder="Year to">
          </div>
        </div>
        <div class="col-xs-12 col-xl-12 form-group ">

          <label class="bold">Job Description</label>
          <textarea required  name="job_desc" class="form-control wysiwyg job_desc" rows="5" style="width: 100%;" placeholder="job description"></textarea>
        </div> 

        <div class="col-xs-12 col-xl-12 form-group">

          <label class="bold">Experience Required</label>
          <textarea required  name="required_exp" class="form-control wysiwyg required_exp" rows="5" style="width: 100%;" placeholder="Description of experience reuired"></textarea>
        </div>
        <div class="col-xs-12 col-xl-12 form-group">



          <label class="bold">Educational Requirement</label>
          <textarea required  name="qualification" class="form-control wysiwyg qualification" rows="5" style="width: 100%;" placeholder="Educational Requirement"></textarea>
        </div>

        <div class="col-xs-12 col-xl-12 form-group">
          <label class="bold">Other Skills</label>
          <textarea required  name="otherskill"   class="form-control wysiwyg otherskill" rows="5" style="width: 100%;" placeholder="Other Skills"></textarea>
        </div>
        <input type="hidden" value="0" class="jobid">
        <div class="col-xs-12 col-xl-12 form-group">
          <label class="bold">Salary Range</label>
          <div class="input-group mb-3">  
            <div class="input-group-append">
              <span class="input-group-text">₦</span>
            </div>      
            <input  type="text" class="form-control min_sal" name="min_sal" placeholder="Salary From">
            <div class="input-group-append">
              <span class="input-group-text">to</span>
            </div>
            <input  type="text" class="form-control max_sal" name="max_sal" placeholder="Salary to">
          </div>

        </div>
        <div class="col-xs-12 col-xl-12 form-group">
          <label class="bold">Expiry Date</label>
          <input required  type="text" class="form-control datepicker date_expire" readonly name="date_expire" placeholder="Expiry Date" autocomplete="off"  required="required">
        </div>


      </div> 
    </div>


    <div class="modal-footer"> 
      <button  class="add btn btn-primary btn-outline add" onclick="addJob()" >Add Job</button>
      <button  class="add btn btn-primary btn-outline mod" >Modify</button> 




    </div>
  </div>
</div>

</div>

<script type="text/javascript">
function addJob(){ 
        title=$(".titleText").val();
        job_desc=$(".job_desc").val();
        job_ref=$('.job_ref').val();
        min_sal=$('.min_sal').val();

        max_sal=$('.max_sal').val();
        required_exp=$('.required_exp').val();
        min_exp=$('.min_exp').val();
        max_exp=$('.max_exp').val();
        level_id=$('.level_id').val();
        location_id=$('.location_id').val();
        qualification=$('.qualification').val();
        date_expire=$('.date_expire').val();
        otherskill=$('.otherskill').val();
        id=$('.jobid').val();
       formData={
          title:title,
          required_exp:required_exp,
          job_desc:job_desc,
          job_ref:job_ref,
          min_sal:min_sal,
          max_sal:max_sal,
          min_exp:min_exp,
          max_exp:max_exp,
          level_id:level_id,
          location_id:location_id,
          qualification:qualification,
          date_expire:date_expire,
          otherskill:otherskill,
          id:id,
          type:'addJob',
          _token:'{{csrf_token()}}'
        }
        console.log(formData);
        if(checkempty(title)!=0 || checkempty(job_desc)!=0 || checkempty(job_ref)!=0 || checkempty(min_sal)!=0 || checkempty(max_sal)!=0 || checkempty(min_exp)!=0 ||  checkempty(max_exp)!=0 || checkempty(level_id)!=0 || checkempty(location_id)!=0 || checkempty(qualification)!=0 || checkempty(date_expire)!=0 || checkempty(otherskill)!=0 || checkempty(required_exp)!=0){
          return ;
        }

      processPost(formData,'job',1);
         
       
    
  }
</script>
