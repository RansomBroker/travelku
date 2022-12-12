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

    let response = await request.json()
    console.log(response);
};

hotelList();
