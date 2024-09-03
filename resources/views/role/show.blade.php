@extends('layout.master')

@section('title', 'View User')

@section('content')
    <div class="row ">
    </div>

    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3>User Role Asign</h3>
                <a href="{{ route('role.index') }}" class="btn-success btn float-end">Back</a>
            </div>
            <div class="card-body">
                <div class="card p-5">
                    <h4>Role Name: {{ $role->role_name }}</h4>

                    <h5>User Current Users in this Role :
                        @if ($role->users->isNotEmpty())
                            @foreach ($role->users as $user)
                                <span class="bg-light border border-info rounded p-1"
                                    role="button">{{ $user->name }}</span>
                            @endforeach
                        @else
                            <span>No users assigned.</span>
                        @endif
                    </h5>
                    <hr>


                    <form action="{{ route('role.updaterole') }}" method="POST">
                        @csrf
                        @method('POST')
                        <input type="hidden" name="id" value="{{ $role->id }}">

                        @if ($users->isNotEmpty())
                            @foreach ($users as $user)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="{{ $user->id }}"
                                        name="user[]">
                                    <label class="form-check-label">
                                        {{ $user->name }}
                                    </label>
                                </div>
                            @endforeach
                        @else
                            <p>No User found</p>
                        @endif

                        <button type="submit" class="btn btn-success ">Assign Role</button>
                    </form>






                </div>

            </div>

        </div>
    </div>

    </div>
@endsection
