@extends('welcome')

@section('content')
    <section id="pengumuman">
        <div class="container min-h-[75vh]">
            <div class="title" id="top">
                <h2>Berita</h2>
                <p>
                    List Berita SMA Negeri 1 Jepara
                </p>
            </div>

            <div class="mt-2 flex flex-col-reverse lg:flex-row gap-3" x-data="{title:'',body:'',id:'',image:'',type:'2',mode:'create'}">
                <div class="w-full lg:w-1/2">
                    @if ($message = Session::get('successdktg'))
                        <div class="text-red-600" role="alert">{{ $message }}</div>
                    @endif
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-white uppercase bg-neutral-500">
                            <tr class="">
                                <th class="py-3 px-6 text-center">
                                    Image
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
                            @foreach ($berita as $item)
                                
                            <tr x-bind:class="id == {{ $item['id'] }}?'bg-yellow-100/70 hover:bg-yellow-100':'bg-white hover:bg-gray-50'" class=" border-b">
                                <th scope="row" class="py-4 px-6 text-center">
                                    @if ($item['image'] != '')
                                        <img src="{{ $item['image'] }}" alt="{{ $item['title'] }}" class="h-24">
                                    @endif
                                </th>
                                <td class="py-4 px-6 text-center">
                                    {{$item['title']}}
                                </td>
                                    <td class="py-4 px-6 text-right">
                                        <button x-on:click="body = '{{$item['body']}}',title = '{{$item['title']}}',id = '{{$item['id']}}',image = '{{$item['image']}}',type = '{{$item['type']}}',mode='update'" class="font-medium text-blue-600 hover:underline" onclick="window.location.href='#top'">Edit</button>

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
                        <a x-bind:href="{{ $page }} <= 1 ? '#' : 'berita?page='+{{ $back }}" x-bind:class="{{ $page }} <= 1 ? 'bg-gray-200': 'bg-gray-300 hover:bg-gray-200'" class="rounded-md px-6 py-2" <?= $page <= 1? 'disabled' : '' ?>>Back</a>
                        <h3 x-text="'Page '+{{ $page }}"></h3>
                        <a x-bind:href="{{ $page }} >= {{ $maxpage }} ? '#' : 'berita?page='+{{ $next }}" x-bind:class="{{ $page }} >= {{ $maxpage }} ? 'bg-gray-200': 'bg-gray-300 hover:bg-gray-400'" class="rounded-md px-6 py-2" <?= $page >= $maxpage ? 'disabled' : '' ?>>Next</a>


                    </div>
            
                </div>
                <div class="w-full lg:w-1/2">

                    <div class="flex flex-col gap-2 shadow p-3" x-bind:class="mode == 'create' ? 'bg-white' : 'bg-yellow-100/70'">
                        <div class="flex justify-between">
                            <h2 x-text="mode == 'create' ? 'buat berita' : 'Edit berita'" class="font-bold"></h2>
                            <button x-on:click="mode = 'create',body = '', id = '', title = '',image='',type='2'" x-bind:class="mode == 'create' ? 'hidden' : 'px-4 py-2 text-sm font-medium text-white bg-red-600 border border-transparent rounded-md hover:bg-red-500'">Batal Edit</button>
                        </div>
                        <hr>
                    
                        <form x-bind:action="mode == 'create' ? 'store' : 'update/'+id" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="type" id="type" x-bind:value="type">
                            <label for="title" class="block text-sm font-medium text-gray-700 leading-5">
                                Title
                            </label>
                            <div class="mt-1 rounded-md shadow-sm">
                                <input x-bind:value="title" id="title" name="title" type="text" required autofocus class="w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" placeholder="Judul Berita" />
                            </div>
                    
                            <label for="body" class="mt-3 block text-sm font-medium text-gray-700 leading-5">
                                Body
                            </label>
                            <div class="mt-1 rounded-md shadow-sm">
                                <textarea x-bind:value="body" id="body" name="body" type="text" required class="w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" placeholder="Isi Berita" >
                                </textarea>
                            </div>

                            <label for="image" class="mt-3 block text-sm font-medium text-gray-700 leading-5" x-text="image == ''? 'image' : 'image [abaikan jika gambar tetap]'">
                            </label>
                            <div class="mt-1 rounded-md shadow-sm">
                                <input x-text="image" x-bind:value="image" id="image" name="image" type="file" class="w-full px-3 py-2 border bg-white border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" >
                                </input>
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