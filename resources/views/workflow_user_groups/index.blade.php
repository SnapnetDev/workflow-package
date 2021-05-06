@extends('layouts.main')

@section('content')

    <div class="col-lg-10 post-list" style="@yield('main-center-style','margin-left: 1%;');">

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">

                    <div style="
    border-bottom: 3px solid #000000;
    margin-bottom: 17px;
    font-size: 18px;
">
                        User Groups
                    </div>

{{--                    @include('workflow.create')--}}

                    @foreach ($users as $item)


                        @include('workflow_user_groups.edit')


                    @endforeach


                    <table class="table table-striped">
                        <tr>
                            <th>
                                Name
                            </th>
                            <th>
                                E-mail
                            </th>
                            <th>
                                Actions
                            </th>
                        </tr>
                        @foreach ($users as $item)


                            <tr>

                                <td>
                                    {{ $item->name }}
                                </td>
                                <td>
                                    {{ $item->email }}
                                </td>

                                <td>
                                    <form action="">
                                    <select name="" class="form-control" id="">
                                        <option value="">--Select--</option>
                                        @foreach ($groups as $group)
                                            <option {{ $selected($userHasGroup($item,$group)) }} value="{{ $group->id }}">{{ $group->name }}</option>
                                        @endforeach
                                    </select>
                                    </form>
                                    @if ($userAnyHasGroup($item))
                                    <form action="">
                                        <button style="margin-top: 11px;" class="form-control btn btn-danger">Unassign Current Group</button>
                                    </form>
                                    @endif
                                </td>
                            </tr>

                        @endforeach
                    </table>

                    <div>
                        {{ $users->links() }}
                    </div>


                </div>
            </div>

            <div class="col-lg-12" style="margin: 11.4%;"></div>
        </div>


    </div>

@endsection