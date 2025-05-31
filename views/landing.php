<?php
$page_title = "Welcome";
require_once __DIR__ . '/layouts/header.php';
?>

<style>
/* Landing page specific styles */
.hero-landing {
    min-height: 100vh;
    background: linear-gradient(135deg, var(--primary-600) 0%, var(--success-500) 100%);
    display: flex;
    align-items: center;
    position: relative;
    overflow: hidden;
}

.hero-landing::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.1'%3E%3Ccircle cx='30' cy='30' r='2'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
    animation: float 20s ease-in-out infinite;
}

.hero-content {
    position: relative;
    z-index: 1;
    text-align: center;
    color: white;
    max-width: 800px;
    margin: 0 auto;
    padding: 2rem;
}

.hero-title {
    font-size: clamp(2.5rem, 8vw, 4.5rem);
    font-weight: 800;
    margin-bottom: 1.5rem;
    line-height: 1.1;
    background: linear-gradient(45deg, #ffffff, #e0f2fe);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.hero-subtitle {
    font-size: clamp(1.1rem, 3vw, 1.4rem);
    margin-bottom: 2.5rem;
    opacity: 0.95;
    line-height: 1.6;
    max-width: 600px;
    margin-left: auto;
    margin-right: auto;
}

.cta-buttons {
    display: flex;
    gap: 1rem;
    justify-content: center;
    flex-wrap: wrap;
    margin-bottom: 3rem;
}

.btn-hero {
    padding: 1rem 2rem;
    font-size: 1.1rem;
    font-weight: 600;
    border-radius: var(--radius-lg);
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    transition: all 0.3s ease;
    min-width: 180px;
    justify-content: center;
}

.btn-hero-primary {
    background: white;
    color: var(--primary-700);
    box-shadow: var(--shadow-lg);
}

.btn-hero-primary:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow-xl);
    color: var(--primary-800);
}

.btn-hero-secondary {
    background: rgba(255, 255, 255, 0.1);
    color: white;
    border: 2px solid rgba(255, 255, 255, 0.3);
    backdrop-filter: blur(10px);
}

.btn-hero-secondary:hover {
    background: rgba(255, 255, 255, 0.2);
    border-color: rgba(255, 255, 255, 0.5);
    transform: translateY(-2px);
    color: white;
}

.hero-stats {
    display: flex;
    justify-content: center;
    gap: 2rem;
    flex-wrap: wrap;
    margin-top: 3rem;
}

.stat-item {
    text-align: center;
    padding: 1rem;
    background: rgba(255, 255, 255, 0.1);
    border-radius: var(--radius-lg);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    min-width: 120px;
}

.stat-number {
    font-size: 2rem;
    font-weight: 700;
    display: block;
    margin-bottom: 0.25rem;
}

.stat-label {
    font-size: 0.9rem;
    opacity: 0.9;
}

.scroll-indicator {
    position: absolute;
    bottom: 2rem;
    left: 50%;
    transform: translateX(-50%);
    animation: bounce 2s infinite;
    color: white;
    opacity: 0.7;
}

@keyframes float {
    0%, 100% { transform: translateY(0px) rotate(0deg); }
    33% { transform: translateY(-10px) rotate(1deg); }
    66% { transform: translateY(5px) rotate(-1deg); }
}

@keyframes bounce {
    0%, 20%, 50%, 80%, 100% {
        transform: translateX(-50%) translateY(0);
    }
    40% {
        transform: translateX(-50%) translateY(-10px);
    }
    60% {
        transform: translateX(-50%) translateY(-5px);
    }
}

.feature-section {
    padding: 5rem 0;
    background: white;
}

.feature-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2rem;
    margin-top: 3rem;
}

.feature-card {
    background: white;
    padding: 2rem;
    border-radius: var(--radius-xl);
    text-align: center;
    box-shadow: var(--shadow-md);
    transition: all 0.3s ease;
    border: 1px solid var(--gray-100);
}

.feature-card:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-xl);
}

.feature-icon {
    width: 4rem;
    height: 4rem;
    margin: 0 auto 1.5rem;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    color: white;
}

.feature-icon.primary { background: var(--primary-500); }
.feature-icon.success { background: var(--success-500); }
.feature-icon.warning { background: var(--warning-500); }

@media (max-width: 768px) {
    .cta-buttons {
        flex-direction: column;
        align-items: center;
    }
    
    .hero-stats {
        gap: 1rem;
    }
    
    .stat-item {
        min-width: 100px;
        padding: 0.75rem;
    }
    
    .stat-number {
        font-size: 1.5rem;
    }
}
</style>

<section class="hero-landing">
    <div class="container">
        <div class="hero-content">
            <h1 class="hero-title">
                Welcome to Trade with Me
            </h1>
            
            <p class="hero-subtitle">
                South Africa's most trusted platform for informal trading. 
                Connect with local traders, discover amazing products, and grow your business safely.
            </p>
            
            <div class="cta-buttons">
                <a href="<?php echo SITE_URL; ?>/register" class="btn-hero btn-hero-primary">
                    <i class="fas fa-rocket"></i>
                    Start Buttering Today
                </a>
                <a href="<?php echo SITE_URL; ?>/products" class="btn-hero btn-hero-secondary">
                    <i class="fas fa-search"></i>
                    Explore Products
                </a>
            </div>
            
            <div class="hero-stats">
                <div class="stat-item">
                    <span class="stat-number">1,000+</span>
                    <span class="stat-label">Active Sellers</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">5,000+</span>
                    <span class="stat-label">Products Listed</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">R2M+</span>
                    <span class="stat-label">Total Traded Goods & Services</span>
                </div>
                <div class="stat-item">
                    <span class="stat-number">98%</span>
                    <span class="stat-label">Satisfaction</span>
                </div>
            </div>
        </div>
        
        <div class="scroll-indicator">
            <i class="fas fa-chevron-down"></i>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="feature-section">
    <div class="container">
        <div class="text-center">
            <h2 style="font-size: 2.5rem; font-weight: 700; color: var(--gray-900); margin-bottom: 1rem;">
                Why Choose Trade with Me?
            </h2>
            <p style="font-size: 1.1rem; color: var(--gray-600); max-width: 600px; margin: 0 auto;">
                We're building the future of informal trading in South Africa with trust, safety, and community at our core.
            </p>
        </div>
        
        <div class="feature-grid">
            <div class="feature-card">
                <div class="feature-icon primary">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3 style="font-size: 1.3rem; font-weight: 600; margin-bottom: 1rem; color: var(--gray-900);">
                    Safe & Secure
                </h3>
                <p style="color: var(--gray-600); line-height: 1.6;">
                    POPIA compliant platform with secure payments and verified user profiles. Trade with confidence.
                </p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon success">
                    <i class="fas fa-mobile-alt"></i>
                </div>
                <h3 style="font-size: 1.3rem; font-weight: 600; margin-bottom: 1rem; color: var(--gray-900);">
                    Mobile First
                </h3>
                <p style="color: var(--gray-600); line-height: 1.6;">
                    Access via smartphone or USSD (*134*555#). No smartphone? No problem! Trade anywhere, anytime.
                </p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon warning">
                    <i class="fas fa-handshake"></i>
                </div>
                <h3 style="font-size: 1.3rem; font-weight: 600; margin-bottom: 1rem; color: var(--gray-900);">
                    Community Driven
                </h3>
                <p style="color: var(--gray-600); line-height: 1.6;">
                    Built by South Africans, for South Africans. Supporting local entrepreneurs and informal traders.
                </p>
            </div>
        </div>
        
        <div class="text-center" style="margin-top: 3rem;">
            <a href="/register" class="btn btn-primary btn-lg">
                <i class="fas fa-user-plus"></i>
                Join Our Community
            </a>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Smooth scroll for scroll indicator
    const scrollIndicator = document.querySelector('.scroll-indicator');
    if (scrollIndicator) {
        scrollIndicator.addEventListener('click', function() {
            const featuresSection = document.querySelector('.feature-section');
            featuresSection.scrollIntoView({
                behavior: 'smooth'
            });
        });
    }
    
    // Parallax effect for hero background
    window.addEventListener('scroll', function() {
        const scrolled = window.pageYOffset;
        const rate = scrolled * -0.5;
        const heroSection = document.querySelector('.hero-landing::before');
        if (heroSection) {
            document.querySelector('.hero-landing').style.transform = `translateY(${rate}px)`;
        }
    });
    
    // Animate stats on scroll
    const observerOptions = {
        threshold: 0.5,
        rootMargin: '0px 0px -100px 0px'
    };
    
    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const statNumbers = entry.target.querySelectorAll('.stat-number');
                statNumbers.forEach(stat => {
                    const finalNumber = stat.textContent;
                    const isPercentage = finalNumber.includes('%');
                    const isRand = finalNumber.includes('R');
                    const isPlus = finalNumber.includes('+');
                    
                    let numericValue = parseInt(finalNumber.replace(/[^\d]/g, ''));
                    let current = 0;
                    const increment = numericValue / 50;
                    
                    const timer = setInterval(() => {
                        current += increment;
                        if (current >= numericValue) {
                            current = numericValue;
                            clearInterval(timer);
                        }
                        
                        let displayValue = Math.floor(current);
                        if (isRand && displayValue >= 1000) {
                            displayValue = Math.floor(displayValue / 1000) + 'M';
                        } else if (displayValue >= 1000) {
                            displayValue = Math.floor(displayValue / 1000) + 'k';
                        }
                        
                        stat.textContent = (isRand ? 'R' : '') + displayValue + (isPercentage ? '%' : '') + (isPlus ? '+' : '');
                    }, 30);
                });
                
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);
    
    const statsSection = document.querySelector('.hero-stats');
    if (statsSection) {
        observer.observe(statsSection);
    }
});
</script>

<?php require_once __DIR__ . '/layouts/footer.php'; ?>