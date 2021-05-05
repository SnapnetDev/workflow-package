<!-- Modal -->
<form method="POST" action="{{ route('job.store') }}">
<div id="create" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">

                Create Job.

                <button type="button" class="close" data-dismiss="modal">&times;</button>


            </div>
            <div class="modal-body">



                    @csrf
                    @method('POST')

                    <div class="form-group row">
                        <label class="col-sm-12 col-form-label text-md-left">{{ __('Role') }}</label>

                        <div class="col-md-12">
                            <input id="email" type="text" class="form-control" name="role" value="" required autofocus required="">

                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-sm-12 col-form-label text-md-left">{{ __('Description') }}</label>

                        <div class="col-md-12">
                            <textarea data-editor class="form-control" name="description" required=""></textarea>

                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-sm-12 col-form-label text-md-left">{{ __('Recruitment Type') }}</label>

                        <div class="col-md-12">
                            <select name="jb_recruitment_type_id" class="form-control" required="">
                                @foreach ($jb_recruitment_type_ids as $jb_recruitment_type_id)
                                    <option value="{{$jb_recruitment_type_id->id}}">{{$jb_recruitment_type_id->name}}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-sm-12 col-form-label text-md-left">{{ __('Salary Start Range') }}</label>

                        <div class="col-md-12">
                            <input id="email" type="text" class="form-control" name="salary_start" required autofocus>

                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-sm-12 col-form-label text-md-left">{{ __('Salary Stop Range') }}</label>

                        <div class="col-md-12">
                            <input id="email" type="text" class="form-control" name="salary_stop" required autofocus>

                        </div>
                    </div>



                    <div class="form-group row">
                        <label class="col-sm-12 col-form-label text-md-left">{{ __('Location') }}</label>

                        <div class="col-md-12">
                            <input id="email" type="text" class="form-control" name="address"  required autofocus>

                        </div>
                    </div>


                    <div class="form-group row">
                        <label  class="col-sm-12 col-form-label text-md-left">{{ __('Expiry Date') }}</label>

                        <div class="col-md-12">
                            <input id="email" type="date" class="form-control" name="expiry_date"  required autofocus>

                        </div>
                    </div>




                    <div class="form-group row">
                        <label class="col-sm-12 col-form-label text-md-left">{{ __('Years Of Experience') }}</label>

                        <div class="col-md-12">
                            <input id="email" type="number" class="form-control" name="years_of_experience"  required autofocus>

                        </div>
                    </div>



                    <div class="form-group row">
                        <label class="col-sm-12 col-form-label text-md-left">{{ __('Discipline') }}</label>


                        <div class="col-md-12">

                            <select name="discipline_id" class="form-control" required="">
                                <option value="">Select</option>
                                @foreach ($discipline['list'] as $item)
                                    <option value="{{  $item->id }}">{{  $item->name }}</option>
                                @endforeach
                            </select>


                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-sm-12 col-form-label text-md-left">{{ __('Region') }}</label>

                        <div class="col-md-12">

                            <select name="region_id" class="form-control" required="">
                                <option value="">Select</option>
                                @foreach ($region['list'] as $item)
                                    <option value="{{$item->id}}">{{  $item->name  }}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>



                <div class="form-group row">
                    <label class="col-sm-12 col-form-label text-md-left">{{ __('Requires Profile Video') }}
                        <input type="checkbox" name="use_profile_video" />
                    </label>
                </div>



                    {{--<div class="form-group row mb-0">--}}
                        {{--<div class="col-md-8 offset-md-4">--}}
                        {{--</div>--}}
                    {{--</div>--}}




            </div>
            <div class="modal-footer">

                <button type="submit" class="btn btn-primary pull-left">
                    {{ __('Create Job') }}
                </button>



                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
</form>
