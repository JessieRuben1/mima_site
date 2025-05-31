<?php
$page_title = "My Profile";
require_once 'includes/header.php';
?>

<style>
    .profile-header {
        background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('https://placeholder.com/1200x300') center/cover;
    }
    .verification-badge {
        position: absolute;
        right: 10px;
        top: 10px;
    }
    .progress-bar {
        height: 6px;
        background-color: #e5e7eb;
        border-radius: 3px;
    }
    .progress-fill {
        height: 100%;
        border-radius: 3px;
        background-color: #10b981;
    }
    .tab-content {
        display: none;
    }
    .tab-content.active {
        display: block;
    }
    .product-card:hover {
        transform: translateY(-5px);
    }
    .low-data-mode {
        background-color: #3b82f6 !important;
    }
</style>

<!-- Profile Header -->
<div class="profile-header text-white py-8">
    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row items-center">
            <div class="relative mb-4 md:mb-0 md:mr-8">
                <div class="w-24 h-24 md:w-32 md:h-32 rounded-full bg-green-100 flex items-center justify-center overflow-hidden">
                    <i class="fas fa-user text-green-600 text-4xl"></i>
                </div>
                <div class="verification-badge bg-green-500 text-white p-1 rounded-full">
                    <i class="fas fa-check-circle text-xs"></i>
                </div>
            </div>
            <div class="text-center md:text-left">
                <h1 id="userNameDisplay" class="text-2xl md:text-3xl font-bold mb-1">Nomvula Khumalo</h1>
                <p class="text-green-200 mb-2">Street Vendor | Johannesburg</p>
                <div class="flex justify-center md:justify-start items-center space-x-4 mb-3">
                    <div class="flex items-center">
                        <i class="fas fa-star text-yellow-400 mr-1"></i>
                        <span>4.8</span>
                        <span class="text-gray-300 ml-1">(128)</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-check-circle text-green-300 mr-1"></i>
                        <span>Verified</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-user-friends text-green-300 mr-1"></i>
                        <span>Member since 2022</span>
                    </div>
                </div>
                <div class="flex flex-wrap justify-center md:justify-start gap-2">
                    <span class="bg-green-700 bg-opacity-50 px-3 py-1 Rounded-full text-sm">Fresh Produce</span>
                    <span class="bg-green-700 bg-opacity-50 px-3 py-1 rounded-full text-sm">Local Ingredients</span>
                    <span class="bg-green-700 bg-opacity-50 px-3 py-1 rounded-full text-sm">Organic</span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Profile Navigation -->
<div class="bg-white shadow-sm">
    <div class="container mx-auto px-4">
        <nav class="flex overflow-x-auto">
            <button class="tab-button px-6 py-4 font-medium border-b-2 border-green-500 text-green-600" data-tab="products">
                <i class="fas fa-store mr-2"></i> My Products
            </button>
            <button class="tab-button px-6 py-4 font-medium text-gray-500 hover:text-gray-700" data-tab="orders">
                <i class="fas fa-shopping-bag mr-2"></i> Orders
            </button>
            <button class="tab-button px-6 py-4 font-medium text-gray-500 hover:text-gray-700" data-tab="reviews">
                <i class="fas fa-star mr-2"></i> Reviews
            </button>
            <button class="tab-button px-6 py-4 font-medium text-gray-500 hover:text-gray-700" data-tab="stats">
                <i class="fas fa-chart-line mr-2"></i> Statistics
            </button>
            <button class="tab-button px-6 py-4 font-medium text-gray-500 hover:text-gray-700" data-tab="settings">
                <i class="fas fa-cog mr-2"></i> Settings
            </button>
        </nav>
    </div>
</div>

<!-- Profile Content -->
<main class="container mx-auto px-4 py-8">
    <!-- Products Tab -->
    <div id="products" class="tab-content active">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-bold">My Products (12)</h2>
            <button class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                <i class="fas fa-plus mr-2"></i> Add Product
            </button>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Product Card 1 -->
            <div class="product-card bg-white rounded-lg shadow-sm overflow-hidden transition duration-300">
                <div class="h-48 bg-gray-100 relative">
                    <img src="https://placeholder.com/400x300" alt="Fresh Tomatoes" class="w-full h-full object-cover" loading="lazy">
                    <div class="absolute top-2 right-2 bg-green-600 text-white text-xs px-2 py-1 rounded">
                        In Stock
                    </div>
                </div>
                <div class="p-4">
                    <div class="flex justify-between items-start mb-2">
                        <h3 class="font-bold">Fresh Tomatoes</h3>
                        <span class="text-green-600 font-bold">R25/kg</span>
                    </div>
                    <p class="text-gray-600 text-sm mb-3">Locally grown, organic tomatoes from my garden.</p>
                    <div class="flex justify-between items-center">
                        <div class="text-yellow-400 text-sm">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            <span class="text-gray-500 ml-1">(24)</span>
                        </div>
                        <div class="flex space-x-2">
                            <button class="text-gray-400 hover:text-green-600">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="text-gray-400 hover:text-red-500">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Product Card 2 -->
            <div class="product-card bg-white rounded-lg shadow-sm overflow-hidden transition duration-300">
                <div class="h-48 bg-gray-100 relative">
                    <img src="https://placeholder.com/400x300" alt="Homemade Jam" class="w-full h-full object-cover" loading="lazy">
                    <div class="absolute top-2 right-2 bg-green-600 text-white text-xs px-2 py-1 rounded">
                        In Stock
                    </div>
                </div>
                <div class="p-4">
                    <div class="flex justify-between items-start mb-2">
                        <h3 class="font-bold">Homemade Strawberry Jam</h3>
                        <span class="text-green-600 font-bold">R45/jar</span>
                    </div>
                    <p class="text-gray-600 text-sm mb-3">Made with fresh strawberries, no preservatives.</p>
                    <div class="flex justify-between items-center">
                        <div class="text-yellow-400 text-sm">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <span class="text-gray-500 ml-1">(36)</span>
                        </div>
                        <div class="flex space-x-2">
                            <button class="text-gray-400 hover:text-green-600">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="text-gray-400 hover:text-red-500">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Orders Tab -->
    <div id="orders" class="tab-content">
        <h2 class="text-xl font-bold mb-6">My Orders</h2>
        <!-- Orders content will be loaded dynamically -->
    </div>

    <!-- Reviews Tab -->
    <div id="reviews" class="tab-content">
        <h2 class="text-xl font-bold mb-6">Customer Reviews</h2>
        <!-- Reviews content will be loaded dynamically -->
    </div>

    <!-- Statistics Tab -->
    <div id="stats" class="tab-content">
        <h2 class="text-xl font-bold mb-6">Trading Statistics</h2>
        <!-- Statistics content will be loaded dynamically -->
    </div>

    <!-- Settings Tab -->
    <div id="settings" class="tab-content">
        <h2 class="text-xl font-bold mb-6">Account Settings</h2>
        <!-- Settings content will be loaded dynamically -->
    </div>
</main>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Tab switching functionality
    const tabButtons = document.querySelectorAll('.tab-button');
    const tabContents = document.querySelectorAll('.tab-content');
    
    tabButtons.forEach(button => {
        button.addEventListener('click', () => {
            // Remove active class from all buttons and contents
            tabButtons.forEach(btn => {
                btn.classList.remove('border-b-2', 'border-green-500', 'text-green-600');
                btn.classList.add('text-gray-500');
            });
            tabContents.forEach(content => content.classList.remove('active'));
            
            // Add active class to clicked button and corresponding content
            button.classList.remove('text-gray-500');
            button.classList.add('border-b-2', 'border-green-500', 'text-green-600');
            const tabId = button.getAttribute('data-tab');
            document.getElementById(tabId).classList.add('active');
        });
    });
});
</script>

<?php require_once 'includes/footer.php'; ?> 