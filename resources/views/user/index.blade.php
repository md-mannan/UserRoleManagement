@extends('layout.master')

@section('title', 'Show Role with User')

@section('content')
    <div class="row mt-5"></div>

    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3>User with Role</h3>
                <a href="{{ route('user.create') }}" class="btn-success btn float-end">Add new</a>

            </div>

            <div class="card-body">

                @if (Session::has('success'))
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                @endif
                @if (Session::has('error'))
                    <div class="alert alert-danger">{{ Session::get('error') }}</div>
                @endif
                <div class="card">


                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>SL#</th>
                                <th>User Name</th>
                                <th>User Email</th>
                                <th>Role</th>
                                <th>Actions</th>
                            </tr>

                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @foreach ($user->roles as $role)
                                            <span class="bg-light border border-info rounded p-1"
                                                role="button">{{ $role->role_name }}</span>
                                        @endforeach
                                    </td>
                                    <td>
                                        <form class="d-inline" action="{{ route('user.show') }} " method="POST">
                                            @csrf
                                            @method('POST')
                                            <input type="hidden" value="{{ $user->id }}" name="id">
                                            <button type="submit" class="btn btn-secondary">View</button>
                                        </form>
                                        <form class="d-inline" action="{{ route('user.edit') }} " method="POST">
                                            @csrf
                                            @method('POST')
                                            <input type="hidden" value="{{ $user->id }}" name="id">
                                            <button type="submit" class="btn btn-primary">Edit</button>
                                        </form>

                                        <form class="d-inline" action="{{ route('user.delete') }} " method="POST">
                                            @csrf
                                            @method('POST')
                                            <input type="hidden" value="{{ $user->id }}" name="id">
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </div>

    </div>
@endsection
