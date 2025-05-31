<?php
require_once 'controllers/BaseController.php';
require_once 'models/Product.php';
require_once 'models/Category.php';

class SearchController extends BaseController {
    private $productModel;
    private $categoryModel;

    public function __construct() {
        parent::__construct();
        $this->productModel = new Product($this->db);
        $this->categoryModel = new Category($this->db);
    }

    public function index() {
        $query = $_GET['q'] ?? '';
        $category = $_GET['category'] ?? '';
        $subcategory = $_GET['subcategory'] ?? '';
        $priceMin = $_GET['price_min'] ?? '';
        $priceMax = $_GET['price_max'] ?? '';
        $location = $_GET['location'] ?? '';
        $condition = $_GET['condition'] ?? '';
        $rating = $_GET['rating'] ?? '';
        $page = max(1, intval($_GET['page'] ?? 1));
        $perPage = 12;

        $results = $this->productModel->search([
            'query' => $query,
            'category' => $category,
            'subcategory' => $subcategory,
            'price_min' => $priceMin,
            'price_max' => $priceMax,
            'location' => $location,
            'condition' => $condition,
            'rating' => $rating,
            'page' => $page,
            'per_page' => $perPage
        ]);

        $this->render('search/index', [
            'page_title' => 'Search Results',
            'query' => $query,
            'category' => $category,
            'subcategory' => $subcategory,
            'price_min' => $priceMin,
            'price_max' => $priceMax,
            'location' => $location,
            'condition' => $condition,
            'rating' => $rating,
            'results' => $results['items'],
            'total' => $results['total'],
            'page' => $page,
            'per_page' => $perPage,
            'total_pages' => ceil($results['total'] / $perPage)
        ]);
    }

    public function suggestions() {
        $query = $_GET['q'] ?? '';
        if (empty($query)) {
            $this->json(['suggestions' => []]);
        }

        $suggestions = $this->productModel->getSuggestions($query);
        $this->json(['suggestions' => $suggestions]);
    }

    public function categories() {
        $categories = $this->categoryModel->getWithSubcategories();
        $this->json(['categories' => $categories]);
    }
} 