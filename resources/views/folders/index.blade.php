@extends('layouts.main')

@extends('layouts.logged_user')

@section('inner-content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

            <!-- <div class="card-header">{{ __('Change Password') }}</div> -->

                <div style="
    border-bottom: 3px solid #000;
    margin-bottom: 17px;
    font-size: 18px;
">
                    Candidate Folders
                </div>

                <div class="col-md-12" align="right">
                    <a data-target="#profileView" data-toggle="modal" href="#" class="btn btn-info btn-sm" style="margin-bottom: 11px;">
                        Add Folder
                    </a>
                </div>


                @include('notifications.message')


                <table class="table table-striped">

                    <tr>
                        <th>
                            Folder Name
                        </th>
                        <th>
                            Actions
                        </th>
                    </tr>

                    @foreach ($list as $item)

                        <tr>
                            <td>
                                {{ $item->name }}
                            </td>
                            <td>
                                <a data-toggle="modal" data-target="#profileView{{ $item->id }}" href="#" class="btn btn-sm btn-primary">Edit</a>
                                <form method="post" onsubmit="return confirm('Do you want to remove this folder?');" style="display: inline-block;" action="{{ route('app.exec',['update-folder']) }}">

                                    @csrf

                                    <input type="hidden" name="remove" value="1" />

                                    <input type="hidden" name="id" value="{{ $item->id }}" />

                                    <button class="btn btn-sm btn-danger">Remove</button>

                                </form>
                            </td>
                        </tr>

                    @endforeach


                </table>




            </div>
        </div>

        <div class="col-lg-12" style="margin: 11.4%;"></div>
    </div>


  @include('folders.create')

  @foreach ($list as $item)

      @include('folders.edit')

  @endforeach


@endsection
