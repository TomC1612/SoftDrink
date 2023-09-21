@extends('layouts.admin')
@section('title', $viewData['title'])
@section('content')
    <div class="card">

        <div class="card-header">
            <div class="row">
                <div class="col-lg-6">
                    <span> Manage Users</span>
                </div>
                <div class="col-lg-6 d-flex justify-content-end">
                    <a href="{{ route('admin.user.create') }}" class="btn btn-primary">Add</a>
                </div>
            </div>


        </div>


        <div class="card-body">
            <table class="table table-bordered table-striped">
                <!-- load tablelist of products from here -->
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Role</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($viewData['users'] as $user)
                            @isset($user)
                                <tr>
                                    <td>{{ $user->getId() }}</td>
                                    <td>{{ $user->getName() }}</td>
                                    <td>{{ $user->getRole() }}</td>
                                    <td><a href="{{ route('admin.user.edit', ['id' => $user->getId()]) }}"
                                            class="btn btn-success">
                                            <i class="fa-solid fa-pen-to-square"></i></a></td>
                                    <td><button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endisset
                        @endforeach
                    </tbody>
                </table>
            </table>
        </div>
    </div>
    <!-- Add Modal -->
    {{-- <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="AddModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add new Product</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Error Detection -->
                    @if ($errors->any())
                        <ul class="alert alert-danger list-unstyled">
                            @foreach ($errors->all() as $error)
                                <li>- {{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <!-- Form input field -->
                    <form method="POST" action="{{ route('admin.user.create') }}" enctype="multipart/form-data">
                        @csrf
                        <!-- add form controls to create product -->
                        <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Name:</label>
                        <div class="col-lg-10 col-md-6 col-sm-12">
                            <input name="name" value="{{ old('name') }}" type="text" class="form-control">
                        </div>
                        <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Email:</label>
                        <div class="col-lg-10 col-md-6 col-sm-12">
                            <input name="email" value="{{ old('price') }}" type="email" class="form-control">
                        </div>
                        <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Role:</label>
                        <div class="col-lg-10 col-md-6 col-sm-12">
                            <select name="role" id="" class="form-select">

                                @foreach ($viewData['users'] as $user)
                                    <option value="{{ $user->getRole() }}"
                                        {{ $viewData['users']->getRole == $user->getRole() ? 'selected' : '' }}>
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Password:</label>
                        <div class="col-lg-10 col-md-6 col-sm-12">
                            <input name="password" value="{{ old('price') }}" type="password" class="form-control">
                        </div>


                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>

                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div> --}}

    <!-- Delete Modal-->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Confirn Delete </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @isset($user)
                        <form action="{{ route('admin.user.delete', $user->getId()) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <span>Are you sure want to delete this user {{ $user->getName() }} ?</span>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-danger">Confirn</button>
                            </div>
                        </form>
                    @endisset

                </div>

            </div>
        </div>
    </div>
    <!-- Edit  Modal -->
    {{-- <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="EditModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit User : {{ $user->getName() }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">


                    <div class="card-body">
                        @if ($errors->any())
                            <ul class="alert alert-danger list-unstyled">
                                @foreach ($errors->all() as $error)
                                    <li>- {{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif


                        <form method="POST" action="{{ route('admin.user.update', $user->getId()) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')




                            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Name:</label>
                            <div class="col-lg-10 col-md-6 col-sm-12">
                                <input name="name" value="{{ $user->getName() }}" type="text" class="form-control">
                            </div>
                            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Email:</label>
                            <div class="col-lg-10 col-md-6 col-sm-12">
                                <input name="email" value="{{ $user->getEmail() }}" type="email" class="form-control">
                            </div>
                            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Role:</label>
                            <div class="col-lg-10 col-md-6 col-sm-12">
                                <select name="role" id="" class="form-select">
                                    <option value="admin">Admin</option>
                                    <option value="client">Client</option>
                                </select>
                            </div>
                            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Password:</label>
                            <div class="col-lg-10 col-md-6 col-sm-12">
                                <input name="password" " type="password"
                                                                    class="form-control">
                                                            </div>


                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Submit</button>

                                                            </div>
                                                        </form>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div> --}}

@endsection
