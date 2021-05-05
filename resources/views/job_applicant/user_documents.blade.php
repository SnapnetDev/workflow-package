<!-- Modal -->
<div id="my-modal-{{ $applicant->id }}" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
      
      
      <div>
        <b style="color: #000;">Uploaded Documents</b>
      </div>
      
      
      
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
      </div>
      <div class="modal-body">
<!--         <p>Some text in the modal.{{ $applicant->id }}</p> -->
        
        
  <div class="col-md-12" style="padding: 0;">
   
    <table class="table">
     
     
       <tr>
      
         <th>
             Name
         </th>
         <th>
            File
         </th>
               
      </tr>
      
      @foreach ($applicant['documents']['list'] as $k1=>$v1)
      
      

       <tr>
      
         <td>
             {{ $v1->name }}
         </td>
         <td>
           <a target="_blank" class="btn btn-sm btn-default" href="{{ asset('uploads/' . $v1->file) }}">
             <b>Download</b>
           </a>
         </td>
         
      
      </tr>
      
      @endforeach
      
      
    
    
    
    </table>
   
  </div>	
        
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>