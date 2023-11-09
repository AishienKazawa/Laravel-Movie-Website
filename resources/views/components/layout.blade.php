<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    @vite('resources/css/app.css')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Open+Sans:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

</head>

<body class="bg-secondary-color text-white text-[14px]">
    <div id="search-form-container" class="hidden w-full p-8 fixed top-0 bg-black z-30">
        <form method="POST" action="{{ route('search-movie') }}"
            class="flex gap-4 md:gap-2 justify-center flex-col md:flex-row lg:px-24 lg:w-1/2 lg:mx-auto">
            @csrf
            <input type="text" name="search" id="search" placeholder="Search movie..."
                class="w-full p-4 rounded-md" />
            <button type="submit" class="md:w-52 py-4 px-5 rounded-md bg-accent-color hover:bg-accent-color-light">
                Search
            </button>
        </form>
    </div>
    <x-navbar />
    {{ $slot }}

    @vite('resources/js/app.js')
</body>

</html>
