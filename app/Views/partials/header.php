<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= htmlspecialchars($title) ?></title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;600;700&family=Inter:wght@400;500;600&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="/css/style.css">
</head>
<body>

<nav class="nav">
  <div class="shell nav-inner">
    <div class="brand">
      <span class="brand-mark"></span>
      GuardFrame
    </div>
    <div class="nav-links">
      <a href="/" class="<?= ($activePage ?? '') === 'home' ? 'active' : '' ?>">Home</a>
      <a href="/about" class="<?= ($activePage ?? '') === 'about' ? 'active' : '' ?>">About</a>
    </div>

    <?php if (!empty($_SESSION['user_id'])): ?>
      <div class="nav-user">
        <span class="greet">Welcome, <strong><?= htmlspecialchars($_SESSION['username'] ?? 'there') ?></strong></span>
        <form action="/logout" method="POST" style="display:inline;">
          <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($csrfToken ?? '') ?>">
          <button type="submit" class="btn-logout">Logout</button>
        </form>
      </div>
    <?php else: ?>
      <div class="nav-user">
        <a href="/register" class="btn-logout">Register</a>
      </div>
    <?php endif; ?>
  </div>
</nav>

<main class="shell">