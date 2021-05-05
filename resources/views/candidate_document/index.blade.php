<div class="card">

  
  <div class="col-md-12">
     <h2>My Documents</h2>
  </div>

@include('candidate_document.create')
  
  <div class="col-md-12" align="right">
      <a data-toggle="modal" data-target="#candidate-document-create" href="#" class="btn btn-sm btn-info" style="margin-bottom: 5px;">Add Document</a>
  </div>
  
  <div class="col-md-12">
   
    <table class="table">
     
     
       <tr>
      
         <th>
             Name
         </th>
         <th>
            File
         </th>
         
         <th>
           Actions
         </th>
      
      </tr>
      
      @foreach ($document['list'] as $k=>$v)
      
      
       @include('candidate_document.edit')

       <tr>
      
         <td>
             {{ $v->name }}
         </td>
         <td>
           <a target="_blank" class="btn btn-sm btn-default" href="{{ asset('uploads/' . $v->file) }}">
             <b>Download</b>
           </a>
         </td>
         
         <td>
         
         <a data-toggle="modal" data-target="#candidate-document-edit{{ $v->id }}" href="#" class="btn btn-sm btn-warning">Edit</a>

           <form style="display: inline-block;" onsubmit="return confirm('Do you want to proceed with this action?')" action="{{ route('process.action',['document-delete']) }}" method="post">
             @csrf
             <input type="hidden" name="id" value="{{ $v->id }}" />
             <button  class="btn btn-sm btn-danger">Remove</button>
           </form>

         </td>
      
      </tr>
      
      @endforeach
      
      
    
    
    
    </table>
   
  </div>	



</div>