<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= htmlspecialchars($title, ENT_QUOTES, 'UTF-8'); ?> | LavaLust</title>
    <style>
        * { box-sizing: border-box; }
        body { margin: 0; min-height: 100vh; display: grid; place-items: center; padding: 24px; color: #19323c; font-family: Georgia, serif; background: #e8f1ef; }
        .panel { width: min(100%, 430px); padding: 42px; background: #fffdf8; border: 1px solid #c9d9d4; box-shadow: 10px 10px 0 #b8d0c8; }
        h1 { margin: 0 0 8px; font-size: 2.2rem; }
        p { line-height: 1.5; }
        label { display: block; margin: 18px 0 6px; font: 700 .85rem Arial, sans-serif; text-transform: uppercase; letter-spacing: .08em; }
        input, textarea { width: 100%; padding: 12px; border: 1px solid #9dbbb2; background: #f8fbf9; font: 1rem Arial, sans-serif; }
        button { width: 100%; margin-top: 24px; padding: 13px; border: 0; color: #fff; background: #df674d; font: 700 1rem Arial, sans-serif; cursor: pointer; }
        .error { padding: 10px 12px; color: #8a2b1d; background: #fde5df; }
        .link { margin-top: 22px; text-align: center; font-family: Arial, sans-serif; }
        a { color: #28665c; }
    </style>
</head>
<body>
    <main class="panel">
        <h1>Welcome back.</h1>
        <p>Sign in to manage the product catalogue.</p>
        <?php if ($error): ?><p class="error"><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></p><?php endif; ?>
        <form method="post" action="<?= site_url('login'); ?>">
            <?= csrf_field(); ?>
            <label for="email">Email</label>
            <input id="email" name="email" type="email" required autocomplete="email">
            <label for="password">Password</label>
            <input id="password" name="password" type="password" required autocomplete="current-password">
            <button type="submit">Sign in</button>
        </form>
        <p class="link">Need an account? <a href="<?= site_url('register'); ?>">Register</a></p>
    </main>
</body>
</html>