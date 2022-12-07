@extends('master')

@section('title', 'Travelku - Book Flight')

@section('custom-css')

    @include('components/navbar/css')
    @include('content_body.why_css')
    @include('content_body.promo_css')

    <script src="https://code.jquery.com/jquery-2.2.4.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.js"></script>


@endsection

@section('content')
    <div class="row m-0">
        <div class="col-12 p-0">
            @include('components/navbar/navbar')
            <section class="form-search position-relative">
                <img id="slideshow" src="{{ asset('assets/img/backgrounds/nusped.jpg') }}"
                    style="z-index: -1; " class="position-absolute w-100 bottom-0 end-0 " alt="bg">
                <div id="base" class="bg-info-opacity w-100 py-5 px-4 px-lg-5">
                    <div class="row">
                        <div class="col-12 col-lg-12 d-flex flex-column">
                            <h4 class="text-white mb-1 px-3 mb-5">Mirror GDS System.</h4>
                            <ul class="nav nav-pills px-2 headerIcon" id="pills-tab" role="tablist">
                                <li class="nav-item active" role="presentation">
                                    <div class="tabWrapper active d-flex flex-column justify-content-center align-items-center" id="pills-pesawat-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-pesawat"  role="tab" aria-controls="pills-pesawat" aria-selected="true">
                                        <img
                                            src="{{ asset('assets/img/pesawat.png') }}" width="45"
                                            height="45" />
                                        <span>Pesawat</span>
                                    </div>
                                </li>
                                <li class="nav-item " role="presentation">
                                    <div class="tabWrapper d-flex flex-column justify-content-center align-items-center" id="pills-umrah-tab" data-bs-toggle="pill"
                                          data-bs-target="#pills-umrah"  role="tab"
                                          aria-controls="pills-umrah" aria-selected="true">
                                        <img
                                            src="{{ asset('assets/img/umrah.png') }}" width="45"
                                            height="45" />
                                        <span>Umrah</span>
                                    </div>
                                </li>
                                <li class="nav-item " role="presentation">
                                    <div class="tabWrapper d-flex flex-column justify-content-center align-items-center" id="pills-hotel-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-hotel" role="tab"
                                        aria-controls="pills-hotel" aria-selected="false"><img
                                            src="{{ asset('assets/img/hotel.png') }}" width="45"
                                            height="45" />
                                        <span>Hotel</span>
                                    </div>
                                </li>
                                <li class="nav-item " role="presentation">
                                    <div class="tabWrapper d-flex flex-column justify-content-center align-items-center" id="pills-kereta-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-kereta" role="tab"
                                        aria-controls="pills-kereta" aria-selected="false"><img
                                            src="{{ asset('assets/img/kereta.png') }}" width="45"
                                            height="45" />
                                        <span>Kereta</span>
                                    </div>
                                </li>
                                <li class="nav-item " role="presentation">
                                    <div class="tabWrapper d-flex flex-column justify-content-center align-items-center" id="pills-bis-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-bis"  role="tab" aria-controls="pills-bis"
                                        aria-selected="false"><img src<img src="{{ asset('assets/img/bus.png') }}" width="45"
                                            height="45" />
                                        <span>Bis</span>
                                    </div>
                                </li>
                                <li class="nav-item " role="presentation">
                                    <div class="tabWrapper d-flex flex-column justify-content-center align-items-center" id="pills-ppob-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-ppob" role="tab"
                                        aria-controls="pills-ppob" aria-selected="false"><img
                                            src="{{ asset('assets/img/ppob.png') }}" width="45"
                                            height="45" /><span>Topup</span></div>
                                </li>
                            </ul>
                        </div>

                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-pesawat" role="tabpanel"
                                aria-labelledby="pills-home-tab">
                                @include('content_tabs.pesawat')
                            </div>
                            <div class="tab-pane fade" id="pills-umrah" role="tabpanel"
                                 aria-labelledby="pills-home-tab">
                            </div>
                            <div class="tab-pane fade" id="pills-hotel" role="tabpanel" aria-labelledby="pills-home-tab">
                                @include('content_tabs.hotel')
                            </div>
                            <div class="tab-pane fade" id="pills-kereta" role="tabpanel" aria-labelledby="pills-home-tab">
                                @include('content_tabs.kereta')
                            </div>
                            <div class="tab-pane fade" id="pills-bis" role="tabpanel" aria-labelledby="pills-home-tab">
                                @include('content_tabs.bis')
                            </div>
                            <div class="tab-pane fade" id="pills-ppob" role="tabpanel" aria-labelledby="pills-home-tab">
                                @include('content_tabs.ppob')
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="misc">
                <div class="bg-white w-100 p-5">
                    <div class="content-body">@include('content_body.service')</div>
                    <div class="content-body">@include('content_body.promo')</div>
                    <div class="content-body">@include('content_body.why')</div>
                 </div>
                        </div>
                    </div>
                </div>
            </section>

            <footer class="footer bg-light">
                <div
                    class="container-fluid d-flex flex-md-row flex-column justify-content-between align-items-md-center gap-1 container-p-x py-3">
                    <div>
                        <a href="#" class="footer-text fw-bolder">TRAVELKU.ID</a>
                        © 2022
                    </div>
                    <div>
                        <a href="{{ URL::to('bantuan') }}" class="footer-link me-4">Pusat Bantuan</a>
                        <a href="{{ URL::to('kontak') }}" class="footer-link me-4">Kontak</a>
                        <a href="{{ URL::to('tos') }}" class="footer-link">Terms &amp; Conditions</a>
                    </div>
                </div>
            </footer>

        </div>
    </div>

@endsection
