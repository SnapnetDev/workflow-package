<!-- Modal -->
<form method="POST" action="{{ route('process.action',['filter-update']) }}">
    @csrf
    <input type="hidden" name="id" value="{{ $item->id }}"/>
    <div id="filter-edit{{ $item->id }}" class="modal fade" role="dialog">
        <div class="modal-dialog">

        {{--modal-lg--}}



        <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">

                    Update Filters.

                    <button type="button" class="close" data-dismiss="modal">&times;</button>


                </div>
                <div class="modal-body">

                    @csrf
                    @method('POST')

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label text-md-right">{{ __('Name') }}</label>

                        <div class="col-md-10">
                            <input readonly disabled placeholder="Name" type="text" class="form-control" name="name" value="{{ $item->name }}" required autofocus required="" />
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label text-md-right">{{ __('Keywords') }}</label>

                        <div class="col-md-10">

                            @php

                              $r = explode('_comma_', $item->keywords);

                            @endphp

                            <select name="keywords[]"  data-s2 multiple class="form-control">
                                @foreach ($r as $k=>$v)
                                <option value="{{ $v  }}" selected>{{ $v }}</option>
                                @endforeach
                            </select>

                            {{--<textarea placeholder="Keywords" class="form-control" name="keywords" required autofocus required="">{{ $item->keywords }}</textarea>--}}
                        </div>
                    </div>


                </div>
                <div class="modal-footer">

                    <button type="submit" class="btn btn-primary pull-left">
                        {{ __('Update') }}
                    </button>


                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
</form>
