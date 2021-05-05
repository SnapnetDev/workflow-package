@extends('layouts.main')

@extends('layouts.logged_user')

@section('inner-content')

<div class="container-fluid">

<div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>

</div>

    <style>
        .dashboard-card{
            border: 1px solid;
        }
    </style>


<!-- dassh -->

<div class="row">

@php
 $permissionPort = app()->make(\App\Packages\PermissionPort::class);
@endphp

            @if ($permissionPort->hasPermission('g_a'))
            <!-- Earnings (Monthly) Card Example -->

            <div class="col-xl-3 col-md-6 mb-4">
            <a style="text-decoration: none;" href="{{ route('job.index') }}">

              <div class="card border-left-primary  h-100 py-2 dashboard-card">
                  {{--shadow--}}
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jobs </div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{number_format($jobCount)}}</div>
                    </div>
                    <div class="col-auto">
                      <i style="color: #4e73df !important;" class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
             </a>
            </div>



            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <a href="{{ route('app.run',['get-applicants']) }}" style="text-decoration: none;">
              <div class="card border-left-success  h-100 py-2 dashboard-card">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Applicants (Talent Pool)</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{number_format($applicantCount)}}</div>
                    </div>
                    <div class="col-auto">
                      <i style="color: #1cc88a !important;" class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
              </a>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            {{--<div class="col-xl-3 col-md-6 mb-4">--}}
            {{--<a style="text-decoration: none;"  href="{{ route('skill.index') }}">--}}

              {{--<div class="card border-left-info  h-100 py-2 dashboard-card">--}}
                {{--<div class="card-body">--}}
                  {{--<div class="row no-gutters align-items-center">--}}
                    {{--<div class="col mr-2">--}}
                      {{--<div class="text-xs font-weight-bold text-info text-uppercase mb-1">Skills</div>--}}
                      {{--<div class="row no-gutters align-items-center">--}}
                        {{--<div class="col-auto">--}}
                          {{--<div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{number_format($skillCount)}}</div>--}}
                        {{--</div>--}}
                          {{----}}
                      {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="col-auto">--}}
                      {{--<i style="color: #999 !important;" class="fas fa-clipboard-list fa-2x text-gray-300"></i>--}}
                    {{--</div>--}}
                  {{--</div>--}}
                {{--</div>--}}
              {{--</div>--}}
              {{--</a>--}}
            {{--</div>--}}

            <!-- Pending Requests Card Example -->
            {{--<div class="col-xl-3 col-md-6 mb-4">--}}
            {{--<a style="text-decoration: none;"  href="{{ route('education.index') }}">--}}

              {{--<div class="card border-left-warning h-100 py-2 dashboard-card">--}}
                {{--<div class="card-body">--}}
                  {{--<div class="row no-gutters align-items-center">--}}
                    {{--<div class="col mr-2">--}}
                      {{--<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Institutions</div>--}}
                      {{--<div class="h5 mb-0 font-weight-bold text-gray-800">{{number_format($educationCount)}}</div>--}}
                    {{--</div>--}}
                    {{--<div class="col-auto">--}}
                      {{--<i style="color: #999 !important;" class="fas fa fa-building--}}
 {{--fa-2x text-gray-300"></i>--}}
                    {{--</div>--}}
                  {{--</div>--}}
                {{--</div>--}}
              {{--</div>--}}
             {{--</a>--}}
            {{--</div>--}}



          <!-- Pending Requests Card Example -->
          <div  class="col-xl-3 col-md-6 mb-4">
           <a style="text-decoration: none;"  href="{{ route('user.index') }}">

              <div class="card border-left-warning h-100 py-2 dashboard-card">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Users</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"> {{number_format($userCount)}} </div>
                    </div>
                    <div class="col-auto">
                      <i style="color: #f6c23e !important;" class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
           </a>
            </div>





            <!-- Regions  -->
            <div class="col-xl-3 col-md-6 mb-4">
              <a href="{{ route('region.index') }}" style="text-decoration: none;">
              <div class="card border-left-success h-100 py-2 dashboard-card">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Regions (Country / City)</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{ number_format($region['count']) }}</div>
                    </div>
                    <div class="col-auto">
                      <i style="color: #1cc88a !important;" class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
              </a>
            </div>

            <!-- Disciplines  -->
            <div class="col-xl-3 col-md-6 mb-4">
              <a href="{{ route('discipline.index') }}" style="text-decoration: none;">
              <div class="card border-left-success h-100 py-2 dashboard-card">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Disciplines</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{ number_format($discipline['count']) }}</div>
                    </div>
                    <div class="col-auto">
                      <i style="color: #1cc88a !important;" class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
              </a>
            </div>


    @else


       @if (Auth::user()->candidate()->exists())
          <!-- Pending Requests Card Example -->
          <div style="padding-left: 0;" class="col-xl-3 col-md-6 mb-4">
            <a style="text-decoration: none;" href="{{ route('app.get',['my-applications']) }}">
              <div class="card border-left-warning h-100 py-2 dashboard-card">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Applied Jobs</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"> {{number_format($jobAppliedCount)}} </div>
                    </div>
                    <div class="col-auto">
                      <i style="color: #4e73df !important;" class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div>
        @else
          <div style="padding-left: 0;" class="col-xl-3 col-md-6 mb-4">

              <div class="card border-left-warning h-100 py-2 dashboard-card">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Applied Jobs</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"> 0 </div>
                    </div>
                    <div class="col-auto">
                      <i style="color: #999 !important;" class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>

          </div>
        @endif

    @endif



          </div>



<!-- dassh -->


<div class="col-lg-12" style="margin: 11.4%;"></div>
</div>

@endsection
