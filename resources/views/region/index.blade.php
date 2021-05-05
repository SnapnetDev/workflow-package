@extends('layouts.main')

@extends('layouts.logged_user')

@section('inner-content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

                <!-- <div class="card-header">{{ __('Change Password') }}</div> -->

<div style="
    border-bottom: 3px solid #8c76f7;
    margin-bottom: 17px;
    font-size: 18px;
">
    Regions
</div>

@include('notifications.message')

<div class="col-md-12" align="right">
    <a href="{{ route('region.create') }}" class="btn btn-primary btn-sm" style="margin-bottom: 11px;">Add Region</a>
</div>



<table class="table">
    <tr>
        <th>
            Name
        </th>
        <th>
            Operations
        </th>
    </tr>
    @foreach ($list as $item)
      <tr>
          <td>
              {{ $item->name }}
          </td>
          <td>
              <a href="{{ route('region.edit',[$item->id]) }}" class="btn btn-sm btn-warning">Edit</a>
          </td>
      </tr>
    @endforeach
</table>



        </div>
    </div>

<div class="col-lg-12" style="margin: 11.4%;"></div>
</div>

@endsection
