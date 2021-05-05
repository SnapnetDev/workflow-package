@extends('layouts.main')

@extends('layouts.logged_user')

@section('side-bar')


@endsection

@section('inner-content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12" style="min-height: 450px;">
            
                <!-- <div class="card-header">{{ __('Change Password') }}</div> -->

<div style="
    border-bottom: 3px solid #000000;
    margin-bottom: 17px;
    font-size: 18px;
">
    Users
</div>

@include('notifications.message')

                    @foreach ($users as $item)
                        @include('user.group.index')
                    @endforeach


<span id="outlet">


    <div class="col-md-12" style="margin-bottom: 5px;">
        <form action="{{ route('user.index') }}"  method="get">
            <input value="{{ request()->filled('search_text')? request('search_text') : '' }}" type="text" name="search_text" style="border: 1px solid #ddd;padding: 2px;">
            <button class="btn btn-sm btn-success" style="position: relative;top: -3px;">Go</button>
        </form>
    </div>


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

                    @if ($user->role == 'admin')
                      <a href="#" class="dropdown-item btn btn-warning btn-sm" data-backdrop="false"  data-toggle="modal" data-target="#group{{ $user->id }}">Groups</a>
                    @endif

                </div>
            </div>
         </td>
     </tr>

         @endforeach
 </table>


 <div class="col-md-12">
     {{$users->links()}}
 </div>


</span> 

                
        </div>
    </div>

<div class="col-lg-12" style="margin: 11.4%;"></div>
</div>


<!-- dialog -->
<div class="modal fade modal-3d-slit show" id="profileView" aria-labelledby="exampleModalTitle" role="dialog" style="display: none; padding-right: 17px;">

  <div class="modal-dialog modal-lg">



  <!-- [end] -->
  </div>
</div>
<!-- dialog -->


@endsection
