<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <!-- Page Title -->
        <title>Login | The Dugout Oasis Admin Panel</title>

        <!-- Favicon Link -->
        <link
        rel="shortcut icon"
        href="./assets/img/favicon-dugout.png"
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

        <!-- Material Icons -->
        <link
        href="{{ asset('vendors/material-icons/material-icons.css') }}"
        rel="stylesheet"
        type="text/css"
        />
    </head>
    <body class="flex justify-center items-center h-screen">

        <div class="relative h-screen w-full bg-[url('{{ asset('img/admin/ds-img/bg-image-login.jpg') }}')] bg-cover bg-center bg-blend-multiply flex items-center justify-center">

            <!-- Overlay -->
            <div class="absolute inset-0 bg-yellow-300/45"></div>

            <div
            class="flex flex-col items-center bg-white w-[80%] md:w-[65%] lg:w-[50%] xl:w-[35%] 2xl:w-[33%] 3xl:w-[26%] mx-auto py-8 px-5 md:px-12 rounded-md z-50"
            >
                <img
                    src="{{ asset('img/admin/dugout-logo-black_new.png') }}"
                    alt="Dugout Logo"
                    class="w-24 md:w-24 xl:w-28 h-full mb-4"
                />
                <div
                    class="font-montserrat text-[16px] 3xl:text-[20px] text-nowrap text-[#444444] font-bold"
                >
                    The Dugout Oasis Admin Panel
                </div>

                <form action="{{ route('login') }}" class="flex flex-col gap-y-7 w-full mt-5" method="POST">
                    @csrf
                    <!-- Email -->
                    <div class="flex flex-col gap-y-2">
                        <label
                        for="text"
                        class="text-[#999999] uppercase font-montserrat font-bold text-[12px]"
                        >Email</label
                        >
                        <input
                        type="text"
                        name="email"
                        id="email"
                        title="email"
                        placeholder="johndoe@site.com"
                        class="border outline-none w-full border-[#99999935] p-3 rounded-sm font-montserrat font-medium text-[14px] focus:border-[#f1c22e] placeholder-[#999999] transition duration-200 ease-in-out"
                        required
                        value="{{old('email')}}"
                        />
                        @error('email')
                            <p
                                class="text-center text-[#ff0000]"
                            >
                                {{$message}}
                            </p>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="flex flex-col gap-y-2">
                        <label
                        for="password"
                        class="text-[#999999] uppercase font-montserrat font-bold text-[12px]"
                        >Password</label
                        >
                        <input
                        type="password"
                        name="password"
                        id="password"
                        title="password"
                        placeholder="password"
                        class="border outline-none w-full border-[#99999935] p-3 font-montserrat font-medium text-[14px] rounded-sm focus:border-[#f1c22e] placeholder-[#999999] transition duration-200 ease-in-out"
                        required
                        />
                    </div>

                    <button
                        type="submit"
                        class="text-[12px] rounded-md font-montserrat font-semibold uppercase text-white p-4 cursor-pointer bg-[#f1c22e] hover:bg-black active:text-white hover:text-white"
                    >
                        Login
                    </button>

                    <div class="flex items-start justify-between">
                        <div
                        class="flex gap-x-2 items-center text-[#999999] font-montserrat text-[14px]"
                        >
                        <input
                            type="checkbox"
                            name="remember"
                            id="remember_me"
                            title="remember-me"
                        />
                        Remember me
                        </div>
                        <div class="flex gap-x-2 items-center"></div>
                        <a
                        href="{{ route('password.request') }}"
                        id="to-recover"
                        class="my-auto pb-2 text-right text-[14px] text-[#f1c22e] font-roboto"
                        ><i class="material-icons mr-2 text-[18px] text-[#f1c22e]">lock</i>
                        Forgot Password?</a
                        >
                    </div>
                </form>
            </div>
        </div>
    <script src="{{ asset('js/admin/material-design.js') }}"></script>
  </body>
</html>
