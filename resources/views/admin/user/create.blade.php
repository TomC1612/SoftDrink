@extends('layouts.admin')

@section('title', $viewData['title'])
@section('content')
    <div class="form-control d-flex justify-content-center shadow">
        <!-- Error Detection -->
        @if ($errors->any())
            <ul class="alert alert-danger list-unstyled">
                @foreach ($errors->all() as $error)
                    <li>- {{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <!-- Form input field -->
        <form method="POST" action="{{ route('admin.user.save') }}" enctype="multipart/form-data">
            @csrf
            <!-- add form controls to create product -->
            <div class="mb-3">
                <label class="form-label">Name:</label>

                <input name="name" type="text" class="form-control">

            </div>
            <div class="mb-3">
                <label class="form-label">Email:</label>

                <input name="email" type="email" class="form-control">

            </div>
            <div class="mb-3">
                <label class="form-label">Role:</label>

                <select name="role" id="" class="form-select">
                    <option value="0">Select Role</option>
                    @foreach ($viewData['roles'] as $role)
                        <option value="{{ $role->getRole() }}">
                            {{ $role->getRole() }}
                        </option>
                    @endforeach
                </select>

            </div>
            <div class="mb-3">
                <label class="form-label">Password:</label>

                <input name="password" type="password" class="form-control">

            </div>




            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>


        </form>
    </div>







@endsection
