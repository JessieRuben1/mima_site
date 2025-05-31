<?php
require_once 'controllers/BaseController.php';
require_once 'models/Product.php';
require_once 'models/Transaction.php';

class ProfileController extends BaseController {
    private $productModel;
    private $transactionModel;

    public function __construct() {
        parent::__construct();
        $this->requireAuth();
        $this->productModel = new Product($this->db);
        $this->transactionModel = new Transaction($this->db);
    }

    public function index() {
        // Get user's products
        $products = $this->productModel->getByUserId($this->user['id']);
        
        // Get user's orders
        $orders = $this->transactionModel->getByUserId($this->user['id'], [
            'page' => 1,
            'per_page' => 5
        ]);
        
        // Get user's statistics
        $stats = $this->transactionModel->getSummary($this->user['id']);

        $this->render('profile/index', [
            'page_title' => 'My Profile',
            'user' => $this->user,
            'products' => $products,
            'orders' => $orders['items'],
            'stats' => $stats
        ]);
    }

    public function update() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/profile.php');
        }

        $data = [
            'name' => $_POST['name'] ?? '',
            'bio' => $_POST['bio'] ?? '',
            'location' => $_POST['location'] ?? '',
            'phone' => $_POST['phone'] ?? ''
        ];

        // TODO: Implement profile update in database
        // For now, just redirect back to profile
        $this->redirect('/profile.php');
    }

    public function addProduct() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/profile.php');
        }

        $data = [
            'user_id' => $this->user['id'],
            'name' => $_POST['name'] ?? '',
            'description' => $_POST['description'] ?? '',
            'price' => $_POST['price'] ?? 0,
            'category_id' => $_POST['category_id'] ?? '',
            'condition' => $_POST['condition'] ?? 'new'
        ];

        // Handle image upload
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $data['image'] = $this->handleImageUpload($_FILES['image']);
        }

        try {
            $this->productModel->create($data);
            $this->redirect('/profile.php');
        } catch (Exception $e) {
            // TODO: Handle error
            $this->redirect('/profile.php');
        }
    }

    public function deleteProduct() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->json(['error' => 'Invalid request method']);
        }

        $productId = $_POST['product_id'] ?? null;
        if (!$productId) {
            $this->json(['error' => 'No product ID provided']);
        }

        try {
            $this->productModel->delete($productId, $this->user['id']);
            $this->json(['success' => true]);
        } catch (Exception $e) {
            $this->json(['error' => $e->getMessage()]);
        }
    }

    private function handleImageUpload($file) {
        $uploadDir = 'uploads/products/';
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $fileName = uniqid() . '_' . basename($file['name']);
        $uploadFile = $uploadDir . $fileName;

        if (move_uploaded_file($file['tmp_name'], $uploadFile)) {
            return $uploadFile;
        }

        return null;
    }
} 