<form action="" method="post">
    @csrf
<!-- Modal -->

<div id="candidate-onboard-to-hcm" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">



            <div class="modal-header" style="background-color: #ff9636;">
                {{--#ff9636--}}
                <div>
                    <b style="color: #000;">Onboard To HC-Matrix</b>
                </div>
                <button style="color: #000;" type="button" class="close" data-dismiss="modal">&times;</button>
                <!--         <h4 class="modal-title">Modal Header</h4> -->
            </div>
            <div class="modal-body">
                <!--         <p>Some text in the modal.</p> -->



                <div class="row">


                    <div class="col-md-12">

                        <div class="form-group">
                            <label for="">
                                Grade
                            </label>
                            <select name="grades" id="" class="form-control">
                                <option value="">--Select--</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">
                                Company
                            </label>
                            <select name="departments" id="" class="form-control">
                                <option value="">--Select--</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">
                                Branch
                            </label>
                            <select name="departments" id="" class="form-control">
                                <option value="">--Select--</option>
                            </select>
                        </div>


                        <div class="form-group">
                            <label for="">
                                Department
                            </label>
                            <select name="departments" id="" class="form-control">
                                <option value="">--Select--</option>
                            </select>
                        </div>


                        <div class="form-group">
                            <label for="">
                                E-mail
                            </label>

                            <div class="col-md-12" id="hcm-email">

                            </div>

                        </div>

                    </div>





                </div>




                {{--end--}}
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success" data-dismiss="modal">On-Board</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
</form>