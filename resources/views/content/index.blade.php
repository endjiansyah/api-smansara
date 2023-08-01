@extends('welcome')

@section('content')

    <section id="pengumuman">
        <div class="container">
            <div class="title">
                <h2>Pengumuman</h2>
                <p>
                    Pengumuman SMA Negeri 1 Jepara.
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
            </div>
            <div class="card-box">
                
                @foreach ($berita as $item)    
                <div class="card">
                    <img src="{{ $item->image }}" alt="{{ $item->title }}">
                    <div class="line">
                        <div class="text">
                            <h3>
                                {{ $item->title }}
                            </h3>
                            <a href="#!" class="">Continue Reading</a>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>

@endsection