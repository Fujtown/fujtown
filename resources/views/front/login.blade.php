@extends('layout.app')
    @section('title', 'Home Page')

    @section('additional_css')
    <link rel="stylesheet" href="{{ asset('assets/css/auth.css') }}">
@endsection

    @section('content')
   
    <main class="main">
    <div class="container">
            <div class="row align-items-center">
            <div class="col-md-3"></div>
              <div class="col-md-6">
                <div class="box-banner-login">
                  <h2 class="color-brand-1 mb-15 wow animate__animated animate__fadeIn" data-wow-delay=".0s"> Welcome back</h2>
                  <p class="font-md color-grey-500 wow animate__animated animate__fadeIn" data-wow-delay=".2s"> Fill your email address and password to sign in.</p>
                  <div class="line-login mt-25 mb-50"></div>
                  <form action="{{route('login_customer')}}" method="POST">
                    @csrf
                  <div class="row wow animate__animated animate__fadeIn" data-wow-delay=".4s">
                    <div class="col-lg-12">
                      <div class="form-group mb-25">
                        <input class="form-control icon-user" name="email" type="text" placeholder="email">
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="form-group mb-25">
                        <input class="form-control icon-password" name="password" type="text" placeholder="Password">
                      </div>
                    </div>
                    <div class="col-lg-6 col-6 mt-15">
                      <div class="form-group mb-25">
                        <label class="cb-container">
                          <input type="checkbox" name="remember" ><span class="text-small">Remember me</span><span class="checkmark"></span>
                        </label>
                      </div>
                    </div>
                    <div class="col-lg-6 col-6 mt-15">
                      <div class="form-group mb-25 text-end"><a class="font-xs color-grey-500" href="#">Forgot password?</a></div>
                    </div>
                    <div class="col-lg-12 mb-25">
                      <button class="btn btn-brand-lg btn-full font-md-bold" type="submit">Sign in</button>
                    </div>
                    <div class="col-lg-12"><span class="color-grey-500 d-inline-block align-middle font-sm">
                        Don’t have an account?
                        </span><a class="d-inline-block align-middle color-success ml-3" href="{{route('register')}}">  Sign up now</a></div>
                  </div>
                  </form>
                </div>
              </div>
              <div class="col-md-3"></div>
            </div>
          </div>
    </main>

  @endsection
