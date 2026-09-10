<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= htmlspecialchars($title, ENT_QUOTES, 'UTF-8'); ?> | LavaLust</title>
    <style>
        * { box-sizing: border-box; }
        body { margin: 0; min-height: 100vh; display: grid; place-items: center; padding: 24px; color: #19323c; font-family: Georgia, serif; background: #e8f1ef; }
        .panel { width: min(100%, 500px); padding: 38px 42px; background: #fffdf8; border: 1px solid #c9d9d4; box-shadow: 10px 10px 0 #b8d0c8; }
        h1 { margin: 0 0 8px; font-size: 2.1rem; }
        label { display: block; margin: 14px 0 5px; font: 700 .8rem Arial, sans-serif; text-transform: uppercase; letter-spacing: .08em; }
        input { width: 100%; padding: 11px; border: 1px solid #9dbbb2; background: #f8fbf9; font: 1rem Arial, sans-serif; }
        button { width: 100%; margin-top: 22px; padding: 13px; border: 0; color: #fff; background: #df674d; font-weight: 700; cursor: pointer; }
        .error { padding: 10px 12px; color: #8a2b1d; background: #fde5df; font-family: Arial, sans-serif; }
        .link { text-align: center; font-family: Arial, sans-serif; }
        a { color: #28665c; }
    </style>
</head>
<body>
    <main class="panel">
        <h1>Create your account.</h1>
        <p>Register once, then sign in to access product management.</p>
        <?php if ($error): ?><p class="error"><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></p><?php endif; ?>
        <form method="post" action="<?= site_url('register'); ?>">
            <?= csrf_field(); ?>
            <label for="firstname">First name</label>
            <input id="firstname" name="firstname" required>
            <label for="lastname">Last name</label>
            <input id="lastname" name="lastname" required>
            <label for="username">Username</label>
            <input id="username" name="username" required>
            <label for="email">Email</label>
            <input id="email" name="email" type="email" required autocomplete="email">
            <label for="password">Password</label>
            <input id="password" name="password" type="password" required minlength="8" autocomplete="new-password">
            <button type="submit">Create account</button>
        </form>
        <p class="link">Already registered? <a href="<?= site_url('login'); ?>">Sign in</a></p>
    </main>
</body>
</html>