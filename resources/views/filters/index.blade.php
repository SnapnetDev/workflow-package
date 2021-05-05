@extends('layouts.main')

@extends('layouts.logged_user')

@section('side-bar')


@endsection

@section('inner-content')

    @include('filters.create')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12" style="min-height: 450px;">



                <div style="
    border-bottom: 3px solid #000000;
    margin-bottom: 17px;
    font-size: 18px;
">
                    Manage Filters
                </div>




                <span id="outlet">

<div class="col-md-12" align="right" style="margin-bottom: 5px;">
    <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#filter-create">Add Filter</a>
</div>

 <table class="table table-striped">
     <tr>
         <th>
             Name
         </th>
         <th>
             Keywords
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
         @include('filters.edit')

         <tr>

         <td>
            <b style="color: #000;">{{$v->name}}</b>
         </td>

         <td>
@php
 $r = explode('_comma_',$v->keywords);
@endphp
             @foreach ($r as $k1=>$v1)
                <span style="
    display: inline-block;
    border: 1px solid #ccc;
    background-color: #bbb;
    color: #fff;
    padding: 3px;
    border-radius: 6px;
">{{ $v1 }}</span>
             @endforeach


         </td>

         <td>
            <div class="dropdown show">
                <button class="btn btn-success dropdown-toggle btn-sm pull-right" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    Action
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" x-placement="bottom-start" style="position: absolute; transform: translate3d(-5px, 38px, 0px); top: 0px; left: 0px; will-change: transform;">



                    <a  data-toggle="modal" data-target="#filter-edit{{ $v->id }}" class="dropdown-item btn btn-danger btn-sm" data-backdrop="false" href="">Edit</a>

                     <form onsubmit="return confirm('Do you want to remove this filter?')" method="post" action="{{ route('process.action',['filter-delete']) }}">
                         @csrf

                         <input type="hidden" name="id" value="{{ $v->id }}" />

                      <button  class="dropdown-item btn btn-danger btn-sm" data-backdrop="false"  data-toggle="modal" data-target="#approveReject" >Remove Filter</button>

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
