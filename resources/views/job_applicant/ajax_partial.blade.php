     @foreach ($applicants as $applicant)
     
      @include('job_applicant.user_documents')
      @include('job_applicant.user_detail')

     @endforeach

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
         <th>
             Status
         </th>
         <th></th>
     </tr>
     @foreach ($applicants as $applicant)
     
     
     
     <tr>
         
         <td>
             {{$applicant->candidate->name}}
         </td>
         <td>
             {{$applicant->candidate->email}}
         </td>
         <td>
             {{$applicant->candidate->phone_number}}
         </td>

         <td>
             {{$applicant->approvedFormat()}}
         </td>

         <td>
            <div class="dropdown show">
                <button class="btn btn-success dropdown-toggle btn-sm pull-right" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    Action
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" x-placement="bottom-start" style="position: absolute; transform: translate3d(-5px, 38px, 0px); top: 0px; left: 0px; will-change: transform;"> 
                     
                     <a data-document="my-profile-{{ $applicant->id }}" class="dropdown-item" data-backdrop="false" href="#">Detail</a>
<!--                      {{ route('candidate.show',$applicant->candidate->id) }} -->
                      
                     <a data-document="my-modal-{{ $applicant->id }}" class="dropdown-item" data-backdrop="false" href="#">View Documents</a>

                     <form method="post" action="{{ route('candidatejob.update',$applicant->id) }}">
                        
                        @csrf 
                        @method('PATCH')
                        <input type="hidden" name="approved" value="1" />
                        
                     <button type="submit" class="dropdown-item btn btn-danger btn-sm" data-backdrop="false"  data-toggle="modal" data-target="#approveReject" >Approve</button> 

                     </form>




                     <form method="post" action="{{ route('candidatejob.update',$applicant->id) }}">
                        
                        @csrf 
                        @method('PATCH')
                        <input type="hidden" name="approved" value="0" />
                        
                     <button type="submit" class="dropdown-item btn btn-danger btn-sm" data-backdrop="false"  data-toggle="modal" data-target="#approveReject" >Unapprove</button> 

                     </form>

                </div>
            </div>             
         </td>
     </tr>

     @endforeach
 </table>           


<script>


 (function($){
   $(function(){

	    $('[data-document]').each(function(){

	    	var id = $(this).data('document');
	    	
	    	 $(this).on('click',function(){

		    	 $('#' + id).modal();

		     });

	    });

	});
 })(jQuery);


</script>


<div class="col-md-12">
    {{$applicants->links()}}
</div>

@include('job.save_search_filter')



