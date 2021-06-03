@extends('layouts.mini')

@section('content')
<div class="content-wrapper d-flex align-items-center justify-content-center auth theme-one" style="background-image: url({{ url('admin/assets/images/auth/login_1.jpg') }}); background-size: cover;">
    <div class="row w-100">
      <div class="col-lg-4 mx-auto">
        <div class="auto-form-wrapper">
          <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
              <label class="label">Username</label>
                <input type="text" class="form-control" placeholder="Username" name="email" value="{{ old('email') }}" required>
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
              <label class="label">Password</label>
                <input type="password" class="form-control" placeholder="*********" name="password" required autocomplete="current-password">
                @error('passowrd')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
              <button class="btn btn-primary submit-btn btn-block" type="submit">Login</button>
            </div>
            <div class="form-group d-flex justify-content-between">
              <div class="form-check form-check-flat mt-0">
                <label class="form-check-label">
                  <input type="checkbox" class="form-check-input" checked> Keep me signed in </label>
              </div>
              <a href="{{ route('password.request') }}" class="text-small forgot-password text-black">Forgot Password</a>
            </div>
            <div class="form-group">
              <button class="btn btn-block g-login">
                <img class="mr-3" src="{{ url('admin/assets/images/file-icons/icon-google.svg') }}" alt="">Log in with Google</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
