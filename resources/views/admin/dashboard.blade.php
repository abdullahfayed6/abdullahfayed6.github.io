@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page_title', 'Dashboard Overview')

@section('content')
<div class="row g-4 mb-5">
  <!-- Projects Stat Card -->
  <div class="col-md-6 col-lg-4">
    <div class="glass-card d-flex align-items-center justify-content-between">
      <div>
        <span class="text-muted d-block mb-1">Total Projects</span>
        <h2 class="fw-bold mb-0 text-white">{{ $projectsCount }}</h2>
      </div>
      <div class="fs-1 text-primary bg-primary bg-opacity-10 rounded p-3 d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
        <i class="bi bi-grid-1x2"></i>
      </div>
    </div>
  </div>

  <!-- Messages Stat Card -->
  <div class="col-md-6 col-lg-4">
    <div class="glass-card d-flex align-items-center justify-content-between">
      <div>
        <span class="text-muted d-block mb-1">Unread Messages</span>
        <h2 class="fw-bold mb-0 text-white">{{ $messagesCount }}</h2>
      </div>
      <div class="fs-1 text-success bg-success bg-opacity-10 rounded p-3 d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
        <i class="bi bi-envelope"></i>
      </div>
    </div>
  </div>

  <!-- Quick Settings Card -->
  <div class="col-md-6 col-lg-4">
    <div class="glass-card d-flex align-items-center justify-content-between">
      <div>
        <span class="text-muted d-block mb-1">Quick Actions</span>
        <a href="{{ route('admin.projects.create') }}" class="btn btn-sm btn-indigo mt-1">
          <i class="bi bi-plus-lg me-1"></i> Add Project
        </a>
      </div>
      <div class="fs-1 text-warning bg-opacity-10 rounded p-3 d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
        <i class="bi bi-lightning"></i>
      </div>
    </div>
  </div>
</div>

<div class="row g-4">
  <!-- Recent Messages Section -->
  <div class="col-lg-8">
    <div class="glass-card h-100">
      <div class="d-flex justify-content-between align-items-center mb-4">
        <h5 class="fw-bold mb-0">Recent Contact Messages</h5>
        <a href="{{ route('admin.messages.index') }}" class="btn btn-sm btn-glass text-primary">View All</a>
      </div>
      
      @if($recentMessages->isEmpty())
      <div class="text-center py-5 text-muted">
        <i class="bi bi-envelope-open fs-2 mb-3 d-block"></i>
        <span>No messages received yet.</span>
      </div>
      @else
      <div class="table-responsive">
        <table class="table custom-table">
          <thead>
            <tr>
              <th>From</th>
              <th>Subject</th>
              <th>Received</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($recentMessages as $msg)
            <tr>
              <td>
                <div class="fw-semibold text-white">{{ $msg->name }}</div>
                <div class="small text-muted">{{ $msg->email }}</div>
              </td>
              <td>{{ $msg->subject }}</td>
              <td>{{ $msg->created_at->diffForHumans() }}</td>
              <td>
                <button type="button" class="btn btn-sm btn-glass text-info" data-bs-toggle="modal" data-bs-target="#messageModal{{ $msg->id }}" title="Read Message">
                  <i class="bi bi-eye"></i>
                </button>
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
  </div>

  <!-- System Information Section -->
  <div class="col-lg-4">
    <div class="glass-card h-100">
      <h5 class="fw-bold mb-4">System Information</h5>
      
      <ul class="list-unstyled mb-0">
        <li class="d-flex justify-content-between py-2 border-bottom border-white-5 border-opacity-10">
          <span class="text-muted">Laravel Version</span>
          <span class="text-white fw-semibold">12.63.0</span>
        </li>
        <li class="d-flex justify-content-between py-2 border-bottom border-white-5 border-opacity-10">
          <span class="text-muted">PHP Version</span>
          <span class="text-white fw-semibold">{{ PHP_VERSION }}</span>
        </li>
        <li class="d-flex justify-content-between py-2 border-bottom border-white-5 border-opacity-10">
          <span class="text-muted">Database Connection</span>
          <span class="text-white fw-semibold">SQLite</span>
        </li>
        <li class="d-flex justify-content-between py-2">
          <span class="text-muted">Environment</span>
          <span class="badge bg-success bg-opacity-20 text-success align-self-center">Local</span>
        </li>
      </ul>
      
      <div class="mt-4 p-3 rounded border border-warning border-opacity-20 bg-warning bg-opacity-5">
        <div class="d-flex gap-2">
          <i class="bi bi-info-circle text-warning fs-5"></i>
          <div>
            <h6 class="text-warning fw-semibold mb-1">Dynamic Site Controls</h6>
            <p class="small text-muted mb-0">Changes made here are applied instantly to your public portfolio site. Update the resume settings or upload new projects to keep it fresh!</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
