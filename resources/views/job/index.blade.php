@extends('layouts.main')

@extends('layouts.logged_user')

@section('side-bar')


@endsection

@section('inner-content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

                <!-- <div class="card-header">{{ __('Change Password') }}</div> -->

<div style="
    border-bottom: 3px solid #000000;
    margin-bottom: 17px;
    font-size: 18px;
">
    Jobs.
</div>


                    @foreach ($list as $job)


                        @include('job.edit')


                    @endforeach


@include('job.create')


                    <div class="col-md-12" align="right">
    <button id="job-create" type="button" class="btn btn-primary btn-sm" data-toggle="modal" style="margin-bottom: 11px;" data-target="#create">Add Job</button>
</div>

 <table class="table table-striped">
     <tr>
         <th>
             Code#
         </th>
         <th>
             Role
         </th>
         <th>
             Salary Range
         </th>
         <th>
             Address
         </th>
         <th></th>
     </tr>
     @foreach ($list as $job)




     <tr>

        <td>
            {{ $job->code }}
        </td>

         <td>
             {{$job->role}}
         </td>
         <td>
             {{$job->formatSalaryRange()}}
         </td>
         <td>
             {{$job->address}}
         </td>
         <td>
            <div class="dropdown show">
                <button class="btn btn-success dropdown-toggle btn-sm pull-right" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    Action
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" x-placement="bottom-start" style="position: absolute; transform: translate3d(-5px, 38px, 0px); top: 0px; left: 0px; will-change: transform;">

                     {{--<a class="dropdown-item" data-backdrop="false" href="{{ route('job.applicants',$job->id) }}">View Applicants</a>--}}

<!-- route('applicants.index') -->

                     <a  type="button" data-toggle="modal" style="margin-bottom: 11px;" data-target="#edit{{ $job->id }}" class="dropdown-item" data-backdrop="false">Modify</a>

                     <form method="post" onsubmit="return confirm('Do you want to confirm this action?')" action="{{ route('job.destroy',$job->id) }}">

                        @csrf
                        @method('DELETE')

                        <input type="hidden" name="id" value="{{ $job->id }}"/>

                     <button type="submit" class="dropdown-item btn btn-danger btn-sm" data-backdrop="false"  data-toggle="modal" data-target="#approveReject" >Remove</button>

                     </form>

                </div>
            </div>
         </td>
     </tr>

     @endforeach
 </table>

 <div class="col-md-12">
     {{  $list->links()  }}
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
