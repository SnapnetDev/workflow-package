
<div class="col-lg-3 sidebar">
		<div class="single-slidebar">
								<h4>Sort </h4>
								<ul class="cat-list">
							<form  style="margin: 10px;" id="searchForm" method="get">
          <input type="hidden" name="vKey" id="vKey" value="{{ csrf_token() }}">
          

          <div class="row">
            <div class="form-group" style="width:100%"  >
              <label class="control-label sm-select-label">Certification</label>
              <select class=" form-control" id="jobtype" name="jobtype">
                <option value="">-Select Option-</option>
                <option value="0">Pending</option>
                <option value="1">Approved</option>
                <option value="2">Rejected</option>
                 
              </select>
            </div>
          </div>
          <!-- <div class="row">
            <div class="form-group" style="width:100%">
              <label class="control-label sm-select-label">Employement Type</label>
              <select class=" form-control" id="emptype" name="emptype">
                <option value="">-all-</option>
                 
              </select>
            </div>
          </div>
          <div class="row">
            <div class="form-group" style="width:100%">
              <label class="control-label sm-select-label">Department</label>
              <select class=" form-control" id="deptfil" name="deptfil">
                <option value="">-all-</option>
                
              </select>
            </div>
          </div> -->
          <div class="row">
            <div class="form-group" style="width:100%">
              <label class="control-label sm-select-label">Competencies</label>
              <select class=" form-control" id="dateposted" name="dateposted">
                <option value="">-all-</option>
                <option value='{{date("Y-m-d")}}'>Today</option>
                <option value='{{date("Y-m-d", strtotime("yesterday"))}}'>Yesterday</option>
                <option value='{{date("Y-m-d", strtotime("last week"))}}'>Last week</option>
                <option value='{{date("Y-m-d", strtotime("-2 Weeks"))}}'>2 weeks</option>
                <option value='{{date("Y-m-d", strtotime("-1 Months"))}}'>Last 30 days</option>
              </select>
            </div>



          </div>

          <div class="row">
            <div class="form-group" style="width:100%">
              <label class="control-label sm-select-label">Skills</label>
              <select class="  form-control" id="location" name="location">
                <option value="">-all-</option>
                @foreach($state as $state)
                <option value="{{$state->id}}">{{$state->state}}</option>
                @endforeach
              </select>
            </div>
          </div>



          <div class="row">
            <div class="form-group" style="width:100%">
              <label class="control-label sm-select-label">Search Precision</label>
              <div id="slider"></div>
              <div id="percentage-progress" style="">&nbsp;</div>
            </div>
          </div>

<style type="text/css">
  .ui-slider-handle-escape{
    left: 63% !important; 
    border-radius: 50% !important; 
    padding: 12px !important; 
    top: -8px !important; 
    background-color: rgb(35, 32, 49) !important; 
    border: 1px solid rgb(35, 32, 49) !important;
  }
</style>           



          <div class="row">
            <button type="submit" class="btn btn-warning btn-raised btn-animate btn-animate-side"  >
              <span><i class="icon fa fa-filter" aria-hidden="true"></i>Filter</span>
            </button>
          </div>
        </form>
								</ul>
							</div>

						</div>


 