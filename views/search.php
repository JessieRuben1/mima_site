<?php
$page_title = "Search Products";
require_once 'includes/header.php';
?>

<style>
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    .fade-in {
        animation: fadeIn 0.3s ease-out forwards;
    }
    
    .search-container {
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }
    
    .search-input:focus {
        outline: none;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.3);
    }
    
    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
    }
    
    .product-card {
        transition: all 0.3s ease;
    }
    
    .suggestion-item:hover {
        background-color: #f3f4f6;
    }
    
    .loader {
        border-top-color: #3b82f6;
        animation: spin 1s linear infinite;
    }
    
    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
    
    /* Custom scrollbar for nav */
    nav::-webkit-scrollbar {
        height: 6px;
    }
    
    nav::-webkit-scrollbar-track {
        background: #1e40af;
    }
    
    nav::-webkit-scrollbar-thumb {
        background: #3b82f6;
        border-radius: 3px;
    }
    
    /* Category list styling */
    .category-item {
        padding: 0.5rem 0;
        cursor: pointer;
        transition: all 0.2s;
    }
    
    .category-item:hover {
        color: #3b82f6;
    }
    
    .subcategory-item {
        padding: 0.3rem 0 0.3rem 1rem;
        cursor: pointer;
        transition: all 0.2s;
    }
    
    .subcategory-item:hover {
        color: #3b82f6;
    }
</style>

<main class="container mx-auto p-4">
    <section id="search" class="py-8">
        <h2 class="text-3xl font-bold mb-4">Search Products</h2>
        
        <!-- Search Container -->
        <div class="bg-white p-6 rounded shadow mb-8">
            <div class="max-w-3xl mx-auto">
                <div class="search-container bg-white rounded-full p-2 flex items-center relative">
                    <div class="absolute left-4 text-gray-400">
                        <i class="fas fa-search"></i>
                    </div>
                    <input 
                        type="text" 
                        id="searchInput" 
                        class="search-input flex-grow py-4 px-12 rounded-full border-0 focus:ring-0 text-gray-700" 
                        placeholder="Search for products, brands, categories..."
                        autocomplete="off"
                    >
                    <button id="searchButton" class="bg-blue-500 hover:bg-blue-600 text-white rounded-full px-6 py-2 mr-1 transition-colors">
                        Search
                    </button>
                </div>
                
                <!-- Search Suggestions -->
                <div id="suggestions" class="hidden bg-white mt-2 rounded-lg shadow-lg overflow-hidden w-full">
                    <!-- Suggestions will be populated here by JavaScript -->
                </div>
            </div>
        </div>
        
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
            <!-- Filters Column -->
            <div class="bg-white p-6 rounded shadow">
                <h3 class="font-semibold text-lg mb-4">Category</h3>
                <div class="space-y-2">
                    <div class="category-item" data-category="Electronics">
                        <p>Electronics</p>
                        <div class="subcategory-item" data-subcategory="Phones">Phones</div>
                        <div class="subcategory-item" data-subcategory="Laptops">Laptops</div>
                    </div>
                    <div class="category-item" data-category="Clothing">
                        <p>Clothing & Accessories</p>
                        <div class="subcategory-item" data-subcategory="Men">Men</div>
                        <div class="subcategory-item" data-subcategory="Women">Women</div>
                    </div>
                    <div class="category-item" data-category="Home & Garden">
                        <p>Home & Garden</p>
                        <div class="subcategory-item" data-subcategory="Furniture">Furniture</div>
                        <div class="subcategory-item" data-subcategory="Decor">Decor</div>
                    </div>
                    <div class="category-item" data-category="Agricultural">
                        <p>Agricultural Goods</p>
                        <div class="subcategory-item" data-subcategory="Crops">Crops</div>
                        <div class="subcategory-item" data-subcategory="Livestock">Livestock</div>
                    </div>
                    <div class="category-item" data-category="Handicrafts">
                        <p>Handicrafts & Artisanal Products</p>
                    </div>
                    <div class="category-item" data-category="Vehicles">
                        <p>Vehicles & Accessories</p>
                        <div class="subcategory-item" data-subcategory="Cars">Cars</div>
                        <div class="subcategory-item" data-subcategory="Bikes">Bikes</div>
                    </div>
                    <div class="category-item" data-category="Services">
                        <p>Services</p>
                        <div class="subcategory-item" data-subcategory="Carpentry">Carpentry</div>
                        <div class="subcategory-item" data-subcategory="Tailoring">Tailoring</div>
                    </div>
                </div>
                
                <h3 class="font-semibold text-lg mt-6 mb-4">Filters</h3>
                <div class="space-y-3">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Price Range</label>
                        <select class="w-full p-2 border rounded">
                            <option>Any</option>
                            <option>R0 - R50</option>
                            <option>R50 - R100</option>
                            <option>R100 - R200</option>
                            <option>R200+</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Location</label>
                        <select class="w-full p-2 border rounded">
                            <option>Any</option>
                            <option>Nearby</option>
                            <option>Same City</option>
                            <option>Same Province</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Condition</label>
                        <select class="w-full p-2 border rounded">
                            <option>Any</option>
                            <option>New</option>
                            <option>Used</option>
                            <option>Refurbished</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Ratings</label>
                        <select class="w-full p-2 border rounded">
                            <option>Any</option>
                            <option>4+ Stars</option>
                            <option>3+ Stars</option>
                        </select>
                    </div>
                </div>
            </div>
            
            <!-- Results Column -->
            <div class="lg:col-span-3">
                <div class="bg-white p-6 rounded shadow mb-6">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="font-semibold text-lg">Search Results</h3>
                        <div class="flex items-center space-x-4">
                            <select class="p-2 border rounded">
                                <option>Sort by: Relevance</option>
                                <option>Price: Low to High</option>
                                <option>Price: High to Low</option>
                                <option>Newest First</option>
                            </select>
                            <button class="p-2 text-gray-600 hover:text-gray-800">
                                <i class="fas fa-th-large"></i>
                            </button>
                            <button class="p-2 text-gray-600 hover:text-gray-800">
                                <i class="fas fa-list"></i>
                            </button>
                        </div>
                    </div>
                    
                    <!-- Results Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <!-- Product cards will be dynamically loaded here -->
                    </div>
                    
                    <!-- Loading State -->
                    <div id="loadingState" class="hidden">
                        <div class="flex justify-center items-center py-8">
                            <div class="loader ease-linear rounded-full border-4 border-t-4 border-gray-200 h-12 w-12"></div>
                        </div>
                    </div>
                    
                    <!-- No Results State -->
                    <div id="noResultsState" class="hidden text-center py-8">
                        <i class="fas fa-search text-gray-400 text-4xl mb-4"></i>
                        <h4 class="text-xl font-semibold text-gray-600">No results found</h4>
                        <p class="text-gray-500">Try adjusting your search or filters</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const searchButton = document.getElementById('searchButton');
    const suggestionsContainer = document.getElementById('suggestions');
    const loadingState = document.getElementById('loadingState');
    const noResultsState = document.getElementById('noResultsState');
    
    // Search input handling
    searchInput.addEventListener('input', function() {
        const query = this.value.trim();
        if (query.length > 2) {
            // Show loading state
            loadingState.classList.remove('hidden');
            suggestionsContainer.classList.remove('hidden');
            
            // Simulate API call for suggestions
            setTimeout(() => {
                // Hide loading state
                loadingState.classList.add('hidden');
                
                // Show suggestions (this would normally come from an API)
                if (query.length > 0) {
                    suggestionsContainer.innerHTML = `
                        <div class="suggestion-item p-3 hover:bg-gray-100 cursor-pointer">
                            <i class="fas fa-search text-gray-400 mr-2"></i>
                            ${query} in Electronics
                        </div>
                        <div class="suggestion-item p-3 hover:bg-gray-100 cursor-pointer">
                            <i class="fas fa-search text-gray-400 mr-2"></i>
                            ${query} in Clothing
                        </div>
                    `;
                } else {
                    suggestionsContainer.classList.add('hidden');
                }
            }, 500);
        } else {
            suggestionsContainer.classList.add('hidden');
        }
    });
    
    // Search button click
    searchButton.addEventListener('click', function() {
        const query = searchInput.value.trim();
        if (query.length > 0) {
            // Show loading state
            loadingState.classList.remove('hidden');
            noResultsState.classList.add('hidden');
            
            // Simulate search results
            setTimeout(() => {
                loadingState.classList.add('hidden');
                // Here you would normally load the actual search results
            }, 1000);
        }
    });
    
    // Category and subcategory handling
    const categoryItems = document.querySelectorAll('.category-item');
    const subcategoryItems = document.querySelectorAll('.subcategory-item');
    
    categoryItems.forEach(item => {
        item.addEventListener('click', function() {
            const category = this.getAttribute('data-category');
            // Handle category selection
            console.log('Selected category:', category);
        });
    });
    
    subcategoryItems.forEach(item => {
        item.addEventListener('click', function(e) {
            e.stopPropagation(); // Prevent category click
            const subcategory = this.getAttribute('data-subcategory');
            // Handle subcategory selection
            console.log('Selected subcategory:', subcategory);
        });
    });
});
</script>

<?php require_once 'includes/footer.php'; ?> 