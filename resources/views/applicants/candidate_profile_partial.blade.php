<!-- Modal -->


    <div id="candidate-profile-preview{{ $candidate->id }}" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">




                <div data-applicant-content>
                    @include('applicants.candidate_profile_inner')
                </div>


                <div class="modal-footer">

                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

