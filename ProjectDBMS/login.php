<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sign In — DevPath</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@300;400;500;700&family=Syne:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<style>
  *,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
  :root{
    --bg:#0D1117;--bg2:#161B22;--bg3:#21262D;
    --border:#30363D;--border2:#444C56;
    --text:#E6EDF3;--muted:#8B949E;--dim:#484F58;
    --blue:#58A6FF;--green:#3FB950;--yellow:#D29922;
    --purple:#BC8CFF;--orange:#F0883E;--red:#F85149;
    --cyan:#39D353;
    --font-mono:'JetBrains Mono',monospace;
    --font-sans:'Syne',sans-serif;
  }
  html{scroll-behavior:smooth}
  body{background:var(--bg);color:var(--text);font-family:var(--font-sans);line-height:1.6;overflow-x:hidden;min-height:100vh}

  /* NAV */
  nav{position:fixed;top:0;left:0;right:0;z-index:100;background:rgba(13,17,23,0.85);backdrop-filter:blur(12px);border-bottom:1px solid var(--border);padding:0 2rem;height:60px;display:flex;align-items:center;justify-content:space-between}
  .nav-logo{font-family:var(--font-mono);font-weight:700;font-size:1.15rem;color:var(--text);letter-spacing:-0.02em;text-decoration:none}
  .nav-logo span{color:var(--blue)}
  .nav-links{display:flex;gap:2rem;list-style:none}
  .nav-links a{color:var(--muted);text-decoration:none;font-size:0.875rem;font-family:var(--font-mono);transition:color 0.2s}
  .nav-links a:hover{color:var(--text)}
  .nav-cta{background:var(--blue);color:#0D1117;padding:0.45rem 1.1rem;border-radius:6px;font-size:0.85rem;font-family:var(--font-mono);font-weight:700;text-decoration:none;transition:opacity 0.2s;border:none;cursor:pointer}
  .nav-cta:hover{opacity:0.85}

  /* MAIN CONTENT */
  .auth-container{display:flex;align-items:center;justify-content:center;min-height:100vh;padding:6rem 2rem 2rem;position:relative;overflow:hidden}
  .auth-container::before{content:'';position:absolute;top:0;left:0;right:0;bottom:0;background:radial-gradient(ellipse 80% 50% at 50% -10%,rgba(88,166,255,0.08) 0%,transparent 60%);pointer-events:none}

  /* FORM CONTAINER */
  .form-box{background:var(--bg2);border:1px solid var(--border);border-radius:12px;padding:3rem;max-width:420px;width:100%;z-index:1;animation:fadeup 0.6s ease both}
  
  /* HEADER */
  .form-header{text-align:center;margin-bottom:3rem}
  .form-header .form-tag{display:inline-flex;align-items:center;gap:0.5rem;background:rgba(88,166,255,0.08);border:1px solid rgba(88,166,255,0.2);color:var(--blue);padding:0.3rem 0.9rem;border-radius:20px;font-family:var(--font-mono);font-size:0.75rem;margin-bottom:1rem;animation:fadeup 0.6s 0.1s ease both}
  .form-tag::before{content:'→';color:var(--green)}
  .form-header h1{font-size:1.8rem;font-weight:800;letter-spacing:-0.03em;margin-bottom:0.5rem;animation:fadeup 0.6s 0.2s ease both}
  .form-header p{color:var(--muted);font-family:var(--font-mono);font-size:0.9rem;animation:fadeup 0.6s 0.3s ease both}

  /* FORM GROUP */
  .form-group{margin-bottom:1.5rem;animation:fadeup 0.6s ease both}
  .form-label{display:block;font-family:var(--font-mono);font-size:0.8rem;color:var(--muted);margin-bottom:0.5rem;text-transform:uppercase;letter-spacing:0.05em;transition:color 0.2s}
  .form-input{width:100%;background:var(--bg3);border:1px solid var(--border);color:var(--text);padding:0.8rem 1rem;border-radius:8px;font-family:var(--font-sans);font-size:0.95rem;transition:border-color 0.3s cubic-bezier(0.4,0,0.2,1),box-shadow 0.3s cubic-bezier(0.4,0,0.2,1),background 0.2s;}
  .form-input:focus{outline:none;border-color:var(--blue);box-shadow:0 0 0 2px rgba(88,166,255,0.15);background:rgba(88,166,255,0.02)}
  .form-input:focus ~ .form-label,.form-input:valid ~ .form-label{color:var(--blue)}
  .form-input::placeholder{color:var(--dim)}

  /* CHECKBOX */
  .form-checkbox{display:flex;align-items:center;gap:0.6rem;font-family:var(--font-mono);font-size:0.8rem;margin-bottom:1.5rem;animation:fadeup 0.6s 0.25s ease both}
  .checkbox-input{width:18px;height:18px;border:1px solid var(--border);border-radius:4px;background:transparent;cursor:pointer;accent-color:var(--blue);transition:border-color 0.2s,box-shadow 0.2s}
  .checkbox-input:hover{border-color:var(--blue)}
  .checkbox-input:focus-visible{outline:none;box-shadow:0 0 0 2px rgba(88,166,255,0.2)}
  .form-checkbox label{cursor:pointer;color:var(--muted);transition:color 0.2s}
  .form-checkbox label:hover{color:var(--text)}
  .form-checkbox a{color:var(--blue);text-decoration:none;transition:color 0.2s}
  .form-checkbox a:hover{color:var(--cyan);text-decoration:underline}

  /* BUTTONS */
  .btn-submit{width:100%;background:var(--blue);color:#0D1117;padding:0.8rem 1.5rem;border:none;border-radius:8px;font-family:var(--font-mono);font-weight:700;font-size:0.9rem;cursor:pointer;transition:opacity 0.2s,transform 0.2s,box-shadow 0.2s;margin-bottom:1rem;animation:fadeup 0.6s 0.4s ease both;position:relative;overflow:hidden}
  .btn-submit::before{content:'';position:absolute;top:0;left:-100%;width:100%;height:100%;background:rgba(255,255,255,0.2);transition:left 0.3s ease}
  .btn-submit:hover{opacity:0.85;transform:translateY(-2px);box-shadow:0 8px 16px rgba(88,166,255,0.3)}
  .btn-submit:hover::before{left:100%}
  .btn-submit:active{transform:translateY(0)}

  /* DIVIDER */
  .divider{display:flex;align-items:center;gap:1rem;margin:2rem 0;animation:fadeup 0.6s 0.5s ease both}
  .divider-line{flex:1;height:1px;background:var(--border)}
  .divider-text{font-family:var(--font-mono);font-size:0.75rem;color:var(--muted);text-transform:uppercase;letter-spacing:0.05em}

  /* OAUTH */
  .oauth-buttons{display:grid;grid-template-columns:1fr 1fr;gap:1rem;margin-bottom:1.5rem;animation:fadeup 0.6s 0.6s ease both}
  .oauth-btn{background:var(--bg3);border:1px solid var(--border);color:var(--text);padding:0.8rem;border-radius:8px;font-family:var(--font-mono);font-size:0.85rem;cursor:pointer;transition:border-color 0.3s,background 0.3s,transform 0.2s;display:flex;align-items:center;justify-content:center;gap:0.5rem}
  .oauth-btn:hover{border-color:var(--blue);background:rgba(88,166,255,0.06);transform:translateY(-2px)}
  .oauth-btn:active{transform:translateY(0)}

  /* FOOTER */
  .form-footer{text-align:center;margin-top:2rem;animation:fadeup 0.6s 0.7s ease both}
  .form-footer p{font-family:var(--font-mono);font-size:0.8rem;color:var(--muted)}
  .form-footer a{color:var(--blue);text-decoration:none;transition:color 0.2s}
  .form-footer a:hover{color:var(--text)}

  /* ERROR/SUCCESS MESSAGES */
  .message{padding:0.75rem 1rem;border-radius:8px;font-family:var(--font-mono);font-size:0.85rem;margin-bottom:1.5rem;display:none;animation:slidedown 0.4s ease both}
  .message.error{background:rgba(248,81,73,0.1);border:1px solid rgba(248,81,73,0.3);color:var(--red)}
  .message.success{background:rgba(63,185,80,0.1);border:1px solid rgba(63,185,80,0.3);color:var(--green)}
  .message.show{display:block}

  /* ANIMATIONS */
  @keyframes fadeup{from{opacity:0;transform:translateY(20px)}to{opacity:1;transform:translateY(0)}}
  @keyframes slidedown{from{opacity:0;transform:translateY(-10px)}to{opacity:1;transform:translateY(0)}}
</style>
</head>
<body>

<!-- NAV -->
<nav>
  <a href="index.html" class="nav-logo">Dev<span>Path</span></a>
  <ul class="nav-links">
    <li><a href="index.html#features">Features</a></li>
    <li><a href="index.html#how">How it works</a></li>
    <li><a href="index.html#pricing">Pricing</a></li>
  </ul>
  <a href="signup.html" class="nav-cta">Sign Up →</a>
</nav>

<!-- AUTH FORM -->
<section class="auth-container">
  <div class="form-box">
    <div class="form-header">
      <div class="form-tag">Welcome back</div>
      <h1>Sign in to DevPath</h1>
      <p>Continue your learning journey and ship real products</p>
    </div>

    <div id="message" class="message"></div>
<form id="loginForm" action="login_process.php" method="POST">
      <div class="form-group">
        <label for="email" class="form-label">Email Address</label>
        <input type="email" id="email" name="email" class="form-input" placeholder="you@example.com" required>
      </div>

      <div class="form-group">
        <label for="password" class="form-label">Password</label>
        <input type="password" id="password" name="password" class="form-input" placeholder="••••••••" required>
      </div>

      <div class="form-checkbox">
        <input type="checkbox" id="remember" name="remember" class="checkbox-input">
        <label for="remember">Remember me</label>
      </div>

      <button type="submit" class="btn-submit">Sign in →</button>
    </form>

    <div class="divider">
      <div class="divider-line"></div>
      <div class="divider-text">Or continue with</div>
      <div class="divider-line"></div>
    </div>

    <div class="oauth-buttons">
      <button type="button" class="oauth-btn" onclick="handleOAuth('github')">GitHub</button>
      <button type="button" class="oauth-btn" onclick="handleOAuth('google')">Google</button>
    </div>

    <div class="form-footer">
      <p>Don't have an account? <a href="signup.html">Create one →</a></p>
      <p style="margin-top:0.75rem"><a href="#">Forgot your password?</a></p>
    </div>
  </div>
</section>

<script>
  document.getElementById('loginForm').addEventListener('submit', function(e) {
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    const messageEl = document.getElementById('message');

    if (email && password) {
      messageEl.className = 'message success show';
      messageEl.textContent = '✓ Sign in successful! Redirecting...';
      setTimeout(() => {
        window.location.href = 'index.html';
      }, 1500);
    }
  });

  function handleOAuth(provider) {
    const messageEl = document.getElementById('message');
    messageEl.className = 'message success show';
    messageEl.textContent = `✓ Redirecting to ${provider.toUpperCase()}...`;
  }
</script>
</body>
</html>
