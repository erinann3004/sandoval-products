<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= htmlspecialchars($title, ENT_QUOTES, 'UTF-8'); ?> | LavaLust</title>
    <style>
        * { box-sizing: border-box; }
        body { margin: 0; min-height: 100vh; padding: 34px 18px; color: #19323c; font-family: Arial, sans-serif; background: #e8f1ef; }
        main { width: min(100%, 700px); margin: auto; padding: 34px; background: #fffdf8; border: 1px solid #c9d9d4; }
        h1 { margin: 0 0 25px; font: 2.4rem Georgia, serif; }
        label { display: block; margin: 18px 0 6px; color: #28665c; font-size: .78rem; font-weight: 700; letter-spacing: .08em; text-transform: uppercase; }
        input, textarea { width: 100%; padding: 12px; border: 1px solid #9dbbb2; background: #f8fbf9; font: 1rem Arial, sans-serif; }
        textarea { min-height: 130px; resize: vertical; }
        .actions { display: flex; gap: 15px; align-items: center; margin-top: 25px; }
        button { padding: 13px 20px; border: 0; color: #fff; background: #df674d; font-weight: 700; cursor: pointer; }
        a { color: #28665c; font-weight: 700; }
    </style>
</head>
<body>
    <main>
        <h1><?= htmlspecialchars($title, ENT_QUOTES, 'UTF-8'); ?></h1>
        <?php if (!empty($error)): ?><p><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></p><?php endif; ?>
        <form method="post" action="<?= $action === 'edit' ? site_url('products/edit/' . (int) $product['id']) : site_url('products/create'); ?>">
            <?= csrf_field(); ?>
            <label for="product_name">Product name</label>
            <input id="product_name" name="product_name" maxlength="100" required value="<?= htmlspecialchars($product['product_name'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
            <label for="description">Description</label>
            <textarea id="description" name="description" required><?= htmlspecialchars($product['description'] ?? '', ENT_QUOTES, 'UTF-8'); ?></textarea>
            <label for="price">Price</label>
            <input id="price" name="price" type="number" min="0" step="0.01" required value="<?= htmlspecialchars((string) ($product['price'] ?? ''), ENT_QUOTES, 'UTF-8'); ?>">
            <label for="quantity">Quantity</label>
            <input id="quantity" name="quantity" type="number" min="0" required value="<?= htmlspecialchars((string) ($product['quantity'] ?? ''), ENT_QUOTES, 'UTF-8'); ?>">
            <div class="actions"><button type="submit"><?= $action === 'edit' ? 'Save changes' : 'Add product'; ?></button><a href="<?= site_url('products'); ?>">Cancel</a></div>
        </form>
    </main>
</body>
</html>