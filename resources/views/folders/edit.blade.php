<!-- dialog -->
<form action="{{ route('app.exec',['update-folder']) }}" method="post">

    @csrf

    <input type="hidden" name="id" value="{{ $item->id }}" />

    <div class="modal fade" id="profileView{{ $item->id }}" aria-labelledby="exampleModalTitle" role="dialog">

        <div class="modal-dialog">


            <div class="modal-content">


                <div class="modal-header">

                    Update Folder

                    <button type="button" class="close" data-dismiss="modal">×</button>


                </div>
                <div class="modal-body">


                    <div class="form-group row">
                        <label class="col-sm-12 col-form-label text-md-left" style="font-weight: bold;">Folder Name</label>
                        <div class="col-md-12">
                            <input  type="text" class="form-control" name="name" value="{{ $item->name }}" required="" autofocus="" />
                        </div>
                    </div>


                </div>
                <div class="modal-footer">

                    <button type="submit" class="btn btn-primary btn-sm">
                        Update
                    </button>

                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

            <!-- [end] -->
        </div>
    </div>
    <!-- dialog -->
</form>