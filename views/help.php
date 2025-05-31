<?php
$page_title = "Help Center";
require_once 'includes/header.php';
?>

<style>
    .scrollbar-hide::-webkit-scrollbar {
        display: none;
    }
    .scrollbar-hide {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }
    .accordion-content {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.3s ease-out;
    }
    .active .accordion-content {
        max-height: 500px;
        transition: max-height 0.3s ease-in;
    }
    .active .accordion-icon {
        transform: rotate(180deg);
    }
</style>

<main class="container mx-auto p-4">
    <div class="bg-white rounded-lg shadow p-6 mb-6">
        <!-- Hero Section -->
        <section class="text-center py-8 mb-8">
            <h1 class="text-3xl md:text-4xl font-bold text-dark mb-4">How can we help you today?</h1>
            <div class="max-w-2xl mx-auto relative">
                <input type="text" placeholder="Search help articles..." class="w-full p-4 pl-12 rounded-lg border border-gray-300 focus:ring-2 focus:ring-primary focus:border-primary">
                <i class="fas fa-search absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
            </div>
        </section>

        <!-- Quick Help Section -->
        <section class="mb-10">
            <h2 class="text-xl font-semibold mb-6">Quick Help</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <a href="#account-help" class="bg-gray-50 hover:bg-gray-100 p-4 rounded-lg flex items-center space-x-3 transition">
                    <div class="bg-primary bg-opacity-10 p-3 rounded-full">
                        <i class="fas fa-user-circle text-primary text-lg"></i>
                    </div>
                    <span>Account & Profile</span>
                </a>
                <a href="#trading-help" class="bg-gray-50 hover:bg-gray-100 p-4 rounded-lg flex items-center space-x-3 transition">
                    <div class="bg-green-500 bg-opacity-10 p-3 rounded-full">
                        <i class="fas fa-exchange-alt text-green-500 text-lg"></i>
                    </div>
                    <span>Trading Process</span>
                </a>
                <a href="#payment-help" class="bg-gray-50 hover:bg-gray-100 p-4 rounded-lg flex items-center space-x-3 transition">
                    <div class="bg-purple-500 bg-opacity-10 p-3 rounded-full">
                        <i class="fas fa-money-bill-wave text-purple-500 text-lg"></i>
                    </div>
                    <span>Payments & Fees</span>
                </a>
                <a href="#safety-help" class="bg-gray-50 hover:bg-gray-100 p-4 rounded-lg flex items-center space-x-3 transition">
                    <div class="bg-yellow-500 bg-opacity-10 p-3 rounded-full">
                        <i class="fas fa-shield-alt text-yellow-500 text-lg"></i>
                    </div>
                    <span>Safety Tips</span>
                </a>
                <a href="#disputes-help" class="bg-gray-50 hover:bg-gray-100 p-4 rounded-lg flex items-center space-x-3 transition">
                    <div class="bg-red-500 bg-opacity-10 p-3 rounded-full">
                        <i class="fas fa-exclamation-triangle text-red-500 text-lg"></i>
                    </div>
                    <span>Disputes & Issues</span>
                </a>
                <a href="#contact-help" class="bg-gray-50 hover:bg-gray-100 p-4 rounded-lg flex items-center space-x-3 transition">
                    <div class="bg-blue-500 bg-opacity-10 p-3 rounded-full">
                        <i class="fas fa-headset text-blue-500 text-lg"></i>
                    </div>
                    <span>Contact Support</span>
                </a>
            </div>
        </section>

        <!-- FAQ Section -->
        <section class="mb-10">
            <h2 class="text-xl font-semibold mb-6">Frequently Asked Questions</h2>
            
            <div id="account-help" class="mb-8">
                <h3 class="text-lg font-medium mb-4 text-dark">Account & Profile</h3>
                <div class="space-y-3">
                    <div class="accordion-item border border-gray-200 rounded-lg overflow-hidden">
                        <button class="accordion-header w-full text-left p-4 flex justify-between items-center hover:bg-gray-50">
                            <span>How do I create an account?</span>
                            <i class="accordion-icon fas fa-chevron-down transition-transform"></i>
                        </button>
                        <div class="accordion-content bg-gray-50">
                            <div class="p-4">
                                <p>To create an account:</p>
                                <ol class="list-decimal pl-5 space-y-2 mt-2">
                                    <li>Tap the "Sign Up" button on the home screen</li>
                                    <li>Enter your mobile number and verify with the OTP sent</li>
                                    <li>Complete your profile with basic information</li>
                                    <li>Set up your preferred payment methods</li>
                                    <li>Start trading with other users in your community!</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item border border-gray-200 rounded-lg overflow-hidden">
                        <button class="accordion-header w-full text-left p-4 flex justify-between items-center hover:bg-gray-50">
                            <span>How do I reset my password?</span>
                            <i class="accordion-icon fas fa-chevron-down transition-transform"></i>
                        </button>
                        <div class="accordion-content bg-gray-50">
                            <div class="p-4">
                                <p>If you've forgotten your password:</p>
                                <ol class="list-decimal pl-5 space-y-2 mt-2">
                                    <li>Go to the login screen and tap "Forgot Password"</li>
                                    <li>Enter the mobile number associated with your account</li>
                                    <li>Check your SMS for the verification code</li>
                                    <li>Enter the code and create a new password</li>
                                    <li>Log in with your new password</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div id="trading-help" class="mb-8">
                <h3 class="text-lg font-medium mb-4 text-dark">Trading Process</h3>
                <div class="space-y-3">
                    <div class="accordion-item border border-gray-200 rounded-lg overflow-hidden">
                        <button class="accordion-header w-full text-left p-4 flex justify-between items-center hover:bg-gray-50">
                            <span>How do I initiate a trade?</span>
                            <i class="accordion-icon fas fa-chevron-down transition-transform"></i>
                        </button>
                        <div class="accordion-content bg-gray-50">
                            <div class="p-4">
                                <p>To start a trade:</p>
                                <ol class="list-decimal pl-5 space-y-2 mt-2">
                                    <li>Browse products or search for items you want</li>
                                    <li>When you find an item, tap "Trade for This"</li>
                                    <li>Select items from your inventory to offer in exchange</li>
                                    <li>Add a message explaining your offer</li>
                                    <li>Submit your trade request and wait for the other user to respond</li>
                                </ol>
                                <p class="mt-2 text-sm text-gray-600">Tip: Be clear about what you're offering and why it's a fair trade.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item border border-gray-200 rounded-lg overflow-hidden">
                        <button class="accordion-header w-full text-left p-4 flex justify-between items-center hover:bg-gray-50">
                            <span>What happens when someone accepts my trade?</span>
                            <i class="accordion-icon fas fa-chevron-down transition-transform"></i>
                        </button>
                        <div class="accordion-content bg-gray-50">
                            <div class="p-4">
                                <p>When your trade is accepted:</p>
                                <ol class="list-decimal pl-5 space-y-2 mt-2">
                                    <li>You'll receive a notification that your trade was accepted</li>
                                    <li>The items involved will be temporarily locked in both accounts</li>
                                    <li>You'll need to arrange a meetup or delivery with the other trader</li>
                                    <li>After both parties confirm the exchange, the trade is complete</li>
                                    <li>Items will be permanently transferred to the new owners</li>
                                </ol>
                                <p class="mt-2 text-sm text-gray-600">Remember to meet in safe, public locations for in-person exchanges.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Accordion functionality
    const accordionHeaders = document.querySelectorAll('.accordion-header');
    
    accordionHeaders.forEach(header => {
        header.addEventListener('click', () => {
            const accordionItem = header.parentElement;
            accordionItem.classList.toggle('active');
        });
    });
});
</script>

<?php require_once 'includes/footer.php'; ?> 