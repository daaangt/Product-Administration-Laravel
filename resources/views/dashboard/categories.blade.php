@extends('template')
@section('main')
    @include('navbar')
    @include('partials')
    <div class="col-md-12 d-flex justify-content-center py-5">
        <div class="col-md-6">
            <form class="form-floating" method="post" action="{{ route('categories.create') }}"
                enctype="multipart/form-data">
                @csrf
                <div class="card shadow">
                    <div class="card-header bg-blue text-white p-3">Cadastrar Categoria</div>

                    <div class="card-body">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="name" placeholder="Nome">
                            <label for="floatingInput" class="text-primary">Nome do categoria</label>
                        </div>

                        <div class="mb-3">
                            <input type="file" class="form-control" name="file" id="file">
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
            <table class="table text-center shadow">
                <thead class="bg-blue text-white">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Criada em</th>
                        <th scope="col">Ultima atualização</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr class="table-light text-blue">
                            <th scope="row">{{ $category->id }}</th>
                            <td>{{ $category->name }}
                                <!-- look button -->
                                <button type="button" id="completed-task" data-bs-toggle="modal"
                                    data-bs-target="#ModalLook{{ $category->id }}"
                                    style="background: none; padding: 0px; border: none;">
                                    <i class="bi bi-eye bi-2x" style="font-size: 25px;"></i>
                                </button>
                                <div class="modal fade" id="ModalLook{{ $category->id }}" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Capa da categoria
                                                    - {{ $category->id }}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body ">
                                                <img width="90%;" class="rounded mx-auto d-block"
                                                    src="{{ asset('categories/' . $category->name . '.jpg') }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            {{--  --}}
                            <td>{{ $category->created_at->format('d/m/Y') }} ás
                                {{ $category->created_at->format('H:i:s') }}</td>
                            <td>{{ $category->updated_at->format('d/m/Y') }} ás
                                {{ $category->updated_at->format('H:i:s') }}</td>

                            <td>
                                <div class="d-flex">
                                    <!-- edit button -->
                                    <button type="button" id="completed-task" data-bs-toggle="modal"
                                        data-bs-target="#Modal{{ $category->id }}"
                                        style="background: none; padding: 0px; border: none;">
                                        <i class="bi bi-pencil bi-2x" style="font-size: 25px;"></i>
                                    </button>

                                    <!-- Modal -->
                                    <form class="form-floating" method="post"
                                        action="{{ route('categories.edit', $category->id) }}"
                                        enctype="multipart/form-data">
                                        @method('PUT')
                                        @csrf
                                        <div class="modal fade" id="Modal{{ $category->id }}" tabindex="-1"
                                            aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Editar categoria
                                                            - {{ $category->id }}</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-floating mb-3">
                                                            <input type="text" class="form-control" name="name"
                                                                placeholder="Nome" value="{{ $category->name }}">
                                                            <label for="floatingInput" class="text-primary">Nome do
                                                                categoria</label>
                                                        </div>

                                                        <div class="mb-3">
                                                            <input type="file" class="form-control" name="file" id="file">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer d-flex justify-content-center">
                                                        <button type="submit" class="btn btn-primary">Salvar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                    <!-- Delete button -->
                                    <button type="button" id="completed-task" data-bs-toggle="modal"
                                        data-bs-target="#ModalConfirm{{ $category->id }}"
                                        style="background: none; padding: 0px; border: none;">
                                        <i class="bi bi-trash bi-2x" style="font-size: 25px;"></i>
                                    </button>

                                    <!-- Modal -->
                                    <form class="form-floating" method="post"
                                        action="{{ route('categories.delete', $category->id) }}">
                                        @method('DELETE')
                                        @csrf
                                        <div class="modal fade py-3" id="ModalConfirm{{ $category->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Deletando a categoria
                                                            {{ $category->id }}</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>

                                                    <div class="py-3">
                                                        Você deseja mesmo apagar a categoria {{ $category->name }}?<br>
                                                    </div>

                                                    <div class="modal-footer d-flex justify-content-center">
                                                        <button type="submit" class="btn btn-primary">Confirmar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
