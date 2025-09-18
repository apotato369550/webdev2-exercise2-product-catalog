<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Catalog</title>
    <style>
        /* Basic styling for clean presentation - will be replaced with Bootstrap later */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f8f9fa;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #333;
            margin-bottom: 30px;
            text-align: center;
        }
        .header-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            border: none;
            cursor: pointer;
            font-size: 14px;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        .btn-success {
            background-color: #28a745;
        }
        .btn-success:hover {
            background-color: #1e7e34;
        }
        .alert {
            padding: 12px 20px;
            margin-bottom: 20px;
            border-radius: 4px;
            font-weight: 500;
        }
        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #dee2e6;
        }
        th {
            background-color: #f8f9fa;
            font-weight: 600;
            color: #495057;
        }
        tr:hover {
            background-color: #f8f9fa;
        }
        .price {
            font-weight: 600;
            color: #28a745;
        }
        .no-products {
            text-align: center;
            padding: 40px;
            color: #6c757d;
            font-style: italic;
        }
        .product-count {
            color: #6c757d;
            font-size: 14px;
        }
        .btn-danger {
            background-color: #dc3545;
        }
        .btn-danger:hover {
            background-color: #c82333;
        }
        .btn-sm {
            padding: 6px 12px;
            font-size: 12px;
        }
        .actions {
            white-space: nowrap;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Product Catalog</h1>
        
        <!-- Flash Messages -->
        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>
        
        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>
        
        <?php if (session()->getFlashdata('errors')): ?>
            <div class="alert alert-danger">
                <ul style="margin: 0; padding-left: 20px;">
                    <?php foreach (session()->getFlashdata('errors') as $error): ?>
                        <li><?= esc($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
        
        <!-- Header with Add Product Button -->
        <div class="header-actions">
            <div class="product-count">
                <?php $productCount = count($products); ?>
                Total Products: <strong><?= $productCount ?></strong>
            </div>
            <a href="<?= base_url('products/create') ?>" class="btn btn-success">
                + Add New Product
            </a>
        </div>
        
        <!-- Products Table -->
        <?php if (!empty($products)): ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Created Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $product): ?>
                        <tr>
                            <td><?= esc($product['id']) ?></td>
                            <td><?= esc($product['name']) ?></td>
                            <td class="price">$<?= number_format($product['price'], 2) ?></td>
                            <td><?= date('M j, Y g:i A', strtotime($product['created_at'])) ?></td>
                            <td class="actions">
                                <form method="post" action="<?= base_url('products/delete/' . $product['id']) ?>" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this product: <?= esc($product['name']) ?>?');">
                                    <?= csrf_field() ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                                <form method="get" action="<?= base_url('products/edit/' . $product['id']) ?>" style="display: inline;">
                                    <?= csrf_field() ?>
                                    <button type="submit" class="btn btn-info btn-sm">Edit</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <div class="no-products">
                <p>No products found in the catalog.</p>
                <p>Click the "Add New Product" button above to get started!</p>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>