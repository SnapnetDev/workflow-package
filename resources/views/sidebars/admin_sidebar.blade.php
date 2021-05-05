<div class="col-lg-12">

<span onclick="openNav()" style="cursor: pointer;">

  <img src="/burger.png" style="width: 32px;">

</span>

</div>



<style type="text/css">



@media (min-width: 768px){

.sidebar {

 width: 100% !important;

}



}

</style>





<div id="mySidenav" class="sidenav" style=";height: 100vh;">

  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>



@auth

     <a href="/user-profile/{{Auth::user()->id}}">Profile</a>

     <a href="/change-password/{{Auth::user()->id}}">Change Password</a>



    @php

      $valuePort = app()->make(\App\Packages\ValuePort::class);

      $booleanPort = app()->make(\App\Packages\BooleanPort::class);

      $permissionPort = app()->make(\App\Packages\PermissionPort::class);

    @endphp



    @if ($booleanPort->hasCv(Auth::user()->id))

     <a href="{{ route('app.get',['candidate-update']) }}?id={{ $valuePort->getCurrentCandidateId() }}">Update Your C.V</a>

    @else

     <a href="{{ route('app.get',['candidate-create']) }}">Upload Your C.V</a>

    @endif 



         <!-- <a href="/">Job Apply</a> -->

        {{--Auth::user()->role == 'admin'--}}





    @if ($permissionPort->hasPermission('g_a'))

             <a href="{{ route('job.index') }}">Jobs</a>

             <a href="{{ route('app.get',['global-folders']) }}">Sorted Groups</a>

             @if ($permissionPort->hasPermission('m_u'))

                  <a href="{{ route('app.get',['fetch-users']) }}">Users</a>

                  <a href="{{ route('app.get',['fetch-candidates']) }}">Candidates</a>

                  <a href="{{ route('app.run',['get-applicants']) }}">Applicants</a>



             @endif



             {{--<a href="{{ route('education.index') }}">Educations</a>--}}



             <!-- <a href="{{ route('recruitmenttype.index') }}">Recruitment Types</a> -->



             {{--<a href="{{ route('certification.index') }}">Certifications</a>--}}



             <!-- <a href="{{ route('competence.index') }}">Competencies</a> -->



             {{--<a href="{{ route('skill.index') }}">Skills</a>--}}



{{--             <a href="{{ route('filtergroup.index') }}">Manage Filter Groups</a>--}}



             @if ($permissionPort->hasPermission('m_r'))

                 <a href="{{ route('app.get',['fetch-roles']) }}">Manage Roles</a>

             @endif



            @if ($permissionPort->hasPermission('m_p'))

                 <a href="{{ route('app.get',['fetch-permissions']) }}">Manage Permissions</a>

            @endif



            @if ($permissionPort->hasPermission('c_s'))

                <a href="{{ route('app.get',['get-settings']) }}">Settings / API</a>

            @endif



            <a href="{{ route('app.get',['get-filters']) }}"> Saved Filters </a>


            <a href="#" data-toggle="modal" data-target="#stage-list">Configure Recruitment Stages </a>

            <a href="#" data-toggle="modal" data-target="#stage-manage-list">Manage Recruitment Stages </a>


            {{--applicant.mail.centre--}}


            <a href="{{ route('mail.centre') }}"> Mail Centre </a>


            <a href="{{ route('workflow.index') }}">Configure Workflows</a>
            <a href="{{ route('workflow-group.index') }}">Workflow Groups</a>



    @else



         <a href="/">Job Apply</a>

         @if (Auth::user()->candidate()->exists())

           <a href="{{ route('app.get',['my-applications']) }}">My Applied Jobs</a>

         @endif



    @endif



@endauth

</div>



<!-- Use any element to open the sidenav -->







<style type="text/css">

  

/* The side navigation menu */

.sidenav {

  height: 100%; /* 100% Full-height */

  width: 0; /* 0 width - change this with JavaScript */

  position: fixed; /* Stay in place */

  z-index: 90000; /* Stay on top */

  top: 0; /* Stay at the top */

  left: 0;

  background-color: #000; /* Black*/

  overflow-x: hidden; /* Disable horizontal scroll */

  padding-top: 60px; /* Place content 60px from the top */

  transition: 0.5s; /* 0.5 second transition effect to slide in the sidenav */

}



/* The navigation menu links */

.sidenav a {

  padding: 8px 8px 8px 32px;

  text-decoration: none;

  font-size: 14px;

  color: #fff;

  display: block;

  transition: 0.3s;

}



/* When you mouse over the navigation links, change their color */

.sidenav a:hover {

  color: #f1f1f1;

}



/* Position and style the close button (top right corner) */

.sidenav .closebtn {

  position: absolute;

  top: 0;

  right: 25px;

  font-size: 36px;

  margin-left: 50px;

}



/* Style page content - use this if you want to push the page content to the right when you open the side navigation */

#main {

  transition: margin-left .5s;

  padding: 20px;

}



/* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */

@media screen and (max-height: 450px) {

  .sidenav {padding-top: 15px;}

  .sidenav a {font-size: 18px;}

}



</style>



<script type="text/javascript">

/* Set the width of the side navigation to 250px */

function openNav() {

  document.getElementById("mySidenav").style.width = "250px";

}



/* Set the width of the side navigation to 0 */

function closeNav() {

  document.getElementById("mySidenav").style.width = "0";

}  

</script>







