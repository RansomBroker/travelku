@extends('master')

@section('title', 'Travelku - Booking Form')

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
				<div class="row gx-3 gy-3 flex-column-reverse flex-lg-row">
					<div class="col-lg-6">
						<div class="card h-100">
							<form id="form-pay" action="{{ URL::to('api/flight/snap') }}" class="d-flex flex-column h-100" method="post">
								<h5 class="card-header">Passenger Information</h5>
								<div class="card-body align-self-stretch">
									<div class="d-flex justify-content-between flex-column h-100">
										<div class="wrap">
											<div id="contact" class="mb-3">
												<h6 class="mb-2">CONTACT INFORMATION</h6>
												<div class="row gx-3 gy-3">
													<div class="col-lg-6 form-group">
														<input placeholder="Email" class="form-control" name="email" type="email" required>
													</div>
													<div class="col-lg-6 form-group">
														<input type="tel" placeholder="+62XXXXXXXXXX" pattern="[+][0-9]{2}[0-9]{11}" class="form-control" name="phone" required>
													</div>
												</div>
											</div>
											<div id="passenger-form">
												
											</div>
										</div>
										<button id="pay-flight" class="btn btn-info w-100 mt-5">Pay</button>
									</div>
								</div>
							</form>
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
	let offer = "{{ $_POST['offer'] }}"
	const total = "{{ $_POST['total'] }}"
	const base = "{{ $_POST['base'] }}"
	const tax = "{{ $_POST['tax'] }}"
	const apiURL = "{{ URL::to('api/flight/offer') }}"
	const logoUrl = "{{ asset('assets/img/airlines') }}"
	const dictionaries = "{{ $_POST['dictionaries'] }}"
	const apiSnap = "{{ URL::to('api/flight/snap') }}"
	const baseURL = "{{ URL::to('/') }}"
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
		item.dictionaries = JSON.parse(atob(dictionaries))
		let resultHtml = ``
		resultHtml += `
			<div class="card-result card h-100" key="${item.id}">
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
							<h5 class="fw-bold text-info m-0 mb-2">${formatIdr(total)}</h5>
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

	const buildForm = (data, isDomestic) => {
		offer = JSON.parse(atob(offer))
		offer.dictionaries = JSON.parse(atob(dictionaries))
		offer.total = total
		offer = btoa(JSON.stringify(offer))
		let passengerHtml = ``
		data.travelerPricings.forEach((passenger) => {
			passengerHtml += `
				<input type="hidden" name="offer" value="${offer}">
				<input type="hidden" name="total" value="${total}">
				<h6 class="my-3">PASSENGER ${passenger.travelerId} (${passenger.travelerType})</h6>
					<div class="row gx-3 gy-3 mb-2">
						<div class="col-lg-2">
							<select class="form-select" name="tl_${passenger.travelerId}" required>
								<option value="Mr.">Mr.</option>
								<option value="Ms.">Ms.</option>
								<option value="Mrs.">Mrs.</option>
								<option value="Miss.">Miss.</option>
								<option value="Dr.">Dr.</option>
							</select>
						</div>
						<div class="col-lg-5 form-group">
							<input placeholder="First Name" class="form-control" name="fn_${passenger.travelerId}" type="text" required>
						</div>
						<div class="col-lg-5 form-group">
							<input placeholder="Last Name" class="form-control" name="ln_${passenger.travelerId}" type="text" required>
						</div>
						<div class="col-lg-6">
							<select class="form-select" name="gn_${passenger.travelerId}" required>
								<option value="MALE">Male</option>
								<option value="FEMALE">Female</option>
							</select>
						</div>
						<div class="col-lg-6 form-group">
							<input placeholder="Date of Birth" ${passenger.travelerType == 'ADULT' ? `max="{{ date('Y-m-d', strtotime('-18 year')) }}"` : `` }  class="form-control" name="db_${passenger.travelerId}" type="date" required>
						</div>
						<div class="col-lg-12 form-group">
							<input placeholder="Country" class="form-control" name="ct_${passenger.travelerId}" type="text" required>
						</div>`
			
			if(!isDomestic && passenger.travelerType == 'ADULT') {
				passengerHtml += `
					<div class="col-lg-12 form-group">
						<input placeholder="Passport Number" class="form-control" name="pn_${passenger.travelerId}" type="text" required>
					</div>
					<div class="col-lg-6 form-group">
						<input maxlength="2" placeholder="Issuing Country (eg: ID)" class="form-control" name="cc_${passenger.travelerId}" pattern="[A-Z]{2}" type="text" required>
					</div>
					<div class="col-lg-6 form-group">
						<input placeholder="Expiry Date" min="{{ date('Y-m-d', strtotime('+2 year')) }}" class="form-control" name="ex_${passenger.travelerId}" type="date" required>
					</div>
				`
			}

			passengerHtml += `
				</div>
			`
		})

		passengerHtml += `</form>`

		$("#passenger-form").html(passengerHtml)

		$("#form-pay").submit(async (e) => {
			e.preventDefault()
			console.log(document.querySelector('#form-pay'));
			let formData = new FormData(document.querySelector('#form-pay'));
			const response = await fetch(apiSnap, {
				method: 'POST',
				body: formData
			})

			const data = await response.json()
			
			snap.pay(data.snap_token, {
        onSuccess: function(result){
					window.location.href = endURL + '/' + result.order_id
        },

        onPending: function(result){
					window.location.href = endURL + '/' + result.order_id
        },

        onError: function(result){
					window.location.href = endURL + '/' + result.order_id
        }
      });
		})
	}

	const fetchOffer = async () => {
		const response = await fetch(apiURL, {
			method: 'post',
			headers: {
				'Content-Type': 'application/x-www-form-urlencoded'
			},
			body: 'offer=' + offer
		})

		const result = await response.json()

		console.log(result)

		if(result.hasOwnProperty('errors')) {
			result.errors.forEach((error) => {
				const toastPlacementExample = document.querySelector('.toast-placement-ex')
				toastPlacementExample.innerHTML = `
					<div class="toast-header">
				    <i class="bx bx-bell me-2"></i>
				    <div class="me-auto fw-semibold">${error.title}</div>
				    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
				  </div>
				  <div class="toast-body">${error.message}</div>
				`
				toastPlacement = new bootstrap.Toast(toastPlacementExample)
				toastPlacement.show()

				setTimeout(() => {
					window.location.href = baseURL
				}, 5500)
			})

			return false;
		}

		$("#overlay").css({'opacity': '0'})

		setTimeout(() => {
			$("#overlay").css({'visibility': 'hidden'})
		}, 1000)

		if(result.dictionaries.locations[result.data.flightOffers[0].itineraries[0].segments[0].departure.iataCode].countryCode == result.dictionaries.locations[result.data.flightOffers[0].itineraries[0].segments[result.data.flightOffers[0].itineraries[0].segments.length - 1].arrival.iataCode].countryCode) {
			buildForm(result.data.flightOffers[0], true)
		} else {
			buildForm(result.data.flightOffers[0], false)
		}

		displayResult(result.data.flightOffers[0])
	}

	fetchOffer();
</script>

@endsection