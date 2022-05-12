@extends('layout')

@section('body')
<table class="table table-hover">
    <thead>
        <tr>
            <th>Name</th>
            <th>Username</th>
            <th>email</th>
            <th>phone</th>
            <th>website</th>
            <th>company</th>
            <th>address</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    @foreach($users AS $user)
        <tr>
            <td>{{$user->name}}</td>
            <td>{{$user->username}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->phone}}</td>
            <td>{{$user->website}}</td>
            <td>{{$user->company->name}}</td>
            <td>{{$user->address->fullAddress()}}</td>
            <td>
                <a class="btn btn-primary" href="{{url('/my-post/' . $user->id)}}">My Post</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
