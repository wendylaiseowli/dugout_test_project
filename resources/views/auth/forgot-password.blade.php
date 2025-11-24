<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Page Title -->
    <title>Forgot Password | The Dugout Oasis Admin Panel</title>

    <!-- Favicon Link -->
    <link
      rel="shortcut icon"
      href="{{ asset('img/admin/favicon-dugout.png') }}"
      type="image/x-icon"
    />

    <!-- Tailwind CSS CDN Link -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <style type="text/tailwindcss">
      @theme {
        --breakpoint-3xl: 112.5rem; /* 1800px = 112.5rem */
      }
    </style>

    <!-- CSS Link -->
    <link rel="stylesheet" href="{{ asset('css/admin/styles-custom.css') }}" />

    <!-- Font Awesome Link -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
    />
  </head>
  <body class="flex justify-center items-center h-screen">
    <div
      class="relative h-screen w-full bg-[url('{{ asset('img/admin/ds-img/bg-image-login.jpg') }}')] bg-cover bg-center bg-blend-multiply flex items-center justify-center"
    >
      <!-- Overlay -->
      <div class="absolute inset-0 bg-yellow-300/45"></div>

      <div
        class="flex flex-col items-center bg-white w-[85%] md:w-[65%] lg:w-[49%] xl:w-[35%] 2xl:w-[34%] 3xl:w-[34%] mx-auto py-9 px-6 md:px-12 xl:py-8 rounded-md z-50"
      >
        <img
          src="{{ asset('img/admin/dugout-logo-black_new.png') }}"
          alt="Dugout Logo"
          class="w-24 md:w-24 xl:w-28 h-full mb-4"
        />

        <div
          class="font-roboto text-[14px] text-center text-[#bbbbbb] font-medium leading-[1.7em]"
        >
          Enter your email address and we'll send you an email with instructions
          to reset your password.
        </div>
        @if (session('status'))
            {{ session('status') }}
        @endif
        <form action="{{ route('password.email') }}" class="flex flex-col gap-y-7 w-full mt-5" method="POST">
          @csrf
          <!-- Email -->
          <div class="flex flex-col gap-y-2">
            <input
              type="email"
              name="email"
              id="email"
              title="email"
              placeholder="Email"
              class="border-b outline-none w-full border-[#99999935] py-3 rounded-sm font-montserrat font-medium text-[14px] placeholder:text-[#999999] placeholder:uppercase placeholder:font-montserrat placeholder:font-bold placeholder:text-[12px] bg-gradient-to-r from-[#f1c22e] to-[#f1c22e] bg-[length:0%_2px] bg-no-repeat bg-[position:50%_100%] focus:bg-[length:100%_2px] transition-[background-size] duration-300 ease-in-out"
              required
            />
            @if($errors->has('email'))
              <p class="text-red-600">{{$errors->first('email')}}</p>
            @endif
          </div>
          
          <button
            type="submit"
            class="text-[12px] rounded-md font-montserrat font-semibold uppercase text-white p-4 cursor-pointer bg-[#f1c22e] hover:bg-black active:text-white hover:text-white mb-4 transition duration-300 ease-in-out"
          >
            Send Password Reset Link
          </button>

          <div
            class="flex items-center justify-center border-t border-[#99999935]"
          >
            <p class="text-[#999999] font-roboto text-[14px] mt-5 mb-4">
              Back to
              <a href="{{ route('login') }}" class="text-[#f1c22e] font-semibold"
                >Login</a
              >
            </p>
          </div>
        </form>
      </div>
    </div>
  </body>
</html>
