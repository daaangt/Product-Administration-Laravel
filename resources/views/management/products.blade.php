@extends('template')
@section('main')
    @include('navbar')
    @include('partials')
    <div class="col-md-12 d-flex justify-content-center">
        <div class="col-md-6">
            <form class="form-floating" method="post" action="{{ route('products.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="card shadow">
                    <div class="card-header bg-blue text-white p-3">Cadastrar Produtos</div>
                    <div class="card-body">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="name" placeholder="Nome">
                            <label for="floatingInput" class="text-primary">Nome do produto</label>
                        </div>

                        <div class="form-floating mb-3">
                            <select class="form-select" name="categories_id" placeholder="Categoria"
                                aria-label="Floating label select">
                                <option selected>Selecione uma categoria</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            <label for="floatingInput" class="text-primary">Categoria</label>
                        </div>

                        <div class="form-floating mb-3">
                            <select class="form-select" name="size" placeholder="Tamanho"
                                aria-label="Floating label select">
                                <option selected>Selecione uma categoria</option>
                                    <option value="PP">PP</option>
                                    <option value="P">P</option>
                                    <option value="M">M</option>
                                    <option value="G">G</option>
                                    <option value="GG">GG</option>
                                    <option value="EG">EG</option>
                                    <option value="EGG">EGG</option>
                            </select>
                            <label for="floatingInput" class="text-primary">Tamanho</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" name="quantity" placeholder="Quantidade">
                            <label for="floatingInput" class="text-primary">Quantidade</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" name="price" placeholder="Preço" step=".01">
                            <label for="floatingInput" class="text-primary">Preço (R$)</label>
                        </div>

                        <div class="mb-3">
                            <input type="file" class="form-control" name="file[]" id="file" multiple>
                        </div>

                        <div class="form-floating mb-3">
                            <textarea class="form-control" placeholder="Composição do produto" name="composition" id="floatingTextarea2" style="height: 100px"></textarea>
                            <label for="floatingTextarea2" class="text-primary">Composição</label>
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
                        <th scope="col">Código</th>
                        <th scope="col">Nome do produto</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Quantidade</th>
                        <th scope="col">Preço</th>
                        <th scope="col">Composição</th>
                        <th scope="col">Tamanho</th>
                        <th scope="col">Criada em</th>
                        <th scope="col">Ultima atualização</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr class="table-light text-blue">
                            <th scope="row">{{ $product->id }}</th>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->categoryid->name }}</td>
                            <td>{{ $product->quantity }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->composition }}</td>
                            <td>{{ $product->size }}</td>
                            <td>{{ $product->created_at->format('d/m/Y') }} ás
                                {{ $product->created_at->format('H:i:s') }}</td>
                            <td>{{ $product->updated_at->format('d/m/Y') }} ás
                                {{ $product->updated_at->format('H:i:s') }}</td>
                            <td>
                                <div class="d-flex">
                                    <!-- edit button -->
                                    <button type="button" id="completed-task" data-bs-toggle="modal" data-bs-target="#Modal{{$product->id}}"
                                        style="background: none; padding: 0px; border: none;">
                                        <i class="bi bi-pencil bi-2x" style="font-size: 25px;"></i>
                                    </button>

                                    <!-- Modal -->
                                    <form class="form-floating" method="post"
                                        action="{{ route('products.update', $product->id) }}">
                                        @method('PUT')
                                        @csrf
                                        <div class="modal fade" id="Modal{{$product->id}}" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Editar Produto
                                                            - {{ $product->id }}</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-floating mb-3">
                                                            <input type="text" class="form-control" value="{{ $product->name }}" name="name" placeholder="Nome">
                                                            <label for="floatingInput" class="text-primary">Nome do produto</label>
                                                        </div>

                                                        <div class="form-floating mb-3">
                                                            <select class="form-select" name="categories_id" placeholder="Categoria"
                                                                aria-label="Floating label select">
                                                                <option></option>
                                                                @foreach ($categories as $category)
                                                                    <option
                                                                    @if($category->name == $product->categoryid->name)
                                                                        selected
                                                                    @endif
                                                                    value="{{ $category->id }}">{{ $category->name }}</option>
                                                                @endforeach
                                                            </select>
                                                            <label for="floatingInput" class="text-primary">Categoria</label>
                                                        </div>

                                                        <div class="form-floating mb-3">
                                                            <select class="form-select" name="size" placeholder="Tamanho"
                                                                aria-label="Floating label select">
                                                                <option @if($product->size == "PP") selected @endif value="PP">PP</option>
                                                                <option @if($product->size == "P") selected @endif value="P">P</option>
                                                                <option @if($product->size == "M") selected @endif value="M">M</option>
                                                                <option @if($product->size == "G") selected @endif value="G">G</option>
                                                                <option @if($product->size == "GG") selected @endif value="GG">GG</option>
                                                                <option @if($product->size == "EG") selected @endif value="EG">EG</option>
                                                                <option @if($product->size == "EGG") selected @endif value="EGG">EGG</option>
                                                            </select>
                                                            <label for="floatingInput" class="text-primary">Tamanho</label>
                                                        </div>

                                                        <div class="form-floating mb-3">
                                                            <input type="number" class="form-control" value="{{ $product->quantity }}" name="quantity">
                                                            <label for="floatingInput" class="text-primary">Quantidade</label>
                                                        </div>

                                                        <div class="form-floating mb-3">
                                                            <input type="number" class="form-control" value="{{ $product->price }}" name="price" step=".01">
                                                            <label for="floatingInput" class="text-primary">Preço (R$)</label>
                                                        </div>

                                                        <div class="form-floating mb-3">
                                                            <textarea class="form-control" name="composition" id="floatingTextarea2" style="height: 100px">{{ $product->composition }}</textarea>
                                                            <label for="floatingTextarea2" class="text-primary">Composição</label>
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
                                        data-bs-target="#ModalConfirm{{$product->id}}"
                                        style="background: none; padding: 0px; border: none;">
                                        <i class="bi bi-trash bi-2x" style="font-size: 25px;"></i>
                                    </button>

                                    <!-- Modal -->
                                    <form class="form-floating" method="post"
                                        action="{{ route('products.destroy', $product->id) }}">
                                        @method('DELETE')
                                        @csrf
                                        <div class="modal fade py-3" id="ModalConfirm{{$product->id}}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header pb-3">
                                                        <h5 class="modal-title" id="exampleModalLabel">Deletando o produto
                                                            {{ $product->id }}</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>

                                                    <div class="py-3">
                                                        Você deseja mesmo apagar o produto {{ $product->name }}?<br>
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
