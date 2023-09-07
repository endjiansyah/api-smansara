@extends('welcome')

@section('content')
    <section id="pengumuman">
        <div class="container min-h-[75vh]">
            <div class="title" id="top">
                <h2>Pengumuman</h2>
                <p>
                    List Pengumuman SMA Negeri 1 Jepara
                </p>
            </div>

            <div class="mt-2 flex flex-col-reverse lg:flex-row gap-3" x-data="{}">
                <div class="w-full lg:w-1/2">
                    @if ($message = Session::get('successdktg'))
                        <div class="text-red-600" role="alert">{{ $message }}</div>
                    @endif
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-white uppercase bg-neutral-500">
                            <tr class="">
                                <th class="py-3 px-6 text-center">
                                    edited at
                                </th>
                                <th class="py-3 px-6 text-center">
                                    title 
                                </th>
                                <th class="py-3 px-6  text-center">
                                    <span class="sr-only"></span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pengumuman as $item)
                                
                            <tr class="{{$cdata['id'] != $item['id']? 'bg-white hover:bg-gray-50' : 'bg-yellow-100 hover:bg-orange-100'}}" class=" border-b">
                                <th scope="row" class="py-4 px-6 text-center font-medium text-gray-900 whitespace-nowrap">
                                    {{$item['updated_at']}}
                                </th>
                                <td class="py-4 px-6 text-center">
                                    {{$item['title']}}
                                </td>
                                    <td class="py-4 px-6 text-right">
                                        <a class="font-medium text-blue-600 hover:underline" href="pengumuman?{{$page != 1? 'page='.$page.'&' : ''}}content={{$item['id']}}">Edit</a>

                                            <a onclick="return confirm('Hapus data {{ $item['title'] }}?')" href="{{ route('admin.destroy', ['id' => $item['id']]) }}" class="font-medium text-red-600 hover:underline">delete</a>
                                    </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="w-auto flex justify-center gap-2 mt-4 items-center">
                        <?php 
                        $back = $page - 1;
                        $next = $page + 1;
                            ?>
                        <a x-bind:href="{{ $page }} <= 1 ? '#' : 'pengumuman?page='+{{ $back }}" x-bind:class="{{ $page }} <= 1 ? 'bg-gray-200': 'bg-gray-300 hover:bg-gray-200'" class="rounded-md px-6 py-2" <?= $page <= 1? 'disabled' : '' ?>>Back</a>
                        <p class="font-semibold">Page {{$page}}</p>
                        <a x-bind:href="{{ $page }} >= {{ $maxpage }} ? '' : 'pengumuman?page='+{{ $next }}" x-bind:class="{{ $page }} >= {{ $maxpage }} ? 'bg-gray-200': 'bg-gray-300 hover:bg-gray-400'" class="rounded-md px-6 py-2" <?= $page >= $maxpage ? 'disabled' : '' ?>>Next</a>
                    </div>
                
                </div>
                <div class="w-full lg:w-1/2 {{$cdata['id'] == 0? 'bg-white' : 'bg-yellow-100'}}">

                    <div class="flex flex-col gap-2 shadow p-3">
                        <div class="flex justify-between">
                            <h3 class="font-bold">{{$cdata['id'] == 0? 'Buat Pengumuman' : 'Edit Pengumuman'}}</h3>
                            @if($cdata['id'] != 0)
                                <a href="{{route('admin.pengumuman')}}" class="px-4 py-2 text-sm font-medium text-white bg-red-600 border border-transparent rounded-md hover:bg-red-500">Batal Edit</a>
                            @endif
                        </div>
                        <hr>
                    
                        <form action="{{$cdata['id'] == 0? route('admin.store') : route('admin.update', ['id' => $cdata['id']])}}" method="POST">
                            @csrf
                            <input type="hidden" name="type" id="type" value="1">
                            <label for="title" class="block text-sm font-medium text-gray-700 leading-5">
                                Title
                            </label>
                            <div class="mt-1 rounded-md shadow-sm">
                                <input id="title" name="title" type="text" value="{{$cdata['title']}}" required autofocus class="w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" placeholder="Judul Pengumuman" />
                            </div>
                    
                            <label for="body" class="mt-3 block text-sm font-medium text-gray-700 leading-5">
                                Body
                            </label>
                            <div class="mt-1 rounded-md shadow-sm">
                                <textarea id="body" name="body" type="text" required autofocus class="w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" placeholder="Isi Pengumuman" >
                                    {{$cdata['body']}}
                                </textarea>
                            </div>
                    
                            <hr class="my-3">
                            <div class="">
                                <span class="flex w-full gap-3 items-center">
                                    <button type="submit" class="flex justify-center px-4 py-2 text-sm font-medium text-white bg-green-600 border border-transparent rounded-md hover:bg-green-500 focus:outline-none focus:border-green-700 focus:ring-indigo active:bg-green-700 transition duration-150 ease-in-out">
                                        Simpan
                                    </button>
                                    @if ($message = Session::get('successktg'))
                                        <div class="text-green-600" role="alert">{{ $message }}</div>
                                    @endif
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection