@extends('admin-panel.layouts.app')
@section('content')

  <div class="right_col" role="main">
    <div class="x_panel">
      <div class="x_title">
        <h2>Order #{{ $order->id }}</h2>
        <div class="clearfix"></div>
      </div>

      <div class="x_content">

        <h4>Billing Details</h4>
        <p><strong>Name:</strong> {{ $order->first_name }} {{ $order->last_name }}</p>
        <p><strong>Email:</strong> {{ $order->email }}</p>
        <p><strong>Mobile:</strong> {{ $order->mobile }}</p>
        <p><strong>Address:</strong> {{ $order->address }}, {{ $order->city }}</p>

        <hr>

        <h4>Products</h4>
   <div class="table-responsive">
    <table class="table table-bordered align-middle text-center">
        <thead class="table-light">
            <tr>
                <th>#</th>
                <th>Product</th>
                <th>Image</th>
                <th>Price</th>
                <th>Qty</th>
                <th>Total</th>
            </tr>
        </thead>

        <tbody>
            @foreach($order->items as $key => $item)
                <tr>
                    <td>{{ $key + 1 }}</td>

                    <td class="fw-bold">
                        {{ $item->product->title ?? 'N/A' }}
                    </td>

                    <td>
                        <img src="{{ asset('uploads/products/' . ($item->product->image ?? 'no-image.png')) }}"
                             class="img-thumbnail"
                             width="60"
                             height="60"
                             alt="Product Image">
                    </td>

                    <td>
                        ₹ {{ number_format($item->price, 2) }}
                    </td>

                    <td>
                        <span class="badge bg-secondary">
                            {{ $item->quantity }}
                        </span>
                    </td>

                    <td class="fw-bold text-success">
                        ₹ {{ number_format($item->price * $item->quantity, 2) }}
                    </td>
                </tr>
            @endforeach
        </tbody>

        <tfoot class="table-light">
            <tr>
                <th colspan="5" class="text-end">Grand Total</th>
                <th class="text-success">
                    ₹ {{ number_format($order->total_amount, 2) }}
                </th>
            </tr>
        </tfoot>
    </table>
</div>


        <h4 class="text-right">Grand Total: ₹ {{ $order->total_amount }}</h4>

        @if($order->status == 'pending')
          <form action="{{ route('admin.orders.status', $order->id) }}" method="POST">
            @csrf
            <button class="btn btn-success mt-3">
              Mark as Completed
            </button>
          </form>
        @endif

      </div>
    </div>
  </div>

@endsection