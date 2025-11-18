<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Page Title -->
        <title>@yield('title')</title>

        <!-- Favicon Link -->
        <link
            rel="shortcut icon"
            href="{{ asset('img/favicon-dugout.png') }}"
            type="image/x-icon"
        />

        <!-- Tailwind CSS CDN Link -->
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

        <style type="text/tailwindcss">
            @theme {
            --breakpoint-3xl: 112.5rem; /* 1800px = 112.5rem */
            }
        </style>

        <!-- CSS Link -->
        <link rel="stylesheet" href="{{ asset('css/style.css') }}" />

        <!-- CSS Animate Link -->
        <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
        />

        <!-- Font Awesome Link -->
        <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        />

        <!-- Gallery blade only -->
        <!-- Fancybox CSS -->
        <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@6.0/dist/fancybox/fancybox.css"
        />
        
        <!--Event blade only-->
        <!-- International Telephone Input CSS -->
        <link rel="stylesheet" href="{{ asset('css/international-telephone-input.css')}}" />
        
        <!-- AOS Animation CDN Link -->
        <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

        <!-- Owl Carousel CDN Link -->
        <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
        />
        <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css"
        integrity="sha512-OTcub78R3msOCtY3Tc6FzeDJ8N9qvQn1Ph49ou13xgA9VsH9+LRxoFU6EqLhW4+PKRfU+/HReXmSZXHEkpYoOA=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
        />
    </head>
    <body>
        @props([
            'hero' => null,
            'heroHeight' => 'min-h-[25vh] lg:min-h-[45vh]',
            'isFullHero' => false,
        ])
        
        <div class="relative">
            <div class="relative">
                <!-- Hero Image -->
                @if($hero)
                    @if(!empty($isFullHero) && $isFullHero)
                    <div
                    class="absolute inset-0 h-screen bg-cover bg-center bg-fixed"
                    style="background-image: url('{{ asset($hero) }}')"
                    ></div>

                    <!-- Hero Image -->
                    <img
                    src="{{ asset($hero) }}"
                    alt="Hero Image"
                    class="w-full h-screen object-cover"
                    />
                    @else
                        <img
                        src="{{ asset($hero) }}"
                        alt="Hero Image"
                        class="{{ $heroHeight }} w-full object-cover"
                        />
                    @endif
                @endif

                <!-- Navigation bar -->
                @include('layouts.navigation')

                {{ $heroContent ?? '' }}
            </div>

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>

            <!-- Footer -->
            @include('layouts.footer')
        </div>
            
        <button
        id="goTopBtn"
        class="fixed bottom-5 right-5 z-10 size-10 hidden rounded-full bg-[#00000099] text-white shadow-lg transition-all duration-300 hover:bg-[#f1c22e] hover:text-[#00000099] animate__animated cursor-pointer"
        onclick="scrollToTop()"
        >
        <!--Use Your Icon Here--->
            <i class="fas fa-chevron-up text-xs"></i>
        </button>

        <script src="{{ asset('js/script.js') }}"></script>
        <script>
        const goTopBtn = document.getElementById("goTopBtn");

        window.addEventListener("scroll", () => {
            if (window.scrollY > 200) {
            goTopBtn.classList.remove("hidden");
            goTopBtn.classList.add("opacity-100");
            goTopBtn.classList.add("animate__fadeInUp");
            goTopBtn.classList.remove("animate__fadeOutDown");
            } else {
            goTopBtn.classList.remove("opacity-100");
            goTopBtn.classList.add("animate__fadeOutDown");
            goTopBtn.classList.remove("animate__fadeInUp");
            }
        });

        function scrollToTop() {
            window.scrollTo({ top: 0, behavior: "smooth" });
        }
        </script>
    </body>
</html>