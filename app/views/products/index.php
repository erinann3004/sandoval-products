<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($title, ENT_QUOTES, 'UTF-8'); ?></title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f8fafc;
            color: #1e293b;
        }

        .container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 20px;
        }

        h1 {
            margin-bottom: 20px;
        }

        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .btn {
            display: inline-block;
            padding: 10px 16px;
            border-radius: 6px;
            text-decoration: none;
            color: white;
            background: #0d9488;
        }

        .btn:hover {
            background: #0f766e;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }

        th,
        td {
            padding: 12px;
            border-bottom: 1px solid #e2e8f0;
            text-align: left;
        }

        th {
            background: #0d9488;
            color: white;
        }

        tr:hover {
            background: #f1f5f9;
        }

        .actions a {
            margin-right: 8px;
            text-decoration: none;
        }

        .edit {
            color: #2563eb;
        }

        .delete {
            color: #dc2626;
        }
    </style>
</head>

<body>

<div class="container">

    <div class="top-bar">
        <h1><?= htmlspecialchars($title, ENT_QUOTES, 'UTF-8'); ?></h1>

        <a href="<?= site_url('products/create'); ?>" class="btn">
            Add Product
        </a>
    </div>

    <table>
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>

        <?php if (!empty($products)): ?>

            <?php foreach ($products as $product): ?>

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
                        <a
                            href="<?= site_url('products/edit/' . $product['id']); ?>"
                            class="edit"
                        >
                            Edit
                        </a>

                        <a
                            href="<?= site_url('products/delete/' . $product['id']); ?>"
                            class="delete"
                            onclick="return confirm('Are you sure you want to delete this product?');"
                        >
                            Delete
                        </a>
                    </td>
                </tr>

            <?php endforeach; ?>

        <?php else: ?>

            <tr>
                <td colspan="6" style="text-align:center;">
                    No products found.
                </td>
            </tr>

        <?php endif; ?>

        </tbody>
    </table>

</div>

</body>
</html>