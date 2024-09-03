@extends('layout.master')

@section('title', 'Show Role with User')
@endsection
@section('content')
<div class="row"></div>
<div class="col-3"></div>
<div class="col-6">
    <div class="card">
        <div class="card-header">

        </div>
        <div class="card-body">
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
                    <tr>
                        <td>1</td>
                        <td>Mannan</td>
                        <td>mdmannan580@gmail.com</td>
                        <td>Admin</td>
                        <td>
                            <a href="" class="btn btn-secondary">View</a>
                            <a href="" class="btn btn-primary">Edit</a>
                            <a href="" class="btn btn-secondary">Delete</a>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>

    </div>
</div>
<div class="col-3"></div>
</div>
@endsection
