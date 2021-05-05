                    <div style="border-bottom: 1px solid #000;" id="job-certification">
                        <b style="color: #000;">Required Certificates</b>
                    </div>

                    <div class="col-lg-12">

                        <table class="table">
                            <tr>
                                <th>Name</th>
                                <th></th>
                            </tr>
                            @foreach ($data->jobCertifications as $jobCertification)
                             <tr>
                                 <td>{{$jobCertification->certification->name}}</td>
                                 <td>
            <div class="dropdown show pull-right">
                <button class="btn btn-success dropdown-toggle btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    Action
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" x-placement="bottom-start" style="position: absolute; transform: translate3d(-5px, 38px, 0px); top: 0px; left: 0px; will-change: transform;">


                     <form method="post" action="{{ route('jobcertification.destroy',$jobCertification->id) }}">

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

                        <form method="post" action="{{ route('jobcertification.store') }}">
                            @csrf
                            @method('POST')

                            <input type="hidden" name="jb_job_id" value="{{ $data->id }}" />
                            <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <select class="form-control" name="jb_certification_id" style="width: 70%;display: inline-block;"  required>
                                    <option value="">--Select Certification--</option>
                                    @foreach ($certifications as $certification)
                                    <option value="{{$certification->id}}">{{$certification->name}}</option>
                                    @endforeach
                                </select>

                                <button type="submit" class="btn btn-primary btn btn-sm" style="margin-top: -4px;">
                                    {{ __(' + ') }}
                                </button>


                            </div>
                            </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-2" align="right">

                            </div>
                        </div>

                        </form>




                    </div>
