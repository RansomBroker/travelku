<div class="col-12">
    <div class="card">
        <div class="card-body d-flex justify-content-center">
            <form action="{{ URL::to('bus/search') }}" class="w-100 row" method="get">
                <div class="col-lg-6 px-lg-3">
                    {{-- Bus--}}
                    <div class="row justify-content-center position-relative">
                        {{-- change destionation--}}
                        <button  id="switch-bus-destination" class="col-auto position-absolute top-55 start-50 translate-middle z-index-2 bg-white border shadow-sm px-1 -py-2 rounded-3 ">
                            <i class='bx bx-sort' style="transform: rotate(90deg)"></i>
                        </button>
                        {{--plane info departure--}}
                        <div class="col-lg-6 col-6 position-relative p-0">
                            <div id="plane-departure-icon" class="position-absolute top-55 start-8 translate-middle-y z-index-2 ">
                                <i class='bx bxs-bus'></i>
                            </div>
                            <label class="form-label">Dari:</label>
                            <input type="text" id="bus-origin" name="bus-origin" value="Jakarta" class="form-control form-control-lg z-index-1 rounded-0 rounded-start text-center">
                            <div target="bus-origin" class="bus-origin-picker origin-picker mt-1 bg-white position-absolute border shadow invisible ">
                                <ul class="list-unstyled m-0">
                                    <li></li>
                                </ul>
                            </div>
                        </div>
                        {{-- plane info arival --}}
                        <div class="col-lg-6 col-6 position-relative p-0">
                            <div id="plane-arrival-icon" class="position-absolute top-55 end-8 translate-middle-y z-index-2">
                                <i class='bx bxs-bus'></i>
                            </div>
                            <label class="form-label">Ke:</label>
                            <input type="text"  id="bus-destination" name="bus-destination" class="form-control form-control-lg z-index-1 rounded-0 text-center rounded-end" value="Surabaya">
                            <div target="bus-destination" class="bus-destination-picker origin-picker mt-1 bg-white position-absolute border shadow invisible ">
                                <ul class="list-unstyled m-0">
                                    <li></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- pasenger and dept date--}}
                <div class="col-lg-6 px-lg-3">
                    <div class="row justify-content-center">
                        <div id="passenger-selector-bus" class="col-lg-6 col-6 p-0 position-relative">
                            <label class="form-label">Penumpang:</label>
                            <div class="m-0 p-0 d-flex justify-content-start">
                                <div class="m-0 border rounded-0 p-2 d-flex align-items-center justify-content-start"><img src="https://cdn-icons-png.flaticon.com/512/1996/1996058.png" width="18"/></div>
                                <input type="text"  class="form-control form-control-lg bg-white rounded-0 text-center" id="input-passenger-bus" value="1 Passenger"  readonly>
                            </div>
                            <div class="position-absolute z-index-4 bg-white mt-2 px-3 py-2 border"
                                 id="selector-bus" style="visibility: hidden !important;">
                                <div
                                    class="d-flex flex-wrap align-items-center justify-content-between mb-2 mt-3 bg-white">
                                    <div class="d-flex align-items-center me-5 mb-2">
                                        <i class='bx bxs-user'></i>
                                        <small>Adult (Age 12 and
                                            over)</small>
                                    </div>
                                    <div class="d-flex align-items-center mb-2">
                                        <button target="adult-bus"
                                                class="decrement-bus btn btn-outline-info btn-xs" disabled><i
                                                class='bx bx-minus'></i></button>
                                        <h6 id="counter-adult-bus" class="m-0 mx-2">1
                                        </h6>
                                        <button target="adult-bus"
                                                class="increment-bus btn btn-outline-info btn-xs"><i
                                                class='bx bx-plus'></i></button>
                                    </div>
                                </div>
                                <div
                                    class="d-flex flex-wrap align-items-center justify-content-between mb-2">
                                    <div class="d-flex align-items-center me-5 mb-2">
                                        <i class='bx bx-user-pin'></i>
                                        <small>Children (Age 2 -
                                            11)</small>
                                    </div>
                                    <div class="d-flex align-items-center mb-2">
                                        <button target="children-bus"
                                                class="decrement-bus btn btn-outline-info btn-xs" disabled><i
                                                class='bx bx-minus'></i></button>
                                        <h6 id="counter-children-bus" class="m-0 mx-2">0
                                        </h6>
                                        <button target="children-bus"
                                                class="increment-bus btn btn-outline-info btn-xs"><i
                                                class='bx bx-plus'></i></button>
                                    </div>
                                </div>
                                <div
                                    class="d-flex flex-wrap align-items-center justify-content-between mb-2">
                                    <div class="d-flex align-items-center me-5 mb-2">
                                        <i class='bx bxs-baby-carriage me-2'></i>
                                        <small>Infants (below
                                            age 3)</small>
                                    </div>
                                    <div class="d-flex align-items-center mb-2">
                                        <button target="infant-bus"
                                                class="decrement-bus btn btn-outline-info btn-xs" disabled><i
                                                class='bx bx-minus'></i></button>
                                        <h6 id="counter-infant-bus" class="m-0 mx-2">0
                                        </h6>
                                        <button target="infant-bus"
                                                class="increment-bus btn btn-outline-info btn-xs"><i
                                                class='bx bx-plus'></i></button>
                                    </div>
                                </div>
                                <div class="text-start text-lg-end w-100">
                                    <button id="done-passenger-bus"
                                            class="btn btn-info btn-sm mt-1 mb-3">Done</button>
                                </div>
                            </div>
                            <input type="hidden" value="1" name="adult-bus">
                            <input type="hidden" value="0" name="children-bus">
                            <input type="hidden" value="0" name="infant-bus">
                        </div>
                        <div class="col-lg-6 col-6 p-0 ">
                            <label class="form-label">Tanggal:</label>
                            <input type="date" min="{{ date('Y-m-d') }}" value="{{ date('Y-m-d') }}" name="departure" class="form-control form-control-lg rounded-1 text-center" required>
                        </div>
                    </div>
                </div>
                <div class="w-100 d-flex justify-content-lg-end justify-content-center p-0 mt-3">
                    <button class="btn btn-lg btn-info mt-4 mt-lg-0 col-12 col-lg-auto"><i
                            class="bx bx-search"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>
