<x-app-layout hero="img/heroimage.jpg" isFullHero=true>
  @section('title', 'The Dugout Oasis, Ara Damansara')
  <x-slot:heroContent>
    <!-- Hero Heading Section Starts -->
    <div
      class="absolute mx-auto w-full top-[30%] md:top-[27%] lg:top-[30%] flex flex-col justify-center items-center"
    >
      <h1
        class="text-[22.5px] md:text-[26.25px] text-center lg:text-[45px] text-white font-roboto-slab font-bold w-[80%]"
      >
        A place only for good times
      </h1>
      <h1
        class="text-[30px] [@media(min-width:480px)]:text-[45px] text-center lg:!text-[75px] text-white font-roboto-condensed uppercase font-bold w-[80%] [@media(min-width:480px)]:w-[98%] lg:w-[80%] tracking-wider"
      >
        Sports Bar . Dining
      </h1>
      <hr class="text-[#f1c22e] w-24 text-center mt-5 border" />
    </div>
    <!-- Hero Heading Section Starts -->

    <!-- Football Match Session Mobile Starts -->
    <div
      class="flex flex-col justify-center items-center bg-[#121212] w-[95%] relative bottom-18 mx-auto py-4 gap-y-4 lg:hidden"
    >
      @if($lastmatch->startDateTime > now() && $lastmatch->status==1)
        <div
          class="text-white flex flex-col justify-center items-center gap-y-3 text-center"
        >
          <p
            class="uppercase font-roboto-condensed text-[22.5px] md:text-[27px] font-semibold"
          >
            Upcoming Match
          </p>
          <p class="font-roboto-condensed text-[15px] md:text-[20px] tracking-[1px]">
            {{ $lastmatch->getFormattedDate() }}<span class="font-semibold">{{ $lastmatch->getFormattedTime() }}</span>
          </p>
        </div>
        <div
          class="grid grid-cols-3 gap-x-8 md:gap-x-10 md:grid-cols-[230px_200px_230px] justify-between items-start place-items-center"
        >
          <div class="flex justify-center items-center flex-col gap-y-1">
            <img
              src="{{ asset($lastmatch->homeTeam->logoURL) }}"
              alt="Home Team Logo"
              class="h-20"
            />
            <p
              class="text-white text-[15px] md:text-[20px] text-center md:font-semibold font-roboto-condensed"
            >
              {{$lastmatch->homeTeam->name}}
            </p>
          </div>
          <p
            class="text-white text-center font-roboto-condensed text-[20px] font-semibold"
          >
            VS
          </p>
          <div
            class="flex justify-center items-center flex-col text-center gap-y-1"
          >
            <img
              src="{{ asset($lastmatch->awayTeam->logoURL) }}"
              alt="Hotspur Logo"
              class="h-20"
            />
            <p
              class="text-white text-[15px] md:text-[20px] md:text-nowrap md:font-semibold text-center font-roboto-condensed"
            >
              {{$lastmatch->awayTeam->name}}
            </p>
          </div>
        </div>
      @elseif($lastmatch->startDateTime < now() && $lastmatch->status==1)
        <div
            class="text-white flex flex-col justify-center items-center gap-y-3 text-center"
          >
            <p
              class="uppercase font-roboto-condensed text-[22.5px] md:text-[27px] font-semibold"
            >
              Last Match
            </p>
            <p class="font-roboto-condensed text-[15px] md:text-[20px] tracking-[1px]">
              {{ $lastmatch->getFormattedDate() }}<span class="font-semibold">{{ $lastmatch->getFormattedTime() }}</span>
            </p>
          </div>
          <div
            class="grid grid-cols-3 gap-x-8 md:gap-x-10 md:grid-cols-[230px_200px_230px] justify-between items-start place-items-center"
          >
            <div class="flex justify-center items-center flex-col gap-y-1">
              <img
                src="{{ asset($lastmatch->homeTeam->logoURL) }}"
                alt="Home Team Logo"
                class="h-20"
              />
              <p
                class="text-white text-[15px] md:text-[20px] text-center md:font-semibold font-roboto-condensed"
              >
                {{$lastmatch->homeTeam->name}}
              </p>
            </div>
            <p
              class="text-white text-center font-roboto-condensed text-[20px] font-semibold"
            >
              VS
            </p>
            <div
              class="flex justify-center items-center flex-col text-center gap-y-1"
            >
              <img
                src="{{ asset($lastmatch->awayTeam->logoURL) }}"
                alt="Hotspur Logo"
                class="h-20"
              />
              <p
                class="text-white text-[15px] md:text-[20px] md:text-nowrap md:font-semibold text-center font-roboto-condensed"
              >
                {{$lastmatch->awayTeam->name}}
              </p>
            </div>
          </div>
      @else
        <div
          class="text-white flex flex-col justify-center items-center gap-y-3 text-center"
        >
          <p
            class="uppercase font-roboto-condensed text-[22.5px] md:text-[27px] font-semibold"
          >
            Upcoming Match
          </p>
          <p class="font-roboto-condensed text-[15px] md:text-[20px] tracking-[1px]">
            <span class="font-semibold">Coming Soon</span>
          </p>
        </div>
        <div
          class="grid grid-cols-3 gap-x-8 md:gap-x-10 md:grid-cols-[230px_200px_230px] justify-between items-start place-items-center"
        >
        </div>
      @endif
    </div>
    <!-- Football Match Session Mobile Ends -->
    
    <!-- Football Match Section Desktop Starts -->
    @if($lastmatch->startDateTime > now() && $lastmatch->status==1)
      <div
        class="lg:grid grid-cols-3 grid-rows-1 mx-auto justify-center items-center hidden bg-[#121212] lg:w-[80%] xl:w-[65%] 2xl:w-[60%] 3xl:w-[67%] relative bottom-18 z-40 p-6 3xl:px-12"
      >
        <div class="flex justify-start items-center">
          <img
            src="{{ asset($lastmatch->homeTeam->logoURL) }}"
            alt="Team Logo"
            class="h-20 mr-4"
          />
          <p
            class="text-white text-[20px] font-semibold font-roboto-condensed"
          >
            {{$lastmatch->homeTeam->name}}
          </p>
        </div>
        <!-- Match Date and Time Box -->
        <div
          class="text-white flex flex-col justify-center items-center gap-y-1 text-center"
        >
          <p
            class="uppercase text-[16px] font-semibold font-roboto-condensed"
          >
            Upcoming Match
          </p>
          <p
            class="text-[22px] font-roboto-condensed mx-auto"
          >
            {{ $lastmatch->getFormattedDate() }} <br class="xl:hidden" />
            <span class="font-bold">{{$lastmatch->getFormattedTime()}}</span>
          </p>
        </div>
        <div class="flex justify-end items-center text-right">
          <p
            class="text-white text-[20px] font-semibold font-roboto-condensed"
          >
            {{$lastmatch->awayTeam->name}}
          </p>
          <img
            src="{{ asset($lastmatch->awayTeam->logoURL) }}"
            alt="Hotspur Logo"
            class="h-20"
          />
        </div>
      </div>
    @elseif($lastmatch->startDateTime < now() && $lastmatch->status==1)
      <div
        class="lg:grid grid-cols-3 grid-rows-1 mx-auto justify-center items-center hidden bg-[#121212] lg:w-[80%] xl:w-[65%] 2xl:w-[60%] 3xl:w-[67%] relative bottom-18 z-40 p-6 3xl:px-12"
      >
        <div class="flex justify-start items-center">
          <img
            src="{{ asset($lastmatch->homeTeam->logoURL) }}"
            alt= "Team Logo"
            class="h-20 mr-4"
          />
          <p
            class="text-white text-[20px] font-semibold font-roboto-condensed"
          >
            {{$lastmatch->homeTeam->name}}
          </p>
        </div>
        <!-- Match Date and Time Box -->
        <div
          class="text-white flex flex-col justify-center items-center gap-y-1 text-center"
        >
          <p
            class="uppercase text-[16px] font-semibold font-roboto-condensed"
          >
            Last Match
          </p>
          <p
            class="text-[22px] font-roboto-condensed mx-auto"
          >
            {{ $lastmatch->getFormattedDate() }} <br class="xl:hidden" />
            <span class="font-bold">{{$lastmatch->getFormattedTime()}}</span>
          </p>
        </div>
        <div class="flex justify-end items-center text-right">
          <p
            class="text-white text-[20px] font-semibold font-roboto-condensed"
          >
            {{$lastmatch->awayTeam->name}}
          </p>
          <img
            src="{{ asset($lastmatch->awayTeam->logoURL) }}"
            alt="Hotspur Logo"
            class="h-20"
          />
        </div>
      </div>
    @else
      <div
        class="lg:grid grid-cols-3 grid-rows-1 mx-auto justify-center items-center hidden bg-[#121212] lg:w-[80%] xl:w-[65%] 2xl:w-[60%] 3xl:w-[67%] relative bottom-18 z-40 p-6 3xl:px-12"
      >
        <div class="flex justify-start items-center"></div>
        <!-- Match Date and Time Box -->
        <div
          class="text-white flex flex-col justify-center items-center gap-y-1 text-center"
        >
          <p
            class="uppercase text-[16px] font-semibold font-roboto-condensed"
          >
            Upcoming Match
          </p>
          <p
            class="text-[22px] font-roboto-condensed mx-auto"
          >
            <span class="font-bold">Coming Soon</span>
          </p>
        </div>
        <div class="flex justify-end items-center text-right"></div>
      </div>
    @endif
    <!-- Football Match Section Desktop Ends -->
  </x-slot:heroContent>

  <!-- Highlights -->
  <section class="bg-white">
    <!-- Heading Section -->
    <div class="flex flex-col justify-center items-center gap-y-2">
      <h1
        class="uppercase text-[#212121] text-[30px] lg:text-[45px] font-roboto-condensed font-semibold tracking-wider"
      >
        Highlights
      </h1>
      <hr class="text-[#f1c22e] w-24 lg:w-40 xl:w-48 3xl:w-64 border" />
    </div>
    <!-- Grid Container -->
    <div class="flex justify-center items-center mt-10 mb-24">
      <div
        class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-6 gap-y-10 w-[80%] xl:w-[75%] 3xl:w-[85%] mx-auto place-items-center"
      >
        <!-- Birthday Events Container -->
        <div
          class="group bg-white w-full max-w-xl p-4 flex flex-col items-center relative transition duration-300 ease-in hover:shadow-2xl shadow-lg h-full"
        >
          <!-- Image -->
          <img
            src="{{ asset('img/event-1-2.jpg') }}"
            alt="Birthday Event Image"
            class="w-full h-auto object-cover"
          />
          <div class="flex flex-col gap-y-3 mt-6 mb-14 px-4 text-center">
            <h2
              class="text-center uppercase group-hover:text-[#f1c22e] font-semibold font-roboto-condensed text-[24px] text-[#212121]"
            >
              Birthday Events
            </h2>
            <hr class="text-gray-300 w-full" />
            <p
              class="text-center font-roboto-slab text-[#424242] text-[15px] xl:text-[17.25px] 3xl:mb-4"
            >
              Host your birthday at The Dugout and <br class="hidden" />get
              special discounts and drinks on <br class="hidden" />the
              house.
            </p>
          </div>
          <a href="{{route('service')}}" class="absolute -bottom-5">
            <button
              class="border text-[#424242] bg-white py-[15px] px-[30px] 3xl:py-3.5 md:px-9 3xl:px-16 rounded-4xl uppercase hover:bg-[#f1c22e] hover:text-white hover:border-[#f1c22e] transition duration-200 ease-in font-roboto-condensed font-semibold text-[15px] cursor-pointer active:shadow-[inset_0_2px_4px_rgba(0,0,0,0.6)]"
            >
              Read More
            </button>
          </a>
        </div>
        <!-- Promotion Container -->
        <div
          class="group bg-white w-full max-w-xl p-4 flex flex-col items-center relative transition duration-300 ease-in hover:shadow-2xl shadow-lg h-full"
        >
          <!-- Image -->
          <img
            src="{{ asset('img/event-2.jpg') }}"
            alt="Promotion Image"
            class="w-full h-auto object-cover"
          />
          <div class="flex flex-col gap-y-3 mt-6 mb-14 px-4 text-center">
            <h2
              class="text-center uppercase group-hover:text-[#f1c22e] font-semibold font-roboto-condensed text-[24px] text-[#212121]"
            >
              Promotions
            </h2>
            <hr class="text-gray-300 w-full" />
            <p
              class="text-center font-roboto-slab text-[#424242] text-[15px] mx-full xl:text-[17.25px]"
            >
              Happy Hours , Birthday Specials ,
              <br class="hidden" />Cocktail Promotions and many more.
            </p>
          </div>
          <a href="{{route('promotion')}}" class="absolute -bottom-5">
            <button
              class="border text-[#424242] bg-white py-[15px] px-[30px] 3xl:py-3.5 md:px-9 3xl:px-16 rounded-4xl uppercase hover:bg-[#f1c22e] hover:text-white hover:border-[#f1c22e] transition duration-200 ease-in font-roboto-condensed font-semibold text-[15px] cursor-pointer active:shadow-[inset_0_2px_4px_rgba(0,0,0,0.6)]"
            >
              Read More
            </button>
          </a>
        </div>
        <!-- Authentic Alcohol Container -->
        <div
          class="group bg-white w-full max-w-xl p-4 flex flex-col items-center relative transition duration-300 ease-in hover:shadow-2xl shadow-lg h-full"
        >
          <!-- Image -->
          <img
            src="{{ asset('img/event-3.jpg') }}"
            alt="Alcohol Image"
            class="w-full h-auto object-cover"
          />
          <div class="flex flex-col gap-y-3 mt-6 mb-14 px-4 text-center">
            <h2
              class="text-center uppercase group-hover:text-[#f1c22e] font-semibold font-roboto-condensed text-[24px] text-[#212121]"
            >
              Authentic Alcohol Guarantee
            </h2>
            <hr class="text-gray-300 w-full" />
            <p
              class="text-center font-roboto-slab text-[#424242] text-[15px] mx-full xl:text-[17.25px]"
            >
              Our alcohol products are only sourced <br class="hidden" />
              from the principal suppliers. All
              <br class="hidden" />products are guaranteed original.
            </p>
          </div>
          <a
            href="{{route('authenticity-guarantee')}}"
            class="absolute -bottom-5"
          >
            <button
              class="border text-[#424242] bg-white py-[15px] px-[30px] 3xl:py-3.5 md:px-9 3xl:px-16 rounded-4xl uppercase hover:bg-[#f1c22e] hover:text-white hover:border-[#f1c22e] transition duration-200 ease-in font-roboto-condensed font-semibold text-[15px] cursor-pointer active:shadow-[inset_0_2px_4px_rgba(0,0,0,0.6)]"
            >
              Read More
            </button>
          </a>
        </div>
        <!-- Pundit - Score and Win Container -->
        <div
          class="group bg-white w-full max-w-xl p-4 flex flex-col items-center relative transition duration-300 ease-in hover:shadow-2xl shadow-lg h-full"
        >
          <!-- Image -->
          <img
            src="{{ asset('img/dugout-pundit.jpg') }}"
            alt="Pundit Image"
            class="w-full h-auto object-cover"
          />
          <div class="flex flex-col gap-y-3 mt-6 mb-14 px-4 text-center">
            <h2
              class="text-center uppercase group-hover:text-[#f1c22e] font-semibold font-roboto-condensed text-[24px] text-[#212121]"
            >
              Pundit - Score and Win
            </h2>
            <hr class="text-gray-300 w-full" />
            <p
              class="text-center font-roboto-slab text-[#424242] text-[15px] xl:text-[17.25px]"
            >
              Predict EPL match scores and win <br class="hidden" />free
              drinks and food. Exclusive to our <br class="hidden" />dinein
              guests.
            </p>
          </div>
          <a href="{{route('service')}}" class="absolute -bottom-5">
            <button
              class="border text-[#424242] bg-white py-[15px] px-[30px] 3xl:py-3.5 md:px-9 3xl:px-16 rounded-4xl uppercase hover:bg-[#f1c22e] hover:text-white hover:border-[#f1c22e] transition duration-200 ease-in font-roboto-condensed font-semibold text-[15px] cursor-pointer active:shadow-[inset_0_2px_4px_rgba(0,0,0,0.6)]"
            >
              Learn More
            </button>
          </a>
        </div>
        <!-- Mobile Bar Container -->
        <div
          class="group bg-white w-full max-w-xl p-4 flex flex-col items-center relative transition duration-300 ease-in hover:shadow-2xl shadow-lg h-full"
        >
          <!-- Image -->
          <img
            src="{{ asset('/img/mobile-bar.jpg') }}"
            alt="Mobile Bar Image"
            class="w-full h-auto object-cover"
          />
          <div class="flex flex-col gap-y-3 mt-6 mb-14 px-4 text-center">
            <h2
              class="text-center uppercase group-hover:text-[#f1c22e] font-semibold font-roboto-condensed text-[24px] text-[#212121]"
            >
              Mobile Bar
            </h2>
            <hr class="text-gray-300 w-full" />
            <p
              class="text-center font-roboto-slab text-[#424242] text-[15px] xl:text-[17.25px]"
            >
              Do you fancy having a fullfledged
              <br class="hidden" />cocktail bar for your own events? Let
              <br class="hidden" />us set it up for you
            </p>
          </div>
          <a href="{{route('service')}}" class="absolute -bottom-5">
            <button
              class="border text-[#424242] bg-white py-[15px] px-[30px] 3xl:py-3.5 md:px-9 3xl:px-16 rounded-4xl uppercase hover:bg-[#f1c22e] hover:text-white hover:border-[#f1c22e] transition duration-200 ease-in font-roboto-condensed font-semibold text-[15px] cursor-pointer active:shadow-[inset_0_2px_4px_rgba(0,0,0,0.6)]"
            >
              Find Out How
            </button>
          </a>
        </div>
        <!-- Gourmet Food Container -->
        <div
          class="group bg-white w-full max-w-xl p-4 flex flex-col items-center relative transition duration-300 ease-in hover:shadow-2xl shadow-lg h-full"
        >
          <!-- Image -->
          <img
            src="{{ asset('img/gourmetfood.jpg') }}"
            alt="Gourmet Food Image"
            class="w-full h-auto object-cover"
          />
          <div class="flex flex-col gap-y-3 mt-6 mb-14 px-4 text-center">
            <h2
              class="text-center uppercase group-hover:text-[#f1c22e] font-semibold font-roboto-condensed text-[24px] text-[#212121]"
            >
              Gourmet Food
            </h2>
            <hr class="text-gray-300 w-full" />
            <p
              class="text-center font-roboto-slab text-[#424242] text-[15px] xl:text-[17.25px]"
            >
              Explore our new menu from Chef Din
              <br class="hidden" />previously with Quivo for mouth
              <br class="hidden" />watering local and western delights
            </p>
          </div>
          <a href="{{route('menu')}}" class="absolute -bottom-5">
            <button
              class="border text-[#424242] bg-white py-[15px] px-[30px] 3xl:py-3.5 md:px-9 3xl:px-16 rounded-4xl uppercase hover:bg-[#f1c22e] hover:text-white hover:border-[#f1c22e] transition duration-200 ease-in font-roboto-condensed font-semibold text-[15px] cursor-pointer active:shadow-[inset_0_2px_4px_rgba(0,0,0,0.6)]"
            >
              Read More
            </button>
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- Book a Table Section -->
  <section class="relative flex justify-center items-center">
    <!-- Wine Banner Image -->
    <img
      src="{{ asset('img/winebanner-2.jpg') }}"
      alt="Wine Banner Image"
      class="w-full h-[147.42px] md:h-[40vh] lg:h-[38vh] xl:h-[50vh] 2xl:h-[45vh] 3xl:h-[44vh] object-cover"
    />
    <a
      href="{{ route('reservation') }}"
      class="absolute mx-auto flex justify-center items-center w-full"
    >
      <button
        class="uppercase py-[15px] px-[45px] bg-[#f1c22e] w-[56%] md:w-[30%] lg:w-[18%] xl:w-[15%] rounded-full hover:bg-white transition duration-200 ease-in-out font-roboto-condensed font-semibold text-[15px] text-[#424242] cursor-pointer"
      >
        Book a Table
      </button>
    </a>
  </section>
</x-app-layout>