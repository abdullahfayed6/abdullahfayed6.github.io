@extends('layouts.admin')

@section('title', 'Manage Projects')
@section('page_title', 'Manage Projects')

@section('content')
<div class="glass-card">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="fw-bold mb-0">Project Directory</h5>
    <a href="{{ route('admin.projects.create') }}" class="btn btn-indigo d-flex align-items-center gap-2">
      <i class="bi bi-plus-lg"></i> Add New Project
    </a>
  </div>

  @if($projects->isEmpty())
  <div class="text-center py-5 text-muted">
    <i class="bi bi-folder2-open fs-1 mb-3 d-block"></i>
    <span>No projects in database. Create one to get started.</span>
  </div>
  @else
  <div class="table-responsive">
    <table class="table custom-table">
      <thead>
        <tr>
          <th>Preview</th>
          <th>Project Details</th>
          <th>Category</th>
          <th>Date</th>
          <th>Features</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach($projects as $project)
        <tr>
          <td style="width: 120px;">
            <img src="{{ asset($project->image) }}" alt="{{ $project->title }}" class="img-fluid rounded border border-white-5 border-opacity-10" style="max-height: 70px; width: 100%; object-fit: cover;">
          </td>
          <td>
            <h6 class="fw-bold text-white mb-1">{{ $project->title }}</h6>
            <div class="small text-muted">{{ Str::limit($project->description, 80) }}</div>
          </td>
          <td>
            <span class="badge-{{ strtolower($project->category) == 'ai platform' ? 'ai' : 'ml' }}">
              {{ $project->category }}
            </span>
          </td>
          <td>{{ $project->project_date ?? 'N/A' }}</td>
          <td>
            <span class="badge bg-secondary bg-opacity-20 text-white">
              {{ is_array($project->key_features) ? count($project->key_features) : 0 }} Features
            </span>
          </td>
          <td>
            <div class="d-flex gap-2">
              <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-sm btn-glass text-warning" title="Edit Project">
                <i class="bi bi-pencil"></i>
              </a>
              <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this project?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-glass text-danger" title="Delete Project">
                  <i class="bi bi-trash"></i>
                </button>
              </form>
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  @endif
</div>
@endsection
