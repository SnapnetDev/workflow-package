<div class="card">


    <div class="col-md-12">
        <h2>Work Experience</h2>
    </div>

    @include('candidate_work_experience.create')

    <div class="col-md-12" align="right">
        <a data-toggle="modal" data-target="#candidate-work-experience-create" href="#" class="btn btn-sm btn-info" style="margin-bottom: 5px;">Add Work Experience</a>
    </div>

    <div class="col-md-12">

        <table class="table">

            <tr>

                <th>
                    Company Name
                </th>

                <th>
                    Role
                </th>

                <th>
                    Actions
                </th>

            </tr>

            @foreach ($work_experience['list'] as $k=>$v)

                @include('candidate_work_experience.edit')

                <tr>

                    <td>
                        {{ $v->company_name }}
                    </td>


                    <td>
                        {{ $v->company_role }}
                    </td>


                    <td>

                        <a data-toggle="modal" data-target="#candidate-work-experience-edit{{ $v->id }}" href="#" class="btn btn-sm btn-warning">Edit</a>

                        <form style="display: inline-block;" onsubmit="return confirm('Do you want to proceed with this action?')" action="{{ route('process.action',['work-experience-delete']) }}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $v->id }}" />
                            <button  class="btn btn-sm btn-danger">Remove</button>
                        </form>

                    </td>

                </tr>

            @endforeach





        </table>

    </div>



</div>