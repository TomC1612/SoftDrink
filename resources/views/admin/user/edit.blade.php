@extends('layouts.admin')

@section('title', $viewData['title'])
@section('content')
    <div class="form-control d-flex justify-content-center shadow">
        @if ($errors->any())
            <ul class="alert alert-danger list-unstyled">
                @foreach ($errors->all() as $error)
                    <li>- {{ $error }}</li>
                @endforeach
            </ul>
        @endif


        <form method="POST" action="{{ route('admin.user.update', ['id' => $viewData['user']->getId()]) }}"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')



            <div class="mb-3">
                <label class="form-label">Name:</label>

                <input name="name" value="{{ $viewData['user']->getName() }}" type="text" class="form-control">

            </div>
            <div class="mb-3">
                <label class="form-label">Email:</label>

                <input name="email" value="{{ $viewData['user']->getEmail() }}" type="email" class="form-control">

            </div>
            <div class="mb-3">
                <label class="form-label">Role:</label>

                <select name="role" id="" class="form-select">
                    @foreach ($viewData['roles'] as $role)
                        <option value="{{ $role->getRole() }}"
                            {{ $viewData['user']->getRole() == $role->getRole() ? 'selected' : '' }}>
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
