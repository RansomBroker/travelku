@extends('master')

@section('title', 'Travelku - Hasil Pencarian Bus')


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
    <div class="m-0">
        @include('components/navbar/navbar')
        {{-- hide input to parse it to js --}}
        <input type="hidden" name="train-origin" value="{{ $_GET['train-origin'] }}">
        <input type="hidden" name="train-destination" value="{{ $_GET['train-destination'] }}">
        <input type="hidden" name="adult-train" value="{{ $_GET['adult-train'] }}">
        <input type="hidden" name="children-train" value="{{ $_GET['children-train']}}">
        <input type="hidden" name="infant-train" value="{{ $_GET['infant-train'] }}">
        <input type="hidden" name="departure" value="{{ $_GET['departure'] }}">


        <div class="container-fluid row m-0">
            <div class="card col-lg-12 col-12 mt-3">
                <div class="card-body">
                    <div class="row justify-content-between align-items-center d-n">
                        <div class="row col-12 col-lg-6 flex-column">
                            <div class="col-6 col-lg-6 d-flex justify-content-start">
                                <span class="text-black">{{ $_GET['train-origin'] }}</span>
                                <span class="text-black"><i class='bx bx-right-arrow-alt'></i></span>
                                <span class="text-black">{{ $_GET['train-destination'] }}</span>
                            </div>
                            <div class="col-6  col-lg-6 justify-content-start mt-1">
                                <span class="text-black"> {{ $_GET['departure'] }} | </span>
                                <span class="text-black"> {{ $_GET['adult-train'] + $_GET['children-train'] + $_GET['infant-train'] }} Passenger</span>
                            </div>
                        </div>
                        <a href="{{ URL::to('/') }}" class="btn btn-info col-lg-auto col-12">Change search</a>
                    </div>
                </div>
            </div>

            {{-- bus container --}}
            <div class="col-lg-12 col-12  mt-4 p-0" id="bus-list-schedules">
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

    <script src="{{ asset('assets/js/train-search.js') }}"></script>

@endsection

