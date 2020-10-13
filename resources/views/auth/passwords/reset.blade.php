@extends('layouts.app')

@section('content')

<div class="card card-authentication1 mx-auto my-5">
    <div class="card-body">
        
     <div class="card-content p-2">
    
<div class="card-title text-uppercase text-center py-3">{{ __('Reset Password') }}</div>
        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">
        <div class="form-group">
        <label for="email" class="sr-only">{{ __('E-Mail Address') }}</label>
       
         <div class="position-relative has-icon-right">
         <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email"  placeholder="Email Address" autofocus>
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
          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  placeholder="New Password" required autocomplete="new-password">
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
        <label for="password-confirm" class="sr-only">{{ __('Confirm Password') }}</label>
         <div class="position-relative has-icon-right">
          <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  placeholder="Confirm Password" required autocomplete="new-password">                  
          <div class="form-control-position">
            <i class="icon-lock"></i>
          </div>
         </div>
         
        </div>
      
       <button type="submit" class="btn btn-primary btn-block">{{ __('Reset Password') }}</button>
              
       </form>
        </div>
      </div>
     <!--  <div class="card-footer text-center py-3">
        <p class="text-dark mb-0">Do not have an account? <a href="authentication-signup.html"> Sign Up here</a></p>
      </div> -->
       </div>
@endsection

