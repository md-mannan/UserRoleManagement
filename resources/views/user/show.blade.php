@extends('layout.master')

@section('title', 'View User')

@section('content')
    <div class="row ">
    </div>

    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3>User Role Asign</h3>
                <a href="{{ route('user.index') }}" class="btn-success btn float-end">Back</a>
            </div>
            <div class="card-body">
                <div class="card p-5">
                    <h4>User Name: {{ $user->name }}</h4>
                    <h5 class="m-2">User Email: {{ $user->email }}</h5>
                    <h5>User Current Role :
                        @foreach ($user->roles as $role)
                            <span class="bg-light border border-info rounded p-1"
                                role="button">{{ $role->role_name }}</span>
                        @endforeach
                    </h5>
                    <hr>


                    <form action="{{ route('user.updaterole') }}" method="POST">
                        @csrf
                        @method('POST')
                        <input type="hidden" name="id" value="{{ $user->id }}">

                        @foreach ($roles as $role)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="{{ $role->id }}" name="role[]">
                                <label class="form-check-label">
                                    {{ $role->role_name }}
                                </label>
                            </div>
                        @endforeach

                        <button type="submit" class="btn btn-success ">Assign Role</button>
                    </form>






                </div>

            </div>

        </div>
    </div>

    </div>
@endsection
