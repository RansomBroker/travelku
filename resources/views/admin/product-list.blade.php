@extends('master')

@section('title', 'Travelku - Admin Add Product')

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
                <h5 class="card-header">Product list</h5>
                <div class="card-body">
                </div>
            </div>
        </div>
    </div>
</div>

@section('custom-js')

@endsection

@endsection
