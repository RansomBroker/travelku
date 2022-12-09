<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.theme.default.min.css">

<section id="service-area-filter" class="section-service-filter d-flex justify-content-center mb-3">
    <div class="container-fluid p-0 row justify-content-between justify-content-lg-start">
        <div class="btn-group col-lg-auto col-2 ">
            <button type="button" class="page-link custom-btn-next">  <i class='bx bx-chevron-left fs-4 text-black'></i> </button>
            <button type="button" class="page-link custom-btn-prev ">  <i class='bx bx-chevron-right fs-4 text-black'></i> </button>
        </div>
        <div class="col-8 p-1 col-lg-10 ">
            <div class="filter-slider-area owl-carousel row ">
                <a class="btn btn-outline-primary btn-sm rounded-pill owl-item text-uppercase">UMRAH</a>
                <a class="btn btn-outline-primary btn-sm  rounded-pill owl-item text-uppercase">Wisata Religi</a>
                <a class="btn btn-outline-primary btn-sm  owl-item rounded-pill text-uppercase">Hotel</a>
                <a class="btn btn-outline-primary btn-sm  owl-item text-uppercase rounded-pill">Tour</a>
                <a class="btn btn-outline-primary btn-sm  owl-item text-uppercase rounded-pill">Event</a>
                <a class="btn btn-outline-primary btn-sm  owl-item text-uppercase rounded-pill">Olahraga & Outdoor</a>
            </div>
        </div>
    </div>
</section>

<section id="service_area">
    <div class="container-fluid">
        <div class="p-1 service-slider-area owl-carousel">
            <div class="card">
                <img src="https://t-2.tstatic.net/tribunnewswiki/foto/bank/images/kabah.jpg" class="card-img-top" alt="ka'bah">
                <div class="card-body">
                    <h5 class="card-title">Nama Vendor</h5>
                    <p class="card-text fw-bold">Umrah plus city tour thaif 9 hari.</p>
                    <a href="#" class="fs-3 text-warning">IDR.28.000.000</a>
                </div>
            </div>
            <div class="card">
                <img src="https://t-2.tstatic.net/tribunnewswiki/foto/bank/images/kabah.jpg" class="card-img-top" alt="ka'bah">
                <div class="card-body">
                    <h5 class="card-title">Nama Vendor</h5>
                    <p class="card-text fw-bold">Umrah plus city tour thaif 9 hari.</p>
                    <a href="#" class="fs-3 text-warning">IDR.28.000.000</a>
                </div>
            </div>
            <div class="card">
                <img src="https://t-2.tstatic.net/tribunnewswiki/foto/bank/images/kabah.jpg" class="card-img-top" alt="ka'bah">
                <div class="card-body">
                    <h5 class="card-title">Nama Vendor</h5>
                    <p class="card-text fw-bold">Umrah plus city tour thaif 9 hari.</p>
                    <a href="#" class="fs-3 text-warning">IDR.28.000.000</a>
                </div>
            </div>
            <div class="card">
                <img src="https://t-2.tstatic.net/tribunnewswiki/foto/bank/images/kabah.jpg" class="card-img-top" alt="ka'bah">
                <div class="card-body">
                    <h5 class="card-title">Nama Vendor</h5>
                    <p class="card-text fw-bold">Umrah plus city tour thaif 9 hari.</p>
                    <a href="#" class="fs-3 text-warning">IDR.28.000.000</a>
                </div>
            </div>
            <div class="card">
                <img src="https://t-2.tstatic.net/tribunnewswiki/foto/bank/images/kabah.jpg" class="card-img-top" alt="ka'bah">
                <div class="card-body">
                    <h5 class="card-title">Nama Vendor</h5>
                    <p class="card-text fw-bold">Umrah plus city tour thaif 9 hari.</p>
                    <a href="#" class="fs-3 text-warning">IDR.28.000.000</a>
                </div>
            </div>
        </div>
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-start">
                <li class="page-item">
                    <button class="page-link border-tl-r-8 service-btn-next"> <i class='bx bx-chevron-left fs-4 text-black'></i></button>
                </li>
                <li class="page-item">
                    <button class="page-link border-br-r-8 service-btn-prev" > <i class='bx bx-chevron-right fs-4 text-black'></i></button>
                </li>
            </ul>
        </nav>
    </div>
</section>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.min.js"></script>

<script>
    let owl = $(".filter-slider-area")
    owl.owlCarousel({
        autoplay: false,
        slideSpeed: 1500,
        loop: false,
        autoWidth: true,
        responsive:{
            0:{
                margin: 10
            },
            767:{
                margin:10
            },
            600:{
                margin:10
            },
            1000:{
                margin:10
            }
        }
    })

    let owlService = $(".service-slider-area")
    owlService.owlCarousel({
        autoplay: true,
        slideSpeed: 1500,
        loop: false,
        items: 4,
        responsive:{
            0:{
                margin: 10,
                items: 1
            },
            767:{
                margin:10,
                items: 2
            },
            600:{
                margin:10,
                items: 2
            },
            1000:{
                margin:10,
                items: 4
            }
        }
    })

    $(".custom-btn-next").click(function () {
        owl.trigger('prev.owl.carousel')
    })
    $(".custom-btn-prev").click(function () {
        owl.trigger('next.owl.carousel')
    })

    $(".service-btn-next").click(function () {
        owlService.trigger('prev.owl.carousel')
    })
    $(".service-btn-prev").click(function () {
        owlService.trigger('next.owl.carousel')
    })
</script>
