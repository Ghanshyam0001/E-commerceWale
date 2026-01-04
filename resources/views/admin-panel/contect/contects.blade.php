@extends('admin-panel.layouts.app')
@section('content')

<div class="right_col" role="main">
 
  <div class="x_panel">
    
    <div class="x_title">
      <h2>Contact <small>List</small></h2>
      <div class="clearfix"></div>
    </div>

    <div class="x_content">
      <table class="table table-bordered text-center">
        <thead>
          <tr>
        <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Message</th>
            <th>Date</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
       @foreach($messages as $message)
          <tr>
            <td>#{{ $message->id }}</td>
            <td>{{ $message->name }}</td>
            <td>{{ $message->email }}</td>
            <td>{{ Str::limit($message->message, 50) }}</td>
            <td>{{ $message->created_at->format('d M Y') }}</td>
            <td>
              <a href="{{ route('contactsshow', $message->id) }}" class="btn btn-sm btn-info">
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




