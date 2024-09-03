@extends('layout.master')

@section('title', 'Show User with Role')

@section('content')
    <div class="row "></div>

    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3>User with Role</h3>
                <a href="{{ route('role.create') }}" class="btn-success btn float-end">Add new Role</a>

            </div>

            <div class="card-body">

                @if (Session::has('success'))
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                @endif
                @if (Session::has('error'))
                    <div class="alert alert-danger">{{ Session::get('error') }}</div>
                @endif
                <div class="card">


                    <table class="table table-striped m-0">
                        @if ($roles->count() > 0)
                            <thead>
                                <tr>
                                    <th>SL#</th>
                                    <th>Role Name</th>
                                    <th>Assigned User</th>
                                    <th>Actions</th>
                                </tr>

                            </thead>
                            <tbody>

                                @foreach ($roles as $role)
                                    <tr>
                                        <td>{{ $role->id }}</td>
                                        <td>{{ $role->role_name }}</td>
                                        <td>
                                            {{-- {{ $roles }} --}}
                                            @if ($role->users->isNotEmpty())
                                                @foreach ($role->users as $user)
                                                    <span class="bg-light border border-info rounded p-1"
                                                        role="button">{{ $user->name }}</span>
                                                @endforeach
                                            @else
                                                <p>No users assigned.</p>
                                            @endif

                                        </td>
                                        <td>
                                            <form class="d-inline" action="{{ route('role.show') }} " method="POST">
                                                @csrf
                                                @method('POST')
                                                <input type="hidden" value="{{ $role->id }}" name="id">
                                                <button type="submit" class="btn btn-secondary">View</button>
                                            </form>
                                            <form class="d-inline" action="{{ route('role.edit') }} " method="POST">
                                                @csrf
                                                @method('POST')
                                                <input type="hidden" value="{{ $role->id }}" name="id">
                                                <button type="submit" class="btn btn-primary">Edit</button>
                                            </form>

                                            <form class="d-inline" action="{{ route('role.delete') }} " method="POST">
                                                @csrf
                                                @method('POST')
                                                <input type="hidden" value="{{ $role->id }}" name="id">
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>
                        @else
                            <h2 class="alert alert-warning m-0">Role Data Not Found</h2>
                        @endif
                    </table>
                </div>

            </div>

        </div>
    </div>

    </div>
@endsection
