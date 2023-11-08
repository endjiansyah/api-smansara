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
        <script src="//unpkg.com/alpinejs" defer></script>

        <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
        <!-- <script src="https://cdn.tiny.cloud/1/945mcsgfk431ijoj5cqmn5kk1a5oclfx206q55bvrbtw521k/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script> -->

        <link rel="preconnect" href="https://fonts.googleapis.com">

        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
        {{-- <link rel="stylesheet" href="/dist/output.css"> --}}
        <style>
            #hero {
                position: relative;
                width: 100%;
                height: 100vh;
                overflow: hidden;
                display: flex;
                align-items: center;
                justify-content: center;
                background-image: url('/assets/sman1jepara.jpg');
                background-size: cover;
                background-position: bottom;
                color: white;
                text-align: center;
                transition: background-image 1s ease;
            }
    
            #hero .gradient-overlay {
        position: absolute;
        width: 100%;
        height: 100%;
        background: rgba(28, 11, 255, 0.1);
    }
    
            #hero .hero-text {
    
                transform: translateY(-50%);
                /* font-size: 24px; */
            }
        </style>
    </head>
    <body>
        
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

                            <div class="button" x-show="admin">
                                <a onclick="return confirm('Yakin logout?')" href="{{ route('logout') }}" >Log out</a>
                            </div>
                        </div>
                    </div>     
                </div>
            </div>
        </nav>

        @yield('content')

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
    ClassicEditor
        .create( document.querySelector( '#body' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
<!-- 
<script>
    tinymce.init({
      selector: 'textarea',
      plugins: 'anchor autolink charmap codesample emoticons link lists media searchreplace table visualblocks wordcount',
      toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
    });
  </script> -->
    </body>
</html>