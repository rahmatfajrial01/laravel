@extends('layouts.main')

@section('auth')
    <section class="bg-slate-100 dark:bg-gray-900 min-h-screen flex items-center justify-center ">
        <form action="/register" method="post" class="max-w-sm w-full bg-white p-5 rounded-xl border dark:bg-gray-800">
            <h1 class="text-center font-semibold text-xl mb-3 dark:text-white">MyProfile</h1>
            @csrf
            <div class="mb-5">
                <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                    username</label>
                <input type="text" id="text"
                    class="  border-gray-300 bg-gray-50 border  text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="example" value="{{ auth()->user()->username }}" name="username" readonly />
                @error('username')
                    <div class="text-sm text-red-500">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-5">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                    email</label>
                <input type="email" id="email"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    name="email" value=" {{ auth()->user()->email }}" placeholder="name@example.com" readonly />
                @error('email')
                    <div class="text-sm text-red-500">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            {{-- <div class="mb-5">
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                    password</label>
                <input type="password" id="password"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    name="password" placeholder="********" />
                @error('password')
                    <div class="text-sm text-red-500">
                        {{ $message }}
                    </div>
                @enderror
            </div> --}}
            {{-- <button type="submit"
                class="mb-3 text-white bg-blue-700 hover:bg-blue-800 w-full  focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm m:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button> --}}

        </form>
    </section>
@endsection
