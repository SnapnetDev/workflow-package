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
     @foreach ($candidates as $data)
     
     <tr>
         
         <td>
             {{$data->candidate->name}}
         </td>
         <td>
             {{$data->candidate->email}}
         </td>
         <td>
             {{$data->candidate->phone_number}}
         </td>


         <td>
            <div class="dropdown show">
                <button class="btn btn-success dropdown-toggle btn-sm pull-right" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    Action
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" x-placement="bottom-start" style="position: absolute; transform: translate3d(-5px, 38px, 0px); top: 0px; left: 0px; will-change: transform;"> 
                     
                     <a target="_blank" class="dropdown-item" data-backdrop="false" href="{{ route('candidate.show',$data->candidate->id) }}">Detail</a> 


                     <a target="_blank" class="dropdown-item" data-backdrop="false" href="{{ route('candidatefiltergroup.edit',$data->id) }}">Leave Comment</a> 


	                     <form method="post" action="{{ route('candidatefiltergroup.destroy',$data->id) }}">
	                        
	                        @csrf 
	                        @method('DELETE')

	                     <button class="dropdown-item btn btn-danger btn-sm" data-backdrop="false"  data-toggle="modal" data-target="#approveReject" >Remove Applicant.</button> 

	                     </form>


                </div>
                <!-- candidatefiltergroup -->

            </div>             
         </td>
     </tr>

     @endforeach
 </table>           


<div class="col-md-12">
	{{$candidates->links()}}
</div>

@include('job.save_search_filter')