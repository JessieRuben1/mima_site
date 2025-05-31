<?php
$page_title = "Transactions";
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
    .transaction-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
    }
    .animate-pulse {
        animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
    }
    @keyframes pulse {
        0%, 100% {
            opacity: 1;
        }
        50% {
            opacity: 0.5;
        }
    }
</style>

<main class="container mx-auto p-4">
    <div class="flex flex-col lg:flex-row gap-6">
        <!-- Transaction List Section -->
        <section class="lg:w-2/3">
            <div class="bg-white rounded-lg shadow p-6 mb-6">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-dark">Your Transactions</h2>
                    <div class="relative">
                        <select class="appearance-none bg-gray-100 border border-gray-300 rounded px-4 py-2 pr-8 focus:outline-none focus:ring-2 focus:ring-primary">
                            <option>All Transactions</option>
                            <option>Completed</option>
                            <option>Pending</option>
                            <option>Failed</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <i class="fas fa-chevron-down"></i>
                        </div>
                    </div>
                </div>

                <!-- Transaction Cards -->
                <div class="space-y-4">
                    <!-- Completed Transaction -->
                    <div class="transaction-card bg-white border border-gray-200 rounded-lg p-4 transition duration-300">
                        <div class="flex justify-between items-start">
                            <div class="flex items-center space-x-3">
                                <div class="bg-green-100 p-3 rounded-full">
                                    <i class="fas fa-check-circle text-green-500"></i>
                                </div>
                                <div>
                                    <h3 class="font-semibold">Order #12345</h3>
                                    <p class="text-sm text-gray-500">Completed • 12 May 2023</p>
                                </div>
                            </div>
                            <span class="font-bold">R 1,250.00</span>
                        </div>
                        <div class="mt-4 pt-4 border-t border-gray-100">
                            <div class="flex justify-between items-center">
                                <div class="flex items-center space-x-2">
                                    <img src="https://via.placeholder.com/40" alt="Product" class="w-10 h-10 rounded">
                                    <div>
                                        <p class="text-sm font-medium">Wireless Headphones</p>
                                        <p class="text-xs text-gray-500">Qty: 1</p>
                                    </div>
                                </div>
                                <div class="flex space-x-2">
                                    <button class="text-primary hover:text-secondary text-sm flex items-center space-x-1">
                                        <i class="fas fa-redo"></i>
                                        <span>Reorder</span>
                                    </button>
                                    <button class="text-primary hover:text-secondary text-sm flex items-center space-x-1">
                                        <i class="fas fa-file-invoice"></i>
                                        <span>Invoice</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pending Transaction -->
                    <div class="transaction-card bg-white border border-gray-200 rounded-lg p-4 transition duration-300">
                        <div class="flex justify-between items-start">
                            <div class="flex items-center space-x-3">
                                <div class="bg-yellow-100 p-3 rounded-full">
                                    <i class="fas fa-clock text-yellow-500"></i>
                                </div>
                                <div>
                                    <h3 class="font-semibold">Order #12346</h3>
                                    <p class="text-sm text-gray-500">Pending Payment • 15 May 2023</p>
                                </div>
                            </div>
                            <span class="font-bold">R 850.00</span>
                        </div>
                        <div class="mt-4 pt-4 border-t border-gray-100">
                            <div class="flex justify-between items-center">
                                <div class="flex items-center space-x-2">
                                    <img src="https://via.placeholder.com/40" alt="Product" class="w-10 h-10 rounded">
                                    <div>
                                        <p class="text-sm font-medium">Smart Watch</p>
                                        <p class="text-xs text-gray-500">Qty: 1</p>
                                    </div>
                                </div>
                                <div class="flex space-x-2">
                                    <button class="bg-primary text-white px-3 py-1 rounded text-sm hover:bg-secondary">
                                        Pay Now
                                    </button>
                                    <button class="text-red-500 hover:text-red-700 text-sm flex items-center space-x-1">
                                        <i class="fas fa-times"></i>
                                        <span>Cancel</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Failed Transaction -->
                    <div class="transaction-card bg-white border border-gray-200 rounded-lg p-4 transition duration-300">
                        <div class="flex justify-between items-start">
                            <div class="flex items-center space-x-3">
                                <div class="bg-red-100 p-3 rounded-full">
                                    <i class="fas fa-times-circle text-red-500"></i>
                                </div>
                                <div>
                                    <h3 class="font-semibold">Order #12347</h3>
                                    <p class="text-sm text-gray-500">Payment Failed • 18 May 2023</p>
                                </div>
                            </div>
                            <span class="font-bold">R 1,450.00</span>
                        </div>
                        <div class="mt-4 pt-4 border-t border-gray-100">
                            <div class="flex justify-between items-center">
                                <div class="flex items-center space-x-2">
                                    <img src="https://via.placeholder.com/40" alt="Product" class="w-10 h-10 rounded">
                                    <div>
                                        <p class="text-sm font-medium">Bluetooth Speaker</p>
                                        <p class="text-xs text-gray-500">Qty: 2</p>
                                    </div>
                                </div>
                                <div class="flex space-x-2">
                                    <button class="bg-primary text-white px-3 py-1 rounded text-sm hover:bg-secondary">
                                        Try Again
                                    </button>
                                    <button class="text-gray-500 hover:text-gray-700 text-sm flex items-center space-x-1">
                                        <i class="fas fa-question-circle"></i>
                                        <span>Help</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pagination -->
                <div class="mt-6 flex justify-center">
                    <nav class="inline-flex rounded-md shadow">
                        <a href="#" class="px-3 py-2 rounded-l-md border border-gray-300 bg-white text-gray-500 hover:bg-gray-50">
                            <i class="fas fa-chevron-left"></i>
                        </a>
                        <a href="#" class="px-3 py-2 border-t border-b border-gray-300 bg-white text-primary font-medium">1</a>
                        <a href="#" class="px-3 py-2 border border-gray-300 bg-white text-gray-500 hover:bg-gray-50">2</a>
                        <a href="#" class="px-3 py-2 border border-gray-300 bg-white text-gray-500 hover:bg-gray-50">3</a>
                        <a href="#" class="px-3 py-2 rounded-r-md border border-gray-300 bg-white text-gray-500 hover:bg-gray-50">
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    </nav>
                </div>
            </div>
        </section>

        <!-- Transaction Summary Section -->
        <section class="lg:w-1/3">
            <div class="bg-white rounded-lg shadow p-6 mb-6">
                <h2 class="text-xl font-bold text-dark mb-4">Transaction Summary</h2>
                <div class="space-y-4">
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600">Total Transactions</span>
                        <span class="font-semibold">24</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600">Completed</span>
                        <span class="text-green-500 font-semibold">18</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600">Pending</span>
                        <span class="text-yellow-500 font-semibold">4</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-gray-600">Failed</span>
                        <span class="text-red-500 font-semibold">2</span>
                    </div>
                    <div class="pt-4 border-t border-gray-200">
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">Total Spent</span>
                            <span class="font-bold text-lg">R 15,750.00</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Activity -->
            <div class="bg-white rounded-lg shadow p-6">
                <h2 class="text-xl font-bold text-dark mb-4">Recent Activity</h2>
                <div class="space-y-4">
                    <div class="flex items-start space-x-3">
                        <div class="bg-blue-100 p-2 rounded-full">
                            <i class="fas fa-shopping-cart text-blue-500"></i>
                        </div>
                        <div>
                            <p class="text-sm font-medium">New order placed</p>
                            <p class="text-xs text-gray-500">2 hours ago</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-3">
                        <div class="bg-green-100 p-2 rounded-full">
                            <i class="fas fa-check-circle text-green-500"></i>
                        </div>
                        <div>
                            <p class="text-sm font-medium">Payment successful</p>
                            <p class="text-xs text-gray-500">5 hours ago</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-3">
                        <div class="bg-yellow-100 p-2 rounded-full">
                            <i class="fas fa-clock text-yellow-500"></i>
                        </div>
                        <div>
                            <p class="text-sm font-medium">Order processing</p>
                            <p class="text-xs text-gray-500">1 day ago</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Transaction filter handling
    const filterSelect = document.querySelector('select');
    filterSelect.addEventListener('change', function() {
        const selectedFilter = this.value;
        // Here you would normally filter the transactions based on the selected value
        console.log('Filtering transactions by:', selectedFilter);
    });

    // Pagination handling
    const paginationLinks = document.querySelectorAll('nav a');
    paginationLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            // Here you would normally handle pagination
            console.log('Pagination clicked:', this.textContent.trim());
        });
    });
});
</script>

<?php require_once 'includes/footer.php'; ?> 