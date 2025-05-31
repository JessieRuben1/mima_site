<?php
require_once 'controllers/BaseController.php';
require_once 'models/Transaction.php';
require_once 'models/Product.php';

class TransactionController extends BaseController {
    private $transactionModel;
    private $productModel;

    public function __construct() {
        parent::__construct();
        $this->requireAuth();
        $this->transactionModel = new Transaction($this->db);
        $this->productModel = new Product($this->db);
    }

    public function index() {
        $status = $_GET['status'] ?? 'all';
        $page = max(1, intval($_GET['page'] ?? 1));
        $perPage = 10;

        $transactions = $this->transactionModel->getByUserId($this->user['id'], [
            'status' => $status,
            'page' => $page,
            'per_page' => $perPage
        ]);

        $summary = $this->transactionModel->getSummary($this->user['id']);

        $this->render('transaction/index', [
            'page_title' => 'My Transactions',
            'status' => $status,
            'transactions' => $transactions['items'],
            'total' => $transactions['total'],
            'page' => $page,
            'per_page' => $perPage,
            'total_pages' => ceil($transactions['total'] / $perPage),
            'summary' => $summary
        ]);
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/products.php');
        }

        $productId = $_POST['product_id'] ?? null;
        $quantity = intval($_POST['quantity'] ?? 1);
        $shippingAddress = $_POST['shipping_address'] ?? '';

        if (!$productId || $quantity < 1 || empty($shippingAddress)) {
            $this->redirect('/products.php');
        }

        try {
            // Get product details
            $product = $this->productModel->getById($productId);
            if (!$product) {
                throw new Exception('Product not found');
            }

            $data = [
                'user_id' => $this->user['id'],
                'product_id' => $productId,
                'quantity' => $quantity,
                'total_amount' => $product['price'] * $quantity,
                'shipping_address' => $shippingAddress
            ];

            $this->transactionModel->create($data);
            $this->redirect('/transaction.php');
        } catch (Exception $e) {
            // TODO: Handle error
            $this->redirect('/products.php');
        }
    }

    public function update() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->json(['error' => 'Invalid request method']);
        }

        $transactionId = $_POST['transaction_id'] ?? null;
        $status = $_POST['status'] ?? '';

        if (!$transactionId || empty($status)) {
            $this->json(['error' => 'Missing required parameters']);
        }

        try {
            $this->transactionModel->update($transactionId, [
                'user_id' => $this->user['id'],
                'status' => $status
            ]);
            $this->json(['success' => true]);
        } catch (Exception $e) {
            $this->json(['error' => $e->getMessage()]);
        }
    }

    public function cancel() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->json(['error' => 'Invalid request method']);
        }

        $transactionId = $_POST['transaction_id'] ?? null;
        if (!$transactionId) {
            $this->json(['error' => 'No transaction ID provided']);
        }

        try {
            $this->transactionModel->cancel($transactionId, $this->user['id']);
            $this->json(['success' => true]);
        } catch (Exception $e) {
            $this->json(['error' => $e->getMessage()]);
        }
    }
} 