@extends('layouts.main')

@extends('layouts.logged_user')

@section('side-bar')

@endsection

@section('inner-content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

<div style="
    border-bottom: 3px solid #000000;
    margin-bottom: 17px;
    font-size: 18px;
">
    Comments
</div>

                    @include('comment.create')

                    @foreach ($list as $item)


                        @include('comment.edit')


                    @endforeach


                    <div class="col-md-12" align="right">
                      <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" style="margin-bottom: 11px;" data-target="#create">Add Comment</button>
                    </div>

 <table class="table table-striped">
     <tr>
         <th>
             Id
         </th>
         <th>
             Actions
         </th>
     </tr>
     @foreach ($list as $item)


     <tr>

        <td>
            {{ $item->id }}
        </td>

         <td>
            <div class="dropdown show">
                <button class="btn btn-success dropdown-toggle btn-sm pull-right" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    Action
                </button>

                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" x-placement="bottom-start" style="position: absolute; transform: translate3d(-5px, 38px, 0px); top: 0px; left: 0px; will-change: transform;">


                     <a  type="button" data-toggle="modal" style="margin-bottom: 11px;" data-target="#edit{{ $item->id }}" class="dropdown-item" data-backdrop="false">Modify</a>

                     <form method="post" onsubmit="return confirm('Do you want to confirm this action?')" action="{{ route('comment.destroy',$item->id) }}">

                        @csrf
                        @method('DELETE')

                     <button type="submit" class="dropdown-item btn btn-danger btn-sm" data-backdrop="false"  data-toggle="modal" data-target="#approveReject" >Remove</button>

                     </form>


                </div>
            </div>
         </td>
     </tr>

     @endforeach
 </table>



        </div>
    </div>

<div class="col-lg-12" style="margin: 11.4%;"></div>
</div>



@endsection