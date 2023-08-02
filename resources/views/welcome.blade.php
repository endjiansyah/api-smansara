<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SMAN 1 Jepara</title>

        <!-- tailwind -->
        @vite('resources/css/app.css')
        
        {{-- alpinejs --}}
        <script src="//unpkg.com/alpinejs" defer></script>

        <link rel="preconnect" href="https://fonts.googleapis.com">

        <!-- flowbite -->
        <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.4/dist/flowbite.min.css" />

        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="./dist/output.css">

    </head>
    <body>
        
        <!-- nav (navbar) -->
        <nav id="header" class="border-[primary]/10">
            <div class="container">
                <div class="image-box">
                    <img src="../assets/smansara.png" alt="logo SMAN 1 Jepara">
                </div>

                <!-- btn hamburger -->
                <button data-collapse-toggle="navbar-default" type="button" class="hamburger" aria-controls="navbar-default" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                </button>
                
                <div id="navbar-default" class="hidden lg:block w-full" x-data="{admin:{{ $padmin }}}">
                    <div class="hidenisasi">
                        <!-- left -->
                        <div class="menu-navigation">
                            <ul>
                                <li><a x-bind:href="admin ? '{{ route('admin.dashboard') }}' : '{{ route('content.index') }}'" class="<?= $npage == 'home'? 'active':'' ?>">Home</a></li>
                                <li><a x-bind:href="admin ? '{{ route('admin.pengumuman') }}' : 'pengumuman'" class="<?= $npage == 'pengumuman'? 'active':'' ?>">Pengumuman</a></li>
                                <li><a x-bind:href="admin ? '{{ route('admin.berita') }}' : 'berita'" class="<?= $npage == 'berita'? 'active':'' ?>">Berita</a></li>
                            </ul>
                        </div>

                        <!-- right -->
                        <div class="menu-action">
                            <!-- <div class="search-box">
                                <img src="./assets/images/logo/koco.svg" alt="magni">
                                <form action="post">
                                    <input type="text" name="aaa" id="hilih" placeholder="Search here ...">
                                </form>
                            </div> -->
                            <div class="button" x-show="admin">
                                <a onclick="return confirm('Yakin logout?')" href="{{ route('logout') }}" >Log out</a>
                            </div>
                        </div>
                    </div>     
                </div>
            </div>
        </nav>

        @yield('content')


        <!-- footernya-footer (paling bawah) -->
        <section id="footernya-footer">
            <div class="container">
                <p>
                    EndProject
                </p>

                <div class="btn-box flex gap-2">
                    <a href="#!"><img src="./assets/images/logo/Twitter.svg" alt="twitter"></a>
                    <a href="#!"><img src="./assets/images/logo/instagram.svg" alt="instagram"></a>
                    <a href="#!"><img src="./assets/images/logo/facebook.svg" alt="facebook"></a>
                    <a href="#!"><img src="./assets/images/logo/Linkedin.svg" alt="Linkedin.svg"></a>
                </div>
            </div>
        </section>

        <!-- flowbite -->
        <script src="https://unpkg.com/flowbite@1.5.4/dist/flowbite.js"></script>
    </body>
</html>