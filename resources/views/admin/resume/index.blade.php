@extends('layouts.admin')

@section('title', 'Manage Resume')
@section('page_title', 'Manage Resume Items')

@section('content')
<div class="glass-card">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="fw-bold mb-0">Resume Directory</h5>
    <a href="{{ route('admin.resume.create') }}" class="btn btn-indigo d-flex align-items-center gap-2">
      <i class="bi bi-plus-lg"></i> Add Resume Item
    </a>
  </div>

  @if($resumeItems->isEmpty())
  <div class="text-center py-5 text-muted">
    <i class="bi bi-file-earmark-text fs-1 mb-3 d-block"></i>
    <span>No resume items added yet. Add items to build your resume.</span>
  </div>
  @else
    @foreach($resumeItems as $section => $items)
    <div class="mb-5">
      <h6 class="text-white fw-bold mb-3 pb-2 border-bottom border-secondary d-flex align-items-center gap-2">
        <i class="bi bi-folder-fill text-primary"></i>
        <span>{{ ucfirst($section) }}</span>
        <span class="badge bg-secondary bg-opacity-20 text-white-50 ms-2 small">{{ count($items) }} Items</span>
      </h6>
      
      <div class="table-responsive mb-4">
        <table class="table custom-table">
          <thead>
            <tr>
              <th style="width: 80px;">Order</th>
              <th>Title / Position</th>
              <th>Institution / Company</th>
              <th>Timeline</th>
              <th>Description</th>
              <th style="width: 120px;">Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach($items as $item)
            <tr>
              <td>
                <span class="badge bg-dark border border-white-5 text-white-50 px-2.5 py-1.5">{{ $item->order }}</span>
              </td>
              <td class="fw-semibold text-white">{{ $item->title }}</td>
              <td>{{ $item->institution ?? 'N/A' }}</td>
              <td class="text-white-50">{{ $item->subtitle ?? 'N/A' }}</td>
              <td>
                <div class="text-truncate" style="max-width: 250px;" title="{{ $item->description }}">
                  {{ $item->description }}
                </div>
              </td>
              <td>
                <div class="d-flex gap-2">
                  <a href="{{ route('admin.resume.edit', $item->id) }}" class="btn btn-sm btn-glass text-warning" title="Edit Item">
                    <i class="bi bi-pencil"></i>
                  </a>
                  <form action="{{ route('admin.resume.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this resume item?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-glass text-danger" title="Delete Item">
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
    </div>
    @endforeach
  @endif
</div>
@endsection
