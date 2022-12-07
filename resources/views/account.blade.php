@extends('master')

@section('title', 'Travelku - Account')

@section('custom-css')

@include('components/navbar/css')


@endsection

@section('content')
<div class="row m-0">
	<div class="col-12 p-0">
		@include('components/navbar/navbar')
		<section class="account">
			<div id="result-account" class="w-100 py-4 px-4 px-lg-5">
				<div class="row gx-3 gy-3 flex-lg-row">
					<div class="col-lg-4">
						<div class="card">
							<h5 class="card-header">My Account</h5>
							<div class="card-body">
								<div class="my-3 mb-5 profile-image text-center w-100">
									<img class="rounded-circle" src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}">
								</div>
								<div class="table-responsive">
									<table class="table table-basic">
										<tr>
											<td>Full name</td>
											<td>{{ Auth::user()->name }}</td>
										</tr>
										<tr>
											<td>Email</td>
											<td>{{ Auth::user()->email }}</td>
										</tr>
										<tr>
											<td>Phone</td>
											<td>{{ Auth::user()->phone }}</td>
										</tr>
										<tr>
											<td>Member since</td>
											<td>{{ Auth::user()->created_at }}</td>
										</tr>
									</table>
								</div>
								<div class="w-100 mt-5 mb-3 text-center">
									<a href="{{ URL::to('logout') }}" class="btn btn-info d-grid">Logout</a>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-8">
						<div class="card">
							<h5 class="card-header">Booking History</h5>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table table-striped" id="table-booking">
										<thead>
											<tr>
												<td>Booking ID</td>
												<td>Booked At</td>
												<td>PNR</td>
												<td>Payment Method</td>
												<td>Status</td>
											</tr>
										</thead>
										<tbody>
											@foreach($booking as $item)
											<tr href="{{ URL::to('flight/status/'.$item->order_id) }}">
												<td>{{ $item->order_id }}</td>
												<td>{{ $item->created_at }}</td>
												<td>{{ $item->pnr }}</td>
												<td>{{ strtoupper($item->payment_method) }}</td>
												<td>
													@if($item->status == 'success')
														<div class="badge bg-success">Success</div>
													@elseif($item->status == 'pending')
														<div class="badge bg-pending">Pending</div>
													@else
														<div class="badge bg-danger">Canceled</div>
													@endif
												</td>
											</tr>
											@endforeach
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
</div>

@endsection

@section('custom-js')

@include('components/navbar/js')
<script type="text/javascript">
	$("#table-booking").DataTable({responsive: true})
	$("tr").click((e) => {
		const url = e.currentTarget.getAttribute('href')
		window.open(url, '_blank').focus();
	})
</script>

@endsection