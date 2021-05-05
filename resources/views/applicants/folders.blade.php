<form action="{{ route('app.exec',['update-candidate-folder']) }}" method="post">

  @csrf

    <input type="hidden" name="candidate" id="candidate-id"  />

<!-- dialog -->
    <div class="modal fade" id="folders" aria-labelledby="exampleModalTitle" role="dialog">

        <div class="modal-dialog">


            <div class="modal-content">


                <div class="modal-header">

                    Select Folder

                    <button type="button" class="close" data-dismiss="modal">×</button>


                </div>
                <div class="modal-body">

                    <select name="folder" id="" class="form-control">
                        <option value="">--Assign--</option>
                        @foreach ($folders as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>


                    {{--<div class="form-group row">--}}
                        {{--<label class="col-sm-12 col-form-label text-md-left" style="font-weight: bold;">Folder Name</label>--}}
                        {{--<div class="col-md-12">--}}
                            {{--<input id="email" type="text" class="form-control" name="name" value="" required="" autofocus="">--}}
                        {{--</div>--}}
                    {{--</div>--}}


                </div>
                <div class="modal-footer">

                    <button type="submit" class="btn btn-primary btn-sm">
                        Assign
                    </button>

                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

            <!-- [end] -->
        </div>
    </div>
    <!-- dialog -->
</form>