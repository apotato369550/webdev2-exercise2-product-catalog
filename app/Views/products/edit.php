<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Existing Product - Product Catalog</title>
    <style>
        /* Basic styling for clean presentation - will be replaced with Bootstrap later */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f8f9fa;
        }
        .container {
            max-width: 600px;
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
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: 600;
            color: #495057;
        }
        .form-control {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            font-size: 16px;
            box-sizing: border-box;
        }
        .form-control:focus {
            outline: none;
            border-color: #007bff;
            box-shadow: 0 0 0 2px rgba(0,123,255,0.25);
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
            margin-right: 10px;
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
        .btn-secondary {
            background-color: #6c757d;
        }
        .btn-secondary:hover {
            background-color: #545b62;
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
        .form-actions {
            margin-top: 30px;
            text-align: center;
        }
        .back-link {
            margin-bottom: 20px;
        }
        .required {
            color: #dc3545;
        }
        .form-control.is-invalid {
            border-color: #dc3545;
        }
        .form-control.is-valid {
            border-color: #28a745;
        }
        .form-help {
            font-size: 12px;
            color: #6c757d;
            margin-top: 5px;
        }
        .card-header {
            background-color: #f8f9fa;
            border-bottom: 1px solid #dee2e6;
            padding: 15px 20px;
            margin: -30px -30px 20px -30px;
            border-radius: 8px 8px 0 0;
        }
        .card-header h1 {
            margin: 0;
            font-size: 24px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="back-link">
            <a href="<?= base_url('products') ?>" class="btn btn-secondary">← Back to Products</a>
        </div>
        
        <div class="card-header">
            <h1>Add New Product</h1>
        </div>
        
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
        
        <!-- Product Form -->
        <form action="<?= base_url('products/store') ?>" method="post">
            <?= csrf_field() ?>
            
            <div class="form-group">
                <label for="name">Product Name <span class="required">*</span></label>
                <input type="text"
                       class="form-control"
                       id="name"
                       name="name"
                       value="<?= $product['name'] ?>"
                       placeholder="Enter product name"
                       required>
                <div class="form-help">Enter a descriptive name for your product</div>
            </div>
            
            <div class="form-group">
                <label for="price">Price <span class="required">*</span></label>
                <input type="number"
                       class="form-control"
                       id="price"
                       name="price"
                       value="<?= $product['price'] ?>"
                       placeholder="0.00"
                       step="0.01"
                       min="0"
                       required>
                <div class="form-help">Enter the price in USD (e.g., 19.99)</div>
            </div>
            
            <div class="form-actions">
                <button type="submit" class="btn btn-success">Edit Product</button>
                <a href="<?= base_url('products') ?>" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>