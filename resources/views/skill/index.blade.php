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
    Skills.
</div>


@include('notifications.message')

<div class="col-md-12" align="right">
    <a href="{{ route('skill.create') }}" class="btn btn-primary btn-sm" style="margin-bottom: 11px;">Add Skill</a>
</div>

<div class="col-md-4" style="padding: 0;">
    <div class="form-group">
        <label for="">
           Filter By Disciplines
        </label>
        <div>
            <select name="" id="ds" class="form-control" data-value="{{ ( request()->has('ds') )? request()->get('ds') : '' }}">
                <option value="">Select All</option>
                @foreach ($disciplines['list'] as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>

 <table class="table table-striped">
     <tr>
         <th>
             Name
         </th>
         <th>
             Discipline
         </th>
         <th></th>
     </tr>
     @foreach ($list as $skill)

     <tr>

         <td>
             {{$skill->name}}
         </td>
         <td>
             {{ is_null($skill->discipline)? 'N/A' : $skill->discipline->name }}
         </td>
         <td>
            <div class="dropdown show">
                <button class="btn btn-success dropdown-toggle btn-sm pull-right" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    Action
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" x-placement="bottom-start" style="position: absolute; transform: translate3d(-5px, 38px, 0px); top: 0px; left: 0px; will-change: transform;">

                     <a class="dropdown-item" href="{{ route('skill.edit',$skill->id) }}">Modify</a>


                     <form method="post" action="{{ route('skill.destroy',$skill->id) }}">

                        @csrf
                        @method('DELETE')

                        <input type="hidden" name="id" value="{{ $skill->id }}">

                     <button class="dropdown-item btn btn-danger btn-sm" data-backdrop="false"  data-toggle="modal" data-target="#approveReject" >Remove</button>

                     </form>


                </div>
            </div>
         </td>
     </tr>

     @endforeach
 </table>



<div class="col-md-12">
    {{  $list->appends($_GET)->links()  }}
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


<script>
    (function($){
        $(function(){


            $('#ds').on('change',function(){
                //alert(location.host + '/skill?ds=' + $(this).val());
                location.href=location.protocol + "//" + location.host + '/skill?ds=' + $(this).val();
            });



        });
    })(jQuery);
</script>

@endsection
