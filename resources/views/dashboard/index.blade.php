@extends('template')
@section('main')
    @include('navbar')
    <div class="col-md-12 d-flex justify-content-center bg-light py-5 h-100">
        <div class="col-md-6">
            <form class="form-floating">
                <div class="card shadow">
                    <div class="card-header bg-blue text-white p-3">Cadastrar Categoria</div>
                    <div class="card-body">
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingInput" placeholder="Exemplo">
                            <label for="floatingInput" class="text-primary">Nome</label>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn bg-blue text-white text-center">Cadastrar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
