@extends('master')

@section('title', 'Travelku - Booking Status')

@section('custom-css')

@include('components/navbar/css')

<style type="text/css">
	#segment-display {
		overflow: hidden;
		max-height: 0;
    transition: max-height 1s ease-in-out;
	}

	#segment-display.show {
		overflow: hidden;
		max-height: 2000px;
    transition: max-height 1s ease-in-out;
	}
</style>

@endsection

@section('content')
<div id="overlay" style="z-index: 20" class="bg-white d-flex align-items-center justify-content-center position-fixed top-0 bottom-0 left-0 right-0 vh-100 w-100">
	<div class="spinner-border spinner-border-lg text-info" role="status">
    <span class="visually-hidden">Loading...</span>
  </div>
</div>
<div class="row m-0">
	<div class="col-12 p-0">
		@include('components/navbar/navbar')
		<section class="result">
			<div id="result-container" class="w-100 py-4 px-4 px-lg-5">
				<div class="row gx-3 gy-3">
					<div class="col-lg-6">
						<div class="d-flex flex-column align-items-stretch h-100">
							<div class="card">
								<h5 class="card-header">Booking Detail</h5>
								<div class="card-body" id="booking-detail">
								</div>
							</div>
							<div class="card mt-3 h-100">
								<h5 class="card-header">Passenger Detail</h5>
								<div class="card-body" id="passenger-detail">
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div id="flight-detail">
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
</div>

<div
  class="bs-toast toast bg-danger top-0 end-0 toast-placement-ex m-2"
  role="alert"
  aria-live="assertive"
  aria-atomic="true"
  data-delay="0"
>
  <div class="toast-header">
    <i class="bx bx-bell me-2"></i>
    <div class="me-auto fw-semibold">Bootstrap</div>
    <small>11 mins ago</small>
    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
  </div>
  <div class="toast-body">Fruitcake chocolate bar tootsie roll gummies gummies jelly beans cake.</div>
</div>

@endsection

@section('custom-js')

@include('components/navbar/js')

<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-3gbR5TaQkqa89914"></script>

<script type="text/javascript">
	const apiURL = "{{ URL::to('api/flight/booking/'.$id) }}"
	const logoUrl = "{{ asset('assets/img/airlines') }}"
	const endURL = "{{ URL::to('flight/status') }}"
</script>

<script type="text/javascript">
	const parseDate = (date) => {
		const month = ['', 'JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AGU', 'SEP', 'OCT', 'NOV', 'DES'];
		let s = date.split('T');
		date = s[0].split('-')
		const time = s[1].substring(0, 5)

		return `${date[2]} ${month[parseInt(date[1])]} ${time}`
	}

	const formatIdr = (numb) => {
		numb = Math.ceil(numb)
		const format = numb.toString().split('').reverse().join('');
		const convert = format.match(/\d{1,3}/g);
		const rupiah = 'IDR ' + convert.join('.').split('').reverse().join('')
		return rupiah;
	}

	const displayResult = (item) => {
		let resultHtml = ``
		resultHtml += `
			<div class="card-result card" key="${item.id}">
				<div class="card-body">
					<div class="row gy-3 gx-2 align-items-center">
						<div class="col-lg-2">
							<div class="d-flex align-items-center">
								<div class="detail ms-2">
									<h6 class="p-0 m-0 fw-bold">${item.dictionaries.carriers[item.itineraries[0].segments[0].carrierCode]}</h6>
									<p style="font-size: 14px" class="text-muted p-0 m-0"><small>${item.itineraries[0].segments[0].carrierCode}-${item.itineraries[0].segments[0].number}</small></p>
								</div>
							</div>
						</div>
						<div class="col-lg-7">
							<div class="d-flex align-items-center justify-content-between">
								<div class="departure text-end me-3">
									<div class="badge bg-info mb-2"><small>${item.itineraries[0].segments[0].departure.iataCode}</small></div>
									<p class="m-0"><small>${parseDate(item.itineraries[0].segments[0].departure.at)}</small></p>
								</div>
								<div class="divider divider-info flex-grow-1">
									<div class="divider-text"><i class='bx bxs-plane-take-off text-info'></i></div>
								</div>
								<div class="arrival ms-3">
									<div class="badge bg-info mb-2"><small>${item.itineraries[item.itineraries.length - 1].segments[item.itineraries[item.itineraries.length - 1].segments.length - 1].arrival.iataCode}</small></div>
									<p class="m-0"><small>${parseDate(item.itineraries[item.itineraries.length - 1].segments[item.itineraries[item.itineraries.length - 1].segments.length - 1].arrival.at)}</small></p>
								</div>
							</div>
						</div>
						<div class="col-lg-3 text-start text-lg-end">
							<h5 class="fw-bold text-info m-0 mb-2">${formatIdr(item.total)}</h5>
						</div>
					</div>
					<div id="segment-display" key="${item.id}" class="segment-display show row gy-3 gax-2 align-items-center py-2">`
		
		item.itineraries.forEach((itinerary) => {
			itinerary.segments.forEach((segment, index) => {

				resultHtml += `
					<div class="col-12 mt-4">
						<div class="d-flex align-items-stretch">
							<div class="line position-relative me-2">
								<div class="rounded-circle bg-info position-absolute top-0" style="width: 10px; height: 10px"></div>
								<div class="bg-info ms-1" style="height: 100%; width: 1px"></div>
								<div class="rounded-circle bg-info position-absolute bottom-0" style="width: 10px; height: 10px"></div>
							</div>
							<div class="detail px-2 flex-grow-1">
								<div class="origin">
									<p style="font-size: 12px" class="lead m-0">${segment.departure.iataCode}</p>
									<p style="font-size: 12px" class="m-0">${parseDate(segment.departure.at)}</p>
								</div>
								<div class="w-100 p-3 border bg-light my-2 rounded">
									<div class="d-flex align-items-center">
										<div class="img">
											<div style="width: 50px; height: 50px;" class="bg-label-info d-flex justify-content-center align-items-center rounded-circle">
												<img style="width: 30px; height: 30px;" class="rounded-circle" src="${logoUrl}/${segment.carrierCode}.png">
											</div>
										</div>
										<div class="detail ms-2">
											<p class="fw-bold m-0">${item.dictionaries.carriers[segment.carrierCode]}</p>
											<p style="font-size: 11px" class="m-0">${segment.carrierCode} - ${segment.number} ${item.travelerPricings[0].fareDetailsBySegment[0].includedCheckedBags.weight ? `<i class='bx bx-briefcase-alt-2 ms-2'></i> ${item.travelerPricings[0].fareDetailsBySegment[index].includedCheckedBags.weight}${item.travelerPricings[0].fareDetailsBySegment[index].includedCheckedBags.weightUnit}` : ''} <i class='bx bx-info-circle ms-2'></i> ${item.travelerPricings[0].fareDetailsBySegment[index].class} (${item.travelerPricings[0].fareDetailsBySegment[index].fareBasis})</p>
										</div>
									</div>
								</div>
								<div class="origin">
									<p style="font-size: 12px" class="lead m-0">${segment.arrival.iataCode}</p>
									<p style="font-size: 12px" class="m-0">${parseDate(segment.arrival.at)}</p>
								</div>
							</div>
						</div>
						<div class="alert alert-info my-3">Stop and changes plane in next arrival</div>
					</div>
				`

			})
		})

		resultHtml +=	`
					</div>
				</div>
			</div>
		`

		$('#flight-detail').html(resultHtml)
	}

	const fetchBooking = async () => {
		const response = await fetch(apiURL)
		const result = await response.json()
		const data = JSON.parse(atob(result.data))

		$("#overlay").css({'opacity': '0'})

		setTimeout(() => {
			$("#overlay").css({'visibility': 'hidden'})
		}, 1000)
		
		
		let splittedPnr;
		let pnr;
		let officeId;
		
		if(result.pnr)
		{
		    splittedPnr = result.pnr.split('|');
		    pnr = splittedPnr[0]
		    officeId = splittedPnr[1];
		}

		document.querySelector('#booking-detail').innerHTML = `
			<div class="alert ${result.status == 'pending' ? 'alert-warning' : result.status == 'success' ? 'alert-success' : 'alert-danger'}">
				<div class="d-flex align-items-center justify-content-between">
					<h6 class="m-0">Your booking is ${result.status == 'pending' ? 'waiting payment' : result.status == 'success' ? 'paid' : 'canceled'} ${result.message ?? ''}</h6>
					${result.status == 'pending' ? '<button id="btn-pay" class="btn btn-warning">Pay</button>' : ''}
				</div>
			</div>
			<div class="table-responsive">
				<table class="table table-stripped">
					<tr>
						<td>BOOKING ID</td>
						<td>${result.order_id}</td>
					</tr>
					<tr>
						<td>PNR</td>
						<td>${pnr ?? '-'}</td>
					</tr>
					<tr>
						<td>Office ID</td>
						<td>${officeId ?? '-'}</td>
					</tr>
					<tr>
						<td>PAYMENT METHOD</td>
						<td>${(result.payment_method ?? '-').toUpperCase()}</td>
					</tr>
				</table>
			</div>
		`

		$('#btn-pay').click(() => {
			snap.pay(result.snap_token, {
        onSuccess: function(o){
					window.location.href = endURL + '/' + result.order_id
        },

        onPending: function(o){
					window.location.href = endURL + '/' + result.order_id
        },

        onError: function(o){
					window.location.href = endURL + '/' + result.order_id
        }
      });
		})

		let passengerHtml = `
			<h6 class="m-0">CONTACT DETAILS</h6>
				<div class="table-responsive my-3">
					<table class="table table-stripped">
						<tr>
							<td>Email</td>
							<td>${data.data.travelers[0].contact.emailAddress}</td>
						</tr>
						<tr>
							<td>Phone</td>
							<td>+${data.data.travelers[0].contact.phones[0].countryCallingCode}${data.data.travelers[0].contact.phones[0].number}</td>
						</tr>
					</table>
				</div>
		`

		data.data.travelers.forEach((traveler) => {
			passengerHtml += `
				<h6 class="m-0">PASSENGER ${traveler.id}</h6>
				<div class="table-responsive my-3">
					<table class="table table-stripped">
						<tr>
							<td>Name</td>
							<td>${traveler.name.firstName} ${traveler.name.lastName}</td>
						</tr>
						<tr>
							<td>Date of Birth</td>
							<td>${traveler.dateOfBirth}</td>
						</tr>
						<tr>
							<td>Gender</td>
							<td>${traveler.gender}</td>
						</tr>
					</table>
				</div>
			`
		})

		document.querySelector('#passenger-detail').innerHTML = passengerHtml

		displayResult(data.data.flightOffers[0])
	}

	fetchBooking();
</script>

@endsection