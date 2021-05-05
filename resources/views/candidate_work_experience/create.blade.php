<!-- Modal -->
<form method="POST" action="{{ route('process.action',['work-experience-create']) }}" enctype="multipart/form-data">

    @csrf

    <input type="hidden" name="jb_candidate_id" value="{{ $data->id }}" />

    <div id="candidate-work-experience-create" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <div>
                        <b style="color: #000;">Add Work Experience</b>
                    </div>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <!--         <h4 class="modal-title">Modal Header</h4> -->
                </div>
                <div class="modal-body">
                    <!--         <p>Some text in the modal.</p> -->

                    <div class="form-group">

                        <label>

                            Company Name

                        </label>

                        <input type="text" class="form-control" name="company_name" placeholder="Company Name" />


                    </div>




                    <div class="form-group">

                        <label>

                            Company Role

                        </label>

                        <input type="text" class="form-control" name="company_role" placeholder="Company Role" />


                    </div>


                    <div class="form-group">

                        <label>

                            Projects

                        </label>

                        <textarea class="form-control" name="role_description" placeholder="Projects"></textarea>


                    </div>


                    <div class="form-group">

                        <label>

                            Work From

                        </label>

                        <input type="date" class="form-control" name="work_from" placeholder="Work From" />


                    </div>




                    <div class="form-group">

                        <label>

                            Work To

                        </label>

                        <input type="date" class="form-control" name="work_to" placeholder="Work To" />


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
