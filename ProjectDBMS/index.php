<?php
session_start();
include 'db.php';

$user_name = $_SESSION['user'];

$sql = "SELECT * FROM users
WHERE first_name='$user_name'";

$result = mysqli_query($conn, $sql);

$user = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>DevPath — Learn by Building. Ship Something Real.</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@300;400;500;700&family=Syne:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="styles.css">
</head>
<body>

<!-- NAV -->
<nav>
  <a href="index.php" class="nav-logo">Dev<span>Path</span></a>
  <ul class="nav-links">
    <li><a href="#features">Features</a></li>
    <li><a href="#how">How it works</a></li>
    <li><a href="#pricing">Pricing</a></li>
  </ul>
 <div class="nav-auth">

<?php
if(isset($_SESSION['user'])){
?>

<a href="profile.php" style="text-decoration:none;">

<?php
if(!empty($user['profile_image'])){
?>

<img src="uploads/<?php echo $user['profile_image']; ?>"
class="nav-profile-img">

<?php
}
else{
?>

<div class="avatar">
<?php echo strtoupper(substr($_SESSION['user'],0,1)); ?>
</div>

<?php
}
?>

</a>

<a href="logout.php" class="nav-signup">
Logout
</a>

<?php
}
else{
?>

<a href="login.php" class="nav-signin">Sign In</a>
<a href="signup.php" class="nav-signup">Sign Up</a>

<?php
}
?>

</div>
</nav>

<!-- HERO -->
<section class="hero">
  <div>
    <div class="hero-tag">Learn by Building. Ship Something Real.</div>
    <h1>Code is not enough.<br><span class="line2">Ship something.</span></h1>
    <p>DevPath is an AI-augmented learning platform that replaces passive video courses with real product delivery — every lesson ends with a shipped artefact.</p>
    <div class="hero-btns">
      <a href="signup.php" class="btn-primary">Start building free</a>
      <a href="#features" class="btn-ghost">See how it works</a>
    </div>
    <div class="terminal">
      <div class="terminal-top">
        <div class="dot dot-r"></div>
        <div class="dot dot-y"></div>
        <div class="dot dot-g"></div>
        <span class="terminal-title">devpath — learning engine</span>
      </div>
      <div class="terminal-body">
        <div><span class="t-muted">$</span> <span class="t-green">devpath</span> <span class="t-blue">init</span> <span class="t-white">"TaskFlow AI"</span></div>
        <div>&nbsp;&nbsp;<span class="t-muted">▶ Generating learning path from blueprint...</span></div>
        <div>&nbsp;&nbsp;<span class="t-green">✓</span> <span class="t-white">4 milestones mapped to 4 lessons</span></div>
        <div>&nbsp;&nbsp;<span class="t-green">✓</span> <span class="t-white">Kanban board initialised (12 tasks, 5 locked)</span></div>
        <div>&nbsp;&nbsp;<span class="t-green">✓</span> <span class="t-white">Team workspace created for Team Pixel</span></div>
        <div>&nbsp;&nbsp;<span class="t-yellow">⚡</span> <span class="t-white">Skill gate active: complete </span><span class="t-purple">REST API Design</span><span class="t-white"> to unlock next 3 tasks</span></div>
        <div><span class="t-muted">$</span> <span class="cursor"></span></div>
      </div>
    </div>
  </div>
</section>

<!-- STATS -->
<div class="stats">
  <div class="stat"><div class="stat-n"><span>7</span> entities</div><div class="stat-l">in the core schema</div></div>
  <div class="stat"><div class="stat-n"><span>3</span> tiers</div><div class="stat-l">Starter · Pro · Team</div></div>
  <div class="stat"><div class="stat-n">BCNF</div><div class="stat-l">normalized database</div></div>
  <div class="stat"><div class="stat-n"><span>100%</span></div><div class="stat-l">DB-layer rule enforcement</div></div>
</div>

<!-- FEATURES -->
<section id="features">
  <div class="container">
    <div class="section-tag reveal">Features</div>
    <h2 class="section-title reveal">Built different,<br>on purpose.</h2>
    <p class="section-sub reveal">Every design decision is aimed at one outcome: you ship a real product, not a tutorial.</p>
    <div class="features-grid reveal">
      <div class="feature-card">
        <div class="feat-icon blue">⚡</div>
        <h3>AI Learning Paths</h3>
        <p>AI generates a project-scoped curriculum for your specific product idea. No generic syllabus — your lessons are tied to your Kanban tasks.</p>
      </div>
      <div class="feature-card">
        <div class="feat-icon green">🔒</div>
        <h3>Skill-Gated Kanban</h3>
        <p>Tasks are locked until you complete the prerequisite lesson and score ≥ 70 on the AI evaluation. The DB trigger fires — no bypass possible.</p>
      </div>
      <div class="feature-card">
        <div class="feat-icon yellow">🤖</div>
        <h3>AI Code Evaluation</h3>
        <p>Submit code to the AI evaluator and receive a structured score + actionable feedback. A score ≥ 70 triggers the skill gate and unlocks your next task.</p>
      </div>
      <div class="feature-card">
        <div class="feat-icon purple">👥</div>
        <h3>Team Workspaces</h3>
        <p>Create a team of 2–4 developers with role assignments (lead, backend, frontend, devops). One shared Kanban board, one product, shipped together.</p>
      </div>
      <div class="feature-card">
        <div class="feat-icon blue">🚀</div>
        <h3>Ship It Milestones</h3>
        <p>When all Kanban tasks are marked done, the project auto-transitions to "Shipped". Your portfolio gets a case study, not a certificate.</p>
      </div>
      <div class="feature-card">
        <div class="feat-icon green">📐</div>
        <h3>Blueprint Engine</h3>
        <p>AI-generated project blueprints provide a curated tech stack recommendation before your first line of code. Scope is defined before learning begins.</p>
      </div>
    </div>
  </div>
</section>

<!-- SKILL GATE VISUAL -->
<section style="background:var(--bg2);padding:4rem 2rem;border-top:1px solid var(--border);border-bottom:1px solid var(--border)">
  <div class="container" style="display:grid;grid-template-columns:1fr 1fr;gap:4rem;align-items:center">
    <div class="reveal">
      <div class="section-tag">The core mechanic</div>
      <h2 class="section-title" style="font-size:2rem">The skill gate.</h2>
      <p class="section-sub">Your Kanban board is not just a task list. Every card is a locked capability. To unlock it, you must learn — and prove it with a passing AI score.</p>
      <p class="section-sub" style="margin-top:1rem">This is enforced at the database layer via a MySQL AFTER INSERT trigger. No application-layer workaround possible.</p>
    </div>
    <div class="skill-gate reveal">
      <div class="sg-row">
        <span class="sg-pill pill-done">DONE</span>
        <span class="sg-name">Design REST API endpoints</span>
        <span class="sg-req">lesson 1 passed ✓</span>
      </div>
      <div class="sg-row">
        <span class="sg-pill pill-done">DONE</span>
        <span class="sg-name">Build PostgreSQL schema</span>
        <span class="sg-req">lesson 2 passed ✓</span>
      </div>
      <div class="sg-row">
        <span class="sg-pill pill-active">IN PROGRESS</span>
        <span class="sg-name">Implement React components</span>
        <span class="sg-req">lesson 3 → score 82 ✓</span>
      </div>
      <div class="sg-row">
        <span class="sg-pill pill-locked">LOCKED</span>
        <span class="sg-name">Add JWT authentication</span>
        <span class="sg-req">complete lesson 4 first</span>
      </div>
      <div class="sg-row">
        <span class="sg-pill pill-locked">LOCKED</span>
        <span class="sg-name">Deploy to Vercel + Supabase</span>
        <span class="sg-req">all tasks done first</span>
      </div>
    </div>
  </div>
</section>

<!-- HOW IT WORKS -->
<section id="how">
  <div class="container">
    <div class="section-tag reveal">How it works</div>
    <h2 class="section-title reveal">From idea to shipped in four steps.</h2>
    <div class="steps reveal">
      <div class="step">
        <div class="step-bar"></div>
        <div class="step-num">01 / BLUEPRINT</div>
        <h3>Describe your project</h3>
        <p>Tell DevPath what you want to build. The AI blueprint engine generates a tech stack recommendation and a structured project specification.</p>
      </div>
      <div class="step">
        <div class="step-bar"></div>
        <div class="step-num">02 / LEARN</div>
        <h3>Complete gated lessons</h3>
        <p>Your AI-generated learning path maps each lesson to a Kanban task. Submit code, pass the AI evaluator, unlock the next task.</p>
      </div>
      <div class="step">
        <div class="step-bar"></div>
        <div class="step-num">03 / BUILD</div>
        <h3>Work the Kanban board</h3>
        <p>Skill-gated tasks reveal themselves as you learn. Solo or with a team of up to 4 — one board, one product, real accountability.</p>
      </div>
      <div class="step">
        <div class="step-bar"></div>
        <div class="step-num">04 / SHIP</div>
        <h3>Earn a Ship It milestone</h3>
        <p>All tasks done? The project status flips to Shipped automatically. Your portfolio gains a case study. No certificate. A product.</p>
      </div>
    </div>
  </div>
</section>

<!-- PRICING -->
<section id="pricing" style="background:var(--bg2);border-top:1px solid var(--border)">
  <div class="container">
    <div class="section-tag reveal">Pricing</div>
    <h2 class="section-title reveal">Pay for what you ship.</h2>
    <div class="pricing-grid reveal">
      <div class="price-card">
        <div class="tier-name">Starter</div>
        <div class="tier-price"><span class="currency"></span>Free<span class="period"> forever</span></div>
        <div class="tier-desc">For solo learners getting started.</div>
        <ul class="tier-features">
          <li>1 active project</li>
          <li>AI learning path generation</li>
          <li>Skill-gated Kanban board</li>
          <li>AI code evaluation (10 submissions/mo)</li>
          <li>Community support</li>
        </ul>
        <button class="tier-btn">Get started free</button>
      </div>
      <div class="price-card featured">
        <div class="tier-name">Pro</div>
        <div class="tier-price"><span class="currency">₹</span>529<span class="period">/month</span></div>
        <div class="tier-desc">For serious builders shipping real products.</div>
        <ul class="tier-features">
          <li>Unlimited projects</li>
          <li>Unlimited AI evaluations</li>
          <li>Advanced blueprint generation</li>
          <li>Priority AI mentor access</li>
          <li>Portfolio case studies</li>
          <li>GitHub integration</li>
        </ul>
        <button type="button" class="tier-btn">Start Pro</button>
      </div>
      <div class="price-card">
        <div class="tier-name">Team</div>
        <div class="tier-price"><span class="currency">₹</span>1,249<span class="period">/mo per team</span></div>
        <div class="tier-desc">For groups of 2–4 developers shipping together.</div>
        <ul class="tier-features">
          <li>Everything in Pro</li>
          <li>Role-based team workspace</li>
          <li>Shared Kanban board</li>
          <li>Team AI evaluations</li>
          <li>Collaborative Ship It milestones</li>
          <li>Mentor review sessions</li>
        </ul>
        <button class="tier-btn">Start Team</button>
      </div>
    </div>
  </div>
</section>

<!-- CTA -->
<section class="cta-section">
  <div class="container">
    <div class="section-tag reveal" style="justify-content:center">Get started</div>
    <h2 class="reveal">Stop studying.<br>Start shipping.</h2>
    <p class="reveal">Your first project blueprint is free. Always.</p>
    <div class="reveal">
      <a href="signup.php" class="btn-primary">Create your first project →</a>
    </div>
  </div>
</section>

<!-- FOOTER -->
<footer>
  <div class="footer-logo">Dev<span>Path</span></div>
  <p style="margin-top:0.5rem">Learn by Building. Ship Something Real.</p>
  <p style="margin-top:1.5rem">Built by Darshan Jain, Francis Reuben R &amp; Harshith B A · RV University School of CSE · 2025–26</p>
  <p style="margin-top:0.5rem">CS1211 Database Management System — Mini Project</p>
</footer>

<script>
  const obs = new IntersectionObserver((entries) => {
    entries.forEach((e, i) => {
      if (e.isIntersecting) {
        setTimeout(() => e.target.classList.add('visible'), i * 80);
      }
    });
  }, { threshold: 0.1 });
  document.querySelectorAll('.reveal').forEach(el => obs.observe(el));
</script>
</body>
</html>

    });
  }, { threshold: 0.1 });
  document.querySelectorAll('.reveal').forEach(el => obs.observe(el));
</script>
</body>
</html>
