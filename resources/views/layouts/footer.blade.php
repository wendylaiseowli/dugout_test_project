<!-- Footer -->
<footer
class="bg-black text-white py-4 lg:py-14 xl:px-10 3xl:px-16 lg:pb-4 3xl:pb-4 w-full"
>
    <div
        class="grid grid-rows-[auto_auto_auto] gap-8 lg:gap-0 lg:grid-cols-4 lg:grid-rows-1 mt-5 mb-12 md:mb-14 lg:mb-20 xl:w-[95%] 3xl:w-full mx-auto"
    >
        <!-- Dugout Logo -->
        <a
        href="{{route('index')}}"
        class="lg:flex justify-center items-start hidden"
        >
        <img
            src="{{ asset('img/dugout-logo-white_new.png') }}"
            alt="Dugout Logo"
            class="h-28 3xl:h-44"
        />
        </a>
        <!-- Promotion Mobile -->
        <div
        class="flex flex-col gap-y-2 h-fit items-center  [@media(min-width:769px)]:items-start lg:hidden w-full md:w-[94%] [@media(min-width:769px)]:w-[80%] mx-auto px-4 md:px-0"
        >
            <p class="font-lora-bold text-[#c6c6c6] text-[18px]">Promotions</p>
            <hr class="w-16 text-[#f1c22e] border-[0.5px]" />
            <form class="flex mt-4 w-full">
                <input
                type="email"
                name="email"
                id="email_mobile"
                class="flex-grow bg-white h-10 text-[#c6c6c6] text-[15px] p-6 outline-none font-roboto-slab placeholder:text-[12px]"
                placeholder="Leave email for promotion updates"
                />
                <button
                class="bg-[#f1c22e] flex justify-center items-center px-4 md:px-10 cursor-pointer hover:bg-black transition-colors"
                type="submit"
                >
                    <img
                        src="{{ asset('img/send.png') }}"
                        alt="Send Image"
                        class="size-4"
                    />
                </button>
            </form>
        </div>
        <!-- Opening Hours -->
        <div
        class="flex flex-col gap-y-2 h-fit items-center lg:justify-start [@media(min-width:769px)]:items-start md:w-[80%] 3xl:w-[70%] mx-auto"
        >
            <p class="font-lora-bold text-[#c6c6c6] text-[18px]">
                Opening Hours
            </p>
            <hr class="w-16 text-[#f1c22e] border-[0.5px]" />
            <div
                class="flex gap-4 mt-4 w-full md:justify-center [@media(min-width:769px)]:justify-between [@media(min-width:1024px)]:!justify-start [@media(min-width:1700px)]:!justify-between"
            >
                <p class="text-[#808080] font-lato-regular text-[14.25px]">
                Mon - Sun
                </p>
                <p class="text-[#c6c6c6] font-lato-regular text-[14.25px]">
                3.00pm - 12.00am
                </p>
            </div>
        </div>
        <!-- Contact Us -->
        <div
        class="flex flex-col gap-y-2 items-center [@media(min-width:769px)]:items-start md:w-[80%] mx-auto"
        >
            <p class="font-lora-bold text-[#c6c6c6] text-[18px]">Contact Us</p>
            <hr class="w-16 text-[#f1c22e] border-[0.5px]" />
            <ul
                class="flex flex-col gap-y-4 mt-4 items-center [@media(min-width:769px)]:items-start"
            >
                <li>
                    <a
                        href="https://api.whatsapp.com/send?phone=60173652702&amp;text=Hello!%20I%20would%20like%20to%20know%20more%20about%20having%20my%20event%20at%20The%20Dugout.%20Please%20contact%20me.%20Thank%20you.%20Name%3A"
                    target="_blank"
                    rel="noopener noreferrer"
                        class="flex items-center gap-3 hover:text-[#f1c22e] text-[#808080] text-[14px] lg:text-[12px] 3xl:text-[13.5375px] font-lato-regular transition duration-300 ease-in-out"
                    >
                        <i class="fa-solid fa-phone text-[12px] text-[#c6c6c6]"></i>
                        +6017 365 2702 (Whatsapp Only)
                    </a>
                </li>
                <li>
                    <a
                        href="mailto:brew.mechanics.msia@gmail.com"
                        class="flex items-center gap-3 hover:text-[#f1c22e] text-[#808080] text-[14px] lg:text-[12px] 3xl:text-[13.5375px] font-lato-regular transition duration-300 ease-in-out"
                    >
                        <i
                        class="fa-solid fa-envelope text-[12px] text-[#c6c6c6]"
                        ></i>
                        brew.mechanics.msia@gmail.com
                    </a>
                </li>
                <li>
                    <a
                        target="_blank"
                        href="https://www.thedugoutoasis.com/"
                        class="flex items-center gap-3 hover:text-[#f1c22e] text-[#808080] text-[14px] lg:text-[12px] 3xl:text-[13.5375px] font-lato-regular transition duration-300 ease-in-out"
                    >
                        <i
                        class="fa-solid fa-earth-americas text-[12px] text-[#c6c6c6]"
                        ></i>
                        www.thedugoutoasis.com
                    </a>
                </li>
            </ul>
        </div>
        <!-- Promotions Desktop -->
        <div class="lg:flex flex-col gap-y-2 lg:items-start hidden">
            <p class="font-lora-bold text-[#c6c6c6] text-[18px]">Promotions</p>
            <hr class="w-16 text-[#f1c22e] border" />
            <form class="flex mt-4 w-full max-w-[90%]" method="POST" action="{{ route('subscribe') }}">
                @csrf
                <input
                type="email"
                name="email"
                id="email_desktop"
                class="min-w-20 3xl:min-w-72 bg-white text-[#808080] text-[15px] p-3 outline-none font-roboto-slab"
                placeholder="Leave email for promotion updates"
                value="{{ old('email')}}"
                >
                <button
                class="bg-[#f1c22e] flex justify-center items-center px-4 cursor-pointer hover:bg-black 3xl:px-7"
                type="submit"
                >
                    <img
                        src="{{ asset('img/send.png') }}"
                        alt="Send Image"
                        class="size-4"
                    />
                </button>
            </form>
        </div>
    </div>
    <div class="flex flex-col justify-center items-center gap-y-6 mt-4">
        <p
        class="text-[11px] sm:text-[12px] text-[#808080] font-roboto-slab text-center w-[80%] md:w-[90%]"
        >
        Copyright © 2025 Brew Mechanics Sdn Bhd [Registration No.
        201701039531 (1253703-M)]. All Rights Reserved
        </p>
        <div class="flex justify-center items-center gap-4">
            <a
                target="_blank"
                href="https://www.facebook.com/thedugoutoasis/"
                class="group size-9 bg-[#292929] rounded-full flex justify-center items-center hover:bg-[#5a5a5a] cursor-pointer transition duration-300 ease-in-out"
            >
                <i class="fa-brands fa-facebook-f text-[#808080] group-hover:text-white"></i>
            </a>
            <a
                target="_blank"
                href="https://www.instagram.com/thedugoutoasis/"
                class="group size-9 bg-[#292929] rounded-full flex justify-center items-center hover:bg-[#5a5a5a] cursor-pointer transition duration-300 ease-in-out"
            >
                <i class="fa-brands fa-instagram text-[#808080] group-hover:text-white"></i>
            </a>
        </div>
    </div>
</footer>