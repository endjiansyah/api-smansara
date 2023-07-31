<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMAN 1 Jepara</title>

    <!-- tailwind -->
    @vite('resources/css/app.css')

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
                <img src="./assets/smansara.png" alt="logo SMAN 1 Jepara">
            </div>

            <!-- btn hamburger -->
            <button data-collapse-toggle="navbar-default" type="button" class="hamburger" aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
            </button>
            
            <div id="navbar-default" class="hidden lg:block w-full">
                <div class="hidenisasi">
                    <!-- left -->
                    <div class="menu-navigation">
                        <ul>
                            <li><a href="#!" class="active">Home</a></li>
                            <li><a href="#!">Pengumuman</a></li>
                            <li><a href="#!">Berita</a></li>
                        </ul>
                    </div>

                    <!-- right -->
                    <div class="menu-action">
                        <!-- <div class="search-box">
                            <img src="./assets/images/logo/koco.svg" alt="magni">
                            <form action="post">
                                <input type="text" name="aaa" id="hilih" placeholder="Search here ...">
                            </form>
                        </div>
                        <div class="button">
                            <button>Log in</button>
                        </div> -->
                    </div>
                </div>     
            </div>
        </div>
    </nav>

 
    <!-- pengumuman (yang ada 6 card) -->
    <section id="pengumuman">
        <div class="container">
            <div class="title">
                <h2>Pengumuman</h2>
                <p>
                    Pengumuman SMA Negeri 1 Jepara.
                </p>
            </div>

            <div class="card-box">

                <div class="card">
                    <div class="text-card">
                        <h1>Pengumuman 1</h1>
                        <p>
                            ini pengumuman sman 1 jepara ke 1
                        </p>
                        <p class="date">
                            15 Juli 2023
                        </p>
                    </div>
                </div>

                <div class="card">
                    <div class="text-card">
                        <h1>Groups</h1>
                        <p>
                            Your users can create groups to let other users to join and talk
                        </p>
                        <p class="date">
                            15 Juli 2023
                        </p>
                    </div>
                </div>

                <div class="card">
                    <div class="text-card">
                        <h1>Forum</h1>
                        <p>
                            Forum is ready by BBPress. Your users can make topics and talk.
                        </p>
                        <p class="date">
                            15 Juli 2023
                        </p>
                    </div>
                </div>

                <div class="card">
                    <div class="text-card">
                        <h1>Custom Module</h1>
                        <p>
                            You can create Members, Groups Module. We already created 3 modules. It's by drag & drop live builder.
                        </p>
                        <p class="date">
                            15 Juli 2023
                        </p>
                    </div>
                </div>

                <div class="card">
                    <div class="text-card">
                        <h1>List Builder</h1>
                        <p>
                            Members, Groups list can be modified by drag & drop live builder.
                        </p>
                        <p class="date">
                            15 Juli 2023
                        </p>
                    </div>
                </div>

                <div class="card">
                    <div class="text-card">
                        <h1>List Scroll Effects</h1>
                        <p>
                            8 different scroll effects are ready. You can always change by your tastes.
                        </p>
                        <p class="date">
                            15 Juli 2023
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- News (bawahnya gambar HP) -->
    <section id="berita">
        <div class="container">
            <div class="title">
                <h2>Berita</h2>
            </div>
            <div class="card-box">
                <div class="card">
                    <img src="./assets/images/news1.png" alt="news">
                    <div class="line">
                        <div class="text">
                            <h3>
                                It Does Not Matter Hows Slowly go as Long
                            </h3>
                            <a href="#!" class="">Continue Reading</a>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <img src="./assets/images/news2.png" alt="news">
                    <div class="line">
                        <div class="text">
                            <h3>
                                Netbook Network Added New Photo Filter
                            </h3>
                            <a href="#!" class="">Continue Reading</a>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <img src="./assets/images/news3.png" alt="news">
                    <div class="line">
                        <div class="text">
                            <h3>
                                We Optimised Netbooks Better Navigation
                            </h3>
                            <a href="#!" class="">Continue Reading</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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