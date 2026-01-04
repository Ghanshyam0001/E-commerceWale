   @extends('layouts.app')

@section('content')
   <div class="container-fluid py-5 mt-5">
            <div class="container py-5">
                <div class="row g-4 mb-5">
                    <div class="col-lg-8 col-xl-9">
                        <div class="row g-4">
                            <div class="col-lg-6">
                                <div class="border rounded">
                                  
                                </div>
                            </div>
                            <div class="x_content">

              <table class="table">
                <thead>
                 <tr>
                <th>Order ID</th>
                <th>Date</th>
                <th>Total</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
                </thead>
                <tbody>
            @forelse($orders as $order)
                <tr>
                    <td>#{{ $order->id }}</td>
                    <td>{{ $order->created_at->format('d M Y') }}</td>
                    <td>₹ {{ $order->total_amount }}</td>
                    <td>
                        <span class="badge {{ $order->status == 'pending' ? 'bg-warning' : 'bg-success' }}">
                       {{ ucfirst($order->status) }}
</span>
                    </td>
                    <td>
                        <a href="{{ route('ordershow', $order->id) }}"
                           class="btn btn-sm btn-primary">
                            View
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">No orders found</td>
                </tr>
            @endforelse
        </tbody>
              </table>

            </div>
                           
                           
                        </div>
                    </div>
                  
                </div>
             
               
            </div>
        </div>
        @endsection