const getData = () => {
    let busOrigin = $('[name=bus-origin]').val();
    let busDestination = $('[name=bus-destination]').val();
    let passenger = $('[name=passenger]').val();
    let departure = $('[name=departure]').val();

    let data = {
        "bus-origin" :busOrigin,
        "bus-destination": busDestination,
        passenger,
        departure
    }

    return data;
}


const errorDisplay = (data) => {
    const toastPlacementExample = document.querySelector('.toast-placement-ex')
    toastPlacementExample.innerHTML = `
        <div class="toast-header">
            <i class="bx bx-bell me-2"></i>
            <div class="me-auto fw-semibold">${data.status}</div>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">${data.respMessage}</div>
    `
    toastPlacement = new bootstrap.Toast(toastPlacementExample)
    toastPlacement.show()

    console.log(location.origin)
    setTimeout(() => {
        window.location.href = location.origin;
    }, 1000)
}

const showScheduleHTML = (data) => {
    let html = ``;
    data.schedules.forEach(function (value) {
        html += `
                <div class="card mt-4">
                    <div class="card-body">
                        <div class="row justify-content-start align-items-center">
                            <div style="width: 90px; height: 90px;" class="bg-label-info d-flex justify-content-center align-items-center rounded-circle">
                                <img style="width: 70px; height: 70px;" class="rounded-circle" src="${window.location.origin+'/public/assets/icons/bus.png'}">
                             </div>
                            <div class="col-6 col-lg-2 ms-2">
                                <div class="d-flex flex-column">
                                    <span class="text-black fw-bold">${value.operatorName}</span>
                                    <span class="small">Sisa kursi : ${value.capacity}</span>
                                    <span>${value.busInfo}</span>
                                </div>
                            </div>

                            <div class="col-12 col-lg-7 ms-2">
                                <div class="row row-cols-3 row-cols-lg-auto align-items-center  justify-content-lg-between">
                                    <div class="col-12 col-lg-auto col-md-auto departure text-end me-lg-3 d-flex flex-column">
                                        <div class="badge bg-info mb-2"><small>${value.departLocation[0].departAddress}</small></div>
                                        <p class="m-0 text-center"><small>${value.departLocation[0].departTime.split('T')[0] + ' ' + value.departLocation[0].departTime.split('T')[1]}</small></p>
                                    </div>
                                    <div class="col-12 col-lg-auto col-md-auto divider divider-info flex-grow-1">
                                        <div class="divider-text"><i class='bx bxs-bus text-info'></i></div>
                                    </div>
                                    <div class="col-12 col-lg-auto col-md-auto arrival ms-lg-3 d-flex flex-column">
                                        <div class="badge bg-info mb-2"><small>${value.arrivalLocation[0].arrivalAddress}</small></div>
                                        <p class="m-0 text-center"><small>${value.arrivalLocation[0].arrivalTime.split("T")[0] + ' '  + value.arrivalLocation[0].arrivalTime.split("T")[1]}</small></p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-2 col-12 text-start text-lg-end">
                                <h5 class="fw-bold text-info m-0 mb-2">${new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 2  }).format(value.classes[0].totalPrice)}</h5>
                                <form>
                                    <button class="btn btn-info">Choose</button>
                                </form>
                            </div>

                            <div class="col-lg-12 col-12  d-flex justify-content-center mt-4">
                                <a href="JavaScript:void(0)" class="show-bus-routes">Show Detail Keberangkatan</a>
                            </div>
                            <!--{{&#45;&#45; Routes &#45;&#45;}}-->
                            <div class="col-12 mt-4 routes-list" style="display: none;">
                                <h5>Detail Keberangkatan</h5>
                                <div class="d-flex align-items-stretch route">
                                    <div class="line position-relative me-2 mb-3">
                                        <div class="rounded-circle bg-info position-absolute top-0" style="width: 10px; height: 10px"></div>
                                        <div class="bg-info ms-1" style="height: 100%; width: 1px"></div>
                                        <div class="rounded-circle bg-info position-absolute bottom-0" style="width: 10px; height: 10px"></div>
                                    </div>
                                    <div class="detail px-2 flex-grow-1">
                                        ${ value.routes.map(function (route, key) {
                                                return  `<div class="origin mb-3">
                                                    <p style="font-size: 12px" class="lead m-0">${route.hasOwnProperty('departAddress') ? route.departAddress : route.arrivalAddress}</p>
                                                    <p style="font-size: 12px" class="m-0">${route.hasOwnProperty('departTime')? route.departTime.split('T')[0] + ' ' + route.departTime.split('T')[1] : route.arrivalTime.split('T')[0] + ' '  +route.arrivalTime.split('T')[1]}</p>
                                                </div>`
                                        }).join("")}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        `;
    })


    $('#bus-list-schedules').append(html);
    $('.show-bus-routes').click(function (e) {
        $(this).parent().siblings('.routes-list').toggle("slow")
        console.log("hey i got clicked")
    })

}

const busSchedule = async () => {
    let URL = window.location.origin+"/api/bus/schedule";
    let data = getData()
    let request = await fetch(URL,
        {
            method: "POST",
            headers: {
                Accept: 'application.json',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        });
    let response = await  request.json();

    if (response.respMessage === "bus schedule service failed" && response.status === "FAILED") {
        errorDisplay(response)
    }
    showScheduleHTML(response)
    $("#overlay").css({'opacity': '0'})
    $("#overlay").css({'visibility': 'hidden'})
}


busSchedule();

