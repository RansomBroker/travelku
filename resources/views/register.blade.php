@extends('master')

@section('title', 'Travelku - Register')

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
          <p class="mb-4">Create an account</p>

          <form id="formAuthentication" class="mb-3" action="{{ URL::to('api/auth/register') }}" method="POST">
            <div class="mb-3">
              <input
                type="text"
                class="form-control"
                id="name"
                name="name"
                placeholder="Full name"
                autofocus required
              />
            </div>
            <div class="mb-3">
              <input
                type="email"
                class="form-control"
                id="email"
                name="email"
                placeholder="Email"
                autofocus required
              />
            </div>
            <div class="mb-3 form-password-toggle">
              <div class="input-group input-group-merge">
                <input
                  type="password"
                  id="password"
                  class="form-control"
                  name="password"
                  placeholder="Password"
                  aria-describedby="password" required
                />
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
              </div>
            </div>
            <div class="mb-3 form-password-toggle">
              <div class="input-group input-group-merge">
                <input
                  type="password"
                  id="password_confirmation"
                  class="form-control"
                  name="password_confirmation"
                  placeholder="Password Confirmation"
                  aria-describedby="password_confirmation" required
                />
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
              </div>
            </div>
            <div class="mb-3">
              <input
                type="text"
                class="form-control"
                id="phone"
                name="phone"
                pattern="[+][0-9]{2}[0-9]{11}"
                placeholder="Phone (eg: +62XXXXXXXXXXX)" required
                autofocus
              />
            </div>
            <div class="mb-3">
              <button class="btn btn-info d-grid w-100" type="submit">Sign up</button>
            </div>
          </form>

          <p class="text-center">
            <span>Already have an account?</span>
            <a href="{{ URL::to('login') }}">
              <span>Login</span>
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
@endsection
@endsection