@extends('template')
@section('title', $product->name)

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

@section('main')
    @include('navbar')
    <div class="container-fluid">
        <div class="col-md-12 d-flex justify-content-center py-3">
            <div class="col-md-8">
                <h3 class="text-center text-primary mt-3">{{ $product->categoryid->name . ' ' . $product->name }}</h3>

                <div class="col-md-6 mx-auto">
                    <div id="carouselExampleIndicators" class="carousel slide mt-3 border" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                                class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                                aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                                aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            @if (isset($product->file))
                                <div class="carousel-item active col-md-6 ">
                                    <img src="{{ asset($product->file[0]) }}" class="card-img-top border"
                                        style="overflow: hidden;" width="500" height="500" style="object-fit: cover">
                                </div>

                                <div class="carousel-item">
                                    <img src="{{ asset($product->file[1]) }}" class="card-img-top border"
                                        style="overflow: hidden;" width="500" height="500" style="object-fit: cover">
                                </div>

                                <div class="carousel-item">
                                    <img src="{{ asset($product->file[2]) }}" class="card-img-top border"
                                        style="overflow: hidden;" width="500" height="500" style="object-fit: cover">
                                </div>
                            @endif
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>

                <h4 class="text-center text-primary mt-2">R${{ $product->price }}</h4>
                <h4 class="text-center text-primary">{{ $product->quantity }} unidades</h4>
                <h4 class="text-center text-primary">Composição: {{ $product->composition }}</h4>

                <h5 class="text-center text-primary mt-3">Tamanhos disponiveis:</h5>
                <ul class="nav nav-pills d-flex justify-content-center">
                    <li class="nav-item nav-link {{ $product->size == 'PP' ? 'active' : '' }}">PP</li>
                    <li class="nav-item nav-link {{ $product->size == 'P' ? 'active' : '' }}">P</li>
                    <li class="nav-item nav-link {{ $product->size == 'M' ? 'active' : '' }}">M</li>
                    <li class="nav-item nav-link {{ $product->size == 'G' ? 'active' : '' }}">G</li>
                    <li class="nav-item nav-link {{ $product->size == 'GG' ? 'active' : '' }}">GG</li>
                    <li class="nav-item nav-link {{ $product->size == 'EG' ? 'active' : '' }}">EG</li>
                    <li class="nav-item nav-link {{ $product->size == 'EGG' ? 'active' : '' }}">EGG</li>
                </ul>

                <div class="col-md-6 mx-auto d-flex justify-content-end mt-4">
                    <button type="button" class="btn btn-primary mx-3"><i class="bi bi-bag-check"></i> Adicionar ao
                        carrinho</button>
                    <button type="button" class="btn btn-success">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-cash-coin" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0z"></path>
                            <path
                                d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1h-.003zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195l.054.012z">
                            </path>
                            <path
                                d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083c.058-.344.145-.678.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1H1z">
                            </path>
                            <path d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 5.982 5.982 0 0 1 3.13-1.567z"></path>
                        </svg>
                        Comprar
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
