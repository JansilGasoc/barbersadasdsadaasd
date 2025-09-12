<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Benz - Barbershop Booking System</title>
    <!-- Scripts -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lucide/0.263.1/umd/lucide.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

        * {
            font-family: 'Inter', sans-serif;
        }

        .hero-gradient {
            background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 50%, #1a1a1a 100%);
        }

        .glass-effect {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .service-card {
            transition: all 0.3s ease;
        }

        .service-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
        }

        .floating-animation {
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-20px);
            }
        }

        .fade-in {
            opacity: 0;
            transform: translateY(30px);
            animation: fadeInUp 0.8s ease forwards;
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .stagger-1 {
            animation-delay: 0.1s;
        }

        .stagger-2 {
            animation-delay: 0.2s;
        }

        .stagger-3 {
            animation-delay: 0.3s;
        }

        .stagger-4 {
            animation-delay: 0.4s;
        }
    </style>
</head>

<body class="bg-black text-white overflow-x-hidden">
    <!-- Navigation -->
    <nav class="fixed top-0 w-full z-50 glass-effect">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">

                <a href="{{ route('wew') }}"class="flex items-center space-x-2">
                    <img src="{{ asset('storage/Logo.png') }}" alt="App Logo" class="h-12 w-12 rounded-full">
                    <i data-lucide="scissors" class="w-8 h-8 text-yellow-400"></i>
                    <span
                        class="text-xl font-bold bg-gradient-to-r from-yellow-400 to-orange-500 hidden lg:flex bg-clip-text text-transparent">Premium
                        Cuts</span>
                </a>

                <!-- Main Navigation -->
                <div class="flex items-center gap-6">
                    <a href="#home" class="hover:text-yellow-400">Home</a>
                    <a href="#services" class="hover:text-yellow-400">Services</a>

                    <!-- Laravel Auth Navigation -->
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}"
                                class="px-4 py-1.5 rounded-sm text-sm border border-transparent hover:border-yellow-400 transition">
                                Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}"
                                class="px-4 py-1.5 rounded-sm text-sm border border-transparent hover:border-yellow-400 transition">
                                Log in
                            </a>
                        @endauth
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <section id="home"class="relative min-h-screen hero-gradient flex items-center justify-center overflow-hidden">

        <div class="relative z-10 text-center max-w-5xl mx-auto px-6">

            </a>
            <h1 class="text-6xl md:text-8xl font-bold mb-6 fade-in">

                <span class="bg-gradient-to-r from-yellow-400 via-orange-500 to-red-500 bg-clip-text text-transparent">
                    Benz Mercader
                </span>
                <br>
                <span class="text-white">Barbershop</span>
            </h1>

            <p class="text-xl md:text-2xl text-gray-300 mb-8 max-w-2xl mx-auto leading-relaxed fade-in stagger-1">
                Experience the art of traditional barbering with modern convenience. Open 7Am to 7Pm
            </p>

            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center fade-in stagger-2">
                <a href="{{ route('appointments.form') }}"
                    class="group relative px-8 py-4 bg-gray-500 px-3 from-yellow-400 to-orange-500 text-black font-semibold rounded-lg text-lg hover:scale-105 transform transition-all duration-300 hover:shadow-2xl hover:shadow-yellow-500/25">
                    <span class="relative z-10">Book Appointment</span>
                    <div
                        class="absolute inset-0 bg-gradient-to-r from-orange-500 to-red-500 rounded-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    </div>
                </a>
            </div>
        </div>
    </section>


    <section id="services" class="pt-32 pb-20 max-w-7xl mx-auto px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2
                class="text-4xl md:text-5xl font-bold mb-4 bg-gradient-to-r from-yellow-400 via-orange-500 to-red-500 bg-clip-text text-transparent">
                Our Services</h2>
            <p class="text-gray-300 max-w-2xl mx-auto">Choose from a range of grooming services designed to give you the
                sharp, clean look you deserve.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Service Card -->
            <div
                class="service-card glass-effect flex flex-col items-center text-center rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300">
                <img src="{{ asset('storage/image/lowfade.jpg') }}" alt="Low Taper Fade"
                    class="h-32 w-32 rounded-full mb-4 object-cover">
                <h3 class="text-xl font-semibold mb-2">Low Taper Fade</h3>
                <span class="text-yellow-400 font-bold text-lg">₱50</span>
            </div>

            <!-- Service Card -->
            <div
                class="service-card glass-effect flex flex-col items-center text-center rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300">
                <img src="{{ asset('storage/image/armycut.jpg') }}" alt="Army Cut"
                    class="h-32 w-32 rounded-full mb-4 object-cover">
                <h3 class="text-xl font-semibold mb-2">Army Cut</h3>
                <span class="text-yellow-400 font-bold text-lg">₱50</span>
            </div>

            <!-- Service Card -->
            <div
                class="service-card glass-effect flex flex-col items-center text-center rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300">
                <img src="{{ asset('storage/image/buzzcut.jpg') }}" alt="Buzz Cut"
                    class="h-32 w-32 rounded-full mb-4 object-cover">
                <h3 class="text-xl font-semibold mb-2">Buzz Cut</h3>
                <span class="text-yellow-400 font-bold text-lg">₱60</span>
            </div>

            <!-- Service Card -->
            <div
                class="service-card glass-effect flex flex-col items-center text-center rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300">
                <img src="{{ asset('storage/image/burstfade.jpg') }}" alt="Buzz Cut"
                    class="h-32 w-32 rounded-full mb-4 object-cover">
                <h3 class="text-xl font-semibold mb-2">Burst fade</h3>
                <span class="text-yellow-400 font-bold text-lg">₱50</span>
            </div>

            <!-- Service Card -->
            <div
                class="service-card glass-effect flex flex-col items-center text-center rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300">
                <img src="{{ asset('storage/image/lowtapermullet.jpg') }}" alt="Buzz Cut"
                    class="h-32 w-32 rounded-full mb-4 object-cover">
                <h3 class="text-xl font-semibold mb-2">Low Taper Mullet</h3>
                <span class="text-yellow-400 font-bold text-lg">₱60</span>
            </div>

            <!-- Service Card -->
            <div
                class="service-card glass-effect flex flex-col items-center text-center rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300">
                <img src="{{ asset('storage/image/MulletFade.jpg') }}" alt="Buzz Cut"
                    class="h-32 w-32 rounded-full mb-4 object-cover">
                <h3 class="text-xl font-semibold mb-2">Mullet Fade</h3>
                <span class="text-yellow-400 font-bold text-lg">₱60</span>
            </div>


            <div
                class="service-card glass-effect flex flex-col items-center text-center rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300">
                <img src="{{ asset('storage/image/curlyblowouttaper.jpg') }}" alt="Buzz Cut"
                    class="h-32 w-32 rounded-full mb-4 object-cover">
                <h3 class="text-xl font-semibold mb-2">curly blowout taper</h3>
                <span class="text-yellow-400 font-bold text-lg">₱60</span>
            </div>

            <div
                class="service-card glass-effect flex flex-col items-center text-center rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300">
                <img src="{{ asset('storage/image/blowouttaper.jpg') }}" alt="Buzz Cut"
                    class="h-32 w-32 rounded-full mb-4 object-cover">
                <h3 class="text-xl font-semibold mb-2">blowout taper</h3>
                <span class="text-yellow-400 font-bold text-lg">₱60</span>
            </div>

            <div
                class="service-card glass-effect flex flex-col items-center text-center rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300">
                <img src="{{ asset('storage/image/angualarfringe.jpg') }}" alt="Buzz Cut"
                    class="h-32 w-32 rounded-full mb-4 object-cover">
                <h3 class="text-xl font-semibold mb-2">Angular Fringe</h3>
                <span class="text-yellow-400 font-bold text-lg">₱60</span>
            </div>

        </div>

        <div class="text-center mt-16">
            <a href="{{ route('appointments.form') }}"
                class="px-8 py-4 bg-gradient-to-r from-yellow-400 to-orange-500 text-black font-semibold rounded-lg text-lg hover:scale-105 transform transition-all duration-300 hover:shadow-2xl hover:shadow-yellow-500/25">
                Book Now
            </a>
        </div>
    </section>

    <script>
        lucide.createIcons();
    </script>


</body>

</html>
