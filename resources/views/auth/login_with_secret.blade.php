@extends('layout')
@section('content')
    <section class="bg-gray-50 dark:bg-gray-900">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">

                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Sign in to account
                    </h1>

                    <form class="space-y-4 md:space-y-6" action="{{ route('login-with-secret') }}" method="POST">
                        @csrf

                        <div>
                            <label for="id_input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ID</label>
                            <input type="number" name="id" id="id_input" value="{{ old('id') }}" placeholder="" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>

                        @if ($errors->has('id'))
                            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                                {{ $errors->first('id') }}
                            </div>
                        @endif
                        <div>
                            <label for="secret_key" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your Secret Key</label>
                            <input type="text" name="secret_key" value="{{ old('secret_key') }}" id="secret_key" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                        </div>

                        @if ($errors->has('secret_key'))
                            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                                {{ $errors->first('secret_key') }}
                            </div>
                        @endif

                        <button type="submit" class="w-full hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Sign in</button>
                    </form>

                    <a href="{{ route('login') }}">Login with email</a>
                </div>
            </div>
        </div>
    </section>
@endsection
