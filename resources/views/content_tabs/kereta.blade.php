<div class="col-12">
    <div class="card">
        <div class="card-body">
            <form method="get" action="{{ URL::to('train/search') }}"  >
                <div class="row justify-content-start position-relative p-0">
                    {{-- Train destination --}}
                    <div class="col-lg-6 px-lg-3 ">
                        {{-- Train--}}
                        <div class="row justify-content-center position-relative p-0">
                            {{-- change destination--}}
                            <button  id="switch-train-destination" class="col-auto position-absolute top-55 start-50 translate-middle z-index-2 bg-white border shadow-sm px-1 -py-2 rounded-3 ">
                                <i class='bx bx-sort' style="transform: rotate(90deg)"></i>
                            </button>
                            {{--train info departure--}}
                            <div class="col-lg-6 col-6 position-relative p-0">
                                <div id="plane-departure-icon" class="position-absolute top-55 start-8 translate-middle-y z-index-2 ">
                                    <i class='bx bxs-train'></i>
                                </div>
                                <label class="form-label">Dari:</label>
                                <input type="text" id="train-origin" name="train-origin-placeholder" value="Jakarta, Gambir (GMR)" class="form-control form-control-lg z-index-1 rounded-0 rounded-start text-center">
                                {{-- select train --}}
                                <input type="hidden" value="GMR" name="train-origin">
                                <div target="origin" class="origin-picker mt-1 bg-white position-absolute border invisible">
                                    <ul class="list-unstyled m-0">
                                        <li></li>
                                    </ul>
                                </div>
                            </div>
                            {{-- train info arival --}}
                            <div class="col-lg-6 col-6 position-relative p-0">
                                <div id="plane-arrival-icon" class="position-absolute top-55 end-8 translate-middle-y z-index-2">
                                    <i class='bx bxs-train'></i>
                                </div>
                                <label class="form-label">Ke:</label>
                                <input type="text"  id="train-destination" name="train-destination-placeholder" class="form-control form-control-lg z-index-1 rounded-0 text-center rounded-end" value="Bandung, Bandung (BD)">
                                {{-- select airport--}}
                                <input type="hidden" value="BD" name="train-destination">
                                <div target="destination" class="destination-picker mt-1 bg-white position-absolute border invisible">
                                    <ul class="list-unstyled m-0">
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Train passenger info--}}
                    <div class="col-lg-6 px-lg-3">
                        <div class=" row justify-content-start  p-0">
                            <div id="passenger-selector-train" class="col-lg-6 col-6 p-0 position-relative">
                                <label class="form-label">Penumpang:</label>
                                <div class="m-0 p-0 d-flex justify-content-start">
                                    <div class="m-0 border rounded-0 p-2 d-flex align-items-center justify-content-start"><img src="https://cdn-icons-png.flaticon.com/512/1996/1996058.png" width="18"/></div>
                                    <input type="text"  class="form-control form-control-lg bg-white rounded-0 text-center" id="input-passenger-train" value="1 Passenger"  readonly>
                                </div>
                                <div class="position-absolute z-index-4 bg-white mt-2 px-3 py-2 border"
                                     id="selector-train" style="visibility: hidden !important;">
                                    <div
                                        class="d-flex flex-wrap align-items-center justify-content-between mb-2 mt-3 bg-white">
                                        <div class="d-flex align-items-center me-5 mb-2">
                                            <i class='bx bxs-user'></i>
                                            <small>Adult (Age 12 and
                                                over)</small>
                                        </div>
                                        <div class="d-flex align-items-center mb-2">
                                            <button target="adult-train"
                                                    class="decrement-train btn btn-outline-info btn-xs" disabled><i
                                                    class='bx bx-minus'></i></button>
                                            <h6 id="counter-adult-train" class="m-0 mx-2">1
                                            </h6>
                                            <button target="adult-train"
                                                    class="increment-train btn btn-outline-info btn-xs"><i
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
                                            <button target="children-train"
                                                    class="decrement-train btn btn-outline-info btn-xs" disabled><i
                                                    class='bx bx-minus'></i></button>
                                            <h6 id="counter-children-train" class="m-0 mx-2">0
                                            </h6>
                                            <button target="children-train"
                                                    class="increment-train btn btn-outline-info btn-xs"><i
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
                                            <button target="infant-train"
                                                    class="decrement-train btn btn-outline-info btn-xs" disabled><i
                                                    class='bx bx-minus'></i></button>
                                            <h6 id="counter-infant-train" class="m-0 mx-2">0
                                            </h6>
                                            <button target="infant-train"
                                                    class="increment-train btn btn-outline-info btn-xs"><i
                                                    class='bx bx-plus'></i></button>
                                        </div>
                                    </div>
                                    <div class="text-start text-lg-end w-100">
                                        <button id="done-passenger-train"
                                                class="btn btn-info btn-sm mt-1 mb-3">Done</button>
                                    </div>
                                </div>
                                <input type="hidden" value="1" name="adult-train">
                                <input type="hidden" value="0" name="children-train">
                                <input type="hidden" value="0" name="infant-train">
                            </div>
                            <div class="col-lg-6 col-6 p-0">
                                <label class="form-label">Tanggal:</label>
                                <input type="date" min="{{ date('Y-m-d') }}" value="{{ date('Y-m-d') }}" name="departure" class="form-control form-control-lg rounded-1 text-center" required>
                            </div>
                        </div>
                    </div>
                    <div class="w-100 d-flex justify-content-lg-end justify-content-center p-0 mt-3">
                        <button class="btn btn-lg btn-info mt-4 mt-lg-0 col-12 col-lg-auto"><i
                                class="bx bx-search"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
