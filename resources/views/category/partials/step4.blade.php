 
 <div id="step-4">

 	<div id="form-step-0" >
 		<div class="form-group">
 			<table class="table">
 				<tr>
 					<td>
 						<label >Title:</label>
 						<input type="text" class="form-control title" name="title"  placeholder="Enter Name of organization" required> 
 					</td>
                    <td>
                        <label >Type:</label>
                        <select id="type" class="form-control cert_type" name="cert_type">
                        	<option selected="selected" value="">Select...</option>
                        	<option value="certificate">certificate</option>
                        	<option value="award">award</option></select>
                        
                    </td>                  
 				</tr>
 				<tr>
 					<td>
 					<label>Year Received</label>
 					 <input type="text"  readonly class="form-control year_received datepicker2" name="year_received"  placeholder="{{date('Y')}}" required>
 					</td>
 					<td></td>
 				</tr>

 			</table>
  <button  style="margin-left: 9px;" class="btn btn-md btn-info"  onclick="stepFour(0)">Save</button>
                

                         @if(count($certifications)>0)
            <table class="table table-striped" style="margin-top: 20px;">
                <tr>
                    <td> Title</td>
                    <td> Type</td>
                    <td> Year Received </td> 
                    <td>Action</td>
                </td>
                </tr>
                @foreach($certifications as $certification)
                <tr>
                  <td>{{$certification->title}}</td>
                      <td>  {{$certification->cert_type}} </td>
                        <td>{{$certification->year_received}} </td> 
                         <td>
                            <div class="dropdown">
                                <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Action
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"> 
                                    <a class="dropdown-item" href="{{url('job')}}/delete?model=empPastEmp&id={{$certification->id}}&url=job/appllyToJob?job_id={{isset($_GET['job_id'])? $_GET['job_id'] : 0}}#step-4">Delete</a> 
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
 	 function stepFour(type){
 
            title=$('.title').val();
            cert_type=$(".cert_type").val();
            year_received=$('.year_received').val();
            

           
            formData={
                title:title,
                cert_type:cert_type,
                year_received:year_received,
                user_id:'{{Auth::user()->id}}',
                _token:'{{csrf_token()}}',
                type:'stepFour'
            }
                console.log(formData);

    	 	if(checkempty(title)!=0 || checkempty(cert_type)!=0 || checkempty(year_received)!=0 ){
    	 			return false;
    	 	}
    	 	processPost(formData,'job');
            if(type==1){
             $('.title').val('');
             $(".cert_type").val('');
             $('.year_received').val('');
           
            }
    	 }
 </script>