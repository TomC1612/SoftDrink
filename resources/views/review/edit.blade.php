@extends('layouts.app')
@section('title', $viewData['title'])

@section('content')

    <div class="form-control d-flex justify-content-center shadow">
        <div class="col-md-4">
            <img src="{{ asset('/storage/img/' . $viewData['product']->getImage()) }}" class="img-fluid rounded-start">
        </div>


        <!-- Form input field -->
        <form method="POST" action="{{ route('review.update', ['id' => $viewData['product']->getId()]) }}"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <!-- add form controls to create product -->
            <div class="mb-3">
                <label class="form-label">Rating 1 - 5 Star:</label>
                <input name="rating" value="{{ $viewData['review']->getRating() }}" type="number" class="form-control" min="1"
                    max="5">
            </div>


            <div class="mb-3">
                <label class="form-label">Your comment</label>
                <textarea class="form-control" name="content" rows="3" placeholder="{{ $viewData['review']->getContent() }}">
            </textarea>
            </div>


            <div class="col">
                &nbsp;
            </div>


            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>


        </form>
    </div>
    <!-- Error Detection -->
    @if ($errors->any())
        <ul class="alert alert-danger list-unstyled">
            @foreach ($errors->all() as $error)
                <li>- {{ $error }}</li>
            @endforeach
        </ul>
    @endif


@endsection
