

    <!-- Modal Body View-->
    <div class="card">
        <h5 class="card-header">Order SUmmary</h5>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>Order ID</th>
                          <th>Customer Name</th>
                          <th>Email</th>
                          <th>Shiping Address</th>
                          <th>Order Date</th>
                          <th>Order Status</th>
                          <th>Order Amount</th>
                          <th>Payment Type</th>
                        </tr>
                      </thead>
                      <tbody class="table-border-bottom-0">
                          
                          <tr>
                            <td>{{ $order->invoice_id }}</td>
                            <td>{{ $order->user->name }}</td>
                            <td>{{ json_decode($order->address)->phone }}</td>
                            <td>{{ json_decode($order->address)->billing_address }}</td>
                            <td>{{ $order->created_at }}</td>
                            <td>{{ $order->delivery_status }}</td>
                            <td>{{ $order->grand_total }}</td>
                            <td>{{ $order->payment_type }}</td>
                          </tr>
                      </tbody>
                    </table>
                  </div>
            </div>


        </div>
      </div>
  </div>




   <!-- Basic Layout -->
   <div class="card">
    <h5 class="card-header">Order Details</h5>
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Product Name</th>
                      <th>Qty</th>
                      <th>Amount</th>
                    </tr>
                  </thead>
                  <tbody class="table-border-bottom-0">
                      @foreach ($order->details as $item)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->product->name }}</td>
                        <td>{{ $item->qty }}</td>
                        <td>{{ $item->price }}</td>
                      </tr>
                      @endforeach
                      
                  </tbody>
                </table>
              </div>
        </div>


    </div>
  </div>