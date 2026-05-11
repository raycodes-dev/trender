<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>T-Render — Simple Trenders</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'inter': ['Inter', 'sans-serif'],
                    },
                    colors: {
                        primary: {
                            50: '#f0f0ff',
                            100: '#e0e0ff',
                            200: '#c4b5fd',
                            300: '#a78bfa',
                            400: '#8b5cf6',
                            500: '#7c3aed',
                            600: '#6d28d9',
                            700: '#5b21b6',
                            800: '#4c1d95',
                            900: '#3b0764',
                        },
                        accent: {
                            400: '#f472b6',
                            500: '#ec4899',
                            600: '#db2777',
                        }
                    }
                }
            }
        }
    </script>
    <style>
        * { font-family: 'Inter', sans-serif; }

        .gradient-text {
            background: linear-gradient(135deg, #7c3aed, #ec4899, #8b5cf6);
            background-size: 200% 200%;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: gradientShift 4s ease infinite;
        }

        .hero-gradient {
            background: radial-gradient(ellipse at 20% 50%, rgba(124, 58, 237, 0.15) 0%, transparent 50%),
            radial-gradient(ellipse at 80% 20%, rgba(236, 72, 153, 0.12) 0%, transparent 50%),
            radial-gradient(ellipse at 50% 80%, rgba(139, 92, 246, 0.1) 0%, transparent 50%);
        }

        .card-glow:hover {
            box-shadow: 0 0 40px rgba(124, 58, 237, 0.15), 0 0 80px rgba(236, 72, 153, 0.08);
        }

        .float-animation {
            animation: float 6s ease-in-out infinite;
        }

        .float-animation-delay {
            animation: float 6s ease-in-out 2s infinite;
        }

        .pulse-glow {
            animation: pulseGlow 3s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }

        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        @keyframes pulseGlow {
            0%, 100% { opacity: 0.4; }
            50% { opacity: 0.8; }
        }

        .grid-bg {
            background-image:
                linear-gradient(rgba(124, 58, 237, 0.03) 1px, transparent 1px),
                linear-gradient(90deg, rgba(124, 58, 237, 0.03) 1px, transparent 1px);
            background-size: 60px 60px;
        }

        .video-card-overlay {
            background: linear-gradient(to top, rgba(0,0,0,0.8) 0%, rgba(0,0,0,0.2) 50%, transparent 100%);
        }

        .scroll-smooth { scroll-behavior: smooth; }

        .nav-blur {
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
        }

        .step-connector {
            background: linear-gradient(to right, #7c3aed, #ec4899);
        }

        .pricing-popular {
            background: linear-gradient(135deg, #7c3aed, #6d28d9);
        }

        @keyframes slideUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .animate-slide-up {
            animation: slideUp 0.6s ease forwards;
        }

        .stagger-1 { animation-delay: 0.1s; opacity: 0; }
        .stagger-2 { animation-delay: 0.2s; opacity: 0; }
        .stagger-3 { animation-delay: 0.3s; opacity: 0; }
        .stagger-4 { animation-delay: 0.4s; opacity: 0; }
        .stagger-5 { animation-delay: 0.5s; opacity: 0; }
        .stagger-6 { animation-delay: 0.6s; opacity: 0; }

        .btn-primary {
            background: linear-gradient(135deg, #7c3aed, #6d28d9);
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #8b5cf6, #7c3aed);
            transform: translateY(-2px);
            box-shadow: 0 10px 40px rgba(124, 58, 237, 0.4);
        }

        .btn-secondary {
            border: 1px solid rgba(124, 58, 237, 0.3);
            transition: all 0.3s ease;
        }

        .btn-secondary:hover {
            border-color: rgba(124, 58, 237, 0.8);
            background: rgba(124, 58, 237, 0.05);
        }

        /* Mobile menu */
        .mobile-menu {
            transform: translateX(100%);
            transition: transform 0.3s ease;
        }
        .mobile-menu.open {
            transform: translateX(0);
        }

        /* Stats counter */
        .stat-number {
            font-variant-numeric: tabular-nums;
        }
    </style>
</head>
<body class="bg-gray-950 text-white overflow-x-hidden scroll-smooth">

<!-- Navigation -->
<nav id="navbar" class="fixed top-0 left-0 right-0 z-50 nav-blur bg-gray-950/70 border-b border-white/5 transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16 md:h-20">
            <!-- Logo -->
            <a href="#" class="flex items-center gap-2 group">
                <div class="w-9 h-9 rounded-lg bg-gradient-to-br from-primary-500 to-accent-500 flex items-center justify-center group-hover:scale-110 transition-transform">
                    <i data-lucide="play" class="w-4 h-4 text-white fill-white"></i>
                </div>
                <span class="text-xl font-bold">T-<span class="gradient-text">Render</span></span>
            </a>

            <!-- Desktop Nav -->
            <div class="hidden md:flex items-center gap-8">
                <a href="#features" class="text-sm text-gray-400 hover:text-white transition-colors">Features</a>
                <a href="#contact" class="text-sm text-gray-400 hover:text-white transition-colors">Contact</a>
                <a href="#showcase" class="text-sm text-gray-400 hover:text-white transition-colors">Showcase</a>
                <a href="#team" class="text-sm text-gray-400 hover:text-white transition-colors">Our Team</a>
                <a href="#testimonials" class="text-sm text-gray-400 hover:text-white transition-colors">Reviews</a>
            </div>

            <!-- CTA -->
            <div class="hidden md:flex items-center">
                <a href="#contact" class="btn-primary px-5 py-2.5 rounded-lg text-sm font-semibold text-white">Get Started</a>
            </div>

            <!-- Mobile menu button -->
            <button id="menuBtn" class="md:hidden p-2 text-gray-400 hover:text-white">
                <i data-lucide="menu" class="w-6 h-6"></i>
            </button>
        </div>
    </div>
</nav>

<!-- Mobile Menu -->
<div id="mobileMenu" class="mobile-menu fixed inset-0 z-[60] bg-gray-950/98 nav-blur flex flex-col p-6 pt-20">
    <button id="closeMenu" class="absolute top-5 right-5 p-2 text-gray-400 hover:text-white">
        <i data-lucide="x" class="w-6 h-6"></i>
    </button>
    <div class="flex flex-col gap-6 mt-8">
        <a href="#features" class="text-2xl font-semibold text-gray-300 hover:text-white mobile-link">Features</a>
        <a href="#contact" class="text-2xl font-semibold text-gray-300 hover:text-white mobile-link">Contact</a>
        <a href="#showcase" class="text-2xl font-semibold text-gray-300 hover:text-white mobile-link">Showcase</a>
        <a href="#team" class="text-2xl font-semibold text-gray-300 hover:text-white mobile-link">Our Team</a>
        <a href="#testimonials" class="text-2xl font-semibold text-gray-300 hover:text-white mobile-link">Reviews</a>
    </div>
    <div class="mt-auto flex flex-col gap-3">
        <a href="#contact" class="text-center py-3 rounded-lg btn-primary font-semibold text-white mobile-link">Get Started</a>
    </div>
</div>

{{$slot}}

<!-- Footer -->
<footer class="border-t border-white/5 bg-gray-950">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-10">
            <!-- Brand -->
            <div class="sm:col-span-2 lg:col-span-1">
                <a href="#" class="flex items-center gap-2 mb-4">
                    <div class="w-9 h-9 rounded-lg bg-gradient-to-br from-primary-500 to-accent-500 flex items-center justify-center">
                        <i data-lucide="play" class="w-4 h-4 text-white fill-white"></i>
                    </div>
                    <span class="text-xl font-bold">T-<span class="gradient-text">Render</span></span>
                </a>
                <p class="text-sm text-gray-500 leading-relaxed mb-6">AI-powered creative solutions for videos, designs, and thumbnails. Simple Trenders — making creativity accessible.</p>
                <div class="flex items-center gap-3">
                    <a href="#" class="w-9 h-9 rounded-lg bg-gray-900 border border-white/5 flex items-center justify-center text-gray-500 hover:text-white hover:border-white/20 transition-all">
                        <i data-lucide="twitter" class="w-4 h-4"></i>
                    </a>
                    <a href="#" class="w-9 h-9 rounded-lg bg-gray-900 border border-white/5 flex items-center justify-center text-gray-500 hover:text-white hover:border-white/20 transition-all">
                        <i data-lucide="instagram" class="w-4 h-4"></i>
                    </a>
                    <a href="#" class="w-9 h-9 rounded-lg bg-gray-900 border border-white/5 flex items-center justify-center text-gray-500 hover:text-white hover:border-white/20 transition-all">
                        <i data-lucide="linkedin" class="w-4 h-4"></i>
                    </a>
                    <a href="#" class="w-9 h-9 rounded-lg bg-gray-900 border border-white/5 flex items-center justify-center text-gray-500 hover:text-white hover:border-white/20 transition-all">
                        <i data-lucide="youtube" class="w-4 h-4"></i>
                    </a>
                </div>
            </div>

            <!-- Services -->
            <div>
                <h4 class="text-sm font-semibold text-white mb-4">Services</h4>
                <ul class="space-y-3">
                    <li><a href="#features" class="text-sm text-gray-500 hover:text-white transition-colors">Features</a></li>
                    <li><a href="#team" class="text-sm text-gray-500 hover:text-white transition-colors">Our Team</a></li>
                    <li><a href="#showcase" class="text-sm text-gray-500 hover:text-white transition-colors">Showcase</a></li>
                    <li><a href="#contact" class="text-sm text-gray-500 hover:text-white transition-colors">Contact</a></li>
                </ul>
            </div>

            <!-- Resources -->
            <div>
                <h4 class="text-sm font-semibold text-white mb-4">Resources</h4>
                <ul class="space-y-3">
                    <li><a href="#" class="text-sm text-gray-500 hover:text-white transition-colors">Blog</a></li>
                    <li><a href="#" class="text-sm text-gray-500 hover:text-white transition-colors">Tutorials</a></li>
                    <li><a href="#" class="text-sm text-gray-500 hover:text-white transition-colors">Help Center</a></li>
                    <li><a href="#" class="text-sm text-gray-500 hover:text-white transition-colors">Community</a></li>
                </ul>
            </div>

            <!-- Company -->
            <div>
                <h4 class="text-sm font-semibold text-white mb-4">Company</h4>
                <ul class="space-y-3">
                    <li><a href="#team" class="text-sm text-gray-500 hover:text-white transition-colors">About</a></li>
                    <li><a href="#" class="text-sm text-gray-500 hover:text-white transition-colors">Privacy Policy</a></li>
                    <li><a href="#" class="text-sm text-gray-500 hover:text-white transition-colors">Terms of Service</a></li>
                    <li><a href="#contact" class="text-sm text-gray-500 hover:text-white transition-colors">Contact</a></li>
                </ul>
            </div>
        </div>

        <div class="border-t border-white/5 mt-12 pt-8 flex flex-col sm:flex-row items-center justify-between gap-4">
            <p class="text-sm text-gray-600">&copy; 2026 T-Render. All rights reserved.</p>
            <p class="text-sm text-gray-600">Trenders — Made with <span class="text-primary-400">♥️</span> and AI</p>
        </div>
    </div>
</footer>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/6a0016dc06a7a01c3394a840/1jo85ijtr';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
    })();
</script>
<!--End of Tawk.to Script-->
<script src="{{asset('script.js')}}"></script>
</body>
</html>
