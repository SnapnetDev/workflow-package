@extends('layouts.main')

@extends('layouts.logged_user')

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
    Educations.
</div>


@include('notifications.message')

<div class="col-md-12" align="right">
    <a href="{{ route('education.create') }}" class="btn btn-primary btn-sm" style="margin-bottom: 11px;">Add Education</a>
</div>

 <table class="table table-striped">
     <tr>
         <th>
             Name
         </th>
         <th>

         </th>
     </tr>
     @foreach ($list as $education)

     <tr>

         <td>
             {{$education->name}}
         </td>
         <td>
            <div class="dropdown show pull-right">
                <button class="btn btn-success dropdown-toggle btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    Action
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" x-placement="bottom-start" style="position: absolute; transform: translate3d(-5px, 38px, 0px); top: 0px; left: 0px; will-change: transform;">

                     <a class="dropdown-item" href="{{ route('education.edit',$education->id) }}">Modify</a>


                     <form method="post" action="{{ route('education.destroy',$education->id) }}">

                        @csrf
                        @method('DELETE')

                        <input type="hidden" name="id" value="{{ $education->id }}" />

                     <button class="dropdown-item btn btn-danger btn-sm" data-backdrop="false"  data-toggle="modal" data-target="#approveReject" >Remove</button>

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
