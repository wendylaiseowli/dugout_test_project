<x-app-layout hero="img/TD_gallery.jpg">
  
  <!-- Page Title -->
  @section('title', 'Gallery | The Dugout Oasis')

  <!-- Gallery Tag -->
  <x-slot:heroContent>
    <div
      class="absolute mx-auto w-full top-[62%] md:top-[50%] lg:top-[45%] flex flex-col justify-center items-center"
    >
      <h1
        class="text-[30px] md:text-[52.5px] lg:text-[60px] text-white font-roboto-condensed font-bold uppercase"
      >
        Gallery
      </h1>
    </div>
  </x-slot:heroContent>

  <!-- Menu Section -->
  <section class="bg-[white] mt-16 mb-24">
    <div>
      <!-- Tabs Button -->
      <div class="inline-flex relative mx-auto w-full justify-center">
        <!-- Food Button -->
        <button
          id="foodBtn"
          class="py-2.5 px-11 md:px-16 lg:px-20 xl:px-24 3xl:py-3.5 3xl:px-36 text-[15px] xl:text-[16.5px] font-roboto-condensed text-center font-semibold text-[#424242] transition-all duration-300 bg-[#f1c22e] hover:bg-[#f1c22e] cursor-pointer rounded-full relative z-10 hover:z-20"
        >
          <!-- Set default active here -->
          FOOD
        </button>
        <!-- Drinks Button -->
        <button
          id="drinksBtn"
          class="py-2.5 px-11 md:px-16 lg:px-20 xl:px-24 3xl:py-3.5 3xl:px-36 text-[15px] xl:text-[16.5px] font-roboto-condensed text-center font-semibold text-[#424242] transition-all duration-300 cursor-pointer hover:bg-[#f1c22e] bg-gray-300 rounded-full -ml-10 relative hover:z-20 z-0"
        >
          DRINKS
        </button>
        <!-- Events Button -->
        <button
          id="eventsBtn"
          class="py-2.5 px-11 md:px-16 lg:px-20 xl:px-24 3xl:py-3.5 3xl:px-36 text-[15px] xl:text-[16.5px] font-roboto-condensed text-center font-semibold text-[#424242] transition-all duration-300 cursor-pointer hover:bg-[#f1c22e] bg-gray-300 rounded-full -ml-10 relative z-10 hover:z-20"
        >
          EVENTS
        </button>
      </div>
      <!-- Food Tabs -->
      <div
        id="foodTabs"
        data-controller="tabs"
        data-tabs-index-value="0"
        class="mx-6 mt-6"
      >
        <div
          class="md:w-[85%] xl:w-[75%] 2xl:w-[70%] 3xl:w-[80%] mx-auto"
          data-tabs-target="panel"
        >
          @if($foodImages->count()>0)
            <div
              class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6 md:gap-x-14 justify-center"
            >
              @foreach($foodImages as $foodImage)
                @if(!($loop->last && $loop->iteration % 3 === 1 && $loop->count > 1))
                  <a
                    href="{{ asset('img/gallery/'.$foodImage->new_photo_path) }}"
                    data-fancybox="food-gallery"
                  >
                    <img
                      class="h-120 md:h-115 lg:h-110 w-full object-cover"
                      src="{{ asset('img/gallery/'.$foodImage->new_photo_path) }}"
                      alt="Food Image"
                    />
                  </a>
                @endif
              @endforeach

              @if($foodImages->count() % 3 === 1)
                @php
                  $lastImage = $foodImages->last();
                @endphp
                <div
                class="md:col-span-2 xl:col-start-2 xl:col-end-3 hidden md:flex justify-center"
                >
                  <a
                    href="{{ asset('img/gallery/'.$lastImage->new_photo_path) }}"
                    data-fancybox="food-gallery"
                  >
                    <img
                      class="h-120 md:h-115 lg:h-110 md:w-70 lg:w-full 3xl:w-120 object-cover"
                      src="{{ asset('img/food_gallery/food7.jpg') }}"
                      alt="food Image"
                    />
                  </a>
                </div>
              @endif
            </div>
          @else
            <h1 class="text-center">COMING SOON</h1>
          @endif
        </div>
      </div>
      <!-- Drinks Tabs -->
      <div
        id="drinksTabs"
        data-controller="tabs"
        data-tabs-index-value="0"
        class="mx-6 mt-6 hidden"
      >
        <div
          class="hidden md:w-[85%] xl:w-[75%] 2xl:w-[70%] 3xl:w-[80%] mx-auto"
          data-tabs-target="panel"
        >
          @if($drinkImages->count()>0)
            <div
              class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6 md:gap-x-14 justify-center"
            >
              @foreach($drinkImages as $drinkImage)
                @if(!($loop->last && $loop->iteration % 3 === 1 && $loop->count > 1))
                  <a
                    href="{{ asset('img/gallery/'.$drinkImage->new_photo_path) }}"
                    data-fancybox="drink-gallery"
                  >
                    <img
                      class="h-120 md:h-115 lg:h-110 w-full object-cover"
                      src="{{ asset('img/gallery/'.$drinkImage->new_photo_path) }}"
                      alt="Drink 1"
                    />
                  </a>
                @endif
              @endforeach

              @if($drinkImages->count() % 3 ===1)
                @php
                  $lastImage = $drinkImages->last();
                @endphp
                <div
                  class="md:col-span-2 xl:col-start-2 xl:col-end-3 hidden md:flex justify-center"
                >
                  <a
                    href="{{ asset('img/gallery/'.$drinkImage->new_photo_path) }}"
                    data-fancybox="drink-gallery"
                  >
                    <img
                      class="h-120 md:h-115 lg:h-110 md:w-70 lg:w-95 3xl:w-120 object-cover"
                      src="{{ asset('img/gallery/'.$drinkImage->new_photo_path) }}"
                      alt="Drink 13"
                    />
                  </a>
                </div>
              @endif
            </div>
          @else
            <h1 class="text-center">COMING SOON</h1>
          @endif
        </div>
      </div>
    </div>
    
    <!-- Events Tabs -->
    <div
      id="eventsTabs"
      data-controller="tabs"
      data-tabs-index-value="0"
      class="mx-6 mt-6 hidden"
    >
      <div
        class="hidden md:w-[85%] xl:w-[75%] 2xl:w-[70%] 3xl:w-[80%] mx-auto"
        data-tabs-target="panel"
      >
        @if($eventImages->count()>0)
          <div
            class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6 md:gap-x-14 justify-center"
          >
            @foreach($eventImages as $eventImage)
              @if(!($loop->last && $loop->iteration % 3 === 1 && $loop->count>1))
                <a
                  href="{{ asset('img/gallery/'.$eventImage->new_photo_path) }}"
                  data-fancybox="events-gallery"
                >
                  <img
                    class="h-120 md:h-115 lg:h-110 w-full object-cover"
                    src="{{ asset('img/gallery/'.$eventImage->new_photo_path) }}"
                    alt="Event Image"
                  />
                </a>
              @endif
            @endforeach
            
            @if($eventImages->count() %3 ===1)
              @php
                $lastImage = $eventImages->last();
              @endphp
              <div
                class="md:col-span-2 xl:col-start-2 xl:col-end-3 hidden md:flex justify-center"
              >
                <a
                  href="{{ asset('img/gallery/'.$eventImage->new_photo_path) }}"
                  data-fancybox="events-gallery"
                >
                  <img
                    class="h-120 md:h-115 lg:h-110 md:w-70 lg:w-95 3xl:w-120 object-cover"
                    src="{{ asset('img/gallery/'.$eventImage->new_photo_path) }}"
                    alt="Event 19"
                  />
                </a>
              </div>
            @endif
          </div>
        @else
          <h1 class="text-center">COMING SOON</h1>
        @endif
      </div>
    </div>
  </section>

  <!-- Fancybox JS -->
  <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@6.0/dist/fancybox/fancybox.umd.js"></script>
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

    const foodBtn = document.getElementById("foodBtn");
    const drinksBtn = document.getElementById("drinksBtn");
    const eventsBtn = document.getElementById("eventsBtn");
    const foodTabs = document.getElementById("foodTabs");
    const drinksTabs = document.getElementById("drinksTabs");
    const eventsTabs = document.getElementById("eventsTabs");

    const buttons = [foodBtn, drinksBtn, eventsBtn];
    const tabs = [foodTabs, drinksTabs, eventsTabs];

    function activateTab(activeBtn, activeTab) {
      buttons.forEach((btn) => {
        if (btn === activeBtn) {
          btn.classList.add("bg-[#f1c22e]", "z-10");
          btn.classList.remove("bg-gray-300", "z-0");
        } else {
          btn.classList.remove("bg-[#f1c22e]", "z-10");
          btn.classList.add("bg-gray-300", "z-0");
        }
      });

      tabs.forEach((tab) => {
        tab.classList.toggle("hidden", tab !== activeTab);
      });
    }

    foodBtn.addEventListener("click", () => activateTab(foodBtn, foodTabs));
    drinksBtn.addEventListener("click", () =>
      activateTab(drinksBtn, drinksTabs)
    );
    eventsBtn.addEventListener("click", () =>
      activateTab(eventsBtn, eventsTabs)
    );

    // Function to bind Fancybox with duplicate filtering
    function bindFancyboxGallery(galleryName) {
      const selector = `[data-fancybox="${galleryName}"]`;
      const allItems = document.querySelectorAll(selector);

      // Create a map to track unique images by their href
      const uniqueItems = new Map();

      allItems.forEach((item) => {
        const href = item.getAttribute("href");

        // Only keep the first occurrence of each image
        if (!uniqueItems.has(href)) {
          uniqueItems.set(href, item);
        } else {
          // Remove data-fancybox from duplicates so they're ignored
          item.removeAttribute("data-fancybox");

          // But keep them clickable - manually trigger the unique item
          item.addEventListener("click", (e) => {
            e.preventDefault();
            const originalItem = uniqueItems.get(href);
            originalItem.click();
          });
        }
      });

      //Fancybox Selector
      Fancybox.bind(selector, {
        Thumbs: {
          autoStart: true,
        },
        Toolbar: {
          display: ["zoom", "close", "thumbs"],
        },
        dragToClose: true,
      });
    }

    // Wait for DOM to be ready
    document.addEventListener("DOMContentLoaded", function () {
      // Bind each gallery with duplicate filtering
      bindFancyboxGallery("food-gallery");
      bindFancyboxGallery("drink-gallery");
      bindFancyboxGallery("events-gallery");
    });
  </script>

  <script>
    // Count items in each gallery
    const foodItems = document.querySelectorAll(
      '[data-fancybox="food-gallery"]'
    );
    const drinkItems = document.querySelectorAll(
      '[data-fancybox="drink-gallery"]'
    );
    const eventsItems = document.querySelectorAll(
      '[data-fancybox="events-gallery"]'
    );

    console.log("Food gallery:", foodItems.length);
    console.log("Drink gallery:", drinkItems.length);
    console.log("Events gallery:", eventsItems.length);
    console.log(
      "TOTAL:",
      foodItems.length + drinkItems.length + eventsItems.length
    );

    // Check visibility of each element
    eventsItems.forEach((item, i) => {
      const isVisible = item.offsetParent !== null;
      console.log(`Event ${i + 1}: ${item.href} - Visible: ${isVisible}`);
    });
  </script>
</x-app-layout>