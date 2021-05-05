<!-- Modal -->
<form method="POST" action="{{ route('process.action',['education-update']) }}" enctype="multipart/form-data">

    @csrf

    <div id="candidate-education-edit{{ $v->id }}" class="modal fade" role="dialog">
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


                    <div class="form-group">

                        <label>

                            Qualifications

                        </label>

                        <textarea type="text" class="form-control" name="qualifications" placeholder="Qualifications">{{ $v->qualifications }}</textarea>



                    </div>



                    <div class="form-group">

                        <label>

                            Date From

                        </label>

                        <input type="date" class="form-control" name="date_from" placeholder="Date From" value="{{ $v->date_from }}" />


                    </div>



                    <div class="form-group">

                        <label>

                            Date To

                        </label>

                        <input type="date" class="form-control" name="date_to" placeholder="Date To" value="{{ $v->date_to }}" />


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
