<x-app-layout>
  @section('title', 'Contact Us | The Dugout Oasis')
      
  <!-- Maps Section Starts -->
  <iframe
    src="https://snazzymaps.com/embed/137516"
    class="w-full border-none h-[400px] md:h-[500px]"
    title="Location Map"
  ></iframe>
  <!-- Maps Section Ends -->
  <!-- Contact Section Starts -->
  <section class="flex flex-col justify-center items-center bg-white my-20">
    <!-- Heading -->
    <div class="text-center flex flex-col justify-center items-center">
      <h1
        class="uppercase text-[30px] lg:text-[45px] font-semibold font-roboto-condensed tracking-wider text-[#212121]"
      >
        Contact Us
      </h1>
      <hr
        class="text-[#f1c22e] mt-2 w-24 border lg:w-36 xl:w-44 3xl:w-60"
      />
      <p
        class="w-[82%] md:w-[70%] lg:w-[83%] xl:w-[96%] 3xl:w-full font-roboto-slab text-[#424242] text-[15px] mt-8"
      >
        We are always available to receive any complaints, feedback,
        reservations or even just a friendly chat
      </p>
    </div>
    <!-- Grid Container -->
    <div
      class="grid lg:grid-cols-3 grid-cols-1 mt-20 lg:w-[90%] 3xl:w-[85%] gap-y-7"
    >
      <!-- Address Container -->
      <div class="flex flex-col items-center gap-y-6">
        <img
          src="{{ asset('img/Asset-1.svg') }}"
          alt="Pin Image"
          class="size-20"
        />
        <p
          class="text-center w-[62%] md:w-[84%] lg:w-[62%] 2xl:w-[52%] 3xl:w-[65%] text-[15px] font-roboto-slab text-[#424242] font-medium"
        >
          Lot B-G-09, Oasis Square, 2, Jalan PJU 1A/7, Ara Damansara, 43701
          Petaling Jaya, Selangor
        </p>
      </div>
      <!-- Telephone Container -->
      <div class="flex flex-col items-center gap-y-6">
        <img
          src="{{ asset('img/Asset-2.svg') }}"
          alt="Telephone Image"
          class="size-20"
        />
        <p
          class="text-center w-[64%] text-[15px] font-roboto-slab text-[#424242] font-medium"
        >
          +6017 365 2702 (WhatsApp Only)
        </p>
      </div>
      <!-- Time Container -->
      <div class="flex flex-col items-center gap-y-6">
        <img
          src="{{ asset('img/Asset-3.svg') }}"
          alt="Time Image"
          class="size-20"
        />
        <p
          class="flex flex-col md:flex-row lg:flex-col xl:flex-row gap-x-4 text-center w-[1/2] text-[15px] font-roboto-slab text-[#424242] font-medium"
        >
          Mon - Sun
          <span
            class="text-center w-[1/2] text-[15px] font-roboto-slab text-[#424242] font-medium"
            >3.00pm - 12.00am</span
          >
        </p>
      </div>
    </div>
  </section>
  <!-- Contact Section Ends -->
  
  <!-- Reservation Form Section Starts -->
  <section
    class="bg-[#f3f3f3] flex flex-col justify-center items-center py-14 lg:pb-28"
  >
    <!-- Heading Section Starts -->
    <div class="text-center flex flex-col gap-y-7" id="reservationSection">
      <h1
        class="text-[22px] md:text-[40px] text-[#212121] font-bold font-roboto-condensed tracking-wide"
      >
        Reservations
      </h1>
      <p
        class="text-[#424242] font-roboto-slab text-[15px] w-[87%] mx-auto"
      >
        Please fill in the form to book a table with us
      </p>
      <div
        class="w-[85%] md:w-[89%] lg:w-[60%] xl:w-[74%] 3xl:w-full mx-auto text-[#ff0000] font-roboto-slab text-[15px] leading-[1.9em]"
      >
        <span class="font-bold">Disclaimer:</span> If reserving for football
        matches, please arrive 30 minutes before the game or your table will
        be given to walk-in customers.
      </div>
    </div>

    <!-- Input Form Section Starts -->
    <form
      class="w-[85%] lg:w-[57%] 3xl:w-[55%] mx-auto grid grid-cols-1 lg:grid-cols-2 gap-8 mt-10"
      method="POST"
      novalidate
      action="{{ route('reserve') }}"
      id="reservationForm"
    >
      @csrf
      <div>
        <div class="w-full">
          <div class="relative">
            <input
              type="text"
              id="date"
              name="reservation_date"
              placeholder="Pick a Date"
              required
              autocomplete="off"
              class="peer w-full px-4 py-4 border-2 border-gray-300 rounded-full outline-none focus:border-black pr-12 placeholder-[#999ab3] font-roboto-slab"
              value="{{ $errors->any() ? old('reservation_date'): '' }}"
            />
            <button
              type="button"
              id="calendarBtn"
              class="absolute right-0.5 top-1/2 -translate-y-1/2 w-12 h-14 flex items-center justify-center bg-white rounded-r-full cursor-pointer"
            >
              <i class="fa-regular fa-calendar text-gray-500 text-sm"></i>
            </button>

            <!-- Add this directly below -->
            <div id="customCalendar" class="calendar absolute mt-2 hidden z-30">
              <div class="header">
                <button type="button" id="prevBtn">
                  <i class="fa-solid fa-chevron-left"></i>
                </button>
                <div class="monthYear" id="monthYear"></div>
                <button type="button" id="nextBtn">
                  <i class="fa-solid fa-chevron-right"></i>
                </button>
              </div>
              <div class="days">
                <div class="day">Su</div>
                <div class="day">Mo</div>
                <div class="day">Tu</div>
                <div class="day">We</div>
                <div class="day">Th</div>
                <div class="day">Fr</div>
                <div class="day">Sa</div>
              </div>
              <div class="dates" id="dates"></div>
            </div>
                      
          </div>
          <div class="error-container"></div>
          @error('reservation_date')
            <p
              id="dateError"
              role="alert"
              aria-live="assertive"
              class="uppercase text-center text-[#ff0000] font-roboto-slab text-[12px] mt-4"
            >
              {{ $message }}
            </p>
          @enderror
        </div>
      </div>

      <div>
        <div class="relative w-full">
          <input
            type="text"
            id="time"
            name="reservation_time"
            placeholder="Select Time"
            required
            readonly
            value="{{ $errors->any() ? old('reservation_time'): '11:00'}}"
            class="peer w-full px-4 py-4 border-2 border-gray-300 rounded-full outline-none focus:border-black pr-12 font-roboto-slab"
          />
          <button
            type="button"
            id="timeBtn"
            class="absolute right-0.5 top-1/2 -translate-y-1/2 w-12 h-14 flex items-center justify-center bg-white rounded-r-full cursor-pointer"
          >
            <i class="fa-regular fa-clock text-gray-500 text-sm"></i>
          </button>

          <!-- Custom Time Picker -->
          <div id="customTimePicker" class="time-picker hidden">
            <div class="hour">
              <i class="fa-solid fa-chevron-up hr-up"></i>
              <input type="number" class="hr" value="11" />
              <i class="fa-solid fa-chevron-down hr-down"></i>
            </div>

            <div class="separator">:</div>

            <div class="minute">
              <i class="fa-solid fa-chevron-up min-up"></i>
              <input type="number" class="min" value="00" />
              <i class="fa-solid fa-chevron-down min-down"></i>
            </div>
          </div>

          @error('reservation_time')
            <p
              id="dateError"
              role="alert"
              aria-live="assertive"
              class="uppercase text-center text-[#ff0000] font-roboto-slab text-[12px] mt-4"
            >
              {{ $message }}
            </p>
          @enderror
        </div>
      </div>
      <div>
        <input
          type="text"
          name="number_of_people"
          id="people"
          placeholder="Number of people"
          class="w-full px-4 py-4 border-2 border-gray-300 text-[15px] rounded-full outline-none focus:border-black font-roboto-slab placeholder-[#999ab3]"
          value="{{ $errors->any() ? old('number_of_people'): '' }}"
          required
        />
        @error('number_of_people')
          <p
            id="peopleError"
            role="alert"
            aria-live="assertive"
            class="uppercase text-center text-[#ff0000] font-roboto-slab text-[12px] mt-4"
          >
            {{$message}}
          </p>
        @enderror
      </div>
      <div>
        <input
          type="tel"
          name="phone_number"
          id="phone"
          placeholder="Phone Number"
          class="w-full px-4 py-4 border-2 border-gray-300 text-[15px] rounded-full outline-none focus:border-black font-roboto-slab placeholder-[#999ab3]"
          required
          value="{{ $errors->any() ? old('phone_number'): '' }}"
        />
        @error('phone_number')
          <p
            id="phoneError"
            role="alert"
            aria-live="assertive"
            class="uppercase text-center text-[#ff0000] font-roboto-slab text-[12px] mt-4"
          >
            {{$message}}
          </p>
        @enderror
      </div>
      <div class="grid lg:col-span-2">
        <input
          type="text"
          name="reservation_name"
          id="name"
          placeholder="Full Name"
          class="w-full px-4 py-4 border-2 border-gray-300 text-[15px] rounded-full outline-none focus:border-black font-roboto-slab placeholder-[#999ab3]"
          required
          value="{{ $errors->any() ? old('reservation_name') : '' }}"
        />
        @error('reservation_name')
          <p
            id="nameError"
            role="alert"
            aria-live="assertive"
            class="uppercase text-center text-[#ff0000] font-roboto-slab text-[12px] mt-4"
          >
            {{$message}}
          </p>
        @enderror
      </div>
      <div class="grid lg:col-span-2">
        <input
          type="email"
          name="email"
          id="emailReserve"
          placeholder="Email Address"
          class="w-full px-4 py-4 border-2 border-gray-300 text-[15px] rounded-full outline-none focus:border-black font-roboto-slab placeholder-[#999ab3]"
          required
          value="{{ $errors->any() ? old('email') : '' }}"
        />
        @error('email')
          <p
            id="emailError"
            role="alert"
            aria-live="assertive"
            class="uppercase text-center text-[#ff0000] font-roboto-slab text-[12px] mt-4 w-full mx-auto"
          >
            {{$message}}
          </p>
        @enderror
      </div>
      <button
        type="submit"
        class="uppercase font-roboto-condensed text-[15px] text-[#424242] font-semibold bg-[#f1c22e] hover:bg-white border-2 border-[#f1c22e] hover:border-white focus:bg-white focus:border-black py-3.5 max-w-[80%] md:max-w-[40%] w-full rounded-full flex justify-center items-center mx-auto lg:col-span-2 cursor-pointer transition duration-300 ease-in-out"
      >
        Book A Table
      </button>
    </form>
    <!-- Input Form Section Ends -->
  </section>
  <!-- Reservation Form Section Ends -->
  
 <script>
    // ==================== GLOBAL STATE ====================
    let shouldResetCalendar = false;
    let selectedDateValue = null; //  store selected date globally

    // ==================== CALENDAR (First Block) ====================
    document.addEventListener("DOMContentLoaded", () => {
      const calendarBtn = document.getElementById("calendarBtn");
      const dateInput = document.getElementById("date");
      const calendar = document.getElementById("customCalendar");
      const monthYearElement = document.getElementById("monthYear");
      const datesElement = document.getElementById("dates");
      const prevBtn = document.getElementById("prevBtn");
      const nextBtn = document.getElementById("nextBtn");

      let currentDate = new Date();

      // Toggle custom calendar visibility
      const toggleCalendar = (show) => {
        if (show) {
          // Close time picker if open
          const timePicker = document.getElementById("customTimePicker");
          if (timePicker) timePicker.classList.add("hidden");

          // Reset to today's date only if needed
          if (shouldResetCalendar) {
            currentDate = new Date();
            shouldResetCalendar = false;
          }

          calendar.classList.remove("hidden");
          updateCalendar();
        } else {
          calendar.classList.add("hidden");
          shouldResetCalendar = true; // Mark for reset next time
        }
      };

      // Show when clicking input or calendar button
      calendarBtn.addEventListener("click", (e) => {
        e.stopPropagation();
        toggleCalendar(!calendar.classList.contains("hidden"));
      });

      dateInput.addEventListener("click", (e) => {
        e.stopPropagation();
        toggleCalendar(true);
      });

      // Hide when clicking outside
      document.addEventListener("click", (e) => {
        if (
          !calendar.contains(e.target) &&
          e.target !== dateInput &&
          e.target !== calendarBtn
        ) {
          toggleCalendar(false);
        }
      });

    const updateCalendar = () => {
      const currentYear = currentDate.getFullYear();
      const currentMonth = currentDate.getMonth();

      const firstDay = new Date(currentYear, currentMonth, 1);
      const lastDay = new Date(currentYear, currentMonth + 1, 0);
      const totalDays = lastDay.getDate();

      const firstDayIndex = firstDay.getDay();
      const lastDayIndex = lastDay.getDay();

      const monthYearString = currentDate.toLocaleString("default", {
        month: "long",
        year: "numeric",
      });
      monthYearElement.textContent = monthYearString;

      let datesHTML = "";

      //  Remember the currently selected date (from input)
      const selectedValue = dateInput.value;
      let selectedDate = null;
      if (selectedValue) {
        const [day, month, year] = selectedValue.split("/").map(Number);
        selectedDate = new Date(year, month - 1, day);
      }

      const today = new Date();
      const isSameMonth =
        today.getFullYear() === currentYear && today.getMonth() === currentMonth;

      // Previous month dates
      const prevLastDay = new Date(currentYear, currentMonth, 0).getDate();
      for (let i = firstDayIndex - 1; i >= 0; i--) {
        datesHTML += `<div class="date inactive">${prevLastDay - i}</div>`;
      }

      // Current month dates
      for (let i = 1; i <= totalDays; i++) {
        const date = new Date(currentYear, currentMonth, i);
        const isToday = isSameMonth && date.toDateString() === today.toDateString();
        const isSelected =
          selectedDate &&
          date.getFullYear() === selectedDate.getFullYear() &&
          date.getMonth() === selectedDate.getMonth() &&
          date.getDate() === selectedDate.getDate();

        let classes = "date";
        if (isToday) classes += " active";
        if (isSelected) classes += " selected";
        if (isToday && isSelected === false) classes += " dimmed";

        datesHTML += `<div class="${classes}">${i}</div>`;
      }

      // Next month dates
      for (let i = lastDayIndex + 1; i <= 6; i++) {
        const nextDate = i - lastDayIndex;
        datesHTML += `<div class="date inactive">${nextDate}</div>`;
      }

      datesElement.innerHTML = datesHTML;
      enableDateSelection();
    };


      // Handle clicking on a date
      function enableDateSelection() {
        const dateElements = document.querySelectorAll(".date");
        const activeDate = document.querySelector(".date.active");

        dateElements.forEach((dateEl) => {
          dateEl.addEventListener("click", () => {
            if (dateEl.classList.contains("inactive")) return;

            dateElements.forEach((d) => d.classList.remove("selected"));

            if (activeDate && !dateEl.classList.contains("active")) {
              activeDate.classList.add("dimmed");
            } else if (dateEl.classList.contains("active")) {
              activeDate.classList.remove("dimmed");
            }

            dateEl.classList.add("selected");

            const selectedDay = parseInt(dateEl.textContent);
            const selectedDate = new Date(
              currentDate.getFullYear(),
              currentDate.getMonth(),
              selectedDay
            );

            const year = selectedDate.getFullYear();
            const month = String(selectedDate.getMonth() + 1).padStart(2, "0");
            const day = String(selectedDate.getDate()).padStart(2, "0");
            dateInput.value = `${day}/${month}/${year}`;
            selectedDateValue = selectedDate; // save globally

            toggleCalendar(false);
          });
        });
      }

      // Navigation
      prevBtn.addEventListener("click", (e) => {
        e.stopPropagation();
        currentDate.setDate(1);
        currentDate.setMonth(currentDate.getMonth() - 1);
        updateCalendar();
      });

      nextBtn.addEventListener("click", (e) => {
        e.stopPropagation();
        currentDate.setDate(1);
        currentDate.setMonth(currentDate.getMonth() + 1);
        updateCalendar();
      });

      updateCalendar();
    });

    // ==================== CALENDAR TOGGLE (Second Block) ====================
    document.addEventListener("DOMContentLoaded", () => {
      const calendarBtn = document.getElementById("calendarBtn");
      const dateInput = document.getElementById("date");
      const customCalendar = document.getElementById("customCalendar");

      // Toggle calendar visibility
      function toggleCalendar(show) {
        if (show) {
          // Close time picker if open
          const timePicker = document.getElementById("customTimePicker");
          if (timePicker) timePicker.classList.add("hidden");

          customCalendar.classList.remove("hidden");
        } else {
          customCalendar.classList.add("hidden");
          shouldResetCalendar = true; // Signal first block to reset
        }
      }

      // Open when clicking button or input
      calendarBtn.addEventListener("click", (e) => {
        e.stopPropagation();
        const isHidden = customCalendar.classList.contains("hidden");
        toggleCalendar(isHidden);
      });

      dateInput.addEventListener("click", (e) => {
        e.stopPropagation();
        toggleCalendar(true);
      });

      // Close when clicking outside
      document.addEventListener("click", (e) => {
        if (
          !customCalendar.contains(e.target) &&
          !calendarBtn.contains(e.target) &&
          e.target !== dateInput
        ) {
          toggleCalendar(false);
        }
      });
    });


    // ==================== TIME PICKER ====================
    document.addEventListener("DOMContentLoaded", () => {
      const timeInput = document.getElementById("time");
      const timeBtn = document.getElementById("timeBtn");
      const timePicker = document.getElementById("customTimePicker");

      let hourInput = timePicker.querySelector(".hr");
      let minInput = timePicker.querySelector(".min");
      let hrUp = timePicker.querySelector(".hr-up");
      let hrDown = timePicker.querySelector(".hr-down");
      let minUp = timePicker.querySelector(".min-up");
      let minDown = timePicker.querySelector(".min-down");

      const MIN_HOUR = 11;
      const MAX_HOUR = 20;

      // Save original content (we'll restore this later)
      const originalHTML = timePicker.innerHTML;

      const toggleTimePicker = (show) => {
        if (show) {
          const calendar = document.getElementById("customCalendar");
          if (calendar) calendar.classList.add("hidden");
          timePicker.classList.remove("hidden");
        } else {
          timePicker.classList.add("hidden");
        }
      };

      // Show picker when input or clock is clicked
      [timeInput, timeBtn].forEach((el) => {
        el.addEventListener("click", (e) => {
          e.stopPropagation();
          const isHidden = timePicker.classList.contains("hidden");
          toggleTimePicker(isHidden);
        });
      });

      // Close picker when clicking outside
      document.addEventListener("click", (e) => {
        if (
          !timePicker.contains(e.target) &&
          e.target !== timeInput &&
          e.target !== timeBtn
        ) {
          toggleTimePicker(false);
        }
      });

      // Update time input field
      const updateTimeInput = () => {
        const hour = hourInput.value.padStart(2, "0");
        const minute = minInput.value.padStart(2, "0");
        timeInput.value = `${hour}:${minute}`;
      };

      // Disable typing (but keep hover & focus)
      const disableTyping = (input) => {
        input.readOnly = true;
        input.setAttribute("inputmode", "none");
        input.addEventListener("keydown", (e) => e.preventDefault());
      };

      // Increment/Decrement hours within range
      const setHourListeners = () => {
        hrUp.addEventListener("click", () => {
          let hr = parseInt(hourInput.value);
          hr = hr < MAX_HOUR ? hr + 1 : MIN_HOUR;
          hourInput.value = hr.toString().padStart(2, "0");
          updateTimeInput();
        });

        hrDown.addEventListener("click", () => {
          let hr = parseInt(hourInput.value);
          hr = hr > MIN_HOUR ? hr - 1 : MAX_HOUR;
          hourInput.value = hr.toString().padStart(2, "0");
          updateTimeInput();
        });
      };

      // Increment/Decrement minutes
      const setMinuteListeners = () => {
        minUp.addEventListener("click", () => {
          let min = parseInt(minInput.value);
          min = (min + 1) % 60;
          minInput.value = min.toString().padStart(2, "0");
          updateTimeInput();
        });

        minDown.addEventListener("click", () => {
          let min = parseInt(minInput.value);
          min = min === 0 ? 59 : min - 1;
          minInput.value = min.toString().padStart(2, "0");
          updateTimeInput();
        });
      };

      // ==================== INLINE GRID PICKER ====================
        const renderGrid = (type) => {
        const gridContainer = document.createElement("div");
        gridContainer.className = "time-grid";

        const max = type === "hour" ? 24 : 60;
        const step = type === "hour" ? 1 : 5;

        for (let i = 0; i < max; i += step) {
          const cell = document.createElement("div");
          cell.classList.add("time-cell");
          cell.textContent = i.toString().padStart(2, "0");

          if (type === "hour" && (i < MIN_HOUR || i > MAX_HOUR)) {
            cell.classList.add("disabled");
          }

          cell.addEventListener("click", (e) => {
            e.stopPropagation();

            // Skip disabled hours
            if (cell.classList.contains("disabled")) return;

            if (type === "hour") {
              hourInput.value = cell.textContent;
              updateTimeInput();
              renderGrid("minute"); // auto switch to minutes
            } else {
              minInput.value = cell.textContent;
              updateTimeInput();

              // restore picker view
              timePicker.innerHTML = originalHTML;
              reinitElements();
              hourInput.value = timeInput.value.split(":")[0];
              minInput.value = timeInput.value.split(":")[1];
              updateTimeInput();
              timePicker.classList.remove("hidden");
            }
          });

          gridContainer.appendChild(cell);
        }

        timePicker.innerHTML = "";
        timePicker.appendChild(gridContainer);
      };

      // Restore functionality after returning from grid view
      const reinitElements = () => {
        hourInput = timePicker.querySelector(".hr");
        minInput = timePicker.querySelector(".min");
        hrUp = timePicker.querySelector(".hr-up");
        hrDown = timePicker.querySelector(".hr-down");
        minUp = timePicker.querySelector(".min-up");
        minDown = timePicker.querySelector(".min-down");

        disableTyping(hourInput);
        disableTyping(minInput);
        setHourListeners();
        setMinuteListeners();
        addGridSwitchListeners();
      };

      // Click on hour/minute input → open grid selector
      const addGridSwitchListeners = () => {
        hourInput.addEventListener("click", (e) => {
          e.stopPropagation();
          renderGrid("hour");
        });

        minInput.addEventListener("click", (e) => {
          e.stopPropagation();
          renderGrid("minute");
        });
      };

      // Initialize
      disableTyping(hourInput);
      disableTyping(minInput);
      setHourListeners();
      setMinuteListeners();
      addGridSwitchListeners();
    });
    document.getElementById("date").addEventListener("input", function () {
      console.log("DATE VALUE SENT TO SERVER:", this.value);
    });
  </script>
  <script>
    document.getElementById('reservationForm').addEventListener('submit', function (e) {
      e.preventDefault(); // stop normal submit (no redirect)

      const form = this;
      const formData = new FormData(form);

      // Clear old errors
      document.querySelectorAll('[role="alert"]').forEach(el => el.remove());

      fetch(form.action, {
        method: "POST",
        headers: {
          "X-Requested-With": "XMLHttpRequest",
          "X-CSRF-TOKEN": "{{ csrf_token() }}"
        },
        body: formData
      })
      .then(response => response.json())
      .then(data => {

        if (data.errors) {
          Object.keys(data.errors).forEach(key => {
            const input = document.querySelector(`[name="${key}"]`);
            if (!input) return;

            let error = document.createElement("p");
            error.setAttribute("role", "alert");
            error.className = "uppercase text-center text-[#ff0000] font-roboto-slab text-[12px] mt-4";
            error.innerText = data.errors[key][0];

            // CUSTOM placement for reservation_date
            if (key === "reservation_date") {
              const relativeDiv = input.parentElement; // .relative div
              const container = relativeDiv.nextElementSibling; // the .error-container outside

              if (container && container.classList.contains("error-container")) {
                container.innerHTML = ""; // clear previous
                container.appendChild(error);
              }
            } else {
              // Default behavior for other fields
              const container = input.closest('div').querySelector('.error-container');
              if (container) {
                container.innerHTML = "";
                container.appendChild(error);
              } else {
                input.insertAdjacentElement("afterend", error);
              }
            }
          });
          return; // stop form submit
        }
        if (data.success) {
          window.location.href = "{{ route('thank-you') }}"; // redirect manually
        }
      });
    });
  </script>

</x-app-layout>