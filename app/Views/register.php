<?php require __DIR__ . '/partials/header.php'; ?>

  <div class="auth-wrap">
    <div class="auth-card">
      <h1><?= htmlspecialchars($title) ?></h1>
      <p class="auth-sub">Create an account to access GuardFrame's protected areas.</p>

      <form action="/register" method="POST" autocomplete="off">

        <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($csrfToken ?? '') ?>">

        <div class="field <?= isset($errors['username']) ? 'has-error' : '' ?>">
          <label for="username">Username</label>
          <input
            type="text"
            id="username"
            name="username"
            value="<?= htmlspecialchars($old['username'] ?? '') ?>"
            placeholder="e.g. hagag"
            autocomplete="off"
            required
          >
          <?php if (isset($errors['username'])): ?>
            <div class="field-error">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="9"/><path d="M12 8v5M12 16h.01"/></svg>
              <span><?= htmlspecialchars($errors['username']) ?></span>
            </div>
          <?php endif; ?>
        </div>

        <div class="field <?= isset($errors['email']) ? 'has-error' : '' ?>">
          <label for="email">Email</label>
          <input
            type="email"
            id="email"
            name="email"
            value="<?= htmlspecialchars($old['email'] ?? '') ?>"
            placeholder="you@example.com"
            autocomplete="off"
            required
          >
          <?php if (isset($errors['email'])): ?>
            <div class="field-error">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="9"/><path d="M12 8v5M12 16h.01"/></svg>
              <span><?= htmlspecialchars($errors['email']) ?></span>
            </div>
          <?php endif; ?>
        </div>

        <div class="field <?= isset($errors['password']) ? 'has-error' : '' ?>">
          <label for="password">Password</label>
          <input
            type="password"
            id="password"
            name="password"
            placeholder="At least 8 characters"
            autocomplete="new-password"
            required
          >
          <?php if (isset($errors['password'])): ?>
            <div class="field-error">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="9"/><path d="M12 8v5M12 16h.01"/></svg>
              <span><?= htmlspecialchars($errors['password']) ?></span>
            </div>
          <?php endif; ?>
        </div>

        <div class="field">
          <label for="password_confirmation">Confirm password</label>
          <input
            type="password"
            id="password_confirmation"
            name="password_confirmation"
            placeholder="Re-enter your password"
            autocomplete="new-password"
            required
          >
        </div>

        <button type="submit" class="btn btn-primary">Create account</button>
      </form>

      <div class="auth-foot">
        Already have an account? <a href="/login">Log in</a>
      </div>

      <div class="auth-note">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M12 3l7 3v6c0 4.5-3 7.5-7 9-4-1.5-7-4.5-7-9V6l7-3z"/></svg>
        <span>Passwords are hashed before storage. Never stored in plain text.</span>
      </div>
    </div>
  </div>

<?php require __DIR__ . '/partials/footer.php'; ?>