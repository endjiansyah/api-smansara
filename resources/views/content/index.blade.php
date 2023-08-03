@extends('welcome')

@section('content')

    <section id="pengumuman">
        <div class="container">
            <div class="title">
                <h2 id="bacapengumuman">Pengumuman</h2>
                <p>
                    Pengumuman terbaru SMA Negeri 1 Jepara
                </p>
            </div>

            
            <div x-data="{id:'',title:'',body:'',time:'',show:'0'}" class="w-full flex justify-center flex-col gap-4">
                <div class="w-full flex justify-center">
                    <div x-show="show == '1'" class="card border-4 border-blue-700">
                        <div class="flex justify-end w-full py-0 h-auto">
                            <button x-on:click="show = '0', id=''" class="bg-red-500 hover:bg-red-600 text-white text-center w-7 h-7 rounded-full">x</button>
                        </div>
                        <hr>
                        <div class="text-card w-full">
                            <h1 x-text="title" class="text-center"></h1>
                            <p x-text='body'></p>
                        </div>
                    </div>
                </div>
                    
                <hr class="mb-2">
                <div class="card-box">

                    @foreach ($pengumuman as $item)
                        <button class="card" x-bind:class="id == {{ $item->id }} ? 'border-4 border-blue-700' : ''" x-on:click="id='{{ $item['id'] }}',body = '{{$item['body']}}',title = '{{$item['title']}}',time = '{{$item['updated_at']}}',show='1'"  onclick="window.location.href='#bacapengumuman'">
                            <div class="text-card">
                                <h1>{{ $item->title }}</h1>

                                <p class="date">
                                    {{ $item->updated_at }}
                                </p>
                            </div>
                        </button>
                    @endforeach
                </div>

            </div>
        </div>
    </section>

    <section id="berita">
        <div class="container">
            <div class="title" id="bacaberita">
                <h2>Berita</h2>
                <p>Berita terbaru SMA Negeri 1 Jepara</p>
            </div>

            <div x-data="{id:'',title:'',body:'',time:'',image:'',show:'false'}">
                <div x-show="show == 'true'" class="card mb-8 md:mx-2 lg:mx-4 rounded-xl bg-white border-blue-400 border-4 shadow-lg p-4 md:p-6 lg:py-8">
                    <div class="flex justify-end w-full py-0 h-auto">
                        <button x-on:click="show = 'false', id=''" class="bg-red-500 hover:bg-red-600 text-white text-center w-7 h-7 rounded-full">x</button>
                    </div>
                    <div class="w-full flex justify-center">
                        <img x-show="image != ''" x-bind:src=" image != ''? image : './assets/logosmansara.png'" alt="title">
                    </div>
                    <div class="">
                        <p x-text="time"></p>
                        <div class="line">
                        </div>
                        <h3 x-text="title"></h3>
                        <hr class="mb-2">
                        <p x-text=body></p>
                    </div>
                </div>
                
                <hr class="mb-2">
                
                <div class="card-box">
                
                    @foreach ($berita as $item)    
                    <div x-bind:class="id == {{ $item['id']}} ? 'border-blue-400 border-4'  : ''" class="card">
                        <img src="{{ $item->image != ''? $item->image : './assets/logosmansara.png' }}" alt="{{ $item->title }}">
                        <div class="text">
                            {{ $item->updated_at }}
                                <div class="line">
                                </div>
                                <h3>
                                    {{ $item->title }}
                                </h3>
                                <button x-on:click="id='{{ $item['id'] }}',body = '{{$item['body']}}',title = '{{$item['title']}}',image = '{{$item['image']}}',time = '{{$item['updated_at']}}',show='true'"  onclick="window.location.href='#bacaberita'">Continue Reading</button>
                        </div>
                    </div>
                    @endforeach
                    
                </div>
            </div>
        </div>
    </section>

@endsection