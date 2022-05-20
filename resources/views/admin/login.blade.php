@extends('layout.admin.lapp')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 text-center mb-5">
            <h2 class="heading-section">{{ $title }}</h2>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12 col-lg-10">
            <div class="wrap d-md-flex">
                <div class="img" style="background-image: url({{ asset('public/imgs/bg-1.jpg') }});">
          </div>
                <div class="login-wrap p-4 p-md-5">
              <div class="d-flex">
                  <div class="w-100">
                      <h3 class="mb-4">Sign In</h3>
                  </div>
                        <div class="w-100">
                            <p class="social-media d-flex justify-content-end">
                                <a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a>
                                <a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-twitter"></span></a>
                            </p>
                        </div>
              </div>
              @if (Session::has('fail'))
                <div class="alert alert-danger">
                    {{ Session::get('fail') }}  
                </div>
              @endif
              
                    <form action="{{ route('admin.loginCheck') }}" class="signin-form" autocomplete="off" method="post">
                        @csrf
                  <div class="form-group mb-3">
                      <label class="label" for="name">Username</label>
                      <input type="text" class="form-control" placeholder="Username" name='username'>
                  </div>
                  <span class="text-danger">@error('username')
                      {{ $message }}
                  @enderror</span>
            <div class="form-group mb-3">
                <label class="label" for="password">Password</label>
              <input type="password" class="form-control" placeholder="Password" name="password">
            </div>
            <span class="text-danger">@error('password')
                {{ $message }}
            @enderror</span>
            <div class="form-group">
                <button type="submit" class="form-control btn btn-primary rounded submit px-3">Sign In</button>
            </div>
            <div class="form-group d-md-flex">
                <div class="w-50 text-left">
                    <label class="checkbox-wrap checkbox-primary mb-0">Remember Me
                              <input type="checkbox" checked>
                              <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="w-50 text-md-right">
                                <a href="#">Forgot Password</a>
                            </div>
            </div>
          </form>
          <p class="text-center">Not a member? <a data-toggle="tab" href="{{ route('admin.register') }}">Sign Up</a></p>
        </div>
      </div>
        </div>
    </div>
</div>
@endsection