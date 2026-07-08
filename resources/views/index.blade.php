<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>{{ $settings['meta_title'] ?? 'Abdullah Fayed | AI & ML Engineer Portfolio' }}</title>
  <meta name="description" content="{{ $settings['meta_description'] ?? '' }}">
  <meta name="keywords" content="{{ $settings['meta_keywords'] ?? '' }}">
  <meta property="og:title" content="{{ $settings['meta_title'] ?? 'Abdullah Fayed | AI & ML Engineer Portfolio' }}">
  <meta property="og:description" content="{{ $settings['meta_description'] ?? '' }}">
  <meta property="og:image" content="{{ asset('assets/img/profile/abdullah-profile-photo.webp') }}">
  <meta property="og:type" content="website">

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

  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-XLVE2F462R"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-XLVE2F462R');
  </script>
</head>

<body class="index-page">

  <header id="header" class="header dark-background d-flex flex-column justify-content-center">
    <i class="header-toggle d-xl-none bi bi-list"></i>

    <div class="header-container d-flex flex-column align-items-start">
      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#hero" class="active"><i class="bi bi-house navicon"></i>Home</a></li>
          <li><a href="#resume"><i class="bi bi-file-earmark-text navicon"></i> Resume</a></li>
          <li><a href="#portfolio"><i class="bi bi-grid-1x2 navicon"></i> Projects</a></li>
          <li><a href="#skills"><i class="bi bi-lightning-charge navicon"></i> Skills</a></li>
          <li><a href="#testimonials"><i class="bi bi-award navicon"></i> Achievements</a></li>
          <li><a href="#contact"><i class="bi bi-envelope navicon"></i> Contact</a></li>
        </ul>
      </nav>

      <div class="social-links text-center">
        <a href="{{ $settings['github'] ?? '#' }}" class="github" aria-label="GitHub" target="_blank"><i class="bi bi-github"></i></a>
        <a href="{{ $settings['linkedin'] ?? '#' }}" class="linkedin" aria-label="LinkedIn" target="_blank"><i class="bi bi-linkedin"></i></a>
        <a href="#contact" class="email" aria-label="Contact section"><i class="bi bi-envelope"></i></a>
      </div>

    </div>

  </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section">

      <div class="background-elements">
        <div class="bg-circle circle-1"></div>
        <div class="bg-circle circle-2"></div>
      </div>

      <div class="hero-content">

        <div class="container">
          <div class="row align-items-center">

            <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
              <div class="hero-text">
                <h1>{!! str_replace(' ', ' <span class="accent-text">', $settings['hero_title'] ?? 'Abdullah Fayed') !!}</span></h1>
                <h3>{{ $settings['hero_subtitle'] ?? 'Software Engineer & Agentic AI Developer' }}</h3>
                <p class="lead">I'm a <span class="typed" data-typed-items="{{ $settings['typed_items'] ?? 'Software Engineer, ML Researcher, Agentic AI Developer, Data Scientist' }}"></span></p>
                <div class="hero-summary">
                  {!! nl2br(e($settings['hero_summary'] ?? '')) !!}
                </div>

                <div class="hero-actions">
                  <a href="#portfolio" class="btn btn-primary">View Projects</a>
                  <a href="{{ asset($settings['cv_file'] ?? 'assets/resume/cv.pdf') }}" class="btn btn-outline" target="_blank">View Resume / CV</a>
                  <a href="#contact" class="btn btn-outline">Let's Collaborate</a>
                </div>

                <div class="social-links">
                  <a href="{{ $settings['github'] ?? '#' }}" aria-label="GitHub" target="_blank"><i class="bi bi-github"></i></a>
                  <a href="{{ $settings['linkedin'] ?? '#' }}" aria-label="LinkedIn" target="_blank"><i class="bi bi-linkedin"></i></a>
                  <a href="#contact" aria-label="Contact section"><i class="bi bi-envelope"></i></a>
                </div>
              </div>
            </div>

            <div class="col-lg-6" data-aos="fade-left" data-aos-delay="200">
              <div class="hero-visual">
                <div class="profile-container">
                  <div class="profile-background"></div>
                  <img src="{{ asset('assets/img/profile/abdullah-profile.jpg') }}" alt="Abdullah Fayed portrait" class="profile-image">
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>

    </section><!-- /Hero Section -->

    <!-- Resume Section -->
    <section id="resume" class="resume section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Resume</h2>
        <p>Highlights from recent AI, ML, and software engineering roles alongside academic progress.</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">
          <!-- Left column with summary and contact -->
          <div class="col-lg-4">
            <div class="resume-side" data-aos="fade-right" data-aos-delay="100">
              <div class="profile-img mb-4">
                <img src="{{ asset('assets/img/profile/abdullah-profile-photo.webp') }}" alt="Abdullah Fayed profile" class="img-fluid rounded">
              </div>

              <h3>Professional Summary</h3>
              <p>{{ $settings['about_summary'] ?? '' }}</p>

              <h3 class="mt-4">Contact Information</h3>
              <ul class="contact-info list-unstyled">
                <li><i class="bi bi-geo-alt"></i> {{ $settings['location'] ?? 'Cairo, Egypt' }}</li>
                <li><i class="bi bi-envelope"></i> {{ $settings['email'] ?? 'abdallahfayed@std.mans.edu.eg' }}</li>
                <li><i class="bi bi-phone"></i> {{ $settings['phone'] ?? '+20 1550930778' }}</li>
                <li><i class="bi bi-linkedin"></i> {{ str_replace(['https://', 'http://'], '', $settings['linkedin'] ?? '') }}</li>
              </ul>

              <div class="text-center mt-4">
                <a href="{{ asset($settings['cv_file'] ?? 'assets/resume/cv.pdf') }}" class="btn btn-outline btn-sm w-100" target="_blank">
                  <i class="bi bi-download me-2"></i> Download CV PDF
                </a>
              </div>
            </div>
          </div>

          <!-- Right column with experience and education -->
          <div class="col-lg-8 ps-4 ps-lg-5">
            
            <!-- Experience Section -->
            @if(isset($resume['experience']) && count($resume['experience']) > 0)
            <div class="resume-section" data-aos="fade-up">
              <h3><i class="bi bi-briefcase me-2"></i>Professional Experience</h3>
              @foreach($resume['experience'] as $item)
              <div class="resume-item">
                <h4>{{ $item->title }}</h4>
                <h5>{{ $item->subtitle }}</h5>
                <p class="company"><i class="bi bi-building"></i> {{ $item->institution }}</p>
                {!! nl2br(e($item->description)) !!}
              </div>
              @endforeach
            </div>
            @endif
            
            <!-- Internships Section -->
            @if(isset($resume['internship']) && count($resume['internship']) > 0)
            <div class="resume-section" data-aos="fade-up" data-aos-delay="50">
              <h3><i class="bi bi-mortarboard-fill me-2"></i>Internships / Training</h3>
              @foreach($resume['internship'] as $item)
              <div class="resume-item">
                <h4>{{ $item->title }}</h4>
                <h5>{{ $item->subtitle }}</h5>
                <p class="company"><i class="bi bi-building"></i> {{ $item->institution }}</p>
                {!! nl2br(e($item->description)) !!}
              </div>
              @endforeach
            </div>
            @endif

            <!-- Education Section -->
            @if(isset($resume['education']) && count($resume['education']) > 0)
            <div class="resume-section" data-aos="fade-up" data-aos-delay="100">
              <h3><i class="bi bi-mortarboard me-2"></i>Education</h3>
              @foreach($resume['education'] as $item)
              <div class="resume-item">
                <h4>{{ $item->title }}</h4>
                <h5>{{ $item->subtitle }}</h5>
                <p class="company"><i class="bi bi-building"></i> {{ $item->institution }}</p>
                {!! nl2br(e($item->description)) !!}
              </div>
              @endforeach
            </div>
            @endif

            <!-- Volunteering Section -->
            @if(isset($resume['volunteering']) && count($resume['volunteering']) > 0)
            <div class="resume-section" data-aos="fade-up" data-aos-delay="150">
              <h3><i class="bi bi-heart-fill me-2"></i>Volunteering</h3>
              @foreach($resume['volunteering'] as $item)
              <div class="resume-item">
                <h4>{{ $item->title }}</h4>
                <h5>{{ $item->subtitle }}</h5>
                <p class="company"><i class="bi bi-building"></i> {{ $item->institution }}</p>
                {!! nl2br(e($item->description)) !!}
              </div>
              @endforeach
            </div>
            @endif

          </div>
        </div>

      </div>

    </section><!-- /Resume Section -->

    <!-- Portfolio Section -->
    <section id="portfolio" class="portfolio section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Projects</h2>
        <p>Selected projects from LinkedIn profile highlighting AI systems, ML applications, and software engineering work.</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

          <div class="row">
            <div class="col-lg-3 filter-sidebar">
              <div class="filters-wrapper" data-aos="fade-right" data-aos-delay="150">
                <ul class="portfolio-filters isotope-filters">
                  <li data-filter="*" class="filter-active">All</li>
                  <li data-filter=".filter-ai">AI Platforms</li>
                  <li data-filter=".filter-ml">ML Apps</li>
                </ul>
              </div>
            </div>

            <div class="col-lg-9">
              <div class="row gy-4 portfolio-container isotope-container" data-aos="fade-up" data-aos-delay="200">

                @foreach($projects as $project)
                @php
                  $filterClass = 'filter-ai';
                  if (strtolower($project->category) == 'ml app' || strtolower($project->category) == 'ml apps') {
                    $filterClass = 'filter-ml';
                  }
                @endphp
                <div class="col-lg-6 col-md-6 portfolio-item isotope-item {{ $filterClass }}">
                  <div class="portfolio-wrap">
                    <img src="{{ asset($project->image) }}" class="img-fluid" alt="{{ $project->title }}" loading="lazy">
                    <div class="portfolio-info">
                      <div class="content">
                        <span class="category">{{ $project->category }}</span>
                        <h4>{{ $project->title }}</h4>
                        <p>{{ Str::limit($project->description, 100) }}</p>
                        <div class="portfolio-links">
                          <a href="{{ asset($project->image) }}" class="glightbox" title="{{ $project->title }}" data-glightbox="title: {{ $project->title }}; description: {{ $project->description }}"><i class="bi bi-plus-lg"></i></a>
                          <a href="{{ route('portfolio.details', $project->id) }}" title="More Details"><i class="bi bi-link-45deg"></i></a>
                          @if($project->github_url)
                          <a href="{{ $project->github_url }}" title="GitHub Repo" target="_blank" rel="noopener"><i class="bi bi-github"></i></a>
                          @endif
                        </div>
                      </div>
                    </div>
                  </div>
                </div><!-- End Portfolio Item -->
                @endforeach

              </div><!-- End Portfolio Container -->
            </div>
          </div>

        </div>

      </div>

    </section><!-- /Portfolio Section -->

    <!-- Skills Section -->
    <section id="skills" class="skills section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Skills</h2>
        <p>Core technologies, frameworks, and AI tooling I use to build scalable, production-ready systems.</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row g-4">
          @foreach($skills as $category => $categorySkills)
          <div class="col-lg-6">
            <div class="skills-category" data-aos="fade-up">
              <h3>{{ $category }}</h3>
              <ul class="skill-list">
                @foreach($categorySkills as $s)
                <li>{{ $s->name }}</li>
                @endforeach
              </ul>
            </div>
          </div>
          @endforeach
        </div>

      </div>

    </section><!-- /Skills Section -->

    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Achievements</h2>
        <p>Highlights from competitions and problem-solving milestones.</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="testimonial-masonry">

          @foreach($achievements as $ach)
          <div class="testimonial-item {{ $ach->is_highlighted ? 'highlight' : '' }}" data-aos="fade-up">
            <div class="testimonial-content">
              <div class="quote-pattern">
                <i class="bi bi-quote"></i>
              </div>
              <p>{{ $ach->description }}</p>
              <div class="client-info">
                <div class="client-details">
                  <h3>{{ $ach->title }}</h3>
                  <span class="position">{{ $ach->year }}</span>
                </div>
              </div>
            </div>
          </div>
          @endforeach

        </div>

      </div>

    </section><!-- /Testimonials Section -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Contact</h2>
        <p>Interested in collaborating or hiring? Let's talk about how I can help.</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row g-4 g-lg-5">
          <div class="col-lg-5">
            <div class="info-box">
              <h3>Contact Info</h3>
              <p>Reach out for AI product work, internships, or collaboration opportunities.</p>

              <div class="info-item">
                <div class="icon-box">
                  <i class="bi bi-geo-alt"></i>
                </div>
                <div class="content">
                  <h4>Location</h4>
                  <p>{{ $settings['location'] ?? 'Cairo, Egypt' }}</p>
                  <p>Open to remote opportunities</p>
                </div>
              </div>

              <div class="info-item">
                <div class="icon-box">
                  <i class="bi bi-telephone"></i>
                </div>
                <div class="content">
                  <h4>Phone Number</h4>
                  <p>{{ $settings['phone'] ?? '+20 1550930778' }}</p>
                  <p>WhatsApp available</p>
                </div>
              </div>

              <div class="info-item">
                <div class="icon-box">
                  <i class="bi bi-envelope"></i>
                </div>
                <div class="content">
                  <h4>Email Address</h4>
                  <p>{{ $settings['email'] ?? 'abdallahfayed@std.mans.edu.eg' }}</p>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-7">
            <div class="contact-form">
              <h3>Get In Touch</h3>
              <p>Tell me about your product goals, datasets, or research ideas.</p>

              @if(session('success'))
              <div class="alert alert-success border-0 bg-success text-white shadow-sm mb-4">
                <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
              </div>
              @endif

              <form action="{{ route('contact.submit') }}" method="post">
                @csrf
                <div class="row gy-4">
                  <div class="col-md-6">
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Your Name" value="{{ old('name') }}" required>
                    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                  </div>

                  <div class="col-md-6">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Your Email" value="{{ old('email') }}" required>
                    @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                  </div>

                  <div class="col-12">
                    <input type="text" class="form-control @error('subject') is-invalid @enderror" name="subject" placeholder="Subject" value="{{ old('subject') }}" required>
                    @error('subject') <div class="invalid-feedback">{{ $message }}</div> @enderror
                  </div>

                  <div class="col-12">
                    <textarea class="form-control @error('message') is-invalid @enderror" name="message" rows="6" placeholder="Message" required>{{ old('message') }}</textarea>
                    @error('message') <div class="invalid-feedback">{{ $message }}</div> @enderror
                  </div>

                  <div class="col-12 text-center">
                    <button type="submit" class="btn">Send Message</button>
                  </div>

                </div>
              </form>

            </div>
          </div>

        </div>

      </div>

    </section><!-- /Contact Section -->

  </main>

  <footer id="footer" class="footer position-relative">

    <div class="container">
      <div class="copyright text-center ">
        <p>© <span>Copyright</span> <strong class="px-1 sitename">{{ $settings['hero_title'] ?? 'Abdullah Fayed' }}</strong> <span>All Rights Reserved</span></p>
      </div>
    </div>

  </header>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('assets/vendor/typed.js/typed.umd.js') }}"></script>
  <script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="{{ asset('assets/vendor/waypoints/noframework.waypoints.js') }}"></script>
  <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

  <!-- Main JS File -->
  <script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>
