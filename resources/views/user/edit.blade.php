@extends('layout.master')

@section('title', 'Create User')

@section('content')
    <div class="row "></div>

    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3>User Edit</h3>
                <a href="{{ route('user.index') }}" class="btn-success btn float-end">Back</a>
            </div>
            <div class="card-body">
                <div class="card p-5">
                    <form action="{{ route('user.update') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{ $user->id }}">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Name</span>
                            <input type="text" class="form-control" value="{{ $user->name }}"
                                placeholder="User Full Name" aria-label="name" aria-describedby="basic-addon1"
                                name="name">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Email</span>
                            <input type="text" class="form-control" placeholder="User Email" aria-label="email"
                                aria-describedby="basic-addon1" name="email" value="{{ $user->email }}">
                        </div>





                        <button type="submit" class="btn btn-success ">Update</button>
                    </form>
                </div>

            </div>

        </div>
    </div>

    </div>
@endsection
