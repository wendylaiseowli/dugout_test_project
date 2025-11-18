<x-app-layout hero="img/TD_services.jpg">
  
  <!-- Page Title -->
  @section('title', 'Services | The Dugout Oasis')
  
  <!-- Services Tag -->
  <x-slot:heroContent>
    <div
      class="absolute mx-auto w-full top-[60%] md:top-[50%] lg:top-[38%] xl:top-[40%] flex flex-col justify-center items-center"
    >
      <h1
        class="text-[30px] md:text-[52.5px] lg:text-[60px] text-white font-roboto-condensed font-bold uppercase"
      >
        Services
      </h1>
    </div>
  </x-slot:heroContent>

  <!-- Services Section -->
  <section class="bg-white mt-16 mb-24">
    <!-- Heading Section -->
    <div class="flex flex-col justify-center items-center gap-y-2 mb-8">
      <h1
        class="uppercase text-[#212121] text-[30px] lg:text-[45px] font-roboto-condensed font-semibold text-center mx-auto w-[80%] lg:w-[60%] tracking-wider"
      >
        Services
      </h1>
      <hr class="text-[#f1c22e] w-24 lg:w-36 xl:w-48 3xl:w-64 border" />
      <p
        class="mt-3.5 w-[82%] md:w-[70%] lg:w-[83%] xl:w-[96%] 3xl:w-full font-roboto-slab text-[#424242] text-[15px] text-center"
      >
        At The Dugout, we are more than just a place that pours you a drink
      </p>
    </div>

    <!-- Main section -->
    <div class="space-y-10">
      <div
        class="flex flex-col lg:flex-row w-[88%] xl:w-[77%] 2xl:w-[73%] 3xl:w-[82%] mx-auto lg:gap-14"
      >
        <img
          src="{{ asset('img/event-1-2.jpg') }}"
          alt="Birthday Event"
          class="h-full w-[425px] md:w-[690px] lg:w-[425px] xl:w-[525px] 3xl:w-[756px] mx-auto"
        />
        <div
          class="flex flex-col gap-y-3 lg:justify-center xl:justify-start mt-8 xl:mt-14 2xl:mt-0"
        >
          <h1
            class="text-[#212121] text-[28px] font-roboto-condensed font-semibold text-center lg:text-left lg:mx-0 mx-auto 2xl:mt-16"
          >
            Birthday Events
          </h1>
          <hr
            class="text-[#f1c22e] w-24 md:w-56 lg:w-16 xl:w-20 3xl:w-28 border mx-auto lg:mx-0"
          />
          <p
            class="w-[84%] md:w-full font-roboto-slab text-[#424242] text-[15px] text-center lg:text-left lg:mx-0 mx-auto leading-[2em]"
          >
            Celebrate your birthday with us and let us pamper you and your
            friends. From a complimentary cocktail of choice and a round of
            shooters for your friends.
          </p>
        </div>
      </div>

      <div
        class="flex flex-col lg:flex-row-reverse w-[88%] xl:w-[77%] 2xl:w-[73%] 3xl:w-[82%] mx-auto lg:gap-14"
      >
        <img
          src="{{ asset('img/mobile-bar-large.jpg') }}"
          alt="Mobile Bar Event"
          class="h-full w-[425px] md:w-[690px] lg:w-[425px] xl:w-[525px] 3xl:w-[756px] mx-auto"
        />
        <div
          class="flex flex-col gap-y-3 lg:justify-center xl:justify-start mt-8 xl:mt-14 2xl:mt-0"
        >
          <h1
            class="text-[#212121] text-[28px] font-roboto-condensed font-semibold text-center lg:text-left lg:mx-0 mx-auto 2xl:mt-16"
          >
            Mobile Bar
          </h1>
          <hr
            class="text-[#f1c22e] w-24 md:w-56 lg:w-16 xl:w-20 3xl:w-28 border mx-auto lg:mx-0"
          />
          <p
            class="w-[82%] md:w-full 3xl:w-[98%] font-roboto-slab text-[#424242] text-[15px] text-center lg:text-left lg:mx-0 mx-auto leading-[2em]"
          >
            We want to power your events and parties. Let our bartenders
            tend to your liquid needs while u party away. Find out more on
            how we can bring the Dugout experience right to your doorstep.
            Be the talk of the town.
          </p>

          <a href="{{route('mobile-bar')}}" class="mt-3">
            <button
              class="mx-auto lg:mx-0 flex justify-center items-center uppercase text-[#424242] bg-[#f1c22e] hover:bg-white py-[15px] px-[45px] text-nowrap w-[55%] md:w-[40%] lg:w-[43%] xl:w-[40%] rounded-full active:bg-white transition duration-200 ease-in-out font-roboto-condensed font-semibold text-[15px] active:text-[#424242] cursor-pointer active:shadow-[inset_0_2px_4px_rgba(0,0,0,0.6)]"
            >
              Read More
            </button>
          </a>
        </div>
      </div>

      <div
        class="flex flex-col lg:flex-row w-[88%] xl:w-[77%] 2xl:w-[73%] 3xl:w-[82%] mx-auto lg:gap-14"
      >
        <img
          src="{{ asset('img/dugout-pundit-large.jpg') }}"
          alt="Dugout Pundit Event"
          class="h-full w-[425px] md:w-[690px] lg:w-[425px] xl:w-[525px] 3xl:w-[756px] mx-auto"
        />
        <div
          class="flex flex-col gap-y-3 lg:justify-center xl:justify-start mt-8 xl:mt-14 2xl:mt-0"
        >
          <h1
            class="text-[#212121] text-[28px] font-roboto-condensed font-semibold text-center lg:text-left lg:mx-0 mx-auto 2xl:mt-16"
          >
            The Dugout Pundit
          </h1>
          <hr
            class="text-[#f1c22e] w-24 md:w-56 lg:w-16 xl:w-20 3xl:w-28 border mx-auto lg:mx-0"
          />
          <p
            class="w-[82%] md:w-full 2xl:w-[98%] font-roboto-slab text-[#424242] text-[15px] text-center lg:text-left lg:mx-0 mx-auto leading-[2em]"
          >
            Nothing like watching a game with a little wager on it. Predict
            the scores for the games we screen and win free drinks and food
          </p>
        </div>
      </div>
    </div>
  </section>
</x-app-layout>
