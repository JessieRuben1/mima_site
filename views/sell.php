<?php
$page_title = "Sell";
require_once 'includes/header.php';
?>

<style>
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    @keyframes slideIn {
        from { transform: translateX(100%); }
        to { transform: translateX(0); }
    }
    
    .fade-in {
        animation: fadeIn 0.3s ease-out forwards;
    }
    
    .dropzone {
        border: 2px dashed #3b82f6;
        border-radius: 0.5rem;
        transition: all 0.3s;
    }
    
    .dropzone.active {
        border-color: #10b981;
        background-color: #f0fdf4;
    }
    
    .preview-image {
        transition: all 0.3s;
    }
    
    .preview-image:hover {
        transform: scale(1.05);
    }
    
    .listing-item {
        transition: all 0.2s;
    }
    
    .listing-item:hover {
        background-color: #f8fafc;
    }
    
    /* Price input styling */
    .price-input:focus-within {
        border-color: #3b82f6;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.3);
    }
    
    /* Category selector styling */
    .category-selector {
        transition: all 0.3s;
    }
    
    .category-selector:hover {
        background-color: #f3f4f6;
    }
    
    /* Loading spinner */
    .loader {
        border-top-color: #3b82f6;
        animation: spin 1s linear infinite;
    }
    
    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
    
    /* Low-data mode styles */
    body.low-data-mode img:not(.essential-image),
    body.low-data-mode .preview-image,
    body.low-data-mode .bg-image {
        display: none !important;
    }
    
    body.low-data-mode {
        background-image: none !important;
    }
    
    body.low-data-mode .low-data-hidden {
        display: none !important;
    }
    
    body.low-data-mode .low-data-show {
        display: block !important;
    }
    
    .handshake-logo {
        font-size: 2rem;
        margin-right: 0.5rem;
    }
    
    /* New listing notification */
    .new-listing-notification {
        position: fixed;
        top: 100px;
        right: 20px;
        background: #10b981;
        color: white;
        padding: 15px;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        z-index: 1000;
        display: none;
        animation: slideIn 0.3s ease-out;
    }
    
    .listing-badge {
        position: absolute;
        top: -8px;
        right: -8px;
        background: #ef4444;
        color: white;
        border-radius: 50%;
        width: 20px;
        height: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 12px;
    }
</style>

<!-- New listing notification -->
<div id="newListingNotification" class="new-listing-notification">
    <div class="flex items-center">
        <i class="fas fa-check-circle mr-2"></i>
        <span>Your item has been listed successfully!</span>
        <button id="closeNotification" class="ml-4">
            <i class="fas fa-times"></i>
        </button>
    </div>
</div>

<main class="container mx-auto p-4">
    <section id="sell" class="py-8">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-3xl font-bold">Sell Your Items</h2>
            <div class="flex items-center space-x-2">
                <span class="text-green-600 font-medium">
                    <i class="fas fa-coins mr-1"></i> Balance: R0.00
                </span>
                <button class="bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded transition-colors">
                    Withdraw
                </button>
            </div>
        </div>
        
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Sell Form Column -->
            <div class="lg:col-span-2">
                <div class="bg-white p-6 rounded-xl shadow-md">
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center mr-3">
                            <i class="fas fa-plus text-blue-600"></i>
                        </div>
                        <h3 class="text-xl font-semibold">List a New Item</h3>
                    </div>
                    
                    <form id="sellForm" class="space-y-4" action="controllers/sell_controller.php" method="POST" enctype="multipart/form-data">
                        <!-- Title Input -->
                        <div>
                            <label for="itemTitle" class="block text-sm font-medium text-gray-700 mb-1">Item Title*</label>
                            <input 
                                type="text" 
                                id="itemTitle" 
                                name="title"
                                placeholder="e.g. Brand New iPhone 15 Pro Max 256GB" 
                                class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all"
                                required
                            >
                        </div>
                        
                        <!-- Category Selection -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Category*</label>
                            <select 
                                name="category"
                                class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all"
                                required
                            >
                                <option value="">Select a category</option>
                                <option value="electronics">Electronics</option>
                                <option value="clothing">Clothing</option>
                                <option value="home">Home & Garden</option>
                                <option value="agricultural">Agricultural</option>
                                <option value="services">Services</option>
                                <option value="vehicles">Vehicles</option>
                            </select>
                        </div>
                        
                        <!-- Price Input -->
                        <div>
                            <label for="itemPrice" class="block text-sm font-medium text-gray-700 mb-1">Price (R)*</label>
                            <div class="price-input flex items-center border rounded-lg focus-within:ring-2 focus-within:ring-blue-500 focus-within:border-blue-500 transition-all">
                                <span class="px-3 text-gray-500">R</span>
                                <input 
                                    type="number" 
                                    id="itemPrice" 
                                    name="price"
                                    placeholder="0.00" 
                                    class="w-full p-3 border-0 focus:ring-0"
                                    required
                                >
                            </div>
                        </div>
                        
                        <!-- Description -->
                        <div>
                            <label for="itemDescription" class="block text-sm font-medium text-gray-700 mb-1">Description*</label>
                            <textarea 
                                id="itemDescription" 
                                name="description"
                                rows="4" 
                                placeholder="Describe your item in detail..." 
                                class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all"
                                required
                            ></textarea>
                        </div>
                        
                        <!-- Image Upload -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Images*</label>
                            <div class="dropzone p-6 text-center cursor-pointer" id="imageDropzone">
                                <input type="file" name="images[]" multiple accept="image/*" class="hidden" id="imageInput">
                                <i class="fas fa-cloud-upload-alt text-4xl text-blue-500 mb-2"></i>
                                <p class="text-gray-600">Drag & drop images here or click to browse</p>
                                <p class="text-sm text-gray-500 mt-1">Max 5 images, 5MB each</p>
                            </div>
                            <div id="imagePreview" class="grid grid-cols-5 gap-2 mt-4"></div>
                        </div>
                        
                        <!-- Location -->
                        <div>
                            <label for="itemLocation" class="block text-sm font-medium text-gray-700 mb-1">Location*</label>
                            <select 
                                name="location"
                                id="itemLocation" 
                                class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all"
                                required
                            >
                                <option value="">Select your location</option>
                                <option value="johannesburg">Johannesburg</option>
                                <option value="hillbrow">Hillbrow</option>
                                <option value="berea">Berea</option>
                                <option value="soweto">Soweto</option>
                                <option value="jhb-cbd">JHB CBD</option>
                                <option value="yeoville">Yeoville</option>
                                <option value="alexander">Alexander</option>
                                <option value="troyville">Troyville</option>
                                <option value="bellueve">Bellueve</option>
                                <option value="jeppetown">JeppeTown</option>
                                <option value="fordburg">Fordburg</option>
                                <option value="pageview">Pageview</option>
                                <option value="cape-town">Cape Town</option>
                                <option value="durban">Durban</option>
                                <option value="pretoria">Pretoria</option>
                            </select>
                        </div>
                        
                        <!-- Submit Button -->
                        <div class="pt-4">
                            <button 
                                type="submit" 
                                class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 transition-colors flex items-center justify-center"
                            >
                                <i class="fas fa-plus-circle mr-2"></i>
                                List Item
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            
            <!-- Active Listings Column -->
            <div class="lg:col-span-1">
                <div class="bg-white p-6 rounded-xl shadow-md">
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center mr-3">
                            <i class="fas fa-list text-green-600"></i>
                        </div>
                        <h3 class="text-xl font-semibold">Active Listings</h3>
                    </div>
                    
                    <div class="space-y-4">
                        <!-- Sample Active Listing -->
                        <div class="listing-item p-4 border rounded-lg relative">
                            <div class="flex items-start space-x-3">
                                <img src="https://placeholder.com/100x100" alt="Item" class="w-20 h-20 object-cover rounded">
                                <div class="flex-1">
                                    <h4 class="font-medium">iPhone 15 Pro Max</h4>
                                    <p class="text-sm text-gray-600">Electronics</p>
                                    <p class="text-green-600 font-medium">R15,999</p>
                                    <div class="flex items-center space-x-2 mt-2">
                                        <span class="text-sm text-gray-500">Views: 45</span>
                                        <span class="text-sm text-gray-500">•</span>
                                        <span class="text-sm text-gray-500">Listed 2 days ago</span>
                                    </div>
                                </div>
                                <button class="text-gray-400 hover:text-red-500">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>
                            </div>
                        </div>
                        
                        <!-- More listings... -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Image upload handling
    const dropzone = document.getElementById('imageDropzone');
    const imageInput = document.getElementById('imageInput');
    const imagePreview = document.getElementById('imagePreview');
    
    dropzone.addEventListener('click', () => imageInput.click());
    
    dropzone.addEventListener('dragover', (e) => {
        e.preventDefault();
        dropzone.classList.add('active');
    });
    
    dropzone.addEventListener('dragleave', () => {
        dropzone.classList.remove('active');
    });
    
    dropzone.addEventListener('drop', (e) => {
        e.preventDefault();
        dropzone.classList.remove('active');
        handleFiles(e.dataTransfer.files);
    });
    
    imageInput.addEventListener('change', (e) => {
        handleFiles(e.target.files);
    });
    
    function handleFiles(files) {
        if (files.length > 5) {
            alert('Maximum 5 images allowed');
            return;
        }
        
        Array.from(files).forEach(file => {
            if (file.size > 5 * 1024 * 1024) {
                alert('File size must be less than 5MB');
                return;
            }
            
            const reader = new FileReader();
            reader.onload = (e) => {
                const div = document.createElement('div');
                div.className = 'relative';
                div.innerHTML = `
                    <img src="${e.target.result}" class="preview-image w-full h-24 object-cover rounded">
                    <button class="absolute top-1 right-1 bg-red-500 text-white rounded-full w-6 h-6 flex items-center justify-center">
                        <i class="fas fa-times"></i>
                    </button>
                `;
                imagePreview.appendChild(div);
            };
            reader.readAsDataURL(file);
        });
    }
    
    // Notification handling
    const notification = document.getElementById('newListingNotification');
    const closeNotification = document.getElementById('closeNotification');
    
    closeNotification.addEventListener('click', () => {
        notification.style.display = 'none';
    });
    
    // Form submission
    const form = document.getElementById('sellForm');
    form.addEventListener('submit', (e) => {
        e.preventDefault();
        // Add your form submission logic here
        notification.style.display = 'block';
        setTimeout(() => {
            notification.style.display = 'none';
        }, 3000);
    });
});
</script>

<?php require_once 'includes/footer.php'; ?> 