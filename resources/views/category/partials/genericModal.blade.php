
<div class="modal fade modal-3d-slit" id="genericModal" aria-labelledby="exampleModalTitle" role="dialog"  aria-hidden="true" style="display: none;" >

  <div class="modal-dialog modal-lg">

    <div class="modal-content" id="ddd">

      <div class="modal-header">
       <h4 class="modal-title" id="exampleFormModalLabel">{{('Description')}}</h4>
       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>

    </div>
    <div class="modal-body">
      <div id="genericdesc"></div>
    </div>


    <div class="modal-footer"> 
      <button  class="add btn btn-primary btn-outline add"  data-dismiss="modal"  >Close</button> 




    </div>
  </div>
</div>

</div>



<!-- documentView -->


<div class="modal fade modal-3d-slit" id="profileView" aria-labelledby="exampleModalTitle" role="dialog"  aria-hidden="true" style="display: none;" >

  <div class="modal-dialog modal-lg">

    <div class="modal-content" id="ddd">

      <div class="modal-header">
       <h4 class="modal-title" id="exampleFormModalLabel">{{('Applicant Profile')}}</h4>
       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>

    </div>
    <div class="modal-body">
      <div  id="applicantProfile">
        
      </div>
    </div>


    <div class="modal-footer"> 
      <button  class="add btn btn-primary btn-outline add"  data-dismiss="modal"  >Close</button> 




    </div>
  </div>
</div>

</div>





<div class="modal fade modal-3d-slit" id="approveReject" aria-labelledby="exampleModalTitle" role="dialog"  aria-hidden="true" style="display: none;" >

  <div class="modal-dialog modal-lg">

    <div class="modal-content" id="ddd">

      <div class="modal-header">
       <h4 class="modal-title" id="exampleFormModalLabel">{{('Approve or Reject Appllicant')}}</h4>
       <button type="button" onclick="unCheck()" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>

    </div>
    <div class="modal-body">
       <textarea class="wysiwyg form-control message" style="height: 200px" name="reason" placeholder="Enter Approval or Regret Message"></textarea>
    </div>


    <div class="modal-footer"> 
      <button  class=" btn btn-success btn-outline " onclick="decideApplicant(1)">Approve</button> 
      <button  class=" btn btn-danger btn-outline " onclick="decideApplicant(0)">Reject</button> 
      <button  class=" btn btn-primary btn-outline "  data-dismiss="modal" onclick="unCheck()" >Close</button> 
    </div>
  </div>
</div>

</div>



<div class="modal fade modal-3d-slit" id="mailApplicant" aria-labelledby="exampleModalTitle" role="dialog"  aria-hidden="true" style="display: none;" >

  <div class="modal-dialog modal-lg">

    <div class="modal-content" id="ddd">

      <div class="modal-header">
       <h4 class="modal-title" id="exampleFormModalLabel">{{('MAil Applicant')}}</h4>
       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true" onclick="unCheck()">×</span>
      </button>

    </div>
    <div class="modal-body">
       <textarea class="wysiwyg form-control" style="height: 200px" id="messageMail" placeholder="Enter Mail Message"></textarea>
    </div>


    <div class="modal-footer"> 
      <button  class=" btn btn-success btn-outline " onclick="sendEMail()">Send</button>  
      <button  class=" btn btn-primary btn-outline "  data-dismiss="modal" onclick="unCheck()" >Close</button> 
    </div>
  </div>
</div>

</div>


<!-- approve reject modal -->






<div class="modal fade modal-3d-slit" style="margin-top: 10%" id="loginModal" aria-labelledby="exampleModalTitle" role="dialog"  aria-hidden="true" style="display: none;" >

  <div class="modal-dialog modal-lg">

    <div class="modal-content" id="ddd">

      <div class="modal-header">
       <h4 class="modal-title" id="exampleFormModalLabel">{{('Login')}}</h4>
       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>

    </div>
    <div class="modal-body">
          <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                                @if(session()->has('login'))
                                  <span class="text text-warning" role="alert">
                                        <strong>{{ session('login') }}</strong>
                                    </span>

                                @endif

                                @if ($errors->has('email'))
                                    <span class="text text-danger" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            </div>
                        </div>
                    </form>
    </div>
    </div>
  </div>
</div>


<div class="modal fade modal-3d-slit" style="margin-top: 10%" id="registerModal" aria-labelledby="exampleModalTitle" role="dialog"  aria-hidden="true" style="display: none;" >

  <div class="modal-dialog modal-lg">

    <div class="modal-content" id="ddd">

      <div class="modal-header">
       <h4 class="modal-title" id="exampleFormModalLabel">{{('Register')}}</h4>
       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>

    </div>
    <div class="modal-body">
        <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
    </div>
    </div>
  </div>
</div>


 



