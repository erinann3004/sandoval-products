<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= htmlspecialchars($title, ENT_QUOTES, 'UTF-8'); ?> | LavaLust</title>

<style>
* { box-sizing: border-box; }

body {
    margin: 0;
    min-height: 100vh;
    padding: 34px 18px;
    color: #19323c;
    font-family: Arial, sans-serif;
    background: #e8f1ef;
}

main {
    max-width: 1080px;
    margin: auto;
}

header {
    display: flex;
    align-items: end;
    justify-content: space-between;
    gap: 20px;
    margin-bottom: 24px;
}

h1 {
    margin: 0;
    font: 2.6rem Georgia, serif;
}

.eyebrow {
    margin: 0 0 8px;
    color: #28665c;
    font-size: .75rem;
    font-weight: 700;
    letter-spacing: .12em;
    text-transform: uppercase;
}

a, button {
    font-weight: 700;
}

.button {
    display: inline-block;
    padding: 11px 15px;
    color: #fff;
    background: #df674d;
    text-decoration: none;
}

.logout {
    color: #28665c;
    margin-left: 14px;
}

.message {
    padding: 12px 15px;
    margin-bottom: 18px;
    color: #285e4f;
    background: #d7eee5;
}

.table-wrap {
    overflow-x: auto;
    background: #fffdf8;
    border: 1px solid #c9d9d4;
}

table {
    width: 100%;
    min-width: 700px;
    border-collapse: collapse;
}

th, td {
    padding: 15px 16px;
    text-align: left;
    border-bottom: 1px solid #dfe9e5;
}

th {
    color: #28665c;
    font-size: .75rem;
    letter-spacing: .08em;
    text-transform: uppercase;
    background: #f5faf7;
}

.actions {
    white-space: nowrap;
}

.actions a {
    color: #28665c;
    margin-right: 12px;
}

.actions button {
    padding: 0;
    color: #a0392e;
    border: 0;
    background: none;
    cursor: pointer;
}

.empty {
    padding: 40px;
    text-align: center;
    color: #617771;
}

@media (max-width: 600px) {
    header {
        align-items: start;
        flex-direction: column;
    }

    h1 {
        font-size: 2rem;
    }
}
</style>
</head>

<body>

<main>

<header>
    <div>
        <p class="eyebrow">Authenticated catalogue</p>
        <h1>Products</h1>
    </div>

    <div>
        <a class="button" href="<?= site_url('products/create'); ?>">Add product</a>

        <form method="post" action="<?= site_url('logout'); ?>" style="display:inline">
            <?= csrf_field(); ?>
            <button class="logout" type="submit">Sign out</button>
        </form>
    </div>
</header>

<?php if ($message): ?>
    <div class="message">
        <?= htmlspecialchars($message, ENT_QUOTES, 'UTF-8'); ?>
    </div>
<?php endif; ?>

<div class="table-wrap">

<table>

<thead>
<tr>
    <th>Name</th>
    <th>Description</th>
    <th>Price</th>
    <th>Quantity</th>
    <th>Created</th>
    <th>Actions</th>
</tr>
</thead>

<tbody>

<?php if (empty($products)): ?>

<tr>
    <td class="empty" colspan="6">No products yet. Add the first one.</td>
</tr>

<?php else: foreach ($products as $product): ?>

<tr>

<td>
    <?= htmlspecialchars($product['product_name'], ENT_QUOTES, 'UTF-8'); ?>
</td>

<td>
    <?= htmlspecialchars($product['description'], ENT_QUOTES, 'UTF-8'); ?>
</td>

<td>
    ₱<?= number_format((float) $product['price'], 2); ?>
</td>

<td>
    <?= (int) $product['quantity']; ?>
</td>

<td>
    <?= htmlspecialchars($product['created_at'], ENT_QUOTES, 'UTF-8'); ?>
</td>

<td class="actions">

<a href="<?= site_url('products/edit/' . (int) $product['id']); ?>">
    Edit
</a>

<form method="post"
      action="<?= site_url('products/delete/' . (int) $product['id']); ?>"
      style="display:inline"
      onsubmit="return confirm('Delete this product?');">

    <?= csrf_field(); ?>

    <button type="submit">Delete</button>

</form>

</td>

</tr>

<?php endforeach; endif; ?>

</tbody>

</table>

</div>

</main>

</body>
</html>