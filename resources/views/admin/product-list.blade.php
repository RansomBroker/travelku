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
                    <div class="table-responsive">
                        <table class="table table-basic" id="table-product">
                            <thead>
                            <tr>
                                <td>Product Type</td>
                                <td>Product Title</td>
                                <td>Product Price</td>
                                <td>Action</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>{{ $product->types->name }}</td>
                                    <td>{{ $product->title }}</td>
                                    <td>Rp.{{ number_format($product->price, 2, ',', '.') }}</td>
                                    <td>
                                        <a href="#" class="btn btn-primary">
                                            <i class='bx bx-edit-alt'></i>
                                        </a>
                                        <button data-product="{{$product->title}}" data-id="{{$product->id}}"
                                                class="btn-delete btn btn-danger">
                                            <i class='bx bx-trash'></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@section('custom-js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.15/dist/sweetalert2.all.min.js"></script>
    <script>
        $(".btn-delete").click(function(e) {
            Swal.fire({
                icon: "warning",
                title: "Hapus Produk",
                text: "Apakah anda yakin akan menghapus produk " + $(this).attr("data-product"),
                showCancelButton: true,
                denyButtonText: "Cancel",
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    let id = $(this).attr("data-id");
                }
            });
        });
        $("#table-product").DataTable({ responsive: true });
    </script>
@endsection

@endsection
