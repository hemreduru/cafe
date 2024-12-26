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
                                    <h3 class="card-title" style="display: inline;">Edit User</h3>
                                    <a href="{{ route('users.index') }}"
                                       class="btn btn-outline-warning float-end">Back</a>
                                    <div class="">
                                        <ul>
                                            <li>Ensure all required fields are filled out correctly.</li>
                                            <li>Choose the appropriate role for the user from the dropdown list.</li>
                                            <li>Click the "Update" button to save changes.</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card m-3">
                                    <div class="card-body">
                                        <form action="{{ route('users.update', $user->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group" style="margin-bottom: 20px;">
                                                <label for="name">Name</label>
                                                <input type="text" class="form-control" id="name" name="name"
                                                       value="{{ $user->name }}" aria-describedby="nameHelp">
                                                <small id="nameHelp" class="form-text text-muted">Please enter your
                                                    name.</small>
                                            </div>
                                            <div class="form-group" style="margin-bottom: 20px;">
                                                <label for="email">Email</label>
                                                <input type="email" class="form-control" id="email" name="email"
                                                       value="{{ $user->email }}" aria-describedby="emailHelp">
                                                <small id="emailHelp" class="form-text text-muted">Please enter your
                                                    email.</small>
                                            </div>
                                            <div class="form-group" style="margin-bottom: 20px">
                                                <label for="password">Password</label>
                                                <input type="password" class="form-control" id="password"
                                                       name="password"
                                                       aria-describedby="passwordHelp">
                                                <small id="passwordHelp" class="form-text text-muted">Please enter your
                                                    password.</small>
                                            </div>
                                            <div class="form-group" style="margin-bottom: 20px;">
                                                <label for="role">Role</label>
                                                <select class="form-control" id="role" name="role_id"
                                                        aria-describedby="roleHelp">
                                                    @foreach($roles as $role)
                                                        <option
                                                            value="{{ $role->id }}" {{ $user->role_id == $role->id ? 'selected' : '' }}>{{ $role->name }}</option>
                                                    @endforeach
                                                </select>
                                                <small id="roleHelp" class="form-text text-muted">Please choose
                                                    role</small>
                                            </div>
                                            <button class="btn btn-outline-success float-end" type="submit">Update
                                            </button>
                                        </form>
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
