<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.carousel.min.css">
<link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.theme.default.min.css">

<section id="service-area-filter" class="section-service-filter d-flex justify-content-center mb-3">
    <div class="container-fluid row gap-4">
        <div class="col-lg-12 col-md-12 col-12 row justify-content-start">
            {{-- nav --}}
            <div class="col-auto row">
                <button type="button" class="col-auto page-link  next-product-item"><i
                        class='bx bx-chevron-left fs-4 text-black'></i></button>
                <button type="button" class="col-auto page-link   previous-product-item"><i
                        class='bx bx-chevron-right fs-4 text-black'></i></button>
            </div>

            {{-- item --}}
            <div class="carousel-width product-travelku-list owl-carousel z-index-1" role="tablist">
                <button carouse-data="first" class="btn btn-outline-primary active">Umroh</button>
                <button class="btn btn-outline-primary">Wisata Religi</button>
                <button class="btn btn-outline-primary">Hotel</button>
                <button class="btn btn-outline-primary">Tour</button>
                <button class="btn btn-outline-primary">Even</button>
                <button class="btn btn-outline-primary">Olahraga & Outdoor</button>
            </div>
        </div>
    </div>
</section>

<section id="service_area">
    <div class="container-fluid">
        <div class=" p-1 service-slider-area owl-carousel" id="service-product">
        </div>
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-start">
                <li class="page-item">
                    <button class="page-link border-tl-r-8 service-btn-next"><i
                            class='bx bx-chevron-left fs-4 text-black'></i></button>
                </li>
                <li class="page-item">
                    <button class="page-link border-br-r-8 service-btn-prev"><i
                            class='bx bx-chevron-right fs-4 text-black'></i></button>
                </li>
            </ul>
        </nav>
    </div>
</section>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.min.js"></script>

<script>
    let owl = $(".product-travelku-list");
    owl.owlCarousel({
        autoplay: false,
        slideSpeed: 1500,
        loop: false,
        margin: 20,
        autoWidth: true,
        responsive: {
            0: {
                margin: 10
            },
            767: {
                margin: 10
            },
            600: {
                margin: 10
            },
            1000: {
                margin: 10
            }
        }
    });


    $(".next-product-item").click(function() {
        owl.trigger("prev.owl.carousel");
    });
    $(".previous-product-item").click(function() {
        owl.trigger("next.owl.carousel");
    });

    $(".service-btn-next").click(function() {
        owlService.trigger("prev.owl.carousel");
    });
    $(".service-btn-prev").click(function() {
        owlService.trigger("next.owl.carousel");
    });
</script>
