@extends('layouts.admin')

@section('title', 'Manage Achievements')
@section('page_title', 'Manage Achievements')

@section('content')
<div class="glass-card">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="fw-bold mb-0">Achievements Directory</h5>
    <a href="{{ route('admin.achievements.create') }}" class="btn btn-indigo d-flex align-items-center gap-2">
      <i class="bi bi-plus-lg"></i> Add Achievement
    </a>
  </div>

  @if($achievements->isEmpty())
  <div class="text-center py-5 text-muted">
    <i class="bi bi-award fs-1 mb-3 d-block"></i>
    <span>No achievements added yet. Add items to show them on the homepage.</span>
  </div>
  @else
  <div class="table-responsive">
    <table class="table custom-table">
      <thead>
        <tr>
          <th>Highlight</th>
          <th>Title</th>
          <th>Year</th>
          <th>Description</th>
          <th style="width: 120px;">Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach($achievements as $ach)
        <tr>
          <td>
            @if($ach->is_highlighted)
            <span class="badge bg-warning bg-opacity-20 text-warning border border-warning border-opacity-30">Highlighted</span>
            @else
            <span class="text-muted small">Standard</span>
            @endif
          </td>
          <td class="fw-semibold text-white">{{ $ach->title }}</td>
          <td>
            <span class="badge bg-secondary bg-opacity-20 text-white">{{ $ach->year }}</span>
          </td>
          <td>
            <div class="text-truncate" style="max-width: 300px;" title="{{ $ach->description }}">
              {{ $ach->description }}
            </div>
          </td>
          <td>
            <div class="d-flex gap-2">
              <a href="{{ route('admin.achievements.edit', $ach->id) }}" class="btn btn-sm btn-glass text-warning" title="Edit Achievement">
                <i class="bi bi-pencil"></i>
              </a>
              <form action="{{ route('admin.achievements.destroy', $ach->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this achievement?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-glass text-danger" title="Delete Achievement">
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
