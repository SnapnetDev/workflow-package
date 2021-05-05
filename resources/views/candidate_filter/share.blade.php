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
    Shared Group <span style="font-weight: bold;font-size: 20px;">({{$group->name}})</span>
</div>


@include('notifications.message')


 <table class="table table-striped">
     <tr>
         <th>
             Name
         </th>
         <th>
            E-mail
         </th>
         <th>
             Phone Number
         </th>
         <th></th>
     </tr>
     @foreach ($group->candidateFilterGroups as $candidateFilterGroup)

     <tr>

         <td>
             {{  (!is_null($candidateFilterGroup->candidate))? $candidateFilterGroup->candidate->name : 'N/A'  }}
         </td>
         <td>
             {{ !is_null($candidateFilterGroup->candidate)? $candidateFilterGroup->candidate->email : 'N/A' }}
         </td>
         <td>
             {{ !is_null($candidateFilterGroup->candidate)? $candidateFilterGroup->candidate->phone_number : 'N/A' }}
         </td>
         <td>
            <div class="dropdown show pull-right">
                <button class="btn btn-success dropdown-toggle btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    Action
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" x-placement="bottom-start" style="position: absolute; transform: translate3d(-5px, 38px, 0px); top: 0px; left: 0px; will-change: transform;">

                     <a target="_blank" class="dropdown-item" href="{{ route('candidate.show', !is_null($candidateFilterGroup->candidate)? $candidateFilterGroup->candidate->id : 0 ) }}">View Detail</a>



                </div>
            </div>
         </td>
     </tr>

     @endforeach
 </table>

 <div class="col-md-12">

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
