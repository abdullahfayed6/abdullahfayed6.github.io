<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Login | SnapFolio Control</title>
  
  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  
  <!-- CSS Vendor -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css" rel="stylesheet">
  
  <style>
    :root {
      --bg-color: #05060b;
      --card-bg: rgba(22, 26, 37, 0.45);
      --card-border: rgba(255, 255, 255, 0.06);
      --accent-color: #6366f1;
      --accent-hover: #4f46e5;
      --accent-glow: rgba(99, 102, 241, 0.25);
      --text-main: #f3f4f6;
      --text-muted: #9ca3af;
    }
    
    body {
      background-color: var(--bg-color);
      color: var(--text-main);
      font-family: 'Plus Jakarta Sans', sans-serif;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      overflow: hidden;
      position: relative;
    }
    
    /* Glowing blur blobs */
    .bg-blob {
      position: absolute;
      width: 450px;
      height: 450px;
      border-radius: 50%;
      background: radial-gradient(circle, var(--accent-glow) 0%, rgba(0,0,0,0) 70%);
      z-index: -1;
      filter: blur(60px);
      pointer-events: none;
    }
    .blob-1 { top: -100px; left: -100px; }
    .blob-2 { bottom: -150px; right: -150px; }
    
    .login-container {
      width: 100%;
      max-width: 420px;
      padding: 1rem;
    }
    
    .login-card {
      background: var(--card-bg);
      backdrop-filter: blur(20px);
      border: 1px solid var(--card-border);
      border-radius: 24px;
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
      padding: 2.5rem;
      position: relative;
    }
    
    .login-header {
      text-align: center;
      margin-bottom: 2rem;
    }
    
    .login-logo {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      width: 60px;
      height: 60px;
      border-radius: 16px;
      background: linear-gradient(135deg, #818cf8, var(--accent-color));
      color: white;
      font-size: 1.8rem;
      margin-bottom: 1.2rem;
      box-shadow: 0 8px 24px rgba(99, 102, 241, 0.4);
    }
    
    .login-title {
      font-size: 1.5rem;
      font-weight: 800;
      letter-spacing: -0.5px;
      margin-bottom: 0.25rem;
    }
    
    .login-subtitle {
      color: var(--text-muted);
      font-size: 0.9rem;
    }
    
    .form-label {
      color: var(--text-muted);
      font-weight: 500;
      font-size: 0.85rem;
      margin-bottom: 0.5rem;
    }
    
    .form-control {
      background-color: rgba(15, 18, 27, 0.6);
      border: 1px solid var(--card-border);
      color: var(--text-main);
      border-radius: 12px;
      padding: 0.8rem 1rem;
      transition: all 0.3s ease;
    }
    
    .form-control:focus {
      background-color: rgba(15, 18, 27, 0.8);
      border-color: var(--accent-color);
      color: var(--text-main);
      box-shadow: 0 0 12px var(--accent-glow);
    }
    
    .btn-login {
      background: linear-gradient(135deg, #818cf8, var(--accent-color));
      color: white;
      border: none;
      border-radius: 12px;
      padding: 0.8rem;
      font-weight: 700;
      width: 100%;
      transition: all 0.3s ease;
      box-shadow: 0 4px 15px rgba(99, 102, 241, 0.3);
      margin-top: 1rem;
    }
    
    .btn-login:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(99, 102, 241, 0.45);
    }
    
    .btn-login:active {
      transform: translateY(0);
    }
    
    .invalid-feedback {
      font-size: 0.8rem;
    }
  </style>
</head>
<body>

  <div class="bg-blob blob-1"></div>
  <div class="bg-blob blob-2"></div>

  <div class="login-container">
    <div class="login-card">
      <div class="login-header">
        <div class="login-logo">
          <i class="bi bi-cpu"></i>
        </div>
        <h2 class="login-title">Welcome back</h2>
        <p class="login-subtitle">Sign in to manage your portfolio</p>
      </div>

      <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="mb-3">
          <label for="email" class="form-label">Email Address</label>
          <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="admin@admin.com" required autocomplete="email" autofocus>
          @error('email')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="••••••••" required autocomplete="current-password">
          @error('password')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-4 d-flex justify-content-between align-items-center">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            <label class="form-check-label text-muted small" for="remember">
              Remember me
            </label>
          </div>
        </div>

        <button type="submit" class="btn btn-login">
          Sign In
        </button>
      </form>
    </div>
  </div>

  <!-- JS Vendor -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
