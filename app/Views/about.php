<?php require __DIR__ . '/partials/header.php'; ?>

  <section class="page-head">
    <div class="eyebrow">📐 architecture &amp; intent</div>
    <h1><?= $title ?></h1>
    <p class="lede">GuardFrame isn't a wrapper around an existing framework. Every piece — routing, controllers, views, security — was written by hand to understand exactly what happens between a request and a response.</p>
  </section>

  <div class="stat-row">
    <div class="stat">
      <div class="num">0</div>
      <div class="label">external frameworks</div>
    </div>
    <div class="stat">
      <div class="num">1</div>
      <div class="label">entry point for every request</div>
    </div>
    <div class="stat">
      <div class="num">100%</div>
      <div class="label">queries via prepared statements</div>
    </div>
    <div class="stat">
      <div class="num">live</div>
      <div class="label">attack simulation mode</div>
    </div>
  </div>

  <section class="prose">
    <p><strong>Why build an MVC core from scratch?</strong> Frameworks like Laravel solve these problems well, but they hide how. GuardFrame exists to make the routing, the dispatch, and the security checks visible and auditable — every request's path from URL to response is something you can trace line by line.</p>
    <p><strong>Why security-first?</strong> Most student projects bolt security on as an afterthought, if at all. GuardFrame treats CSRF protection, input sanitization, and SQL injection defense as part of the core architecture — not optional middleware you remember to add later.</p>
  </section>

  <section class="section" style="border-top:1px solid var(--line); padding-top:48px;">
    <div class="section-head">
      <h2>How a request actually moves through it</h2>
      <p>One path, every time — for real users and simulated attackers alike.</p>
    </div>

    <div class="timeline">
      <div class="timeline-item">
        <div class="stage">01 · entry</div>
        <h4>Front controller</h4>
        <p>Every request hits a single index.php — no page is ever reachable as a standalone file.</p>
      </div>
      <div class="timeline-item">
        <div class="stage">02 · routing</div>
        <h4>Router dispatch</h4>
        <p>The URL is matched against registered routes, then the matching controller and method are resolved dynamically.</p>
      </div>
      <div class="timeline-item">
        <div class="stage">03 · security</div>
        <h4>Checkpoints run</h4>
        <p>CSRF tokens, input sanitation, and rate limits are checked before any application logic executes.</p>
      </div>
      <div class="timeline-item">
        <div class="stage">04 · response</div>
        <h4>Controller → View</h4>
        <p>The controller talks to the model if needed, then hands data to a view file — the view never touches business logic.</p>
      </div>
    </div>
  </section>

<?php require __DIR__ . '/partials/footer.php'; ?>