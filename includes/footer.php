</main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="grid grid-cols-1 md:grid-cols-4" style="gap: 2rem; margin-bottom: 2rem;">
                <!-- Brand Column -->
                <div>
                    <div style="display: flex; align-items: center; margin-bottom: 1rem;">
                        <i class="fas fa-handshake" style="font-size: 1.5rem; color: var(--primary-400); margin-right: 0.5rem;"></i>
                        <h5 style="color: white; font-size: 1.2rem; margin: 0;"><?php echo SITE_NAME; ?></h5>
                    </div>
                    <p style="color: var(--gray-400); margin-bottom: 1rem; line-height: 1.6;">
                        Empowering informal traders across South Africa with secure digital marketplaces and financial inclusion.
                    </p>
                    <div style="display: flex; gap: 1rem;">
                        <a href="#" style="color: var(--gray-400); font-size: 1.2rem; transition: color 0.2s ease;">
                            <i class="fab fa-facebook"></i>
                        </a>
                        <a href="#" style="color: var(--gray-400); font-size: 1.2rem; transition: color 0.2s ease;">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" style="color: var(--gray-400); font-size: 1.2rem; transition: color 0.2s ease;">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" style="color: var(--gray-400); font-size: 1.2rem; transition: color 0.2s ease;">
                            <i class="fab fa-linkedin"></i>
                        </a>
                    </div>
                </div>
                
                <!-- Quick Links -->
                <div>
                    <h5>Quick Links</h5>
                    <ul style="list-style: none; padding: 0;">
                        <li style="margin-bottom: 0.5rem;">
                            <a href="<?php echo SITE_URL; ?>">Home</a>
                        </li>
                        <li style="margin-bottom: 0.5rem;">
                            <a href="<?php echo SITE_URL; ?>/products">Browse Products</a>
                        </li>
                        <li style="margin-bottom: 0.5rem;">
                            <a href="<?php echo SITE_URL; ?>/register">Sign Up</a>
                        </li>
                        <li style="margin-bottom: 0.5rem;">
                            <a href="<?php echo SITE_URL; ?>/help">Help Center</a>
                        </li>
                    </ul>
                </div>
                
                <!-- Categories -->
                <div>
                    <h5>Categories</h5>
                    <ul style="list-style: none; padding: 0;">
                        <li style="margin-bottom: 0.5rem;">
                            <a href="<?php echo SITE_URL; ?>/products?category=electronics">Electronics</a>
                        </li>
                        <li style="margin-bottom: 0.5rem;">
                            <a href="<?php echo SITE_URL; ?>/products?category=clothing">Clothing</a>
                        </li>
                        <li style="margin-bottom: 0.5rem;">
                            <a href="<?php echo SITE_URL; ?>/products?category=agricultural">Agricultural</a>
                        </li>
                        <li style="margin-bottom: 0.5rem;">
                            <a href="<?php echo SITE_URL; ?>/products?category=services">Services</a>
                        </li>
                    </ul>
                </div>
                
                <!-- Contact Info -->
                <div>
                    <h5>Contact Us</h5>
                    <div style="display: flex; align-items: flex-start; margin-bottom: 1rem; color: var(--gray-400);">
                        <i class="fas fa-envelope" style="margin-right: 0.75rem; margin-top: 0.25rem; color: var(--primary-400);"></i>
                        <div>
                            <div>support@tradewithme.com</div>
                            <div style="font-size: 0.9rem; margin-top: 0.25rem;">24/7 Support</div>
                        </div>
                    </div>
                    <div style="display: flex; align-items: flex-start; margin-bottom: 1rem; color: var(--gray-400);">
                        <i class="fas fa-phone" style="margin-right: 0.75rem; margin-top: 0.25rem; color: var(--primary-400);"></i>
                        <div>
                            <div>+27 11 123 4567</div>
                            <div style="font-size: 0.9rem; margin-top: 0.25rem;">Mon-Fri 8AM-6PM</div>
                        </div>
                    </div>
                    <div style="display: flex; align-items: flex-start; color: var(--gray-400);">
                        <i class="fas fa-mobile-alt" style="margin-right: 0.75rem; margin-top: 0.25rem; color: var(--primary-400);"></i>
                        <div>
                            <div>*134*555# (USSD)</div>
                            <div style="font-size: 0.9rem; margin-top: 0.25rem;">Mobile Access</div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Bottom Bar -->
            <div style="border-top: 1px solid var(--gray-700); padding-top: 2rem; display: flex; flex-wrap: wrap; justify-content: space-between; align-items: center; gap: 1rem;">
                <div style="color: var(--gray-400);">
                    &copy; <?php echo date('Y'); ?> <?php echo SITE_NAME; ?>. All rights reserved.
                </div>
                
                <div style="display: flex; gap: 1.5rem; flex-wrap: wrap;">
                    <a href="<?php echo SITE_URL; ?>/privacy" style="color: var(--gray-400); text-decoration: none; font-size: 0.9rem;">
                        Privacy Policy
                    </a>
                    <a href="<?php echo SITE_URL; ?>/terms" style="color: var(--gray-400); text-decoration: none; font-size: 0.9rem;">
                        Terms of Service
                    </a>
                    <a href="<?php echo SITE_URL; ?>/cookies" style="color: var(--gray-400); text-decoration: none; font-size: 0.9rem;">
                        Cookie Policy
                    </a>
                </div>
            </div>
            
            <!-- Trust Badges -->
            <div style="margin-top: 2rem; padding-top: 2rem; border-top: 1px solid var(--gray-700); text-align: center;">
                <div style="display: flex; justify-content: center; align-items: center; gap: 2rem; flex-wrap: wrap; margin-bottom: 1rem;">
                    <div style="display: flex; align-items: center; color: var(--gray-400);">
                        <i class="fas fa-shield-alt" style="color: var(--success-400); margin-right: 0.5rem;"></i>
                        <span style="font-size: 0.9rem;">POPIA Compliant</span>
                    </div>
                    <div style="display: flex; align-items: center; color: var(--gray-400);">
                        <i class="fas fa-lock" style="color: var(--success-400); margin-right: 0.5rem;"></i>
                        <span style="font-size: 0.9rem;">SSL Secured</span>
                    </div>
                    <div style="display: flex; align-items: center; color: var(--gray-400);">
                        <i class="fas fa-mobile-alt" style="color: var(--success-400); margin-right: 0.5rem;"></i>
                        <span style="font-size: 0.9rem;">Mobile Optimized</span>
                    </div>
                    <div style="display: flex; align-items: center; color: var(--gray-400);">
                        <i class="fas fa-users" style="color: var(--success-400); margin-right: 0.5rem;"></i>
                        <span style="font-size: 0.9rem;">Community Verified</span>
                    </div>
                </div>
                <p style="color: var(--gray-500); font-size: 0.8rem; margin: 0;">
                    Made with <i class="fas fa-heart" style="color: var(--error-400);"></i> for South African traders
                </p>
            </div>
        </div>
    </footer>

    <!-- Back to Top Button -->
    <button id="backToTop" style="
        position: fixed;
        bottom: 2rem;
        right: 2rem;
        width: 3rem;
        height: 3rem;
        background: var(--primary-600);
        color: white;
        border: none;
        border-radius: 50%;
        cursor: pointer;
        display: none;
        align-items: center;
        justify-content: center;
        box-shadow: var(--shadow-lg);
        transition: all 0.3s ease;
        z-index: 1000;
    " title="Back to top">
        <i class="fas fa-chevron-up"></i>
    </button>

    <!-- Scripts -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Back to top functionality
        const backToTopButton = document.getElementById('backToTop');
        
        window.addEventListener('scroll', function() {
            if (window.pageYOffset > 300) {
                backToTopButton.style.display = 'flex';
            } else {
                backToTopButton.style.display = 'none';
            }
        });
        
        backToTopButton.addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
        
        // Hover effects for back to top button
        backToTopButton.addEventListener('mouseenter', function() {
            this.style.background = 'var(--primary-700)';
            this.style.transform = 'scale(1.1)';
        });
        
        backToTopButton.addEventListener('mouseleave', function() {
            this.style.background = 'var(--primary-600)';
            this.style.transform = 'scale(1)';
        });
        
        // Footer social links hover effects
        document.querySelectorAll('.footer a').forEach(link => {
            link.addEventListener('mouseenter', function() {
                this.style.color = 'white';
            });
            
            link.addEventListener('mouseleave', function() {
                this.style.color = 'var(--gray-400)';
            });
        });
        
        // Lazy load footer content
        const footerObserver = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, { threshold: 0.1 });
        
        document.querySelectorAll('.footer > .container > *').forEach(el => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(20px)';
            el.style.transition = 'all 0.6s ease';
            footerObserver.observe(el);
        });
    });
    </script>

    <!-- Additional page-specific scripts -->
    <?php if (isset($additional_js)): ?>
        <?php foreach ($additional_js as $js): ?>
            <script src="<?php echo $js; ?>"></script>
        <?php endforeach; ?>
    <?php endif; ?>
</body>
</html>