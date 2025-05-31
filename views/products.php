<?php
$page_title = "Products";
require_once 'includes/header.php';
?>

<style>
    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }
    .filter-section {
        transition: all 0.3s ease;
    }
    .low-data-mode {
        background-color: #3b82f6 !important;
    }
    .low-data-mode img {
        display: none;
    }
    .low-data-mode .image-placeholder {
        display: flex !important;
    }
    .product-detail {
        display: none;
    }
    .nav-tab {
        white-space: nowrap;
    }
    .category-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }
    .active-category {
        border-bottom: 3px solid #3b82f6;
        color: #3b82f6;
    }
    .fade-in {
        animation: fadeIn 0.3s ease-in-out;
    }
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }
</style>

<!-- Products Listing Page -->
<div id="products-page">
    <!-- Search and Filter Bar -->
    <div class="bg-white shadow-sm sticky top-0 z-10">
        <div class="container mx-auto px-4 py-3">
            <div class="flex flex-col md:flex-row items-center justify-between gap-4">
                <div class="w-full md:w-1/3">
                    <div class="relative">
                        <input id="searchInput" type="text" placeholder="Search products..." class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                    </div>
                </div>
                <div class="flex items-center space-x-2 w-full md:w-auto">
                    <button id="filterToggle" class="flex items-center bg-blue-50 text-blue-600 px-4 py-2 rounded-lg">
                        <i class="fas fa-filter mr-2"></i>
                        <span>Filters</span>
                    </button>
                    <a href="sell.php" class="flex items-center bg-blue-600 text-white px-4 py-2 rounded-lg">
                        <i class="fas fa-plus mr-2"></i>
                        <span>Add Product</span>
                    </a>
                </div>
            </div>
            <!-- Filter Section -->
            <div id="filterSection" class="filter-section hidden mt-4 p-4 bg-gray-50 rounded-lg">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                    <div>
                        <h3 class="font-medium mb-2">Category</h3>
                        <div class="space-y-2">
                            <label class="flex items-center">
                                <input type="checkbox" class="rounded text-blue-600" data-category="electronics">
                                <span class="ml-2">Electronics</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" class="rounded text-blue-600" data-category="clothing">
                                <span class="ml-2">Clothing</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" class="rounded text-blue-600" data-category="home">
                                <span class="ml-2">Home</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" class="rounded text-blue-600" data-category="agricultural">
                                <span class="ml-2">Agricultural</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" class="rounded text-blue-600" data-category="services">
                                <span class="ml-2">Services</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" class="rounded text-blue-600" data-category="vehicles">
                                <span class="ml-2">Vehicles</span>
                            </label>
                        </div>
                    </div>
                    <div>
                        <h3 class="font-medium mb-2">Price Range</h3>
                        <div class="space-y-2">
                            <label class="flex items-center">
                                <input type="radio" name="price" class="rounded-full text-blue-600">
                                <span class="ml-2">Under R50</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" name="price" class="rounded-full text-blue-600">
                                <span class="ml-2">R50 - R100</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" name="price" class="rounded-full text-blue-600">
                                <span class="ml-2">R100 - R200</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" name="price" class="rounded-full text-blue-600">
                                <span class="ml-2">Over R200</span>
                            </label>
                        </div>
                    </div>
                    <div>
                        <h3 class="font-medium mb-2">Location</h3>
                        <div class="space-y-2">
                            <label class="flex items-center">
                                <input type="checkbox" class="rounded text-blue-600">
                                <span class="ml-2">Johannesburg</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" class="rounded text-blue-600">
                                <span class="ml-2">Hillbrow</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" class="rounded text-blue-600">
                                <span class="ml-2">Berea</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" class="rounded text-blue-600">
                                <span class="ml-2">Soweto</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" class="rounded text-blue-600">
                                <span class="ml-2">JHB CBD</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" class="rounded text-blue-600">
                                <span class="ml-2">Yeoville</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" class="rounded text-blue-600">
                                <span class="ml-2">Alexander</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" class="rounded text-blue-600">
                                <span class="ml-2">Troyville</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" class="rounded text-blue-600">
                                <span class="ml-2">Bellueve</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" class="rounded text-blue-600">
                                <span class="ml-2">JeppeTown</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" class="rounded text-blue-600">
                                <span class="ml-2">Fordburg</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" class="rounded text-blue-600">
                                <span class="ml-2">Pageview</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" class="rounded text-blue-600">
                                <span class="ml-2">Cape Town</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" class="rounded text-blue-600">
                                <span class="ml-2">Durban</span>
                            </label>
                            <label class="flex items-center">
                                <input type="checkbox" class="rounded text-blue-600">
                                <span class="ml-2">Pretoria</span>
                            </label>
                        </div>
                    </div>
                    <div>
                        <h3 class="font-medium mb-2">Sort By</h3>
                        <div class="space-y-2">
                            <label class="flex items-center">
                                <input type="radio" name="sort" class="rounded-full text-blue-600">
                                <span class="ml-2">Newest First</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" name="sort" class="rounded-full text-blue-600">
                                <span class="ml-2">Price: Low to High</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" name="sort" class="rounded-full text-blue-600">
                                <span class="ml-2">Price: High to Low</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" name="sort" class="rounded-full text-blue-600">
                                <span class="ml-2">Most Popular</span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="mt-4 flex justify-end space-x-2">
                    <button id="resetFilters" class="px-4 py-2 text-gray-600 hover:text-gray-800">
                        Reset
                    </button>
                    <button id="applyFilters" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                        Apply Filters
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Categories -->
    <div class="bg-white shadow-sm">
        <div class="container mx-auto px-4 py-3">
            <div class="flex overflow-x-auto space-x-4 pb-2">
                <button class="category-card active-category px-4 py-2 whitespace-nowrap">
                    All Products
                </button>
                <button class="category-card px-4 py-2 whitespace-nowrap">
                    Electronics
                </button>
                <button class="category-card px-4 py-2 whitespace-nowrap">
                    Clothing
                </button>
                <button class="category-card px-4 py-2 whitespace-nowrap">
                    Home
                </button>
                <button class="category-card px-4 py-2 whitespace-nowrap">
                    Agricultural
                </button>
                <button class="category-card px-4 py-2 whitespace-nowrap">
                    Services
                </button>
                <button class="category-card px-4 py-2 whitespace-nowrap">
                    Vehicles
                </button>
            </div>
        </div>
    </div>

    <!-- Products Grid -->
    <div class="container mx-auto px-4 py-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            <!-- Product Card Template -->
            <div class="product-card bg-white rounded-lg shadow-sm overflow-hidden transition-all duration-300">
                <div class="relative">
                    <img src="https://placeholder.com/300x200" alt="Product" class="w-full h-48 object-cover">
                    <div class="image-placeholder hidden bg-gray-100 w-full h-48 flex items-center justify-center">
                        <i class="fas fa-image text-gray-400 text-4xl"></i>
                    </div>
                    <div class="absolute top-2 right-2">
                        <button class="bg-white p-2 rounded-full shadow-sm hover:bg-gray-100">
                            <i class="fas fa-heart text-gray-400"></i>
                        </button>
                    </div>
                </div>
                <div class="p-4">
                    <h3 class="font-semibold text-lg mb-1">Product Name</h3>
                    <p class="text-gray-600 text-sm mb-2">Category</p>
                    <div class="flex justify-between items-center">
                        <span class="font-bold text-blue-600">R199.99</span>
                        <span class="text-sm text-gray-500">Johannesburg</span>
                    </div>
                </div>
            </div>
            <!-- Repeat product cards as needed -->
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Filter toggle
    const filterToggle = document.getElementById('filterToggle');
    const filterSection = document.getElementById('filterSection');
    
    filterToggle.addEventListener('click', () => {
        filterSection.classList.toggle('hidden');
    });

    // Category selection
    const categoryCards = document.querySelectorAll('.category-card');
    categoryCards.forEach(card => {
        card.addEventListener('click', () => {
            categoryCards.forEach(c => c.classList.remove('active-category'));
            card.classList.add('active-category');
        });
    });

    // Low data mode toggle
    const lowDataToggle = document.getElementById('lowDataToggle');
    lowDataToggle.addEventListener('click', () => {
        document.body.classList.toggle('low-data-mode');
    });
});
</script>

<?php require_once 'includes/footer.php'; ?> 