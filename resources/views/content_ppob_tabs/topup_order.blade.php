@extends('master')

@section('title', 'Travelku - PPOB TOP UP Order')


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
    <div class="row m-0">
        @include('components/navbar/navbar')
        <div class="col-lg-6 col-md-6 col-6 p-2">
            <div class="card">
                <div class="card-body">
                    <h5 class="text-black">{{ $products[0]['provider']}}</h5>
                    <div class="row d-flex justify-content-start">
                        @foreach($products as $data)
                            <div class="card col-auto border-1">
                                <div class="card-body">
                                    <p class="text-center">{{ $data['name'] }}</p>
                                    <p class="text-center">{{ "Rp.".$data['price'] }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-6 p-2">
            <div class="card">
                <div class="card-body">
                    <h5>Order</h5>
                    <form class="mt-3">
                        <div class="mb-3">
                            <input
                                type="text"
                                class="form-control"
                                id="phone"
                                name="phone"
                                pattern="[+][0-9]{2}[0-9]{11}"
                                placeholder="Phone (eg: +62XXXXXXXXXXX)" required
                                autofocus
                            />
                        </div>
                        <button class="btn btn-primary">Create Order</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
