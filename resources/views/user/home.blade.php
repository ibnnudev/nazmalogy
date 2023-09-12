<x-guest-layout>
    {{-- Hero --}}
    <section id="hero">
        <section class="">
            <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
                <div class="mr-auto place-self-center lg:col-span-7">
                    <p class="text-md text-primary font-medium mb-2">
                        Pelajari Skill Baru
                    </p>
                    <h1 class="max-w-2xl mb-4 text-4xl font-bold tracking-tighter leading-snug md:text-5xl xl:text-6xl ">
                        Pelajari Skills Baru
                        Sesuai Dengan Minatmu
                    </h1>
                    <p class="max-w-2xl mb-6 font-normal text-gray-500 lg:mb-8 text-xs 2xl:text-sm">
                        Membantu Anda belajar lebih mudah dengan efektif
                    </p>
                    <a href="#"
                        class="inline-flex items-center justify-center px-11 py-3.5 mr-3 text-xs 2xl:text-sm font-medium text-center text-white rounded-full bg-primary hover:bg-purple-800 focus:ring-4 focus:ring-orange-300">
                        Ayo Mulai
                    </a>
                    <a href="#"
                        class="inline-flex items-center justify-center px-8 py-3.5 mr-3 text-xs 2xl:text-sm font-medium text-center text-gray-500 rounded-full bg-slate-100 hover:bg-slate-200 focus:ring-4 focus:ring-slate-300">
                        Daftar Sekarang
                    </a>
                </div>
                <div class="hidden lg:mt-0 lg:col-span-5 lg:flex">
                    <img src="{{ asset('assets/hero.svg') }}" alt="mockup" class="w-full">
                </div>
            </div>
        </section>
    </section>

    {{-- Features --}}
    <section id="feature">
        <div class="grid grid-cols-1 md:grid-cols-3 space-x-8 max-w-7xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16">
            <div>
                <h1 class="font-bold text-2xl md:text-3xl xl:text-4xl tracking-tighter  leading-snug">
                    3 Cara Mudah <br>
                    Memulai Pembelajaran
                </h1>
                <p class="text-gray-400 text-xs 2xl:text-sm mt-2">
                    Kami menyediakan layanan untuk mempermudah anda mempelajari skills yang anda inginkan
                </p>
            </div>
            <div class="grid w-full grid-cols-1 lg:grid-cols-3 col-span-2 gap-6">
                <div class="max-w-md p-6 mx-auto bg-white rounded-xl">
                    <div class="gap-3 lg:inline-flex lg:items-center">
                        <div>
                            <div class="flex items-center justify-center h-8 w-8 rounded-full text-black bg-purple-100">
                                <ion-icon name="play-circle-outline" class="text-primary w-7 h-7"></ion-icon>
                            </div>
                        </div>
                        <p class="mt-4 text-xs 2xl:text-sm font-medium leading-6 text-black lg:mt-0">
                            Video
                            Learning
                        </p>
                    </div>
                    <p class="mt-3 text-xs 2xl:text-sm text-gray-500">
                        Pembelajaran interaktif melalui layar
                    </p>
                </div>
                <div class="max-w-md p-6 mx-auto bg-white rounded-xl">
                    <div class="gap-3 lg:inline-flex lg:items-center">
                        <div>
                            <div class="flex items-center justify-center h-8 w-8 rounded-full text-black bg-orange-50">
                                <ion-icon name="infinite-outline" class="text-primary w-7 h-7"></ion-icon>
                            </div>
                        </div>
                        <p class="mt-4 text-xs 2xl:text-sm font-medium leading-6 text-black lg:mt-0">
                            Akses Selamanya
                        </p>
                    </div>
                    <p class="mt-3 text-xs 2xl:text-sm text-gray-500">
                        Bebas akses kapan saja dan dimanapun
                    </p>
                </div>
                <div class="max-w-md p-6 mx-auto bg-white rounded-xl">
                    <div class="gap-3 lg:inline-flex lg:items-center">
                        <div>
                            <div class="flex items-center justify-center h-8 w-8 rounded-full text-black bg-green-50">
                                <ion-icon name="person-circle-outline" class="text-green-500 w-7 h-7"></ion-icon>
                            </div>
                        </div>
                        <p class="mt-4 text-xs 2xl:text-sm font-medium leading-6 text-black lg:mt-0">
                            Mentor Profesional
                        </p>
                    </div>
                    <p class="mt-3 text-xs 2xl:text-sm text-gray-500">
                        Dibimbing mentor berpengalaman
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- Category --}}
    <section>
        <div class="flex flex-col justify-center flex-1 px-4 py-8 mx-auto lg:py-24 lg:flex-none max-w-7xl">
            <div class="text-center">
                <p class="text-primary font-medium text-xs 2xl:text-sm">
                    Kembangkan skill yang anda inginkan
                </p>
                <p
                    class="font-bold text-2xl md:text-3xl xl:text-4xl tracking-tighter leading-snug max-w-md mx-auto mt-3">
                    Kursus Online Dengan
                    Materi Terbaru
                </p>
            </div>
            <div class="mx-auto mt-12 text-left">
                <div class="grid grid-cols-3 gap-6  lg:flex lg:flex-wrap">
                    <div class="rounded-lg bg-white py-3 px-4 hover:ring-purple-800 hover:ring-2">
                        <div class="flex items-center gap-2">
                            <ion-icon name="flag-outline" class="text-primary w-7 h-7 mr-2"></ion-icon>
                            <p class="text-xs 2xl:text-sm font-medium text-black">
                                Bisnis
                            </p>
                        </div>
                    </div>
                    <div class="rounded-lg bg-white py-3 px-4 hover:ring-purple-800 hover:ring-2">
                        <div class="flex items-center gap-2">
                            <ion-icon name="wallet-outline" class="text-green-600 w-7 h-7 mr-2"></ion-icon>
                            <p class="text-xs 2xl:text-sm font-medium text-black">
                                E-Business
                            </p>
                        </div>
                    </div>
                    <div class="rounded-lg bg-white py-3 px-4 hover:ring-purple-800 hover:ring-2">
                        <div class="flex items-center gap-2">
                            <ion-icon name="archive-outline" class="text-orange-600 w-8 h-8 mr-2"></ion-icon>
                            <p class="text-xs 2xl:text-sm font-medium text-black">
                                Manajemen Proyek
                            </p>
                        </div>
                    </div>
                    <div class="rounded-lg bg-white py-3 px-4 hover:ring-purple-800 hover:ring-2">
                        <div class="flex items-center gap-2">
                            <ion-icon name="basket-outline" class="text-purple-800 w-8 h-8 mr-2"></ion-icon>
                            <p class="text-xs 2xl:text-sm font-medium text-black">
                                Enterpreneurship
                            </p>
                        </div>
                    </div>
                    <div class="rounded-lg bg-white py-3 px-4 hover:ring-purple-800 hover:ring-2">
                        <div class="flex items-center gap-2">
                            <ion-icon name="bag-outline" class="text-red-600 w-7 h-7 mr-2"></ion-icon>
                            <p class="text-xs 2xl:text-sm font-medium text-black">
                                Marketing
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    

    {{-- Course --}}
    <section class="">
        <div class="flex justify-between mx-auto items-end px-4 py-8 lg:py-12 max-w-7xl">
            <div class="font-bold text-2xl md:text-3xl xl:text-4xl tracking-tighter leading-snug mt-3">
                Cari Kelas <br>
                Favorit Anda
            </div>
            <div>
                <a href="#"
                    class="inline-flex items-center justify-center px-11 py-3.5 mr-3 text-xs 2xl:text-sm font-medium text-center text-white rounded-full bg-primary hover:bg-purple-800 focus:ring-4 focus:ring-orange-300">
                    Lihat Semua
                </a>
            </div>
        </div>

        {{-- Class --}}
        <section class="flex items-center w-full">
            <div class="relative items-center w-full px-4 mx-auto max-w-7xl">
                <div class="grid grid-cols-2 gap-6 md:grid-cols-2 lg:grid-cols-4">

                    @for ($i = 1; $i <= 8; $i++)
                        <div class="max-w-sm bg-white rounded-xl border border-gray-100">
                            <a>
                                <img class="rounded-t-xl h-52 object-center object-cover w-full"
                                    src="{{ asset('assets/noimage.svg') }}" alt="" />
                            </a>
                            <div class="p-5">
                                <div class="flex items-center justify-between mb-3">
                                    <div class="flex items-center gap-x-2">
                                        <div class="w-2.5 h-2.5 rounded-full bg-primary"></div>
                                        <span class="text-xs 2xl:text-sm font-medium">
                                            E-Bussiness
                                        </span>
                                    </div>
                                    <div class="flex items-center">
                                        <ion-icon name="star"
                                            class="text-[#F3AB1D] rounded mr-1 w-[12] h-[12]"></ion-icon>
                                        <span class="text-xs 2xl:text-sm font-medium">
                                            (5.0)
                                        </span>
                                    </div>
                                </div>
                                <a href="#">
                                    <h5
                                        class="mb-2 text-xs 2xl:text-md font-bold tracking-tight text-gray-900 dark:text-white line-clamp-2 hover:line-clamp-none">
                                        Mengenal Project Network Planning
                                    </h5>
                                </a>
                                <div class="flex items-end justify-between mt-4">
                                    <div>
                                        <p class="text-xs 2xl:text-sm line-through text-danger">Rp. 500.000</p>
                                        <p class="text-xs 2xl:text-md font-semibold">Rp. 75.000</p>
                                    </div>
                                    <p class="text-gray-400 text-xs 2xl:text-sm">
                                        125 peserta
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endfor

                </div>
            </div>
        </section>
    </section>

    {{-- Testimonial --}}
    <section>
        <div class="flex flex-col justify-center flex-1 px-4 py-8 mx-auto lg:py-24 lg:flex-none max-w-7xl">
            <div class="text-center">
                <p class="text-primary font-medium text-xs 2xl:text-sm">
                    Testimoni
                </p>
                <p
                    class="font-bold text-2xl md:text-3xl xl:text-4xl tracking-tighter leading-snug max-w-md mx-auto mt-3">
                    Jadi Bagian <br>
                    Dari NaZMalogy
                </p>
            </div>
            <ul role="list"
                class="grid max-w-2xl grid-cols-1 gap-6 mx-auto sm:gap-8 lg:max-w-none lg:grid-cols-3 mt-14">
                @for ($j = 1; $j <= 6; $j++)
                    <li>
                        <figure class="relative h-full p-6 bg-white rounded-3xl">
                            <figcaption class="relative flex items-center gap-x-3 mb-6">
                                <img alt=""
                                    src="https://images.unsplash.com/photo-1577202214328-c04b77cefb5d?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=2073&amp;q=80"
                                    decoding="async" data-nimg="future" class="object-cover h-14 w-14 rounded-full"
                                    loading="lazy" style="color: transparent" />
                                <div>
                                    <div class="text-xs 2xl:text-sm font-semibold text-black">
                                        Jordan Pettersson
                                    </div>
                                    <div class="text-xs 2xl:text-sm text-gray-500">
                                        Mahasiswa
                                    </div>
                                </div>
                            </figcaption>
                            <blockquote class="relative">
                                <p class="text-xs 2xl:text-sm text-black">
                                    Fitur2 yang diajarkan di kelas ini senilai 2.5 juta/lebih, dibuka dengan harga 175
                                    ribu
                                    (promo) aja
                                </p>
                            </blockquote>
                            <div class="mt-3 flex items-center gap-x-0">
                                @for ($i = 1; $i <= 5; $i++)
                                    <ion-icon name="star" class="w-4 h-4 text-yellow-500"></ion-icon>
                                @endfor
                            </div>
                        </figure>
                    </li>
                @endfor
            </ul>
        </div>
    </section>

    {{-- Newsletter --}}

    <section class="object-top overflow-hidden bg-cover">
        <div>
            <div class="px-4 py-12 mx-auto max-w-6xl">
                <div class="px-6 py-6 rounded-3xl md:py-12 md:px-12 lg:px-16 xl:flex xl:items-center">
                    <div class="xl:w-0 xl:flex-1">

                        <p class="text-4xl tracking-tighter font-bold text-black ">
                            Mari Tetap Terkoneksi
                        </p>
                        <p class="max-w-3xl text-xs 2xl:text-sm leading-6 text-gray-500">
                            Isi alamat email dibawah untuk mendapatkan informasi terbaru
                        </p>
                    </div>
                    <div class="mt-8 sm:w-full sm:max-w-md xl:mt-0 xl:ml-8">
                        <form class="flex flex-col items-center justify-center max-w-sm mx-auto" action="">
                            <div class="flex flex-col w-full gap-2 mt-3 sm:flex-row">
                                <input name="email" type="email"
                                    class="block w-full px-4 py-2 text-xs 2xl:text-sm font-medium text-gray-800 placeholder-gray-400 bg-white border border-gray-300 rounded-full font-spline focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-600/50 disabled:opacity-50"
                                    placeholder="Alamat email" required="" autocomplete="off">
                                <button type="button"
                                    class="items-center inline-flex  justify-center w-full px-6 py-2.5 text-center text-white duration-200 bg-primary font-medium rounded-full nline-flex hover:bg-orange-600 focus:outline-none lg:w-auto focus-visible:outline-primary text-xs 2xl:text-sm">
                                    <div style="position: relative"></div>
                                    Berlangganan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


</x-guest-layout>
