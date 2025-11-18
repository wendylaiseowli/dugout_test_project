<x-app-layout hero="img/TD_menu.jpg">
  
  <!-- Page Title -->
  @section('title', 'Menu | The Dugout Oasis')

  <!-- Menu Tag -->
  <x-slot:heroContent>
    <div
      class="absolute mx-auto w-full top-[62%] md:top-[49%] lg:top-[38%] xl:top-[40%] flex flex-col justify-center items-center"
    >
      <h1
        class="text-[30px] md:text-[52.5px] lg:text-[60px] text-white font-roboto-condensed font-bold uppercase tracking-wider"
      >
        Menu
      </h1>
    </div>
  </x-slot:heroContent>
  
  <!-- Menu Section -->
  <section class="bg-[white] mt-16 mb-24">
    <!-- Heading Section -->
    <div class="flex flex-col justify-center items-center gap-y-4 lg:gap-y-2 mb-8">
      <h1
        class="w-[85%] uppercase text-center text-[#212121] text-[30px] lg:text-[45px] font-roboto-condensed font-semibold tracking-wider"
      >
        Gourmet meals and speciality drinks
      </h1>
      <hr class="text-[#f1c22e] w-24 md:w-28 lg:w-40 xl:w-52 2xl:w-48 3xl:w-64 border lg:mb-3" />
      <p
        class="font-roboto-slab w-[70%] md:w-[60%] lg:w-[60%] xl:w-[50%] 2xl:w-[47%] 3xl:w-full text-center mx-auto text-[#424242] text-[15px]"
      >
        Explore our exciting selections and carefully crafted menu brought
        to you by the talented chefs at The Dugout Oasis
      </p>
    </div>
    <div>
      <!-- Tab Buttons -->
      <div class="inline-flex relative w-full justify-center">
        <!-- Food Button -->
        <button
          id="foodBtn"
          class="py-3 px-14 md:px-28 lg:py-2.5 lg:px-36 xl:py-3 xl:px-24 3xl:px-32 text-[15px] xl:text-[16.5px] font-roboto-condensed text-center font-semibold text-[#424242] transition-all duration-300 bg-[#f1c22e] hover:bg-[#f1c22e] cursor-pointer rounded-full relative z-10"
        >
          <!-- set default active here -->
          FOOD
        </button>
        <!-- Drinks Button -->
        <button
          id="drinksBtn"
          class="py-3 px-14 md:px-28 lg:py-2.5 lg:px-36 xl:py-3 xl:px-24 3xl:px-32 text-[15px] xl:text-[16.5px] font-roboto-condensed text-center font-semibold text-[#424242] transition-all duration-300 hover:bg-[#f1c22e]  hover:z-10 cursor-pointer bg-gray-300 rounded-full -ml-10"
        >
          DRINKS
        </button>
      </div>

      <!-- Food Tabs -->
      <div
        id="foodTabs"
        data-controller="tabs"
        data-tabs-index-value="0"
        class="mx-3 mt-6"
      >
        <ul
          id="tabBar"
          class="flex justify-center items-center text-center border-b border-gray-200 w-fit gap-x-5 md:gap-x-10 lg:gap-x-14 xl:gap-x-16 3xl:gap-x-20 transition-colors duration-300 mx-auto"
        >
          <li
            class="px-1.5 mb-0 pb-4 md:pb-6 xl:pb-3 border-b border-[#f1c22e] transition-all duration-300 ease-in-out"
            data-action="click->tabs#change"
            data-tabs-target="tab"
          >
            <a
              href="{{ route('menu') }}"
              class="inline-block uppercase w-fit font-semibold text-center font-roboto-condensed text-[8.5px] [@media(min-width:375px)]:text-[9.5px] md:!text-[13px] lg:!text-[16.5px]"
              >Starters</a
            >
          </li>
          <li
            class="px-1.5 mb-0 pb-4 md:pb-6 xl:pb-3 border-b border-transparent transition-all duration-300 ease-in-out"
            data-action="click->tabs#change"
            data-tabs-target="tab"
          >
            <a
              href="{{ route('menu') }}"
              class="inline-block uppercase w-fit text-[8.5px] font-semibold text-center font-roboto-condensed [@media(min-width:375px)]:text-[9.5px] md:!text-[13px] lg:!text-[16.5px]"
              >Mains</a
            >
          </li>
          <li
            class="px-1.5 mb-0 pb-4 md:pb-6 xl:pb-3 border-b border-transparent transition-all duration-300 ease-in-out"
            data-action="click->tabs#change"
            data-tabs-target="tab"
          >
            <a
              href="{{ route('menu') }}"
              class="inline-block uppercase w-fit text-[8.5px] font-semibold text-center font-roboto-condensed [@media(min-width:375px)]:text-[9.5px] md:!text-[13px] lg:!text-[16.5px]"
              >Burgers</a
            >
          </li>
          <li
            class="px-1.5 mb-0 pb-4 md:pb-6 xl:pb-3 border-b border-transparent transition-all duration-300 ease-in-out"
            data-action="click->tabs#change"
            data-tabs-target="tab"
          >
            <a
              href="{{ route('menu') }}"
              class="inline-block uppercase w-fit text-[8.5px] font-semibold text-center font-roboto-condensed [@media(min-width:375px)]:text-[9.5px] md:!text-[13px] lg:!text-[16.5px]"
              >Pizza</a
            >
          </li>
          <li
            class="px-1.5 mb-0 pb-4 md:pb-6 xl:pb-3 border-b border-transparent transition-all duration-300 ease-in-out"
            data-action="click->tabs#change"
            data-tabs-target="tab"
          >
            <a
              href="#"
              class="inline-block uppercase w-fit text-[8.5px] font-semibold text-center font-roboto-condensed [@media(min-width:375px)]:text-[9.5px] md:!text-[13px] lg:!text-[16.5px]"
              >Asian</a
            >
          </li>
          <li
            class="px-1.5 mb-0 pb-4 md:pb-6 xl:pb-3 border-b border-transparent transition-all duration-300 ease-in-out"
            data-action="click->tabs#change"
            data-tabs-target="tab"
          >
            <a
              href="#"
              class="inline-block uppercase w-fit text-[8.5px] font-semibold text-center font-roboto-condensed [@media(min-width:375px)]:text-[9.5px] md:!text-[13px] lg:!text-[16.5px]"
              >Desserts</a
            >
          </li>
        </ul>
        <!-- Starters -->
        <div class="hidden px-1 py-2 mx-auto" data-tabs-target="panel">
          @if($starters->count()>0)
            <div
              class="grid grid-cols-1 lg:grid-cols-2 w-full lg:w-[85%] 2xl:w-[70%] mx-auto justify-center items-center place-items-center mt-4 gap-y-6 gap-x-8 lg:gap-x-20 3xl:w-[80%] 3xl:gap-x-20"
            >
              @foreach($starters as $starter)
                <div
                  class="w-full max-w-md md:max-w-lg lg:max-w-md 3xl:max-w-5xl mx-auto min-h-32 p-3"
                >
                  <div
                    class="flex justify-between items-center border-b border-gray-200 tracking-[0.12em]"
                  >
                    <h1
                      class="uppercase text-[#212121] font-roboto-condensed font-semibold mb-3 text-[16px] md:text-[18px] xl:text-[20px]"
                    >
                      {{$starter->menu_item_name}}
                    </h1>
                    <h1
                      class="text-[#212121] font-roboto-condensed font-semibold mb-3 text-[16px] md:text-[18px] xl:text-[20px]"
                    >
                      {{$starter->price}}
                    </h1>
                  </div>
                  <p
                    class="mt-2 text-[#424242] font-roboto-slab text-[14px] md:text-[15px]"
                    >
                      {{$starter->menu_item_description}}
                  </p>
                </div>
              @endforeach
            </div>
          @else
            <h1
              class="text-[30px] font-roboto-condensed uppercase font-semibold mt-10 text-[#212121] text-center"
            >
              Coming Soon
            </h1>
          @endif
        </div>
        
        <!-- Mains -->
        <div class="hidden px-1 py-2 mx-auto" data-tabs-target="panel">
          @if($mains->count()>0)
            <div
              class="grid grid-cols-1 lg:grid-cols-2 w-full lg:w-[85%] 2xl:w-[70%] mx-auto justify-center items-center place-items-center mt-4 gap-y-6 gap-x-8 lg:gap-x-20 3xl:w-[80%] 3xl:gap-x-20"
            >
              @foreach($mains as $main)
                <div
                  class="w-full max-w-md md:max-w-lg lg:max-w-md 3xl:max-w-5xl mx-auto min-h-32 p-3"
                >
                  <div
                    class="flex justify-between items-center border-b border-gray-200 tracking-[0.12em]"
                  >
                    <h1
                      class="uppercase text-[#212121] font-roboto-condensed font-semibold mb-3 text-[16px] md:text-[18px] xl:text-[20px]"
                    >
                      {{ $main->menu_item_name }}
                    </h1>
                    <h1
                      class="text-[#212121] font-roboto-condensed font-semibold mb-3 text-[16px] md:text-[18px] xl:text-[20px]"
                    >
                      {{ $main->price }}
                    </h1>
                  </div>
                  <p
                    class="mt-2 text-[#424242] font-roboto-slab text-[14px] md:text-[15px]"
                  >
                    {{ $main->menu_item_description }}
                  </p>
                </div>
              @endforeach
            </div>
          @else
            <h1
              class="text-[30px] font-roboto-condensed uppercase font-semibold mt-10 text-[#212121] text-center"
            >
              Coming Soon
            </h1>
          @endif          
        </div>

        <!-- Burgers -->
        <div class="hidden px-1 py-2 mx-auto" data-tabs-target="panel">
          @if($burgers->count()>0)
            <div
              class="grid grid-cols-1 lg:grid-cols-2 w-full lg:w-[85%] 2xl:w-[70%] mx-auto justify-center items-center place-items-center mt-4 gap-y-6 gap-x-8 lg:gap-x-20 3xl:w-[80%] 3xl:gap-x-20"
            >
              @foreach($burgers as $burger)
                <div
                  class="w-full max-w-md md:max-w-lg lg:max-w-md 3xl:max-w-5xl mx-auto min-h-32 p-3"
                >
                  <div
                    class="flex justify-between items-center border-b border-gray-200 tracking-[0.12em]"
                  >
                    <h1
                      class="uppercase text-[#212121] font-roboto-condensed font-semibold mb-3 text-[16px] md:text-[18px] xl:text-[20px]"
                    >
                      {{$burger->menu_item_name}}
                    </h1>
                    <h1
                      class="text-[#212121] font-roboto-condensed font-semibold mb-3 text-[16px] md:text-[18px] xl:text-[20px]"
                    >
                      {{$burger->price}}
                    </h1>
                  </div>
                  <p
                    class="mt-2 text-[#424242] font-roboto-slab text-[14px] md:text-[15px]"
                  >
                    {{$burger->menu_item_description}}
                  </p>
                </div>
              @endforeach
            </div>
          @else
            <h1
              class="text-[30px] font-roboto-condensed uppercase font-semibold mt-10 text-[#212121] text-center"
            >
              Coming Soon
            </h1>
          @endif
        </div>

        <!-- Pizza -->
        <div class="hidden px-1 py-2 mx-auto" data-tabs-target="panel">
          @if($pizzas->count()>0)
            <div
              class="grid grid-cols-1 lg:grid-cols-2 w-full lg:w-[85%] 2xl:w-[70%] mx-auto justify-center items-center place-items-center mt-4 gap-y-6 gap-x-8 lg:gap-x-20 3xl:w-[80%] 3xl:gap-x-20"
            >
              @foreach($pizzas as $pizza)
                <div
                  class="w-full max-w-md md:max-w-lg lg:max-w-md 3xl:max-w-5xl mx-auto min-h-32 p-3"
                >
                  <div
                    class="flex justify-between items-center border-b border-gray-200 tracking-[0.12em]"
                  >
                    <h1
                      class="uppercase text-[#212121] font-roboto-condensed font-semibold mb-3 text-[16px] md:text-[18px] xl:text-[20px]"
                    >
                      {{ $pizza->menu_item_name}}
                    </h1>
                    <h1
                      class="text-[#212121] font-roboto-condensed font-semibold mb-3 text-[16px] md:text-[18px] xl:text-[20px]"
                    >
                      {{$pizza->price}}
                    </h1>
                  </div>
                  <p
                    class="mt-2 text-[#424242] font-roboto-slab text-[14px] md:text-[15px]"
                  >
                    {{$pizza->menu_item_description}}
                  </p>
                </div>
              @endforeach
            </div>
          @else
            <h1
              class="text-[30px] font-roboto-condensed uppercase font-semibold mt-10 text-[#212121] text-center"
            >
              Coming Soon
            </h1>
          @endif
        </div>

        <!-- Asian -->
        <div class="hidden px-1 py-2 mx-auto" data-tabs-target="panel">
          @if($asians->count()>0)
            <div
              class="grid grid-cols-1 lg:grid-cols-2 w-full lg:w-[85%] 2xl:w-[70%] mx-auto justify-center items-center place-items-center mt-4 gap-y-6 gap-x-8 lg:gap-x-20 3xl:w-[80%] 3xl:gap-x-20"
            >
              @foreach($asians as $asian)
                <div
                  class="w-full max-w-md md:max-w-lg lg:max-w-md 3xl:max-w-5xl mx-auto min-h-32 p-3"
                >
                  <div
                    class="flex justify-between items-center border-b border-gray-200 tracking-[0.12em]"
                  >
                    <h1
                      class="uppercase text-[#212121] font-roboto-condensed font-semibold mb-3 text-[16px] md:text-[18px] xl:text-[20px]"
                    >
                      {{ $asian->menu_item_name }}
                    </h1>
                    <h1
                      class="text-[#212121] font-roboto-condensed font-semibold mb-3 text-[16px] md:text-[18px] xl:text-[20px]"
                    >
                      {{ $asian->price }}
                    </h1>
                  </div>
                  <p
                    class="mt-2 text-[#424242] font-roboto-slab text-[14px] md:text-[15px]"
                  >
                    {{ $asian->menu_item_description }}
                  </p>
                </div>
              @endforeach
            </div>
          @else
            <h1
              class="text-[30px] font-roboto-condensed uppercase font-semibold mt-10 text-[#212121] text-center"
            >
              Coming Soon
            </h1>
          @endif
        </div>

        <!-- Desserts -->
        <div class="hidden px-1 py-2 mx-auto" data-tabs-target="panel">
          @if($desserts->count()>0)
            <div
              class="grid grid-cols-1 lg:grid-cols-2 w-full lg:w-[85%] 2xl:w-[70%] mx-auto justify-center items-center place-items-center mt-4 gap-y-6 gap-x-8 lg:gap-x-20 3xl:w-[80%] 3xl:gap-x-20"
            >
              @foreach($desserts as $dessert)
                <div
                  class="w-full max-w-md md:max-w-lg lg:max-w-md 3xl:max-w-5xl mx-auto min-h-32 p-3"
                >
                  <div
                    class="flex justify-between items-center border-b border-gray-200 tracking-[0.12em]"
                  >
                    <h1
                      class="uppercase text-[#212121] font-roboto-condensed font-semibold mb-3 text-[16px] md:text-[18px] xl:text-[20px]"
                    >
                      {{ $dessert->menu_item_name }}
                    </h1>
                    <h1
                      class="text-[#212121] font-roboto-condensed font-semibold mb-3 text-[16px] md:text-[18px] xl:text-[20px]"
                    >
                      {{ $dessert->price }}
                    </h1>
                  </div>
                  <p
                    class="mt-2 text-[#424242] font-roboto-slab text-[14px] md:text-[15px]"
                  >
                    {{ $dessert->menu_item_description }}
                  </p>
                </div>
              @endforeach
            </div>
          @else
            <h1
              class="text-[30px] font-roboto-condensed uppercase font-semibold mt-10 text-[#212121] text-center"
            >
              Coming Soon
            </h1>
          @endif
        </div>
      </div>
      <!--Foods Tabs End here-->

      <!-- Drinks Tabs -->
      <div
        id="drinksTabs"
        data-controller="tabs"
        data-tabs-index-value="0"
        class="mx-3 mt-6 hidden"
      >
        <ul
          id="tabBar"
          class="flex justify-center items-center text-center border-b border-gray-200 w-fit [@media(max-width:390px)]:gap-x-1 gap-x-3 md:gap-x-10 lg:gap-x-14 xl:gap-x-16 3xl:gap-x-20 transition-colors duration-300 mx-auto"
        >
          <li
            class="px-1.5 mb-0 pb-4 md:pb-6 xl:pb-3 border-b border-[#f1c22e] transition-all duration-300 ease-in-out"
            data-action="click->tabs#change"
            data-tabs-target="tab"
          >
            <a
              href="{{ route('menu') }}"
              class="inline-block uppercase w-fit font-semibold text-center font-roboto-condensed text-[8.5px] [@media(min-width:375px)]:text-[9.5px] md:!text-[13px] lg:!text-[16.5px]"
              >Cocktail</a
            >
          </li>
          <li
            class="px-1.5 mb-0 pb-4 md:pb-6 xl:pb-3 border-b border-transparent transition-all duration-300 ease-in-out"
            data-action="click->tabs#change"
            data-tabs-target="tab"
          >
            <a
              href="{{ route('menu') }}"
              class="inline-block uppercase w-fit text-[8.5px] text-nowrap font-semibold text-center font-roboto-condensed [@media(min-width:375px)]:text-[9.5px] md:!text-[13px] lg:!text-[16.5px]"
              >Non-Alcoholic</a
            >
          </li>
          <li
            class="px-1.5 mb-0 pb-4 md:pb-6 xl:pb-3 border-b border-transparent transition-all duration-300 ease-in-out"
            data-action="click->tabs#change"
            data-tabs-target="tab"
          >
            <a
              href="{{ route('menu') }}"
              class="inline-block uppercase w-fit text-[8.5px] font-semibold text-center font-roboto-condensed [@media(min-width:375px)]:text-[9.5px] md:!text-[13px] lg:!text-[16.5px]"
              >Liquor</a
            >
          </li>
          <li
            class="px-1.5 mb-0 pb-4 md:pb-6 xl:pb-3 border-b border-transparent transition-all duration-300 ease-in-out"
            data-action="click->tabs#change"
            data-tabs-target="tab"
          >
            <a
              href="{{ route('menu') }}"
              class="inline-block uppercase w-fit text-[8.5px] font-semibold text-center font-roboto-condensed [@media(min-width:375px)]:text-[9.5px] md:!text-[13px] lg:!text-[16.5px]"
              >Shooters</a
            >
          </li>
          <li
            class="px-1.5 mb-0 pb-4 md:pb-6 xl:pb-3 border-b border-transparent transition-all duration-300 ease-in-out"
            data-action="click->tabs#change"
            data-tabs-target="tab"
          >
            <a
              href="{{ route('menu') }}"
              class="inline-block uppercase w-fit text-[8.5px] font-semibold text-center font-roboto-condensed [@media(min-width:375px)]:text-[9.5px] md:!text-[13px] lg:!text-[16.5px]"
              >Wines</a
            >
          </li>
          <li
            class="px-1.5 mb-0 pb-4 md:pb-6 xl:pb-3 border-b border-transparent transition-all duration-300 ease-in-out"
            data-action="click->tabs#change"
            data-tabs-target="tab"
          >
            <a
              href="{{ route('menu') }}"
              class="inline-block uppercase w-fit text-[8.5px] font-semibold text-center font-roboto-condensed [@media(min-width:375px)]:text-[9.5px] md:!text-[13px] lg:!text-[16.5px]"
              >Beer</a
            >
          </li>
        </ul>

        <!-- Cocktail -->
        <div class="hidden px-1 py-2 mx-auto" data-tabs-target="panel">
          @if($cocktails->count() > 0)
            <div
              class="grid grid-cols-1 lg:grid-cols-2 w-full lg:w-[85%] 2xl:w-[70%] mx-auto justify-center items-center place-items-center mt-4 gap-y-6 gap-x-8 lg:gap-x-20 3xl:w-[80%] 3xl:gap-x-20"
            >
              @foreach($cocktails as $cocktail)
                <div
                  class="w-full max-w-md md:max-w-lg lg:max-w-md 3xl:max-w-5xl mx-auto min-h-32 p-3"
                >
                  <div
                    class="flex justify-between items-center border-b border-gray-200 tracking-[0.12em]"
                  >
                    <h1
                      class="uppercase text-[#212121] font-roboto-condensed font-semibold mb-3 text-[16px] md:text-[18px] xl:text-[20px]"
                    >
                      {{ $cocktail->menu_item_name }}
                    </h1>
                    <h1
                      class="text-[#212121] font-roboto-condensed font-semibold mb-3 text-[16px] md:text-[18px] xl:text-[20px]"
                    >
                      {{ $cocktail->price }}
                    </h1>
                  </div>
                  <p
                    class="mt-2 text-[#424242] font-roboto-slab text-[14px] md:text-[15px]"
                  >
                    {{ $cocktail->menu_item_description }}
                  </p>
                </div>
              @endforeach
            </div>
          @else
            <h1
              class="text-[30px] font-roboto-condensed uppercase font-semibold mt-10 text-[#212121] text-center"
            >
              Coming Soon
            </h1>          
          @endif
        </div>

        <!-- Non-Alcoholic -->
        <div class="hidden px-1 py-2 mx-auto" data-tabs-target="panel">
          @if($nonAlcoholics->count() > 0)
            <div
              class="grid grid-cols-1 lg:grid-cols-2 w-full lg:w-[85%] 2xl:w-[70%] mx-auto justify-center items-center place-items-center mt-4 gap-y-6 gap-x-8 lg:gap-x-20 3xl:w-[80%] 3xl:gap-x-20"
            >
              @foreach($nonAlcoholics as $nonAlcoholic)
                <div
                  class="w-full max-w-md md:max-w-lg lg:max-w-md 3xl:max-w-5xl mx-auto min-h-32 p-3"
                >
                  <div
                    class="flex justify-between items-center border-b border-gray-200 tracking-[0.12em]"
                  >
                    <h1
                      class="uppercase text-[#212121] font-roboto-condensed font-semibold mb-3 text-[16px] md:text-[18px] xl:text-[20px]"
                    >
                      {{ $nonAlcoholic->menu_item_name }}
                    </h1>
                    <h1
                      class="text-[#212121] font-roboto-condensed font-semibold mb-3 text-[16px] md:text-[18px] xl:text-[20px]"
                    >
                      {{ $nonAlcoholic->price }}
                    </h1>
                  </div>
                  <p
                    class="mt-2 text-[#424242] font-roboto-slab text-[14px] md:text-[15px]"
                  >
                    {{ $nonAlcoholic->menu_item_description }}
                  </p>
                </div>
              @endforeach
            </div>
          @else
            <h1
              class="text-[30px] font-roboto-condensed uppercase font-semibold mt-10 text-[#212121] text-center"
            >
              Coming Soon
            </h1>   
          @endif
        </div>

        <!-- Liquor -->
        <div class="hidden px-1 py-2 mx-auto" data-tabs-target="panel">
          @if($liquors->count() > 0)
            <div
              class="grid grid-cols-1 lg:grid-cols-2 w-full lg:w-[85%] 2xl:w-[70%] mx-auto justify-center items-center place-items-center mt-4 gap-y-6 gap-x-8 lg:gap-x-20 3xl:w-[80%] 3xl:gap-x-20"
            >
              @foreach($liquors as $liquor)
                <div
                  class="w-full max-w-md md:max-w-lg lg:max-w-md 3xl:max-w-5xl mx-auto min-h-32 p-3"
                >
                  <div
                    class="flex justify-between items-center border-b border-gray-200 tracking-[0.12em]"
                  >
                    <h1
                      class="uppercase text-[#212121] font-roboto-condensed font-semibold mb-3 text-[16px] md:text-[18px] xl:text-[20px]"
                    >
                      {{ $liquor->menu_item_name }}
                    </h1>
                    <h1
                      class="text-[#212121] font-roboto-condensed font-semibold mb-3 text-[16px] md:text-[18px] xl:text-[20px]"
                    >
                      {{ $liquor->price }}
                    </h1>
                  </div>
                  <p
                    class="mt-2 text-[#424242] font-roboto-slab text-[14px] md:text-[15px]"
                  >
                    {{ $liquor->menu_item_description }}
                  </p>
                </div>
              @endforeach
            </div>
          @else    
            <h1
              class="text-[30px] font-roboto-condensed uppercase font-semibold mt-10 text-[#212121] text-center"
            >
              Coming Soon
            </h1>
          @endif
        </div>

        <!-- Shooters -->
        <div class="hidden px-1 py-2 mx-auto" data-tabs-target="panel">
          @if($shooters->count() > 0)
            <div
              class="grid grid-cols-1 lg:grid-cols-2 w-full lg:w-[85%] 2xl:w-[70%] mx-auto justify-center items-center place-items-center mt-4 gap-y-6 gap-x-8 lg:gap-x-20 3xl:w-[80%] 3xl:gap-x-20"
            >
              @foreach($shooters as $shooter)
                <div
                  class="w-full max-w-md md:max-w-lg lg:max-w-md 3xl:max-w-5xl mx-auto min-h-32 p-3"
                >
                  <div
                    class="flex justify-between items-center border-b border-gray-200 tracking-[0.12em]"
                  >
                    <h1
                      class="uppercase text-[#212121] font-roboto-condensed font-semibold mb-3 text-[16px] md:text-[18px] xl:text-[20px]"
                    >
                      {{ $shooter->menu_item_name }}
                    </h1>
                    <h1
                      class="text-[#212121] font-roboto-condensed font-semibold mb-3 text-[16px] md:text-[18px] xl:text-[20px]"
                    >
                      {{ $shooter->price }}
                    </h1>
                  </div>
                  <p
                    class="mt-2 text-[#424242] font-roboto-slab text-[14px] md:text-[15px]"
                  >
                    {{ $shooter->menu_item_description }}
                  </p>
                </div>
              @endforeach
            </div>
          @else
            <h1
              class="text-[30px] font-roboto-condensed uppercase font-semibold mt-10 text-[#212121] text-center"
            >
              Coming Soon
            </h1>
          @endif
        </div>

        <!-- Wines -->
        <div class="hidden px-1 py-2 mx-auto" data-tabs-target="panel">
          @if($wines->count()>0)
            <div
              class="grid grid-cols-1 lg:grid-cols-2 w-full lg:w-[85%] 2xl:w-[70%] mx-auto justify-center items-center place-items-center mt-4 gap-y-6 gap-x-8 lg:gap-x-20 3xl:w-[80%] 3xl:gap-x-20"
            >
              @foreach($wines as $wine)
                <div
                  class="w-full max-w-md md:max-w-lg lg:max-w-md 3xl:max-w-5xl mx-auto min-h-32 p-3"
                >
                  <div
                    class="flex justify-between items-center border-b border-gray-200 tracking-[0.12em]"
                  >
                    <h1
                      class="uppercase text-[#212121] font-roboto-condensed font-semibold mb-3 text-[16px] md:text-[18px] xl:text-[20px]"
                    >
                      {{ $wine->menu_item_name }}
                    </h1>
                    <h1
                      class="text-[#212121] font-roboto-condensed font-semibold mb-3 text-[16px] md:text-[18px] xl:text-[20px]"
                    >
                      {{ $wine->price }}
                    </h1>
                  </div>
                  <p
                    class="mt-2 text-[#424242] font-roboto-slab text-[14px] md:text-[15px]"
                  >
                    {{ $wine->menu_item_description }}
                  </p>
                </div>
              @endforeach
            </div>
          @else
            <h1
              class="text-[30px] font-roboto-condensed uppercase font-semibold mt-10 text-[#212121] text-center"
            >
              Coming Soon
            </h1>
          @endif
        </div>

        <!-- Beer -->
        <div class="hidden px-1 py-2 mx-auto" data-tabs-target="panel">
          @if($beers->count() >0)
            <div
              class="grid grid-cols-1 lg:grid-cols-2 w-full lg:w-[85%] 2xl:w-[70%] mx-auto justify-center items-center place-items-center mt-4 gap-y-6 gap-x-8 lg:gap-x-20 3xl:w-[80%] 3xl:gap-x-20"
            >
              @foreach($beers as $bear)
                <div
                  class="w-full max-w-md md:max-w-lg lg:max-w-md 3xl:max-w-5xl mx-auto min-h-32 p-3"
                >
                  <div
                    class="flex justify-between items-center border-b border-gray-200 tracking-[0.12em]"
                  >
                    <h1
                      class="uppercase text-[#212121] font-roboto-condensed font-semibold mb-3 text-[16px] md:text-[18px] xl:text-[20px]"
                    >
                      {{ $bear->menu_item_name }}
                    </h1>
                    <h1
                      class="text-[#212121] font-roboto-condensed font-semibold mb-3 text-[16px] md:text-[18px] xl:text-[20px]"
                    >
                      {{ $bear->price }}
                    </h1>
                  </div>
                  <p
                    class="mt-2 text-[#424242] font-roboto-slab text-[14px] md:text-[15px]"
                  >
                    {{ $bear->menu_item_description }}
                  </p>
                </div>
              @endforeach
            </div>
          @else
            <h1
              class="text-[30px] font-roboto-condensed uppercase font-semibold mt-10 text-[#212121] text-center"
            >
              Coming Soon
            </h1>
          @endif          
        </div>
      </div>
      <!--Drinks Tabs End here-->
    </div>
  </section>
  
  <!-- Book a Table Section -->
  <section class="relative flex justify-center items-center">
    <!-- Pizza Banner Image -->
    <img
      src="{{ asset('img/newmenu-pizza.jpg') }}"
      alt="Pizza Banner Image"
      class="w-full h-40 md:min-h-60 lg:min-h-64 2xl:min-h-80 3xl:min-h-96 object-cover"
    />
    <a
      href="{{ route('reservation') }}"
      class="uppercase absolute flex justify-center items-center bg-[#f1c22e] text-[#424242] py-[15px] px-[45px] lg:px-14 3xl:py-4 3xl:px-28 rounded-4xl hover:bg-white hover:text-black text-[15px] transition duration-300 ease-in-out cursor-pointer"
    >
      <button
        class="uppercase font-roboto-condensed font-semibold cursor-pointer"
      >
        Book a Table
      </button>
    </a>
  </section>

  <script type="module">
    import {
      Application,
      Controller,
    } from "https://unpkg.com/@hotwired/stimulus/dist/stimulus.js";
    window.Stimulus = Application.start();

    Stimulus.register(
      "tabs",
      class extends Controller {
        static targets = ["tab", "panel"];
        static values = { index: Number };

        initialize() {
          this.showTab();
        }

        change(event) {
          event.preventDefault();
          this.indexValue = this.tabTargets.indexOf(event.currentTarget);
          this.showTab();
        }

        showTab() {
          this.panelTargets.forEach((el, index) => {
            index == this.indexValue
              ? el.classList.remove("hidden")
              : el.classList.add("hidden");
          });
          this.tabTargets.forEach((el, index) => {
            index == this.indexValue
              ? el.classList.add("border-b-[#f1c22e]")
              : el.classList.remove("border-b-[#f1c22e]");
          });
        }
      }
    );

    // Add event listeners to buttons
    const foodBtn = document.getElementById("foodBtn");
    const drinksBtn = document.getElementById("drinksBtn");
    const foodTabs = document.getElementById("foodTabs");
    const drinksTabs = document.getElementById("drinksTabs");

    foodBtn.addEventListener("click", () => {
      // Show food, hide drinks
      foodTabs.classList.remove("hidden");
      drinksTabs.classList.add("hidden");

      // Style active button
      foodBtn.classList.add("bg-[#f1c22e]", "z-10");
      foodBtn.classList.remove("bg-gray-300");

      // Reset drinks button
      drinksBtn.classList.remove("bg-[#f1c22e]", "z-10");
      drinksBtn.classList.add("bg-gray-300");
    });

    drinksBtn.addEventListener("click", () => {
      // Show drinks, hide food
      drinksTabs.classList.remove("hidden");
      foodTabs.classList.add("hidden");

      // Style active button
      drinksBtn.classList.add("bg-[#f1c22e]", "z-10");
      drinksBtn.classList.remove("bg-gray-300");

      // Reset food button
      foodBtn.classList.remove("bg-[#f1c22e]", "z-10");
      foodBtn.classList.add("bg-gray-300");
    });

    // Tab switching logic - use comma to combine selectors in ONE string
    const tabItems = document.querySelectorAll(
      '#foodTabs [data-tabs-target="tab"], #drinksTabs [data-tabs-target="tab"]'
    );

    tabItems.forEach((tab) => {
      tab.addEventListener("click", (e) => {
        e.preventDefault();

        // Find which tab group this belongs to (food or drinks)
        const parentTabContainer = tab.closest("#foodTabs, #drinksTabs");
        const siblingTabs = parentTabContainer.querySelectorAll(
          '[data-tabs-target="tab"]'
        );

        // Remove active border from all tabs in this group only
        siblingTabs.forEach((item) => {
          item.classList.remove("border-yellow-500", "border-[#f1c22e]");
          item.classList.add("border-transparent");
        });

        // Add active border to clicked tab
        tab.classList.remove("border-transparent");
        tab.classList.add("border-[#f1c22e]");
      });
    });

    // Set first tab as active by default for food tabs only
    const foodTabItems = document.querySelectorAll(
      '#foodTabs [data-tabs-target="tab"]'
    );
    if (foodTabItems.length > 0) {
      foodTabItems[0].classList.remove("border-transparent");
      foodTabItems[0].classList.add("border-[#f1c22e]");
    }

    // Set first tab as active by default for drinks tabs only
    const drinkTabItems = document.querySelectorAll(
      '#drinksTabs [data-tabs-target="tab"]'
    );
    if (drinkTabItems.length > 0) {
      drinkTabItems[0].classList.remove("border-transparent");
      drinkTabItems[0].classList.add("border-[#f1c22e]");
    }
  </script>
</x-app-layout>