@extends('layouts.app')

@section('content')
    <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-center error-pages">
                        <h1 class="error-title text-warning"> 404</h1>
                        <h2 class="error-sub-title text-dark">404 not found</h2>

                        <p class="error-message text-dark text-uppercase">Sorry, an error has occured, Requested page not found!</p>
                        
                        <div class="mt-4">
                          <a href="{{url('/')}}" class="btn btn-dark btn-round m-1">Go To Home </a>
                          <a href="{{ url()->previous() }}" class="btn btn-warning btn-round m-1">Previous Page </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
  @endsection
