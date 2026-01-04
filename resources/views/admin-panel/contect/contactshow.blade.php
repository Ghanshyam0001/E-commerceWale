@extends('admin-panel.layouts.app')
@section('content')

<div class="right_col" role="main">
  

  <div class="x_panel">
    <div class="page-title">
    <h3>Message Detail</h3>
  </div>
    <div class="x_content">
      <p><strong>Name:</strong> {{ $message->name }}</p>
      <p><strong>Email:</strong> {{ $message->email }}</p>
      <p><strong>Message:</strong> {{ $message->message }}</p>
      <p><strong>Date:</strong> {{ $message->created_at->format('d M Y H:i') }}</p>
      <a href="{{ route('contacts') }}" class="btn btn-primary mt-3">Back to Messages</a>
    </div>
  </div>
</div>

@endsection
