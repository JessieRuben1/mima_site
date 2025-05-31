<?php
$page_title = "Welcome";
require_once 'includes/header.php';
?>

<style>
    /* New Animations */
    @keyframes float {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-20px); }
    }
    
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(40px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-float {
        animation: float 3s ease-in-out infinite;
    }

    .animate-fade-in-up {
        animation: fadeInUp 1.5s ease-out;
    }

    .scroll-smooth {
        scroll-behavior: smooth;
    }
</style>

<!-- Hero Section (Full Screen) -->
<section class="min-h-screen bg-gradient-to-r from-blue-500 to-green-500 text-white flex flex-col justify-center items-center px-4">
    <div class="text-center">
        <h1 class="text-4xl md:text-6xl lg:text-8xl font-extrabold mb-4 animate-fade-in-up">
            <span class="block animate-float">Welcome to <?php echo SITE_NAME; ?></span>
        </h1>
        <p class="text-lg md:text-xl mb-8 animate-fade-in-up animation-delay-300">Seize the Market, Risk Less and Earn More!</p>
        <a href="home.php" 
           class="bg-white text-blue-600 px-8 py-4 rounded-full font-semibold hover:bg-gray-100 transition transform hover:scale-105 animate-fade-in-up animation-delay-500 inline-block">
            Start Shopping
        </a>
    </div>
</section>

<?php require_once 'includes/footer.php'; ?> 