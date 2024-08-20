@extends('layout')
@section('content')
    <h1> Welcome {{$user->name}}</h1>

    <a data-method="post" href="{{route('logout')}}" class="btn btn-blue">Logout</a>

    @if($user->is_admin)
        <table class="table-auto">
            <thead>
            <tr>
                @foreach(\App\Models\User::USERS_LIST_TABLE_PROPERTIES as $property)
                    <th>
                        {{$property}}
                    </th>
                @endforeach
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->secret_key}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@endsection
