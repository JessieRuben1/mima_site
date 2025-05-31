<?php
$page_title = "Home";
require_once __DIR__ . '/../layouts/header.php';
?>

<!-- Hero Section -->
<section class="hero">
    <div class="container">
        <div class="hero-content fade-in">
            <h1 class="hero-title">Welcome to <?php echo SITE_NAME; ?></h1>
            <p class="hero-subtitle">Connect, trade, and grow with South Africa's most trusted informal trading platform</p>
            
            <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
                <?php if (!$isAuthenticated): ?>
                    <a href="/register" class="btn btn-primary btn-lg">
                        <i class="fas fa-user-plus"></i>
                        Get Started
                    </a>
                    <a href="/products" class="btn btn-secondary btn-lg">
                        <i class="fas fa-search"></i>
                        Browse Products
                    </a>
                <?php else: ?>
                    <a href="/products/create" class="btn btn-primary btn-lg">
                        <i class="fas fa-plus"></i>
                        Sell Something
                    </a>
                    <a href="/products" class="btn btn-secondary btn-lg">
                        <i class="fas fa-shopping-bag"></i>
                        Shop Now
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<!-- Categories Section -->
<section style="padding: 4rem 0; background: white;">
    <div class="container">
        <div class="text-center" style="margin-bottom: 3rem;">
            <h2 style="font-size: 2.5rem; font-weight: 700; color: var(--gray-900); margin-bottom: 1rem;">
                Shop by Category
            </h2>
            <p style="font-size: 1.1rem; color: var(--gray-600); max-width: 600px; margin: 0 auto;">
                Discover amazing products from local traders across South Africa
            </p>
        </div>
        
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6" style="gap: 1.5rem;">
            <?php foreach ($categories as $category): ?>
                <a href="/products?category=<?php echo $category['slug']; ?>" class="card" style="text-decoration: none; text-align: center; padding: 2rem 1rem;">
                    <div style="font-size: 2.5rem; color: var(--primary-500); margin-bottom: 1rem;">
                        <i class="<?php echo $category['icon']; ?>"></i>
                    </div>
                    <h3 style="font-size: 1rem; font-weight: 600; color: var(--gray-900);">
                        <?php echo $category['name']; ?>
                    </h3>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Featured Products Section -->
<section style="padding: 4rem 0; background: var(--gray-50);">
    <div class="container">
        <div class="text-center" style="margin-bottom: 3rem;">
            <h2 style="font-size: 2.5rem; font-weight: 700; color: var(--gray-900); margin-bottom: 1rem;">
                Featured Products
            </h2>
            <p style="font-size: 1.1rem; color: var(--gray-600);">
                Hand-picked items from our most trusted sellers
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3" style="gap: 2rem;">
            <?php foreach ($featuredProducts as $product): ?>
                <div class="product-card">
                    <img src="<?php echo $product['image']; ?>" alt="<?php echo htmlspecialchars($product['name']); ?>" class="product-image">
                    
                    <div class="product-info">
                        <h3 class="product-title"><?php echo htmlspecialchars($product['name']); ?></h3>
                        <div class="product-price">R <?php echo number_format($product['price'], 2); ?></div>
                        <div class="product-location">
                            <i class="fas fa-map-marker-alt" style="margin-right: 0.5rem; color: var(--gray-400);"></i>
                            <?php echo htmlspecialchars($product['location']); ?>
                        </div>
                        
                        <div style="margin-top: 1rem; display: flex; gap: 0.5rem;">
                            <a href="/products/<?php echo $product['id']; ?>" class="btn btn-primary" style="flex: 1; justify-content: center;">
                                View Details
                            </a>
                            <button class="btn btn-secondary" style="padding: 0.75rem;">
                                <i class="fas fa-heart"></i>
                            </button>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        
        <div class="text-center" style="margin-top: 3rem;">
            <a href="/products" class="btn btn-primary btn-lg">
                View All Products
                <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
</section>

<!-- How It Works Section -->
<section style="padding: 4rem 0; background: white;">
    <div class="container">
        <div class="text-center" style="margin-bottom: 3rem;">
            <h2 style="font-size: 2.5rem; font-weight: 700; color: var(--gray-900); margin-bottom: 1rem;">
                How It Works
            </h2>
            <p style="font-size: 1.1rem; color: var(--gray-600);">
                Start trading in three simple steps
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3" style="gap: 2rem;">
            <div class="text-center">
                <div style="width: 4rem; height: 4rem; background: var(--primary-100); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem;">
                    <i class="fas fa-user-plus" style="font-size: 1.5rem; color: var(--primary-600);"></i>
                </div>
                <h3 style="font-size: 1.3rem; font-weight: 600; margin-bottom: 1rem;">1. Sign Up</h3>
                <p style="color: var(--gray-600);">Create your free account and verify your phone number to get started.</p>
            </div>
            
            <div class="text-center">
                <div style="width: 4rem; height: 4rem; background: var(--success-100); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem;">
                    <i class="fas fa-store" style="font-size: 1.5rem; color: var(--success-600);"></i>
                </div>
                <h3 style="font-size: 1.3rem; font-weight: 600; margin-bottom: 1rem;">2. List or Browse</h3>
                <p style="color: var(--gray-600);">List your products for sale or browse thousands of items from local sellers.</p>
            </div>
            
            <div class="text-center">
                <div style="width: 4rem; height: 4rem; background: var(--warning-100); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem;">
                    <i class="fas fa-handshake" style="font-size: 1.5rem; color: var(--warning-500);"></i>
                </div>
                <h3 style="font-size: 1.3rem; font-weight: 600; margin-bottom: 1rem;">3. Trade Safely</h3>
                <p style="color: var(--gray-600);">Connect with other traders and complete transactions safely using our secure platform.</p>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section style="padding: 4rem 0; background: var(--primary-600); color: white;">
    <div class="container">
        <div class="grid grid-cols-2 md:grid-cols-4" style="gap: 2rem; text-align: center;">
            <div>
                <div style="font-size: 3rem; font-weight: 700; margin-bottom: 0.5rem;">1,000+</div>
                <div style="opacity: 0.9;">Active Traders</div>
            </div>
            <div>
                <div style="font-size: 3rem; font-weight: 700; margin-bottom: 0.5rem;">5,000+</div>
                <div style="opacity: 0.9;">Products Listed</div>
            </div>
            <div>
                <div style="font-size: 3rem; font-weight: 700; margin-bottom: 0.5rem;">R2M+</div>
                <div style="opacity: 0.9;">Total Traded</div>
            </div>
            <div>
                <div style="font-size: 3rem; font-weight: 700; margin-bottom: 0.5rem;">98%</div>
                <div style="opacity: 0.9;">Satisfaction Rate</div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<?php if (!$isAuthenticated): ?>
<section style="padding: 4rem 0; background: var(--gray-50);">
    <div class="container text-center">
        <h2 style="font-size: 2.5rem; font-weight: 700; color: var(--gray-900); margin-bottom: 1rem;">
            Ready to Start Trading?
        </h2>
        <p style="font-size: 1.1rem; color: var(--gray-600); margin-bottom: 2rem;">
            Join thousands of South African traders who are already growing their businesses with us.
        </p>
        <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
            <a href="/register" class="btn btn-primary btn-lg">
                <i class="fas fa-rocket"></i>
                Start Selling Today
            </a>
            <a href="/help" class="btn btn-secondary btn-lg">
                <i class="fas fa-question-circle"></i>
                Learn More
            </a>
        </div>
    </div>
</section>
<?php endif; ?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Add smooth scrolling for internal links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
    
    // Add fade-in animation to elements as they come into view
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('fade-in');
            }
        });
    }, observerOptions);
    
    // Observe all cards and sections
    document.querySelectorAll('.card, section').forEach(el => {
        observer.observe(el);
    });
});
</script>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>