 
 <div id="step-6">

    <div id="form-step-0" >
        <div class="form-group">
            <table class="table">
                <tr>
                    <td>
                        <label >Name:</label>
                        <input type="text" class="form-control ref_name" name="ref_name"  placeholder="Enter Refree Name" required> 
                    </td>
                     <td>
                        <label >Position:</label>
                        <input type="text" class="form-control ref_prof" name="ref_prof"  placeholder="Enter Position" required> 
                    </td>                 
                </tr>
                <tr>
                    <td>
                        <label >Email:</label>
                        <input type="text" class="form-control ref_email" name="ref_email"  placeholder="Enter email" required> 
                    </td>
                  
                         <td>
                        <label >Phone Number:</label>
                        <input type="text" class="form-control ref_phone" name="ref_phone"  placeholder="Enter Phone Number" required> 
                    </td>
                   
                </tr>

            </table>
  <button  style="margin-left: 9px;" class="btn btn-md btn-info"  onclick="stepsix(0)">Save</button>
                

             @if(count($refrees)>0)
            <table class="table table-striped" style="margin-top: 20px;">
                <tr> 
                    <td> Name</td>
                    <td> Position</td>
                    <td> Email </td> 
                    <td>Phone</td>
                    <td>Action</td>
                </td>
                </tr>
                @foreach($refrees as $refree)
                <tr>
                  <td>{{$refree->ref_name}}</td>
                      <td>  {{$refree->ref_prof}} </td>
                        <td>{{$refree->ref_email}} </td>
                        <td>{{$refree->ref_phone}}</td> 
                         <td>
                            <a class="btn btn-sm btn-success" href="{{url('job')}}/delete?model=reference&id={{$refree->id}}&url=appllyToJob?job_id={{isset($_GET['job_id'])? $_GET['job_id'] : 0}}#step-6">Delete </a>
                        </td>   
                </tr>
                @endforeach
            </table>
            @endif
        </div>
    </div>

 </div>
 <script type="text/javascript">
     function stepsix(type){
 
         
            ref_name=$('.ref_name').val();
            ref_prof=$('.ref_prof').val();
            ref_email=$('.ref_email').val();
            ref_phone=$('.ref_phone').val();

           
            formData={
                ref_name:ref_name,
                ref_prof:ref_prof,
                ref_email:ref_email,
                ref_phone:ref_phone,
                user_id:'{{Auth::user()->id}}',
                _token:'{{csrf_token()}}',
                type:'stepSix'
            }
                console.log(formData);

            if(checkempty(ref_name)!=0 || checkempty(ref_prof)!=0 || checkempty(ref_email)!=0 || checkempty(ref_phone)!=0){
                    return false;
            }
            processPost(formData,'job');
            
         }
 </script>