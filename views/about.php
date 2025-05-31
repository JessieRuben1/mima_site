<?php
$page_title = "About Us";
require_once 'includes/header.php';
?>

<style>
    .language-selector:hover .language-dropdown {
        display: block;
    }
    
    .data-saving-mode {
        background-color: #f0fdf4;
        border-left: 4px solid #10b981;
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
        width: 75%;
    }
    
    @media (max-width: 640px) {
        .mobile-hidden {
            display: none;
        }
    }
</style>

<!-- Hero Section -->
<section class="bg-gradient-to-r from-green-500 to-green-700 text-white py-12">
    <div class="container mx-auto px-4 flex flex-col md:flex-row items-center">
        <div class="md:w-1/2 mb-8 md:mb-0">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">Connect, Trade & Grow</h2>
            <p class="text-lg mb-6">Empowering informal traders across South Africa with secure digital marketplaces and financial inclusion.</p>
            
            <div class="flex flex-col sm:flex-row space-y-3 sm:space-y-0 sm:space-x-4">
                <a href="registration.php" class="bg-white text-green-700 font-semibold px-6 py-3 rounded-lg text-center hover:bg-gray-100 transition">
                    <i class="fas fa-store mr-2"></i> Join as Trader
                </a>
                <a href="products.php" class="bg-transparent border-2 border-white font-semibold px-6 py-3 rounded-lg text-center hover:bg-white hover:text-green-700 transition">
                    <i class="fas fa-shopping-bag mr-2"></i> Start Shopping
                </a>
            </div>
            
            <div class="mt-6 flex items-center">
                <i class="fas fa-phone-alt mr-2"></i>
                <span>Or dial *134*555# for USSD access</span>
            </div>
        </div>
        
        <div class="md:w-1/2 flex justify-center">
            <img src="https://placeholder.com/500x300" alt="Happy traders" class="rounded-lg shadow-xl w-full max-w-md" loading="lazy">
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="bg-white py-8">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 text-center">
            <div class="p-4">
                <div class="text-3xl font-bold text-green-600">1,000+</div>
                <div class="text-gray-600">Traders Connected</div>
            </div>
            <div class="p-4">
                <div class="text-3xl font-bold text-green-600">R2,500+</div>
                <div class="text-gray-600">Avg. Income Increase</div>
            </div>
            <div class="p-4">
                <div class="text-3xl font-bold text-green-600">90%</div>
                <div class="text-gray-600">Reduction in Theft</div>
            </div>
            <div class="p-4">
                <div class="text-3xl font-bold text-green-600">95%</div>
                <div class="text-gray-600">Satisfaction Rate</div>
            </div>
        </div>
    </div>
</section>

<!-- How It Works -->
<section id="how-it-works" class="py-12 bg-gray-50">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-12">How <?php echo SITE_NAME; ?> Works</h2>
        
        <div class="grid md:grid-cols-3 gap-8">
            <div class="bg-white p-6 rounded-lg shadow-sm hover:shadow-md transition">
                <div class="bg-green-100 w-12 h-12 rounded-full flex items-center justify-center mb-4">
                    <i class="fas fa-user-check text-green-600 text-xl"></i>
                </div>
                <h3 class="font-bold text-xl mb-2">1. Create Profile</h3>
                <p class="text-gray-600">Verified traders create profiles with products, prices, and location.</p>
            </div>
            
            <div class="bg-white p-6 rounded-lg shadow-sm hover:shadow-md transition">
                <div class="bg-green-100 w-12 h-12 rounded-full flex items-center justify-center mb-4">
                    <i class="fas fa-money-bill-wave text-green-600 text-xl"></i>
                </div>
                <h3 class="font-bold text-xl mb-2">2. Secure Payments</h3>
                <p class="text-gray-600">Customers pay via mobile money (M-Pesa) or cash on delivery.</p>
            </div>
            
            <div class="bg-white p-6 rounded-lg shadow-sm hover:shadow-md transition">
                <div class="bg-green-100 w-12 h-12 rounded-full flex items-center justify-center mb-4">
                    <i class="fas fa-truck text-green-600 text-xl"></i>
                </div>
                <h3 class="font-bold text-xl mb-2">3. Delivery & Growth</h3>
                <p class="text-gray-600">Products are delivered safely, building trust through ratings.</p>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section id="features" class="py-12 bg-white">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-12">Our Key Features</h2>
        
        <div class="grid md:grid-cols-2 gap-8">
            <div class="flex items-start">
                <div class="bg-green-100 p-3 rounded-full mr-4">
                    <i class="fas fa-mobile-alt text-green-600 text-xl"></i>
                </div>
                <div>
                    <h3 class="font-bold text-xl mb-2">USSD Access</h3>
                    <p class="text-gray-600">No smartphone? No problem! Access our marketplace through simple USSD menus.</p>
                </div>
            </div>
            
            <div class="flex items-start">
                <div class="bg-green-100 p-3 rounded-full mr-4">
                    <i class="fas fa-shield-alt text-green-600 text-xl"></i>
                </div>
                <div>
                    <h3 class="font-bold text-xl mb-2">POPIA Compliant</h3>
                    <p class="text-gray-600">Your data is protected under South Africa's strict privacy laws.</p>
                </div>
            </div>
            
            <div class="flex items-start">
                <div class="bg-green-100 p-3 rounded-full mr-4">
                    <i class="fas fa-comments text-green-600 text-xl"></i>
                </div>
                <div>
                    <h3 class="font-bold text-xl mb-2">Multilingual Support</h3>
                    <p class="text-gray-600">Available in IsiZulu, IsiXhosa, Sesotho and English.</p>
                </div>
            </div>
            
            <div class="flex items-start">
                <div class="bg-green-100 p-3 rounded-full mr-4">
                    <i class="fas fa-balance-scale text-green-600 text-xl"></i>
                </div>
                <div>
                    <h3 class="font-bold text-xl mb-2">Dispute Resolution</h3>
                    <p class="text-gray-600">48-hour mediation system for any transaction issues.</p>
                </div>
            </div>
        </div>
        
        <div class="mt-12 bg-green-50 p-6 rounded-lg">
            <h3 class="font-bold text-xl mb-4">Payment Options</h3>
            <div class="flex flex-wrap gap-4">
                <div class="flex items-center bg-white px-4 py-2 rounded">
                    <i class="fas fa-money-bill-wave text-green-600 mr-2"></i>
                    <span>Cash on Delivery</span>
                </div>
                <div class="flex items-center bg-white px-4 py-2 rounded">
                    <img src="https://placeholder.com/20x20" alt="M-Pesa" class="w-5 h-5 mr-2" loading="lazy">
                    <span>M-Pesa</span>
                </div>
                <div class="flex items-center bg-white px-4 py-2 rounded">
                    <img src="https://placeholder.com/20x20" alt="Bank Transfer" class="w-5 h-5 mr-2" loading="lazy">
                    <span>Bank Transfer</span>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once 'includes/footer.php'; ?> 