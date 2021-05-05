<!-- Modal -->
<form method="POST" action="{{ route('process.action',['setting-create']) }}">
    @csrf
    <div id="setting-create" class="modal fade" role="dialog">
        <div class="modal-dialog">

        {{--modal-lg--}}

        <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">

                    Create Setting.

                    <button type="button" class="close" data-dismiss="modal">&times;</button>


                </div>
                <div class="modal-body">



                    @csrf
                    @method('POST')

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label text-md-right">{{ __('Name') }}</label>

                        <div class="col-md-10">
                            <input placeholder="Name" type="text" class="form-control" name="name" value="" required autofocus required="" />
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label text-md-right">{{ __('Value') }}</label>

                        <div class="col-md-10">
                            <input placeholder="Value" type="text" class="form-control" name="value" value="" required autofocus required="" />
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
