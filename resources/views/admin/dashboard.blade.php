@extends('welcome')

@section('content')
<section id="pengumuman">
    <div class="container min-h-[75vh]">
        <div class="w-full">
            <div class="px-4 py-8 shadow-lg sm:rounded-lg sm:px-10">
                <h2 class="mb-6 text-2xl text-gray-900 leading-9">
                    Selamat Datang {{ $logus->name }}
                </h2>
                <form action="{{ route('userupdate', ['id' => $logus->id]) }}" method="post">
                    @csrf
                    <input type="hidden" name="id_role" value="{{$logus->role}}">
                    <div class="flex gap-3 flex-col md:flex-row">

                        <div class="flex flex-col mt-3 md:mt-0">
                        
                            <label for="name">Nama</label>
                            <input type="text" id="name" name="name" value="{{$logus->name}}">
                        
                            <label for="username" class="mt-3">Username</label>
                            <input type="text" id="username" name="username" value="{{$logus->username}}">
                        
                        </div>

                        <div class="flex flex-col mt-3 md:mt-0">

                            <label for="pw">Password @error('password') <span class="text-red-700 font-bold">minimal 5 karakter</span> @enderror</label>
                            <input type="password" id="pw" class="@error('password') border-red-700 border border-2 @enderror" name="password" placeholder="password">

                            <label for="kpw" class="mt-3">Konfirmasi Password</label>
                            <input type="password" id="kpw" class="@error('password') border-red-700 border border-2 @enderror" name="kpassword" placeholder="konfirmasi password">
                        
                        </div>

                    </div>
                    <div class="flex items-center gap-2">
                        <button type="submit" class="flex justify-center px-4 py-2 text-sm font-medium text-white bg-green-600 border border-transparent rounded-md hover:bg-green-500 focus:outline-none focus:border-green-700 focus:ring-indigo active:bg-green-700 transition duration-150 ease-in-out mt-4">
                            Simpan
                        </button>
                        @if ($message = Session::get('success'))
                            <div class="text-green-600" role="alert">{{ $message }}</div>
                        @endif
                        @if ($message = Session::get('error'))
                            <span class="text-red-600">{{$message}}</span>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection