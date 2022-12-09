const slideShow = () => {
    let imageIndex = 0;
    window.setInterval(() => {
        const array = ["nusped.jpg", "kabah.jpg", "borobudur.jpg", "turki.jpg"];

        imageIndex++;

        if (imageIndex >= 3) {
            imageIndex = 0;
        }

        $("#slideshow")
            .fadeOut(1000, function () {
                $("#slideshow").attr(
                    "src",
                    slideShowUrl + "/" + array[imageIndex]
                );
            })
            .fadeIn(1000);
    }, 20000);
};

/* switch airport sabre */
$("#switch-airport").click((e) => {
    e.preventDefault();
    const origin = $(`[name=origin]`).val();
    const originPlaceholder = $(`[name=origin-placeholder]`).val();
    const destination = $(`[name=destination]`).val();
    const destinationPlaceholder = $(`[name=destination-placeholder]`).val();

    $(`[name=origin]`).val(destination);
    $(`[name=origin-placeholder]`).val(destinationPlaceholder);
    $(`[name=destination]`).val(origin);
    $(`[name=destination-placeholder]`).val(originPlaceholder);
});

/* switch airport amadeus */
$("#switch-airport-amadeus").click((e) => {
    e.preventDefault();
    const origin = $(`[name=origin]`).val();
    const originPlaceholder = $(`[name=origin-placeholder]`).val();
    const destination = $(`[name=destination]`).val();
    const destinationPlaceholder = $(`[name=destination-placeholder]`).val();

    $(`[name=origin]`).val(destination);
    $(`[name=origin-placeholder]`).val(destinationPlaceholder);
    $(`[name=destination]`).val(origin);
    $(`[name=destination-placeholder]`).val(originPlaceholder);
});

/* switch airport domestic */
$("#switch-airport-domestic").click((e) => {
    e.preventDefault();
    const origin = $(`[name=origin]`).val();
    const originPlaceholder = $(`[name=origin-placeholder]`).val();
    const destination = $(`[name=destination]`).val();
    const destinationPlaceholder = $(`[name=destination-placeholder]`).val();

    $(`[name=origin]`).val(destination);
    $(`[name=origin-placeholder]`).val(destinationPlaceholder);
    $(`[name=destination]`).val(origin);
    $(`[name=destination-placeholder]`).val(originPlaceholder);
});

/* switch destination bus */
$("#switch-bus-destination").click((e) => {
    e.preventDefault();
    const originPlaceholder = $(`[name=bus-origin]`).val();
    const destinationPlaceholder = $(`[name=bus-destination]`).val();

    $(`[name=bus-origin]`).val(destinationPlaceholder);
    $(`[name=bus-destination]`).val(originPlaceholder);
});

/* Switch kereta */
$("#switch-train-destination").click((e) => {
    e.preventDefault();
    const origin = $(`[name=train-origin]`).val();
    const originPlaceholder = $(`[name=train-origin-placeholder]`).val();
    const destination = $(`[name=train-destination]`).val();
    const destinationPlaceholder = $(
        `[name=train-destination-placeholder]`
    ).val();

    $(`[name=train-origin]`).val(destination);
    $(`[name=train-origin-placeholder]`).val(destinationPlaceholder);
    $(`[name=train-destination]`).val(origin);
    $(`[name=train-destination-placeholder]`).val(originPlaceholder);
});

/* increment decrement sabre */
const increment = (e) => {
    e.preventDefault();
    let adultval = parseInt($("[name=adult]").val());
    let childval = parseInt($("[name=children]").val());
    let infantval = parseInt($("[name=infant]").val());
    const total = adultval + childval + infantval;
    const target = e.currentTarget.getAttribute("target");
    let value = $(`[name=${target}]`).val();
    value++;

    if (target == "adult") {
        if (value > 1) {
            $(".decrement[target=adult]").prop("disabled", false);
            $(".increment[target=infant]").prop("disabled", false);
        }
    }

    if (target == "infant") {
        if (value >= adultval) {
            $(".increment[target=infant]").prop("disabled", true);
        }
    }

    if (total >= 8) {
        $(".increment").prop("disabled", true);
    }

    if (value > 0) {
        $(`.decrement[target=${target}]`).prop("disabled", false);
    }

    $(`[name=${target}]`).val(value);
    $(`#counter-${target}`).html(value);

    adultval = parseInt($("[name=adult]").val());
    childval = parseInt($("[name=children]").val());
    infantval = parseInt($("[name=infant]").val());
    $(`#input-passenger`).val(`${adultval + childval + infantval} Passenger`);
};

const decrement = (e) => {
    e.preventDefault();
    let adultval = parseInt($("[name=adult]").val());
    let childval = parseInt($("[name=children]").val());
    let infantval = parseInt($("[name=infant]").val());
    const total = adultval + childval + infantval;

    const target = e.currentTarget.getAttribute("target");
    let value = $(`[name=${target}]`).val();
    value--;

    if (target == "adult") {
        if (value < 1) {
            e.currentTarget.setAttribute("disabled", true);
            $(".increment").prop("disabled", false);
            $(".increment[target=infant]").prop("disabled", true);
            return false;
        }

        if (infantval == adultval) {
            $(`[name=infant]`).val(value);
            $(`#counter-infant`).html(value);
            $(".increment[target=infant]").prop("disabled", true);
            $(`[name=${target}]`).val(value);
            $(`#counter-${target}`).html(value);
            return false;
        }
    }

    if (infantval == adultval) {
        $(".increment[target=infant]").prop("disabled", true);
        $(`[name=${target}]`).val(value);
        $(`#counter-${target}`).html(value);
        if (value >= 1) return false;
    }

    if (value < 1) {
        $(`.decrement[target=${target}]`).prop("disabled", true);
    }

    if (total <= 9) {
        $(".increment").prop("disabled", false);
    }

    $(`[name=${target}]`).val(value);
    $(`#counter-${target}`).html(value);

    adultval = parseInt($("[name=adult]").val());
    childval = parseInt($("[name=children]").val());
    infantval = parseInt($("[name=infant]").val());
    $(`#input-passenger`).val(`${adultval + childval + infantval} Passenger`);
};

/* increment decrement amadeus */
const incrementAmadeus = (e) => {
    e.preventDefault();
    let adultval = parseInt($("[name=adult-amadeus]").val());
    let childval = parseInt($("[name=children-amadeus]").val());
    let infantval = parseInt($("[name=infant-amadeus]").val());
    const total = adultval + childval + infantval;

    const target = e.currentTarget.getAttribute("target");
    let value = $(`[name=${target}]`).val();
    value++;

    if (target == "adult-amadeus") {
        if (value > 1) {
            $(".decrement-amadeus[target=adult-amadeus]").prop(
                "disabled",
                false
            );
            $(".increment-amadeus[target=infant-amadeus]").prop(
                "disabled",
                false
            );
        }
    }

    if (target == "infant-amadeus") {
        if (value >= adultval) {
            $(".increment-amadeus[target=infant-amadeus]").prop(
                "disabled",
                true
            );
        }
    }

    if (total >= 8) {
        $(".increment-amadeus").prop("disabled", true);
    }

    if (value > 0) {
        $(`.decrement-amadeus[target=${target}]`).prop("disabled", false);
    }

    $(`[name=${target}]`).val(value);
    $(`#counter-${target}`).html(value);

    adultval = parseInt($("[name=adult-amadeus]").val());
    childval = parseInt($("[name=children-amadeus]").val());
    infantval = parseInt($("[name=infant-amadeus]").val());
    $(`#input-passenger-amadeus`).val(
        `${adultval + childval + infantval} Passenger`
    );
};

const decrementAmadeus = (e) => {
    e.preventDefault();
    let adultval = parseInt($("[name=adult-amadeus]").val());
    let childval = parseInt($("[name=children-amadeus]").val());
    let infantval = parseInt($("[name=infant-amadeus]").val());
    const total = adultval + childval + infantval;

    const target = e.currentTarget.getAttribute("target");
    let value = $(`[name=${target}]`).val();
    value--;

    if (target == "adult-amadeus") {
        if (value < 1) {
            e.currentTarget.setAttribute("disabled", true);
            $(".increment-amadeus").prop("disabled", false);
            $(".increment-amadeus[target=infant-amadeus]").prop(
                "disabled",
                true
            );
            return false;
        }

        if (infantval == adultval) {
            $(`[name=infant-amadeus]`).val(value);
            $(`#counter-infant-amadeus`).html(value);
            $(".increment-amadeus[target=infant-amadeus]").prop(
                "disabled",
                true
            );
            $(`[name=${target}]`).val(value);
            $(`#counter-${target}`).html(value);
            return false;
        }
    }

    if (infantval == adultval) {
        $(".increment-amadeus[target=infant-amadeus]").prop("disabled", true);
        $(`[name=${target}]`).val(value);
        $(`#counter-${target}`).html(value);
        if (value >= 1) return false;
    }

    if (value < 1) {
        $(`.decrement-amadeus[target=${target}]`).prop("disabled", true);
    }

    if (total <= 9) {
        $(".increment-amadeus").prop("disabled", false);
    }

    $(`[name=${target}]`).val(value);
    $(`#counter-${target}`).html(value);

    adultval = parseInt($("[name=adult-amadeus]").val());
    childval = parseInt($("[name=children-amadeus]").val());
    infantval = parseInt($("[name=infant-amadeus]").val());
    $(`#input-passenger-amadeus`).val(
        `${adultval + childval + infantval} Passenger`
    );
};

/* Increment decrement domestic */
const incrementDomestic = (e) => {
    e.preventDefault();
    let adultval = parseInt($("[name=adult-domestic]").val());
    let childval = parseInt($("[name=children-domestic]").val());
    let infantval = parseInt($("[name=infant-domestic]").val());
    const total = adultval + childval + infantval;

    const target = e.currentTarget.getAttribute("target");
    let value = $(`[name=${target}]`).val();
    value++;

    if (target == "adult-amadeus") {
        if (value > 1) {
            $(".decrement-domestic[target=adult-domestic]").prop(
                "disabled",
                false
            );
            $(".increment-domestic[target=infant-domestic]").prop(
                "disabled",
                false
            );
        }
    }

    if (target == "infant-domestic") {
        if (value >= adultval) {
            $(".increment-domestic[target=infant-domestic]").prop(
                "disabled",
                true
            );
        }
    }

    if (total >= 8) {
        $(".increment-domestic").prop("disabled", true);
    }

    if (value > 0) {
        $(`.decrement-domestic[target=${target}]`).prop("disabled", false);
    }

    $(`[name=${target}]`).val(value);
    $(`#counter-${target}`).html(value);

    adultval = parseInt($("[name=adult-domestic]").val());
    childval = parseInt($("[name=children-domestic]").val());
    infantval = parseInt($("[name=infant-domestic]").val());

    $(`#input-passenger-domestic`).val(
        `${adultval + childval + infantval} Passenger`
    );
};

const decrementDomestic = (e) => {
    e.preventDefault();
    let adultval = parseInt($("[name=adult-domestic]").val());
    let childval = parseInt($("[name=children-domestic]").val());
    let infantval = parseInt($("[name=infant-domestic]").val());
    const total = adultval + childval + infantval;

    const target = e.currentTarget.getAttribute("target");
    let value = $(`[name=${target}]`).val();
    value--;

    if (target == "adult-domestic") {
        if (value < 1) {
            e.currentTarget.setAttribute("disabled", true);
            $(".increment-domestic").prop("disabled", false);
            $(".increment-domestic[target=infant-domestic]").prop(
                "disabled",
                true
            );
            return false;
        }

        if (infantval == adultval) {
            $(`[name=infant-domestic]`).val(value);
            $(`#counter-infant-domestic`).html(value);
            $(".increment-domestic[target=infant-domestic]").prop(
                "disabled",
                true
            );
            $(`[name=${target}]`).val(value);
            $(`#counter-${target}`).html(value);
            return false;
        }
    }

    if (infantval == adultval) {
        $(".increment-domestic[target=infant-domestic]").prop("disabled", true);
        $(`[name=${target}]`).val(value);
        $(`#counter-${target}`).html(value);
        if (value >= 1) return false;
    }

    if (value < 1) {
        $(`.decrement-domestic[target=${target}]`).prop("disabled", true);
    }

    if (total <= 9) {
        $(".increment-domestic").prop("disabled", false);
    }

    $(`[name=${target}]`).val(value);
    $(`#counter-${target}`).html(value);

    adultval = parseInt($("[name=adult-domestic]").val());
    childval = parseInt($("[name=children-domestic]").val());
    infantval = parseInt($("[name=infant-domestic]").val());
    $(`#input-passenger-domestic`).val(
        `${adultval + childval + infantval} Passenger`
    );
};

/* Increment decrement train*/
const incrementTrain = (e) => {
    e.preventDefault();
    let adultval = parseInt($("[name=adult-train]").val());
    let childval = parseInt($("[name=children-train]").val());
    let infantval = parseInt($("[name=infant-train]").val());
    const total = adultval + childval + infantval;

    const target = e.currentTarget.getAttribute("target");
    let value = $(`[name=${target}]`).val();
    value++;

    if (target == "adult-train") {
        if (value > 1) {
            $(".decrement-train[target=adult-train]").prop("disabled", false);
            $(".increment-train[target=infant-train]").prop("disabled", false);
        }
    }

    if (target == "infant-train") {
        if (value >= adultval) {
            $(".increment-train[target=infant-train]").prop("disabled", true);
        }
    }

    if (total >= 8) {
        $(".increment-train").prop("disabled", true);
    }

    if (value > 0) {
        $(`.decrement-train[target=${target}]`).prop("disabled", false);
    }

    $(`[name=${target}]`).val(value);
    $(`#counter-${target}`).html(value);

    adultval = parseInt($("[name=adult-train]").val());
    childval = parseInt($("[name=children-train]").val());
    infantval = parseInt($("[name=infant-train]").val());
    $(`#input-passenger-train`).val(
        `${adultval + childval + infantval} Passenger`
    );
};

const decrementTrain = (e) => {
    e.preventDefault();
    let adultval = parseInt($("[name=adult-train]").val());
    let childval = parseInt($("[name=children-train]").val());
    let infantval = parseInt($("[name=infant-train]").val());
    const total = adultval + childval + infantval;

    const target = e.currentTarget.getAttribute("target");
    let value = $(`[name=${target}]`).val();
    value--;

    if (target == "adult-train") {
        if (value < 1) {
            e.currentTarget.setAttribute("disabled", true);
            $(".increment-train").prop("disabled", false);
            $(".increment-train[target=infant-train]").prop("disabled", true);
            return false;
        }

        if (infantval == adultval) {
            $(`[name=infant-train]`).val(value);
            $(`#counter-infant-train`).html(value);
            $(".increment-train[target=infant-train]").prop("disabled", true);
            $(`[name=${target}]`).val(value);
            $(`#counter-${target}`).html(value);
            return false;
        }
    }

    if (infantval == adultval) {
        $(".increment-train[target=infant-train]").prop("disabled", true);
        $(`[name=${target}]`).val(value);
        $(`#counter-${target}`).html(value);
        if (value >= 1) return false;
    }

    if (value < 1) {
        $(`.decrement-train[target=${target}]`).prop("disabled", true);
    }

    if (total <= 9) {
        $(".increment-train").prop("disabled", false);
    }

    $(`[name=${target}]`).val(value);
    $(`#counter-${target}`).html(value);

    adultval = parseInt($("[name=adult-train]").val());
    childval = parseInt($("[name=children-train]").val());
    infantval = parseInt($("[name=infant-train]").val());
    $(`#input-passenger-train`).val(
        `${adultval + childval + infantval} Passenger`
    );
};

/* Increment decrement bus*/
const incrementBus = (e) => {
    e.preventDefault();
    let adultval = parseInt($("[name=adult-bus]").val());
    let childval = parseInt($("[name=children-bus]").val());
    let infantval = parseInt($("[name=infant-bus]").val());
    const total = adultval + childval + infantval;

    const target = e.currentTarget.getAttribute("target");
    let value = $(`[name=${target}]`).val();
    value++;

    if (target == "adult-bus") {
        if (value > 1) {
            $(".decrement-bus[target=adult-bus]").prop("disabled", false);
            $(".increment-bus[target=infant-bus]").prop("disabled", false);
        }
    }

    if (target == "infant-bus") {
        if (value >= adultval) {
            $(".increment-bus[target=infant-bus]").prop("disabled", true);
        }
    }

    if (total >= 8) {
        $(".increment-bus").prop("disabled", true);
    }

    if (value > 0) {
        $(`.decrement-bus[target=${target}]`).prop("disabled", false);
    }

    $(`[name=${target}]`).val(value);
    $(`#counter-${target}`).html(value);

    adultval = parseInt($("[name=adult-bus]").val());
    childval = parseInt($("[name=children-bus]").val());
    infantval = parseInt($("[name=infant-bus]").val());

    $(`#input-passenger-bus`).val(
        `${adultval + childval + infantval} Passenger`
    );
};

const decrementBus = (e) => {
    e.preventDefault();
    let adultval = parseInt($("[name=adult-bus]").val());
    let childval = parseInt($("[name=children-bus]").val());
    let infantval = parseInt($("[name=infant-bus]").val());
    const total = adultval + childval + infantval;

    const target = e.currentTarget.getAttribute("target");
    let value = $(`[name=${target}]`).val();
    value--;

    if (target == "adult-bus") {
        if (value < 1) {
            e.currentTarget.setAttribute("disabled", true);
            $(".increment-bus").prop("disabled", false);
            $(".increment-bus[target=infant-bus]").prop("disabled", true);
            return false;
        }

        if (infantval == adultval) {
            $(`[name=infant-bus]`).val(value);
            $(`#counter-infant-bus`).html(value);
            $(".increment-bus[target=infant-bus]").prop("disabled", true);
            $(`[name=${target}]`).val(value);
            $(`#counter-${target}`).html(value);
            return false;
        }
    }

    if (infantval == adultval) {
        $(".increment-bus[target=infant-bus]").prop("disabled", true);
        $(`[name=${target}]`).val(value);
        $(`#counter-${target}`).html(value);
        if (value >= 1) return false;
    }

    if (value < 1) {
        $(`.decrement-bus[target=${target}]`).prop("disabled", true);
    }

    if (total <= 9) {
        $(".increment-bus").prop("disabled", false);
    }

    $(`[name=${target}]`).val(value);
    $(`#counter-${target}`).html(value);

    adultval = parseInt($("[name=adult-bus]").val());
    childval = parseInt($("[name=children-bus]").val());
    infantval = parseInt($("[name=infant-bus]").val());
    $(`#input-passenger-bus`).val(
        `${adultval + childval + infantval} Passenger`
    );
};

/* rooom handler */
const roomRequestIncrement = (e) => {
    e.preventDefault();
    let currValue = parseInt($("[name=room-count]").val());
    let roomText = $("[name=room-req-placeholder]").val();
    let textArr = roomText.split(",");
    let target = e.currentTarget.getAttribute("target");
    currValue++;

    // set text on array
    textArr[0] = `${currValue} Kamar`;
    $("[name=room-req-placeholder]").val(textArr[0] + ", " + textArr[1].trim());
    if (currValue > 1) {
        $(".decrement-room").prop("disabled", false);
    }

    $(`[name=${target}]`).val(currValue);
    $("#counter-room-count").text(currValue);

    if (currValue > 1) {
        roomDetailForm(currValue);
    }
    /* append new view */
};

const roomRequestDecrement = (e) => {
    e.preventDefault();
    let currValue = parseInt($("[name=room-count]").val());
    let target = e.currentTarget.getAttribute("target");
    let roomText = $("[name=room-req-placeholder]").val();
    let textArr = roomText.split(",");
    /* remove item*/
    $("#room-" + currValue).remove();
    currValue--;

    /*set val*/
    textArr[0] = `${currValue} Kamar`;
    $("[name=room-req-placeholder]").val(textArr[0] + ", " + textArr[1].trim());

    if (currValue <= 1) {
        $(".decrement-room").prop("disabled", true);
    }

    $(`[name=${target}]`).val(currValue);
    $("#counter-room-count").text(currValue);
};

const roomDetailForm = (currValue) => {
    let html = `<div class="m-0 border-top mt-2" id="room-${currValue}">
                                        <h5 class="mt-3">Kamar ${currValue}</h5>
                                        <div
                                            class="d-flex flex-wrap align-items-center justify-content-between mb-2">
                                            <div class="d-flex align-items-center me-5 mb-2">
                                                <small>Tipe Kamar</small>
                                            </div>
                                            <div class="d-flex align-items-center mb-2">
                                                <select class="form-select form-control-sm" name="room-type-${currValue}">
                                                    <option value="0" selected>Single</option>
                                                    <option value="1">Double</option>
                                                    <option value="2">Twin</option>
                                                    <option value="3">Triple</option>
                                                    <option value="4">Quad</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="m-0" id="child-request-${currValue}">
                                        </div>
                                    </div>`;

    $("#room-detail-list").append(html);
    childRequest(currValue);
};

const childRequest = (currValue) => {
    let html = `
        <div class="d-flex flex-wrap align-items-center justify-content-between mb-2">
                                            <div class="d-flex align-items-center me-5 mb-2">
                                                <i class="bx bx-user-pin"></i>
                                                <small>Anak</small>
                                            </div>
                                            <div class="d-flex align-items-center mb-2">
                                                <button target="child-req-room-${currValue}"
                                                        class="child-decrement btn btn-outline-info btn-xs" disabled><i
                                                        class="bx bx-minus"></i></button>
                                                <h6 id="counter-children-${currValue}" class="child-counter-text-val m-0 text-center" style="width: 30px">0
                                                </h6>
                                                <button target="child-req-room-${currValue}"
                                                        class="child-increment btn btn-outline-info btn-xs"><i
                                                        class="bx bx-plus"></i></button>
                                            </div>
                                        </div>
                                        <small class="text-child"></small>
                                        <div class="child-age-container row justify-content-start px-3 gap-2" id="child-age-select-${currValue}">

                                        </div>
    `;
    $("#child-request-" + currValue).append(html);
    let inputHtml = `<input type="hidden" name="child-req-room-${currValue}" value="0">`;
    $("#form-child-req").append(inputHtml);
};

const childAgeSelectView = (currValue, parent) => {
    let html = `<div class="col-5 border rounded p-2" id="age-selector-${currValue}">
                                                <label class="form-label">Anak Ke-${currValue}</label>
                                                <select class="form-select form-control-sm" name="${parent}-room[]">
                                                    <option value="0" selected><1 Tahun</option>
                                                    <option value="1">1 Tahun</option>
                                                    <option value="2">2 Tahun</option>
                                                </select>
                                            </div>
                                        `;

    $(`#${parent}`).append(html);
};

/* show selector sabre */
const showSelector = () => {
    $("#passenger-selector #selector").css("visibility", "visible");
};

/* show selector amadeus */
const showSelectorAmadeus = () => {
    $("#passenger-selector-amadeus #selector-amadeus").css(
        "visibility",
        "visible"
    );
};

/* show selector domestic */
const showSelectorDomestic = () => {
    $("#passenger-selector-domestic #selector-domestic").css(
        "visibility",
        "visible"
    );
};

/* show selector train */
const showSelectorTrain = () => {
    $("#passenger-selector-train #selector-train").css("visibility", "visible");
};

/* show selector train */
const showSelectorBus = () => {
    $("#passenger-selector-bus #selector-bus").css("visibility", "visible");
};

/* show selector bus */
const showSelectorHotel = (e) => {
    e.preventDefault();
    $("#selector-hotel").css("visibility", "visible");
};

/* hide selector sabre*/
const hideSelector = (e) => {
    e.preventDefault();
    $("#passenger-selector #selector").css("visibility", "hidden");
};

/* hide selector amadeus */
const hideSelectorAmadeus = (e) => {
    e.preventDefault();
    $("#passenger-selector-amadeus #selector-amadeus").css(
        "visibility",
        "hidden"
    );
};

/* hide selector domestic */
const hideSelectorDomestic = (e) => {
    e.preventDefault();
    $("#passenger-selector-domestic #selector-domestic").css(
        "visibility",
        "hidden"
    );
};

/* hide selector train */
const hideSelectorTrain = (e) => {
    e.preventDefault();
    $("#passenger-selector-train #selector-train").css("visibility", "hidden");
};

/* hide selector bus */
const hideSelectorBus = (e) => {
    e.preventDefault();
    $("#passenger-selector-bus #selector-bus").css("visibility", "hidden");
};

/* hide selector hotel*/
const hideSelectorHotel = (e) => {
    e.preventDefault();
    $("#selector-hotel").css("visibility", "hidden");
};

/* return switch sabre */
$(".return-switch").click(() => {
    if ($("[name=return]")[0].classList.contains("invisible")) {
        $("[name=return]")[0].classList.remove("invisible");
        $("[name=return]")[0].classList.remove("d-none");
        $("[name=return]").prop("required", true);
    } else {
        $("[name=return]")[0].classList.add("invisible");
        $("[name=return]")[0].classList.add("d-none");
        $("[name=return]").prop("required", false);
        $("[name=return]").val("");
    }
});

/* return switch amadeus */
$(".return-switch-amadeus").click(() => {
    if ($("[name=return-amadeus]")[0].classList.contains("invisible")) {
        $("[name=return-amadeus]")[0].classList.remove("invisible");
        $("[name=return-amadeus]")[0].classList.remove("d-none");
        $("[name=return-amadeus]").prop("required", true);
    } else {
        $("[name=return-amadeus]")[0].classList.add("invisible");
        $("[name=return-amadeus]")[0].classList.add("d-none");
        $("[name=return-amadeus]").prop("required", false);
        $("[name=return-amadeus]").val("");
    }
});

/* return switch domestic */
$(".return-switch-domestic").click(() => {
    if ($("[name=return-domestic]")[0].classList.contains("invisible")) {
        $("[name=return-domestic]")[0].classList.remove("invisible");
        $("[name=return-domestic]")[0].classList.remove("d-none");
        $("[name=return-domestic]").prop("required", true);
    } else {
        $("[name=return-domestic]")[0].classList.add("invisible");
        $("[name=return-domestic]")[0].classList.add("d-none");
        $("[name=return-domestic]").prop("required", false);
        $("[name=return-domestic]").val("");
    }
});

/* return switch bus */

const searchAirport = async (e, target) => {
    const url = apiURL;
    const response = await fetch(`${url}/${e.currentTarget.value}`);
    const data = await response.json();
    let html = ``;

    if (data.length == 0) {
        if (!$(`.${target}-picker`).hasClass("invisible")) {
            $(`.${target}-picker`).addClass("invisible");
        }
    } else {
        if ($(`.${target}-picker`).hasClass("invisible")) {
            $(`.${target}-picker`).removeClass("invisible");
        }
    }

    data.forEach((item) => {
        html += `
		<li iata="${item.iata}" text="${item.city}, (${item.iata})">
			<h6 class="mb-1">${item.city}, ${item.country}</h6>
			<p class="m-0 text-muted text-truncate">${item.iata} - ${item.name}</h6>
		</li>
		`;
    });

    $(`.${target}-picker ul`).html(html);

    $(`.${target}-picker li`).click((e) => {
        const iata = e.currentTarget.getAttribute("iata");
        const text = e.currentTarget.getAttribute("text");
        $(`[name=${target}]`).val(iata);
        $(`[name=${target}-placeholder]`).val(text);
        $(`.${target}-picker`).addClass("invisible");
    });
};

const searchBusRoute = async (e, target) => {
    const url = location.origin + "/api/bus/route";
    const request = await fetch(`${url}/${e.currentTarget.value}`);
    const data = await request.json();
    let html = ``;

    if (data.length == 0) {
        if (!$(`.${target}-picker`).hasClass("invisible")) {
            $(`.${target}-picker`).addClass("invisible");
        }
    } else {
        if ($(`.${target}-picker`).hasClass("invisible")) {
            $(`.${target}-picker`).removeClass("invisible");
        }
    }

    data.forEach((item) => {
        html += `
		<li code="${item.terminal}" text="${item.terminal}">
			<h6 class="mb-1">${item.province}, ${item.terminal}</h6>
		</li>
		`;
    });

    $(`.${target}-picker ul`).html(html);

    $(`.${target}-picker li`).click((e) => {
        const text = e.currentTarget.getAttribute("text");
        $(`[name=${target}]`).val(text);
        $(`.${target}-picker`).addClass("invisible");
    });
};

const searchStation = async (e, target) => {
    const url = location.origin + "/api/train/route";
    const response = await fetch(`${url}/${e.currentTarget.value}`);
    const data = await response.json();
    let html = ``;

    if (data.length == 0) {
        if (!$(`.${target}-picker`).hasClass("invisible")) {
            $(`.${target}-picker`).addClass("invisible");
        }
    } else {
        if ($(`.${target}-picker`).hasClass("invisible")) {
            $(`.${target}-picker`).removeClass("invisible");
        }
    }

    data.forEach((item) => {
        html += `
		<li code="${item.code}" text="${item.city}, ${item.station} (${item.code})">
			<h6 class="mb-1">${item.city}, ${item.station}</h6>
			<p class="m-0 text-muted text-truncate">${item.code} - ${item.city}</h6>
		</li>
		`;
    });

    $(`.${target}-picker ul`).html(html);

    $(`.${target}-picker li`).click((e) => {
        const code = e.currentTarget.getAttribute("code");
        const text = e.currentTarget.getAttribute("text");
        $(`[name=train-${target}]`).val(code);
        $(`[name=train-${target}-placeholder]`).val(text);
        $(`.${target}-picker`).addClass("invisible");
    });
};

const searchCity = async (e, target) => {
    const url = location.origin + "/api/hotel/city/search";
    const response = await fetch(`${url}/${e.currentTarget.value}`);
    const data = await response.json();
    let html = ``;

    if (data.length == 0) {
        if (!$(`.${target}-picker`).hasClass("invisible")) {
            $(`.${target}-picker`).addClass("invisible");
        }
    } else {
        if ($(`.${target}-picker`).hasClass("invisible")) {
            $(`.${target}-picker`).removeClass("invisible");
        }
    }

    data.forEach((item) => {
        html += `
		<li code="${item.city_id}" text="${item.city_name}">
			<h6 class="mb-1">${item.city_name}</h6>
		</li>
		`;
    });

    $(`.${target}-picker ul`).html(html);

    $(`.${target}-picker li`).click((e) => {
        const code = e.currentTarget.getAttribute("code");
        const text = e.currentTarget.getAttribute("text");
        $(`[name=${target}]`).val(code);
        $(`[name=${target}-placeholder]`).val(text);
        $(`.${target}-picker`).addClass("invisible");
    });
};

/* sabre-handle */
$(".increment").click((e) => increment(e));
$(".decrement").click((e) => decrement(e));
$("#input-passenger").click(showSelector);
$("#done-passenger").click((e) => hideSelector(e));

/* amadeus-handle */
$(".increment-amadeus").click((e) => incrementAmadeus(e));
$(".decrement-amadeus").click((e) => decrementAmadeus(e));
$("#input-passenger-amadeus").click(showSelectorAmadeus);
$("#done-passenger-amadeus").click((e) => hideSelectorAmadeus(e));

/* domestic-handle */
$(".increment-domestic").click((e) => incrementDomestic(e));
$(".decrement-domestic").click((e) => decrementDomestic(e));
$("#input-passenger-domestic").click(showSelectorDomestic);
$("#done-passenger-domestic").click((e) => hideSelectorDomestic(e));

/* train handle*/
$(".increment-train").click((e) => incrementTrain(e));
$(".decrement-train").click((e) => decrementTrain(e));
$("#input-passenger-train").click(showSelectorTrain);
$("#done-passenger-train").click((e) => hideSelectorTrain(e));

/* bus handle */
$(".increment-bus").click((e) => incrementBus(e));
$(".decrement-bus").click((e) => decrementBus(e));
$("#input-passenger-bus").click(showSelectorBus);
$("#done-passenger-bus").click((e) => hideSelectorBus(e));

/* hotel handle */
$("#room-request").click(showSelectorHotel);
$("#done-room-request").click((e) => hideSelectorHotel(e));
$(".increment-room").click((e) => roomRequestIncrement(e));
$(".decrement-room").click((e) => roomRequestDecrement(e));

const initialChild = () => {
    roomDetailForm(1);
};

$("[name=origin-placeholder]").blur(() => {
    $("[name=origin-placeholder]").val("Jakarta, Indonesia (CGK)");
    $("[name=origin]").val("CGK");
    setTimeout(() => {
        $(".origin-picker[target=origin]").addClass("invisible");
    }, 500);
});

$("[name=destination-placeholder]").blur(() => {
    $("[name=destination-placeholder]").val("Jeddah, Saudi Arabia (JED)");
    $("[name=destination]").val("JED");
    setTimeout(() => {
        $(".destination-picker[target=destination]").addClass("invisible");
    }, 500);
});

$("[name=origin-placeholder]").keyup((e) => searchAirport(e, "origin"));
$("[name=destination-placeholder]").keyup((e) =>
    searchAirport(e, "destination")
);

/* train search station */
$("[name=train-origin-placeholder]").keyup((e) => searchStation(e, "origin"));
$("[name=train-destination-placeholder]").keyup((e) =>
    searchStation(e, "destination")
);

$("[name=departure]").change(() => {
    const val = $("[name=departure]").val();
    let date = new Date(val);
    date.setDate(date.getDate() + 1);
    $("[name=return]").attr("min", date.toISOString().split("T")[0]);
});

/* when click input departure hide plane icon*/
$("#origin").on("focus", function (e) {
    $("#plane-departure-icon").addClass("d-none");
});

$("#origin").on("focusout", function (e) {
    $("#plane-departure-icon").removeClass("d-none");
});

/* when click input arival hide plane icon*/
$("#destination").on("focus", function (e) {
    $("#plane-arival-icon").addClass("d-none");
});

$("#destination").on("focusout", function (e) {
    $("#plane-arrival-icon").removeClass("d-none");
});

/* when click input amadeus departure hide plane icon*/
$("#origin-amadeus").on("focus", function (e) {
    $("#plane-departure-icon-amadeus").addClass("d-none");
});

$("#origin-amadeus").on("focusout", function (e) {
    $("#plane-departure-icon-amadeus").removeClass("d-none");
});

/* when click input aribal hide plane icon*/
$("#destination-amadeus").on("focus", function (e) {
    $("#plane-arrival-icon-amadeus").addClass("d-none");
});

$("#destination-amadeus").on("focusout", function (e) {
    $("#plane-arrival-icon-amadeus").removeClass("d-none");
});

/* when click input domestic departure hide plane icon*/
$("#origin-domestic").on("focus", function (e) {
    $("#plane-departure-icon-domestic").addClass("d-none");
});

$("#origin-domestic").on("focusout", function (e) {
    $("#plane-departure-icon-domestic").removeClass("d-none");
});

/* when click input aribal hide plane icon*/
$("#destination-domestic").on("focus", function (e) {
    $("#plane-arrival-icon-domestic").addClass("d-none");
});

$("#destination-domestic").on("focusout", function (e) {
    $("#plane-arrival-icon-domestic").removeClass("d-none");
});

/* clear input value */
$("#origin").focus(function () {
    $(this).val("");
});

$("#destination").focus(function () {
    $(this).val("");
});

$("#origin-amadeus").focus(function () {
    $(this).val("");
});

$("#destination-amadeus").focus(function () {
    $(this).val("");
});

$("#origin-domestic").focus(function () {
    $(this).val("");
});

$("#destination-domestic").focus(function () {
    $(this).val("");
});

$("#train-origin").focus(function () {
    $(this).val("");
});

$("#train-destination").focus(function () {
    $(this).val("");
});

$("#bus-origin").focus(function () {
    $(this).val("");
});

$("#bus-destination").focus(function () {
    $(this).val("");
});

$("#place-input").focus(function () {
    $(this).val("");
});

/* train aditional */
$("[name=train-origin-placeholder]").blur(() => {
    $("[name=train-origin-placeholder]").val("Jakarta, Gambir (GMR)");
    $("[name=train-origin]").val("GMR");
    setTimeout(() => {
        $(".origin-picker[target=origin]").addClass("invisible");
    }, 500);
});

$("[name=train-destination-placeholder]").blur(() => {
    $("[name=train-destination-placeholder]").val("Bandung, Bandung (BD)");
    $("[name=train-destination]").val("BD");
    setTimeout(() => {
        $(".destination-picker[target=destination]").addClass("invisible");
    }, 500);
});

/* Hotel aditional */
$("[name=place-placeholder]").blur(() => {
    $("[name=place-placeholder]").val("Jakarta");
    $("[name=place]").val("8691");
    setTimeout(() => {
        $(".place-picker[target=place]").addClass("invisible");
    }, 500);
});

$("[name=place-placeholder]").keyup((e) => searchCity(e, "place"));
/* EOL */

/* bus aditional */
$("[name=bus-origin]").blur(() => {
    $("[name=bus-origin]").val("Jakarta");
    setTimeout(() => {
        $(".origin-picker[target=origin]").addClass("invisible");
    }, 500);
});

$("[name=bus-destination]").blur(() => {
    $("[name=train-destination-placeholder]").val("Surabaya");
    setTimeout(() => {
        $(".destination-picker[target=destination]").addClass("invisible");
    }, 500);
});

$("[name=bus-origin]").keyup((e) => searchBusRoute(e, "bus-origin"));
$("[name=bus-destination]").keyup((e) => searchBusRoute(e, "bus-destination"));

/* Hotel */

initialChild();

$(document).on("click", ".child-increment", function (e) {
    e.preventDefault();
    let target = e.currentTarget.getAttribute("target");
    let currValue = parseInt($(`[name=${target}]`).val());
    let totalChild = parseInt($("[name=total-child]").val());
    let roomText = $("[name=room-req-placeholder]").val();
    let textArr = roomText.split(",");
    let childAgeContainerID = $(this)
        .parent()
        .parent()
        .siblings(".child-age-container")
        .attr("id");
    totalChild++;
    currValue++;

    textArr[1] = `${totalChild} Anak`;
    $("[name=room-req-placeholder]").val(textArr[0] + ", " + textArr[1].trim());

    if (currValue == 1) {
        $(this).siblings(".child-decrement").prop("disabled", false);
        $(this)
            .parent()
            .parent()
            .siblings(".text-child")
            .text("Tambahkan umur anak");
    }

    childAgeSelectView(currValue, childAgeContainerID);
    $("[name=total-child]").val(totalChild);
    $(`[name=${target}]`).val(currValue);
    $(this).siblings(".child-counter-text-val").text(currValue);
    $(`[name=${target}]`).val(currValue);
    $(this).siblings(".child-counter-text-val").text(currValue);
});

$(document).on("click", ".child-decrement", function (e) {
    e.preventDefault();
    let target = e.currentTarget.getAttribute("target");
    let currValue = parseInt($(`[name=${target}]`).val());

    let totalChild = parseInt($("[name=total-child]").val());
    let roomText = $("[name=room-req-placeholder]").val();

    let textArr = roomText.split(",");
    let parentContainer = $(this)
        .parent()
        .parent()
        .siblings(".child-age-container")
        .attr("id");
    $(`#${parentContainer} #age-selector-${currValue}`).remove();
    totalChild--;
    currValue--;

    textArr[1] = `${totalChild} Anak`;
    $("[name=room-req-placeholder]").val(textArr[0] + ", " + textArr[1].trim());

    if (currValue < 1) {
        $(this).prop("disabled", true);
        $(this).parent().parent().siblings(".text-child").text("");
    }
    $("[name=total-child]").val(totalChild);
    $(`[name=${target}]`).val(currValue);
    $(this).siblings(".child-counter-text-val").text(currValue);
});

/* EOL */
slideShow();
