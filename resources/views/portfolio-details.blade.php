<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>{{ $project->title }} | Project Details</title>
  <meta name="description" content="{{ Str::limit($project->description, 150) }}">

  <!-- Favicons -->
  <link href="{{ asset('assets/img/profile/abdullah-profile-photo.webp') }}" rel="icon">
  <link href="{{ asset('assets/img/profile/abdullah-profile-photo.webp') }}" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
</head>

<body class="portfolio-details-page">

  <header id="header" class="header dark-background d-flex flex-column justify-content-center">
    <i class="header-toggle d-xl-none bi bi-list"></i>

    <div class="header-container d-flex flex-column align-items-start">
      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="{{ route('home') }}#hero"><i class="bi bi-house navicon"></i>Home</a></li>
          <li><a href="{{ route('home') }}#resume"><i class="bi bi-file-earmark-text navicon"></i> Resume</a></li>
          <li><a href="{{ route('home') }}#portfolio"><i class="bi bi-grid-1x2 navicon"></i> Projects</a></li>
          <li><a href="{{ route('home') }}#skills"><i class="bi bi-lightning-charge navicon"></i> Skills</a></li>
          <li><a href="{{ route('home') }}#testimonials"><i class="bi bi-award navicon"></i> Achievements</a></li>
          <li><a href="{{ route('home') }}#contact"><i class="bi bi-envelope navicon"></i> Contact</a></li>
        </ul>
      </nav>
    </div>

  </header>

  <main class="main">

    <!-- Page Title -->
    <div class="page-title dark-background">
      <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0">Project Details</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="{{ route('home') }}">Home</a></li>
            <li class="current">Project Details</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- Portfolio Details Section -->
    <section id="portfolio-details" class="portfolio-details section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-8">
            <div class="portfolio-details-slider swiper init-swiper">

              <script type="application/json" class="swiper-config">
                {
                  "loop": true,
                  "speed": 600,
                  "autoplay": {
                    "delay": 5000
                  },
                  "slidesPerView": "auto",
                  "pagination": {
                    "el": ".swiper-pagination",
                    "type": "bullets",
                    "clickable": true
                  }
                }
              </script>

              <div class="swiper-wrapper align-items-center">
                <div class="swiper-slide">
                  <img src="{{ asset($project->image) }}" alt="{{ $project->title }}" class="img-fluid" loading="lazy">
                </div>
              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="portfolio-info" data-aos="fade-left" data-aos-delay="200">
              <h3>Project Information</h3>
              <ul>
                <li><strong>Category</strong>: {{ $project->category }}</li>
                <li><strong>Role</strong>: {{ $project->role ?? 'N/A' }}</li>
                <li><strong>Project date</strong>: {{ $project->project_date ?? 'N/A' }}</li>
                @if($project->project_url)
                <li><strong>Project URL</strong>: <a href="{{ $project->project_url }}" target="_blank" rel="noopener">{{ str_replace(['https://', 'http://'], '', $project->project_url) }}</a></li>
                @endif
                @if($project->github_url)
                <li><strong>GitHub Repo</strong>: <a href="{{ $project->github_url }}" target="_blank" rel="noopener">{{ str_replace(['https://', 'http://'], '', $project->github_url) }}</a></li>
                @endif
              </ul>
            </div>
          </div>

          <div class="col-lg-12">
            <div class="portfolio-description" data-aos="fade-up" data-aos-delay="300">
              <h2>Project Overview</h2>
              <p>
                {{ $project->description }}
              </p>

              @if($project->key_features && is_array($project->key_features) && count($project->key_features) > 0)
              <div class="features mt-4">
                <h3>Key Features</h3>
                <div class="row gy-3">
                  @foreach($project->key_features as $feature)
                  <div class="col-md-6">
                    <div class="feature-item" data-aos="fade-up">
                      <i class="bi {{ $feature['icon'] ?? 'bi-check-circle-fill' }}"></i>
                      <h4>{{ $feature['title'] ?? '' }}</h4>
                      <p>{{ $feature['description'] ?? '' }}</p>
                    </div>
                  </div>
                  @endforeach
                </div>
              </div>
              @endif
            </div>
          </div>

        </div>

      </div>

    </section><!-- /Portfolio Details Section -->

  </main>

  <footer id="footer" class="footer position-relative">

    <div class="container">
      <div class="copyright text-center ">
        <p>© <span>Copyright</span> <strong class="px-1 sitename">Abdullah Fayed</strong> <span>All Rights Reserved</span></p>
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

  <!-- Main JS File -->
  <script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>
