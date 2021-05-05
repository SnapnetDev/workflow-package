	
			<div class="{{Auth::user()->role==3 ? 'col-lg-12' : 'col-lg-9' }} post-list">

		<div class="single-post job-experience">
					<h4 class="single-title">Basic Details
					@if(Auth::user()->role==0) 
					 <a href="{{url('job')}}/appllyToJob#step-1" class="btn pull-right btn-info btn-sm">Modify</a>
					@endif
				</h4>
					<table class="table">
						<tr>
							<td>Name</td>
							<td>{{$user->name}}</td>
						</tr>
						<tr>
							<td>Email</td>
							<td>{{$user->email}}</td>
						</tr>
						<tr>
							<td>Phone Number</td>
							<td>{{$user->phone_num}}</td>
						</tr>
						<tr>
							<td>Address</td>
							<td>{{$user->address}}</td>
						</tr>
						<tr>
							<td>Date of Birth</td>
							<td>{{$user->dob}}</td>
						</tr>
						<tr>
							<td>Gender</td>
							<td>{{$user->sex}}</td>
						</tr>
						<tr>
							<td>Marital Status</td>
							<td>{{$user->marital_status}}</td>
						</tr>								 
					</table>
				</div>

				<div class="single-post job-experience">
					<h4 class="single-title">Education
						@if(Auth::user()->role==0) <a href="{{url('job')}}/appllyToJob#step-2" class="btn pull-right btn-info btn-sm">Add</a>	@endif
					</h4>
					@if(count($institutions)>0)
					@foreach($institutions as $institution)
					<table class="table table-striped" style="margin-top: 20px;">

						<tr>
							<td>  Name</td>
							<td>{{$institution->name}}</td>
						</tr>
						<tr>
							<td>  Qualification</td>
							<td>  {{$institution->degree_resolve}} </td>
						</tr>
						<tr>
							<td> Course </td>
							<td>{{$institution->course}} </td>
						</tr>
						<tr>
							<td>Grade</td>
							<td>{{$institution->grade_resolve}}</td>
						</tr>
						<tr>
							<td> Date </td>
							<td> {{$institution->start_year}} to {{is_null($institution->end_year) ? 'date' : $institution->end_year}}
							</tr>
							<tr>
								<td>Decription</td>
								<td>{{$institution->description}}</td>
							</tr>
							@if(Auth::user()->role==0) 
					<tr>

						<td>Action</td>
						<td>
							<a class="btn btn-sm btn-success" href="{{url('job')}}/delete?model=institutions&id={{$institution->id}}&url=profile?id={{$user->id}}">Delete </a>
						</td>   
					</tr>	@endif
						</table>
						@endforeach
						@else
							<h4>No Record Found</h4>
						@endif

					</div>


					<div class="single-post job-experience">
						<h4 class="single-title">Past Employement
							@if(Auth::user()->role==0) 
							<a href="{{url('job')}}/appllyToJob#step-3" class="btn pull-right btn-info btn-sm">Add</a>	@endif
						</h4>
						@if(count($pastEmps)>0)
						@foreach($pastEmps as $past)
						<table class="table table-striped">
							<tr>
								<td>  Name</td>

								<td>{{$past->organization}}</td>
							</tr>
							<tr>
								<td>  Role</td>
								<td>  {{$past->role}} </td>
							</tr>
							<tr>
								<td> Level </td>
								<td>{{$past->job_level_real}} </td>
							</tr>
							<tr>
								<td> Address </td>
								<td>{{$past->address}} </td>
							</tr>
							<tr>
								<td>Date</td>
								<td> {{$past->from}} to {{is_null($past->to) ? 'date' : $past->to}}</td>
							</tr>
							<tr>
								<td>Description</td>
								<td>{{$past->job_desc}}</td> 
							</tr>
							@if(Auth::user()->role==0) 
												<tr>

						<td>Action</td>
						<td>
							<a class="btn btn-sm btn-success" href="{{url('job')}}/delete?model=empPastEmp&id={{$past->id}}&url=profile?id={{$user->id}}">Delete </a>
						</td>   
					</tr>	@endif
						</table>
						<hr>		
						@endforeach
						@else
							<h4>No Record Found</h4>
						@endif
					</div>


					<div class="single-post job-experience">
						<h4 class="single-title">Certification
								@if(Auth::user()->role==0) 
							<a href="{{url('job')}}/appllyToJob#step-4" class="btn pull-right btn-info btn-sm">Add</a>
									@endif
						</h4>
						@if(count($certifications)>0)
						   @foreach($certifications as $certification)
						<table class="table table-striped">
							<tr>
								<td> Title</td>
								<td>{{$certification->title}}</td>
							</tr>
							<tr>
								<td> Type</td> 
								<td>  {{$certification->cert_type}} </td>
							</tr>
							<tr>
								<td> Year Received </td>
								<td>{{$certification->year_received}} </td> 
							</tr>
							@if(Auth::user()->role==0) 
						<tr>

						<td>Action</td>
						<td>
							<a class="btn btn-sm btn-success" href="{{url('job')}}/delete?model=Certification&id={{$certification->id}}&url=profile?id={{$user->id}}">Delete </a>
						</td>   
					</tr>	@endif
						</table>
						<hr>
						@endforeach
						@else
							<h4>No Record Found</h4>
						@endif
					</div>

					<div class="single-post job-experience">
						<h4 class="single-title">Document
							@if(Auth::user()->role==0) 
							<a href="{{url('job')}}/appllyToJob#step-5" class="btn pull-right btn-info btn-sm">Add</a>
							@endif
						</h4>
						@if(count($documents)>0)
					 @foreach($documents as $document)
					 <table class="table table-striped">
					 <tr>
					 <td> Type</td> 
 						<td>  {{$document->documenttype->docname}} </td> 
 						</tr>
 						<tr>
 						<td>Action</td>
                         <td>

                            <div class="dropdown">
                                <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Action
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"> 
                                     <a class="dropdown-item" target="_blank" href="{{url('job')}}/download?id={{$document->id}}"  >Download Document</a> 
                                 @if(Auth::user()->role==0)   
                                  <a class="dropdown-item" href="{{url('job')}}/delete?model=document&id={{$document->id}}&url=profile?id={{$user->id}}">Delete</a> 
                                  	@endif
                                </div>
                            </div>


                        </td> 
                        </tr> 
                    </table></hr>
                        @endforeach
                        @else
							<h4>No Record Found</h4>
						@endif
					</div>
 
					<div class="single-post job-experience">
						<h4 class="single-title">Refrees
							@if(Auth::user()->role==0) <a href="{{url('job')}}/appllyToJob#step-6" class="btn pull-right btn-info btn-sm">Add</a>	@endif</h4>
						@if(count($refrees)>0)
						@foreach($refrees as $refree)
					<table class="table table-striped">
					<tr>
						<td> Name</td>
						<td>{{$refree->ref_name}}</td>
					</tr>
					<tr>
						<td> Position</td>
						<td>  {{$refree->ref_prof}} </td>
					</tr>
					<tr>
						<td> Email </td> 
						<td>{{$refree->ref_email}} </td>
					</tr>
					<tr>
						<td>Phone</td>
						<td>{{$refree->ref_phone}}</td> 
					</tr>@if(Auth::user()->role==0) 
					<tr>

						<td>Action</td>
						<td>
							<a class="btn btn-sm btn-success" href="{{url('job')}}/delete?model=reference&id={{$refree->id}}&url=profile?id={{$user->id}}">Delete </a>
						</td>   
					</tr>	@endif
						</table>
						@endforeach
						@else
							<h4>No Record Found</h4>
						@endif
					</div>

