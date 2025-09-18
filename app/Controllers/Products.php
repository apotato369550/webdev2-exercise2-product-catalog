<?php

namespace App\Controllers;

use App\Models\ProductModel;

class Products extends BaseController
{
    protected $productModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
    }

    // Display all products
    public function index()
    {
        $data['products'] = $this->productModel->findAll();
        
        return view('products/index', $data);
    }

    // Show create form
    public function create()
    {
        return view('products/create');
    }

    // Handle form submission
    public function store()
    {
        $data = [
            'name' => $this->request->getPost('name'),
            'price' => $this->request->getPost('price')
        ];

        if ($this->productModel->insert($data)) {
            session()->setFlashdata('success', 'Product created successfully!');
            return redirect()->to('/products');
        } else {
            $errors = $this->productModel->errors();
            session()->setFlashdata('errors', $errors);
            return redirect()->back()->withInput();
        }
    }

    // Delete product (for future use)
    public function delete($id = null)
    {
        if ($id === null) {
            session()->setFlashdata('error', 'Product ID is required');
            return redirect()->to('/products');
        }

        $product = $this->productModel->find($id);
        
        if (!$product) {
            session()->setFlashdata('error', 'Product not found');
            return redirect()->to('/products');
        }

        if ($this->productModel->delete($id)) {
            session()->setFlashdata('success', 'Product deleted successfully!');
        } else {
            session()->setFlashdata('error', 'Failed to delete product');
        }

        return redirect()->to('/products');
    }

    public function edit($id) {
        $product = $this->productModel->find($id);
        // change $product to ['product', => $product]
        return view('/products/edit', ['product' => $product]);
    }

    public function update($id) {
        $validation = \Config\Services::validation();
        $rules = [
            'name' => 'required|min_length[2]',
            'price' => 'required|decimal|greater_than[0]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->productModel->update($id, [
            'name' => $this->request->getPost('name'),
            'price' => $this->request->getPost('price')
        ]);

        session()->setFlashdata('success', 'Product updated successfully');
        return redirect()->to('/products');
    }
}