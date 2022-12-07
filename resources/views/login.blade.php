@extends('master')

@section('title', 'Travelku - Login')

@section('custom-css')
<link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-auth.css') }}" />
@endsection

@section('content')

<div class="container-xxl">
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner">
      <!-- Register -->
      <div class="card">
        <div class="card-body">
          <!-- Logo -->
          <div class="app-brand justify-content-center">
            <a href="{{ URL::to('/') }}" class="app-brand-link gap-2">
              <img src="{{ asset('assets/img/logo.png') }}" alt="logo" style="width: 150px"/>
            </a>
          </div>
          <!-- /Logo -->
          <p class="mb-4">Please sign-in to your account and start the adventure</p>

          <form id="formAuthentication" class="mb-3" action="{{ URL::to('api/auth/login') }}" method="POST">
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input
                type="email"
                class="form-control"
                id="email"
                name="email"
                placeholder="Enter your email"
                autofocus
              />
            </div>
            <div class="mb-3 form-password-toggle">
              <div class="d-flex justify-content-between">
                <label class="form-label" for="password">Password</label>
              </div>
              <div class="input-group input-group-merge">
                <input
                  type="password"
                  id="password"
                  class="form-control"
                  name="password"
                  placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                  aria-describedby="password"
                />
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
              </div>
            </div>
            <div class="mb-3">
              <div class="form-check">
                <input class="form-check-input" name="remember" type="checkbox" id="remember-me" />
                <label class="form-check-label" for="remember-me"> Remember Me </label>
              </div>
            </div>
            <div class="mb-3">
              <button class="btn btn-info d-grid w-100" type="submit">Sign in</button>
            </div>
          </form>

          <p class="text-center">
            <span>New on our platform?</span>
            <a href="{{ URL::to('register') }}">
              <span>Create an account</span>
            </a>
          </p>
        </div>
      </div>
      <!-- /Register -->
    </div>
  </div>
</div>

<div
  class="bs-toast toast bg-danger top-0 end-0 toast-placement-ex m-2"
  role="alert"
  aria-live="assertive"
  aria-atomic="true"
  data-delay="0"
>
  <div class="toast-header">
    <i class="bx bx-bell me-2"></i>
    <div class="me-auto fw-semibold">Bootstrap</div>
    <small>11 mins ago</small>
    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
  </div>
  <div class="toast-body">Fruitcake chocolate bar tootsie roll gummies gummies jelly beans cake.</div>
</div>

@section('custom-js')
  @if(Session::has('error'))
    <script>
      const toastPlacementExample = document.querySelector('.toast-placement-ex')
      toastPlacementExample.innerHTML = `
        <div class="toast-header">
          <i class="bx bx-bell me-2"></i>
          <div class="me-auto fw-semibold">Error</div>
          <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">{{ Session::get('error') }}</div>
      `
      toastPlacement = new bootstrap.Toast(toastPlacementExample)
      toastPlacement.show()
    </script>
  @endif

  @if(Session::has('success'))
    <script>
      const toastPlacementExample = document.querySelector('.toast-placement-ex')
      toastPlacementExample.classList.remove('bg-danger')
      toastPlacementExample.classList.add('bg-success')
      toastPlacementExample.innerHTML = `
        <div class="toast-header">
          <i class="bx bx-bell me-2"></i>
          <div class="me-auto fw-semibold">Success</div>
          <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">{{ Session::get('success') }}</div>
      `
      toastPlacement = new bootstrap.Toast(toastPlacementExample)
      toastPlacement.show()
    </script>
  @endif
@endsection
@endsection