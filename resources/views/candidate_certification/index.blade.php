                    <div style="border-bottom: 1px solid #000;" id="candidate-certification">
                        <b style="color: #000;">Your Certifications</b>
                    </div>

                    <div class="col-lg-12">
                        
                        <table class="table">
                            <tr>
                                <th>Certifications</th>
                                <th>Date Certified</th>
                            </tr>
                            @foreach ($candidate->candidateCertifications as $candidateCertification)
                             <tr>
                                 <td>{{$candidateCertification->certification->name}}</td>
                                 <td>{{$candidateCertification->date_certified}}</td>
                                 <td>
            <div class="dropdown show">
                <button class="btn btn-success dropdown-toggle btn-sm pull-right" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    Action
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" x-placement="bottom-start" style="position: absolute; transform: translate3d(-5px, 38px, 0px); top: 0px; left: 0px; will-change: transform;"> 
                     

                     <form method="post" action="{{ route('candidatecertification.destroy',$candidateCertification->id) }}">
                        <!-- /candidate-educations/{candidateEducation}/delete -->
                        
                        @csrf 
                        @method('DELETE')
                        
                     <button class="dropdown-item btn btn-danger btn-sm" data-backdrop="false"  data-toggle="modal" data-target="#approveReject" >Remove</button> 

                     </form>

                </div>
            </div>                                                  
                                 </td>
                             </tr> 
                            @endforeach
                        </table>

                        <form method="post" action="{{ route('candidatecertification.store') }}">
                            <!-- /candidate-educations/add/{candidate}/{user} -->
                            @csrf
                            @method('POST')

                        <table class="table">
                            <tr>
                                <td>
                                <select class="form-control" name="jb_certification_id" style="display: inline-block;" required="">
                                    <option value="">--Select Certification--</option>
                                    @foreach ($certifications as $certification)
                                     <option value="{{$certification->id}}">{{$certification->name}}</option>
                                    @endforeach
                                </select>                                    
                                </td>
                                <td>
                                <input type="date" name="date_certified" class="form-control" style="width: 90%;display: inline-block;" required="" />                                    
                                </td>
                                <td align="right">
                                <button type="submit" class="btn btn-primary btn btn-sm" style="margin-top: -4px;">
                                    {{ __(' + ') }}
                                </button>                                    
                                </td>
                            </tr>
                        </table>

                       </form>

<!--                             <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('Certification') }}</label>

                            <div class="col-md-6">

                            </div>                                
                            </div>
 -->


<!-- candidate-certification -->

<!--                             <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('Date Certified') }}</label>

                            <div class="col-md-6">
 -->



</div>    


