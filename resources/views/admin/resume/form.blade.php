@extends('layouts.admin')

@section('title', isset($item) ? 'Edit Resume Item' : 'Add Resume Item')
@section('page_title', isset($item) ? 'Edit Resume Item: ' . $item->title : 'Create Resume Item')

@section('content')
<div class="row g-4">
  <div class="col-lg-8">
    <div class="glass-card">
      <form action="{{ isset($item) ? route('admin.resume.update', $item->id) : route('admin.resume.store') }}" method="POST">
        @csrf
        @if(isset($item))
          @method('PUT')
        @endif

        <div class="row g-3 mb-4">
          <div class="col-md-6">
            <label for="section" class="form-label">Resume Section</label>
            <select class="form-select @error('section') is-invalid @enderror" id="section" name="section" required>
              <option value="" disabled selected>Select section...</option>
              <option value="experience" {{ old('section', $item->section ?? '') == 'experience' ? 'selected' : '' }}>Professional Experience</option>
              <option value="internship" {{ old('section', $item->section ?? '') == 'internship' ? 'selected' : '' }}>Internships / Training</option>
              <option value="education" {{ old('section', $item->section ?? '') == 'education' ? 'selected' : '' }}>Education</option>
              <option value="volunteering" {{ old('section', $item->section ?? '') == 'volunteering' ? 'selected' : '' }}>Volunteering</option>
            </select>
            @error('section') <div class="invalid-feedback">{{ $message }}</div> @enderror
          </div>

          <div class="col-md-6">
            <label for="order" class="form-label">Display Order / Priority</label>
            <input type="number" class="form-control @error('order') is-invalid @enderror" id="order" name="order" value="{{ old('order', $item->order ?? 1) }}" required min="0" placeholder="e.g. 1 (lower numbers display first)">
            @error('order') <div class="invalid-feedback">{{ $message }}</div> @enderror
          </div>
        </div>

        <div class="mb-4">
          <label for="title" class="form-label">Title / Degree / Role</label>
          <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $item->title ?? '') }}" required placeholder="e.g. Agentic AI Developer">
          @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="row g-3 mb-4">
          <div class="col-md-6">
            <label for="institution" class="form-label">Institution / Company Name</label>
            <input type="text" class="form-control @error('institution') is-invalid @enderror" id="institution" name="institution" value="{{ old('institution', $item->institution ?? '') }}" placeholder="e.g. AI MicroMind">
            @error('institution') <div class="invalid-feedback">{{ $message }}</div> @enderror
          </div>

          <div class="col-md-6">
            <label for="subtitle" class="form-label">Timeframe / Date Subtitle</label>
            <input type="text" class="form-control @error('subtitle') is-invalid @enderror" id="subtitle" name="subtitle" value="{{ old('subtitle', $item->subtitle ?? '') }}" placeholder="e.g. Nov 2025 - Present">
            @error('subtitle') <div class="invalid-feedback">{{ $message }}</div> @enderror
          </div>
        </div>

        <div class="mb-4">
          <label for="description" class="form-label">Detailed Description / Bullet Points</label>
          <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="6" placeholder="Write description or bullet points. Press Enter for new lines.">{{ old('description', $item->description ?? '') }}</textarea>
          @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
          <div class="form-text text-white-50">Linebreaks will be preserved on the public site. Use markdown asterisks for bolding details if needed (e.g. *Building LLM Apps*).</div>
        </div>

        <div class="d-flex gap-3 mt-4 pt-3 border-top border-secondary">
          <button type="submit" class="btn btn-indigo">
            <i class="bi bi-check-lg me-1"></i> {{ isset($item) ? 'Update Item' : 'Create Item' }}
          </button>
          <a href="{{ route('admin.resume.index') }}" class="btn btn-glass">Cancel</a>
        </div>
      </form>
    </div>
  </div>

  <div class="col-lg-4">
    <div class="glass-card">
      <h6 class="fw-bold mb-3">Resume Tips</h6>
      <ul class="small text-muted ps-3 mb-0">
        <li class="mb-2"><strong>Display Order</strong>: Controls sorting within a section. For example, order <code>1</code> appears above order <code>2</code>.</li>
        <li class="mb-2"><strong>Formatting</strong>: Linebreaks are translated to HTML break tags automatically. Keep sentences concise.</li>
        <li><strong>Live Update</strong>: When you click save, the changes are applied instantly on the public website layout.</li>
      </ul>
    </div>
  </div>
</div>
@endsection
