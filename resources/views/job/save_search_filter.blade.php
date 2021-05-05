<div class="col-md-12">
    <form target="background_process" method="post" action="{{ route('save.search.filter') }}">  
        @csrf
        <div class="form-group" style="margin-bottom: 0;"><label style="font-weight: bold;text-decoration: underline;">Save Sorted Data To Group Filter</label></div>
        <div class="form-group">
            <select class="form-control" name="jb_filter_group_id" required="">
                <option value="">--Select Group Filter--</option>
                @foreach ($filterGroups as $filterGroup)
                <option value="{{$filterGroup->id}}">{{$filterGroup->name}}</option>
                @endforeach
            </select>
            <!-- <input type="text" name="" class="form-control" /> -->
        </div>
        <div class="form-group" align="right">
            <button id="btn" class="btn btn-primary">Save</button>
        </div>
        @foreach ($filters as $name=>$filter)
         @if (is_array($filter))
             @foreach ($filter as $k=>$v)
               <input type="hidden" name="{{$name}}[]" value="{{$v}}" /> 
             @endforeach
         @else
               <input type="hidden" name="{{$name}}" value="{{$filter}}" /> 
         @endif    
        @endforeach
    </form>
<iframe style="display: none;" name="background_process" id="background_process"></iframe>
<script type="text/javascript">
    (function($){
        $(function(){
           
          $('#form').on('submit',function(){
             $('#btn').html('Saving Filtered Records ...').attr('disabled',1);
          }); 
          
          $('#background_process').on('load',function(){
             // $('#btn').html('Saved.');
             $('#btn').html('Saved.').removeAttr('disabled');
             setTimeout(function(){
              $('#btn').html('Save');
             },1000);
          });

          $('#right-tool-bar').show();

        });
    })(jQuery);
</script>    
</div>