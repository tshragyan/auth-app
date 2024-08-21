@extends('layout')
@section('content')
    <script src="https://cdn.tailwindcss.com"></script>
    <section class="bg-gray-50 dark:bg-gray-900">
        <div class="px-6 py-8">
            <div
                class="w-full dark:bg-gray-900 rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="flex flex-row justify-between">
                    <h1> Welcome {{$user->name}}</h1>
                    <a data-method="post" href="{{route('logout')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Logout</a>
                </div>


                @if($user->is_admin)
                    <table class="min-w-full border-collapse block md:table">
                        <thead class="block md:table-header-group">
                        <tr class="border border-gray-300 md:border-none block md:table-row">
                            @foreach(\App\Models\User::USERS_LIST_TABLE_PROPERTIES as $property)
                                <th>
                                    {{$property}}
                                </th>
                            @endforeach
                        </tr>
                        </thead>
                        <tbody class="block md:table-row-group">
                        @foreach($users as $user)
                            <tr class="bg-gray-100 border border-gray-300 md:border-none block md:table-row">
                                <td class="p-2 md:border md:border-gray-300 text-left block md:table-cell">{{$user->id}}</td>
                                <td class="p-2 md:border md:border-gray-300 text-left block md:table-cell">{{$user->name}}</td>
                                <td class="p-2 md:border md:border-gray-300 text-left block md:table-cell">{{$user->email}}</td>
                                <td class="p-2 md:border md:border-gray-300 text-left block md:table-cell">{{$user->secret_key}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </section>

@endsection
