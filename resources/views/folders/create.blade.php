<!-- dialog -->
<form action="{{ route('app.exec',['update-folder']) }}" method="post">
    @csrf
<div class="modal fade" id="profileView" aria-labelledby="exampleModalTitle" role="dialog">

    <div class="modal-dialog">


        <div class="modal-content">


            <div class="modal-header">

                Create Folder

                <button type="button" class="close" data-dismiss="modal">×</button>


            </div>
            <div class="modal-body">


                <div class="form-group row">
                    <label class="col-sm-12 col-form-label text-md-left" style="font-weight: bold;">Folder Name</label>
                    <div class="col-md-12">
                        <input id="email" type="text" class="form-control" name="name" value="" required="" autofocus="">
                    </div>
                </div>

                
            </div>
            <div class="modal-footer">

                <button type="submit" class="btn btn-primary btn-sm">
                    Create
                </button>

                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

        <!-- [end] -->
    </div>
</div>
<!-- dialog -->
</form>