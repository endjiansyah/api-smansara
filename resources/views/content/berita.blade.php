@extends('welcome')

@section('content')

    <section id="berita">
        <div class="container min-h-[75vh]">
            <div class="title">
                <h2>Berita</h2>
                <p>Berita SMA Negeri 1 Jepara</p>
            </div>
            <div class="card-box">
                
                @foreach ($berita as $item)    
                <div class="card">
                    <img src="{{ $item->image != ''? $item->image : './assets/logosmansara.png' }}" alt="{{ $item->title }}">
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