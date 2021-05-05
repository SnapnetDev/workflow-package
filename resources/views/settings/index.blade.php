@extends('layouts.main')

@extends('layouts.logged_user')

@section('side-bar')


@endsection

@section('inner-content')

    @include('settings.create')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12" style="min-height: 450px;">



                <div style="
    border-bottom: 3px solid #000000;
    margin-bottom: 17px;
    font-size: 18px;
">
                    Manage Settings
                </div>




                <span id="outlet">

<div class="col-md-12" align="right" style="margin-bottom: 5px;">
    <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#setting-create">Add Setting</a>
</div>

 <table class="table table-striped">
     <tr>
         <th>
             Name
         </th>
         <th>
             Value
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
         @include('settings.edit')

         <tr>

         <td>
            <b style="color: #000;">{{$v->name}}</b>
         </td>

         <td>
             {{ $v->value }}

         </td>

         <td>
            <div class="dropdown show">
                <button class="btn btn-success dropdown-toggle btn-sm pull-right" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    Action
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" x-placement="bottom-start" style="position: absolute; transform: translate3d(-5px, 38px, 0px); top: 0px; left: 0px; will-change: transform;">



                    <a  data-toggle="modal" data-target="#setting-edit{{ $v->id }}" class="dropdown-item btn btn-danger btn-sm" data-backdrop="false" href="">Edit</a>

                     <form onsubmit="return confirm('Do you want to remove this setting?')" method="post" action="{{ route('process.action',['setting-delete']) }}">
                         @csrf

                         <input type="hidden" name="name" value="{{ $v->name }}" />

                      <button  class="dropdown-item btn btn-danger btn-sm" data-backdrop="false"  data-toggle="modal" data-target="#approveReject" >Remove Setting</button>

                     </form>


                </div>
            </div>
         </td>
     </tr>

     @endforeach
 </table>


 <div class="col-md-12">
     {{--{{$list->links()}}--}}
 </div>




                </span>


            </div>
        </div>

        <div class="col-lg-12" style="margin: 11.4%;"></div>
    </div>




@endsection
