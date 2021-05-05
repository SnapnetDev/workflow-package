<!-- Modal -->
<form method="POST" action="{{ route('process.action',['skill-update']) }}" enctype="multipart/form-data">

    @csrf

    <div id="candidate-skill-edit{{ $v->id }}" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <div>
                        <b style="color: #000;">Update Education</b>
                    </div>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <!--         <h4 class="modal-title">Modal Header</h4> -->
                </div>
                <div class="modal-body">
                    <!--         <p>Some text in the modal.</p> -->

                    <div class="form-group">

                        <label>

                            Name

                        </label>

                        <input type="text" class="form-control" name="name" placeholder="Name" value="{{ $v->name }}" />

                        <input type="hidden" name="id" value="{{ $v->id  }}" />

                    </div>





                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Save</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
</form>
