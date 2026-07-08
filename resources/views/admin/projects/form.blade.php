@extends('layouts.admin')

@section('title', isset($project) ? 'Edit Project' : 'Add Project')
@section('page_title', isset($project) ? 'Edit Project: ' . $project->title : 'Create New Project')

@section('content')
<div class="row g-4">
  <div class="col-lg-8">
    <div class="glass-card">
      <form action="{{ isset($project) ? route('admin.projects.update', $project->id) : route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($project))
          @method('PUT')
        @endif

        <div class="row g-3 mb-4">
          <div class="col-md-6">
            <label for="title" class="form-label">Project Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $project->title ?? '') }}" required placeholder="e.g. MentorLink">
            @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
          </div>

          <div class="col-md-6">
            <label for="category" class="form-label">Category</label>
            <select class="form-select @error('category') is-invalid @enderror" id="category" name="category" required>
              <option value="" disabled selected>Select category...</option>
              <option value="AI Platform" {{ old('category', $project->category ?? '') == 'AI Platform' ? 'selected' : '' }}>AI Platform</option>
              <option value="ML App" {{ old('category', $project->category ?? '') == 'ML App' ? 'selected' : '' }}>ML App</option>
            </select>
            @error('category') <div class="invalid-feedback">{{ $message }}</div> @enderror
          </div>
        </div>

        <div class="row g-3 mb-4">
          <div class="col-md-6">
            <label for="role" class="form-label">Role / Contributions</label>
            <input type="text" class="form-control @error('role') is-invalid @enderror" id="role" name="role" value="{{ old('role', $project->role ?? '') }}" placeholder="e.g. AI Backend & RAG Engineering">
            @error('role') <div class="invalid-feedback">{{ $message }}</div> @enderror
          </div>

          <div class="col-md-6">
            <label for="project_date" class="form-label">Project Timeline</label>
            <input type="text" class="form-control @error('project_date') is-invalid @enderror" id="project_date" name="project_date" value="{{ old('project_date', $project->project_date ?? '') }}" placeholder="e.g. Jul 2025 - Sept 2025">
            @error('project_date') <div class="invalid-feedback">{{ $message }}</div> @enderror
          </div>
        </div>

        <div class="row g-3 mb-4">
          <div class="col-md-6">
            <label for="github_url" class="form-label">GitHub Repository URL</label>
            <input type="url" class="form-control @error('github_url') is-invalid @enderror" id="github_url" name="github_url" value="{{ old('github_url', $project->github_url ?? '') }}" placeholder="https://github.com/...">
            @error('github_url') <div class="invalid-feedback">{{ $message }}</div> @enderror
          </div>

          <div class="col-md-6">
            <label for="project_url" class="form-label">Live Project URL</label>
            <input type="url" class="form-control @error('project_url') is-invalid @enderror" id="project_url" name="project_url" value="{{ old('project_url', $project->project_url ?? '') }}" placeholder="https://...">
            @error('project_url') <div class="invalid-feedback">{{ $message }}</div> @enderror
          </div>
        </div>

        <div class="mb-4">
          <label for="description" class="form-label">Detailed Description</label>
          <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="5" placeholder="Write a thorough summary of your project..." required>{{ old('description', $project->description ?? '') }}</textarea>
          @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <!-- Project Image Input -->
        <div class="mb-4">
          <label for="image" class="form-label">Project Image / Mockup</label>
          <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*" {{ isset($project) ? '' : 'required' }}>
          <div class="form-text text-white-50">Upload a crisp project screenshot (webp, png, jpg). Recommended size: 800x600px.</div>
          @error('image') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <!-- Key Features Dynamic Fields -->
        <div class="mb-4">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <label class="form-label mb-0 text-white fw-bold">Project Key Features</label>
            <button type="button" class="btn btn-sm btn-glass text-primary" onclick="addFeature()">
              <i class="bi bi-plus-lg me-1"></i> Add Feature
            </button>
          </div>

          <div id="features-container">
            @php
              $features = old('features', isset($project) ? ($project->key_features ?? []) : []);
              
              // Common icon options helper
              $iconOptions = [
                'bi-check-circle-fill' => '✓ Check Circle',
                'bi-gear' => '⚙ Gear / Process',
                'bi-shield-check' => '🛡 Shield / Security',
                'bi-graph-up' => '📈 Graph / Growth',
                'bi-cpu' => '💻 CPU / AI processing',
                'bi-lightning-charge' => '⚡ Lightning / Speed',
                'bi-code-slash' => '💻 Code / Development',
                'bi-database' => '🗄 Database',
                'bi-robot' => '🤖 Robot / Agents',
                'bi-chat-right-dots' => '💬 Chat / LLMs',
                'bi-search' => '🔍 Search / RAG',
                'bi-award' => '🏆 Award / Milestone',
                'bi-file-earmark-text' => '📄 Document / Contract'
              ];
            @endphp

            @if(count($features) > 0)
              @foreach($features as $idx => $feature)
              @php $selectedIcon = $feature['icon'] ?? 'bi-check-circle-fill'; @endphp
              <div class="feature-row border border-white-5 border-opacity-10 p-3 rounded mb-3 position-relative" style="background: rgba(0,0,0,0.15);">
                <button type="button" class="btn btn-sm btn-outline-danger border-0 position-absolute end-0 top-0 m-2" onclick="removeFeature(this)">
                  <i class="bi bi-x-lg"></i>
                </button>
                <div class="row g-3">
                  <div class="col-md-5">
                    <label class="form-label small">Feature Icon</label>
                    <div class="d-flex align-items-center gap-3">
                      <select name="features[{{ $idx }}][icon]" class="form-select form-select-sm" onchange="updateIconPreview(this)">
                        @foreach($iconOptions as $val => $label)
                          <option value="{{ $val }}" {{ $selectedIcon == $val ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                      </select>
                      <div class="p-2 rounded bg-dark border border-white-5 d-flex align-items-center justify-content-center" style="width: 38px; height: 38px;">
                        <i class="bi {{ $selectedIcon }} text-primary fs-5 icon-preview"></i>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-7">
                    <label class="form-label small">Feature Title</label>
                    <input type="text" name="features[{{ $idx }}][title]" class="form-control form-control-sm" value="{{ $feature['title'] ?? '' }}" placeholder="RAG Recommendations" required>
                  </div>
                  <div class="col-12">
                    <label class="form-label small">Feature Description</label>
                    <textarea name="features[{{ $idx }}][description]" class="form-control form-control-sm" rows="2" placeholder="Explain the key details..." required>{{ $feature['description'] ?? '' }}</textarea>
                  </div>
                </div>
              </div>
              @endforeach
            @else
              <div class="text-center py-3 text-muted border border-dashed rounded mb-3" id="no-features-text">
                No key features added yet. Click "Add Feature" to describe dynamic components.
              </div>
            @endif
          </div>
        </div>

        <div class="d-flex gap-3 mt-4 pt-3 border-top border-secondary">
          <button type="submit" class="btn btn-indigo">
            <i class="bi bi-check-lg me-1"></i> {{ isset($project) ? 'Update Project' : 'Create Project' }}
          </button>
          <a href="{{ route('admin.projects.index') }}" class="btn btn-glass">Cancel</a>
        </div>
      </form>
    </div>
  </div>

  <div class="col-lg-4">
    <!-- Image Preview Card -->
    <div class="glass-card mb-4 text-center">
      <h6 class="fw-bold mb-3 text-start">Image Preview</h6>
      @if(isset($project) && $project->image)
      <img src="{{ asset($project->image) }}" id="preview-img" class="img-fluid rounded border border-white-5 border-opacity-10" style="max-height: 250px; object-fit: cover;">
      @else
      <div class="py-5 text-muted border border-dashed rounded d-flex flex-column align-items-center justify-content-center" id="preview-placeholder" style="height: 200px;">
        <i class="bi bi-image fs-1 mb-2"></i>
        <span>No image selected</span>
      </div>
      <img src="" id="preview-img" class="img-fluid rounded border border-white-5 border-opacity-10 d-none" style="max-height: 250px; object-fit: cover;">
      @endif
    </div>

    <!-- Instructions / Tips Card -->
    <div class="glass-card">
      <h6 class="fw-bold mb-3">Form Helper</h6>
      <ul class="small text-muted ps-3 mb-0">
        <li class="mb-2"><strong>Category</strong>: Controls which tab filters the project on the landing page.</li>
        <li class="mb-2"><strong>Timeline</strong>: Specify the start/end month and year.</li>
        <li class="mb-2"><strong>Icon Dropdown</strong>: Select an icon describing your technology or category. The icon shapes are previewed directly next to the selector box.</li>
        <li><strong>Dynamic</strong>: Updates are immediate on your homepage. Make sure details are accurate before submitting!</li>
      </ul>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script>
  // Image preview script
  document.getElementById('image').addEventListener('change', function(e) {
    const reader = new FileReader();
    reader.onload = function() {
      const preview = document.getElementById('preview-img');
      const placeholder = document.getElementById('preview-placeholder');
      
      preview.src = reader.result;
      preview.classList.remove('d-none');
      if (placeholder) placeholder.classList.add('d-none');
    }
    if (e.target.files[0]) {
      reader.readAsDataURL(e.target.files[0]);
    }
  });

  // Dynamic Icon Preview
  function updateIconPreview(select) {
    const container = select.parentElement;
    const preview = container.querySelector('.icon-preview');
    if (preview) {
      preview.className = `bi ${select.value} text-primary fs-5 icon-preview`;
    }
  }

  // Key Features dynamic row adding/removing
  let featureCounter = {{ isset($project) && is_array($project->key_features) ? count($project->key_features) : 0 }};

  function addFeature() {
    const container = document.getElementById('features-container');
    const placeholder = document.getElementById('no-features-text');
    if (placeholder) placeholder.remove();

    const row = document.createElement('div');
    row.className = 'feature-row border border-white-5 border-opacity-10 p-3 rounded mb-3 position-relative';
    row.style.background = 'rgba(0,0,0,0.15)';
    row.innerHTML = `
      <button type="button" class="btn btn-sm btn-outline-danger border-0 position-absolute end-0 top-0 m-2" onclick="removeFeature(this)">
        <i class="bi bi-x-lg"></i>
      </button>
      <div class="row g-3">
        <div class="col-md-5">
          <label class="form-label small">Feature Icon</label>
          <div class="d-flex align-items-center gap-3">
            <select name="features[${featureCounter}][icon]" class="form-select form-select-sm" onchange="updateIconPreview(this)">
              <option value="bi-check-circle-fill">✓ Check Circle</option>
              <option value="bi-gear">⚙ Gear / Process</option>
              <option value="bi-shield-check">🛡 Shield / Security</option>
              <option value="bi-graph-up">📈 Graph / Growth</option>
              <option value="bi-cpu">💻 CPU / AI processing</option>
              <option value="bi-lightning-charge">⚡ Lightning / Speed</option>
              <option value="bi-code-slash">💻 Code / Development</option>
              <option value="bi-database">🗄 Database</option>
              <option value="bi-robot">🤖 Robot / Agents</option>
              <option value="bi-chat-right-dots">💬 Chat / LLMs</option>
              <option value="bi-search">🔍 Search / RAG</option>
              <option value="bi-award">🏆 Award / Milestone</option>
              <option value="bi-file-earmark-text">📄 Document / Contract</option>
            </select>
            <div class="p-2 rounded bg-dark border border-white-5 d-flex align-items-center justify-content-center" style="width: 38px; height: 38px;">
              <i class="bi bi-check-circle-fill text-primary fs-5 icon-preview"></i>
            </div>
          </div>
        </div>
        <div class="col-md-7">
          <label class="form-label small">Feature Title</label>
          <input type="text" name="features[${featureCounter}][title]" class="form-control form-control-sm" placeholder="RAG Recommendations" required>
        </div>
        <div class="col-12">
          <label class="form-label small">Feature Description</label>
          <textarea name="features[${featureCounter}][description]" class="form-control form-control-sm" rows="2" placeholder="Explain the key details..." required></textarea>
        </div>
      </div>
    `;
    container.appendChild(row);
    featureCounter++;
  }

  function removeFeature(btn) {
    btn.closest('.feature-row').remove();
    const container = document.getElementById('features-container');
    if (container.children.length === 0) {
      container.innerHTML = `
        <div class="text-center py-3 text-muted border border-dashed rounded mb-3" id="no-features-text">
          No key features added yet. Click "Add Feature" to describe dynamic components.
        </div>
      `;
    }
  }
</script>
@endsection
