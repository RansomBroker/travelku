const getData = () => {
    let busOrigin = $('[name=train-origin]').val();
    let busDestination = $('[name=train-destination]').val();
    let passengerAdult = $('[name=adult-train]').val();
    let passengerChild = $('[name=children-train]').val();
    let passengerInfant = $('[name=infant-train]').val();
    let departure = $('[name=departure]').val();

    let data = {
        "train-origin" :busOrigin,
        "train-destination": busDestination,
        "adult" : passengerAdult,
        "children": passengerChild,
        "infant" : passengerInfant,
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

const showScheduleHTML = (res) => {
    const classes = [
        {
            subClass: "AA",
            className: "Eksekutif"
        },
        {
            subClass: "A",
            className: "Eksekutif"
        },
        {
            subClass: "H",
            className: "Eksekutif"
        },
        {
            subClass: "I",
            className: "Eksekutif"
        },
        {
            subClass: "J",
            className: "Eksekutif"
        },
        {
            subClass: "X",
            className: "Eksekutif"
        },
        {
            subClass: "BA",
            className: "Bisnis"
        },
        {
            subClass: "B",
            className: "Bisnis"
        },
        {
            subClass: "K",
            className: "Bisnis"
        },
        {
            subClass: "N",
            className: "Bisnis"
        },
        {
            subClass: "O",
            className: "Bisnis"
        },
        {
            subClass: "Y",
            className: "Bisnis"
        },
        {
            subClass: "CA",
            className: "Ekonomi"
        },
        {
            subClass: "C",
            className: "Ekonomi"
        },
        {
            subClass: "P",
            className: "Ekonomi"
        },
        {
            subClass: "Q",
            className: "Ekonomi"
        },
        {
            subClass: "S",
            className: "Ekonomi"
        },
        {
            subClass: "Z",
            className: "Ekonomi"
        },
    ];

    let html = ``;
    res.schedules.forEach(function (value) {
        value.availibilityClasses.forEach(function (data) {
            html += `
                <div class="card mt-4">
                    <div class="card-body">
                        <div class="row justify-content-start align-items-center">
                            <div style="width: 90px; height: 90px;" class="d-flex justify-content-center align-items-center rounded-circle">
                                <img style="width: 60px; height: 40px" src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/56/Logo_PT_Kereta_Api_Indonesia_%28Persero%29_2020.svg/1200px-Logo_PT_Kereta_Api_Indonesia_%28Persero%29_2020.svg.png">
                             </div>
                            <div class="col-6 col-lg-2  ms-2">
                                <div class="d-flex flex-column">
                                    <span class="text-black fw-bold">${value.trainName} (${value.trainNumber})</span>
                                    <span class="small">${classes.find(el => el.subClass === data.subClass).className + '('+ data.subClass +')'}  </span>
                                </div>
                            </div>

                            <div class="col-12 col-lg-7 ms-2">
                                <div class="row row-cols-3 row-cols-lg-auto align-items-center  justify-content-lg-between">
                                    <div class="col-12 col-lg-auto col-md-auto departure text-end me-lg-3 d-flex flex-column">
                                        <div class="badge bg-info mb-2"><small>${res.originFull}</small></div>
                                        <p class="m-0 text-center"><small>${value.departTime.split('T')[0] + ' ' + value.departTime.split('T')[1]}</small></p>
                                    </div>
                                    <div class="col-12 col-lg-auto col-md-auto divider divider-info flex-grow-1">
                                        <div class="divider-text"><i class='bx bxs-train'></i></i></div>
                                    </div>
                                    <div class="col-12 col-lg-auto col-md-auto arrival ms-lg-3 d-flex flex-column">
                                        <div class="badge bg-info mb-2"><small>${res.destinationFull}</small></div>
                                        <p class="m-0 text-center"><small>${value.arrivalTime.split("T")[0] + ' '  + value.arrivalTime.split("T")[1]}</small></p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-2 col-12 text-start text-lg-end">
                                <h5 class="fw-bold text-info m-0 mb-2">${new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 2  }).format(data.price)}</h5>
                                <form>
                                    <button class="btn btn-info">Choose</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            `;

        })
    })


    $('#bus-list-schedules').append(html);
    $('.show-bus-routes').click(function (e) {
        $(this).parent().siblings('.routes-list').toggle("slow")
        console.log("hey i got clicked")
    })

}

const trainSchedule = async () => {
    let URL = window.location.origin+"/api/train/schedule";
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
    console.log(response)
    if (response.respMessage === "rute tidak tersedia" && response.status === "FAILED") {
        errorDisplay(response)
    } else {
        showScheduleHTML(response)
        $("#overlay").css({'opacity': '0'})
        $("#overlay").css({'visibility': 'hidden'})

    }
}


trainSchedule();

