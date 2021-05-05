<!-- Modal -->
<form method="POST" action="{{ route('process.action',['education-create']) }}" enctype="multipart/form-data">

    @csrf

    <input type="hidden" name="jb_candidate_id" value="{{ $data->id }}" />

    <div id="candidate-education-create" class="modal fade" role="dialog">
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


                    <div class="form-group">

                        <label>

                            Qualifications

                        </label>

                        <textarea type="text" class="form-control" name="qualifications" placeholder="Qualifications"></textarea>



                    </div>



                    <div class="form-group">

                        <label>

                            Date From

                        </label>

                        <input type="date" class="form-control" name="date_from" placeholder="Date From" />


                    </div>



                    <div class="form-group">

                        <label>

                            Date To

                        </label>

                        <input type="date" class="form-control" name="date_to" placeholder="Date To" />


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
