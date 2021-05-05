


<div class="col-lg-3 sidebar">
	<div class="single-slidebar">
		<h4>Menu </h4>
		<ul class="nav nav-pills flex-column">
			<li class="nav-item">
				<a class="nav-link"  href="{{url('job/profile')}}?id={{Auth::user()->id}}">My Profile</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="{{url('job')}}/jobAppliedFor?user_id={{Auth::user()->id}}">Job's Applied For</a>
			</li>

		</ul>
	</div>

</div>