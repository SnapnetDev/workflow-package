@extends('layouts.main')

@extends('layouts.logged_user')

@section('side-bar')


@endsection

@section('inner-content')

    @include('permission.create')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12" style="min-height: 450px;">



                <div style="
    border-bottom: 3px solid #000000;
    margin-bottom: 17px;
    font-size: 18px;
">
                    Permission
                </div>




                <span id="outlet">

<div class="col-md-12" align="right" style="margin-bottom: 5px;">
    <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#create">Add Permission</a>
</div>

 <table class="table table-striped">
     <tr>
         <th>
             Name
         </th>
         <th>
             Constant
         </th>
         <th align="right" style="text-align: right;">
             Actions
         </th>
         <th></th>
     </tr>
     @foreach ($list as $k=>$v)

         @php
             $item = $v;
         @endphp
         @include('permission.edit')

         <tr>

         <td>
             {{$v->name}}
         </td>
         <td>
             {{ $v->constant }}
         </td>

         <td>
            <div class="dropdown show">
                <button class="btn btn-success dropdown-toggle btn-sm pull-right" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    Action
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" x-placement="bottom-start" style="position: absolute; transform: translate3d(-5px, 38px, 0px); top: 0px; left: 0px; will-change: transform;">



                    <a  data-toggle="modal" data-target="#edit{{ $v->id }}" class="dropdown-item btn btn-danger btn-sm" data-backdrop="false" href="">Edit</a>

                    <!-- route('applicants.index') -->
                    <!-- route('job.edit',$job->id) -->
                     <form onsubmit="return confirm('Do you want to confirm this action?');" method="post" action="{{ route('process.action',['delete-permission']) }}">
<!-- route('job.destroy',$job->id)                         -->
                         @csrf

                         <input type="hidden" name="id" value="{{ $v->id }}" />

                      <button  class="dropdown-item btn btn-danger btn-sm" data-backdrop="false"  data-toggle="modal" data-target="#approveReject" >Remove Permission</button>

                     </form>


                </div>
            </div>
         </td>
     </tr>

     @endforeach
 </table>


 <div class="col-md-12">
     {{$list->links()}}
 </div>




                </span>


            </div>
        </div>

        <div class="col-lg-12" style="margin: 11.4%;"></div>
    </div>




@endsection
