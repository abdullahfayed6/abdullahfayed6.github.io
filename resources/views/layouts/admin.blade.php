<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Admin Dashboard') | {{ $settings['hero_title'] ?? 'Abdullah Fayed' }} Control</title>
  
  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  
  <!-- CSS Vendor -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css" rel="stylesheet">
  
  <!-- Premium Dark Glassmorphism Styling -->
  <style>
    :root {
      --bg-color: #0b0c10;
      --card-bg: rgba(22, 26, 37, 0.65);
      --card-border: rgba(255, 255, 255, 0.08);
      --accent-color: #4f46e5;
      --accent-hover: #4338ca;
      --accent-glow: rgba(79, 70, 229, 0.3);
      --text-main: #f3f4f6;
      --text-muted: #a1a1aa; /* brighter than default for better contrast */
      --sidebar-width: 260px;
    }
    
    body {
      background-color: var(--bg-color);
      color: var(--text-main);
      font-family: 'Plus Jakarta Sans', sans-serif;
      min-height: 100vh;
      overflow-x: hidden;
      position: relative;
    }
    
    /* Background decorative blobs */
    .bg-blob {
      position: fixed;
      width: 400px;
      height: 400px;
      border-radius: 50%;
      background: radial-gradient(circle, var(--accent-glow) 0%, rgba(0,0,0,0) 70%);
      z-index: -1;
      filter: blur(50px);
      pointer-events: none;
    }
    .blob-1 { top: -100px; right: -100px; }
    .blob-2 { bottom: -150px; left: -150px; }
    
    /* Sidebar */
    .admin-sidebar {
      width: var(--sidebar-width);
      height: 100vh;
      position: fixed;
      left: 0;
      top: 0;
      background: rgba(15, 18, 27, 0.95);
      backdrop-filter: blur(12px);
      border-right: 1px solid var(--card-border);
      z-index: 100;
      padding: 1.5rem 1rem;
      display: flex;
      flex-direction: column;
    }
    
    .sidebar-brand {
      font-size: 1.25rem;
      font-weight: 800;
      letter-spacing: -0.5px;
      color: var(--text-main);
      text-decoration: none;
      display: flex;
      align-items: center;
      gap: 10px;
      margin-bottom: 2.5rem;
      padding-left: 0.5rem;
    }
    
    .sidebar-brand span {
      background: linear-gradient(135deg, #818cf8, var(--accent-color));
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }
    
    .sidebar-menu {
      list-style: none;
      padding: 0;
      margin: 0;
      display: flex;
      flex-direction: column;
      gap: 8px;
    }
    
    .sidebar-link {
      display: flex;
      align-items: center;
      gap: 12px;
      padding: 0.8rem 1rem;
      color: var(--text-muted);
      text-decoration: none;
      border-radius: 12px;
      font-weight: 500;
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    .sidebar-link i {
      font-size: 1.2rem;
    }
    
    .sidebar-link:hover {
      color: #ffffff;
      background: rgba(255, 255, 255, 0.06);
    }
    
    .sidebar-link.active {
      color: #ffffff;
      background: var(--accent-color);
      box-shadow: 0 4px 20px var(--accent-glow);
    }
    
    .sidebar-footer {
      margin-top: auto;
      border-top: 1px solid var(--card-border);
      padding-top: 1.5rem;
    }
    
    /* Content Wrapper */
    .admin-wrapper {
      margin-left: var(--sidebar-width);
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }
    
    .admin-navbar {
      height: 70px;
      border-bottom: 1px solid var(--card-border);
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0 2rem;
      background: rgba(11, 12, 16, 0.5);
      backdrop-filter: blur(8px);
    }
    
    .admin-content {
      padding: 2rem;
      flex: 1;
    }
    
    /* Premium Glassmorphism Cards */
    .glass-card {
      background: var(--card-bg);
      backdrop-filter: blur(16px);
      border: 1px solid var(--card-border);
      border-radius: 18px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
      padding: 1.8rem;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    
    .glass-card:hover {
      box-shadow: 0 15px 35px rgba(79, 70, 229, 0.05);
    }
    
    /* Tables styling */
    .table-responsive {
      border-radius: 12px;
      overflow: hidden;
      border: 1px solid var(--card-border);
    }
    
    .custom-table {
      margin-bottom: 0;
      color: var(--text-main);
      background-color: transparent !important;
    }
    
    .custom-table th {
      background-color: rgba(255, 255, 255, 0.03) !important;
      color: var(--text-muted);
      font-weight: 600;
      text-transform: uppercase;
      font-size: 0.75rem;
      letter-spacing: 0.5px;
      padding: 1rem 1.5rem;
      border-bottom: 1px solid var(--card-border);
    }
    
    .custom-table td {
      padding: 1.2rem 1.5rem;
      border-bottom: 1px solid var(--card-border);
      vertical-align: middle;
      background-color: transparent !important;
    }
    
    .custom-table tr:last-child td {
      border-bottom: none;
    }
    
    /* Buttons */
    .btn-indigo {
      background-color: var(--accent-color);
      color: white;
      border: none;
      border-radius: 10px;
      padding: 0.6rem 1.2rem;
      font-weight: 600;
      transition: all 0.3s ease;
    }
    
    .btn-indigo:hover {
      background-color: var(--accent-hover);
      color: white;
      box-shadow: 0 0 15px var(--accent-glow);
    }
    
    .btn-glass {
      background: rgba(255, 255, 255, 0.05);
      border: 1px solid var(--card-border);
      color: var(--text-main);
      border-radius: 10px;
      padding: 0.6rem 1.2rem;
      font-weight: 600;
      transition: all 0.3s ease;
    }
    
    .btn-glass:hover {
      background: rgba(255, 255, 255, 0.1);
      color: white;
    }
    
    /* Inputs */
    .form-control, .form-select {
      background-color: rgba(15, 18, 27, 0.6);
      border: 1px solid var(--card-border);
      color: var(--text-main);
      border-radius: 10px;
      padding: 0.75rem 1rem;
      transition: all 0.3s ease;
    }
    
    .form-control:focus, .form-select:focus {
      background-color: rgba(15, 18, 27, 0.8);
      border-color: var(--accent-color);
      color: var(--text-main);
      box-shadow: 0 0 10px var(--accent-glow);
    }
    
    .form-label {
      color: #d1d5db; /* high contrast form labels */
      font-weight: 500;
      margin-bottom: 0.5rem;
    }
    
    /* Alerts */
    .alert-glass {
      background: rgba(16, 185, 129, 0.15);
      border: 1px solid rgba(16, 185, 129, 0.3);
      color: #34d399;
      border-radius: 12px;
    }

    /* Category Badges with full high-contrast visibility */
    .badge-ai {
      background-color: rgba(79, 70, 229, 0.2) !important;
      color: #a5b4fc !important;
      border: 1px solid rgba(79, 70, 229, 0.4);
      padding: 0.4rem 0.8rem;
      border-radius: 6px;
      font-weight: 600;
      font-size: 0.75rem;
    }

    .badge-ml {
      background-color: rgba(16, 185, 129, 0.2) !important;
      color: #6ee7b7 !important;
      border: 1px solid rgba(16, 185, 129, 0.4);
      padding: 0.4rem 0.8rem;
      border-radius: 6px;
      font-weight: 600;
      font-size: 0.75rem;
    }

    /* High-contrast Nav tabs styling */
    .nav-tabs .nav-link {
      color: #a1a1aa !important;
      font-weight: 600;
      border: none !important;
      border-bottom: 3px solid transparent !important;
      padding: 0.8rem 1.2rem;
      transition: all 0.2s ease;
      background: transparent !important;
    }
    
    .nav-tabs .nav-link:hover {
      color: #ffffff !important;
      border-bottom: 3px solid rgba(255, 255, 255, 0.2) !important;
    }
    
    .nav-tabs .nav-link.active {
      color: #ffffff !important;
      border-bottom: 3px solid var(--accent-color) !important;
      background: transparent !important;
    }
  </style>
  @yield('styles')
</head>
<body>

  <div class="bg-blob blob-1"></div>
  <div class="bg-blob blob-2"></div>

  <!-- Sidebar -->
  <aside class="admin-sidebar">
    <a href="{{ route('admin.dashboard') }}" class="sidebar-brand">
      <i class="bi bi-cpu"></i> <span>Abdullah Fayed</span>
    </a>
    
    <ul class="sidebar-menu">
      <li>
        <a href="{{ route('admin.dashboard') }}" class="sidebar-link {{ Route::is('admin.dashboard') ? 'active' : '' }}">
          <i class="bi bi-speedometer2"></i> Dashboard
        </a>
      </li>
      <li>
        <a href="{{ route('admin.projects.index') }}" class="sidebar-link {{ Route::is('admin.projects.*') ? 'active' : '' }}">
          <i class="bi bi-grid-1x2"></i> Projects
        </a>
      </li>
      <li>
        <a href="{{ route('admin.skills.index') }}" class="sidebar-link {{ Route::is('admin.skills.*') ? 'active' : '' }}">
          <i class="bi bi-lightning-charge"></i> Skills
        </a>
      </li>
      <li>
        <a href="{{ route('admin.resume.index') }}" class="sidebar-link {{ Route::is('admin.resume.*') ? 'active' : '' }}">
          <i class="bi bi-file-earmark-text"></i> Resume Items
        </a>
      </li>
      <li>
        <a href="{{ route('admin.achievements.index') }}" class="sidebar-link {{ Route::is('admin.achievements.*') ? 'active' : '' }}">
          <i class="bi bi-award"></i> Achievements
        </a>
      </li>
      <li>
        <a href="{{ route('admin.settings.edit') }}" class="sidebar-link {{ Route::is('admin.settings.*') ? 'active' : '' }}">
          <i class="bi bi-sliders"></i> Site Settings
        </a>
      </li>
      <li>
        <a href="{{ route('admin.messages.index') }}" class="sidebar-link {{ Route::is('admin.messages.*') ? 'active' : '' }}">
          <i class="bi bi-envelope"></i> Messages
        </a>
      </li>
    </ul>
    
    <div class="sidebar-footer">
      <div class="d-flex align-items-center justify-content-between">
        <div>
          <div class="small text-white-50">Logged in as</div>
          <div class="fw-bold">{{ Auth::user()->name }}</div>
        </div>
        <form action="{{ route('logout') }}" method="POST" id="logout-form">
          @csrf
          <button type="submit" class="btn btn-sm btn-outline-danger border-0" title="Logout">
            <i class="bi bi-box-arrow-right fs-5"></i>
          </button>
        </form>
      </div>
    </div>
  </aside>

  <!-- Content -->
  <div class="admin-wrapper">
    <header class="admin-navbar">
      <h5 class="mb-0 fw-bold">@yield('page_title', 'Dashboard')</h5>
      <div class="d-flex align-items-center gap-3">
        <a href="{{ route('home') }}" target="_blank" class="btn btn-sm btn-glass d-flex align-items-center gap-2">
          <i class="bi bi-eye"></i> View Live Site
        </a>
      </div>
    </header>
    
    <main class="admin-content">
      @if(session('success'))
      <div class="alert alert-glass alert-dismissible fade show d-flex align-items-center gap-2 mb-4" role="alert">
        <i class="bi bi-check-circle-fill"></i>
        <div>{{ session('success') }}</div>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif
      
      @yield('content')
    </main>
  </div>

  <!-- JavaScript Vendor -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  @yield('scripts')
</body>
</html>
