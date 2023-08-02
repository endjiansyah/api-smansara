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
            <div class="title">
                <h2>Berita</h2>
                <p>Berita terbaru SMA Negeri 1 Jepara</p>
            </div>
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
                            <a href="#!" class="">Continue Reading</a>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>

@endsection