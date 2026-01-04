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

    <h2 class="mb-4">Order #{{ $order->id }}</h2>

    <!-- Billing Details -->
    <div class="card mb-4">
        <div class="card-header fw-bold">Billing Details</div>
        <div class="card-body">
            <p><strong>Name:</strong> {{ $order->first_name }} {{ $order->last_name }}</p>
            <p><strong>Email:</strong> {{ $order->email }}</p>
            <p><strong>Mobile:</strong> {{ $order->mobile }}</p>
            <p><strong>Address:</strong>
                {{ $order->address }},
                {{ $order->city }},
                {{ $order->country }} - {{ $order->postcode }}
            </p>
        </div>
    </div>

    <!-- Products -->
    <div class="card">
        <div class="card-header fw-bold">Products</div>
        <div class="card-body table-responsive">
            <table class="table text-center">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order->items as $item)
                        <tr>
                            <td>
                                <img src="{{ asset('uploads/products/'.$item->product->image) }}"
                                     width="60">
                            </td>
                            <td>{{ $item->product->title }}</td>
                            <td>₹ {{ $item->price }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>₹ {{ $item->price * $item->quantity }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="4" class="text-end">Grand Total</th>
                        <th>₹ {{ $order->total_amount }}</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

</div>
 </div>
                           
                           
                        </div>
                    </div>
                  
                </div>
             
               
            </div>
        </div>
@endsection
