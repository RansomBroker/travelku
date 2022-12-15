<div class="col-12">
    <div class="card">
        <div class="card-body row ps-4-4 pe-4-4 pt-4 pb-4">
            <div class="col-12 d-flex justify-content-lg-start justify-content-center align-items-center p-0 mb-3">
                <div class="mt-1">
                    <img src="{{ asset('assets/icons/hotel.png') }}" width="40" height="40" />
                </div>
                <h5 class="mt-3 ps-2">
                    Booking Hotel Murah Online dengan Harga Promo
                </h5>
            </div>
            <div class="w-100">
                <form action="{{ URL::to('hotel/search') }}">
                    <div class="row border border-1 ps-lg-4 pe-lg-4 pt-lg-4 pb-2 pt-3 ">
                        <div class="col-12 col-lg-4 border-end">
                            <label class="form-label">Tujuan</label>
                            <div class="input-group">
                                <div class="input-group-text border-0"><i class="fas fa-map-marker-alt"></i></div>
                                <input id="place-input" type="text" name="place-placeholder" class="form-control border-0 bg-white" value="Jakarta">
                                <input type="hidden" value="8691" name="place">
                                <div target="place"
                                     class="place-picker mt-1 bg-white position-absolute border invisible">
                                    <ul class="list-unstyled m-0">
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-2 pe-0">
                            <label class="form-label">Check In</label>
                            <div class="input-group">
                                <div class="input-group-text border-0"><i class="fas fa-calendar-minus"></i></div>
                                <input type="date" name="check-in" min="{{ date('Y-m-d') }}" value="{{ date('Y-m-d') }}"
                                       class="form-control border-0 bg-white">
                            </div>
                        </div>
                        <div class="col-6 col-lg-2 ps-0 border-end">
                            <label class="form-label">Check Out</label>
                            <div class="input-group">
                                <div class="input-group-text border-0"><i class="fas fa-calendar-minus"></i></div>
                                <input type="date" name="check-out" min="{{date('Y-m-d', strtotime('+1 days')) }}"
                                       value="{{date('Y-m-d', strtotime('+1 days')) }}" class="form-control border-0 bg-white">
                            </div>
                        </div>
                        <div class="col-12 col-lg-4 position-relative">
                            <label class="form-label">Kamar</label>
                            <div class="input-group">
                                <div class="input-group-text border-0"><i class='bx bx-door-open'></i></div>
                                <input type="text" id="room-request" class="form-control border-0 bg-white"
                                       value="1 Kamar" name="room-req-placeholder" readonly>
                            </div>
                            <div class="w-100 position-absolute z-index-4 bg-white mt-2 px-3 py-2 border"
                                 style="visibility: hidden"
                                 id="selector-hotel">
                                <div
                                    class="d-flex flex-wrap align-items-center justify-content-between mb-2 mt-3 bg-white">
                                    <div class="d-flex align-items-center me-5 mb-2">
                                        <i class='bx bxs-bed'></i>
                                        <small>Kamar</small>
                                    </div>
                                    <div class="d-flex align-items-center mb-2">
                                        <button target="room-count"
                                                class="decrement-room btn btn-outline-info btn-xs" disabled><i
                                                class='bx bx-minus'></i></button>
                                        <h6 id="counter-room-count" class="text-center m-0">1
                                        </h6>
                                        <button target="room-count"
                                                class="increment-room btn btn-outline-info btn-xs"><i
                                                class='bx bx-plus'></i></button>
                                    </div>
                                </div>
                                <div class="m-0" id="room-detail-list">
                                </div>
                                <div class="text-start text-lg-end w-100">
                                    <button id="done-room-request"
                                            class="btn btn-info btn-sm mt-1 mb-3">Done
                                    </button>
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="room-count" value="1">

                    </div>
                    <div class="mt-2 row">
                        <div class="col-lg-12 text-end form-group d-none d-lg-block">
                            <button class="btn btn-lg btn-info mt-4"><i class="bx bx-search"></i>Cari Hotel</button>
                        </div>
                    </div>
                    <button class="btn btn-lg btn-info h-100 w-100 mt-4 mt-lg-0 d-block d-lg-none"><i
                            class="bx bx-search"></i>Cari Hotel
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
