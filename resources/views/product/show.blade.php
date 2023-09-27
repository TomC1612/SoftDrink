@extends('layouts.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')

    <section class="d-flex justify-content-center align-items-center shadow mt-5">
        <div class="col-md-4">
            <img src="{{ asset('/storage/img/' . $viewData['product']->getImage()) }}" class="img-fluid rounded-start">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title">
                    {{ $viewData['product']->getName() }}
                    (${{ $viewData['product']->getPrice() }})
                    <p class="card-text">{{ $viewData['product']->getDescription() }}</p>

                    <p class="card-text">
                        @auth
                            <a class="btn btn-success"
                                href="{{ route('review.create', ['id' => $viewData['product']->getId()]) }}">Give a
                                Comment</a>
                        @endauth

                    <form action="{{ route('cart.add', ['id' => $viewData['product']->getId()]) }}" method="post">
                        <div class="row">
                            @csrf
                            <div class="col-auto">
                                <div class="input-group col-auto">
                                    <div class="input-group-text">Quantity
                                    </div>
                                    <input type="nnumber" min="1" max="10"class="form-control quality-input"
                                        name="quantity" value="1">
                                </div>
                            </div>
                            <div class="col-auto">
                                <button class="btn btn-primary text-white" type="submit">Add to cart</button>
                            </div>
                        </div>
                    </form>
                    </p>
            </div>
        </div>
    </section>
    <section>
        @foreach ($viewData['comments'] as $comment)
            <div class="card mb-4">
                <div class="card-body">
                    <p class="h3">{{ $comment->getContent() }}</p>

                    <div class="d-flex justify-content-between">
                        <div class="d-flex flex-row align-items-center">

                            <p class="medium mb-0 ms-2">{{ $viewData['UserName'] }}</p>
                        </div>
                        <div class="d-flex flex-row align-items-center">


                            <p class="small text-muted mb-0">{{ $comment->getRating() }} - <i class="fa-solid fa-star"></i>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </section>


@endsection
