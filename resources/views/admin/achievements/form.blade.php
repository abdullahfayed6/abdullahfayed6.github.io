@extends('layouts.admin')

@section('title', isset($achievement) ? 'Edit Achievement' : 'Add Achievement')
@section('page_title', isset($achievement) ? 'Edit Achievement' : 'Create Achievement')

@section('content')
<div class="row g-4">
  <div class="col-lg-8">
    <div class="glass-card">
      <form action="{{ isset($achievement) ? route('admin.achievements.update', $achievement->id) : route('admin.achievements.store') }}" method="POST">
        @csrf
        @if(isset($achievement))
          @method('PUT')
        @endif

        <div class="row g-3 mb-4">
          <div class="col-md-9">
            <label for="title" class="form-label">Achievement Title / Citation</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $achievement->title ?? '') }}" required placeholder="e.g. Top 50 in Huawei Developer Competition 2025">
            @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
          </div>

          <div class="col-md-3">
            <label for="year" class="form-label">Year</label>
            <input type="text" class="form-control @error('year') is-invalid @enderror" id="year" name="year" value="{{ old('year', $achievement->year ?? date('Y')) }}" required placeholder="e.g. 2025">
            @error('year') <div class="invalid-feedback">{{ $message }}</div> @enderror
          </div>
        </div>

        <div class="mb-4">
          <label for="description" class="form-label">Description / Details</label>
          <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="5" required placeholder="Describe the achievement in details...">{{ old('description', $achievement->description ?? '') }}</textarea>
          @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-4">
          <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" role="switch" id="is_highlighted" name="is_highlighted" value="1" {{ old('is_highlighted', $achievement->is_highlighted ?? false) ? 'checked' : '' }}>
            <label class="form-check-label text-white-50" for="is_highlighted">Highlight Achievement (different layout style/glow on public site)</label>
          </div>
        </div>

        <div class="d-flex gap-3 mt-4 pt-3 border-top border-secondary">
          <button type="submit" class="btn btn-indigo">
            <i class="bi bi-check-lg me-1"></i> {{ isset($achievement) ? 'Update Achievement' : 'Create Achievement' }}
          </button>
          <a href="{{ route('admin.achievements.index') }}" class="btn btn-glass">Cancel</a>
        </div>
      </form>
    </div>
  </div>

  <div class="col-lg-4">
    <div class="glass-card">
      <h6 class="fw-bold mb-3">Achievement Guide</h6>
      <ul class="small text-muted ps-3 mb-0">
        <li class="mb-2"><strong>Highlight Option</strong>: Highly recommended for key achievements like Codeforces specialist rank or high placement in hackathons. Shows with an extra visual focus on the portfolio index.</li>
        <li class="mb-2"><strong>Timeline Year</strong>: Displays as a subtitle under the achievement title.</li>
        <li><strong>Updates</strong>: Applied instantly on the public website layout.</li>
      </ul>
    </div>
  </div>
</div>
@endsection
