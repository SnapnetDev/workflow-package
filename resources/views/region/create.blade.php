@extends('layouts.main')

@extends('layouts.logged_user')

@section('inner-content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">


<div style="
    border-bottom: 3px solid #8c76f7;
    margin-bottom: 17px;
    font-size: 18px;
">
    Add Region.
</div>

@include('notifications.message')

<div class="col-md-12" align="right">
    <a href="{{ route('region.index') }}" class="btn btn-primary btn-sm" style="margin-bottom: 11px;">Back</a>
</div>

                    <form method="POST" action="{{ route('region.store') }}">
                        @csrf
                        @method('POST')

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name"  required autofocus>

                            </div>
                        </div>





                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Create') }}
                                </button>

                            </div>
                        </div>
                    </form>

        </div>
    </div>

<div class="col-lg-12" style="margin: 11.4%;"></div>
</div>

@endsection
