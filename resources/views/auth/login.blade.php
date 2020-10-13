@extends('layouts.app')

@section('content')
<div class="card card-authentication1 mx-auto my-5">
    <div class="card-body">
     <div class="card-content p-2">
      <div class="text-center">
        <img src="{{ asset('assets/images/logo.png') }}" style="width:100px;" alt="logo icon">
      </div>

<div class="card-title text-uppercase text-center py-3">Sign In</div>
        <form method="POST" action="{{ route('login') }}">
           @csrf
        <div class="form-group">
        <label for="email" class="sr-only">{{ __('E-Mail Address') }}</label>
       
         <div class="position-relative has-icon-right">
          <input type="email" id="email" class="form-control input-shadow @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email Address" autofocus>
          
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
          <div class="form-control-position">
            <i class="icon-user"></i>
          </div>
         </div>
        </div>
        <div class="form-group">
        <label for="password" class="sr-only">{{ __('Password') }}</label>
         <div class="position-relative has-icon-right">
          <input type="password" id="password" class="form-control input-shadow @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="current-password">
          @error('password')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
          <div class="form-control-position">
            <i class="icon-lock"></i>
          </div>
         </div>
        </div>

        <div class="form-row">
       <div class="form-group col-6">
         <div class="icheck-material-primary">
                <input type="checkbox" id="user-checkbox" checked="{{ old('remember') ? 'checked' : '' }}">
                <label for="user-checkbox">{{ __('Remember Me') }}</label>
        </div>
       </div>
       <div class="form-group col-6 text-right pt-1">
        @if (Route::has('password.request'))
        <a href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
        @endif
       </div>
      </div>

      
       <button type="submit" class="btn btn-primary btn-block">{{ __('Login') }}</button>
        
       
       </form>
        </div>
      </div>
       @if (Route::has('register'))
     <!--  <div class="card-footer text-center py-3">
        <p class="text-dark mb-0">Do not have an account? <a href="{{ route('register') }}"> Sign Up here</a></p>
      </div> -->
      @endif
     
       </div>
    
  @endsection
