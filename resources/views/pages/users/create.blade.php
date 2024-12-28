@extends('layout.master')
@section('title', 'Create User')
@section('styles')
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 d-flex align-items-strech">
                <div class="card w-100">
                    <div class="card-header">
                        <h3 class="card-title" style="display: inline;">Create User</h3>
                        <a href="{{ route('users.index') }}"
                           class="btn btn-outline-warning float-end">Back</a>
                        <ul>
                            <li>Ensure all required fields are filled out correctly.</li>
                            <li>Choose the appropriate role for the user from the dropdown list.</li>
                            <li>Click the "Create User" button to save changes.</li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('users.store') }}" method="POST">
                            @csrf
                            <div class="form-group" style="margin-bottom: 20px;">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                       placeholder="Enter your name" required>
                                <small id="nameHelp" class="form-text text-muted">Please enter your name.</small>
                            </div>

                            <div class="form-group" style="margin-bottom: 20px;">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                       placeholder="Enter your email" required>
                                <small id="emailHelp" class="form-text text-muted">Please enter your email.</small>
                            </div>

                            <div class="form-group" style="margin-bottom: 20px;">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password"
                                       placeholder="Enter a password" required>
                                <small id="passwordHelp" class="form-text text-muted">Please enter a password.</small>
                            </div>

                            <div class="form-group" style="margin-bottom: 20px;">
                                <label for="role">Role</label>
                                <select class="form-control" id="role" name="role_id" required>
                                    @foreach($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                                <small id="roleHelp" class="form-text text-muted">Please choose a role for the
                                    user.</small>
                            </div>

                            <button class="btn btn-outline-primary float-end" type="submit">Create User</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
@endsection
