<!-- Navbar Starts -->
<nav
    class="navbar fixed top-0 w-full flex items-center justify-between bg-transparent px-6 md:px-20 lg:px-10 xl:px-30 3xl:px-40 py-6 transition-all duration-300 ease-in-out bg-gradient-to-b from-black from-10% to-transparent to-100% z-50"
>
    <!-- Dugout Logo -->
    <a href="{{ route('index') }}" class="mx-auto lg:mx-0">
    <img
        src="{{ asset('img/dugout-logo-white_new.png') }}"
        alt="Dugout logo"
        class="logo h-20 md:h-[100px] lg:h-[89.98px] w-full transform duration-300 ease-in-out z-50"
    />
    </a>

    <!-- Hamburger Icon (mobile only) -->
    <div
    class="hamburger flex flex-col gap-y-2 cursor-pointer lg:hidden z-50 absolute right-6"
    >
    <span
        class="bg-[#f1c22e] h-[2.8px] w-9 md:w-10 bar transition-all duration-300"
    ></span>
    <span
        class="bg-[#f1c22e] h-[2.8px] w-9 md:w-10 bar transition-all duration-300"
    ></span>
    <span
        class="bg-[#f1c22e] h-[2.8px] w-9 md:w-10 bar transition-all duration-300"
    ></span>
    </div>


    <!-- Nav Links Desktop -->
    <ul class="lg:flex space-x-8 text-[17.25px] font-semibold hidden">
    <li>
        <a
        href="{{ route('menu') }}"
        class="hover:text-[#f1c22e] text-[#939393] font-roboto-condensed font-normal uppercase transition duration-300 ease-in-out
        {{ Route::currentRouteName() == 'menu' ? 'text-[#f1c22e]' : 'text-[#939393]' }}"
        >Menu
        </a>
    </li>
    <li>
        <a
        href="{{ route('promotion') }}"
        class="hover:text-[#f1c22e] text-[#939393] font-roboto-condensed font-normal uppercase transition duration-300 ease-in-out
        {{ Route::currentRouteName() == 'promotion' ? 'text-[#f1c22e]' : 'text-[#939393]' }}"
        >Promotions
        </a>
    </li>
    <li>
        <a
        href="{{ route('service') }}"
        class="hover:text-[#f1c22e] text-[#939393] font-roboto-condensed font-normal uppercase transition duration-300 ease-in-out
        {{ Route::currentRouteName() == 'service' ? 'text-[#f1c22e]' : 'text-[#939393]' }}"
        >Services
        </a>
    </li>
    <li>
        <a
        href="{{ route('gallery') }}"
        class="hover:text-[#f1c22e] text-[#939393] font-roboto-condensed font-normal uppercase transition duration-300 ease-in-out
        {{ Route::currentRouteName() == 'gallery' ? 'text-[#f1c22e]' : 'text-[#939393]' }}"
        >Gallery
        </a>
    </li>
    <li>
        <a
        href="{{ route('event') }}"
        class="hover:text-[#f1c22e] text-[#939393] font-roboto-condensed font-normal uppercase transition duration-300 ease-in-out
        {{ Route::currentRouteName() == 'event' ? 'text-[#f1c22e]' : 'text-[#939393]' }}"
        >Events
        </a>
    </li>
    <li>
        <a
        href="{{ route('reservation') }}"
        class="hover:text-[#f1c22e] text-[#939393] font-roboto-condensed font-normal uppercase transition duration-300 ease-in-out
        {{ Route::currentRouteName() == 'reservation' ? 'text-[#f1c22e]' : 'text-[#939393]' }}"
        >Reservations
        </a>
    </li>
    </ul>
</nav>


<!-- Nav Links Mobile -->
<div
    class="nav-list mobile fixed top-28 md:top-36 left-1/2 -translate-x-1/2 w-[86%] h-screen bg-black gap-x-8 text-white hidden z-30 justify-center"
>
    <nav
    class="links flex flex-col text-center gap-y-6 pt-4 text-[20px] z-0"
    >
    <a
        href="{{ route('menu') }}"
        class="relative hover:text-[#f1c22e] text-[#939393] font-roboto-condensed font-semibold uppercase w-[50%] mx-auto after:content-[''] after:absolute after:bottom-0 after:left-1/2 after:-translate-x-1/2 after:w-[150%] after:h-0.5 after:bg-[#f1c22e] after:opacity-0 after:transition-all after:duration-300 after:ease-in-out hover:after:opacity-100 hover:after:w-full
        {{ Route::currentRouteName() == 'menu' 
        ? 'text-[#f1c22e] after:opacity-100 after:w-full' 
        : '' 
        }}"
    >
        Menu
    </a>

    <a
        href="{{ route('promotion') }}"
        class="relative hover:text-[#f1c22e] text-[#939393] font-roboto-condensed font-semibold uppercase w-[50%] mx-auto after:content-[''] after:absolute after:bottom-0 after:left-1/2 after:-translate-x-1/2 after:w-[150%] after:h-0.5 after:bg-[#f1c22e] after:opacity-0 after:transition-all after:duration-300 after:ease-in-out hover:after:opacity-100 hover:after:w-full
        {{ Route::currentRouteName() == 'promotion' 
            ? 'text-[#f1c22e] after:opacity-100 after:w-full'
            : ''
        }}"
        >Promotions</a
    >
    <a
        href="{{ route('service') }}"
        class="relative hover:text-[#f1c22e] text-[#939393] font-roboto-condensed font-semibold uppercase w-[50%] mx-auto after:content-[''] after:absolute after:bottom-0 after:left-1/2 after:-translate-x-1/2 after:w-[150%] after:h-0.5 after:bg-[#f1c22e] after:opacity-0 after:transition-all after:duration-300 after:ease-in-out hover:after:opacity-100 hover:after:w-full
        {{ Route::currentRouteName() == 'service' 
            ? 'text-[#f1c22e] after:opacity-100 after:w-full' 
            : '' 
        }}"
        >Services</a
    >
    <a
        href="{{ route('gallery') }}"
        class="relative hover:text-[#f1c22e] text-[#939393] font-roboto-condensed font-semibold uppercase w-[50%] mx-auto after:content-[''] after:absolute after:bottom-0 after:left-1/2 after:-translate-x-1/2 after:w-[150%] after:h-0.5 after:bg-[#f1c22e] after:opacity-0 after:transition-all after:duration-300 after:ease-in-out hover:after:opacity-100 hover:after:w-full
        {{ Route::currentRouteName() == 'gallery'
            ? 'text-[#f1c22e] after:opacity-100 after:w-full' 
            : '' 
        }}"
        >Gallery</a
    >
    <a
        href="{{ route('event') }}"
        class="relative hover:text-[#f1c22e] text-[#939393] font-roboto-condensed font-semibold uppercase w-[50%] mx-auto after:content-[''] after:absolute after:bottom-0 after:left-1/2 after:-translate-x-1/2 after:w-[150%] after:h-0.5 after:bg-[#f1c22e] after:opacity-0 after:transition-all after:duration-300 after:ease-in-out hover:after:opacity-100 hover:after:w-full
        {{ Route::currentRouteName() == 'event'
            ? 'text-[#f1c22e] after:opacity-100 after:w-full' 
            : '' 
        }}"
        >Events</a
    >
    <a
        href="{{ route('reservation') }}"
        class="relative hover:text-[#f1c22e] text-[#939393] font-roboto-condensed font-semibold uppercase w-[50%] mx-auto after:content-[''] after:absolute after:bottom-0 after:left-1/2 after:-translate-x-1/2 after:w-[150%] after:h-0.5 after:bg-[#f1c22e] after:opacity-0 after:transition-all after:duration-300 after:ease-in-out hover:after:opacity-100 hover:after:w-full
        {{ Route::currentRouteName() == 'reservation' 
            ? 'text-[#f1c22e] after:opacity-100 after:w-full' 
            : '' 
        }}"
        >Reservations</a
    >
    </nav>
</div>
<!-- Navbar Ends -->