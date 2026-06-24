<?php require __DIR__ . '/partials/header.php'; ?>

  <section class="hero">
    <div class="eyebrow">⚡ hand-built PHP MVC, no framework underneath</div>
    <h1><?= $title ?></h1>
    <p class="lede">GuardFrame is an MVC core built from the ground up with security as a first-class citizen — then proven with a live mode where you can launch real attacks and watch them get caught.</p>

    <div class="hero-actions">
      <a href="#demo" class="btn btn-primary">Run an attack on it →</a>
      <a href="/about" class="btn btn-ghost">How it's built</a>
    </div>

    <div class="log-strip" id="demo">
      <div class="log-strip-head">
        <div class="traffic"><span></span><span></span><span></span></div>
        <span>live request log</span>
      </div>
      <div class="log-body" id="logBody"></div>
    </div>
  </section>

  <section class="section">
    <div class="section-head">
      <h2>Built to defend, not just to run</h2>
      <p>Every request passes through the same checkpoints — whether it's a real user or a simulated attacker.</p>
    </div>

    <div class="grid">
      <div class="card">
        <div class="card-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M12 3l7 3v6c0 4.5-3 7.5-7 9-4-1.5-7-4.5-7-9V6l7-3z"/></svg>
        </div>
        <h3>CSRF protection</h3>
        <p>Every state-changing request carries a signed token, validated before a single line of controller logic runs.</p>
        <span class="tag">core/security</span>
      </div>

      <div class="card">
        <div class="card-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M4 7h16M4 12h10M4 17h7"/></svg>
        </div>
        <h3>SQL injection guard</h3>
        <p>Models only ever speak to the database through prepared statements — there's no path for raw input to reach SQL.</p>
        <span class="tag">core/model</span>
      </div>

      <div class="card">
        <div class="card-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="12" cy="12" r="8"/><path d="M12 8v4l3 2"/></svg>
        </div>
        <h3>Session hardening</h3>
        <p>Session IDs regenerate on privilege change, cookies are scoped and secure, idle sessions expire automatically.</p>
        <span class="tag">core/session</span>
      </div>

      <div class="card">
        <div class="card-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M3 12h4l3 8 4-16 3 8h4"/></svg>
        </div>
        <h3>Rate limiting</h3>
        <p>Per-IP, per-route throttling stops brute-force and scraping attempts before they reach your application logic.</p>
        <span class="tag">core/router</span>
      </div>

      <div class="card">
        <div class="card-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M4 4h16v12H4z"/><path d="M9 20h6M12 16v4"/></svg>
        </div>
        <h3>Input sanitization</h3>
        <p>Every incoming request is cleaned at a single layer, so controllers never touch raw, untrusted user data.</p>
        <span class="tag">core/request</span>
      </div>

      <div class="card">
        <div class="card-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M4 18h4V9H4v9zM10 18h4V5h-4v13zM16 18h4v-6h-4v6z"/></svg>
        </div>
        <h3>Security logging</h3>
        <p>Every blocked attempt is recorded — timestamp, IP, attack type, payload — and feeds straight into the live log above.</p>
        <span class="tag">core/logger</span>
      </div>
    </div>
  </section>

<script>
  const lines = [
    { method: "GET",  path: "/about",                                  status: "200 OK", type: "ok" },
    { method: "POST", path: "/login  payload=\"' OR 1=1 --\"",          status: "BLOCKED · SQLi", type: "blocked" },
    { method: "GET",  path: "/",                                       status: "200 OK", type: "ok" },
    { method: "POST", path: "/comment  payload=\"<script>alert(1)\"",   status: "BLOCKED · XSS", type: "blocked" },
    { method: "POST", path: "/transfer  no csrf_token",                 status: "BLOCKED · CSRF", type: "blocked" },
    { method: "GET",  path: "/products/5",                              status: "200 OK", type: "ok" },
  ];

  const logBody = document.getElementById("logBody");
  let i = 0;

  function renderLine() {
    const l = lines[i % lines.length];
    const el = document.createElement("div");
    el.className = "log-line " + l.type;
    el.innerHTML = `<span class="method">${l.method}</span><span class="path">${l.path}</span><span class="status">${l.status}</span>`;
    logBody.appendChild(el);

    while (logBody.children.length > 5) {
      logBody.removeChild(logBody.firstChild);
    }

    i++;
  }

  renderLine();
  setInterval(renderLine, 1800);
</script>

<?php require __DIR__ . '/partials/footer.php'; ?>