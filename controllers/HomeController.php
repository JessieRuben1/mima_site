<?php
require_once __DIR__ . '/BaseController.php';

class HomeController extends BaseController {
    
    public function index() {
        // Check if user is authenticated to show personalized content
        $isAuthenticated = $this->isAuthenticated();
        
        // Get featured products (you can implement this later)
        $featuredProducts = $this->getFeaturedProducts();
        
        // Get categories
        $categories = $this->getCategories();
        
        $this->render('home', [
            'page_title' => 'Home',
            'isAuthenticated' => $isAuthenticated,
            'featuredProducts' => $featuredProducts,
            'categories' => $categories,
            'user' => $this->user
        ]);
    }
    
    private function getFeaturedProducts() {
        // Placeholder data - replace with actual database query
        return [
            [
                'id' => 1,
                'name' => 'Fresh Tomatoes',
                'price' => 25.00,
                'image' => 'https://via.placeholder.com/300x200?text=Tomatoes',
                'location' => 'Johannesburg'
            ],
            [
                'id' => 2,
                'name' => 'Handmade Jewelry',
                'price' => 150.00,
                'image' => 'https://via.placeholder.com/300x200?text=Jewelry',
                'location' => 'Cape Town'
            ],
            [
                'id' => 3,
                'name' => 'Electronic Gadgets',
                'price' => 450.00,
                'image' => 'https://via.placeholder.com/300x200?text=Electronics',
                'location' => 'Durban'
            ]
        ];
    }
    
    private function getCategories() {
        return [
            ['name' => 'Electronics', 'icon' => 'fas fa-laptop', 'slug' => 'electronics'],
            ['name' => 'Clothing', 'icon' => 'fas fa-tshirt', 'slug' => 'clothing'],
            ['name' => 'Home & Garden', 'icon' => 'fas fa-home', 'slug' => 'home-garden'],
            ['name' => 'Agricultural', 'icon' => 'fas fa-leaf', 'slug' => 'agricultural'],
            ['name' => 'Services', 'icon' => 'fas fa-tools', 'slug' => 'services'],
            ['name' => 'Vehicles', 'icon' => 'fas fa-car', 'slug' => 'vehicles']
        ];
    }
}