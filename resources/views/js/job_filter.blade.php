<script>

    (function($){
        $(function(){

          var $search_phrase = $('#search_phrase');
          var $search_discipline_id = $('#search_discipline_id');
          var $search_region_id = $('#search_region_id');
          var page = 1;
              $('#status').html('Loading ...');
          var $loadMore = $('#status');
          var loading = false;

          var searchConfig = {};

          function getJobList(){
              startLoad();
              loading = true;
              $.ajax({
                  url: '{{ route("job.filter") }}?page=' + page,
                  type:'GET',
                  data: searchConfig,
                  success:function(response){

                      if (page <= 1){
                        $('#outlet').html(response);
                      }else{
                        $('#outlet').append(response);
                      }

                      stopLoad();

                      ++page;
                      loading = false;
                  }
              });
          }


          function handlePhraseSearch(){
              $search_phrase.on('keyup',function(){
                 searchConfig['search_phrase'] = $(this).val();
                 page = 1;
                 getJobList();
              });
          }

          function handleRegionSearch(){
              $search_region_id.on('change',function(){
                searchConfig['region_id'] = $(this).val();
                page = 1;
                getJobList();
              });
          }

          function handleDisciplineSearch(){
              $search_discipline_id.on('change',function(){
                  searchConfig['discipline_id'] = $(this).val();
                  page = 1;
                  getJobList();
              });
          }

          function startLoad(){
              $('#status').html('Loading ...');
          }

          function stopLoad(){
              $('#status').html(' + Load More ');
          }

          function handleLoadMore(){
            $loadMore.on('click',function(){
                // if (!loading)++page;
                getJobList();
            });
          }

          handleDisciplineSearch();
          handlePhraseSearch();
          handleRegionSearch();
          handleLoadMore();

          getJobList();

        });
    })(jQuery);

</script>
