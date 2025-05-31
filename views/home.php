<?php
$page_title = "Home";
require_once 'includes/header.php';
?>

<style>
    .animate-pulse-custom {
        animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
    }
    @keyframes pulse {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.5; }
    }
    .category-icon {
        font-size: 1.5rem;
        margin-bottom: 0.5rem;
    }
    .category-card {
        transition: all 0.3s ease;
    }
    .category-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }
    .fade-in {
        animation: fadeIn 0.3s ease-in-out;
    }
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }
</style>

<main>
    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-blue-500 to-green-500 text-white text-center py-12 px-4">
        <h1 class="text-4xl md:text-5xl font-extrabold mb-4 animate-pulse-custom">Connect, Trade, and Grow</h1>
        <p class="text-lg md:text-xl mb-6">Empowering informal traders across South Africa with secure digital marketplaces and financial inclusion</p>
        <button onclick="scrollToSection('categories')" class="bg-white text-blue-600 px-6 py-3 rounded-full font-semibold hover:bg-gray-100 transition">Start Shopping</button>
        <div class="md:w-1/2 flex justify-center">
            <img src="https://placeholder.com/500x300" alt="Happy traders" class="rounded-lg shadow-xl w-full max-w-md" loading="lazy">
        </div>
    </section>
    
    <!-- Categories Section -->
    <section id="categories" class="py-12 bg-white">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-extrabold text-gray-900 mb-12 text-center">Shop by Category</h2>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6">
                <!-- Electronics -->
                <a href="products.php?category=electronics" class="category-card bg-white rounded-lg shadow-md overflow-hidden transition duration-300 cursor-pointer">
                    <div class="p-4 text-center">
                        <div class="flex justify-center mb-3">
                            <i class="fas fa-laptop text-blue-500 text-4xl"></i>
                        </div>
                        <h3 class="text-lg font-medium text-gray-900">Electronics</h3>
                    </div>
                </a>
                
                <!-- Vehicles -->
                <a href="products.php?category=vehicles" class="category-card bg-white rounded-lg shadow-md overflow-hidden transition duration-300 cursor-pointer">
                    <div class="p-4 text-center">
                        <div class="flex justify-center mb-3">
                            <i class="fas fa-car text-red-500 text-4xl"></i>
                        </div>
                        <h3 class="text-lg font-medium text-gray-900">Vehicles</h3>
                    </div>
                </a>
                
                <!-- Clothing -->
                <a href="products.php?category=clothing" class="category-card bg-white rounded-lg shadow-md overflow-hidden transition duration-300 cursor-pointer">
                    <div class="p-4 text-center">
                        <div class="flex justify-center mb-3">
                            <i class="fas fa-tshirt text-purple-500 text-4xl"></i>
                        </div>
                        <h3 class="text-lg font-medium text-gray-900">Clothing</h3>
                    </div>
                </a>
                
                <!-- Home -->
                <a href="products.php?category=home" class="category-card bg-white rounded-lg shadow-md overflow-hidden transition duration-300 cursor-pointer">
                    <div class="p-4 text-center">
                        <div class="flex justify-center mb-3">
                            <i class="fas fa-home text-green-500 text-4xl"></i>
                        </div>
                        <h3 class="text-lg font-medium text-gray-900">Home</h3>
                    </div>
                </a>
                
                <!-- Agricultural -->
                <a href="products.php?category=agricultural" class="category-card bg-white rounded-lg shadow-md overflow-hidden transition duration-300 cursor-pointer">
                    <div class="p-4 text-center">
                        <div class="flex justify-center mb-3">
                            <i class="fas fa-tractor text-yellow-500 text-4xl"></i>
                        </div>
                        <h3 class="text-lg font-medium text-gray-900">Agricultural</h3>
                    </div>
                </a>
                
                <!-- Services -->
                <a href="products.php?category=services" class="category-card bg-white rounded-lg shadow-md overflow-hidden transition duration-300 cursor-pointer">
                    <div class="p-4 text-center">
                        <div class="flex justify-center mb-3">
                            <i class="fas fa-concierge-bell text-indigo-500 text-4xl"></i>
                        </div>
                        <h3 class="text-lg font-medium text-gray-900">Services</h3>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <!-- Featured Products -->
    <section class="py-8 container mx-auto px-4">
        <h2 class="text-3xl font-bold mb-4">Featured Products</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
            <?php
            // TODO: Replace with database query
            $featured_products = [
                ['name' => 'Goat Meat (Fresh)', 'price' => 'R120/kg', 'image' => 'https://via.placeholder.com/150?text=Featured1'],
                ['name' => 'Second-hand clothes', 'price' => 'R20/unit', 'image' => 'https://via.placeholder.com/150?text=Product2'],
                ['name' => 'Bag of potatoes', 'price' => 'R40/kg', 'image' => 'https://via.placeholder.com/150?text=Product2'],
                ['name' => 'Jumper wires', 'price' => 'R30/unit', 'image' => 'https://via.placeholder.com/150?text=Product3'],
                ['name' => 'Homemade Jewellery', 'price' => 'R50.00/unit', 'image' => 'https://via.placeholder.com/150?text=Product4']
            ];

            foreach ($featured_products as $product): ?>
                <div class="bg-white p-4 rounded shadow hover:shadow-lg transition">
                    <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>" loading="lazy" class="w-full h-40 object-cover mb-2 rounded">
                    <h3 class="text-xl font-semibold"><?php echo $product['name']; ?></h3>
                    <p class="text-blue-600 font-medium"><?php echo $product['price']; ?></p>
                    <button class="bg-blue-500 text-white px-4 py-2 mt-2 rounded hover:bg-blue-600 transition">View</button>
                </div>
            <?php endforeach; ?>
        </div>

        <h2 class="text-3xl font-bold my-8">Promotions</h2>
        <div class="bg-white p-4 rounded shadow hover:shadow-lg transition">
            <img src="https://via.placeholder.com/600x200?text=Promotion" alt="Promotion" class="w-full h-40 object-cover rounded">
        </div>

        <h2 class="text-3xl font-bold my-8">Recently Listed</h2>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <?php
            // TODO: Replace with database query
            $recent_products = [
                ['name' => 'Head scarfs', 'price' => 'R15.00', 'image' => 'https://via.placeholder.com/150?text=Recent1'],
                ['name' => 'Wigs', 'price' => 'R80.00', 'image' => 'https://via.placeholder.com/150?text=Recent2'],
                ['name' => 'Light bulbs', 'price' => 'R40.00/unit', 'image' => 'https://via.placeholder.com/150?text=Recent3']
            ];

            foreach ($recent_products as $product): ?>
                <div class="bg-white p-4 rounded shadow hover:shadow-lg transition">
                    <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>" class="w-full h-40 object-cover mb-2 rounded">
                    <h3 class="text-xl font-semibold"><?php echo $product['name']; ?></h3>
                    <p class="text-blue-600 font-medium"><?php echo $product['price']; ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
</main>

<script>
function scrollToSection(sectionId) {
    document.getElementById(sectionId).scrollIntoView({ behavior: 'smooth' });
}
</script>

<?php require_once 'includes/footer.php'; ?> 