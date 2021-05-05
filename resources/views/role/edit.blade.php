<!-- Modal -->
<form method="POST" action="{{ route('process.action',['update-role']) }}">
    @csrf
    <input type="hidden" name="id" value="{{ $item->id }}"/>
    <div id="edit{{ $item->id }}" class="modal fade" role="dialog">
        <div class="modal-dialog">

        {{--modal-lg--}}



        <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">

                    Update Role.

                    <button type="button" class="close" data-dismiss="modal">&times;</button>


                </div>
                <div class="modal-body">



                    @csrf
                    @method('POST')

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label text-md-right">{{ __('Name') }}</label>

                        <div class="col-md-10">
                            <input placeholder="Role Name" type="text" class="form-control" name="name" value="{{ $item->name }}" required autofocus required="" />
                        </div>
                    </div>



                </div>
                <div class="modal-footer">

                    <button type="submit" class="btn btn-primary pull-left">
                        {{ __('Update') }}
                    </button>



                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
</form>
