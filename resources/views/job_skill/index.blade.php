                    <div style="border-bottom: 1px solid #000;" id="job-skill">
                        <b style="color: #000;">Required Skills (Based On Discipline)</b>
                    </div>

                    <div class="col-lg-12">

                        <table class="table">
                            <tr>
                                <th>Name</th>
                                <th></th>
                            </tr>
                            @foreach ($skills as $jobSkill)
                             <tr>
                                 <td>{{$jobSkill->name}}</td>
                             </tr>
                            @endforeach
                        </table>


                    </div>
