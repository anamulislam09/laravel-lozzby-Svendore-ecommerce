@extends('layouts.admin')

@section('admin_content')

<div class="hold-transition login-page">
  <div class="login-box">
      <!-- /.login-logo -->
      <div class="card card-outline card-primary">
          <div class="card-header text-center">
              <a href="" class="h1"><b>Admin</b>Login</a>
          </div>
          <div class="card-body">
              <p class="login-box-msg">Admin panel Login</p>

              <form method="POST" action="{{ route('login') }}">
                  @csrf
                  <div class="input-group mb-3">
                      <input type="email" class="form-control" name="email" :value="old('email')" required autofocus placeholder="Email">
                      <div class="input-group-append">
                          <div class="input-group-text">
                              <span class="fas fa-envelope"></span>
                          </div>
                      </div>
                  </div>
                  <div class="input-group mb-3">
                      <input type="password" class="form-control" name="password"
                      required autocomplete="current-password"placeholder="Password">
                      <div class="input-group-append">
                          <div class="input-group-text">
                              <span class="fas fa-lock"></span>
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-8">
                          <div class="icheck-primary">
                              <input type="checkbox" id="remember">
                              <label for="remember">
                                  Remember Me
                              </label>
                          </div>
                      </div>
                      <!-- /.col -->
                      <div class="col-4">
                          <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                      </div>
                      <!-- /.col -->
                  </div>
              </form>

              <p class="mb-1">
                  @if (Route::has('password.request'))
                  <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                      {{ __('Forgot your password?') }}
                  </a>
              @endif
              </p>

          </div>
          <!-- /.card-body -->
      </div>
      <!-- /.card -->
  </div>
</div>
  <!-- /.login-box -->
  @endsection

