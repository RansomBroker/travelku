@extends('master')

@section('title', 'Travelku - Admin Dashboard')

@section('custom-css')
<link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-auth.css') }}" />
@endsection

@section('content')

@section('menu')
  @include('components/menu')
@endsection

@section('navbar')
  @include('components/navbar')
@endsection

<div class="container-xxl flex-grow-1 container-p-y">
  <div class="row gx-4 gy-4">
    <div class="col-lg-6">
      <div class="card">
        <div class="card-body">
          <div class="card-title d-flex align-items-start justify-content-between">
            <div class="avatar flex-shrink-0">
              <img src="{{ asset('assets/img/icons/unicons/chart-success.png') }}" alt="chart success" class="rounded">
            </div>
          </div>
          <span class="fw-semibold d-block mb-1">Sales</span>
          <h3 class="card-title mb-2">IDR {{ $sales }}</h3>
          <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> All sales</small>
        </div>
      </div>
    </div>
    <div class="col-lg-3">
      <div class="card">
        <div class="card-body">
          <div class="card-title d-flex align-items-start justify-content-between">
            <div class="avatar flex-shrink-0">
              <img src="{{ asset('assets/img/icons/unicons/wallet-info.png') }}" alt="Credit Card" class="rounded">
            </div>
          </div>
          <span class="fw-semibold d-block mb-1">Booking</span>
          <h3 class="card-title mb-2">{{ count($booking) }}</h3>
          <small class="text-info fw-semibold"><i class="bx bx-info-circle"></i> Total booking</small>
        </div>
      </div>
    </div>
    <div class="col-lg-3">
      <div class="card">
        <div class="card-body">
          <div class="card-title d-flex align-items-start justify-content-between">
            <div class="avatar flex-shrink-0 me-3">
              <span class="avatar-initial rounded bg-label-primary"><i class="bx bx-user"></i></span>
            </div>
          </div>
          <span class="fw-semibold d-block mb-1">Users</span>
          <h3 class="card-title mb-2">{{ count($users) }}</h3>
          <small class="text-primary fw-semibold"><i class="bx bx-user"></i> Total users</small>
        </div>
      </div>
    </div>
    <div class="col-lg-12">
      <div class="card">
        <h5 class="card-header">New Users</h5>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-basic" id="users-table">
              <thead>
                <tr>
                  <td>No</td>
                  <td>Name</td>
                  <td>Email</td>
                  <td>Phone</td>
                  <td>Joined at</td>
                </tr>
              </thead>
              <tbody>
                @for($userNumber = 0; $userNumber < (count($users) > 5 ? 5 : count($users)); $userNumber++)
                <tr>
                  <td>{{ 1 + $userNumber }}</td>
                  <td>{{ $users[$userNumber]->name }}</td>
                  <td>{{ $users[$userNumber]->email }}</td>
                  <td>{{ $users[$userNumber]->phone }}</td>
                  <td>{{ $users[$userNumber]->created_at }}</td>
                </tr>
                @endfor
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@section('custom-js')
  <script type="text/javascript">
    $("#users-table").DataTable({responsive: true})
  </script>
@endsection

@endsection