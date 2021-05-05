 
 <div id="step-5">

 	<div id="form-step-0" >
 		<div class="form-group">
            <form id="uplodaDoc">
 			<table class="table">
 				<tr>
 				
                    <td>
                        <label >Type:</label>
                     <select id="type" class="form-control type_id" name="type_id" required="">
                            <option selected="selected" value="">Select...</option>
                        @foreach($doctypes as $type)
                            <option value="{{$type->id}}">{{$type->docname}}</option> 
                        @endforeach
                    </select>  
                    </td> 
                     <td>
                        <label >Upload:</label>
                        <input type="file" class="form-control document" name="document"  required> 
                    </td>                 
 				</tr>
                
 			</table>
            </form>
            <table class="table">
                <tr>
                    <td>
                        <div class="progress ">
                            <div class="progress-bar bg-info" id="progress">
                                
                            </div>
                        </div>
                    </td>
                </tr>
            </table>
  <button  style="margin-left: 9px;" class="btn btn-md btn-info"  onclick="stepFive(0)">Upload</button>
                

                         @if(count($documents)>0)
            <table class="table table-striped" style="margin-top: 20px;">
                <tr> 
                    <td> Type</td> 
                    <td>Action</td>
                </td>
                </tr>
                @foreach($documents as $document)
                <tr> 
                      <td>  {{$document->documenttype->docname}} </td> 
                         <td>
                            <div class="dropdown">
                                <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Action
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"> 
                                     <a class="dropdown-item" target="_blank" href="{{url('job')}}/download?id={{$document->id}}"  >Download Document</a> 
                                    <a class="dropdown-item" href="{{url('job')}}/delete?model=document&id={{$document->id}}&url=appllyToJob?job_id={{isset($_GET['job_id'])? $_GET['job_id'] : 0}}#step-5">Delete</a> 
                                </div>
                            </div>


                        </td>  


                </tr>
                @endforeach
            </table>
            @endif
 		</div>
 	</div>

 </div>
 <script type="text/javascript">
 	 function stepFive(type){
                submitJobcard('uplodaDoc','{{url('job')}}','progress');
    	 }
function loadDocument(url){
    window.location=url;
}
 function submitJobcard(formid,url,progress){
     formdata= new FormData($('#'+formid)[0]);
     formdata.append('_token','{{csrf_token()}}');
     formdata.append('type','stepFive');
     formdata.append('user_id','{{Auth::user()->id}}');
     $.ajax({
        url: url,
        type: 'POST',
        data: formdata,
        cache: false,
        contentType: false,
        processData: false,
        success:function(data,status,xhr){
            if(data.status=='success'){
                toastr.success(data.message);
                setTimeout(function(){
                    window.location.reload();

                },2000);
                return;
            }
            return toastr.error(data.message);
        },
        xhr: function() {
            var myXhr = $.ajaxSettings.xhr();
            if (myXhr.upload) {
                // For handling the progress of the upload
                myXhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                        percent=Math.round((e.loaded/e.total)*100,2);
                        $('#'+progress).css('width',percent+'%');
                        $('#'+progress+'_text').text(percent+'%');
                    }
                } , false);
            }
            return myXhr;
        }
    });

 }
 </script>