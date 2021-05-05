<div class="card">


    <div class="col-md-12">
        <h2>Skill</h2>
    </div>

    @include('candidate_skill.create')

    <div class="col-md-12" align="right">
        <a data-toggle="modal" data-target="#candidate-skill-create" href="#" class="btn btn-sm btn-info" style="margin-bottom: 5px;">Add Skill</a>
    </div>

    <div class="col-md-12">

        <table class="table">


            <tr>

                <th>
                    Name
                </th>

                <th>
                    Actions
                </th>

            </tr>

            @foreach ($skill['list'] as $k=>$v)

                @include('candidate_skill.edit')

                <tr>

                    <td>
                        {{ $v->name }}
                    </td>

                    <td>

                        <a data-toggle="modal" data-target="#candidate-skill-edit{{ $v->id }}" href="#" class="btn btn-sm btn-warning">Edit</a>

                        <form style="display: inline-block;" onsubmit="return confirm('Do you want to proceed with this action?')" action="{{ route('process.action',['skill-delete']) }}" method="post">
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