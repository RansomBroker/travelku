<div class="col-12">
    <div class="card">
        <div class="card-body">
            <ul class="nav nav-pills headerIcon" id="pills-tab" role="tablist">
                <li class="nav-item sabre" role="presentation">
                    <button class="nav-link active rounded-0 rounded-start-top fs-small p-xs-1" id="pills-sabre-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-sabre" type="button" role="tab" aria-controls="pills-sabre"
                        aria-selected="true">SABRE</button>
                </li>
                <li class="nav-item amadeus fs-small" role="presentation">
                    <button class="p-xs-1 nav-link rounded-0" id="pills-amadeus-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-amadeus" type="button" role="tab" aria-controls="pills-amadeus"
                        aria-selected="false">AMADEUS</button>
                </li>
                <li class="nav-item domestic fs-small" role="presentation">
                    <button class="nav-link rounded-0 rounded-end-top p-xs-1" id="pills-domestic-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-domestic" type="button" role="tab" aria-controls="pills-domestic"
                            aria-selected="false">DOMESTIK</button>
                </li>
            </ul>
            <div class="tab-content px-0" id="pills-tabContent">
                {{-- sabre --}}
                <div class="tab-pane fade show active" id="pills-sabre" role="tabpanel" aria-labelledby="pills-sabre">
                    <form action="{{ URL::to('flight/search-sabre') }}">
                        <div class="d-flex flex-column-reverse flex-lg-column">
                            <div class="row">
                                <div class="col-lg-6  px-lg-3">
                                    {{-- Flight Information--}}
                                    <div class="row justify-content-center position-relative">
                                        {{-- change destionation--}}
                                        <button  id="switch-airport" class="col-auto position-absolute top-55 start-50 translate-middle z-index-2 bg-white border shadow-sm px-1 -py-2 rounded-3 ">
                                            <i class='bx bx-sort' style="transform: rotate(90deg)"></i>
                                        </button>
                                        {{--plane info departure--}}
                                        <div class="col-lg-6 col-6 position-relative p-0">
                                            <div id="plane-departure-icon" class="position-absolute top-55 start-8 translate-middle-y z-index-2 ">
                                                <i class='bx bxs-plane-take-off'></i>
                                            </div>
                                            <label class="form-label">Dari:</label>
                                            <input type="text" id="origin" name="origin-placeholder" value="Jakarta (CGK)" class="form-control form-control-lg z-index-1 rounded-0 rounded-start text-center">
                                            {{-- select airport--}}
                                            <input type="hidden" value="CGK" name="origin">
                                            <div target="origin" class="origin-picker mt-1 bg-white position-absolute border invisible">
                                                <ul class="list-unstyled m-0">
                                                </ul>
                                            </div>
                                        </div>
                                        {{-- plane info arival --}}
                                        <div class="col-lg-6 col-6 position-relative p-0">
                                            <div id="plane-arrival-icon" class="position-absolute top-55 end-8 translate-middle-y z-index-2">
                                                <i class='bx bxs-plane-land' ></i>
                                            </div>
                                            <label class="form-label">Ke:</label>
                                            <input type="text"  id="destination" name="destination-placeholder" class="form-control form-control-lg z-index-1 rounded-0 text-center rounded-end" value="Jeddah (JED)">
                                            {{-- select airport--}}
                                            <input type="hidden" value="JED" name="destination">
                                            <div target="destination" class="destination-picker mt-1 bg-white position-absolute border invisible">
                                                <ul class="list-unstyled m-0">
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Flight Date --}}
                                    <div class="row justify-content-center p-0 ">
                                        {{-- Departure --}}
                                        <div class="col-lg-6 col-6 p-0 mt-3">
                                            <label class="form-label mb-1" l>Departure</label>
                                            <input type="date" min="{{ date('Y-m-d') }}" value="{{ date('Y-m-d') }}" name="departure" class="form-control form-control-lg rounded-0 rounded-start text-center" required>
                                        </div>
                                        {{-- Arrival --}}
                                        <div class="col-lg-6 col-6 p-0 mt-3">
                                            <input class="form-check-input return-switch rounded-circle" type="checkbox">
                                            <label class="mb-1 form-label">Return</label>
                                            <input type="date" name="return" min="{{date('Y-m-d', strtotime('+1 days')) }}" class="form-control d-noned-lg-block form-control-lg invisible rounded-0 rounded-end text-center">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 p-0 px-lg-3">
                                    <div class="row justify-content-center align-items-end gx-0">
                                        <div id="passenger-selector" class="d-flex justify-content-start col-6 col-lg-6 d-inline relative">
                                            <span class="input-group-text rounded-0 rounded-start "><img src="https://cdn-icons-png.flaticon.com/512/1996/1996058.png" width="18"/></span>
                                            <input class="form-control form-control-lg bg-white rounded-0 text-center" id="input-passenger"
                                                   value="1 Passenger" readonly>
                                            <div class="position-absolute z-index-4 bg-white mt-2 px-3 py-2 border"
                                                 id="selector">
                                                <div
                                                    class="d-flex flex-wrap align-items-center justify-content-between mb-2 mt-3 bg-white">
                                                    <div class="d-flex align-items-center me-5 mb-2">
                                                        <i class='bx bxs-user'></i>
                                                        <small>Adult (Age 12 and
                                                            over)</small>
                                                    </div>
                                                    <div class="d-flex align-items-center mb-2">
                                                        <button target="adult"
                                                                class="decrement btn btn-outline-info btn-xs" disabled><i
                                                                class='bx bx-minus'></i></button>
                                                        <h6 id="counter-adult" class="m-0">1
                                                        </h6>
                                                        <button target="adult"
                                                                class="increment btn btn-outline-info btn-xs"><i
                                                                class='bx bx-plus'></i></button>
                                                    </div>
                                                </div>
                                                <div
                                                    class="d-flex flex-wrap align-items-center justify-content-between mb-2">
                                                    <div class="d-flex align-items-center me-5 mb-2">
                                                        <i class='bx bx-user-pin'></i>
                                                        <small>Children (Age 2 -
                                                            11)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</small>
                                                    </div>
                                                    <div class="d-flex align-items-center mb-2">
                                                        <button target="children"
                                                                class="decrement btn btn-outline-info btn-xs" disabled><i
                                                                class='bx bx-minus'></i></button>
                                                        <h6 id="counter-children" class="m-0">0
                                                        </h6>
                                                        <button target="children"
                                                                class="increment btn btn-outline-info btn-xs"><i
                                                                class='bx bx-plus'></i></button>
                                                    </div>
                                                </div>
                                                <div
                                                    class="d-flex flex-wrap align-items-center justify-content-between mb-2">
                                                    <div class="d-flex align-items-center me-5 mb-2">
                                                        <i class='bx bxs-baby-carriage me-2'></i>
                                                        <small>Infants (below
                                                            age 2)</small>
                                                    </div>
                                                    <div class="d-flex align-items-center mb-2">
                                                        <button target="infant"
                                                                class="decrement btn btn-outline-info btn-xs" disabled><i
                                                                class='bx bx-minus'></i></button>
                                                        <h6 id="counter-infant" class="m-0">0
                                                        </h6>
                                                        <button target="infant"
                                                                class="increment btn btn-outline-info btn-xs"><i
                                                                class='bx bx-plus'></i></button>
                                                    </div>
                                                </div>
                                                <div class="text-start text-lg-end w-100">
                                                    <button id="done-passenger"
                                                            class="btn btn-info btn-sm mt-1 mb-3">Done</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-lg-6">
                                            <label class="content-class text-white">Lorem</label>
                                            <select class="form-select form-select-lg rounded-0 text-center rounded-end" name="class">
                                                <option value="ECONOMY">Economy
                                                </option>
                                                <option value="PREMIUM_ECONOMY">
                                                    Premium</option>
                                                <option value="BUSINESS">
                                                    Business</option>
                                                <option value="FIRST">First
                                                    Class</option>
                                            </select>
                                            <input type="hidden" value="1" name="adult">
                                            <input type="hidden" value="0" name="children">
                                            <input type="hidden" value="0" name="infant">
                                        </div>
                                        <div class="row justify-content-start p-0 ">
                                            {{-- Departure --}}
                                            <div class="col-lg-6 col-12 p-0 mt-3">
                                                <label class="content-class text-white">Lorem</label>
                                                <div class="d-flex justify-content-start m-0 p-0">
                                                    <span class="input-group-text rounded-0 rounded-start">@</span>
                                                    <input type="input" placeholder="ADD MULTI CITY" name="multi-city" class="form-control form-control-lg rounded-0 rounded-end text-center">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 text-end form-group d-none d-lg-block">
                                    <button class="btn btn-lg btn-info mt-4"><i class="bx bx-search"></i></button>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-lg btn-info h-100 w-100 mt-4 mt-lg-0 d-block d-lg-none"><i
                                class="bx bx-search"></i></button>
                    </form>
                </div>
                {{-- amadeus --}}
                <div class="tab-pane fade px-0" id="pills-amadeus" role="tabpanel" aria-labelledby="pills-amadeus">
                    <form action="{{ URL::to('flight/search') }}">
                        <div class="d-flex flex-column-reverse flex-lg-column">
                            <div class="row">
                                <div class="col-lg-6  px-lg-3">
                                    {{-- Flight Information--}}
                                    <div class="row justify-content-center position-relative">
                                        {{-- change destionation--}}
                                        <button  id="switch-airport-amadeus" class="col-auto position-absolute top-55 start-50 translate-middle z-index-2 bg-white border shadow-sm px-1 -py-2 rounded-3 ">
                                            <i class='bx bx-sort' style="transform: rotate(90deg)"></i>
                                        </button>
                                        {{--plane info departure--}}
                                        <div class="col-lg-6 col-6 position-relative p-0">
                                            <div id="plane-departure-icon-amadeus" class="position-absolute top-55 start-8 translate-middle-y z-index-2 ">
                                                <i class='bx bxs-plane-take-off'></i>
                                            </div>
                                            <label class="form-label">Dari:</label>
                                            <input type="text" id="origin-amadeus" name="origin-placeholder" value="Jakarta (CGK)" class="form-control form-control-lg z-index-1 rounded-0 rounded-start text-center">
                                            {{-- select airport--}}
                                            <input type="hidden" value="CGK" name="origin">
                                            <div target="origin" class="origin-picker mt-1 bg-white position-absolute border invisible">
                                                <ul class="list-unstyled m-0">
                                                </ul>
                                            </div>
                                        </div>
                                        {{-- plane info arival --}}
                                        <div class="col-lg-6 col-6 position-relative p-0">
                                            <div id="plane-arrival-icon-amadeus" class="position-absolute top-55 end-8 translate-middle-y z-index-2">
                                                <i class='bx bxs-plane-land' ></i>
                                            </div>
                                            <label class="form-label">Ke:</label>
                                            <input type="text"  id="destination-amadeus" name="destination-placeholder" class="form-control form-control-lg z-index-1 rounded-0 text-center rounded-end" value="Jeddah (JED)">
                                            {{-- select airport--}}
                                            <input type="hidden" value="JED" name="destination">
                                            <div target="destination" class="destination-picker mt-1 bg-white position-absolute border invisible">
                                                <ul class="list-unstyled m-0">
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Flight Date --}}
                                    <div class="row justify-content-center p-0 ">
                                        {{-- Departure --}}
                                        <div class="col-lg-6 col-6 p-0 mt-3">
                                            <label class="form-label mb-1" l>Departure</label>
                                            <input type="date" min="{{ date('Y-m-d') }}" value="{{ date('Y-m-d') }}" name="departure" class="form-control form-control-lg rounded-0 rounded-start text-center" required>
                                        </div>
                                        {{-- Arrival --}}
                                        <div class="col-lg-6 col-6 p-0 mt-3">
                                            <input class="form-check-input return-switch-amadeus rounded-circle" type="checkbox">
                                            <label class="mb-1 form-label">Return</label>
                                            <input type="date" name="return-amadeus" min="{{date('Y-m-d', strtotime('+1 days')) }}" class="form-control d-noned-lg-block form-control-lg invisible rounded-0 rounded-end text-center">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 p-0 px-lg-3">
                                    <div class="row justify-content-center align-items-end gx-0">
                                        <div id="passenger-selector-amadeus" class="d-flex justify-content-start col-6 col-lg-6 d-inline relative">
                                            <span class="input-group-text rounded-0 rounded-start "><img src="https://cdn-icons-png.flaticon.com/512/1996/1996058.png" width="18"/></span>
                                            <input class="form-control form-control-lg bg-white rounded-0 text-center" id="input-passenger-amadeus"
                                                   value="1 Passenger" readonly>
                                            <div class="position-absolute z-index-4 bg-white mt-2 px-3 py-2 border"
                                                 id="selector-amadeus">
                                                <div
                                                    class="d-flex flex-wrap align-items-center justify-content-between mb-2 mt-3 bg-white">
                                                    <div class="d-flex align-items-center me-5 mb-2">
                                                        <i class='bx bxs-user'></i>
                                                        <small>Adult (Age 12 and
                                                            over)</small>
                                                    </div>
                                                    <div class="d-flex align-items-center mb-2">
                                                        <button target="adult-amadeus"
                                                                class="decrement-amadeus btn btn-outline-info btn-xs" disabled><i
                                                                class='bx bx-minus'></i></button>
                                                        <h6 id="counter-adult-amadeus" class="m-0">1
                                                        </h6>
                                                        <button target="adult-amadeus"
                                                                class="increment-amadeus btn btn-outline-info btn-xs"><i
                                                                class='bx bx-plus'></i></button>
                                                    </div>
                                                </div>
                                                <div
                                                    class="d-flex flex-wrap align-items-center justify-content-between mb-2">
                                                    <div class="d-flex align-items-center me-5 mb-2">
                                                        <i class='bx bx-user-pin'></i>
                                                        <small>Children (Age 2 -
                                                            11)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</small>
                                                    </div>
                                                    <div class="d-flex align-items-center mb-2">
                                                        <button target="children-amadeus"
                                                                class="decrement-amadeus btn btn-outline-info btn-xs" disabled><i
                                                                class='bx bx-minus'></i></button>
                                                        <h6 id="counter-children-amadeus" class="m-0">0
                                                        </h6>
                                                        <button target="children-amadeus"
                                                                class="increment-amadeus btn btn-outline-info btn-xs"><i
                                                                class='bx bx-plus'></i></button>
                                                    </div>
                                                </div>
                                                <div
                                                    class="d-flex flex-wrap align-items-center justify-content-between mb-2">
                                                    <div class="d-flex align-items-center me-5 mb-2">
                                                        <i class='bx bxs-baby-carriage me-2'></i>
                                                        <small>Infants (below
                                                            age 2)</small>
                                                    </div>
                                                    <div class="d-flex align-items-center mb-2">
                                                        <button target="infant-amadeus"
                                                                class="decrement-amadeus btn btn-outline-info btn-xs" disabled><i
                                                                class='bx bx-minus'></i></button>
                                                        <h6 id="counter-infant-amadeus" class="m-0">0
                                                        </h6>
                                                        <button target="infant-amadeus"
                                                                class="increment-amadeus btn btn-outline-info btn-xs"><i
                                                                class='bx bx-plus'></i></button>
                                                    </div>
                                                </div>
                                                <div class="text-start text-lg-end w-100">
                                                    <button id="done-passenger-amadeus"
                                                            class="btn btn-info btn-sm mt-1 mb-3">Done</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-lg-6">
                                            <label class="content-class text-white">Lorem</label>
                                            <select class="form-select form-select-lg rounded-0 text-center rounded-end" name="class">
                                                <option value="ECONOMY">Economy
                                                </option>
                                                <option value="BUSINESS">
                                                    Business</option>
                                                <option value="FIRST">First
                                                    Class</option>
                                            </select>
                                            <input type="hidden" value="1" name="adult-amadeus">
                                            <input type="hidden" value="0" name="children-amadeus">
                                            <input type="hidden" value="0" name="infant-amadeus">
                                        </div>
                                        {{-- multi city--}}
                                        <div class="row justify-content-start p-0 ">
                                            {{-- Departure --}}
                                            <div class="col-lg-6 col-12 p-0 mt-3">
                                                <label class="content-class text-white">Lorem</label>
                                                <div class="d-flex justify-content-start m-0 p-0">
                                                    <span class="input-group-text rounded-0 rounded-start">@</span>
                                                    <input type="input" placeholder="ADD MULTI CITY" name="multi-city" class="form-control form-control-lg rounded-0 rounded-end text-center">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 text-end form-group d-none d-lg-block">
                                    <button class="btn btn-lg btn-info mt-4"><i class="bx bx-search"></i></button>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-lg btn-info h-100 w-100 mt-4 mt-lg-0 d-block d-lg-none"><i
                                class="bx bx-search"></i></button>
                    </form>
                </div>
                {{-- domestic --}}
                <div class="tab-pane fade px-0" id="pills-domestic" role="tabpanel" aria-labelledby="pills-domestic">
                    <form action="{{ URL::to('flight/search-domestic') }}">
                        <div class="d-flex flex-column-reverse flex-lg-column">
                            <div class="row">
                                <div class="col-lg-6  px-lg-3">
                                    {{-- Flight Information--}}
                                    <div class="row justify-content-center position-relative">
                                        {{-- change destionation--}}
                                        <button  id="switch-airport-domestic" class="col-auto position-absolute top-55 start-50 translate-middle z-index-2 bg-white border shadow-sm px-1 -py-2 rounded-3 ">
                                            <i class='bx bx-sort' style="transform: rotate(90deg)"></i>
                                        </button>
                                        {{--plane info departure--}}
                                        <div class="col-lg-6 col-6 position-relative p-0">
                                            <div id="plane-departure-icon-domestic" class="position-absolute top-55 start-8 translate-middle-y z-index-2 ">
                                                <i class='bx bxs-plane-take-off'></i>
                                            </div>
                                            <label class="form-label">Dari:</label>
                                            <input type="text" id="origin-domestic" name="origin-placeholder" value="Jakarta (CGK)" class="form-control form-control-lg z-index-1 rounded-0 rounded-start text-center">
                                            {{-- select airport--}}
                                            <input type="hidden" value="CGK" name="origin">
                                            <div target="origin" class="origin-picker mt-1 bg-white position-absolute border invisible">
                                                <ul class="list-unstyled m-0">
                                                </ul>
                                            </div>
                                        </div>
                                        {{-- plane info arival --}}
                                        <div class="col-lg-6 col-6 position-relative p-0">
                                            <div id="plane-arrival-icon-domestic" class="position-absolute top-55 end-8 translate-middle-y z-index-2">
                                                <i class='bx bxs-plane-land' ></i>
                                            </div>
                                            <label class="form-label">Ke:</label>
                                            <input type="text"  id="destination-domestic" name="destination-placeholder" class="form-control form-control-lg z-index-1 rounded-0 text-center rounded-end" value="Surabaya (SUB)">
                                            {{-- select airport--}}
                                            <input type="hidden" value="SUB" name="destination">
                                            <div target="destination" class="destination-picker mt-1 bg-white position-absolute border invisible">
                                                <ul class="list-unstyled m-0">
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Flight Date --}}
                                    <div class="row justify-content-center p-0 ">
                                        {{-- Departure --}}
                                        <div class="col-lg-6 col-6 p-0 mt-3">
                                            <label class="form-label mb-1" l>Departure</label>
                                            <input type="date" min="{{ date('Y-m-d') }}" value="{{ date('Y-m-d') }}" name="departure" class="form-control form-control-lg rounded-0 rounded-start text-center" required>
                                        </div>
                                        {{-- Arrival --}}
                                        <div class="col-lg-6 col-6 p-0 mt-3">
                                            <input class="form-check-input return-switch-domestic rounded-circle" type="checkbox">
                                            <label class="mb-1 form-label">Return</label>
                                            <input type="date" name="return-domestic" min="{{date('Y-m-d', strtotime('+1 days')) }}" class="form-control d-noned-lg-block form-control-lg invisible rounded-0 rounded-end text-center">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 p-0 px-lg-3">
                                    <div class="row justify-content-center align-items-end gx-0">
                                        <div id="passenger-selector-domestic" class="d-flex justify-content-start col-6 col-lg-6 d-inline relative">
                                            <span class="input-group-text rounded-0 rounded-start "><img src="https://cdn-icons-png.flaticon.com/512/1996/1996058.png" width="18"/></span>
                                            <input class="form-control form-control-lg bg-white rounded-0 text-center" id="input-passenger-domestic"
                                                   value="1 Passenger" readonly>
                                            <div class="position-absolute z-index-4 bg-white mt-2 px-3 py-2 border"
                                                 id="selector-domestic">
                                                <div
                                                    class="d-flex flex-wrap align-items-center justify-content-between mb-2 mt-3 bg-white">
                                                    <div class="d-flex align-items-center me-5 mb-2">
                                                        <i class='bx bxs-user'></i>
                                                        <small>Adult (Age 12 and
                                                            over)</small>
                                                    </div>
                                                    <div class="d-flex align-items-center mb-2">
                                                        <button target="adult-domestic"
                                                                class="decrement-domestic btn btn-outline-info btn-xs" disabled><i
                                                                class='bx bx-minus'></i></button>
                                                        <h6 id="counter-adult-domestic" class="m-0">1
                                                        </h6>
                                                        <button target="adult-domestic"
                                                                class="increment-domestic btn btn-outline-info btn-xs"><i
                                                                class='bx bx-plus'></i></button>
                                                    </div>
                                                </div>
                                                <div
                                                    class="d-flex flex-wrap align-items-center justify-content-between mb-2">
                                                    <div class="d-flex align-items-center me-5 mb-2">
                                                        <i class='bx bx-user-pin'></i>
                                                        <small>Children (Age 2 -
                                                            11)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</small>
                                                    </div>
                                                    <div class="d-flex align-items-center mb-2">
                                                        <button target="children-domestic"
                                                                class="decrement-domestic btn btn-outline-info btn-xs" disabled><i
                                                                class='bx bx-minus'></i></button>
                                                        <h6 id="counter-children-domestic" class="m-0">0
                                                        </h6>
                                                        <button target="children-domestic"
                                                                class="increment-domestic btn btn-outline-info btn-xs"><i
                                                                class='bx bx-plus'></i></button>
                                                    </div>
                                                </div>
                                                <div
                                                    class="d-flex flex-wrap align-items-center justify-content-between mb-2">
                                                    <div class="d-flex align-items-center me-5 mb-2">
                                                        <i class='bx bxs-baby-carriage me-2'></i>
                                                        <small>Infants (below
                                                            age 2)</small>
                                                    </div>
                                                    <div class="d-flex align-items-center mb-2">
                                                        <button target="infant-domestic"
                                                                class="decrement-domestic btn btn-outline-info btn-xs" disabled><i
                                                                class='bx bx-minus'></i></button>
                                                        <h6 id="counter-infant-domestic" class="m-0">0
                                                        </h6>
                                                        <button target="infant-domestic"
                                                                class="increment-domestic btn btn-outline-info btn-xs"><i
                                                                class='bx bx-plus'></i></button>
                                                    </div>
                                                </div>
                                                <div class="text-start text-lg-end w-100">
                                                    <button id="done-passenger-domestic"
                                                            class="btn btn-info btn-sm mt-1 mb-3">Done</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-lg-6">
                                            <label class="content-class text-white">Lorem</label>
                                            <select class="form-select form-select-lg rounded-0 text-center rounded-end" name="class">
                                                <option value="ECONOMY">Economy
                                                </option>
                                                <option value="BUSINESS">
                                                    Business</option>
                                                <option value="FIRST">First
                                                    Class</option>
                                            </select>
                                            <input type="hidden" value="1" name="adult-domestic">
                                            <input type="hidden" value="0" name="children-domestic">
                                            <input type="hidden" value="0" name="infant-domestic">
                                        </div>
                                        {{-- multi city--}}
                                        <div class="row justify-content-start p-0 ">
                                            {{-- Departure --}}
                                            <div class="col-lg-6 col-12 p-0 mt-3">
                                                <label class="content-class text-white">Lorem</label>
                                                <div class="d-flex justify-content-start m-0 p-0">
                                                    <span class="input-group-text rounded-0 rounded-start">@</span>
                                                    <input type="input" placeholder="ADD MULTI CITY" name="multi-city" class="form-control form-control-lg rounded-0 rounded-end text-center">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 text-end form-group d-none d-lg-block">
                                    <button class="btn btn-lg btn-info mt-4"><i class="bx bx-search"></i></button>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-lg btn-info h-100 w-100 mt-4 mt-lg-0 d-block d-lg-none"><i
                                class="bx bx-search"></i></button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>


<script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#clear-destination').click(function() {
            $('#destination').val('');
        });
        $('#clear-origin').click(function() {
            $('#origin').val('');
        });
        $('#clear-destination-sabre').click(function() {
            $('#destination-sabre').val('');
        });
        $('#clear-origin-sabre').click(function() {
            $('#origin-sabre').val('');
        });
    });
</script>

