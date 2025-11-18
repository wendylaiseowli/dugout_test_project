<x-app-layout hero="img/mobile-bar-banner-m.jpg">
  @section('title', 'Mobile Bar | The Dugout Oasis')
    <x-slot:heroContent>
      <div
        class="absolute mx-auto w-full top-[61%] md:top-[53%] lg:top-[40%] xl:top-[42%] 2xl:top-[42%] 3xl:top-[43%] flex flex-col justify-center items-center"
      >
        <h1
          class="text-[30px] md:text-[52.5px] lg:text-[60px] text-white font-roboto-condensed font-bold uppercase text-center w-[70%] tracking-wide leading-[1.2em]"
        >
          MOBILE BAR
        </h1>
      </div>
    </x-slot:heroContent>
      
    <!-- Mobile Bar Section Starts -->
    <section class="bg-white">
      <!-- First Heading Section Starts -->
      <div class="flex flex-col justify-center items-center gap-y-2 my-14">
        <h1
          class="uppercase text-[#212121] text-[30px] lg:text-[45px] font-roboto-condensed font-semibold text-center mx-auto w-[94%] lg:w-[70%] xl:w-[60%] 3xl:w-[40%] tracking-wider"
        >
          WANT BAR SERVICE AT <br class="hidden" />
          YOUR PARTY? <br class="lg:hidden" />
          WE'RE HERE FOR YOU.
        </h1>
        <hr
          class="text-[#f1c22e] w-[22%] md:w-[16%] lg:w-[12%] xl:w-[14%] 2xl:w-[11%] 3xl:w-[12%] border"
        />
      </div>
      <!-- First Heading Section Ends -->
      <!-- Description Starts -->
      <p
        class="text-[#424242] font-roboto-slab text-[15px] text-center mx-auto md:text-[15px] w-[80%] md:w-[58%] lg:w-[57%] xl:w-[49%] 2xl:w-[47%] 3xl:w-[51%]"
      >
        Your party will not disappoint with our full mobile bar service
        options such as a portable beer draught machine, a wide range of
        authentic liquor, wine, champagne, cocktails and glassware. Work with
        our mixologist to create your own personalized bar menu.
        <br /><br />
        We will provide standard bar decoration with special decoration upon
        request. We also take care of all setup and provide all required staff
        to run the bar at your party
      </p>
      <!-- Description Ends -->
      <!-- Features Grid Section Starts -->
      <div
        class="grid grid-cols-2 lg:grid-cols-12 w-[90%] lg:w-[80%] xl:w-[60%] 3xl:w-[45%] mx-auto gap-y-8 lg:gap-14 my-18"
      >
        <!-- Bar setup & deco box -->
        <div class="flex flex-col items-center gap-y-6 lg:col-span-3">
          <img
            src="{{ asset('img/barsetup.svg') }}"
            alt="Bar Setup Img"
            class="size-[60px]"
          />
          <p
            class="text-[#424242] font-roboto-slab text-[15px] text-center mx-auto md:text-[15px] w-[80%]"
          >
            Bar setup & deco
          </p>
        </div>
        <!-- Portable beer tap -->
        <div class="flex flex-col items-center gap-y-6 lg:col-span-3">
          <img
            src="{{ asset('img/beertap.svg')}}"
            alt="Beer Tap Img"
            class="size-[60px]"
          />
          <p
            class="text-[#424242] font-roboto-slab text-[15px] text-center mx-auto md:text-[15px] w-[80%]"
          >
            Portable beer tap
          </p>
        </div>
        <!-- Glassware -->
        <div class="flex flex-col items-center gap-y-6 lg:col-span-3">
          <img
            src="{{ asset('img/glassware.svg')}}"
            alt="Glassware Img"
            class="size-[60px]"
          />
          <p
            class="text-[#424242] font-roboto-slab text-[15px] text-center mx-auto md:text-[15px]"
          >
            Glassware
          </p>
        </div>
        <!-- Mixologist -->
        <div class="flex flex-col items-center gap-y-6 lg:col-span-3">
          <img
            src="{{ asset('img/mixologist.svg') }}"
            alt="Mixologist Img"
            class="size-[60px]"
          />
          <p
            class="text-[#424242] font-roboto-slab text-[15px] text-center mx-auto md:text-[15px]"
          >
            Mixologist
          </p>
        </div>
        <!-- Waiters -->
        <div
          class="flex flex-col items-center gap-y-6 lg:col-span-3 lg:col-start-2"
        >
          <img
            src="{{ asset('img/waiters.svg')}}"
            alt="Waiters Img"
            class="size-[60px]"
          />
          <p
            class="lg:hidden text-[#424242] font-roboto-slab text-[15px] text-center mx-auto md:text-[15px]"
          >
            Mixologist
          </p>
          <p
            class="hidden lg:block text-[#424242] font-roboto-slab text-[15px] text-center mx-auto md:text-[15px]"
          >
            Waiters/Hostesses
          </p>
        </div>
        <!-- Bar Menu -->
        <div class="flex flex-col items-center gap-y-6 lg:col-span-3">
          <img
            src="{{ asset('img/barmenu.svg')}}"
            alt="Bar Menu Img"
            class="size-[60px]"
          />
          <p
            class="lg:hidden text-[#424242] font-roboto-slab text-[15px] text-center mx-auto md:text-[15px]"
          >
            Mixologist
          </p>
          <p
            class="hidden lg:block text-[#424242] font-roboto-slab text-[15px] text-center mx-auto md:text-[15px]"
          >
            Customised bar menu
          </p>
        </div>
        <!-- Wine Supply -->
        <div class="flex flex-col items-center gap-y-6 lg:col-span-4">
          <img
            src="{{ asset('img/winesupply.svg') }}"
            alt="Wine Supply Img"
            class="size-[60px]"
          />
          <p
            class="lg:hidden text-[#424242] font-roboto-slab text-[15px] text-center mx-auto md:text-[15px]"
          >
            Mixologist
          </p>
          <p
            class="hidden lg:block text-[#424242] font-roboto-slab text-[15px] text-center mx-auto md:text-[15px]"
          >
            Beer, Liquor, & Wine supply
          </p>
        </div>
      </div>
      <!-- Features Grid Section Ends -->
      <!-- Second Heading Section Starts -->
      <div
        class="flex flex-col justify-center items-center gap-y-2 md:mt-20 mb-8 lg:mt-32"
      >
        <h1
          class="uppercase text-[#212121] text-[30px] lg:text-[45px] font-roboto-condensed font-semibold text-center mx-auto w-[90%] md:w-[90%] lg:w-[80%] xl:w-[55%] 3xl:w-[40%]"
        >
          WE HAVE WHAT YOU NEED TO COMPLETE <br class="lg:hidden" />
          YOUR SPECIAL EVENT.
        </h1>
        <hr
          class="text-[#f1c22e] w-[22%] md:w-[16%] lg:w-[12%] 2xl:w-[11%] 3xl:w-[12%] border"
        />
      </div>
      <!-- Second Heading Section Ends -->
      <!-- Section Grid Section Starts-->
      <div class="flex justify-center items-center mt-10 mb-14 3xl:mb-12">
        <div
          class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-6 md:gap-x-14 3xl:gap-x-16 gap-y-10 w-[81%] md:w-[90%] xl:w-[78%] 3xl:w-[80%] mx-auto place-items-center"
        >
          <!-- Weddings Container -->
          <div
            class="bg-white w-full max-w-xl p-3 flex flex-col items-center relative transition duration-300 ease-in hover:shadow-2xl shadow-xl h-full"
          >
            <!-- Image -->
            <img
              src="{{ asset('img/wedding-photo-m.jpg') }}"
              alt="Birthday Event Image"
              class="w-full h-[232px] object-cover"
            />
            <div class="flex flex-col gap-y-3 mt-6 mb-14 px-4 text-center">
              <h2
                class="text-center uppercase font-semibold font-roboto-condensed text-[24px] text-[#212121]"
              >
                Weddings
              </h2>
              <hr class="text-gray-300 w-full" />
              <p
                class="text-center font-roboto-slab text-[#424242] text-[15px] xl:text-[17.25px] 3xl:mb-4 leading-7"
              >
                We offer a wide range of liquor, wine, cocktails and even
                prepare signature cocktails designed for the bride and groom.
                Let our mixologist create the ultimate beverage experience for
                you and your guests. You pick the drinks and we will do the
                rest!
              </p>
            </div>
          </div>
          <!-- Promotional Events Container -->
          <div
            class="bg-white w-full max-w-xl p-3 flex flex-col items-center relative transition duration-300 ease-in hover:shadow-2xl shadow-xl h-full"
          >
            <!-- Image -->
            <img
              src="{{ asset('img/promo-photo-m.jpg') }}"
              alt="Promotional Events Image"
              class="w-full h-[232px] object-cover"
            />
            <div class="flex flex-col gap-y-3 mt-6 mb-14 px-4 text-center">
              <h2
                class="w-[72%] md:w-full lg:w-[72%] xl:w-full mx-auto truncate text-center uppercase font-semibold font-roboto-condensed text-[24px] text-[#212121]"
              >
                PROMOTIONAL EVENTS
              </h2>
              <hr class="text-gray-300 w-full" />
              <p
                class="text-center font-roboto-slab text-[#424242] text-[15px] mx-full xl:text-[17.25px] leading-7"
              >
                We love supporting local community events as well as
                commercial business gatherings. Our cocktails and experienced
                staff is what your event needs!
              </p>
            </div>
          </div>
          <!-- Private Parties Container -->
          <div
            class="bg-white w-full max-w-xl p-3 flex flex-col items-center relative transition duration-300 ease-in hover:shadow-2xl shadow-xl h-full"
          >
            <!-- Image -->
            <img
              src="{{ asset('img/private-party-photo-m.jpg') }}"
              alt="Private Parties Image"
              class="w-full h-[232px] object-cover"
            />
            <div class="flex flex-col gap-y-3 mt-6 mb-14 px-4 text-center">
              <h2
                class="text-center uppercase font-semibold font-roboto-condensed text-[24px] text-[#212121]"
              >
                Private Parties
              </h2>
              <hr class="text-gray-300 w-full" />
              <p
                class="text-center font-roboto-slab text-[#424242] text-[15px] mx-full xl:text-[17.25px] leading-7"
              >
                Birthday party, anniversary event, bachelor/bachelorette party
                or any occasion you think is worth celebrating? We will
                prepare what you need and our mobile bar services will take
                your special event to the next level.
              </p>
            </div>
          </div>
        </div>
      </div>
      <!-- Section Grid Section Starts-->
      <!-- Contact Info Section Starts -->
      <div class="bg-[#f3f3f3] py-20 lg:py-16">
        <!-- Heading -->
        <div class="flex flex-col justify-center items-center gap-y-2 mb-8">
          <h1
            class="uppercase text-[#212121] text-[30px] lg:text-[45px] font-roboto-condensed font-semibold text-center mx-auto w-[94%] lg:w-[60%]"
          >
            Contact Information
          </h1>
          <hr
            class="text-[#f1c22e] w-[22%] md:w-[16%] lg:w-[12%] 2xl:w-[11%] 3xl:w-[12%] border"
          />
        </div>
        <div class="lg:flex lg:justify-center lg:gap-x-8">
          <!-- Phone Numbers Container Starts -->
          <div
            class="flex flex-col items-center mb-6 gap-y-2 md:flex-row md:justify-center md:gap-x-8 md:mb-10"
          >
            <a
              href="tel:+60173652702"
              class="flex items-center gap-3 hover:text-[#f1c22e] text-[#424242] text-[15px] font-roboto-slab"
            >
              <i class="fa-solid fa-phone text-[13px] text-[#424242]"></i>
              +6017 365 2702 (WhatsApp Only)
            </a>
            <a
              href="tel:+60172502244"
              class="flex items-center gap-3 hover:text-[#f1c22e] text-[#424242] text-[15px] font-roboto-slab"
            >
              <i class="fa-solid fa-phone text-[13px] text-[#424242]"></i>
              +6017 250 2244
            </a>
            <a
              href="tel:+60166347166"
              class="flex items-center gap-3 hover:text-[#f1c22e] text-[#424242] text-[15px] font-roboto-slab"
            >
              <i class="fa-solid fa-phone text-[13px] text-[#424242]"></i>
              +6016 634 7166
            </a>
          </div>
          <!-- Phone Numbers Container Ends -->
          <!-- Email Section Starts -->
          <div class="flex justify-center lg:items-start">
            <a
              href="mailto:brew.mechanics.msia@gmail.com"
              class="flex items-center gap-3 hover:text-[#f1c22e] text-[#424242] text-[15px] font-roboto-slab"
            >
              <i class="fa-solid fa-envelope text-[15px] text-[#424242]"></i>
              brew.mechanics.msia@gmail.com
            </a>
          </div>
          <!-- Email Section Ends -->
        </div>
      </div>
      <!-- Contact Info Section Ends -->
    </section>
    <!-- Mobile Bar Section Ends -->
</x-app-layout>
