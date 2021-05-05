<!-- Modal -->
<form method="POST" action="{{ route('process.action',['user-create']) }}">
    @csrf
    <div id="create" class="modal fade" role="dialog">
        <div class="modal-dialog">

        {{--modal-lg--}}

        <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">

                    Add User.

                    <button type="button" class="close" data-dismiss="modal">&times;</button>


                </div>
                <div class="modal-body">



                    @csrf
                    @method('POST')

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label text-md-right">{{ __('Name') }}</label>

                        <div class="col-md-9">
                            <input placeholder="Name" type="text" class="form-control" name="name" value="" required autofocus required="" />
                        </div>
                    </div>



                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label text-md-right">{{ __('E-mail') }}</label>

                        <div class="col-md-9">
                            <input placeholder="E-mail" type="email" class="form-control" name="email" value="" required autofocus required />
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="" class="col-sm-3"></label>
                        <label style="text-align: left !important;" class="col-sm-9 col-form-label text-md-right">{{ __('Default User') }}
                            <input {{ ($type == 'Candidates')? ' checked ':''}} readonly placeholder="Name" type="checkbox"  name="default_user" value="1" required autofocus required />
                        </label>

                    </div>


                    <div class="form-group row">

                        <label class="col-sm-3 col-form-label text-md-right">{{ __('Role') }}</label>

                        <div class="col-md-9">
                            <select name="jb_role_id" class="form-control" id="jb_role_id">
                                <option value="">Select</option>
                                @foreach ($roles['list'] as $k2=>$v2)
                                    <option value="{{ $v2->id }}">{{ $v2->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>



                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label text-md-right">{{ __('Password') }}</label>

                        <div class="col-md-9">
                            <input placeholder="Password" type="password" class="form-control" name="password1" value="" required autofocus required />
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                        <div class="col-md-9">
                            <input placeholder="Confirm Password" type="password" class="form-control" name="password2" value="" required autofocus required />
                        </div>
                    </div>


                </div>
                <div class="modal-footer">

                    <button type="submit" class="btn btn-primary pull-left">
                        {{ __('Create') }}
                    </button>



                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
</form>
