@extends('layouts.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')
    <div class="d-flex justify-content-around pt-3 flex-lg-wrap flex-row ">
        @foreach ($viewData['products'] as $product)
            <div class="card flex-column mt-3 shadow " style="width: 18rem">
                <img src="{{ asset('/storage/img/' . $product->getImage()) }}" class="card-img-top img-fluid rounded mt-5" />
                <div class="card-body">
                    <h5 class="card-title">{{ $product->getName() }}</h5>
                    <p class="card-text"> Price :
                        {{ $product->getPrice() }} $
                    </p>

                    <div class="d-flex justify-content-evenly">
                        <a href="{{ route('product.show', ['id' => $product->getId()]) }}"
                            class="btn bg-primary text-white">Detail</a>
                        <button class="btn btn-primary">
                            <i class="fa-solid fa-cart-shopping"></i>
                        </button>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
@endsection
