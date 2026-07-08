@extends('layouts.admin')

@section('title', 'Site Settings')
@section('page_title', 'Website Site Settings')

@section('content')
<div class="glass-card">
  <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="d-flex justify-content-between align-items-center mb-4 pb-3 border-bottom border-secondary">
      <h5 class="fw-bold mb-0">Control System Parameters</h5>
      <button type="submit" class="btn btn-indigo d-flex align-items-center gap-2">
        <i class="bi bi-save"></i> Save Changes
      </button>
    </div>

    <!-- Navigation Tabs -->
    <ul class="nav nav-tabs border-secondary mb-4" id="settingsTab" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active bg-transparent text-white border-0 border-bottom border-primary border-3" id="general-tab" data-bs-toggle="tab" data-bs-target="#general" type="button" role="tab" aria-controls="general" aria-selected="true">
          <i class="bi bi-person me-2"></i>General / Hero
        </button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link bg-transparent text-muted border-0" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">
          <i class="bi bi-telephone me-2"></i>Contact & Socials
        </button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link bg-transparent text-muted border-0" id="seo-tab" data-bs-toggle="tab" data-bs-target="#seo" type="button" role="tab" aria-controls="seo" aria-selected="false">
          <i class="bi bi-search me-2"></i>SEO / Metadata
        </button>
      </li>
    </ul>

    <!-- Tab Content -->
    <div class="tab-content" id="settingsTabContent">
      
      <!-- General Tab -->
      <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">
        <div class="row g-3 mb-4">
          <div class="col-md-6">
            <label for="hero_title" class="form-label">Hero Title</label>
            <input type="text" class="form-control" id="hero_title" name="hero_title" value="{{ old('hero_title', $settings['hero_title'] ?? '') }}" required>
          </div>
          <div class="col-md-6">
            <label for="hero_subtitle" class="form-label">Hero Subtitle</label>
            <input type="text" class="form-control" id="hero_subtitle" name="hero_subtitle" value="{{ old('hero_subtitle', $settings['hero_subtitle'] ?? '') }}" required>
          </div>
        </div>

        <div class="mb-4">
          <label for="cv_file" class="form-label">CV / Resume PDF File</label>
          <input type="file" class="form-control" id="cv_file" name="cv_file" accept=".pdf">
          @if(!empty($settings['cv_file']))
            <div class="form-text text-success mt-2">
              <i class="bi bi-filetype-pdf text-danger me-1"></i> Current CV: 
              <a href="{{ asset($settings['cv_file']) }}" target="_blank" class="text-success text-decoration-underline fw-semibold">
                {{ basename($settings['cv_file']) }}
              </a>
            </div>
          @endif
        </div>

        <div class="mb-4">
          <label for="typed_items" class="form-label">Hero Typing Animation Items (Comma-separated)</label>
          <input type="text" class="form-control" id="typed_items" name="typed_items" value="{{ old('typed_items', $settings['typed_items'] ?? '') }}" required placeholder="e.g. Software Engineer, ML Researcher, Agentic AI Developer">
          <div class="form-text text-white-50">These words will animate typing inside the main hero header under your title. Separate items with a comma and space.</div>
        </div>

        <div class="mb-4">
          <label for="hero_summary" class="form-label">Hero Detailed Summary</label>
          <textarea class="form-control" id="hero_summary" name="hero_summary" rows="5" required>{{ old('hero_summary', $settings['hero_summary'] ?? '') }}</textarea>
          <div class="form-text text-white-50">This displays next to your portrait inside the main Hero section. HTML markup is stripped but linebreaks are preserved.</div>
        </div>

        <div class="mb-4">
          <label for="about_summary" class="form-label">Professional Summary (About / Resume)</label>
          <textarea class="form-control" id="about_summary" name="about_summary" rows="5" required>{{ old('about_summary', $settings['about_summary'] ?? '') }}</textarea>
          <div class="form-text text-white-50">This displays in the sidebar of your Resume section.</div>
        </div>
      </div>

      <!-- Contact Tab -->
      <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
        <div class="row g-3 mb-4">
          <div class="col-md-6">
            <label for="phone" class="form-label">Phone Number</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $settings['phone'] ?? '') }}" required>
          </div>
          <div class="col-md-6">
            <label for="email" class="form-label">Contact Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $settings['email'] ?? '') }}" required>
          </div>
        </div>

        <div class="row g-3 mb-4">
          <div class="col-md-6">
            <label for="location" class="form-label">Office / Residence Location</label>
            <input type="text" class="form-control" id="location" name="location" value="{{ old('location', $settings['location'] ?? '') }}" required>
          </div>
        </div>

        <div class="row g-3 mb-4">
          <div class="col-md-6">
            <label for="linkedin" class="form-label">LinkedIn Profile URL</label>
            <input type="url" class="form-control" id="linkedin" name="linkedin" value="{{ old('linkedin', $settings['linkedin'] ?? '') }}">
          </div>
          <div class="col-md-6">
            <label for="github" class="form-label">GitHub Account URL</label>
            <input type="url" class="form-control" id="github" name="github" value="{{ old('github', $settings['github'] ?? '') }}">
          </div>
        </div>
      </div>

      <!-- SEO Tab -->
      <div class="tab-pane fade" id="seo" role="tabpanel" aria-labelledby="seo-tab">
        <div class="mb-4">
          <label for="meta_title" class="form-label">Meta Title Tag</label>
          <input type="text" class="form-control" id="meta_title" name="meta_title" value="{{ old('meta_title', $settings['meta_title'] ?? '') }}" required>
          <div class="form-text text-white-50">Appears in Google search results and browser tab. Recommended length: 50-60 characters.</div>
        </div>

        <div class="mb-4">
          <label for="meta_description" class="form-label">Meta Description</label>
          <textarea class="form-control" id="meta_description" name="meta_description" rows="3" required>{{ old('meta_description', $settings['meta_description'] ?? '') }}</textarea>
          <div class="form-text text-white-50">Snippet summarized below your URL in search indices. Recommended length: 150-160 characters.</div>
        </div>

        <div class="mb-4">
          <label for="meta_keywords" class="form-label">Meta Keywords</label>
          <input type="text" class="form-control" id="meta_keywords" name="meta_keywords" value="{{ old('meta_keywords', $settings['meta_keywords'] ?? '') }}" required>
          <div class="form-text text-white-50">Comma-separated keywords (e.g. <code>AI engineer, RAG, machine learning</code>).</div>
        </div>
      </div>

    </div>

    <div class="mt-4 pt-3 border-top border-secondary">
      <button type="submit" class="btn btn-indigo">
        <i class="bi bi-save me-1"></i> Save All Settings
      </button>
    </div>
  </form>
</div>
@endsection

@section('scripts')
<script>
  // Script to change styling on tab active
  const triggerTabList = document.querySelectorAll('#settingsTab button');
  triggerTabList.forEach(triggerEl => {
    triggerEl.addEventListener('click', event => {
      event.preventDefault();
      
      // Reset active styles from all buttons
      triggerTabList.forEach(btn => {
        btn.classList.add('text-muted');
        btn.classList.remove('text-white', 'border-primary', 'border-bottom', 'border-3');
      });
      
      // Add active styles to clicked button
      event.target.classList.remove('text-muted');
      event.target.classList.add('text-white', 'border-primary', 'border-bottom', 'border-3');
    });
  });
</script>
@endsection
