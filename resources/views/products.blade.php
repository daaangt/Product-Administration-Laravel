@extends('template')
@section('title', $title)

@section('main')
    @include('navbar')
    <div class="container-fluid">
        <h3 class="card-title text-center text-blue pt-5">Selecione um produto:</h3>
        <div class="col-md-12 d-flex justify-content-center">
            <div class="col-md-10 d-flex justify-content-center card-direction">
                @if(!$products->count())
                    <h5 class="card-title text-center text-blue p-5">Nenhum item ainda foi cadastrado nesta categoria!</h5>
                @else
                    @foreach ($products as $product)
                         <a href="{{ route('product', $product) }}" style="text-decoration: none;">
                            <div class="col-md-4 mx-4 my-3" style="width: 18rem;">
                                <div class="card shadow bg-blue" style="width: 18rem;">
                                    <img src="{{ asset($product->file[2]) }}" class="card-img-top border"
                                        style="overflow: hidden;" width="300" height="400" style="object-fit: cover">

                                    <h5 class="card-title text-center text-white">{{ $product->name }}</h5>
                                </div>
                            </div>
                        </a>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection
