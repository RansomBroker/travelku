const getData = () => {
    let tripType = $('[name=return]').val() === "" ? "OneWay" : "RoundTrip"
    let origin = $('[name=origin]').val();
    let destination = $('[name=destination]').val()
    let departure = $('[name=departure]').val()
    let ret = $('[name=return]').val() === "" ? null : $('[name=return]').val()
    let adult = $('[name=adult]').val()
    let child = $('[name=child]').val()
    let infant = $('[name=infant]').val()
    let originPlaceholder = $('[name=origin-placeholder]').val()
    let destinationPlaceholder = $('[name=destination-placeholder]').val()

    let data = {
        tripType,
        origin,
        destination,
        departure,
        return: ret,
        adult,
        child,
        infant,
        originPlaceholder,
        destinationPlaceholder
    }

    return data
}

const showAirlineHTML = async (data) => {
    let airlines = data.airlines;
    let html = ``;

    data.flight.forEach(function (value) {
        html += `
            <div class="card mt-4">
                    <div class="card-body">
                        <div class="row justify-content-start align-items-center">
                            <div style="width: 90px; height: 90px;" class="d-flex justify-content-center align-items-center rounded-circle">
                                <img style="width: 60px; height: 30px" src="${'https://content.airhex.com/content/logos/airlines_'+ value.airlineID+'_350_100_r.png'}">
                             </div>
                            <div class="col-6 col-lg-2  ms-2">
                                <div class="d-flex flex-column">
                                    <span class="text-black fw-bold">${airlines.find(el => el.id === value.airlineID).name }</span>
                                </div>
                            </div>

                            <div class="col-12 col-lg-7 ms-2">
                                <div class="row row-cols-3 row-cols-lg-auto align-items-center  justify-content-lg-between">
                                    <div class="col-12 col-lg-auto col-md-auto departure text-end me-lg-3 d-flex flex-column">
                                        <div class="badge bg-info mb-2"><small>${getData().originPlaceholder}</small></div>
                                        <p class="m-0 text-center"><small>${value.jiDepartTime.split('T')[0] + ' ' + value.jiDepartTime.split('T')[1]}</small></p>
                                    </div>
                                    <div class="col-12 col-lg-auto col-md-auto divider divider-info flex-grow-1">
                                        <div class="divider-text"><i class='bx bxs-train'></i></i></div>
                                    </div>
                                    <div class="col-12 col-lg-auto col-md-auto arrival ms-lg-3 d-flex flex-column">
                                        <div class="badge bg-info mb-2"><small>${getData().destinationPlaceholder}</small></div>
                                        <p class="m-0 text-center"><small>${value.jiArrivalTime.split("T")[0] + ' '  + value.jiArrivalTime.split("T")[1]}</small></p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-2 col-12 text-start text-lg-end">
                                <h5 class="fw-bold text-info m-0 mb-2">${new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 2  }).format(value.sumPrice)}</h5>
                                <form>
                                    <button class="btn btn-info">Choose</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        `
    })

    $('#flight-list-schedules').append(html);
}

const airlineSChedule = async () => {
    const URL = window.location.origin+"/api/flight/scheduleAllAirline";
    const data = getData();
    let request = await fetch(URL,
        {
            method: "POST",
            headers: {
                Accept: 'application.json',
                'Content-Type': 'application/json',
                "Access-Control-Allow-Origin": "*"
            },
            body: JSON.stringify(data)
        });
    let response = await  request.json();
    await showAirlineHTML(response)
}

airlineSChedule()
