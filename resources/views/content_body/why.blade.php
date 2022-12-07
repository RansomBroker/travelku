     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="style.css">

    <!-- START blog -->
			<section id="blog_area" class="section_padding">
				<div class="container">
				<div class="section_heading text-center">
                    <h4>Pesan Tiket Pesawat Murah Secara Cerdas di Travelku</h4>
                </div>
					<div class="row">
						<div class="col-md-12">
							<div class="blog_slider_area owl-carousel">
                                        <div class="card">
                                        <div class="single-blog wow fadeInUp">
                                        <div class="single_blog">
                                            <a href="#"><img style='width:40px;height:40px; margin-right:10px; float:left;' src="{{ asset('assets/img/refund.png') }}"/>
                                            <h3 class="post-title">Simple Refund</h3></a>
                                            <p class="blog-text">
                                                Fitur Simple Refund memungkinkan Anda untuk mendapatkan pengembalian dana dengan mudah jika melakukan pembatalan tiket pesawat online. Simple Refund dari Travelku akan membantu Anda mendapatkan uang Anda kembali.
                                            </p>
                                            <div class="btn-area">
                                                <a href="#" class="btn btn-default main_btn">Lihat Kebijakan</a>
                                            </div>
                                        </div>
                                    </div>
								</div>

								<div class="box-area">
								<div class="card">
									<div class="single-blog wow fadeInUp">
                                        <div class="single_blog">
                                            <div><a href="#"><img style='width:40px;height:40px; margin-right:10px; float:left;' src="{{ asset('assets/img/smarttrip.png') }}"/>
                                            <h3 class="post-title">Smart Trip</h3></a></div>
                                            <p class="blog-text">
                                                Dapatkan harga tiket pesawat murah untuk penerbangan pulang-pergi ke destinasi favorit Anda. Fitur Smart Trip dari Travelku membuat Anda makin mudah menemukan kombinasi tiket pesawat online PP tanpa harus melakukan pencarian dua kali.
                                            </p>
                                            <div class="btn-area">
                                                <a href="#" class="btn btn-default main_btn">Selengkapnya</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								</div> <!-- END SINGLE blogS -->

								<div class="box-area">
								    <div class="card">
									<div class="single-blog wow fadeInUp">
                                        <div class="single_blog">
                                            <a href="#"><img style='width:40px;height:40px; margin-right:10px; float:left;' src="{{ asset('assets/img/schedule.png') }}"/>
                                            <h3 class="post-title">Simple Reschedule</h3></a>
                                            <p class="blog-text">
                                                Selain bisa menjadi andalan Anda untuk melakukan pemesanan tiket pesawat murah dan tiket pesawat promo, fitur Simple Reschedule Travelku juga bisa memudahkan Anda melakukan pengajuan reschedule untuk penerbangan pilihan Anda.
                                            </p>
                                            <div class="btn-area">
                                                <a href="#" class="btn btn-default main_btn">Lihat Kebijakan</a>
                                            </div>
                                        </div>
                                    </div>
								</div> <!-- END SINGLE blogS -->


							</div>
						</div>
					</div>
				</div>
			</section>

		<!-- END blog -->

		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.min.js"></script>
		<script>
        $(".blog_slider_area").owlCarousel({
				autoplay: true,
				slideSpeed:1000,
				items : 3,
				loop: true,
				nav:false,
				margin: 30,
				dots: true,
				responsive:{
					0:{
						items:1
					},
					767:{
						items:2
					},
					600:{
						items:2
					},
					1000:{
						items:3
					}
				}

			});
    </script>

