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
                <h5 class="card-header">Add new product</h5>
                <div class="card-body">
                    <form method="POST" action="{{URL::to('admin/add-product/add')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Product<sup class="text-danger">*</sup></label>
                            <select class="form-control @error('type') is-invalid @enderror" name="type">
                                <option selected>--- select product ----</option>
                                <option value="2">Umroh</option>
                            </select>
                            @error('type')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Title<sup class="text-danger">*</sup></label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                                   placeholder="title">
                            @error('title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Product Description<sup class="text-danger">*</sup></label>
                            <textarea class="form-control @error('description') is-invalid @enderror" name="description"
                                      cols="50"></textarea>
                            @error('description')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Duration</label>
                            <input type="number" class="form-control" name="duration">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Price(Rupiah)<sup class="text-warning">*</sup></label>
                            <input type="text" class="form-control @error('price') is-invalid @enderror" name="price">
                            @error('price')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Thumbnail <sup class="text-warning">*</sup></label>
                            <input type="file" class="form-control @error('img') is-invalid @enderror" name="img">
                            @error('img')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mt-3 d-flex justify-content-lg-start justify-content-center w-100">
                            <button class="btn btn-primary">Add new product</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@section('custom-js')

@endsection

@endsection
