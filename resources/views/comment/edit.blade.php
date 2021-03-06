<!-- Modal -->
<form method="POST" action="{{ route('comment.update',[$item->id]) }}">
    <div id="edit{{ $item->id }}" class="modal fade" role="dialog">
        <div class="modal-dialog">
{{--            modal-lg--}}
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">

                    Edit Comment

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>
                <div class="modal-body">

                    @csrf
                    @method('PUT')

                    <div class="form-group row">
                        <label class="col-sm-12 col-form-label text-md-left">{{ __('ID') }}</label>

                        <div class="col-md-12">
                            <input  type="text" class="form-control" name="id" value="{{ $item->id }}" autofocus >

                        </div>
                    </div>


                </div>
                <div class="modal-footer">

                    <button type="submit" class="btn btn-primary pull-left">
                        {{ __('Update Comment') }}
                    </button>


                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
</form>