<!-- Modal -->
<form method="POST" action="{{ route('process.action',['work-experience-update']) }}" enctype="multipart/form-data">

    @csrf

    <input type="hidden" name="id" value="{{ $v->id }}" />

    <div id="candidate-work-experience-edit{{ $v->id }}" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <div>
                        <b style="color: #000;">Update Work Experience</b>
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

                        <input type="text" class="form-control" name="company_name" placeholder="Company Name" value="{{ $v->company_name }}"/>


                    </div>




                    <div class="form-group">

                        <label>

                            Company Role

                        </label>

                        <input type="text" class="form-control" name="company_role" placeholder="Company Role" value="{{ $v->company_role }}" />


                    </div>


                    <div class="form-group">

                        <label>

                            Projects

                        </label>

                        <textarea class="form-control" name="role_description" placeholder="Projects">{{ $v->role_description }}</textarea>


                    </div>


                    <div class="form-group">

                        <label>

                            Work From

                        </label>

                        <input type="date" class="form-control" name="work_from" placeholder="Work From" value="{{ $v->work_from }}" />


                    </div>




                    <div class="form-group">

                        <label>

                            Work To

                        </label>

                        <input type="date" class="form-control" name="work_to" placeholder="Work To" value="{{ $v->work_to }}" />


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
