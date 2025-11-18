const navbar = document.querySelector(".navbar"); // Select your navbar
const logo = document.querySelector(".logo");
const mobileNav = document.querySelector(".mobile");
const scrollThreshold = 150; // Adjust this value to your preference

window.addEventListener("scroll", () => {
  if (window.scrollY > scrollThreshold) {
    navbar.classList.add("navbar-solid");
    navbar.classList.remove("py-6");
    navbar.classList.add("py-1");
    logo.classList.add("scale-[80%]");
    mobileNav.classList.remove("w-[86%]");
    mobileNav.classList.remove("top-28")
    mobileNav.classList.add("top-20")
    mobileNav.classList.remove("md:top-36")
    mobileNav.classList.add("md:top-24")
    mobileNav.classList.add("w-full");
  } else {
    navbar.classList.remove("navbar-solid");
    navbar.classList.add("py-6");
    navbar.classList.remove("py-1");
    logo.classList.remove("scale-[80%]");
    mobileNav.classList.add("w-[86%]");
    mobileNav.classList.remove("top-20")
    mobileNav.classList.add("top-28")
    mobileNav.classList.remove("md:top-24")
    mobileNav.classList.add("md:top-36")
    mobileNav.classList.remove("w-full");
  }
});

window.addEventListener("resize", () => {
  if (window.innerWidth >= 1024) {
    mobileNav.classList.add("hidden");
  }
});

// Hamburger menu
const hamburger = document.querySelector(".hamburger");
const navList = document.querySelector(".nav-list");

hamburger.addEventListener("click", () => {
  hamburger.classList.toggle("open");

  if (navList.classList.contains("hidden")) {
    // Show with slide down
    navList.classList.remove("hidden", "animate__slideOutUp");
    navList.classList.add("animate__animated", "animate__slideInDown");
  } else {
    // Hide with slide up
    navList.classList.remove("animate__slideInDown");
    navList.classList.add("animate__slideOutUp");

    // After animation ends, hide element
    navList.addEventListener(
      "animationend",
      () => {
        if (navList.classList.contains("animate__slideOutUp")) {
          navList.classList.add("hidden");
        }
      },
      { once: true }
    );
  }
});

// Close menu when a link is clicked (on small screens)
document.querySelectorAll(".nav-list .links a").forEach((link) => {
  link.addEventListener("click", () => {
    if (window.innerWidth < 768) {
      navList.classList.add("hidden");
      hamburger.classList.remove("open");
    }
  });
});


const form = document.getElementById("reserveForm");

// All your input/error pairs in one config array
const fields = [
  { input: "date", error: "dateError" },
  { input: "people", error: "peopleError" },
  { input: "phone", error: "phoneError" },
  { input: "name", error: "nameError" },
  { input: "emailReserve", error: "emailError" },
];

form.addEventListener("submit", (e) => {
  e.preventDefault(); // Stop form refresh

  let firstInvalid = null; // To focus only the first empty field

  fields.forEach(({ input, error }) => {
    const inputEl = document.getElementById(input);
    const errorEl = document.getElementById(error);

    if (!inputEl.value.trim()) {
      // Show error
      errorEl.classList.remove("hidden");
      inputEl.classList.add("border-red-500");
      if (!firstInvalid) firstInvalid = inputEl; // Save first invalid input
    } else {
      // Hide error
      errorEl.classList.add("hidden");
      inputEl.classList.remove("border-red-500");
    }
  });
});

