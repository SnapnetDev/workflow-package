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
    Update Profile.
</div>

@include('notifications.message')

            
                    <form method="POST" action="/user-profile/{{Auth::user()->id}}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="_none_" value="{{ $user->email }}" required autofocus readonly>

                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('Full Name') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="name" value="{{ $user->name }}" required autofocus>

                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('Gender') }}</label>

                            <div class="col-md-6">
                                <select data-value="{{$user->sex}}" name="sex" class="form-control">
                                    <option value="M">Male</option>
                                    <option value="F">Female</option>
                                </select>

                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('Date Of Birth') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="date" class="form-control" name="dob" value="{{ $user->dob }}" required autofocus>

                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="address" value="{{ $user->address }}" required autofocus>

                            </div>
                        </div>



                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update Profile') }}
                                </button>

                            </div>
                        </div>
                    </form>
                
        </div>
    </div>

<div class="col-lg-12" style="margin: 11.4%;"></div>
</div>

@endsection
