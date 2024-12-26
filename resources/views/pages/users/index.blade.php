@extends('layout.master')
@section('title', 'Example')
@section('styles')
@endsection
@section('content')
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
         data-sidebar-position="fixed" data-header-position="fixed">
        <div class="body-wrapper">
            <div class="body-wrapper-inner">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 d-flex align-items-strech">
                            <div class="card w-100">
                                <div class="card-header">
                                    <h3 class="card-title">Users</h3>
                                </div>
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <table id="users-table" class="table table-striped table-bordered">
                                            <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Role</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($users as $user)
                                                <tr>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>{{ $user->role->name }}</td>
                                                    <td>
                                                        <a href="{{ route('users.edit', $user->id) }}"
                                                           class="btn btn-primary">Edit</a>
                                                        <form action="{{ route('users.destroy', $user->id) }}"
                                                              method="POST"
                                                              style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
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
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')

@endsection
