@extends('layouts.admin')

@section('title', 'Manage Skills')
@section('page_title', 'Manage Skills')

@section('content')
<div class="row g-4">
  <!-- Add Skill Form -->
  <div class="col-lg-4">
    <div class="glass-card">
      <h6 class="fw-bold mb-4">Add New Skill</h6>
      
      <form action="{{ route('admin.skills.store') }}" method="POST">
        @csrf
        <div class="mb-3">
          <label for="category" class="form-label">Skill Category</label>
          <select class="form-select @error('category') is-invalid @enderror" id="category" name="category" required>
            <option value="" disabled selected>Select category...</option>
            <option value="Languages">Languages</option>
            <option value="AI Frameworks & Libraries">AI Frameworks & Libraries</option>
            <option value="Tools & Platforms">Tools & Platforms</option>
            <option value="Concepts">Concepts</option>
          </select>
          @error('category') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-4">
          <label for="name" class="form-label">Skill Name</label>
          <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="e.g. PyTorch" required>
          @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn btn-indigo w-100">
          <i class="bi bi-plus-lg me-1"></i> Add Skill
        </button>
      </form>
    </div>
  </div>

  <!-- Skills Listing -->
  <div class="col-lg-8">
    <div class="glass-card">
      <h6 class="fw-bold mb-4">Skills Directory</h6>

      @if($skills->isEmpty())
      <div class="text-center py-5 text-muted">
        <i class="bi bi-lightning fs-1 mb-3 d-block"></i>
        <span>No skills added yet. Add one to see it on the homepage.</span>
      </div>
      @else
      <div class="row g-4">
        @foreach($skills as $category => $categorySkills)
        <div class="col-md-6">
          <div class="p-3 rounded border border-white-5 border-opacity-10" style="background: rgba(0,0,0,0.15); min-height: 100%;">
            <h6 class="fw-bold text-white mb-3 pb-2 border-bottom border-secondary d-flex justify-content-between align-items-center">
              <span>{{ $category }}</span>
              <span class="badge bg-secondary bg-opacity-20 text-white-50 small">{{ count($categorySkills) }}</span>
            </h6>
            
            <div class="d-flex flex-wrap gap-2">
              @foreach($categorySkills as $s)
              <div class="d-inline-flex align-items-center gap-2 px-3 py-1.5 rounded" style="background: rgba(255,255,255,0.04); border: 1px solid var(--card-border);">
                <span class="text-white-50">{{ $s->name }}</span>
                <form action="{{ route('admin.skills.destroy', $s->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this skill?');">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-link p-0 text-danger border-0 d-flex align-items-center" style="font-size: 0.85rem;" title="Delete">
                    <i class="bi bi-x-circle-fill"></i>
                  </button>
                </form>
              </div>
              @endforeach
            </div>
          </div>
        </div>
        @endforeach
      </div>
      @endif
    </div>
  </div>
</div>
@endsection
