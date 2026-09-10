<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class ProductsController extends Controller
{
    private $product_error = null;

    public function __construct()
    {
        parent::__construct();
        $this->call->helper('security');
        $this->call->database();
        $this->call->model('ProductModel');
        $this->call->library('session');
    }

    public function index()
    {
        $this->call->view('products/index', [
            'title' => 'Products',
            'products' => $this->ProductModel->order_by('created_at', 'DESC'),
            'message' => $this->session->flashdata('message'),
        ]);
    }

    public function create()
    {
        $this->call->view('products/form', ['title' => 'Add Product', 'product' => null, 'action' => 'create', 'error' => $this->product_error]);
    }

    public function store()
    {
        $data = $this->product_data();
        if ($data === null) {
            $this->call->view('products/form', ['title' => 'Add Product', 'product' => $this->request->post(), 'action' => 'create', 'error' => $this->product_error]);
            return;
        }

        $this->ProductModel->insert($data);
        $this->session->set_flashdata('message', 'Product added successfully.');
        redirect('products');
    }

    public function edit($id)
    {
        $product = $this->ProductModel->find((int) $id);

        if (!$product) {
            show_404();
        }

        $this->call->view('products/form', ['title' => 'Edit Product', 'product' => $product, 'action' => 'edit']);
    }

    public function update($id)
    {
        if (!$this->ProductModel->find((int) $id)) {
            show_404();
        }

        $data = $this->product_data();
        if ($data === null) {
            $this->call->view('products/form', ['title' => 'Edit Product', 'product' => array_merge(['id' => (int) $id], $this->request->post()), 'action' => 'edit', 'error' => $this->product_error]);
            return;
        }

        $this->ProductModel->update((int) $id, $data);
        $this->session->set_flashdata('message', 'Product updated successfully.');
        redirect('products');
    }

    public function delete($id)
    {
        if (!$this->ProductModel->find((int) $id)) {
            show_404();
        }

        $this->ProductModel->delete((int) $id);
        $this->session->set_flashdata('message', 'Product deleted successfully.');
        redirect('products');
    }

    private function product_data()
    {
        $product_name = trim((string) $this->request->post('product_name'));
        $description = trim((string) $this->request->post('description'));
        $price = $this->request->post('price');
        $quantity = $this->request->post('quantity');

        if ($product_name === '' || strlen($product_name) > 100) {
            $this->product_error = 'Product name is required and must be 100 characters or fewer.';
            return null;
        }

        if ($description === '') {
            $this->product_error = 'Description is required.';
            return null;
        }

        if (!is_numeric($price) || (float) $price < 0 || !is_numeric($quantity) || filter_var($quantity, FILTER_VALIDATE_INT) === false || (int) $quantity < 0) {
            $this->product_error = 'Price and quantity must be valid non-negative numbers.';
            return null;
        }

        return [
            'product_name' => $product_name,
            'description' => $description,
            'price' => (float) $price,
            'quantity' => (int) $quantity,
        ];
    }
}