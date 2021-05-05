<!-- Modal -->
<form method="POST" action="{{ route('process.action',['user-update']) }}">
    @csrf
    <input type="hidden" name="id" value="{{ $item->id }}"/>
    <div id="edit{{ $item->id }}" class="modal fade" role="dialog">
        <div class="modal-dialog">

        {{--modal-lg--}}



        <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">

                    User Account Profile

                    <button type="button" class="close" data-dismiss="modal">&times;</button>


                </div>
                <div class="modal-body">


                    @csrf
                    @method('POST')

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label text-md-right">{{ __('Name') }}</label>

                        <div class="col-md-10">
                            <input placeholder="Name" type="text" class="form-control" name="name" value="{{ $item->name }}" required autofocus required="" />
                        </div>
                    </div>



                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label text-md-right">{{ __('E-mail') }}</label>

                        <div class="col-md-10">
                            <input readonly placeholder="E-mail" type="email" class="form-control" name="email" value="{{ $item->email }}" required autofocus required="" />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-sm-3"></label>
                        <label style="text-align: left !important;" class="col-sm-9 col-form-label text-md-right">{{ __('Default User') }}
                            <input {{ ($item->role != 'admin')? ' checked ':''}} readonly placeholder="Default User" type="checkbox"  name="default_user" value="1" required autofocus required />
                        </label>

                    </div>



                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label text-md-right">{{ __('Role') }}</label>

                        <div class="col-md-10">
                            <select name="jb_role_id" class="form-control" id="jb_role_id" data-value="{{ $item->jb_role_id }}">
                                <option value="">Select</option>
                                @foreach ($roles['list'] as $k2=>$v2)
                                    <option value="{{ $v2->id }}">{{ $v2->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label text-md-right">{{ __('New Password') }}</label>

                        <div class="col-md-10">
                            <input type="password" name="password1" class="form-control" placeholder="New Password" />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                        <div class="col-md-10">
                            <input type="password" name="password2" class="form-control" placeholder="Confirm Password" />
                        </div>
                    </div>




                </div>
                <div class="modal-footer">

                    <button type="submit" class="btn btn-primary pull-left">
                        {{ __('Update Profile') }}
                    </button>



                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
</form>
