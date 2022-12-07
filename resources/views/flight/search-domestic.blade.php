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
    {{-- hidden input --}}
    <input type="hidden" value="{{ $_GET['origin'] }}" name="origin">
    <input type="hidden" value="{{ $_GET['destination'] }}" name="destination">
    <input type="hidden" value="{{ $_GET['departure'] }}" name="departure">
    <input type="hidden" value="{{ $_GET['return-domestic'] }}" name="return">
    <input type="hidden" value="{{ $_GET['adult-domestic'] }}" name="adult">
    <input type="hidden" value="{{ $_GET['children-domestic'] }}" name="child">
    <input type="hidden" value="{{ $_GET['infant-domestic'] }}" name="infant">
    <input type="hidden" name="origin-placeholder" value="{{ $_GET['origin-placeholder'] }}">
    <input type="hidden" name="destination-placeholder" value="{{ $_GET['destination-placeholder'] }}">
    {{--<div id="overlay" style="z-index: 20"
         class="bg-white d-flex align-items-center justify-content-center position-fixed top-0 bottom-0 left-0 right-0 vh-100 w-100">
        <div class="spinner-border spinner-border-lg text-info" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>--}}
    <div class="m-0 mb-3">
        @include('components/navbar/navbar')
        <div class="container-fluid row m-0">
            <div class="card col-lg-12 col-12 mt-3">
                <div class="card-body">
                    <div class="row justify-content-between align-items-center d-n">
                        <div class="row col-12 col-lg-6 flex-column">
                            <div class="col-6 col-lg-6 d-flex justify-content-start">
                                <span class="text-black">{{ $_GET['origin'] }}</span>
                                <span class="text-black"><i class='bx bx-right-arrow-alt'></i></span>
                                <span class="text-black">{{ $_GET['destination'] }}</span>
                            </div>
                            <div class="col-6  col-lg-6 justify-content-start mt-1">
                                <span class="text-black"> {{ $_GET['departure'] }} | </span>
                                <span class="text-black"> {{ $_GET['return-domestic'] == "" ? "One Way" : "Round Trip" }} |</span>
                                <span class="text-black"> {{ $_GET['adult-domestic'] + $_GET['children-domestic'] + $_GET['infant-domestic'] }} Passenger</span>
                            </div>
                        </div>
                        <a href="{{ URL::to('/') }}" class="btn btn-info col-lg-auto col-12">Change search</a>
                    </div>
                </div>
            </div>

            {{-- bus container --}}
            <div class="col-lg-12 col-12  mt-4 p-0" id="flight-list-schedules">
                {{-- bus list --}}
            </div>
        </div>
    </div>

    <div class="bs-toast toast bg-danger top-0 end-0 toast-placement-ex m-2" role="alert" aria-live="assertive" aria-atomic="true" data-delay="0">
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
    <script src="{{ asset('assets/js/flight-domestic.js') }}" type="text/javascript"></script>

@endsection
