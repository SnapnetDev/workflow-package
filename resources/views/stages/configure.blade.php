<script id="stage-configure" type="text/html">

  <span>


      {{--table-listing modal--}}

      @include('reuse.modal_start',[
        "id"=>"stage-list",
        "title"=>"Configure Stages",
        "size"=>"lg"
      ])

      <div class="col-md-12">


          <div class="col-md-12" align="right" style="margin-bottom: 11px;">
              <a href="#" data-toggle="modal" data-target="#stage-create" class="btn btn-sm btn-success">Add Stage</a>
          </div>

          <table class="table-striped table">

              <tr>

                  <th>
                      Stage Name
                  </th>
                  <th>
                      Position
                  </th>
                  <th>
                      Percentage
                  </th>
                  <th>
                      Actions
                  </th>

              </tr>

          </table>


      </div>

      @include('reuse.modal_stop')



      {{--create modal--}}
      @include('reuse.modal_start',[
        "id"=>"stage-create",
        "title"=>"Stage Create",
        "size"=>"md"
      ])

      <form action="" method="post">

          @csrf

      <div class="col-md-12">

          <div class="col-md-12" style="margin-top: 11px;">
              <label for="">
                  Stage Name
              </label>
              <input type="text" class="form-control" name="stage_name" />
          </div>

          <div class="col-md-12" style="margin-top: 11px;">
              <label for="">
                  Position
              </label>
              <input type="text" class="form-control" name="position" />
          </div>

          <div class="col-md-12" style="margin-top: 11px;">
              <label for="">
                  &nbsp;
              </label>
              <button class="btn btn-sm btn-success">Create</button>
          </div>

      </div>

      </form>

      @include('reuse.modal_stop')



      {{--edit modal--}}

      {{--create modal--}}
      @include('reuse.modal_start',[
        "id"=>"stage-edit",
        "title"=>"Stage Edit",
        "size"=>"md"
      ])

      <form action="" method="post">

          @csrf

          @method('PUT')

      <div class="col-md-12">

          <div class="col-md-12">
              <label for="">
                  Stage Name
              </label>
              <input type="text" class="form-control" name="stage_name" />
          </div>

          <div class="col-md-12" style="margin-top: 11px;">
              <label for="">
                  Position
              </label>
              <input type="text" readonly class="form-control" name="position" />
          </div>

          <div class="col-md-12" style="margin-top: 11px;">
              <label for="">
                  &nbsp;
              </label>
              <button class="btn btn-sm btn-success">Update</button>
          </div>

      </div>

      </form>

      @include('reuse.modal_stop')





  </span>


</script>


<script>
    (function($){

        var $stages = $('#stage-configure').mv2m();

        $stages.hook('indexUrl',function(){

            return '{{ route('stage.index') }}';

        }).hook('container',function ($el) {

            return 'table';

        }).hook('closeModal',function ($el) {


            return $el.find('#stage-create,#stage-edit').find('[data-dismiss="modal"]').trigger('click');

        }).hook('storeUrl',function () {

            return '{{ route('stage.store') }}';

        }).hook('createModal',function ($el) {

            return $el.find('#stage-create');

        }).hook('editModal',function ($el) {

            return $el.find('#stage-edit');

        }).hook('updateUrl',function(data){

            return `{{ route('stage.update',['']) }}/${data.id}`;

        }).hook('onAppendRow',function(data){

            return `<tr>

                  <td>
                      ${data.stage_name}
                  </td>
                  <td>
                      ${data.position}
                  </td>
                  <td>
                      ${data.percentage}
                  </td>
                  <td>
                      <a href="#" id="edit" class="btn btn-sm btn-info">Edit</a>
                      <a href="#" id="delete-btn" class="btn btn-sm btn-danger">Remove</a>
                      <form id="delete" action="{{ route('stage.destroy',['']) }}/${data.id}" method="post">
                         @csrf
                         @method('DELETE')
                      </form>
                  </td>

              </tr>`;

        }).hook('onSelectRow',function(findGlobal,findLocal,data,showEditForm,submitForm){



            findLocal('#edit').on('click',function () {

                showEditForm();

            });


            findLocal('#delete-btn').on('click',function (){

               if (confirm('Do you want to confirm this action')){
                   submitForm(findLocal('#delete').get(0));
               }

            });


        }).mount(function($el){

            $('body').append($el);

        }).init().fetch();



    })(jQuery);
</script>