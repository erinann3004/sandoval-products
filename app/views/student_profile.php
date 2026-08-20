<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');
$scriptPath = str_replace('\\', '/', $_SERVER['SCRIPT_NAME'] ?? '');
$publicBase = preg_replace('#/(?:public/)?index\\.php$#', '', $scriptPath);
$photoUrl = rtrim($publicBase, '/') . '/' . ltrim($photo, '/');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($title, ENT_QUOTES, 'UTF-8') ?></title>
    <style>
        * { box-sizing: border-box; }
        body { margin: 0; padding: 35px 18px; font-family: Arial, sans-serif; color: #463746; background: linear-gradient(135deg, #ffe6f0, #e8d9ff); }
        .resume { max-width: 900px; margin: 0 auto; overflow: hidden; background: #fff; border-radius: 20px; box-shadow: 0 10px 30px rgba(76,42,77,.16); }
        .header { display: flex; align-items: center; gap: 28px; padding: 38px 46px; color: #fff; background: linear-gradient(120deg, #9b4d96, #c36bb5); }
        .photo { width: 130px; height: 130px; flex: 0 0 130px; overflow: hidden; border: 4px solid rgba(255,255,255,.75); border-radius: 50%; background: #fff0f7; }
        .photo img { width: 100%; height: 100%; object-fit: cover; }
        .header h1 { margin: 0 0 7px; font-size: 2rem; }
        .header p { margin: 0; line-height: 1.55; }
        .content { display: grid; grid-template-columns: 1.55fr 1fr; }
        .main, .sidebar { padding: 35px 42px; }
        .sidebar { background: #fff0f7; }
        h2 { margin: 0 0 18px; padding-bottom: 9px; color: #7b3f78; font-size: 1.05rem; letter-spacing: .06em; text-transform: uppercase; border-bottom: 2px solid #e9b7db; }
        .details { margin: 0 0 32px; }
        .details div { display: grid; grid-template-columns: 120px 1fr; gap: 12px; padding: 10px 0; border-bottom: 1px solid #f2dce9; }
        .details strong { color: #7b3f78; }
        .education { padding: 17px; border-left: 4px solid #9b4d96; background: #fcf7fb; }
        .education h3 { margin: 0 0 7px; color: #5c315a; font-size: 1rem; }
        .education p { margin: 4px 0; line-height: 1.45; }
        .hobbies { display: flex; flex-wrap: wrap; gap: 9px; }
        .hobbies span { padding: 8px 12px; color: #6b3867; background: #f7d8ec; border-radius: 999px; }
        .photo-note { margin: 22px 0 0; font-size: .82rem; line-height: 1.45; color: #795d77; }
        nav { padding: 22px 42px; text-align: center; background: #fcf7fb; }
        nav a { display: inline-block; margin: 4px; padding: 11px 18px; color: #fff; text-decoration: none; background: #9b4d96; border-radius: 9px; }
        nav a:hover { background: #71366e; }
        @media (max-width: 650px) { body { padding: 18px 10px; } .header { padding: 30px 24px; gap: 18px; } .photo { width: 95px; height: 95px; flex-basis: 95px; } .header h1 { font-size: 1.5rem; } .content { grid-template-columns: 1fr; } .main, .sidebar { padding: 28px 24px; } nav { padding: 20px 16px; } }
    </style>
</head>
<body>
    <main class="resume">
        <header class="header">
            <div class="photo"><img src="<?= htmlspecialchars($photoUrl, ENT_QUOTES, 'UTF-8') ?>" alt="Profile photo of <?= htmlspecialchars($name, ENT_QUOTES, 'UTF-8') ?>"></div>
            <div><h1><?= htmlspecialchars($name, ENT_QUOTES, 'UTF-8') ?></h1><p><?= htmlspecialchars($course, ENT_QUOTES, 'UTF-8') ?> Student</p><p><?= htmlspecialchars($year, ENT_QUOTES, 'UTF-8') ?> · Section <?= htmlspecialchars($section, ENT_QUOTES, 'UTF-8') ?></p></div>
        </header>
        <div class="content">
            <section class="main">
                <h2>Student Details</h2>
                <div class="details">
                    <div><strong>Contact No.</strong><span><?= htmlspecialchars($contact, ENT_QUOTES, 'UTF-8') ?></span></div>
                    <div><strong>Email</strong><span><?= htmlspecialchars($email, ENT_QUOTES, 'UTF-8') ?></span></div>
                    <div><strong>Birth Date</strong><span><?= htmlspecialchars($birth_date, ENT_QUOTES, 'UTF-8') ?></span></div>
                    <div><strong>Age</strong><span><?= htmlspecialchars($age, ENT_QUOTES, 'UTF-8') ?></span></div>
                </div>
                <h2>Education</h2>
                <div class="education"><h3><?= htmlspecialchars($course, ENT_QUOTES, 'UTF-8') ?></h3><p><?= htmlspecialchars($year, ENT_QUOTES, 'UTF-8') ?> · Section <?= htmlspecialchars($section, ENT_QUOTES, 'UTF-8') ?></p><p>Student ID: <?= htmlspecialchars($student_id, ENT_QUOTES, 'UTF-8') ?></p></div>
            </section>
            <aside class="sidebar">
                <h2>Hobbies & Interests</h2>
                <div class="hobbies"><?php foreach ($hobbies as $hobby): ?><span><?= htmlspecialchars($hobby, ENT_QUOTES, 'UTF-8') ?></span><?php endforeach; ?></div>
            </aside>
        </div>
        <nav><a href="<?= site_url('student') ?>">Home</a></nav>
    </main>
</body>
</html>
