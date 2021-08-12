@extends('template')
@section('main')
    @include('navbar')
    <div class="col-md-12 d-flex justify-content-center bg-light py-5">
        <div class="col-md-6">
            <form class="form-floating">
                @csrf
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

    <div class="col-md-12 d-flex justify-content-center">
        <div class="col-md-8">
            <table class="table table-striped text-center">
                <thead class="bg-blue">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nome da categoria</th>
                        <th scope="col">Criada em</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <th scope="row">{{ $category->id }}</th>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->created_at }}</td>

                            <td>
                                <a href="#"><i class="bi bi-pencil bi-2x" style="font-size: 25px;"></i></a>
                                <a href="#"><i class="bi bi-trash bi-2x" style="font-size: 25px;"></i></a>
                            </td>
                            {{-- do a delete route to $category->id --}}
                            {{-- do a update route to $category->id --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
