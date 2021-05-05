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
    Add Skill.
</div>

@include('notifications.message')

<div class="col-md-12" align="right">
    <a href="{{ route('skill.index') }}" class="btn btn-primary btn-sm" style="margin-bottom: 11px;">Back</a>
</div>

                    <form method="POST" action="{{ route('skill.store') }}">
                        @csrf
                        @method('POST')

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="name"  required autofocus>

                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('Discipline') }}</label>

                            <div class="col-md-6">
                                <select name="jb_discipline_id" class="form-control" id="">
                                    <option value="">Select Discipline</option>
                                    @foreach ($list as $item)
                                       <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>

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
