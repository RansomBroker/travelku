@extends('master')

@section('title', 'Travelku - Admin Booking')

@section('custom-css')
@endsection

@section('content')

@section('menu')
  @include('components/menu')
@endsection

@section('navbar')
  @include('components/navbar')
@endsection

<div class="container-xxl flex-grow-1 container-p-y">
  <div class="row gx-4 gy-4">
    <div class="col-lg-12">
      <div class="card">
        <h5 class="card-header">Booking</h5>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-basic" id="table-booking">
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
                  <td>{{ $item->pnr ?? '-' }}</td>
                  <td>{{ $item->payment_method ?? '-' }}</td>
                  <td>
                    @if($item->status == 'success')
                      <div class="badge bg-success">Success</div>
                    @elseif($item->status == 'pending')
                      <div class="badge bg-warning">Pending</div>
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

@section('custom-js')
<script type="text/javascript">
  $("#table-booking").DataTable({responsive: true})
  $("tr").click((e) => {
    const url = e.currentTarget.getAttribute('href')
    window.open(url, '_blank').focus();
  })
</script>
@endsection

@endsection