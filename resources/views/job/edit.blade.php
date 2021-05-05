<!-- Modal -->
@php
  $data = $job;
@endphp
<form method="POST" action="{{ route('job.update',$data->id) }}">


    <div id="edit{{ $data->id }}" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">

                @csrf
                @method('PATCH')

                <input type="hidden" name="id" value="{{ $data->id }}" />


                <div class="modal-header">

                    Edit Job.

                    <button type="button" class="close" data-dismiss="modal">&times;</button>


                </div>
                <div class="modal-body">



                    <div class="form-group row">
                        <label  class="col-sm-12 col-form-label text-md-left" style="font-weight: bold;">{{ __('Code#') }}</label>
                        <div class="col-md-12">
                            <label for="" class="col-form-label text-md-right" style="font-weight: bold;">
                                {{ $data->code }}
                            </label>
                        </div>
                    </div>



                    <div class="form-group row">
                        <label  class="col-sm-12 col-form-label text-md-left">{{ __('Role') }}</label>

                        <div class="col-md-12">
                            <input id="email" type="text" class="form-control" name="role" value="{{ $data->role }}" required autofocus>

                        </div>
                    </div>


                    <div class="form-group row">
                        <label  class="col-sm-12 col-form-label text-md-left">{{ __('Description') }}</label>

                        <div class="col-md-12">
                            <textarea data-editor class="form-control" name="description">{{$data->description}}</textarea>

                        </div>
                    </div>


                    <div class="form-group row">
                        <label  class="col-sm-12 col-form-label text-md-left">{{ __('Recruitment Type') }}</label>

                        <div class="col-md-12">
                            <select data-value="{{$data->jb_recruitment_type_id}}" name="jb_recruitment_type_id" class="form-control" required="">
                                @foreach ($jb_recruitment_type_ids as $jb_recruitment_type_id)
                                    <option value="{{$jb_recruitment_type_id->id}}">{{$jb_recruitment_type_id->name}}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>



                    <div class="form-group row">
                        <label  class="col-sm-12 col-form-label text-md-left">{{ __('Salary Start Range') }}</label>

                        <div class="col-md-12">
                            <input id="email" type="text" class="form-control" name="salary_start" required autofocus value="{{$data->salary_start}}">

                        </div>
                    </div>


                    <div class="form-group row">
                        <label  class="col-sm-12 col-form-label text-md-left">{{ __('Salary Stop Range') }}</label>

                        <div class="col-md-12">
                            <input id="email" type="text" class="form-control" name="salary_stop"  autofocus value="{{$data->salary_stop}}">

                        </div>
                    </div>



                    <div class="form-group row">
                        <label  class="col-sm-12 col-form-label text-md-left">{{ __('Location') }}</label>

                        <div class="col-md-12">
                            <textarea class="form-control" name="address" required="">{{ $data->address }}</textarea>
                        </div>
                    </div>



                    <div class="form-group row">
                        <label  class="col-sm-12 col-form-label text-md-left">{{ __('Expiry Date') }}</label>

                        <div class="col-md-12">
                            <input id="email" type="date" class="form-control" name="expiry_date"  required autofocus value="{{$data->expiry_date}}">

                        </div>
                    </div>



                    <div class="form-group row">
                        <label  class="col-sm-12 col-form-label text-md-left">{{ __('Years Of Experience') }}</label>

                        <div class="col-md-12">
                            <input id="email" type="number" class="form-control" name="years_of_experience"  required autofocus value="{{$data->years_of_experience}}">

                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-sm-12 col-form-label text-md-left">{{ __('Discipline') }}</label>


                        <div class="col-md-12">

                            <select data-value="{{  $data->discipline_id }}" name="discipline_id" class="form-control" required="">
                                @foreach ($discipline['list'] as $item)
                                    <option value="{{  $item->id }}">{{  $item->name }}</option>
                                @endforeach
                            </select>


                        </div>
                    </div>


                    <div class="form-group row">
                        <label  class="col-sm-12 col-form-label text-md-left">{{ __('Region') }}</label>

                        <div class="col-md-12">

                            <select data-value="{{ $data->region_id }}" name="region_id" class="form-control" required="">
                                @foreach ($region['list'] as $item)
                                    <option value="{{$item->id}}">{{  $item->name  }}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-12 col-form-label text-md-left">{{ __('Requires Profile Video') }}
                            <input type="checkbox" name="use_profile_video" {{ !empty($data->use_profile_video)? ' checked=checked ' : '' }} />
                        </label>
                    </div>


                </div>
                <div class="modal-footer">

                    <button type="submit" class="btn btn-primary btn-sm">
                        {{ __('Update Job') }}
                    </button>

                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
</form>
