@extends('master')

@section('title', 'Travelku - Hasil Pencarian Hotel')


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
    {{--<div id="overlay" style="z-index: 20"
         class="bg-white d-flex align-items-center justify-content-center position-fixed top-0 bottom-0 left-0 right-0 vh-100 w-100">
        <div class="spinner-border spinner-border-lg text-info" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>--}}
    <div class="m-0">
        @include('components/navbar/navbar')
        {{-- hide input to parse it to js --}}
        <input type="hidden" name="room-count" value="{{ $_GET["room-count"] }}">
        <input type="hidden" name="place" value="{{ $_GET["place"] }}">
        <input type="hidden" name="place-placeholder" value="{{ $_GET["place-placeholder"] }}">
        <input type="hidden" name="check-in" value="{{ $_GET["check-in"] }}">
        <input type="hidden" name="check-out" value="{{ $_GET["check-out"] }}">
        @php($roomCount = $_GET['room-count'])
        @for($i = 1; $i <= $roomCount; $i++)
            <input type="hidden" name="{{ "room-type-".strval($i) }}" value="{{ $_GET["room-type-".strval($i)] }}">
        @endfor

        <div class="container-fluid row m-0">
            <div class="card col-lg-12 col-12 mt-3">
                <div class="card-body p-2 p-lg-4">
                    <div class="row justify-content-between align-items-center">
                        <div class="row col-12 col-lg-6 flex-column">
                            <div class="col-6 col-lg-6 d-flex justify-content-start">
                                <div class="d-flex flex-column justify-content-start">
                                    <span class="form-label m-0">Daerah Hotel</span>
                                    <span class="text-black">{{$_GET['place-placeholder']}}</span>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6 justify-content-start mt-1">
                                <div class="row justify-content-start">
                                    <div class="col-auto d-flex flex-column justify-content-start border-end">
                                        <span class="form-label m-0">Check In</span>
                                        <span class="text-black">{{$_GET['check-in']}}</span>
                                    </div>
                                    <div class="col-auto d-flex flex-column justify-content-start border-end">
                                        <span class="form-label m-0">Check Out</span>
                                        <span class="text-black">{{$_GET['check-out']}}</span>
                                    </div>
                                    <div class="col-auto d-flex flex-column justify-content-start">
                                        <span class="form-label m-0">Kamar</span>
                                        <span class="text-black">{{$_GET['room-count']}} Kamar</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ URL::to('/') }}" class="btn btn-info col-lg-auto col-12">Change search</a>
                    </div>
                </div>
            </div>
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

    <script src="{{ asset('assets/js/hotel-search.js') }}"></script>

@endsection

