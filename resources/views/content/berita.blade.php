@extends('welcome')

@section('content')

<section id="berita" class="py-40 bg-gray-100">
    <div class="container">
        <div class="title">
            <h2>Berita</h2>
            <p>Berita terbaru SMA Negeri 1 Jepara</p>
        </div>

        <div x-data="{id:'',title:'',body:'',time:'',image:'',show:'false'}">
            
            
            <div x-show="show == 'true'" class="card my-8 md:mx-2 lg:mx-4 rounded-xl bg-white border shadow-xl" id="bacaberita">

                <div class="flex justify-between w-full p-4">
                    <p x-text="time"></p>
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
                        <p x-html=body></p>
                    </div>
                </div>
            </div>

            
            <div class="card-box">
            
                @foreach ($berita as $item)    
                <div x-bind:class="id == {{ $item['id']}} ? ' bg-white shadow-xl border'  : 'bg-white shadow border'" class="card relative">
                    <div class="w-full flex justify-center">
                        <img src="{{ $item->image != ''? $item->image : './assets/mdlogosmansara.jpg' }}" alt="{{ $item->title }}" >
                    </div>
                    <div class="text">
                        
                        {{ $item->updated_at->isoFormat('dddd, D MMMM Y') }}
                        <div class="line">
                        </div>
                        <h3 class="pb-4">
                            {{ $item->title }}
                        </h3>
                        <button x-on:click="id='{{ $item['id'] }}',body = '{{$item['body']}}',title = '{{$item['title']}}',image = '{{$item['image']}}',time = '{{ $item->updated_at->isoFormat('dddd, D MMMM Y') }}',show='true';scrollToElement('#bacaberita')" class="absolute bottom-2">Continue Reading</button>
                    </div>
                </div>
                @endforeach
                
            </div>
            
        </div>
    </div>
</section>

@endsection