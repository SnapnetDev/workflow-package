 <div id="step-1">

 	<div id="form-step-0" role="form" data-toggle="validator">
 		<div class="form-group">
 			<table class="table">
 				<tr>
 					<td>
 						<label >Full Name:</label>
 						<input type="text" class="form-control" name="name" value="{{Auth::user()->name}}" placeholder="Enter your FullName" required> 
 					</td>
 					<td>
 						<label >Email address:</label>
 						<input type="email" class="form-control" readonly value="{{Auth::user()->email}}" name="email"  placeholder="Write your email address" required> 	
 					</td>
 					
 				</tr>
                @if(!Auth::user())
  				<tr>
  					<td>
 						<label >Password:</label>
 						<input type="password" class="form-control" name="password"  placeholder="Enter your Password" required> 	
 					</td>
 					<td>

 						<label >Confirm Password:</label>
 						<input type="password" class="form-control" name="password_confirm"  placeholder="Confirm Password" required> 
 					</td>
 				</tr>
                @endif
 				<tr>
					<td>

 						<label >Date of Birth:</label>
 						<input type="email" readonly value="{{Auth::user()->dob}}" class="form-control datepicker" name="dob"  placeholder="Date of Birth" required> 
 					</td>
 					<td>
 						<label for="gender">Gender:</label>
 						 <select name="sex" class="form-control sex">
 						 	<option value="">-select -</option>
 						 	<option {{Auth::user()->sex=='M' ? 'selected' : ''}} value="M">Male {{Auth::user()->sex}}</option>
 						 	<option {{Auth::user()->sex=='F' ? 'selected' : ''}} value="F">Female</option>
 						 </select>	
 					  
 					</td>
 				
 				</tr>
 				<tr>
 					<td>
 						<label >Phone Number:</label>
 						<input type="email" class="form-control" value="{{Auth::user()->phone_num}}" name="phone_num"  placeholder="Enter your phone number" required> 
 					</td>
 					<td>
 						<label for="status">Marital Status:</label>
 						 <select name="marital_status" class="form-control marital_status">
 						 	<option value="">-select -</option>
 						 	<option {{Auth::user()->marital_status=='Single' ? 'selected' : ''}} value="Single">Single</option>
 						 	<option {{Auth::user()->marital_status=='Married' ? 'selected' : ''}} value="Married">Married</option>
 						 	<option {{Auth::user()->marital_status=='Divorced' ? 'selected' : ''}} value="Divorced">Divorced</option>
 						 </select>	
 					  
 					</td>
 				
 					
 				</tr>
 			</table>
 			 

 		</div>
 	</div>

 </div>

 <script type="text/javascript">
 		 function stepOne(){

    	 	name=$('input[name="name"]').val();
    	 	email=$('input[name="email"]').val();
    	 	password=$('input[name="password"]').val();
    	 	password_confirm=$('input[name="password_confirm"]').val();
    	 	dob=$('input[name="dob"]').val();
    	 	gender=$('.sex').val();
    	 	phone_num=$('input[name="phone_num"]').val();
    	 	marital_status=$('.marital_status').val();
    	 	id={{Auth::user()->id}}
    	 	formData={
    	 		name:name,
    	 		id:id,
    	 		email:email,
    	 		password:password,
    	 		password_confirm:password_confirm,
    	 		dob:dob,
    	 		gender:gender,
    	 		phone_num:phone_num,
                @if(isset($_GET['job_id']))
    	 		job_id:{{$_GET['job_id']}},
                @endif
				marital_status:marital_status,
    	 		_token:'{{csrf_token()}}',
    	 		type:'stepOne'
    	 	}
              @if(Auth::guest())
    	 	if(password!=password_confirm){
    	 		 toastr.info('Password Not Match');
    	 		 return false;
    	 	}
            @endif
    	 	if(checkempty(name)!=0 || checkempty(email)!=0 || @if(Auth::guest()) checkempty(password)!=0 || 
    	 	checkempty(password_confirm)!=0 ||  @endif	checkempty(dob)!=0 || 
    	 	checkempty(gender)!=0 || checkempty(phone_num)!=0 || checkempty(marital_status)!=0){
    	 			return false;
    	 	}
    	 	
    	 	processPost(formData,'job');
    	 }
 </script>