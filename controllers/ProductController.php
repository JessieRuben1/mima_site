<?php
require_once __DIR__ . '/BaseController.php';
require_once __DIR__ . '/../models/Product.php';
require_once __DIR__ . '/../models/Category.php';

class ProductController extends BaseController {
    private $productModel;
    private $categoryModel;

    public function __construct() {
        parent::__construct();
        $this->productModel = new Product($this->db);
        $this->categoryModel = new Category($this->db);
    }

    public function index() {
        $products = $this->productModel->getAll();
        $categories = $this->categoryModel->getAll();
        
        $this->render('products/index', [
            'products' => $products,
            'categories' => $categories
        ]);
    }

    public function create() {
        $this->requireAuth();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $this->sanitize($_POST);
            
            $rules = [
                'name' => 'required|min:3|max:100',
                'description' => 'required|min:10|max:1000',
                'price' => 'required|decimal',
                'condition' => 'required|in:new,like_new,good,fair,poor',
                'category_id' => 'required|numeric',
                'subcategory_id' => 'numeric'
            ];

            if (!$this->validate($data, $rules)) {
                $this->json([
                    'success' => false,
                    'errors' => $this->getValidationErrors()
                ], 422);
                return;
            }

            try {
                $image = null;
                if (isset($_FILES['image']) && $_FILES['image']['error'] !== UPLOAD_ERR_NO_FILE) {
                    $image = $this->handleFileUpload(
                        $_FILES['image'],
                        __DIR__ . '/../public/uploads/products',
                        ['image/jpeg', 'image/png', 'image/gif'],
                        5
                    );
                }

                $productId = $this->productModel->create([
                    'user_id' => $this->user['id'],
                    'name' => $data['name'],
                    'description' => $data['description'],
                    'price' => $data['price'],
                    'condition' => $data['condition'],
                    'category_id' => $data['category_id'],
                    'subcategory_id' => $data['subcategory_id'] ?? null,
                    'image' => $image
                ]);

                $this->json([
                    'success' => true,
                    'message' => 'Product created successfully',
                    'product_id' => $productId
                ]);
            } catch (Exception $e) {
                $this->json([
                    'success' => false,
                    'message' => $e->getMessage()
                ], 500);
            }
        } else {
            $categories = $this->categoryModel->getAll();
            $this->render('products/create', [
                'categories' => $categories
            ]);
        }
    }

    public function update($id) {
        $this->requireAuth();

        $product = $this->productModel->getById($id);
        if (!$product || $product['user_id'] !== $this->user['id']) {
            $this->json([
                'success' => false,
                'message' => 'Product not found or unauthorized'
            ], 404);
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $this->sanitize($_POST);
            
            $rules = [
                'name' => 'required|min:3|max:100',
                'description' => 'required|min:10|max:1000',
                'price' => 'required|decimal',
                'condition' => 'required|in:new,like_new,good,fair,poor',
                'category_id' => 'required|numeric',
                'subcategory_id' => 'numeric',
                'status' => 'required|in:active,sold,inactive'
            ];

            if (!$this->validate($data, $rules)) {
                $this->json([
                    'success' => false,
                    'errors' => $this->getValidationErrors()
                ], 422);
                return;
            }

            try {
                $image = $product['image'];
                if (isset($_FILES['image']) && $_FILES['image']['error'] !== UPLOAD_ERR_NO_FILE) {
                    $image = $this->handleFileUpload(
                        $_FILES['image'],
                        __DIR__ . '/../public/uploads/products',
                        ['image/jpeg', 'image/png', 'image/gif'],
                        5
                    );
                }

                $this->productModel->update($id, [
                    'name' => $data['name'],
                    'description' => $data['description'],
                    'price' => $data['price'],
                    'condition' => $data['condition'],
                    'category_id' => $data['category_id'],
                    'subcategory_id' => $data['subcategory_id'] ?? null,
                    'image' => $image,
                    'status' => $data['status']
                ]);

                $this->json([
                    'success' => true,
                    'message' => 'Product updated successfully'
                ]);
            } catch (Exception $e) {
                $this->json([
                    'success' => false,
                    'message' => $e->getMessage()
                ], 500);
            }
        } else {
            $categories = $this->categoryModel->getAll();
            $this->render('products/edit', [
                'product' => $product,
                'categories' => $categories
            ]);
        }
    }

    public function delete($id) {
        $this->requireAuth();

        $product = $this->productModel->getById($id);
        if (!$product || $product['user_id'] !== $this->user['id']) {
            $this->json([
                'success' => false,
                'message' => 'Product not found or unauthorized'
            ], 404);
            return;
        }

        try {
            $this->productModel->delete($id);
            $this->json([
                'success' => true,
                'message' => 'Product deleted successfully'
            ]);
        } catch (Exception $e) {
            $this->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function search() {
        $query = $this->sanitize($_GET['q'] ?? '');
        $category = $this->sanitize($_GET['category'] ?? '');
        $minPrice = $this->sanitize($_GET['min_price'] ?? '');
        $maxPrice = $this->sanitize($_GET['max_price'] ?? '');
        $condition = $this->sanitize($_GET['condition'] ?? '');

        $products = $this->productModel->search([
            'query' => $query,
            'category' => $category,
            'min_price' => $minPrice,
            'max_price' => $maxPrice,
            'condition' => $condition
        ]);

        $this->json([
            'success' => true,
            'products' => $products
        ]);
    }
} 