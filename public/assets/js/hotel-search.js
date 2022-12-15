

const hotelReqData = () => {
    let roomCount = parseInt($("[name=room-count]").val());
    let checkIn = $("[name=check-in]").val();
    let checkOut = $("[name=check-out]").val();
    let place = $("[name=place]").val();
    let hotelReq = {};
    hotelReq.paxPassport = "ID";
    hotelReq.countryID = "ID";
    hotelReq.cityID = place;
    hotelReq.checkInDate = checkIn;
    hotelReq.checkOutDate = checkOut;
    hotelReq.roomRequest = [];
    for (let i = 1; i <= roomCount; i++) {
        let roomReq = {};
        roomReq.roomType = parseInt($(`[name=room-type-${i}`).val());
        roomReq.isRequestChildBed = false;
        roomReq.childNum = 0;
        roomReq.childAges = [0];
        hotelReq.roomRequest.push(roomReq);
    }

    return hotelReq;
};

const hotelList = async () => {
    let URL = window.location.origin + "/api/hotel/search";
    let data = hotelReqData();
    let request = await fetch(URL, {
        method: "POST",
        headers: {
            Accept: "application.json",
            "Content-Type": "application/json",
        },
        body: JSON.stringify(data),
    });

    let response = await request.json();
    if (
        response.status === "FAILED" &&
        response.respMessage === "no room found"
    ) {
        errorDisplay(response);
    } else {
        $(".hotel-paginate").pagination({
            dataSource: response.hotels,
            className:
                "d-flex justify-content-end mb-3 mt-3 paginationjs-theme-blue paginationjs-big",
            callback: function (data, pagination) {
                window.scrollTo({ top: 0, behavior: "smooth" });
                console.log(data);
                showHotelList(data);
            },
        });
    }
};

const showHotelList = (response) => {
    /* load img data */
    $("#hotel-list").empty();
    let html = ``;

    response.forEach(function (hotel) {
        html += `
                <div class="card mt-4">
                    <div class="card-body row d-flex justify-content-start p-0 p-lg-4">
                        <!-- img -->
                        <div class="col-12 col-lg-3">
                          <img class="img-fluid rounded" src="${
                              hotel.logo
                          }" alt="Hotel Logo" style="min-width: 100%"/>
                        </div>

                        <!-- hotel desc -->
                        <div class="col-12 col-lg-4 mt-4 mt-lg-0 ">
                          <div class="d-flex justify-content-start flex-column p-4 p-lg-0">
                              <h5 class="fw-bold text-black m-0 ">${
                                  hotel.name
                              }</h5>
                              <span class="mb-3 mt-3">${(function () {
                                  let string = "";
                                  for (
                                      let i = 0;
                                      i < parseInt(hotel.ratingAverage);
                                      i++
                                  ) {
                                      string +=
                                          '<i class="bx bxs-star text-warning"></i>';
                                  }
                                  return string;
                              })()} </span>
                              <p class="text-black small">${hotel.address}</p>
                          </div>
                        </div>

                        <!-- Price -->
                        <div class="ms-lg-auto col-12 col-lg-2 d-flex align-items-lg-center">
                            <div class="w-100 p-4 p-lg-0 ">
                               <button class="w-100 btn btn-info">${new Intl.NumberFormat(
                                   "id-ID",
                                   {
                                       style: "currency",
                                       currency: "IDR",
                                       minimumFractionDigits: 2,
                                   }
                               ).format(hotel.priceStart)}</button>
                            </div>
                        </div>
                    </div>
                </div>
            `;
    });

    /* initial */
    $("#hotel-list").append(html);
};

const errorDisplay = (data) => {
    const toastPlacementExample = document.querySelector(".toast-placement-ex");
    toastPlacementExample.innerHTML = `
        <div class="toast-header">
            <i class="bx bx-bell me-2"></i>
            <div class="me-auto fw-semibold">${data.status}</div>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">${data.respMessage}</div>
    `;
    let toastPlacement = new bootstrap.Toast(toastPlacementExample);
    toastPlacement.show();

    console.log(location.origin);
    setTimeout(() => {
        window.location.href = location.origin;
    }, 1000);
};

hotelList();
