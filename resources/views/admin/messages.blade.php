@extends('layouts.admin')

@section('title', 'Contact Messages')
@section('page_title', 'Contact Messages')

@section('content')
<div class="glass-card">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="fw-bold mb-0">Messages Directory</h5>
  </div>

  @if($messages->isEmpty())
  <div class="text-center py-5 text-muted">
    <i class="bi bi-envelope-open fs-1 mb-3 d-block"></i>
    <span>No messages received yet.</span>
  </div>
  @else
  <div class="table-responsive">
    <table class="table custom-table">
      <thead>
        <tr>
          <th>Sender</th>
          <th>Subject</th>
          <th>Message Content</th>
          <th>Received At</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($messages as $msg)
        <tr>
          <td>
            <div class="fw-semibold text-white">{{ $msg->name }}</div>
            <div class="small"><a href="mailto:{{ $msg->email }}" class="text-primary">{{ $msg->email }}</a></div>
          </td>
          <td class="fw-semibold text-white-50">{{ $msg->subject }}</td>
          <td>
            <div class="text-truncate" style="max-width: 300px;">
              {{ $msg->message }}
            </div>
          </td>
          <td>{{ $msg->created_at->format('M d, Y h:i A') }} ({{ $msg->created_at->diffForHumans() }})</td>
          <td>
            <div class="d-flex gap-2">
              <button type="button" class="btn btn-sm btn-glass text-info" data-bs-toggle="modal" data-bs-target="#messageModal{{ $msg->id }}" title="Read Message">
                <i class="bi bi-eye"></i>
              </button>
              <form action="{{ route('admin.messages.destroy', $msg->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this message?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-glass text-danger" title="Delete Message">
                  <i class="bi bi-trash"></i>
                </button>
              </form>
            </div>
          </td>
        </tr>

        <!-- Message Detail Modal -->
        <div class="modal fade" id="messageModal{{ $msg->id }}" tabindex="-1" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0" style="background: #161a25; color: #f3f4f6;">
              <div class="modal-header border-bottom border-secondary">
                <h5 class="modal-title fw-bold">Message Details</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="mb-3">
                  <label class="text-muted small d-block">From</label>
                  <strong class="text-white">{{ $msg->name }}</strong> (<a href="mailto:{{ $msg->email }}" class="text-primary">{{ $msg->email }}</a>)
                </div>
                <div class="mb-3">
                  <label class="text-muted small d-block">Subject</label>
                  <span class="text-white fw-medium">{{ $msg->subject }}</span>
                </div>
                <div class="mb-3">
                  <label class="text-muted small d-block">Received At</label>
                  <span class="text-white-50">{{ $msg->created_at->format('M d, Y h:i A') }}</span>
                </div>
                <div class="mb-3 p-3 rounded" style="background: rgba(0,0,0,0.2);">
                  <label class="text-muted small d-block mb-1">Message Content</label>
                  <div style="white-space: pre-line;">{{ $msg->message }}</div>
                </div>
              </div>
              <div class="modal-footer border-top border-secondary">
                <button type="button" class="btn btn-glass" data-bs-dismiss="modal">Close</button>
                <form action="{{ route('admin.messages.destroy', $msg->id) }}" method="POST" class="d-inline">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger">Delete Message</button>
                </form>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </tbody>
    </table>
  </div>
  @endif
</div>
@endsection
