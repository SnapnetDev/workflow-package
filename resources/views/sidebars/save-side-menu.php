<ul class="list-group">
   <li class="list-group-item">
     <a href="/user-profile/{{Auth::user()->id}}">Profile</a>
   </li>

   <li class="list-group-item">
     <a href="/change-password/{{Auth::user()->id}}">Change Password</a>
   </li>

   <li class="list-group-item">
     <a href="">Update Your C.V</a>
   </li>

   <li class="list-group-item">
     <a href="">Job Apply</a>
   </li>

  @guest
   <!-- nothing here at the moment -->
  @else
    @if (Auth::user()->role == 'admin')
   <li class="list-group-item">
     <a href="/jobs">Jobs</a>
   </li>

   <li class="list-group-item">
     <a href="/educations">Educations</a>
   </li>

   <li class="list-group-item">
     <a href="/recruitment-types">Recruitment Types</a>
   </li>


   <li class="list-group-item">
     <a href="/certifications">Certifications</a>
   </li>

   <li class="list-group-item">
     <a href="/competencies">Competencies</a>
   </li>

   <li class="list-group-item">
     <a href="/skills">Skills</a>
   </li>
    @elseif (Auth::user()->role == 'client')
   <li class="list-group-item">
     <a href="">Job Apply</a>
   </li>      
    @endif
  @endguest 


</ul>
