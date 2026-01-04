@extends('admin-panel.layouts.app')
@section('content')

<div class="right_col" role="main">
 

  <div class="x_panel">
    <div class="x_title">
      <h2>Orders <small>List</small></h2>
      <div class="clearfix"></div>
    </div>

    <div class="x_content">
      <table class="table table-bordered text-center">
        <thead>
          <tr>
            <th>ID</th>
            <th>User</th>
            <th>Total</th>
            <th>Status</th>
            <th>Date</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($orders as $order)
            <tr>
              <td>#{{ $order->id }}</td>
              <td>{{ $order->email }}</td>
              <td>₹ {{ $order->total_amount }}</td>
              <td>
                <span class="badge {{ $order->status == 'pending' ? 'badge-warning' : 'badge-success' }}">
                  {{ ucfirst($order->status) }}
                </span>
              </td>
              <td>{{ $order->created_at->format('d M Y') }}</td>
              <td>
                <a href="{{ route('admin.orders.show',$order->id) }}" class="btn btn-sm btn-info">
                  View
                </a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection
