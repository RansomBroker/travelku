@extends('master')

@section('title', 'Travelku - Flight Search')

@section('custom-css')

    @include('components/navbar/css')

    <style type="text/css">
        #filter-box {
            overflow: hidden;
            max-height: 0;
            transition: max-height 1s ease-in-out;
        }

        #filter-box.show {
            overflow: hidden;
            max-height: 1000px;
            transition: max-height 1s ease-in-out;
        }

        #segment-display {
            overflow: hidden;
            max-height: 0;
            transition: max-height 1s ease-in-out;
        }

        #segment-display.show {
            overflow: hidden;
            max-height: 2000px;
            transition: max-height 1s ease-in-out;
        }

        #overlay {
            opacity: 1;
            visibility: visible;
            transition: opacity 1s ease-in-out;
        }

        .divider {
            width: 1px;
            position: relative;
            top: 0;
            bottom: 0;
            left: 5px;
        }
    </style>

@endsection

@section('content')
    <div id="overlay" style="z-index: 20"
        class="bg-white d-flex align-items-center justify-content-center position-fixed top-0 bottom-0 left-0 right-0 vh-100 w-100">
        <div class="spinner-border spinner-border-lg text-info" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
    <div class="row m-0">
        <div class="col-12 p-0">
            @include('components/navbar/navbar')
            <section class="filter">
                <div id="base" class="w-100 py-4 px-4 px-lg-5">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between flex-wrap">
                                <div class="detail">
                                    <p class="m-0 mb-2">{{ $_GET['origin'] }} <i class='bx bx-right-arrow-alt'></i>
                                        {{ $_GET['destination'] }}</p>
                                    <p class="m-0">{{ $_GET['departure'] }} |
                                        {{ isset($_GET['return']) && $_GET['return'] != '' ? 'Round Trip' : 'One Way' }} |
                                        {{ $_GET['adult-amadeus'] + $_GET['children-amadeus'] + $_GET['infant-amadeus'] }} Passenger |
                                        {{ ucwords(strtolower($_GET['class'])) }}</p>
                                </div>
                                <div class="change">
                                    <a href="{{ URL::to('/') }}" class="btn btn-info h-100 my-3">Change Search</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body border-top p-0" id="filter-box">
                            <div class="p-4">
                                <div class="row gy-3 align-items-start mb-3">
                                    <div class="col-lg-3">
                                        <label class="mb-2">Stops</label>
                                        <select class="form-select" name="stops">
                                            <option value="-">All</option>
                                            <option value="0">0 Stop</option>
                                            <option value="1">1 Stop</option>
                                            <option value="2">2 Stop</option>
                                            <option value="3">3 Stop</option>
                                            <option value="4">4 Stop</option>
                                            <option value="5">5 Stop</option>
                                            <option value="6">6 Stop</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3">
                                        <label class="mb-2">Price <span id="max-holder">(Max: IDR
                                                500.000.000)</span></label>
                                        <input name="price-filter" type="range" class="form-range my-2" min="0"
                                            value="500000000" max="500000000" step="10000000">
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="mb-2">Airlines</label>
                                        <ul id="list-airline" class="d-flex align-items-center list-unstyled flex-wrap">
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body text-center w-100 border-top">
                            <a id="toggle-filter" href="javascript:void(0)">Toggle Filter</a>
                        </div>
                    </div>
                </div>
            </section>
            <section class="result">
                <div id="result-container" class="w-100 px-4 px-lg-5">

                </div>
            </section>
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

@endsection

@section('custom-js')

    @include('components/navbar/js')

    <script type="text/javascript">
        const origin = "{{ $_GET['origin'] }}"
        const destination = "{{ $_GET['destination'] }}"
        const departure = "{{ $_GET['departure'] }}"
        const clases = "{{ $_GET['class'] }}"
        const adult = "{{ $_GET['adult-amadeus'] }}"
        const children = "{{ $_GET['children-amadeus'] }}"
        const infant = "{{ $_GET['infant-amadeus'] }}"
        const returns = "{{ $_GET['return-amadeus'] ?? null }}"
        const api = "{{ URL::to('api/flight/search') }}"
        const base = "{{ URL::to('/') }}"
        const logoUrl = "{{ asset('assets/img/airlines') }}"
        const bookingUrl = "{{ URL::to('flight/booking') }}"
        const destinationCountry = "{{ $_GET['destination-placeholder'] }}"
        const originCountry = "{{ $_GET['origin-placeholder'] }}"
        const apiModule = "{{ URL::to('api/module') }}"
    </script>
    <script src="{{ asset('assets/js/flight.search.js') }}" type="text/javascript"></script>

@endsection
