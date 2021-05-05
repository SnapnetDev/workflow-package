@extends('layouts.main')

@section('content')
<section class="banner-area relative" id="home" style="height: 60px">
                <div class="overlay overlay-bg"></div>
                <div class="container">
                    <div class="row d-flex align-items-center justify-content-center">
                        <div class="about-content col-lg-12">
                            <h1 class="text-white">
                               Register
                            </h1>

                        </div>
                    </div>
                </div>
            </section>

<div class="container" style="margin-top:20px; ">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="
                background-color: black;
                color: #fff;
            ">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
                </div>
            </div>
        </div>
    </div>

<div class="col-lg-12" style="margin: 11.4%;"></div>
</div>


@endsection
