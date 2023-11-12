@extends('welcome')
@php
            setlocale(LC_TIME, 'id_ID');
        \Carbon\Carbon::setLocale('id');
        \Carbon\Carbon::now()->formatLocalized("%A, %d %B %Y");
@endphp
@section('content')

<section id="pengumuman" class="bg-gray-100 pb-24 min-h-[70vh]">
    <div class="container">
        <div class="title">
            <h2 id="bacapengumuman">Pengumuman</h2>
            <p>
                Pengumuman SMA Negeri 1 Jepara
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