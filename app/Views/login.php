<?php require __DIR__ . '/partials/header.php'; ?>

<div class="auth-wrap">
  <div class="auth-card">
    <h1><?= htmlspecialchars($title) ?></h1>
    <p class="auth-sub">Log in to your account to access GuardFrame's protected areas.</p>

    <form action="/login" method="POST" autocomplete="off">
      <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($csrfToken ?? '') ?>">

      <?php if (isset($errors['login'])): ?>
        <div class="alert-box">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="9"/><path d="M12 8v5M12 16h.01"/></svg>
          <span><?= htmlspecialchars($errors['login']) ?></span>
        </div>
      <?php endif; ?>

      <div class="field <?= isset($errors['login']) ? 'has-error' : '' ?>">
        <label for="email">Email</label>
        <input
          type="email"
          id="email"
          name="email"
          value="<?= htmlspecialchars($old['email'] ?? '') ?>"
          placeholder="e.g. name@example.com"
          autocomplete="off"
          required
        >
      </div>

      <div class="field <?= isset($errors['login']) ? 'has-error' : '' ?>">
        <label for="password">Password</label>
        <input
          type="password"
          id="password"
          name="password"
          placeholder="Enter your password"
          autocomplete="current-password"
          required
        >
      </div>

      <button type="submit" class="btn btn-primary">Log in</button>
    </form>

    <div class="auth-foot">
      Don't have an account? <a href="/register">Create account</a>
    </div>

    <div class="auth-note">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M12 3l7 3v6c0 4.5-3 7.5-7 9-4-1.5-7-4.5-7-9V6l7-3z"/></svg>
      <span>Secure environment protocol active.</span>
    </div>
  </div>
</div>

<?php require __DIR__ . '/partials/footer.php'; ?>