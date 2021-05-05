<!-- Modal -->


    <div id="candidate-profile-preview" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">



                <div class="modal-header" style="background-color: #ff9636;">
                    {{--#ff9636--}}
                    <div>
                        <b style="color: #000;">Candidate Profile</b>
                    </div>
                    <button style="color: #000;" type="button" class="close" data-dismiss="modal">&times;</button>
                    <!--         <h4 class="modal-title">Modal Header</h4> -->
                </div>
                <div class="modal-body">
                    <!--         <p>Some text in the modal.</p> -->


                    <div>
                        <b data-c-prev style="cursor: pointer;font-size: 38px;position: fixed;left: 16%;top: 50%;color: #fff;z-index: 9000;" class="fas fa-arrow-left"></b>

                        <b data-c-next style="cursor: pointer;font-size: 38px;position: fixed;left: 79%;top: 50%;color: #fff;z-index: 9000;" class="fas fa-arrow-right"></b>

                    </div>

                        @php


                        @endphp


                        <div class="row">
                            <div class="col-md-12">
                                <div>
                                    <h3>Bio</h3>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12" align="right">
                                <b data-c-page style="color: #000;font-size: 15px;"></b>
                            </div>
                        </div>


                        <div class="row">



                            <div class="col-md-4">
                                <div class="col-md-12" style="text-align: left;padding: 0;">

                                    <img data-c-profile_photo src="" style="width: 100%;border-radius: 13px;/* margin-top: 1px; */margin-bottom: 6px;" alt="" />

                                </div>
                            </div>
                            <div class="col-md-8">


                                <div>
                                    <label>Name : </label>
                                    <span data-c-name>

                                    </span>
                                </div>

                                <div>
                                    <label>E-mail : </label>
                                    <span data-c-email>

                                    </span>
                                </div>


                                <div>
                                    <label>Phone Number : </label>
                                    <span data-c-phone_number>
                                    </span>
                                </div>



                                <div>
                                    <label>Address : </label>
                                    <span data-c-address>

                                    </span>
                                </div>



                                <div>
                                    <label>Gender : </label>
                                    <span data-c-gender>
                                    </span>
                                </div>




                                <div>
                                    <label>
                                        Discipline :
                                    </label>
                                    <span data-c-discipline>
                                    </span>
                                </div>

                                <div>
                                    <a data-c-cv_upload href="">Download CV</a>
                                </div>


                            </div>

                            {{--file:///C:/Users/NnamdiAlexanderAkamu/Documents/design-hc-recruit.pdf--}}



                            <div class="col-md-12" style="border-bottom: 1px solid #ddd;margin-top: 7px;margin-bottom: 11px;"></div>

                            <div class="col-md-6">


                                <div>
                                    <h3>
                                        Cover Letter
                                    </h3>
                                    <div data-c-cover_letter style="overflow-y: scroll;height: 244px;">

                                    </div>
                                </div>

                            </div>

                            <div class="col-md-6" >

                                <div>
                                    <h3>
                                        Introductory Video
                                    </h3>
                                </div>

                                <div class="col-md-12" style="padding: 0;">
                                    <video controls style="width: 100%;height: 200px;" src="" data-c-profile_video></video>
                                </div>


                            </div>




                        </div>


                        <div class="row">




                            <div class="form-group col-md-12" style="border-top: 1px solid #ddd;margin-top: 8px;padding-top: 8px;">


                                <div>
                                    <h3>Corporate Profile</h3>
                                </div>

                                <div>

                                </div>



                                <div style="font-weight: bold">

                                    Skill

                                </div>

                                <div>

                                    <ul data-c-skills>
                                    </ul>

                                </div>




                                <div style="font-weight: bold">

                                    Education

                                </div>

                                <div>

                                    <ul data-c-educations>
                                    </ul>

                                </div>


                                <div style="font-weight: bold">

                                    Work Experience

                                </div>

                                <div>

                                    <ul data-c-workExperiences>
                                    </ul>

                                </div>



                                <div style="font-weight: bold">

                                    My Documents

                                </div>

                                <div>

                                    <ul data-c-myDocuments>
                                    </ul>

                                </div>



                            </div>


                        </div>



                        {{--<div class="row">--}}
                            {{--<div class="col-md-12">--}}
                                {{--<h2>No Candidate profile created yet!</h2>--}}
                            {{--</div>--}}
                        {{--</div>--}}



                    {{--end--}}
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>


