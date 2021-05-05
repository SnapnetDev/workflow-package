<!-- Modal -->
<form method="POST" action="{{ route('process.action',['skill-create']) }}" enctype="multipart/form-data">

    @csrf

    <input type="hidden" name="jb_candidate_id" value="{{ $data->id }}" />

    <div id="candidate-skill-create" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <div>
                        <b style="color: #000;">Add Education</b>
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

                        <input type="text" class="form-control" name="name" placeholder="Name" />


                    </div>




                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Add</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
</form>
