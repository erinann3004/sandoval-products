<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            min-height: 100vh;
            background: linear-gradient(135deg, #ffe6f0, #e8d9ff);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            width: 90%;
            max-width: 800px;
            background: white;
            padding: 45px;
            border-radius: 20px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0,0,0,0.12);
        }

        h1 {
            color: #9b4d96;
            margin-bottom: 15px;
        }

        p {
            color: #555;
            margin-bottom: 25px;
        }

        .info {
            background: #fff0f7;
            padding: 20px;
            border-radius: 15px;
            margin-bottom: 25px;
        }

        .info h2 {
            color: #7b3f78;
            margin-bottom: 10px;
        }

        .access-message {
            margin-bottom: 25px;
            padding: 14px 18px;
            color: #6b3867;
            background: #fff0f7;
            border-left: 4px solid #9b4d96;
            border-radius: 8px;
        }

        nav a {
            display: inline-block;
            text-decoration: none;
            color: white;
            background: #9b4d96;
            padding: 12px 20px;
            margin: 5px;
            border-radius: 10px;
            transition: 0.3s;
        }

        nav a:hover {
            background: #71366e;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Welcome to My Student Hub</h1>

    <p>
        This is my LavaLust Student Information Page.
    </p>

    <?php if (!empty($access_message)): ?>
        <p class="access-message"><?= htmlspecialchars($access_message, ENT_QUOTES, 'UTF-8') ?></p>
    <?php endif; ?>

    <div class="info">
        <h2>Student Information</h2>
        <p>
            Explore my student profile and personal information
            through this simple LavaLust application.
        </p>
    </div>

    <nav>
        <a href="<?= site_url('student/profile') ?>">Student Profile</a>
    </nav>

</div>

</body>
</html>
