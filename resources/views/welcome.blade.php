<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SMAN 1 Jepara</title>
        <link rel="shortcut icon" href="/assets/favicon.png" type="image/x-icon">

        <!-- tailwind -->
        @vite('resources/css/app.css')
        
        {{-- alpinejs --}}
        <script defer src="//unpkg.com/alpinejs" defer></script>

        <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
        <!-- <script src="https://cdn.tiny.cloud/1/945mcsgfk431ijoj5cqmn5kk1a5oclfx206q55bvrbtw521k/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script> -->

        <link rel="preconnect" href="https://fonts.googleapis.com">

        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
        {{-- <link rel="stylesheet" href="/dist/output.css"> --}}
    </head>
    <body class="bg-no-repeat bg-fixed bg-bottom bg-cover" style="{{$padmin == 1? "":"background-image: url('/assets/sman1jepara.png')"}}">
        
        <!-- nav (navbar) -->
        <nav id="header" class="border-[primary]/10">
            <div class="container">
                <div class="image-box">
                    <img src="/assets/smansara.png" alt="logo SMAN 1 Jepara">
                </div>

                <!-- btn hamburger -->
                <button
                    data-collapse-toggle="navbar-default"
                    type="button"
                    class="hamburger"
                    aria-controls="navbar-default"
                    aria-expanded="false"
                    onclick="toggleNavbar()"
                >
                    <span class="sr-only">Buka menu utama</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                    </svg>
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

                            <div class="button {{$padmin == 1? "":"hidden"}}">
                                <a onclick="return confirm('Yakin logout?')" href="{{ route('logout') }}" >Log out</a>
                            </div>
                        </div>
                    </div>     
                </div>
            </div>
        </nav>

        @yield('content')


        <footer class="text-gray-600 body-font bg-gray-800">
            @if($padmin != 1)
            <div class="container px-5 pt-8 pb-24 md:pt-16 md:pb:16 mx-auto flex items-center md:items-start md:flex-row md:flex-nowrap flex-wrap md:gap-6 flex-col">
              <div class="w-full md:w-1/2 px-4 flex-shrink-0 md:mx-0 mx-auto text-center md:text-left">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5605.107345287424!2d110.66363849981195!3d-6.59593138258339!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e711efc5f23ab15%3A0x7dfb4da9091ebe49!2sSMA%20Negeri%201%20Jepara!5e0!3m2!1sen!2sid!4v1699514476480!5m2!1sen!2sid" class="w-full h-72" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
              </div>
              <div class="flex-grow flex flex-col flex-wrap -mb-10 md:mt-0 mt-10 md:text-left text-center">
                <h1 class="text-white text-lg leading-relative mb-2">Website terkait</h1>
                <a href="https://smansara.com/" class="text-white text-md font-thin hover:font-medium">SMANSARA.COM</a>
                <a href="https://wesitu.smansara.com/" class="text-white text-md font-thin hover:font-medium">wesitu.smansara.com</a>
                <div class="pt-8">
                    <h1 class="text-white text-lg leading-relative mb-2">SMA Negeri 1 Jepara</h1>
                    <p class="text-white text-md font-thin mb-2">Jl. C.S. Tubun 1, Demaan VIII, Demaan, Kec. Jepara, Kabupaten Jepara, Jawa Tengah 59419</p>
                    <p class="text-white text-md font-thin">(0291) 591148</p>
                </div>
              </div>
            </div>
            @endif
            <div class="bg-gray-900">
              <div class="container mx-auto py-4 px-5 flex flex-wrap flex-row"><a href="https://endjiansyah.github.io" target="_blank">2023</a> | SMA Negeri 1 Jepara
              </div>
            </div>
          </footer>
        <script>
            function toggleNavbar() {
                const navbar = document.getElementById('navbar-default');
                if (navbar.classList.contains('hidden')) {
                    navbar.classList.remove('hidden');
                } else {
                    navbar.classList.add('hidden');
                }
            }
        </script>
    <script>
        function scrollToElement(selector) {
          const element = document.querySelector(selector);
          if (element) {
            element.scrollIntoView({ behavior: 'smooth' });
          }
        }
    </script>
<script>
    ClassicEditor
        .create( document.querySelector( '#body' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
    </body>
</html>