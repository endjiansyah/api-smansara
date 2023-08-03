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

@endsection