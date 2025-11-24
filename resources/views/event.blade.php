<x-app-layout hero="img/event/event-banner.png" heroHeight="min-h-[35vh] lg:min-h-[45vh]">
  @section('title', 'Events | The Dugout Oasis')
  
  <x-slot:heroContent>
    <!-- Heading Section Starts -->
    <div
      class="absolute mx-auto w-full top-[35%] md:top-[37%] lg:top-[28%] xl:top-[39%] 2xl:top-[34%] 3xl:top-[36%] flex flex-col justify-center items-center"
    >
      <h1
        class="text-[30px] md:text-[52.5px] lg:text-[60px] text-white font-roboto-condensed font-bold uppercase text-center w-[73%] tracking-wide leading-[1.3em]"
      >
        Score Big At Your <br />
        Next Event With Us!
      </h1>
      <p
        class="text-[16px] md:text-[15px] font-roboto-slab mt-4 md:mt-0 text-white mx-auto text-center w-[78%]"
      >
        Celebrate in style at Ara Damansara's premier sports bar and
        restaurant
      </p>
    </div>
    <!-- Heading Sections Ends -->
  </x-slot:heroContent>

  <!-- Grid Section Starts -->
  <section class="bg-white py-12 md:py-16">
    <!-- Heading Section -->
    <div class="flex flex-col justify-center items-center gap-y-2 mb-8">
      <h1
        class="uppercase text-[#212121] text-[30px] lg:text-[45px] font-roboto-condensed font-semibold text-center mx-auto w-[78%] lg:w-[75%] tracking-wider"
      >
        THREE CHEERS TO ANY CELEBRATION
      </h1>
      <hr class="text-[#f1c22e] w-24 lg:w-40 xl:w-44 2xl:w-52 3xl:w-64 border" />
    </div>
    <!-- Grid Section Starts -->
    <div
      class="grid grid-cols-2 lg:grid-cols-5 gap-y-10 my-14 md:mb-12 lg:mt-28 lg:w-[95%] xl:w-[80%] 3xl:w-[85%] mx-auto"
    >
      <!-- Birthdays -->
      <div class="flex flex-col items-center">
        <img
          src="{{ asset('img/event/birthday.png') }}"
          alt="Birthday"
          class="w-auto h-20 md:h-24 lg:h-[105px]"
        />
        <p
          class="text-[15px] font-roboto-slab mt-5 text-[#333333] mx-auto text-center"
        >
          Birthdays
        </p>
      </div>
      <!-- Corporate Events -->
      <div class="flex flex-col items-center">
        <img
          src="{{ asset('img/event/events.png') }}"
          alt="Events"
          class="w-auto h-20 md:h-24 lg:h-[105px]"
        />
        <p
          class="text-[15px] font-roboto-slab mt-5 text-[#333333] mx-auto text-center"
        >
          Corporate Events
        </p>
      </div>
      <!-- Weddings -->
      <div class="flex flex-col items-center">
        <img
          src="{{ asset('img/event/wedding.png') }}"
          alt="Weddings"
          class="w-auto h-20 md:h-24 lg:h-[105px]"
        />
        <p
          class="text-[15px] font-roboto-slab mt-5 text-[#333333] mx-auto text-center"
        >
          Weddings
        </p>
      </div>
      <!-- Sports -->
      <div class="flex flex-col items-center">
        <img
          src="{{ asset('img/event/sport.png') }}"
          alt="Sports"
          class="w-auto h-20 md:h-24 lg:h-[105px]"
        />
        <p
          class="text-[15px] font-roboto-slab mt-5 text-[#333333] mx-auto text-center w-[60%] xl:w-[97%]"
        >
          Live Sports Screening
        </p>
      </div>
      <!-- Themed Nights -->
      <div class="grid col-span-2 lg:col-span-1">
        <div class="flex flex-col items-center">
          <img
            src="{{ asset('img/event/themed.png') }}"
            alt="Sports"
            class="w-auto h-20 md:h-24 lg:h-[105px]"
          />
          <p
            class="text-[15px] font-roboto-slab mt-5 text-[#333333] mx-auto text-center"
          >
            Themed Nights
          </p>
        </div>
      </div>
    </div>
    <!-- Grid Section Ends -->
    <p
      class="text-[15px] font-roboto-slab mt-5 md:mt-0 text-[#424242] mx-auto text-center w-[78%]"
    >
      ...or 'just because' events. Cause why not?
    </p>
  </section>
  <!-- Grid Section Ends -->

  <!-- BYOB Section Starts -->
  <!-- Heading Section -->
  <div class="flex flex-col justify-center items-center gap-y-2 mb-8">
    <h1
      class="uppercase text-[#212121] text-[30px] lg:text-[45px] font-roboto-condensed font-semibold text-center mx-auto w-[88%] lg:w-[70%] tracking-wider"
    >
      BYOB? NO. WE'LL DO IT YOUR WAY
    </h1>
    <hr class="text-[#f1c22e] w-24 lg:w-36 xl:w-52 3xl:w-64 border" />
  </div>
  <!-- Accordion Section -->
  <div
    class="flex flex-col lg:flex-row items-start justify-center gap-y-6 lg:gap-x-10 xl:gap-x-20 3xl:gap-x-0 w-[85%] lg:w-[90%] xl:w-[80%] 2xl:w-[80%] 3xl:w-[70%] mx-auto lg:my-20"
  >
    <!-- Image Section -->
    <div class="mx-auto">
      <img
        id="mainImage"
        src="{{ asset('img/event/img1.png') }}"
        alt="Food Image"
        class="min-w-[272px] md:min-w-[375px] lg:max-w-[485px] lg:max-h-[451.61px] xl:max-w-[585px] xl:max-h-[544.72px] 2xl:max-w-[585px] 2xl:max-h-[544.72px] 3xl:max-w-[652.8px] 3xl:max-h-[607.84px] object-contain mx-auto"
      />
    </div>
    <!-- Accordion Tabs -->
    <div
      class="flex flex-col mx-auto mb-14 md:w-[85%] lg:w-[53%] 3xl:w-[40%]"
    >
      <!-- FOOD -->
      <div>
        <button
          data-section="food"
          onclick="toggleSection('food', '{{ asset('img/event/img1.png') }}')"
          class="p-4 flex justify-between items-start bg-[#ffd60a] rounded-full w-full cursor-pointer transition duration-200 ease-in relative z-10"
          aria-expanded="true"
          aria-controls="food"
        >
          <span
            class="uppercase text-left font-roboto-condensed font-semibold text-[18px] md:text-[25px] w-[79%] lg:w-[90%]"
          >
            FOOD AND BEVERAGE OPTIONS
          </span>
          <span id="icon-food" class="text-xl text-black font-bold icon"
            >-</span
          >
        </button>
        <div
          id="food"
          class="accordion-wrapper open mt-2 bg-white overflow-hidden transition-[max-height] duration-500 ease-in-out"
        >
          <div class="accordion-inner py-3">
            <p
              class="font-roboto-slab text-[15px] text-[#424242] w-[85%] md:w-[80%] lg:w-[89%] mx-4"
            >
              From Indian Classics to "oh-so-good" finger food, choose your
              selection of preferred snacks or main courses.
            </p>
          </div>
        </div>
      </div>

      <!-- DRINKS -->
      <div>
        <button
          data-section="drinks"
          onclick="toggleSection('drinks', '{{ asset('img/event/img2.png') }}')"
          class="p-4 flex justify-between items-center bg-white rounded-full w-full border-2 border-black cursor-pointer transition duration-200 ease-in relative z-10"
          aria-expanded="false"
          aria-controls="drinks"
        >
          <span
            class="uppercase text-black font-roboto-condensed text-left font-semibold text-[18px] md:text-[25px]"
          >
            DRINKS PACKAGES
          </span>
          <span id="icon-drinks" class="text-xl text-black font-bold icon"
            >+</span
          >
        </button>
        <div
          id="drinks"
          class="accordion-wrapper mt-2 bg-white overflow-hidden transition-[max-height] duration-500 ease-in-out"
          style="max-height: 0"
        >
          <div class="accordion-inner py-3">
            <p
              class="font-roboto-slab text-[15px] text-[#424242] w-[85%] md:w-[93%] lg:w-[90%] mx-4"
            >
              Customise your drink selection. Alcoholic or non-alcoholic
              options available.
            </p>
          </div>
        </div>
      </div>

      <!-- ENTERTAINMENT -->
      <div>
        <button
          data-section="entertainment"
          onclick="toggleSection('entertainment', '{{ asset('img/event/img3.png') }}')"
          class="p-4 flex justify-between items-center bg-white rounded-full w-full border-2 border-black cursor-pointer transition duration-200 ease-in relative z-10"
          aria-expanded="false"
          aria-controls="entertainment"
        >
          <span
            class="uppercase text-black font-roboto-condensed text-left font-semibold text-[18px] md:text-[25px]"
          >
            ENTERTAINMENT
          </span>
          <span
            id="icon-entertainment"
            class="text-xl text-black font-bold icon"
            >+</span
          >
        </button>
        <div
          id="entertainment"
          class="accordion-wrapper mt-2 bg-white overflow-hidden transition-[max-height] duration-500 ease-in-out"
          style="max-height: 0"
        >
          <div class="accordion-inner py-3">
            <p
              class="font-roboto-slab text-[15px] text-[#424242] w-[90%] mx-4"
            >
              Basics like the sound system, mixer and microphone are
              provided in-house to get the party started.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- BYOB Section Ends -->

  <!-- Features Section Starts -->
  <!-- Container -->
  <section class="flex flex-col lg:flex-row w-full bg-black">
    <!-- Left Content -->
    <div
      class="relative flex justify-center lg:justify-start items-center py-14 md:py-20 lg:w-1/4"
    >
      <div
        class="absolute top-0 bottom-0 w-[1.5px] bg-[#4a4a4a] left-[50%] lg:left-[30%] 3xl:left-[27%] -translate-x-1/2 z-0"
      ></div>
      <div
        class="relative md:z-0 lg:z-30 bg-black py-2 lg:left-10 w-[90%] lg:w-[28%] xl:w-[43%] 2xl:w-[40%] 3xl:w-[35%]"
      >
        <div
          class="uppercase font-montserrat-bold text-[#ffffff33] text-[50px] md:text-[30px] xl:text-[60px] 3xl:text-[70px] lg:text-left text-center leading-[1.2em]"
        >
          OUR <br class="hidden md:block" />
          <span
            class="text-[#ffd60a] lg:absolute lg:left-[70%] 3xl:left-[60%] bg-black lg:bg-transparent"
            >FEATURES</span
          >
        </div>
      </div>
    </div>
    <!-- Carousel Container (Right) -->
    <div
      class="lg:flex-1 overflow-hidden xl:mt-24 xl:mb-16 md:mb-14 lg:mb-28 lg:mt-28 2xl:mb-0"
    >
      <!-- Desktop Images -->
      <div
        id="slider-1"
        class="owl-carousel relative hidden sm:block w-full"
      >
        <div class="item relative">
          <img
            src="{{ asset('img/event/slider3.jpg') }}"
            alt="Slider 3 Image"
            class="w-full h-[330px] lg:w-[468px] lg:h-[330px] xl:h-[500px] 3xl:h-[650px] object-cover"
          />
          <div
            class="absolute bottom-0 left-0 w-full bg-gradient-to-b from-transparent to-black/95 text-center lg:text-left py-2"
          >
            <p
              class="text-white text-[14px] md:text-[16px] font-markpro uppercase tracking-wide md:pb-4 lg:pl-10 lg:pb-7 lg:text-[16px] xl:text-[25px]"
            >
              DART MACHINE
            </p>
          </div>
        </div>
        <div class="item relative">
          <img
            src="{{ asset('img/event/slider1.png') }}"
            alt="Slider 1 Image"
            class="w-full h-[330px] lg:w-[468px] lg:h-[330px] xl:h-[500px] 3xl:h-[650px] object-cover"
          />
          <div
            class="absolute bottom-0 left-0 w-full bg-gradient-to-b from-transparent to-black/95 text-center lg:text-left py-2"
          >
            <p
              class="text-white text-[14px] md:text-[16px] font-markpro uppercase tracking-wide md:pb-4 lg:pl-10 lg:pb-7 lg:text-[16px] xl:text-[25px]"
            >
              STAGE PERFORMANCE
            </p>
          </div>
        </div>
        <div class="item relative">
          <img
            src="{{ asset('img/event/slider2.png') }}"
            alt="Slider 2 Image"
            class="w-full h-[330px] lg:w-[468px] lg:h-[330px] xl:h-[500px] 3xl:h-[650px] object-cover"
          />
          <div
            class="absolute bottom-0 left-0 w-full bg-gradient-to-b from-transparent to-black/95 text-center lg:text-left py-2"
          >
            <p
              class="text-white text-[14px] md:text-[16px] font-markpro uppercase tracking-wide md:pb-4 lg:pl-10 lg:pb-7 lg:text-[16px] xl:text-[25px]"
            >
              DINING TABLE
            </p>
          </div>
        </div>
      </div>
      <!-- Counter (centered below arrows) -->
      <div
        id="slide-counter"
        class="text-white text-[20px] lg:text-[28px] text-center font-roboto-slab py-6 lg:text-left xl:mb-20 2xl:mb-10 3xl:mb-14"
      ></div>
    </div>
  </section>
  <!-- Features Section Ends -->
  <!-- Testimonial Section Starts -->
  <section
    class="relative flex flex-col justify-center items-center gap-y-2 overflow-hidden py-20"
  >
    <div
      class="flex flex-col justify-center items-center mb-20 lg:mb-26 3xl:mb-40"
    >
      <h1
        class="uppercase text-[#212121] text-[30px] lg:text-[45px] font-roboto-condensed font-semibold text-center mx-auto w-[88%] md:w-full lg:w-full tracking-wider leading-[1.3em]"
      >
        DON'T TAKE OUR WORD FOR IT. <br> TAKE THEIRS!
      </h1>
      <hr class="text-[#f1c22e] w-24 lg:w-36 xl:w-48 3xl:w-64 border mt-2" />
    </div>
    <!-- Slider Section -->
    <div class="relative flex justify-center w-full h-full">
      <div
        class="absolute bg-[#f1c22e] min-w-90 min-h-90 max-w-[600px] max-h-[600px] md:min-h-[400px] md:min-w-[400px] lg:min-w-[450px] lg:min-h-[450px] xl:min-w-[400px] xl:min-h-[400px] 2xl:w-[450px] 2xl:h-[450px] 3xl:min-h-[480px] 3xl:min-w-[480px] rounded-full top-[40%] md:top-[49%] 2xl:top-[46%] -translate-y-1/2 -z-10"
      ></div>
      <div
        id="slider-2"
        class="owl-carousel owl-theme flex items-stretch h-full relative z-10"
      >
        <!-- Item 1 -->
        <div
          class="item flex flex-col justify-center min-h-[350px] md:min-h-[350px] lg:min-h-[400px] xl:min-h-[350px] bg-white shadow-xl w-[95%] mx-auto text-center py-2 px-10 md:py-20 lg:py-14 xl:py-16 3xl:py-24 rounded-xl"
        >
          <p class="text-[15px] font-roboto-slab text-[#424242] mb-8">
            "The Dugout Oasis is a resto-sports bar that advocates a place
            only for good times, exciting selection of food and guaranteed
            original alcohol products."
          </p>
          <div>
            <h1
              class="uppercase text-[#f1c22e] font-roboto-condensed text-[24px] text-center font-semibold"
            >
              Aishwarrya Krishnamoorthy
            </h1>
            <h1 class="text-[22px] font-roboto-slab text-[#424242]">
              Customer
            </h1>
          </div>
        </div>
        <!-- Item 2 -->
        <div
          class="item flex flex-col justify-center min-h-[350px] md:min-h-[350px] lg:min-h-[400px] xl:min-h-[350px] bg-white shadow-xl w-[95%] mx-auto text-center py-2 px-10 md:py-20 lg:py-14 xl:py-16 3xl:py-24 rounded-xl"
        >
          <p class="text-[15px] font-roboto-slab text-[#424242] mb-8">
            "A lively bar situated in a beautiful location. Great
            atmosphere, good service, delicious food. I especially enjoyed
            the mutton dish and the scrambled eggs with sausages."
          </p>
          <div>
            <h1
              class="uppercase text-[#f1c22e] font-roboto-condensed text-[24px] text-center font-semibold"
            >
              Yashwenee Selvaraju
            </h1>
            <h1 class="text-[22px] font-roboto-slab text-[#424242]">
              Customer
            </h1>
          </div>
        </div>
        <!-- Item 3 -->
        <div
          class="item flex flex-col justify-center min-h-[350px] md:min-h-[350px] lg:min-h-[400px] xl:min-h-[350px] bg-white shadow-xl w-[95%] mx-auto text-center py-2 px-10 md:py-20 lg:py-14 xl:py-16 3xl:py-24 rounded-xl"
        >
          <p class="text-[15px] font-roboto-slab text-[#424242] mb-8">
            "The carbonara is must try. Everything is amazing, kudos to the
            owners and team. It's been a while having such a satisfying meal
            experience at a restaurant."
          </p>
          <div>
            <h1
              class="uppercase text-[#f1c22e] font-roboto-condensed text-[24px] text-center font-semibold"
            >
              Mei Lin
            </h1>
            <h1 class="text-[22px] font-roboto-slab text-[#424242]">
              Customer
            </h1>
          </div>
        </div>
        <!-- Item 4 -->
        <div
          class="item flex flex-col justify-center min-h-[350px] md:min-h-[350px] lg:min-h-[400px] xl:min-h-[350px] bg-white shadow-xl w-evenweb[95%] mx-auto text-center py-2 px-10 md:py-20 lg:py-14 xl:py-16 rounded-xl"
        >
          <p class="text-[15px] font-roboto-slab text-[#424242] mb-6">
            "If you're looking for a great spot to unwind with friends over
            drinks, @thedugoutoasis in Ara Damansara is the perfect choice.
            This cozy resto-bar offers a cozy atmosphere and serves up
            delicious food, making it an ideal hangout. Whether you're here
            for the drinks or the food, it's a place that delivers on both."
          </p>
          <div>
            <h1
              class="uppercase text-[#f1c22e] font-roboto-condensed text-[24px] text-center font-semibold"
            >
              Lorraine Chow
            </h1>
            <h1 class="text-[22px] font-roboto-slab text-[#424242]">
              Customer
            </h1>
          </div>
        </div>
      </div>
    </div>
    <div
      class="custom-dots mt-8 md:mt-16 lg:mt-24 2xl:mt-20 3xl:mt-30"
    id="eventEnquirySection"></div>
    <!-- Slider Section Ends -->
  </section>
  <!-- Testimonial Section Ends -->

  <!-- Event Planning Form Section Starts -->
  <section class="flex flex-col md:flex-row relative">
    <!-- Left Content -->
    <div class="flex justify-center items-center relative h-full md:w-1/2">
      <img
        src="{{ asset('img/event/bg-bnw.png') }}"
        alt="Background Image"
        class="h-[334px] md:h-[832px] 2xl:h-[703px] 3xl:h-[919px] w-full object-cover"
      />
      <div
        class="absolute md:top-54 lg:top-45 xl:top-55 flex flex-col justify-center items-center [@media(min-width:480px)]:items-start gap-y-6 md:gap-y-16 lg:left-24 3xl:top-80 w-[80%]"
      >
        <div>
          <h1
            class="uppercase text-[30px] font-roboto-condensed text-white font-semibold text-center [@media(min-width:480px)]:text-left lg:text-[45px] leading-[1.2em]"
          >
            Plan your <br />
            <span class="text-[#f1c22e]">event</span> now
          </h1>
          <hr class="text-[#f1c22e] mt-4 w-40 md:w-36 lg:w-36 border-2" />
        </div>
        <a
          href="https://api.whatsapp.com/send?phone=60173652702&amp;text=Hello!%20I%20would%20like%20to%20know%20more%20about%20having%20my%20event%20at%20The%20Dugout.%20Please%20contact%20me.%20Thank%20you.%20Name%3A"
          target="_blank"
          rel="noopener noreferrer"
          class="w-full lg:w-[65%] xl:w-[50%]"
        >
          <button
            class="bg-[#ffd60a] flex items-center justify-center py-[15px] rounded-full mx-auto w-full hover:bg-white cursor-pointer transition duration-500 ease-in-out"
          >
            <img
              src="{{ asset('img/event/whatsapp.png') }}"
              alt="WhatsApp Icon"
              class="pr-2.5"
            />
            <p
              class="uppercase font-roboto-condensed text-[20px] xl:text-[24px] text-black font-light text-left"
            >
              Let's have a chat
            </p>
          </button>
        </a>
      </div>
    </div>
    <!-- Right Content -->
    <form
      action="{{route('planEventForm')}}" method="POST"
      class="flex flex-col justify-center items-center py-16 md:w-1/2"
    >
      @csrf
      <div
        class="relative mx-auto w-[80%] sm:w-[90%] md:w-[80%] lg:w-[90%] mb-8 3xl:mb-6"
      >
        <input
          type="text"
          name="name"
          id="name"
          required
          autocomplete="off"
          class="peer w-full h-14 bg-transparent text-base px-3 py-4 border-2 border-[#ccc] focus:outline-none rounded-md focus:border-black"
          value="{{ old('name') }}"
        />
        @error('name')
          <p
            role="alert"
            aria-live="assertive"
            class="uppercase text-center text-[#ff0000] font-roboto-slab text-[12px] mt-4"
          >
            {{$message}}
          </p>
        @enderror
        <label
          for="name"
          class="uppercase absolute font-roboto-condensed left-3 top-1/2 -translate-y-1/2 text-base bg-white text-[#ccc] peer-focus:text-black px-1 transition-all duration-200 ease-in-out peer-focus:top-0 peer-focus:text-sm peer-valid:top-0 peer-valid:text-sm font-semibold"
        >
          Name*
        </label>
      </div>
      <div
        class="relative mx-auto w-[80%] sm:w-[90%] md:w-[80%] lg:w-[90%] mb-8 3xl:mb-6"
      >
        <input
          type="email"
          name="email"
          id="email"
          required
          autocomplete="off"
          class="peer w-full h-14 bg-transparent text-base px-3 py-4 border-2 border-[#ccc] focus:outline-none rounded-md focus:border-black"
          value="{{ old('email') }}"
        />
        @error('email')
          <p
            role="alert"
            aria-live="assertive"
            class="uppercase text-center text-[#ff0000] font-roboto-slab text-[12px] mt-4"
          >
            {{$message}}
          </p>
        @enderror
        <label
          for="email"
          class="uppercase absolute font-roboto-condensed left-3 top-1/2 -translate-y-1/2 text-base bg-white text-[#ccc] peer-focus:text-black px-1 transition-all duration-200 ease-in-out peer-focus:top-0 peer-focus:text-sm peer-valid:top-0 peer-valid:text-sm font-semibold"
        >
          Email*
        </label>
      </div>
      <div
        class="relative mx-auto w-[80%] sm:w-[90%] md:w-[80%] lg:w-[90%] mb-8 3xl:mb-6"
      >
        <input
          type="tel"
          name="phone"
          id="phone"
          required
          class="peer w-full h-14 bg-transparent text-base px-3 py-4 border-2 border-[#ccc] focus:outline-none rounded-md pl-14 focus:border-black"
          value="{{ old('phone') }}"
        />
        @error('phone')
          <p
            role="alert"
            aria-live="assertive"
            class="uppercase text-center text-[#ff0000] font-roboto-slab text-[12px] mt-4"
          >
            {{$message}}
          </p>
        @enderror
        <label
          for="phone"
          class="uppercase absolute font-roboto-condensed left-14 top-1/2 -translate-y-1/2 text-base 2xl:text-sm bg-white text-[#ccc] peer-focus:text-black px-1 font-semibold transition-all duration-200 ease-in-out peer-focus:top-0 peer-valid:text-sm peer-focus:left-3"
          autocomplete="off"
        >
          Phone Number*
        </label>
      </div>
      <div
        class="relative mx-auto w-[80%] sm:w-[90%] md:w-[80%] lg:w-[90%] mb-8 3xl:mb-6"
      >
        <textarea
          name="message"
          id="message"
          required
          autocomplete="off"
          rows="3"
          class="peer w-full bg-transparent text-base px-3 py-10 border-2 border-[#ccc] focus:outline-none rounded-md focus:border-black"
        >{{ old('message') }}</textarea>
        @error('message')
          <p
            role="alert"
            aria-live="assertive"
            class="uppercase text-center text-[#ff0000] font-roboto-slab text-[12px] mt-4"
          >
            {{$message}}
          </p>
        @enderror
        <label
          for="message"
          class="uppercase absolute font-roboto-condensed left-3 top-3 text-base bg-white text-[#ccc] peer-focus:text-black px-1 transition-all duration-200 ease-in-out peer-focus:-top-2 peer-focus:text-sm peer-valid:top-0 peer-valid:text-sm font-semibold pointer-events-none"
        >
          Type A Message
        </label>
      </div>
      <button
        type="submit"
        class="py-3 px-10 bg-black text-[#ffd60a] border-2 border-black rounded-full text-[20px] font-roboto-condensed hover:border-2 hover:border-black hover:bg-[#ffd60a] hover:text-black cursor-pointer transition duration-500 ease-in-out"
      >
        SUBMIT
      </button>
    </form>
  </section>
  <!-- Event Planning Form Section Ends -->


  <!-- Location Section Starts -->
  <section class="md:py-10 lg:py-14">
    <!-- Heading Section -->
    <div class="flex flex-col justify-center items-center gap-y-2 mb-12 md:mb-20 3xl:mb-10">
      <h1
        class="uppercase text-[#212121] text-[30px] lg:text-[45px] font-roboto-condensed font-semibold text-center mx-auto w-[88%] md:w-full lg:w-full tracking-wider"
      >
        PAY US A VISIT!
      </h1>
      <hr class="text-[#f1c22e] w-24 lg:w-36 2xl:w-44 3xl:w-64 border" />
    </div>
    <div
      class="flex flex-col md:flex-row shadow-lg md:w-[97%] lg:w-[94%] xl:w-[78%] 2xl:w-[80%] 3xl:w-[60%] mx-auto"
    >
      <!-- Left Section -->
      <div class="bg-[#fafafa] w-full md:w-1/2 p-10">
        <!-- Address Box -->
        <div class="flex items-start gap-x-2 mb-4">
          <img
            src="{{ asset('img/event/location.png') }}"
            alt="Location Pin Image"
            class="size-7"
          />
          <p
            class="text-[18px] font-roboto-slab text-[#333333] 2xl:w-[75%] 3xl:w-[85%]"
          >
            Lot B-G-09, Oasis Square, 2, Jalan PJU 1A/7, Ara Damansara,
            43701 Petaling Jaya, Selangor
          </p>
        </div>
        <!-- Timing Box -->
        <div class="flex items-start gap-x-2 mb-4">
          <img
            src="{{ asset('img/event/time.png') }}"
            alt="Time Image"
            class="size-7"
          />
          <p class="text-[18px] font-roboto-slab text-[#333333] md:w-[80%]">
            Operating Hours: 3pm - 12am
          </p>
        </div>
        <!-- Google Maps Button -->
        <a
          href="https://www.google.com/maps?q=The+Dugout+Oasis"
          target="_blank"
          rel="noopener noreferrer"
        >
          <button
            class="w-full md:w-[90%] lg:w-[85%] xl:w-[55%] 2xl:w-[45%] uppercase flex gap-x-2 justify-center items-center text-black text-[16px] font-roboto-slab font-semibold p-6 bg-white border-2 border-[#ccc] rounded-full hover:bg-[#ffd60a] hover:border-[#ffd60a] cursor-pointer mb-4 md:mt-8 transition duration-500 ease-in-out"
          >
            <img
              src="{{ asset('img/event/google-map.png') }}"
              alt="Google Maps Image"
            />
            GOOGLE MAPS
          </button>
        </a>
        <!-- Waze Button -->
        <a
          href="https://www.waze.com/en/live-map/directions/the-dugout-jalan-pju-1a7a-2-petaling-jaya?place=w.66584607.665649463.14833123"
          target="_blank"
          rel="noopener noreferrer"
        >
          <button
            class="w-full md:w-[90%] lg:w-[85%] xl:w-[55%] 2xl:w-[45%] uppercase flex gap-x-2 justify-center items-center text-black text-[16px] font-roboto-slab font-semibold p-6 bg-white border-2 border-[#ccc] rounded-full hover:bg-[#ffd60a] hover:border-[#ffd60a] cursor-pointer mb-4 md:mb-0 transition duration-500 ease-in-out"
          >
            <img src="{{ asset('img/event/waze.png') }}" alt="Waze Image" />
            WAZE DIRECTION
          </button>
        </a>
      </div>
      <!-- Right Section -->
      <div class="w-full md:w-1/2">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3983.925872388413!2d101.57530469999999!3d3.1143141!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc4e81ed8fe29f%3A0x9f0dd866a6851e75!2sThe%20Dugout%20Oasis!5e0!3m2!1sen!2smy!4v1760601471269!5m2!1sen!2smy"
          allowfullscreen=""
          loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"
          class="w-full h-[400px] md:h-full min-h-[500px]"
        ></iframe>
      </div>
    </div>
  </section>
  <!-- Location Section Ends -->
  <!-- FAQ Section Starts -->
  <!-- Heading Section -->
  <section class="py-20">
    <div class="flex flex-col justify-center items-center mb-20 gap-y-1">
      <h1
        class="uppercase text-[#212121] text-[30px] lg:text-[45px] font-roboto-condensed font-semibold text-center mx-auto w-[88%] md:w-full lg:w-full tracking-wider"
      >
        FREQUENTLY ASKED QUESTIONS
      </h1>
      <hr class="text-[#f1c22e] w-24 lg:w-36 xl:w-44 2xl:w-48 3xl:w-64 border mt-2" />
    </div>

    <!-- Accordion Section Starts -->
    <div
      class="w-[85%] xl:w-[69%] 2xl:w-[70%] 3xl:w-[73%] mx-auto mt-8 space-y-6 md:mt-16"
    >
      <!-- Question 1 -->
      <div
        class="transition-all duration-200 bg-white border border-gray-200 shadow-[0_3px_6px_rgba(0,0,0,0.45)]"
      >
        <button
          type="button"
          id="question1"
          data-state="opened"
          class="flex items-start justify-between w-full px-4 py-5 sm:p-6 cursor-pointer"
        >
          <span
            class="flex-1 text-[22px] font-semibold font-roboto-slab text-[#424242] text-left"
          >
            Is there a minimum spend or guest count?
          </span>
          <svg
            id="arrow1"
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
            class="flex-shrink-0 font-semibold w-5 h-8 text-[#424242] transition-transform duration-300"
          >
            <path
              stroke-linecap="square"
              stroke-width="3"
              d="M5 12h14"
            ></path>
          </svg>
        </button>
        <div id="answer1" class="accordion-content open">
          <div class="px-4 pb-5 sm:px-6 sm:pb-6">
            <p class="text-[15px] font-roboto-slab text-[#424242]">
              Yes, a minimum guest count of 30 pax is required for booking.
            </p>
          </div>
        </div>
      </div>

      <!-- Question 2 -->
      <div
        class="transition-all duration-200 bg-white border border-gray-200 shadow-[0_3px_6px_rgba(0,0,0,0.45)]"
      >
        <button
          type="button"
          id="question2"
          data-state="closed"
          class="flex items-start justify-between w-full px-4 py-5 sm:p-6 cursor-pointer"
        >
          <span
            class="flex-1 text-[22px] font-semibold font-roboto-slab text-[#424242] text-left"
          >
            Can I bring my own decorations?
          </span>
          <svg
            id="arrow2"
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
            class="flex-shrink-0 font-semibold w-5 h-8 text-[#424242] transition-transform duration-300"
          >
            <path
              stroke-linecap="square"
              stroke-width="3"
              d="M12 5v14M5 12h14"
            ></path>
          </svg>
        </button>
        <div id="answer2" class="accordion-content">
          <div class="px-4 pb-5 sm:px-6 sm:pb-6">
            <p class="text-[15px] font-roboto-slab text-[#424242]">
              Definitely! Organisers can decorate the venue any way they
              want, with no added charge.
            </p>
          </div>
        </div>
      </div>

      <!-- Question 3 -->
      <div
        class="transition-all duration-200 bg-white border border-gray-200 shadow-[0_3px_6px_rgba(0,0,0,0.45)]"
      >
        <button
          type="button"
          id="question3"
          data-state="closed"
          class="flex items-start justify-between w-full px-4 py-5 sm:p-6 cursor-pointer"
        >
          <span
            class="flex-1 text-[22px] font-semibold font-roboto-slab text-[#424242] text-left"
          >
            Can I play my own music or bring a DJ?
          </span>
          <svg
            id="arrow3"
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
            class="flex-shrink-0 font-semibold w-5 h-8 text-[#424242] transition-transform duration-300"
          >
            <path
              stroke-linecap="square"
              stroke-width="3"
              d="M12 5v14M5 12h14"
            ></path>
          </svg>
        </button>
        <div id="answer3" class="accordion-content">
          <div class="px-4 pb-5 sm:px-6 sm:pb-6">
            <p class="text-[15px] font-roboto-slab text-[#424242]">
              Yes, you can bring your own DJ and play your own music. We
              will provide the basics like the mixer, microphones and the
              sound system.
            </p>
          </div>
        </div>
      </div>

      <!-- Question 4 -->
      <div
        class="transition-all duration-200 bg-white border border-gray-200 shadow-[0_3px_6px_rgba(0,0,0,0.45)]"
      >
        <button
          type="button"
          id="question4"
          data-state="closed"
          class="flex items-start justify-between w-full px-4 py-5 sm:p-6 cursor-pointer"
        >
          <span
            class="flex-1 text-[22px] font-semibold font-roboto-slab text-[#424242] text-left"
          >
            What's your cancellation or reschedulling policy?
          </span>
          <svg
            id="arrow4"
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
            class="flex-shrink-0 font-semibold w-5 h-8 text-[#424242] transition-transform duration-300"
          >
            <path
              stroke-linecap="square"
              stroke-width="3"
              d="M12 5v14M5 12h14"
            ></path>
          </svg>
        </button>
        <div id="answer4" class="accordion-content">
          <div class="px-4 pb-5 sm:px-6 sm:pb-6">
            <p class="text-[15px] font-roboto-slab text-[#424242]">
              At least 2 weeks before the proposed event date.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Accordion Section Ends -->
  <!-- FAQ Section Ends -->
    
  <script src="{{ asset('js/international-telephone-input.js') }}"></script>
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <!-- Owl Carousel Links -->
  <script
    src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"
  ></script>
  <script
    src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
    integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"
  ></script>

  <script>
    let activeSection = "food";

    // Set initial height for the 'food' section so it's visible on load
    document.addEventListener("DOMContentLoaded", () => {
      const initialWrapper = document.getElementById(activeSection);
      // Use max-height for smooth transition
      if (initialWrapper) {
        // Set an initial max-height greater than the content for the 'open' state
        initialWrapper.style.maxHeight = initialWrapper.scrollHeight + "px";
      }

      const phoneInput = document.querySelector("#phone");
      const oldValue = phoneInput.getAttribute("value");

      if (oldValue) {
          phoneInput.value = oldValue; // restore old value after plugin initializes
      }
    });

    function toggleSection(id, imageSrc) {
      // Get elements
      const newWrapper = document.getElementById(id);
      const newButton = document.querySelector(
        `button[data-section="${id}"]`
      );
      const newIcon = document.getElementById(`icon-${id}`);
      const mainImage = document.getElementById("mainImage");

      // Check if the clicked section is already active
      if (activeSection === id) {

        return;
      }

      // Update main image source
      if (mainImage) {
        mainImage.src = imageSrc;
      }

      // Collapse current section
      if (activeSection) {
        const activeWrapper = document.getElementById(activeSection);
        const activeButton = document.querySelector(
          `button[data-section="${activeSection}"]`
        );
        const activeIcon = document.getElementById(`icon-${activeSection}`);

        if (activeWrapper) {
          // 1. Set its max-height to its current height (needed if max-height was set to a fixed large value)
          activeWrapper.style.maxHeight = activeWrapper.scrollHeight + "px";

          // 2. Force reflow/repaint (critical for transition)
          void activeWrapper.offsetWidth;

          // 3. Set max-height to 0 to collapse
          activeWrapper.style.maxHeight = "0";

          // Remove the initial 'open' class if you used one in HTML
          activeWrapper.classList.remove("open");
        }

        // Update button/icon styles for collapsing section
        if (activeIcon) activeIcon.textContent = "+";
        if (activeButton) {
          activeButton.classList.remove("bg-[#ffd60a]");
          activeButton.classList.add("bg-white", "border-2", "border-black");
          activeButton.setAttribute("aria-expanded", "false");
        }
      }

      // Expand new section
      if (newWrapper) {
        // Set max-height to its scrollHeight for smooth expansion
        newWrapper.style.maxHeight = newWrapper.scrollHeight + "px";
        newWrapper.classList.add("open"); // Add 'open' class for styling if needed
      }

      // Update button/icon styles for expanding section
      if (newIcon) newIcon.textContent = "-";
      if (newButton) {
        newButton.classList.add("bg-[#ffd60a]");
        newButton.classList.remove("bg-white", "border-2", "border-black");
        newButton.setAttribute("aria-expanded", "true");
      }

      // Set new active section
      activeSection = id;
    }

    // AOS Initialization
    AOS.init({
      duration: 1000,
      once: true,
    });

    $(document).ready(function () {
      // ===== Slider 1 (Features Section) =====
      var owl1 = $("#slider-1");
      var $counter = $("#slide-counter");

      owl1.owlCarousel({
        loop: true,
        center: false,
        startPosition: 1,
        nav: true,
        navText: [
          '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" /></svg>',
          '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" /></svg>',
        ],
        dots: false,
        smartSpeed: 1590,
        responsive: {
          0: { items: 1, margin: 10, stagePadding: 0 },
          768: { items: 1, margin: 10 },
          1024: { items: 1, margin: 30, stagePadding: 150 },
          1440: { items: 1, margin: 30, stagePadding: 150 },
          1920: { items: 1, margin: 30, stagePadding: 150 },
        },
        onInitialized: updateCounter,
        onTranslated: updateCounter,
      });

      function updateCounter(event) {
        var total = event.item.count;
        var current =
          event.item.index - event.relatedTarget._clones.length / 2;

        if (current <= 0) current = total + current;
        if (current > total) current = current % total;

        $counter.html(
          '<span class="text-[#fecc4d]">' + current + "</span>/" + total
        );
      }

      // ===== Slider 2 (Testimonial Section) =====
      var owl2 = $("#slider-2");

      owl2.owlCarousel({
        loop: true,
        margin: 10,
        nav: false,
        dots: true,
        dotsContainer: ".custom-dots",
        responsive: {
          0: { items: 1 },
          600: { items: 1 },
          1024: { items: 1, center: true, stagePadding: 270 },
          1440: { items: 1, center: true, stagePadding: 380 },
          1536: { items: 1, center: true, stagePadding: 400 },
          1920: { items: 1, center: true, stagePadding: 500 },
        },
      });
      $("#slider-2 .owl-stage").css("padding-bottom", "20px");
    });

    // Get all question buttons
    const questions = document.querySelectorAll('[id^="question"]');

    questions.forEach((question, index) => {
      question.addEventListener("click", function () {
        const answerId = "answer" + (index + 1);
        const arrowId = "arrow" + (index + 1);
        const currentAnswer = document.getElementById(answerId);
        const currentArrow = document.getElementById(arrowId);
        const currentState = this.getAttribute("data-state");

        // Close all other accordions
        questions.forEach((otherQuestion, otherIndex) => {
          if (otherIndex !== index) {
            const otherAnswerId = "answer" + (otherIndex + 1);
            const otherArrowId = "arrow" + (otherIndex + 1);
            const otherAnswer = document.getElementById(otherAnswerId);
            const otherArrow = document.getElementById(otherArrowId);

            otherAnswer.classList.remove("open");
            otherArrow
              .querySelector("path")
              .setAttribute("d", "M12 5v14M5 12h14"); // Plus
            otherQuestion.setAttribute("data-state", "closed");
          }
        });

        // Toggle current accordion
        if (currentState === "closed") {
          currentAnswer.classList.add("open");
          currentArrow.querySelector("path").setAttribute("d", "M5 12h14"); // Minus
          this.setAttribute("data-state", "opened");
        } else {
          currentAnswer.classList.remove("open");
          currentArrow
            .querySelector("path")
            .setAttribute("d", "M12 5v14M5 12h14"); // Plus
          this.setAttribute("data-state", "closed");
        }
      });
    });    
  </script>
</x-app-layout>