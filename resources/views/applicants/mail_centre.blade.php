@extends('layouts.main')

@extends('layouts.logged_user')

@section('side-bar')


@endsection

@section('inner-content')


    <style>

        @media (min-width: 992px){
            .container {
                max-width: 1103px !important;
            }
        }

        select{
            margin-top: 7px;
            margin-bottom: 19px;
        }

        label{
            font-weight: bold;
        }

    </style>



    <div class="container">
        <div class="row justify-content-center">



            <div class="col-md-12">
                @livewire('applicant-mail-centre')
            </div>


        </div>

        <div class="col-lg-12" style="margin: 11.4%;"></div>
    </div>


    {{--hidden form here--}}


@endsection


@section('script')

    @include('applicants.js')

@endsection