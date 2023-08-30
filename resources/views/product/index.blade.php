@extends('layouts.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')
    <div class="d-flex justify-content-around pt-3 flex-lg-wrap">
        @foreach ($viewData['products'] as $product)
            <div class="card" style="width: 18rem">
                <img src="{{ $product->getImage() }}" class="card-img-top img-fluid rounded" alt="..." />
                <div class="card-body">
                    <h5 class="card-title">{{ $product->getName() }}</h5>
                    <p class="card-text">
                        {{ $product->getPrice() }}
                    </p>
                    <div class="d-flex justify-content-evenly">
                        <button type="button" class="btn btn-primary">Buy Now</button>
                        <button class="btn btn-primary">
                            <i class="fa-solid fa-cart-shopping"></i>
                        </button>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
@endsection
