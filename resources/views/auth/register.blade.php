@extends('layouts.app')

@section('content')
 <div class="card card-authentication1 mx-auto my-5">
    <div class="card-body">
     <div class="card-content p-2">
      <div class="text-center">
        <img src="{{ asset('assets/images/logo.png') }}" style="width:100px;" alt="logo icon">
      </div>

<div class="card-title text-uppercase text-center py-3">Sign Up</div>
       <form method="POST" action="{{ route('register') }}">
         @csrf
           <div class="form-group">
        <label for="name" class="sr-only">{{ __('Name') }}</label>
         <div class="position-relative has-icon-right">
          <input id="name" type="text" class="form-control  input-shadow @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  placeholder="Enter Your Name" required autocomplete="name" autofocus>

            @error('name')
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
        <label for="email" class="sr-only">{{ __('E-Mail Address') }}</label>
       
         <div class="position-relative has-icon-right">
         <input id="email" type="email" class="form-control input-shadow @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter Your Email" required autocomplete="email">

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          <div class="form-control-position">
            <i class="icon-envelope-open"></i>
          </div>
         </div>
        </div>
        <div class="form-group">
        <label for="password" class="sr-only">{{ __('Password') }}</label>
         <div class="position-relative has-icon-right">
         <input id="password" type="password" class="form-control input-shadow @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Enter Password">

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

        <div class="form-group">
        <label for="password" class="sr-only">{{ __('Confirm Password') }}</label>
         <div class="position-relative has-icon-right">
         <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
          <div class="form-control-position">
            <i class="icon-lock"></i>
          </div>
         </div>
        </div>

      
       <button type="submit" class="btn btn-primary btn-block">{{ __('Register') }}</button>
        
       </form>
        </div>
      </div>
      <div class="card-footer text-center py-3">
        <p class="text-dark mb-0">Already have an account? <a href="{{ route('login') }}">{{ __('Sign In here') }}</a></p>
      </div>
       </div>
@endsection




 