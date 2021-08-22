@extends('template')
@section('title', 'Página Inicial')

@section('main')
    @include('navbar')
    <div class="container-fluid">
        <h3 class="card-title text-center text-blue pt-5">Selecione uma categoria:</h3>
        <div class="col-md-12 d-flex justify-content-center">
            <div class="col-md-10 d-flex justify-content-center card-direction">
                @if (!$categories->count())
                    <h5 class="card-title text-center text-blue p-5">Nenhuma categoria ainda foi cadastrada!</h5>
                @else
                    @foreach ($categories as $category)
                        <a href="{{ route('category', $category) }}" style="text-decoration: none;">
                            <div class="col-md-4 mx-4 my-3" style="width: 18rem;">
                                <div class="card shadow bg-blue" style="width: 18rem;">
                                    <img src="{{ asset($category->file) }}" class="card-img-top border"
                                        style="overflow: hidden;" width="300" height="400">

                                    <h5 class="card-title text-center text-white">{{ $category->name }}</h5>
                                </div>
                            </div>
                        </a>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection
