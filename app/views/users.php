<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title><?= htmlspecialchars($title ?? 'Users', ENT_QUOTES, 'UTF-8'); ?></title> 

    <style> 
        * { box-sizing: border-box; } 

        body { 
            margin: 0; 
            min-height: 100vh; 
            padding: 35px 18px; 
            color: #463746; 
            font-family: Arial, sans-serif; 
            background: linear-gradient(135deg, #ffe6f0, #e8d9ff); 
        } 

        .users-page { 
            max-width: 980px; 
            margin: 0 auto; 
            overflow: hidden; 
            background: #fff; 
            border-radius: 20px; 
            box-shadow: 0 10px 30px rgba(76, 42, 77, .16); 
        } 

        .header { 
            padding: 38px 46px; 
            color: #fff; 
            background: linear-gradient(120deg, #9b4d96, #c36bb5); 
        } 

        .header p { 
            margin: 8px 0 0; 
            line-height: 1.5; 
        } 

        nav { 
            display: flex; 
            flex-wrap: wrap; 
            gap: 8px; 
            padding: 18px 42px; 
            background: #fcf7fb; 
        } 

        nav a { 
            padding: 10px 16px; 
            color: #7b3f78; 
            text-decoration: none; 
            border: 1px solid #e9b7db; 
            border-radius: 9px; 
        } 

        nav a:hover, 
        nav a.active { 
            color: #fff; 
            background: #9b4d96; 
        } 

        .content { 
            padding: 35px 42px 42px; 
        } 

        h1 { 
            margin: 0; 
            font-size: 2rem; 
        } 

        h2 { 
            margin: 0 0 18px; 
            color: #7b3f78; 
            font-size: 1.05rem; 
            letter-spacing: .06em; 
            text-transform: uppercase; 
        } 

        .table-wrap { 
            overflow-x: auto; 
        } 

        table { 
            width: 100%; 
            min-width: 650px; 
            border-collapse: collapse; 
        } 

        th, td { 
            padding: 14px 16px; 
            text-align: left; 
            border-bottom: 1px solid #f2dce9; 
        } 

        th { 
            color: #6b3867; 
            background: #fff0f7; 
        } 

        tr:hover td { 
            background: #fcf7fb; 
        } 

        .empty { 
            color: #795d77; 
            text-align: center; 
        } 

        @media (max-width: 650px) { 
            body { 
                padding: 18px 10px; 
            } 

            .header { 
                padding: 30px 24px; 
            } 

            .content { 
                padding: 28px 24px 32px; 
            } 

            nav { 
                padding: 16px 24px; 
            } 

            h1 { 
                font-size: 1.5rem; 
            } 
        } 
    </style> 
</head> 

<body> 

    <main class="users-page"> 

        <header class="header"> 
            <h1>User Management</h1> 
            <p>Browse the accounts registered in the system.</p> 
        </header> 

        <nav> 
            <a class="active" href="<?= site_url('users') ?>">Users</a> 
        </nav> 

        <section class="content"> 

            <h2>Registered Users</h2> 

            <div class="table-wrap"> 

                <table> 

                    <thead> 
                        <tr> 
                            <th>ID</th> 
                            <th>First Name</th> 
                            <th>Last Name</th> 
                            <th>Email</th> 
                            <th>Username</th> 
                        </tr> 
                    </thead> 

                    <tbody> 

                        <?php if (empty($users)): ?> 
                            <tr> 
                                <td class="empty" colspan="5">No users found.</td> 
                            </tr> 
                        <?php else: ?> 

                            <?php foreach ($users as $user): ?> 

                                <tr> 
                                    <td>
                                        <?= htmlspecialchars((string) ($user['id'] ?? ''), ENT_QUOTES, 'UTF-8'); ?>
                                    </td> 

                                    <td>
                                        <?= htmlspecialchars((string) ($user['firstname'] ?? ''), ENT_QUOTES, 'UTF-8'); ?>
                                    </td> 

                                    <td>
                                        <?= htmlspecialchars((string) ($user['lastname'] ?? ''), ENT_QUOTES, 'UTF-8'); ?>
                                    </td> 

                                    <td>
                                        <?= htmlspecialchars((string) ($user['email'] ?? ''), ENT_QUOTES, 'UTF-8'); ?>
                                    </td> 

                                    <td>
                                        <?= htmlspecialchars((string) ($user['username'] ?? ''), ENT_QUOTES, 'UTF-8'); ?>
                                    </td> 
                                </tr> 

                            <?php endforeach; ?> 

                        <?php endif; ?> 

                    </tbody> 

                </table> 

            </div> 

        </section> 

    </main> 

</body> 
</html>