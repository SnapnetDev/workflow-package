 
 <div id="step-2">

 	<div id="form-step-0" >
 		<div class="form-group">
 			<table class="table">
 				<tr>
 					<td>
 						<label >Name of Educational Institution/School/etc.:</label>
 						<input type="text" class="form-control eduname" name="name"  placeholder="Enter Name of Institution" required> 
 					</td>
 					<td>
 						<label >Minimum Qualification:</label>
 						<select class="form-control degree" required=""  name="degree">
                            <option value="" selected="selected">Select...</option>
                            <option value="1">Degree</option>
                            <option value="2">Diploma</option>
                            <option value="3">High School (S.S.C.E)</option>
                            <option value="4">HND</option>
                            <option value="5">MBA / MSc</option>
                            <option value="6">MBBS</option>
                            <option value="7">MPhil / PhD</option>
                            <option value="8">N.C.E</option>
                            <option value="9">OND</option>
                            <option value="10">Others</option>
                            <option value="11">Vocational</option>
                        </select>	
 					</td>
 					
 				</tr>
  				<tr>
  					<td>
 						<label >Course</label>
 						<input type="text" class="form-control" name="course"  placeholder="Qualification" required> 	
 					</td>
 					<td>

 						<label >Grade:</label>
 						<select class="form-control degree_class" required=""  name="degree_class">
                            <option value="" selected="selected">Select...</option>
                            <option value="1">First Class</option>
                            <option value="2">Second Class Upper</option>
                            <option value="3">Second Class Lower</option>
                            <option value="4">Upper Credit</option>
                            <option value="5">Distinction</option>
                            <option value="6">Lower Credit</option>
                            <option value="7">Pass</option>
                            <option value="8">Third Class</option> 
                        </select>
 					</td>
 				</tr>
 				<tr>
                    <td>

                        <label >Start Date:</label>
                        <input type="text" readonly="" class="form-control datepicker2" name="start_year"  placeholder="Start Date" required> 
                    </td>
                   
					<td>
                        <div class="end_year">
 						<label >End Date:</label>
 						<input type="text" readonly="" class="form-control datepicker2" name="end_year"  placeholder="End Date" required> 
                    </div>
 					</td>
 					
 				
 				</tr>
                <tr>
                     <td><br><br>
                        <label for="gender">I am still studying this:</label>
                          <input  id="current" onclick="check2()" type="checkbox" name="current" class="checkbox">
                      
                    </td>
                    <td></td>
                </tr>
 			 
 			</table>
 			 <table class="table">
                <tr>
                    <td>
                      <label for="status">Decription:</label>  
                      <textarea class="form-control wysiwyg description" name="description" > </textarea>
                    </td>
                </tr>        
             </table>
                <button  style="margin-left: 9px;" class="btn btn-md btn-info"  onclick="stepTwo(0)">Save</button> 
                @if(count($institutions)>0)
            <table class="table table-striped" style="margin-top: 20px;">
                <tr>
                    <td>  Name</td>
                    <td>  Qualification</td>
                       <td> Course </td>
                       <td>Grade</td>
                      <td> Date </td>
                        <td>Decription</td>
                        <td>Action</td>
                    </td>
                </tr>
                @foreach($institutions as $institution)
                <tr>
                  <td>{{$institution->name}}</td>
                      <td>  {{$institution->degree_resolve}} </td>
                        <td>{{$institution->course}} </td>
                        <td>{{$institution->grade_resolve}}</td>
                        <td> {{$institution->start_year}} to {{is_null($institution->end_year) ? 'date' : $institution->end_year}}
                        <td>{{mb_strimwidth($institution->description,0,40,'...')}}</td>  
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Action
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" data-toggle="modal" data-target='#genericModal' onclick="setDescription('{{$institution->description}}')" style="cursor: pointer;">View Discription</a>
                                    <a class="dropdown-item" href="{{url('job')}}/delete?model=institutions&id={{$institution->id}}&url=appllyToJob?job_id={{isset($_GET['job_id'])? $_GET['job_id'] : 0}}#step-2">Delete</a> 
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

 
    function check2(){

           if($('#current').is(':checked')){
                $('.end_year').hide();
            }
            else{
                $('.end_year').show();
            }
    }
    
   



 		 function stepTwo(type){
               // / alert('dd');

            name=$('.eduname').val();
            degree=$(".degree").val();
            course=$('input[name="course"]').val();
            start_year=$('input[name="start_year"]').val();
            // current=$('input[name="current"]').attr('checked');

            end_year=$('input[name="end_year"]').val();
            description=$('.description').val();
            degree_class=$('.degree_class').val();

           
            formData={
                name:name,
                degree:degree,
                course:course,
                start_year:start_year, 
                end_year:end_year,
                description:description,
                degree_class:degree_class,
                user_id:'{{Auth::user()->id}}',
                _token:'{{csrf_token()}}',
                type:'stepTwo'
            }
                console.log(formData);

    	 	if(checkempty(name)!=0 || checkempty(degree)!=0 || checkempty(course)!=0 || 
    	 	checkempty(start_year)!=0   || checkempty(description)!=0 || checkempty(degree_class) !=0 ){
    	 			return false;
    	 	}
    	 	
    	 	processPost(formData,'job');
            if(type==1){
                $('.eduname').val('');
                $(".degree").val('');
                $('input[name="course"]').val('');
                $('input[name="start_year"]').val('');
                $('input[name="end_year"]').val('');
                $('.description').val('');
            }
    	 }
 </script>