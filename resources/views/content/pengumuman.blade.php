@extends('welcome')

@section('content')

    <section id="pengumuman">
        <div class="container min-h-[75vh]">
            <div class="title">
                <h2>Pengumuman</h2>
                <p>
                    Pengumuman SMA Negeri 1 Jepara
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

@endsection