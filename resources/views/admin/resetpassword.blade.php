@extends('layout.admin.lapp')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 text-center mb-5">
            <h2 class="heading-section">Reset Password</h2>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12 col-lg-10">
            <div class="wrap d-md-flex">
                <div class="img" style="background-image: url({{ asset('public/imgs/bg-1.jpg') }});">
          </div>
                <div class="login-wrap p-4 p-md-5">
              
              @if (Session::has('fail'))
                <div class="alert alert-danger">
                    {{ Session::get('fail') }}  
                </div>
              @endif
              
                    <form action="{{ route('admin.updatepassword') }}" class="signin-form" autocomplete="off" method="post">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <input type="hidden" name="email" value="{{ $email }}">
                  <div class="form-group mb-3">
                      <label class="label" for="name">New Password</label>
                      <input type="password" class="form-control" placeholder="New Password" name='npassword'>
                  </div>
                  <span class="text-danger">@error('npassword')
                      {{ $message }}
                  @enderror</span>
            <div class="form-group mb-3">
                <label class="label" for="password">Confirm Password</label>
              <input type="password" class="form-control" placeholder="Confirm Password" name="cpassword">
            </div>
            <span class="text-danger">@error('cpassword')
                {{ $message }}
            @enderror</span>
            <div class="form-group">
                <button type="submit" class="form-control btn btn-primary rounded submit px-3">Reset Password</button>
            </div>
            
          </form>
          
        </div>
      </div>
        </div>
    </div>
</div>
@endsection