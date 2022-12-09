@extends('master')

@section('title', 'Travelku - Admin Modules')

@section('custom-css')
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
        <div class="col-lg-12">
            <div class="card">
                <h5 class="card-header">Amadeus Setting</h5>
                <div class="card-body">
                    <form action="{{ URL::to('api/admin/modules/save') }}" method="POST">
                        <input type="hidden" name="id" value="{{ $modules->id }}">
                        <div class="table-responsive">
                            <table class="table table-basic" id="users-table">
                                <tr>
                                    <td>Api Key</td>
                                    <td>:</td>
                                    <td><input class="form-control" name="apikey" placeholder="Api Key" type="text"
                                            value="{{ $modules->data->ApiKey ?? '' }}" required></td>
                                </tr>
                                <tr>
                                    <td>Api Secret</td>
                                    <td>:</td>
                                    <td><input class="form-control" name="apisecret" placeholder="Api Secret"
                                            type="text" value="{{ $modules->data->ApiSecret ?? '' }}" required></td>
                                </tr>
                                <tr>
                                    <td>Domestic Margin</td>
                                    <td>:</td>
                                    <td><input class="form-control" name="domesticmargin" placeholder="Domestic Margin"
                                            type="text" value="{{ $modules->data->domesticMargin ?? '' }}" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Business Margin</td>
                                    <td>:</td>
                                    <td><input class="form-control" name="businessmargin" placeholder="Business Margin"
                                            type="text" value="{{ $modules->data->businessMargin ?? '' }}" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Margin</td>
                                    <td>:</td>
                                    <td><input class="form-control" name="margin" placeholder="Margin" type="text"
                                            value="{{ $modules->data->margin ?? '' }}" required></td>
                                </tr>
                            </table>
                        </div>
                        <button class="mt-5 btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <h5 class="card-header">Sabre Setting</h5>
                <div class="card-body">
                    <form action="{{ URL::to('api/admin/modules/save') }}" method="POST">
                        <input type="hidden" name="id" value="{{ $sabre->id }}">
                        <div class="table-responsive">
                            <table class="table table-basic" id="users-table">
                                <tr>
                                    <td>Api Key</td>
                                    <td>:</td>
                                    <td><input class="form-control" name="apikey" placeholder="Api Key" type="text"
                                            value="{{ $sabre->data->ApiKey ?? '' }}" required></td>
                                </tr>
                                <tr>
                                    <td>Api Secret</td>
                                    <td>:</td>
                                    <td><input class="form-control" name="apisecret" placeholder="Api Secret"
                                            type="text" value="{{ $sabre->data->ApiSecret ?? '' }}" required></td>
                                </tr>
                                <tr>
                                    <td>Domestic Margin</td>
                                    <td>:</td>
                                    <td><input class="form-control" name="domesticmargin" placeholder="Domestic Margin"
                                            type="text" value="{{ $sabre->data->domesticMargin ?? '' }}" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Business Margin</td>
                                    <td>:</td>
                                    <td><input class="form-control" name="businessmargin" placeholder="Business Margin"
                                            type="text" value="{{ $sabre->data->businessMargin ?? '' }}" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Margin</td>
                                    <td>:</td>
                                    <td><input class="form-control" name="margin" placeholder="Margin" type="text"
                                            value="{{ $sabre->data->margin ?? '' }}" required></td>
                                </tr>
                            </table>
                        </div>
                        <button class="mt-5 btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="bs-toast toast bg-danger top-0 end-0 toast-placement-ex m-2" role="alert" aria-live="assertive"
    aria-atomic="true" data-delay="0">
    <div class="toast-header">
        <i class="bx bx-bell me-2"></i>
        <div class="me-auto fw-semibold">Bootstrap</div>
        <small>11 mins ago</small>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">Fruitcake chocolate bar tootsie roll gummies gummies jelly beans cake.</div>
</div>

@section('custom-js')
    @if (Session::has('success'))
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
