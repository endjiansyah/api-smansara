@extends('welcome')

@section('content')

    <section id="pengumuman">
        <div class="container">
            <div class="title">
                <h2>Pengumuman</h2>
                <p>
                    Pengumuman terbaru SMA Negeri 1 Jepara
                </p>
            </div>

            <div class="card-box">

                @foreach ($pengumuman as $item)
                    <div class="card">
                        <div class="text-card">
                            <h1>{{ $item->title }}</h1>

                            <p class="date">
                                {{ $item->updated_at }}
                            </p>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

    <section id="berita">
        <div class="container">
            <div class="title" id="bacaberita">
                <h2>Berita</h2>
                <p>Berita terbaru SMA Negeri 1 Jepara</p>
            </div>

            <div x-data="{title:'',body:'',waktu:'',image:'',show:false}">
                <div x-show="show" class="card mb-8 md:mx-2 lg:mx-4 rounded-xl bg-blue-100 p-4 md:p-6 lg:p-8">
                    <img x-show="image != ''" x-bind:src=" image != ''? image : './assets/logosmansara.png'" alt="title">
                    <div class="">
                        <p x-text="waktu"></p>
                            <div class="line">
                            </div>
                            <h3 x-text="title"></h3>
                            <hr class="mb-2">
                            <p x-text=body></p>
                            <hr class="mt-3">
                            <button x-on:cklick="show = 'false'" class="par-c text-red-500 hover:text-red-600">Tutup Berita</button>
                    </div>
                </div>
                
                <hr class="mb-2">
                
                <div class="card-box">
                
                    @foreach ($berita as $item)    
                    <div class="card">
                        <img src="{{ $item->image != ''? $item->image : './assets/logosmansara.png' }}" alt="{{ $item->title }}">
                        <div class="text">
                            {{ $item->updated_at }}
                                <div class="line">
                                </div>
                                <h3>
                                    {{ $item->title }}
                                </h3>
                                <button x-on:click="body = '{{$item['body']}}',title = '{{$item['title']}}',image = '{{$item['image']}}',time = '{{$item['updated_at']}}',show='true'"  onclick="window.location.href='#bacaberita'">Continue Reading</button>
                        </div>
                    </div>
                    @endforeach
                    
                </div>
            </div>
        </div>
    </section>

@endsection