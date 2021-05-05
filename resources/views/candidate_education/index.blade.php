<div class="card">


    <div class="col-md-12">
        <h2>Education</h2>
    </div>

    @include('candidate_education.create')

    <div class="col-md-12" align="right">
        <a data-toggle="modal" data-target="#candidate-education-create" href="#" class="btn btn-sm btn-info" style="margin-bottom: 5px;">Add Education</a>
    </div>

    <div class="col-md-12">

        <table class="table">


            <tr>

                <th>
                    Name
                </th>
                <th>
                    Qualifications
                </th>

                <th>
                    Date From
                </th>

                <th>
                    Date To
                </th>

                <th>
                    Actions
                </th>

            </tr>

            @foreach ($education['list'] as $k=>$v)

                @include('candidate_education.edit')

                <tr>

                    <td>
                        {{ $v->name }}
                    </td>
                    <td>
                        {{ $v->qualifications }}
                    </td>
                    <td>
                        {{ $v->date_from }}
                    </td>
                    <td>
                        {{ $v->date_to }}
                    </td>

                    <td>

                        <a data-toggle="modal" data-target="#candidate-education-edit{{ $v->id }}" href="#" class="btn btn-sm btn-warning">Edit</a>

                        <form style="display: inline-block;" onsubmit="return confirm('Do you want to proceed with this action?')" action="{{ route('process.action',['education-delete']) }}" method="post">
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