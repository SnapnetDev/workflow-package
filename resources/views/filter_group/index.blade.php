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
    Filter Groups
</div>


@include('notifications.message')

<div class="col-md-12" align="right">
    <a href="{{ route('filtergroup.create') }}" class="btn btn-primary btn-sm" style="margin-bottom: 11px;">Add Group</a>
</div> 
 
 <table class="table table-striped">
     <tr>
         <th>
             Name
         </th>
         <th>
             
         </th>
     </tr>
     @foreach ($filterGroups as $filterGroup)
     
     <tr>
         
         <td>
             {{$filterGroup->name}}
         </td>
         <td>
            <div class="dropdown show pull-right">
                <button class="btn btn-success dropdown-toggle btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    Action
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" x-placement="bottom-start" style="position: absolute; transform: translate3d(-5px, 38px, 0px); top: 0px; left: 0px; will-change: transform;"> 
                     
                     <a class="dropdown-item" href="{{ route('filtergroup.edit',$filterGroup->id) }}">Modify</a> 
                     <a class="dropdown-item" href="{{ route('filtergroup.candidates',$filterGroup->id) }}">View Sorted Candidates</a> 

                     @if (!$filterGroup->candidateFilterGroups()->exists())


	                     <form method="post" action="{{ route('filtergroup.destroy',$filterGroup->id) }}">
	                        
	                        @csrf 
	                        @method('DELETE')

	                     <button class="dropdown-item btn btn-danger btn-sm" data-backdrop="false"  data-toggle="modal" data-target="#approveReject" >Remove</button> 

	                     </form>


                     @endif   

                     <a data-target="#sharable-link{{$filterGroup->id}}" data-toggle="modal" class="dropdown-item" href="{{ route('filter.group.export',$filterGroup->id) }}">Get Sharable Link</a>



                </div>
            </div>             
         </td>
     </tr>

     @endforeach
 </table>   

 <div class="col-md-12">
     {{$filterGroups->links()}}
 </div>        


                
        </div>
    </div>

<div class="col-lg-12" style="margin: 11.4%;"></div>
</div>



@foreach ($filterGroups as $filterGroup)

<!-- dialog -->
<div class="modal fade modal-3d-slit show" id="sharable-link{{ $filterGroup->id }}" aria-labelledby="exampleModalTitle" role="dialog" style="display: none; padding-right: 17px;">

  <div class="modal-dialog modal-lg" style="background-color: #fff;padding: 14px;">
   


<div class="modal-content">
      
      <div class="modal-header">
        <h4 class="modal-title">
    <span style="font-weight: bold;">
        Sharable Link ({{ $filterGroup->name }}).
    </span>            
        </h4>
      </div>

      <div class="modal-body">
        
        <div class="col-lg-12">
          <input type="text" name="" value="{{ route('filter.group.export',$filterGroup->id) }}" class="form-control" placeholder="Sharable Link . " onclick="this.select();" />        
        </div>        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>





  <!-- [end] -->
  </div>
</div>
<!-- dialog -->

@endforeach



@endsection
