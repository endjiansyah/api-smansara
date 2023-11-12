@extends('welcome')
@php
            setlocale(LC_TIME, 'id_ID');
        \Carbon\Carbon::setLocale('id');
        \Carbon\Carbon::now()->formatLocalized("%A, %d %B %Y");
@endphp
@section('content')

    <section id="top" class="h-[95vh] bg-gradient-to-b from-transparent via-transparent via-90% to-gray-100">
    </section>

    <section id="berita" class="py-24">
        <div class="container">
            <div class="title">
                <h2>Berita</h2>
                <p>Berita terbaru SMA Negeri 1 Jepara</p>
            </div>

            <div x-data="{id:'',title:'',body:'',time:'',image:'',show:'false'}">
                
                <div x-show="show =='false'" class="card-box"
                x-transition:enter="transition ease-out duration-500"
                x-transition:enter-start="opacity-0 scale-90"
                x-transition:enter-end="opacity-100 scale-100">
                
                    @foreach ($berita as $item)    
                    <div x-bind:class="id == {{ $item['id']}} ? ' bg-white shadow-xl border'  : 'bg-white shadow border'" class="card relative" x-show="show =='false'" 
                    x-transition:enter="transition ease-out duration-500"
                    x-transition:enter-start="opacity-0 scale-90"
                    x-transition:enter-end="opacity-100 scale-100">
                        <div class="w-full flex justify-center">
                            <img src="{{ $item->image != ''? $item->image : './assets/mdlogosmansara.jpg' }}" alt="{{ $item->title }}" >
                        </div>
                        <div class="text">
                            
                            <p class="text-xs md:text-base">{{ $item->updated_at->isoFormat('dddd, D MMMM Y') }}</p>
                            <div class="line">
                            </div>
                            <h3 class="pb-4 md:pb-6">
                                {{ $item->title }}
                            </h3>
                            <button x-on:click="id='{{ $item['id'] }}',body = '{{$item['body']}}',title = '{{$item['title']}}',image = '{{$item['image']}}',time = '{{ $item->updated_at->isoFormat('dddd, D MMMM Y') }}',show='true';scrollToElement('#bacaberita')" class="absolute bottom-4">Continue Reading</button>
                        </div>
                    </div>
                    @endforeach
                    
                </div>

                <div x-show="show == 'true'" class="card my-4 md:my-8 md:mx-2 lg:mx-4 rounded-xl bg-white border shadow-xl" id="bacaberita" x-transition:enter="transition ease-out duration-500"
                x-transition:enter-start="opacity-0 scale-90"
                x-transition:enter-end="opacity-100 scale-100">

                    <div class="flex justify-between items-center w-full p-4">
                        <p x-text="time" class="text-sm md:text-base"></p>
                        <button x-on:click="show = 'false', id=''" class="bg-red-500 hover:bg-red-600 text-white text-center w-7 h-7 rounded-full">x</button>
                    </div>
                    <div class=" p-4 md:p-6">
                        <div class="w-full flex justify-center">
                            <img x-show="image != ''" x-bind:src=" image != ''? image : './assets/logosmansara.png'" alt="title">
                        </div>
                        <div>
                            <br x-show="image != ''">
                            <div class="line">
                            </div>
                            <h3 x-text="title"></h3>
                            <hr class="mb-2">
                            <p x-html="body" class="text-sm text-justify md:text-base"></p>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>

    <section class="text-gray-600 body-font bg-gradient-to-r to-violet-500 from-cyan-500 via-blue-500">
        <div class="container px-5 pb-24 pt-16 mx-auto">
            <h1 class="text-2xl font-semibold title-font text-white text-center">VISI MISI</h1>
            <h1 class="text-3xl font-semibold title-font text-white mb-12 text-center">SMA Negeri 1 Jepara</h1>
            <div class="flex flex-wrap -m-4">
                <div class="p-4 md:w-1/2 w-full">
                    <div class="group h-full bg-gray-100 p-8 rounded hover:bg-white hover:-translate-y-2 hover:shadow-xl duration-300">
                        <div class=" mb-6">
                            <h2 class="text-center">VISI</h2>
                            <div class="w-0 group-hover:w-20 duration-300 h-1 bg-gray-100 group-hover:bg-gray-400 mx-auto"></div>
                        </div>
                        <p class="leading-relaxed mb-6">Unggul dalam prestasi, kreatif, santun, berwawasan global, dan bertaqwa kepada Tuhan yang Maha Esa.</p>
                        <p class="leading-relaxed mb-1">Indikator Visi:</p>
                        <p>a. Unggul dalam prestasi akademik dan non akademik</p>
                        <p>b. Kreatif dalam berpikir dan berkarya</p>
                        <p>c. Santun dalam bertutur dan bertindak</p>
                        <p>d. Mampu bersaing secara nasional dan internasional</p>
                        <p>e. Berperilaku jujur dan tekun beribadah</p>
                    </div>
                </div>
                <div class="p-4 md:w-1/2 w-full">
                    <div class="group h-full bg-gray-100 p-8 rounded hover:bg-white hover:-translate-y-2 hover:shadow-xl duration-300">
                        <div class=" mb-6">
                            <h2 class="text-center">MISI</h2>
                            <div class="w-0 group-hover:w-20 duration-300 h-1 bg-gray-100 group-hover:bg-gray-400 mx-auto"></div>
                        </div>
                        <p>1. Melaksanakan proses pembelajaran secara efektif sehingga siswa berkembang secara optimal untuk meraih prestasi terbaik.</p>
                        <p>2. Mengembangkan potensi siswa sesuai dengan bakat dan minat yang dimiliki agar meraih prestasi optimal.</p>
                        <p>3. Mengembangkan kegiatan yang mendorong siswa berpkir kreatif dan mampu berkarya inovatif.</p>
                        <p>4. Menumbuhkan sikap santun dalam bertutur kata dan berperilaku.</p>
                        <p>5. Meningkatkan pengetahuan dan memperluas wawasan agar mampu menghadapi persaingan global.</p>
                        <p>6. Menanamkan sikap jujur pada setiap individu dan tekun melaksanakan ibadah sesuai dengan agama da keyakinannya.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="pengumuman" class="bg-gray-100 pb-24">
        <div class="container">
            <div class="title">
                <h2 id="bacapengumuman">Pengumuman</h2>
                <p>
                    Pengumuman terbaru SMA Negeri 1 Jepara
                </p>
            </div>
            
            <div x-data="{id:'',title:'',body:'',time:'',show:'0'}" class="w-full flex justify-center flex-col gap-4">
                <div class="w-full flex justify-center">
                    <div x-show="show == '1'"  
                    x-transition:enter="transition ease-out duration-500"
                    x-transition:enter-start="opacity-0 scale-90"
                    x-transition:enter-end="opacity-100 scale-100" x-bind:class="show == '1'? 'card border shadow-xl' : 'hidden'">
                    <div class="flex justify-between w-full">
                        <p x-text="time"></p>
                        <button x-on:click="show = '0', id=''" class="bg-red-500 hover:bg-red-600 text-white text-center w-7 h-7 rounded-full">x</button>
                    </div>
                        <div class="text-card w-full">
                            <h1 x-text="title" class="text-center"></h1>
                            <p x-html='body'></p>
                        </div>
                    </div>
                </div>
                    
                <div class="card-box" x-show="show !=1" 
                x-transition:enter="transition ease-out duration-500"
                x-transition:enter-start="opacity-0 scale-90"
                x-transition:enter-end="opacity-100 scale-100">

                    @foreach ($pengumuman as $item)
                        <button class="group card shadow-[14px_22px_52px_-12px_rgba(127,_127,_127,_0.13)] items-start hover:drop-shadow-[0_4px_4px_rgba(0,0,0,0.25)] hover:bg-white duration-300" x-bind:class="id == {{ $item->id }} ? 'drop-shadow-[0_4px_4px_rgba(0,0,0,0.25)] shadow-xl' : ''" x-on:click="id='{{ $item['id'] }}',body = '{{$item['body']}}',title = '{{$item['title']}}',time = '{{ $item->updated_at->isoFormat('dddd, D MMMM Y') }}',show='1';scrollToElement('#bacapengumuman')">
                            <div class="text-card">
                                <div>
                                    <h1>{{ $item->title }}</h1>
                                    <div class="w-0 group-hover:w-20 duration-300 h-1 bg-gray-100 group-hover:bg-gray-400"></div>
                                </div>

                                <p class="date">
                                    {{ $item->updated_at->isoFormat('dddd, D MMMM Y') }}

                                </p>
                            </div>
                        </button>
                    @endforeach
                </div>

            </div>
        </div>
    </section>

@endsection