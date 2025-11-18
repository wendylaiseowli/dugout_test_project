<x-app-layout hero="{{ asset('img/authentic.jpg') }}">
  @section('title', 'Authenticity Guarantee | The Dugout Oasis')
  
  <x-slot:heroContent>
    <div
      class="absolute mx-auto w-full top-[41%] lg:top-[30%] xl:top-[39%] 2xl:top-[40%] 3xl:top-[43%] flex flex-col justify-center items-center"
    >
      <h1
        class="text-[30px] md:text-[52.5px] lg:text-[60px] text-white font-roboto-condensed font-bold uppercase text-center w-[70%] tracking-wide leading-[1.2em]"
      >
        AUTHENTIC ALCOHOL GUARANTEE
      </h1>
    </div>
  </x-slot:heroContent>
      
  <!-- Section Starts -->
  <section class="bg-white py-16">
    <!-- Heading Section -->
    <div class="flex flex-col justify-center items-center gap-y-2 mb-8">
      <h1
        class="uppercase text-[#212121] text-[30px] lg:text-[45px] font-roboto-condensed font-semibold text-center mx-auto w-[80%] lg:w-[60%] tracking-wider"
      >
        100% AUTHENTICITY GUARANTEE
      </h1>
      <hr
        class="text-[#f1c22e] w-24 lg:w-36 xl:w-44 2xl:w-48 3xl:w-64 border"
      />
    </div>
    <div class="flex flex-col lg:flex-row w-[80%] mx-auto lg:gap-x-14">
      <!-- Left Content -->
      <div class="flex flex-col gap-y-6">
        <h1
          class="text-[#212121] text-[22px] font-roboto-condensed font-semibold text-center mx-auto md:text-[37.5px] md:text-left md:mx-0"
        >
          Our Promise to You
        </h1>
        <p
          class="text-[#424242] font-roboto-slab text-[15px] text-center mx-auto md:text-[18px] md:text-left md:mx-0 md:w-[105%] lg:w-[101%] xl:w-[85%] 3xl:w-[95%]"
        >
          Here at The Dugout, we 100% guarantee that all alcohol sold in our
          outlets are the following:
        </p>
        <ul class="w-[80%] mx-auto flex flex-col gap-y-3 md:mx-10">
          <li
            class="list-disc text-[#424242] font-roboto-slab text-[15px] md:text-[16.5px]"
          >
            100% Genuine Brand Goods
          </li>
          <li
            class="list-disc text-[#424242] font-roboto-slab text-[15px] md:text-[16.5px] lg:w-[106%]"
          >
            Official Product from a Reputable or Direct Source
          </li>
          <li
            class="list-disc text-[#424242] font-roboto-slab text-[15px] md:text-[16.5px] lg:w-[106%]"
          >
            Not Replica or Counterfeit Product/Items
          </li>
          <li
            class="list-disc text-[#424242] font-roboto-slab text-[15px] md:text-[16.5px] lg:w-[106%]"
          >
            Safe to drink and meet all Malaysia Laws
          </li>
          <li
            class="list-disc text-[#424242] font-roboto-slab text-[15px] md:text-[16.5px]"
          >
            Brand New & Unopened Products
          </li>
        </ul>
        <p
          class="text-[#424242] font-roboto-slab text-[15px] text-center mb-8 md:text-[18px] md:text-left xl:w-[90%] md:mx-0 3xl:w-[95%]"
        >
          All of our alcohol and food products are purchased from licensed
          distributors or directly from the importer. Every item is
          inspected thoroughly and confirmed to be genuine before delivering
          to you.
        </p>
      </div>
      <!-- Right Content -->
      <div class="">
        <img
          src="{{ asset('img/2211.jpg') }}"
          alt="Barrel Image"
          class="mx-auto"
        />
      </div>
    </div>
  </section>
  <!-- Section Ends -->
</x-app-layout>