<!-- Modal -->
<div id="group{{ $item->id }}" class="modal fade" role="dialog">
    <div class="modal-dialog">

{{--        modal-lg--}}

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">

                Groups

                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>
            <div class="modal-body">


                <form action="{{ route('workflow-user-group.store') }}" method="post">

                    @csrf

                    <input type="hidden" name="user_id" value="{{ $item->id }}" />

                    <div class="form-group row">

                        <label class="col-sm-12 col-form-label text-md-left">{{ __('Select Group') }}</label>

                        <div class="col-md-12">
                            <select name="workflow_group_id" class="form-control" id="">
                                <option value="">--Select--</option>
                                @foreach ($groups as $group)
                                    <option value="{{ $group->id }}">{{ $group->name }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <button class="btn btn-success btn-sm">Assign Group</button>
                        </div>
                    </div>
                </form>

                <br />

                <div class="form-group">

                    <table class="table">
                        <tr>
                            <th>
                                Group Name
                            </th>
                            <th>
                                Actions
                            </th>
                        </tr>
                        @foreach ($getUserGroup($item->id) as $group)
                            <tr>
                                <td>
                                    {{ $group->group->name }}
                                </td>
                                <td>
                                    <form onsubmit="return confirm('Do you want to confirm this action?')" style="display: inline-block;" method="post" action="{{ route('workflow-user-group.destroy',[$group->id]) }}" >
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger">Remove</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>

                </div>

            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
