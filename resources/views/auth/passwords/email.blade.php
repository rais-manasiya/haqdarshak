@extends('layouts.app')

@section('content')
<div class="card card-authentication1 mx-auto my-5">
        <div class="card-body">
             @if (session('status'))

                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <div class="alert-icon contrast-alert">
                     <i class="fa fa-check"></i>
                    </div>
                    <div class="alert-message">
                      <span><strong>Success!</strong> {{ session('status') }}</span>
                    </div>
                  </div>
                  
            @endif
         <div class="card-content p-2">
            
          <div class="card-title text-uppercase pb-2">{{ __('Reset Password') }}</div>
            <p class="pb-2">Please enter your email address. You will receive a link to create a new password via email.</p>
            <form method="POST" action="{{ route('password.email') }}">
                        @csrf
              <div class="form-group">
              <label for="exampleInputEmailAddress" class="">{{ __('E-Mail Address') }}</label>
               <div class="position-relative has-icon-right">
                <input id="email" type="email" class="form-control  input-shadow @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email"  placeholder="Email Address" autofocus>                                
                  <div class="form-control-position">
                      <i class="icon-envelope-open"></i>
                  </div>
                  @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

               </div>
              </div>
             
              <button type="submit" class="btn btn-warning btn-block mt-3"> {{ __('Send Password Reset Link') }}</button>
             </form>
           </div>
          </div>
           <div class="card-footer text-center py-3">
            <p class="text-dark mb-0">Return to the <a href="{{ route('login') }}">{{ __('Sign In') }}</a></p>
          </div>
         </div>
@endsection


