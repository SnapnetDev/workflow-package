 <table class="table table-striped">
     <tr>
         <th>
             Full Name
         </th>
         <th>
             E-mail
         </th>
         <th>
             Role
         </th>
         <th></th>
     </tr>
     @foreach ($users as $user)
     
     <tr id="usr{{$user->id}}">
         
         <td>
             {{$user->name}}
         </td>

         <td>
             {{$user->email}}
         </td>

         <td>
             {{$user->role}}
         </td>

         <td>
            <div class="dropdown show">
                <button class="btn btn-success dropdown-toggle btn-sm pull-right" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    Action
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" x-placement="bottom-start" style="position: absolute; transform: translate3d(-5px, 38px, 0px); top: 0px; left: 0px; will-change: transform;"> 
                     

<!-- route('applicants.index') -->
<!-- route('job.edit',$job->id) -->
                     <form method="post" action="{{ route('user.update',$user->id) }}">
<!-- route('job.destroy',$job->id)                         -->
                        @csrf 
                        @method('PATCH')
                        <input type="hidden" name="role" value="admin" />
                        
                     <button  class="dropdown-item btn btn-danger btn-sm" data-backdrop="false"  data-toggle="modal" data-target="#approveReject" >Add Admin-Role</button> 

                     </form>


                     <form method="post" action="{{ route('user.update',$user->id) }}">
<!-- route('job.destroy',$job->id)                         -->
                        @csrf 
                        @method('PATCH')
                        <input type="hidden" name="role" value="user" />
                        
                     <button class="dropdown-item btn btn-danger btn-sm" data-backdrop="false"  data-toggle="modal" data-target="#approveReject" >Remove Admin-Role</button> 

                     </form>


                </div>
            </div>             
         </td>
     </tr>

     @endforeach
 </table> 


 <div class="col-md-12">
     {{$users->links()}}
 </div>          
