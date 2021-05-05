@section('content')





<div class="col-lg-3" style="">
  <!-- search filter -->
  @yield('side-bar','')
</div>
<div class="col-lg-10 post-list" style="@yield('main-center-style','margin-left: 1%;');">
 @yield('inner-content')
</div>
@endsection
