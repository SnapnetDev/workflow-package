 
 <div id="step-3">

 	<div id="form-step-0" >
 		<div class="form-group">
 			<table class="table">
 				<tr>
 					<td>
 						<label >Organization:</label>
 						<input type="text" class="form-control organization" name="organization"  placeholder="Enter Name of organization" required> 
 					</td>
                    <td>
                        <label >Job Title:</label>
                        <input type="text" class="form-control role" name="role"  placeholder="Job Title" required> 
                    </td>                  
 				</tr>
  				<tr>
  					<td>
 						<label >Job Level</label>
                        <select class="form-control job_level" required="" name="job_level">
                            <option selected="selected" value="">Please Select...</option>
                            <option value="1">Graduate trainee</option>
                            <option value="2">Volunteer, internship</option>
                            <option value="3">Entry level</option>
                            <option value="4">Mid level</option>
                            <option value="5">Senior level</option>
                            <option value="6">Management level</option>
                            <option value="7">Executive level</option>
                        </select>
 					</td>
                    <td>
                        <label >Full Address</label>
                        <input type="text" class="form-control address" name="address"  placeholder="No 33, Kanuri Road, Ikeja Lagos" required>    
                    </td>
                </tr>
                <tr>
 					<td>

 						<label >Start Date:</label>
 						<input type="text" readonly="" class="form-control datepicker from" name="from"  placeholder="Start Date" required> 
 					</td>
 				 <td>
                        <span id="work_end_year">
                        <label >End Date:</label>
                        <input type="text" readonly="" class="form-control datepicker to" name="to"  placeholder="End Date" required> 
                    </span>
                    </td>
                  
 				</tr>
 			 
 			</table>
            <table class="table">
                <tr>
                 <td> 
                        <label for="gender">I am Currently Working Here:</label>
                          <input  id="work_current" onclick="check()" type="checkbox" name="current" class="checkbox">
                      
                    </td>
                </tr>
            </table>
           
 			 <table class="table">
                <tr>
                    <td>
                      <label for="status">Job Responsibility:</label>  
                      <textarea class="form-control wysiwyg job_desc" name="job_desc" > </textarea>
                    </td>
                </tr>        
             </table>
                <button  style="margin-left: 9px;" class="btn btn-md btn-info"  onclick="stepThree(0)">Save</button> 
                


         @if(count($pastEmps)>0)
            <table class="table table-striped" style="margin-top: 20px;">
                <tr>
                    <td>  Name</td>
                    <td>  Role</td>
                    <td> Level </td>
                    <td> Address </td>
                    <td>Date</td>
                    <td>Description</td>
                    <td>Action</td>
                </td>
                </tr>
                @foreach($pastEmps as $past)
                <tr>
                  <td>{{$past->organization}}</td>
                      <td>  {{$past->role}} </td>
                        <td>{{$past->job_level_real}} </td>
                        <td>{{$past->address}} </td>
                        <td> {{$past->from}} to {{is_null($past->to) ? 'date' : $past->to}}
                        <td>{{mb_strimwidth($past->job_desc,0,40,'...')}}</td>   
                         <td>
                            <div class="dropdown">
                                <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Action
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" data-toggle="modal" data-target='#genericModal' onclick="setDescription('{{$past->job_desc}}')">View Discription</a>
                                    <a class="dropdown-item" href="{{url('job')}}/delete?model=empPastEmp&id={{$past->id}}&url=job/appllyToJob?job_id={{isset($_GET['job_id'])? $_GET['job_id'] : 0}}#step-3">Delete</a> 
                                </div>
                            </div></td>   
                </tr>
                @endforeach
            </table>
            @endif
 		</div>
 	</div>

 </div>

 <script type="text/javascript">

 
    function check(){

           if($('#work_current').is(':checked')){
                $('#work_end_year').hide();
            }
            else{
                $('#work_end_year').show();
            }
    }
    
   



 		 function stepThree(type){
               // / alert('dd');

            organization=$('.organization').val();
            role=$(".role").val();
            job_level=$('.job_level').val();
            address=$('.address').val();
            from=$('.from').val();
            to=$('.to').val();
            job_desc=$('.job_desc').val();

           
            formData={
                organization:organization,
                role:role,
                job_level:job_level,
                address:address,
                from:from,
                to:to,
                job_desc:job_desc,
                emp_id:'{{Auth::user()->id}}',
                _token:'{{csrf_token()}}',
                type:'stepThree'
            }
                console.log(formData);

    	 	if(checkempty(organization)!=0 || checkempty(role)!=0 || checkempty(job_level)!=0 || 
    	 	checkempty(address)!=0  || checkempty(from)!=0 ||  checkempty(job_desc)!=0){
    	 			return false;
    	 	}
    	 	processPost(formData,'job');
            if(type==1){
             $('.organization').val('');
             $(".role").val('');
             $('.job_level').val('');
             $('.address').val('');
             $('.from').val('');
             $('.to').val('');
             $('.job_desc').val('');
            }
    	 }
 </script>