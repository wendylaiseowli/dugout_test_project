<x-app-layout hero="img/TD_promotion.jpg">
    
  <!-- Page Title -->
  @section('title', 'Promotions | The Dugout Oasis')

  <!-- Promotions Tag -->
  <x-slot:heroContent>
    <div
      class="absolute mx-auto w-full top-[62%] md:top-[50%] lg:top-[36%] xl:top-[38%] flex flex-col justify-center items-center"
    >
      <h1
        class="text-[30px] md:text-[52.5px] lg:text-[60px] text-white font-roboto-condensed font-bold uppercase tracking-wider"
      >
        Promotions
      </h1>
    </div>
  </x-slot:heroContent>
  
  <!-- Promotions Section Starts -->
  <section class="bg-white mt-16">
    <!-- Heading Section -->
    <!-- Heading Section -->
    <div class="flex flex-col justify-center items-center gap-y-2 mb-8">
      <h1
        class="uppercase text-[#212121] text-[30px] lg:text-[45px] font-roboto-condensed font-semibold text-center mx-auto tracking-wider"
      >
        ONGOING PROMOTIONS
      </h1>
      <hr class="text-[#f1c22e] w-24 lg:w-36 xl:w-48 3xl:w-72 border" />
    </div>
    <!-- Grid Container -->
    <div class="flex justify-center items-center mt-10 mb-24">
      <div
        class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-6 gap-y-10 w-[92%] xl:w-[80%] 3xl:w-[85%] mx-auto place-items-center"
      >
        @if($promotions->count()>0)
          @foreach($promotions as $promotion)
            <div
              id="promotionBtn_{{ $promotion->id }}" //ladiesNightBtn
              class="group bg-white w-full max-w-xl p-4 flex flex-col items-center relative transition duration-300 ease-in hover:shadow-2xl shadow-[0_3px_6px_rgba(0,0,0,0.45)] h-full cursor-pointer"
            >
              <!-- Image -->
              <img
                src="{{ asset($promotion->photo_path) }}"
                alt="Ladies Night Image"
                class="w-full h-auto object-cover"
              />
              <div class="flex flex-col gap-y-3 mt-6 mb-14 px-4 text-center">
                <h2
                  class="text-center group-hover:text-[#f1c22e] font-semibold font-roboto-condensed text-[24px] text-[#212121]"
                >
                  {{ $promotion->name }}
                </h2>
                <hr class="text-gray-300 w-full" />
                <p
                  class="text-center font-roboto-slab text-[#424242] text-[15px] xl:text-[17.25px] 3xl:mb-4"
                >
                  {{ $promotion->description }}
                </p>
              </div>

              <button
                id="promotionBtn_{{ $promotion->id }}"
                class="absolute -bottom-5 border text-[#424242] bg-white py-[15px] px-[30px] 3xl:py-3.5 md:px-9 3xl:px-16 rounded-4xl uppercase hover:bg-[#f1c22e] hover:text-white hover:border-[#f1c22e] transition duration-200 ease-in font-roboto-condensed font-semibold text-[15px] cursor-pointer active:shadow-[inset_0_2px_4px_rgba(0,0,0,0.6)]"
              >
                Read More
              </button>
            </div>

            <!-- Popup Modal - Ladies Night -->
            <div
              id="promotionModal_{{ $promotion->id }}"
              class="hidden fixed inset-0 bg-black/50 justify-center items-center p-5 z-50 overflow-y-auto"
            >
              <div
                id="promotionModalContent_{{ $promotion->id }}"
                class="bg-white p-5 w-full lg:w-[90%] xl:w-[80%] 2xl:w-[78%] 3xl:w-[73%] flex flex-col lg:flex-row lg:items-center relative top-30 md:top-50 lg:top-10 animate__animated"
              >
                <!-- Close Button -->
                <button
                  id="closeModalBtn_{{ $promotion->id }}"
                  class="absolute -top-2 -right-3 bg-[#231f20] rounded-full border border-white size-7 flex justify-center items-center text-white hover:bg-[#424242] transition duration-200 cursor-pointer"
                >
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-4 w-4"
                    viewBox="0 0 20 20"
                    fill="currentColor"
                  >
                    <path
                      fill-rule="evenodd"
                      d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                      clip-rule="evenodd"
                    />
                  </svg>
                </button>

                <!--Left Content  -->
                <div class="lg:w-1/2 lg:mr-4">
                  <!-- Image -->
                  <img
                    src="{{ asset($promotion->photo_path) }}"
                    alt="Ladies Night Image"
                    class="w-full h-auto object-cover"
                  />
                </div>

                <!-- Right Content -->
                <div class="lg:w-2/3">
                  <div
                    class="flex flex-col gap-y-3 mt-6 px-4 text-center lg:items-start lg:justify-center"
                  >
                    <h2
                      class="text-center group-hover:text-[#f1c22e] font-semibold font-roboto-condensed text-[24px] text-[#212121]"
                    >
                      {{ $promotion->name }}
                    </h2>
                    <div class="flex flex-col gap-y-4 lg:items-start">
                      <!-- Time Box -->
                      <div class="flex justify-center items-start">
                        <img
                          src="{{ asset('img/time.svg') }}"
                          alt="Time"
                          class="size-5 mr-2"
                        />
                        <p
                          class="text-center font-roboto-slab text-[#424242] text-[15px] xl:text-[17.25px] 3xl:mb-4"
                        >
                          {{ $promotion->getFormattedDate() }}
                        </p>
                      </div>
                      <!-- Location Box -->
                      <div class="flex justify-center items-start">
                        <img
                          src="{{ asset('img/pin.svg') }}"
                          alt="Pin"
                          class="size-7 lg:size-5 mr-2"
                        />
                        <p
                          class="text-center font-roboto-slab text-nowrap text-[#424242] text-[15px] xl:text-[17.25px] 3xl:mb-4"
                        >
                          The Dugout, Ara Damansara
                        </p>
                      </div>
                    </div>
                    <p
                      class="text-center font-roboto-slab text-[#424242] text-[15px] xl:text-[17.25px] 3xl:mb-4 lg:text-left"
                    >
                      {{ $promotion->description }}
                      <br /><br />
                      *Promo changes weekly
                    </p>
                    <a href="{{route('reservation')}}" class="w-[83%] md:w-[40%] lg:w-[43%] xl:w-[31%]">
                      <button
                        class="hidden mx-auto lg:mx-0 lg:flex justify-center items-center uppercase hover:text-white hover:bg-[#f1c22e] text-nowrap py-[15px] px-[45px] rounded-full bg-white border border-[#424242] hover:border-[#f1c22e] transition duration-200 ease-in-out font-roboto-condensed font-semibold text-[15px] text-[#424242] cursor-pointer active:shadow-[inset_0_2px_4px_rgba(0,0,0,0.6)]"
                      >
                        Book a Table
                      </button>
                    </a>

                    <a href="{{route('reservation')}}">
                      <button
                        class="mx-auto lg:mx-0 lg:hidden justify-center items-center uppercase hover:text-white bg-[#f1c22e] py-[15px] px-[45px] text-nowrap w-[90%] md:w-[40%] lg:w-[43%] xl:w-[31%] rounded-full active:bg-white transition duration-200 ease-in-out font-roboto-condensed font-semibold text-[15px] text-[#424242] cursor-pointer active:shadow-[inset_0_2px_4px_rgba(0,0,0,0.6)]"
                      >
                        Book a Table
                      </button>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        @else
          <h1
            class="col-span-full text-[30px] font-roboto-condensed uppercase font-semibold mt-10 text-[#212121] text-center"
          >
            Coming Soon
          </h1>
        @endif
      </div>
    </div>
  </section>
  <!-- Promotions Section Ends -->

  <script>

    // Reusable modal function
    function initModal(triggerBtnId, modalId, modalContentId, closeBtnId) {
      const openModalBtn = document.getElementById(triggerBtnId);
      const closeModalBtn = document.getElementById(closeBtnId);
      const modal = document.getElementById(modalId);
      const modalContent = document.getElementById(modalContentId);

      // Open modal with animation
      openModalBtn.addEventListener("click", () => {
        modal.classList.remove("hidden");
        modal.classList.add("flex");
        modalContent.classList.add(
          "animate__animated",
          "animate__fadeInDown"
        );
        document.body.style.overflow = "hidden";

        // Clean up animation classes after animation ends
        modalContent.addEventListener(
          "animationend",
          function handleAnimationEnd() {
            modalContent.classList.remove(
              "animate__animated",
              "animate__fadeInDown"
            );
            modalContent.removeEventListener(
              "animationend",
              handleAnimationEnd
            );
          }
        );
      });

      // Close modal with animation
      function closeModal() {
        modalContent.classList.add("animate__animated", "animate__fadeOutUp");

        // Wait for animation to finish before hiding
        modalContent.addEventListener(
          "animationend",
          function handleAnimationEnd() {
            modal.classList.remove("flex");
            modal.classList.add("hidden");
            modalContent.classList.remove(
              "animate__animated",
              "animate__fadeOutUp"
            );
            document.body.style.overflow = "auto";
            modalContent.removeEventListener(
              "animationend",
              handleAnimationEnd
            );
          }
        );
      }

      // Close modal when X button is clicked
      closeModalBtn.addEventListener("click", closeModal);

      // Close modal when clicking outside the content (on the overlay)
      modal.addEventListener("click", (e) => {
        if (e.target === modal) {
          closeModal();
        }
      });

      // Close modal when pressing Escape key
      document.addEventListener("keydown", (e) => {
        if (e.key === "Escape" && !modal.classList.contains("hidden")) {
          closeModal();
        }
      });
    }

    document.querySelectorAll('[id^="promotionBtn_"]').forEach(button=>{
      const id= button.id.split('_')[1];

      // Initialize all your modals
      initModal(
        `promotionBtn_${id}`,
        `promotionModal_${id}`,
        `promotionModalContent_${id}`,
        `closeModalBtn_${id}`
      );
    });
    
  </script>
</x-app-layout>

