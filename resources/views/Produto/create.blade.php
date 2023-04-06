<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Criar produto</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css
    ">
</head>

<body style="background-color: rgb(194, 209, 216)">

    <div class="container mt-5 mb-5 shadow p-5 bg-light rounded">

        <h3 class="text-center mb-5">Criar produto</h3>
        <hr class="mb-5">

        <form method="POST" action="{{route("produto.store")}}" class="row">

            {{-- Permite gerar informações, passando pela segurança. --}}
            @csrf

            {{-- Inicio dos inputs --}}

            <div class="mb-3 col-3">
                <label for="id-input-id" class="form-label ">ID</label>
                <input disabled type="text" class="form-control" id="id-input-id">
            </div>

            <div class="mb-3 col-9">
                <label for="nome-input-nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome-input-nome" placeholder="Insira um nome"
                    name="nome">
            </div>

            <div class="mb-3 col-6">
                <label for="preco-input-preco" class="form-label">Preço</label>
                <input type="number" class="form-control" id="preco-input-preco" name="preco"
                    placeholder="Insira o preço">
            </div>


            <div class="col-6">

                <label for="preco-input-preco" class="form-label">Tipo produto</label>

                <select class="form-select" name="Tipo_Produtos_id" aria-label="Default select example">
                    <option selected>Selecione</option>

                    {{-- Converte o ID para o nome do tipoProduto --}}

                    @foreach ($tipoprodutos as $tipoproduto)
                        <option value="{{ $tipoproduto->id }}">{{ $tipoproduto->descricao }}</option>
                    @endforeach

                </select>

            </div>

            <div class="mb-3">
                <label for="ingredientes-input-ingredientes" class="form-label">Ingredientes</label>
                <input type="text" class="form-control" id="ingredientes-input-ingredientes"
                    placeholder="Insira os ingredientes" name="ingredientes">
            </div>

            <div class="mb-3">
                <label for="urlImage-input-urlImage" class="form-label">URL da imagem</label>
                <input type="text" class="form-control" id="urlImage-input-urlImage"
                    placeholder="Insira a URL da imagem" name="urlImage">
            </div>

            <button type="submit" class="btn btn-outline-primary mt-3">Salvar</button>
            <a href="{{route("produto.index")}}" class="btn btn-outline-danger mt-3">Cancelar</a>

        </form>

    </div>

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js
"></script>

</html>
