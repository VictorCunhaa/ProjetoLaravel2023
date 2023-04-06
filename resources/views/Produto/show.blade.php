<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vizualizar produto</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css
    ">
</head>

<body style="background-color: rgb(194, 209, 216)">

    <div class="container mt-5 mb-5 shadow p-5 bg-light rounded">

        <h3 class="text-center mb-5">Vizualizar produto</h3>
        <hr class="mb-5">

        <div class="row">

            <div class="mb-3 col-6 col-md-3">
                <label for="id-input-id" class="form-label ">ID</label>
                <input disabled type="text" class="form-control" id="id-input-id" value="{{ $produto->id }}">
            </div>

            <div class="mb-3 col-6 col-md-3">
                <label for="tipo-input-tipo" class="form-label">Tipo</label>
                <input type="text" class="form-control" id="id-input-tipo" value="{{ $produto->descricao }}"
                    disabled>
            </div>

            <div class="mb-3 col-md-6">
                <label for="nome-input-nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="id-input-nome" value="{{ $produto->nome }}" disabled>
            </div>

            

            <div class="mb-3 col-4">
                <label for="preco-input-preco" class="form-label">Preço</label>
                <input type="number" class="form-control" id="id-input-preco" value="{{ $produto->preco }}" disabled>
            </div>

            <div class="mb-3 col-8">
                <label for="ingredientes-input-ingredientes" class="form-label">Ingredientes</label>
                <input type="text" class="form-control" id="id-input-ingredientes"
                    value="{{ $produto->ingredientes }}" disabled>
            </div>

            <div class="mb-3 col-md-6">
                <label for="urlImage-input-urlImage" class="form-label">URL da imagem</label>
                <input type="text" class="form-control" id="id-input-urlImage" value="{{ $produto->urlImage }}"
                    disabled>
            </div>

            <div class="mb-3 col-md-3">
                <label for="urlImage-input-urlImage" class="form-label">Criado em:</label>
                <input type="text" class="form-control" id="id-input-created_at" value="{{ $produto->created_at }}"
                    disabled>
            </div>

            <div class="mb-3 col-md-3">
                <label for="urlImage-input-urlImage" class="form-label">Editado em:</label>
                <input type="text" class="form-control" id="id-input-updated_at" value="{{ $produto->updated_at }}"
                    disabled>
            </div>

            <a href="{{ route('produto.edit', $produto->id)}}" class="btn btn-outline-primary mt-3">Editar</a>
            <a href="{{ route('produto.index') }}" class="btn btn-outline-danger mt-3">Voltar</a>

        </div>

    </div>

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js
"></script>

</html>
