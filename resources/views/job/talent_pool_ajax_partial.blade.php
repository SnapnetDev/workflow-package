


 <table class="table table-striped">
     <tr>
         <th>
             Full Name
         </th>
         <th>
             E-mail
         </th>
         <th>
             Phone Number
         </th>
         <th></th>
     </tr>
     @foreach ($candidates as $candidate)
     
     <tr>
         
         <td>
             {{$candidate->name}}
         </td>
         <td>
             {{$candidate->email}}
         </td>
         <td>
             {{$candidate->phone_number}}
         </td>


         <td>
            <div class="dropdown show">
                <button class="btn btn-success dropdown-toggle btn-sm pull-right" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    Action
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" x-placement="bottom-start" style="position: absolute; transform: translate3d(-5px, 38px, 0px); top: 0px; left: 0px; will-change: transform;"> 
                     
                     <a target="_blank" class="dropdown-item" data-backdrop="false" href="{{ route('candidate.show',$candidate->id) }}">Detail</a> 



                </div>
            </div>             
         </td>
     </tr>

     @endforeach
 </table>           


<div class="col-md-12">
	{{$candidates->links()}}
</div>

@include('job.save_search_filter')