@extends('layout.master')

@section('title', 'Create Role')

@section('content')
    <div class="row"></div>

    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3>User Rolr</h3>
                <a href="{{ route('role.index') }}" class="btn-success btn float-end">Back</a>
            </div>
            <div class="card-body">
                <div class="card p-5">
                    <form action="{{ route('role.store') }}" method="POST">
                        @csrf
                        @method('POST')

                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Role Name</span>
                            <input type="text" class="form-control" value="{{ old('role_name') }}"
                                placeholder="Role Name" aria-label="role_name" aria-describedby="basic-addon1"
                                name="role_name">
                        </div>






                        <button type="submit" class="btn btn-success ">Create</button>
                    </form>
                </div>

            </div>

        </div>
    </div>

    </div>
@endsection
