 <div class="card">
        <div class="card-body">
            {{-- spinner loading--}}
            <div class="d-flex justify-content-center" id="topupppboLoadingSpinner">
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>

            <div class="row gap-4">
                <div class="col-lg-12 col-md-12 col-12 row justify-content-between">
                    {{-- nav --}}
                    <div class="col-12 col-lg-12 col-md-12 position-relative z-index-2" id="product-btn-vis">
                        <button type="button" class="page-link  position-absolute top--7 start-0 next-product" >  <i class='bx bx-chevron-left fs-4 text-black'></i> </button>
                        <button type="button" class="page-link  position-absolute top--7 end-0 previous-product" >  <i class='bx bx-chevron-right fs-4 text-black'></i> </button>
                    </div>

                    {{-- item --}}
                    <div class="col-lg-10 col-md-10 col-sm-10 product-list owl-carousel z-index-1" role="tablist">
                    </div>
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12 col-12 row justify-content-start gap-2" id="product-list-detail">

                </div>

                {{-- </div> --}}
            </div>
        </div>
    </div>

@section('custom-js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.min.js"></script>
    <script src="{{ asset('assets/js/ppobpayment.js') }}"></script>
@endsection
