@extends('layouts.main')

@extends('layouts.logged_user')

@section('inner-content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            
                <!-- <div class="card-header">{{ __('Change Password') }}</div> -->

<div style="
    border-bottom: 3px solid #000;
    margin-bottom: 17px;
    font-size: 18px;
">
    My Job Applications
</div>


@include('notifications.message')

 
 <table class="table table-striped">
     <tr>
         <th>
             Role
         </th>
         <th>
         	Application Status
         </th>
         <th>
         	Valid Till
         </th>
         <th></th>
     </tr>
     @foreach ($candidateJobs as $candidateJob)
     
     <tr>         
         <td>
             {{$candidateJob->job->role}}
         </td>
         <td>
         	{{ empty($candidateJob->status)? 'pending' : $candidateJob->status }}
         </td>
         <td>
         	{{$candidateJob->job->expiry_date}}
         </td>
         <td>
         	<a href="{{ route('job.show',$candidateJob->job->id) }}" class="btn btn-sm btn-info" target="_blank">Job Detail</a>
         </td>
     </tr>

     @endforeach
 </table>           



<div class="col-md-12">
    {{$candidateJobs->links()}}
</div>

                
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
