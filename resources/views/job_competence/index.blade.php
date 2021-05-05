                    <div style="border-bottom: 1px solid #000;" id="job-competence">
                        <b style="color: #000;">Required Competencies</b>
                    </div>

                    <div class="col-lg-12">

                        <table class="table">
                            <tr>
                                <th>Name</th>
                                <th></th>
                            </tr>
                            @foreach ($job->jobCompetencies as $jobCompetence)
                             <tr>
                                 <td>{{$jobCompetence->competence->name}}</td>
                                 <td>
            <div class="dropdown show pull-right">
                <button class="btn btn-success dropdown-toggle btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    Action
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" x-placement="bottom-start" style="position: absolute; transform: translate3d(-5px, 38px, 0px); top: 0px; left: 0px; will-change: transform;">


                     <form method="post" action="{{ route('jobcompetence.destroy',$jobCompetence->id) }}">

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

                        <form method="post" action="{{ route('jobcompetence.store') }}">
                            @csrf
                            @method('POST')
                            <input type="hidden" name="jb_job_id" value="{{$job->id}}" />
                            <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <select class="form-control" name="jb_competence_id" style="width: 70%;display: inline-block;"  required>
                                    <option value="">--Select Competence--</option>
                                    @foreach ($competencies as $competence)
                                    <option value="{{$competence->id}}">{{$competence->name}}</option>
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
