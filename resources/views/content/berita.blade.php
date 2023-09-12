@extends('welcome')

@section('content')

    <section id="berita">
        <div class="container min-h-[75vh]">
            <div class="title">
                <h2 id="bacaberita">Berita</h2>
                <p>Berita SMA Negeri 1 Jepara</p>
            </div>

            <div x-data="{id:'',title:'',body:'',time:'',image:'',show:'false'}">
                <div x-show="show == 'true'" class="card mb-8 md:mx-2 lg:mx-4 rounded-xl bg-white border-blue-400 border-4 shadow-lg">
                    <div class="flex justify-between w-full p-1">
                        <p x-text="time"></p>
                        <button x-on:click="show = 'false', id=''" class="bg-red-500 hover:bg-red-600 text-white text-center w-7 h-7 rounded-full">x</button>
                    </div>
                    <div class=" p-4 md:px-6 md:pb-6">
                        <div class="w-full flex justify-center">
                            <img x-show="image != ''" x-bind:src=" image != ''? image : './assets/logosmansara.png'" alt="title">
                        </div>
                        <div>
                            <br x-show="image != ''">
                            <div class="line">
                            </div>
                            <h3 x-text="title"></h3>
                            <hr class="mb-2">
                            <p x-html=body></p>
                        </div>
                    </div>
                </div>
                
                <hr class="mb-2">
                
                <div class="card-box">
                
                    @foreach ($berita as $item)    
                    <div x-bind:class="id == {{ $item['id']}} ? 'border-blue-400 border-4'  : ''" class="card">
                        <div class="w-full flex justify-center">
                            <img src="{{ $item->image != ''? $item->image : './assets/mdlogosmansara.jpg' }}" alt="{{ $item->title }}" >
                        </div>
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