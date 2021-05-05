
<div class="col-lg-3 sidebar">
		<div class="single-slidebar">
								<h4>Sort </h4>
								<ul class="cat-list">
							<form  style="margin: 10px;" id="searchForm" method="get" action="{{ url('/') }}">
          <input type="hidden" name="vKey" id="vKey" value="{{ csrf_token() }}">
          <div class="row">
            <div class="form-group" style="width:100%">
              <label class="control-label sm-select-label">Years of Experience</label>
              <select class=" form-control" id="experience" name="experience">
                <option value="">-all-</option>
                <option value="1">Entry Level</option>
                <option value="2">1 - 3 Years</option>
                <option value="3">3 - 5 Years</option>
                <option value="4">5 - 7 Years</option>
                <option value="5">7 - 10 Years</option>
                <option value="6">10 - 15 Years</option>
                <option value="7">15+</option>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="form-group" style="width:100%"  >
              <label class="control-label sm-select-label">Job Type</label>
              <select class=" form-control" id="jobtype" name="jobtype">
                <option value="">-all-</option>
                   @foreach($level as $level)
                <option value="{{$level->id}}">{{$level->level}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="row">
            <div class="form-group" style="width:100%"  >
              <label class="control-label sm-select-label">Status</label>
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
              <label class="control-label sm-select-label">Date Posted</label>
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
              <label class="control-label sm-select-label">Location</label>
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
            </div>
          </div>
           


          <div class="row">
            <button type="submit" class="btn btn-warning btn-raised btn-animate btn-animate-side"  >
              <span><i class="icon fa fa-filter" aria-hidden="true"></i>Filter</span>
            </button>
          </div>
        </form>
								</ul>
							</div>

						</div>


