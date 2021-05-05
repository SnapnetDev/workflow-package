<!-- Modal -->
<form method="POST" action="{{ route('process.action',['setting-update']) }}">
    @csrf
    <input type="hidden" name="id" value="{{ $item->id }}"/>
    <div id="setting-edit{{ $item->id }}" class="modal fade" role="dialog">
        <div class="modal-dialog">

        {{--modal-lg--}}



        <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">

                    Update Setting.

                    <button type="button" class="close" data-dismiss="modal">&times;</button>


                </div>
                <div class="modal-body">

                    @csrf
                    @method('POST')

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label text-md-right">{{ __('Name') }}</label>

                        <div class="col-md-10">
                            <input readonly disabled placeholder="Name" type="text" class="form-control" value="{{ $item->name }}" required autofocus required="" />
                        </div>
                    </div>

                    <input type="hidden" name="name" value="{{ $item->name }}"/>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label text-md-right">{{ __('Value') }}</label>

                        <div class="col-md-10">
                            <input id="in-val{{ $item->id }}" placeholder="Value" type="text" class="form-control" name="value" value="{{ $item->value }}" required autofocus required="" />
                        </div>
                    </div>


                </div>
                <div class="modal-footer">

                    @if ($item->name == 'token')
                        {{--gen-key--}}
                        <button type="button" id="gen-key{{ $item->id }}" onclick="genKey{{ $item->id }}(this)" class="btn btn-warning pull-left">
                            {{ __('Generate Key') }}
                        </button>
                    @endif

                    <button type="submit" class="btn btn-primary pull-left">
                        {{ __('Update') }}
                    </button>


                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
</form>
<script>
    function genKey{{ $item->id }}($ref){
         var $el = $('#in-val{{ $item->id }}');
         // alert('called');
        $ref = $($ref);
        $ref.html('Generating...');
         $.ajax({

             url:'{{ route('gen.key') }}',
             type:'GET',
             success:function(response){
                 // alert(response);
                 // console.log($el);
                 $el.val(response);
                 $ref.html('Generate Key');
             }


         });
    }
</script>
