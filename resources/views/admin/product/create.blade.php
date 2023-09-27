@extends('layouts.admin')

@section('title', $viewData['title'])
@section('content')
    <div class="form-control d-flex justify-content-center shadow">
        @isset($viewData['message'])
            <h3>{{ $message }}</h3>
        @endisset
        <!-- Error Detection -->
        @if ($errors->any())
            <ul class="alert alert-danger list-unstyled">
                @foreach ($errors->all() as $error)
                    <li>- {{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <!-- Form input field -->
        <form method="POST" action="{{ route('admin.product.save') }}" enctype="multipart/form-data">
            @csrf
            <!-- add form controls to create product -->
            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Brand:</label>
            <div class="col-lg-10 col-md-6 col-sm-12">
                <input name="brand" value="{{ old('brand') }}" type="text" class="form-control">
            </div>
            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Name:</label>
            <div class="col-lg-10 col-md-6 col-sm-12">
                <input name="name" value="{{ old('name') }}" type="text" class="form-control">
            </div>
            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Price:</label>
            <div class="col-lg-10 col-md-6 col-sm-12">
                <input name="price" value="{{ old('price') }}" type="number" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea class="form-control" name="description" rows="3">{{ old('description') }}
     </textarea>
            </div>

            <div class="col">
                <div class="mb-3 row">
                    <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Image:</label>
                    <div class="col-lg-10 col-md-6 col-sm-12">
                        <input class="form-control" type="file" name="image">
                    </div>
                </div>
            </div>
            <div class="col">
                &nbsp;
            </div>


            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>


        </form>
    </div>






@endsection
