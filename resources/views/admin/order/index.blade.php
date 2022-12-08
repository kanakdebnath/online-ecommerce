@extends('admin.layouts.admin')


@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Order/</span> Index</h4> 
    @if (session()->has('messege'))
      <div class="alert alert-success">
        {{ session()->get('messege') }}
      </div>
      
    @endif

    <!-- Basic Layout -->
    <div class="card">
        <h5 class="card-header">All Orders</h5>
        <div class="table-responsive text-nowrap">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>SL</th>
                <th>Invoice</th>
                <th>Customer Name</th>
                <th>Address</th>
                <th>Price</th>
                <th>Payment Type</th>
                <th>Delivery Status</th>
                <th>Date</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($orders as $order)
                <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $order->invoice_id }}</td>
                <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $order->user->name }}</strong> <br>
                  <span>{{ json_decode($order->address)->phone }}</span> <br>
                  <span>{{ json_decode($order->address)->email }}</span>
                </td>
                <td>{{ json_decode($order->address)->billing_address }} </td>
                <td>{{ $order->grand_total }} </td>
                <td>{{ $order->payment_type }} </td>
                <td>{{ $order->delivery_status }} </td>
                <td>{{ $order->created_at }}</td>

                <td>
                    <div class="dropdown">
                      <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                        <i class="bx bx-dots-vertical-rounded"></i>
                      </button>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('admin.order.delete',$order->id) }}"><i class="bx bx-trash me-1"></i> Delete</a>

                        <a class="dropdown-item" data-bs-target="#orderviewModal" data-bs-toggle="modal" onclick="order_view({{ $order->id }})"><i class="bx bx-trophy  me-1"></i> View</a>
                      </div>

                        
                    </div>
                  </td>
                </tr>
                @endforeach
            </tbody>
          </table>
        </div>
      </div>
  </div>
@stop

@push('admin_script')
<script>

  function order_view(id){
          $('#AdminModal').modal('show');
          $('#AdminModalBody').html(null);
          $('#exampleModalLabel3').html('Order View Modal');
          $.post('{{ route('admin.orderviewModal') }}', {_token:'{{ csrf_token() }}', id:id}, function(data){
              $('#AdminModalBody').html(data);
          });
      }

  </script>
@endpush