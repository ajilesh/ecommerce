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
                    <form action="{{ url('admin/registerinsert') }}" class="signin-form" method="post">
                        @csrf
                        <div class="form-group mb-3">
                            <label class="label" for="name">Name</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Username">
                        </div>
                        @error('name')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>@enderror
                  <div class="form-group mb-3">
                      <label class="label" for="name">Email</label>
                      <input type="text" class="form-control" value="{{ old('email') }}" placeholder="Username" name="email">
                  </div>
                  @error('email')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>@enderror
            <div class="form-group mb-3">
                <label class="label" for="password">Password</label>
              <input type="password" class="form-control" value="{{ old('password') }}" placeholder="Password" name="password">
            </div>
            @error('password')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>@enderror
            <div class="form-group mb-3">
                <label class="label" for="password">Confirm Password</label>
              <input type="password" class="form-control" placeholder="Password" name="cpassword">
            </div>
            @error('cpassword')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>@enderror
            <div class="form-group">
                <button type="submit" class="form-control btn btn-primary rounded submit px-3">Sign In</button>
            </div>
            
          </form>
          <p class="text-center">You Are Already Register? <a data-toggle="tab" href="{{ route('admin.login') }}">SignIn</a></p>
        </div>
      </div>
        </div>
    </div>
</div>
@endsection