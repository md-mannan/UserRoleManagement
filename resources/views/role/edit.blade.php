@extends('layout.master')

@section('title', 'Create Role')

@section('content')
    <div class="row "></div>

    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3>User Edit</h3>
                <a href="{{ route('role.index') }}" class="btn-success btn float-end">Back</a>
            </div>
            <div class="card-body">
                <div class="card p-5">
                    <form action="{{ route('role.update') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{ $role->id }}">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Role Name</span>
                            <input type="text" class="form-control" value="{{ $role->name }}"
                                placeholder="User Full Name" aria-label="name" aria-describedby="basic-addon1"
                                name="name">
                        </div>






                        <button type="submit" class="btn btn-success ">Update</button>
                    </form>
                </div>

            </div>

        </div>
    </div>

    </div>
@endsection
