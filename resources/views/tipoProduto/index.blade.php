<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index de TipoProduto</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css
    ">
</head>

<body>

    {{-- INICIO CONTAINER --}}

    {{-- ALERT LOGBACK --}}

    <div class="container mt-5">

        @if (isset($message))
        <div class="alert alert-{{ $message[1] }} alert-dismissible fade show" role="alert">
            <strong>{{ $message[0] }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @else
    
    @endif

        <a href="#" class="btn btn-outline-primary">Voltar</a>
        <a href="{{ route('tipoproduto.create') }}" class="btn btn-outline-primary">Criar TipoProduto</a>

        {{-- INICIO TABELA --}}

        <table class="table table-hover mt-5">

            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>

            <tbody>

                {{-- Array e elemento atual --}}
                @foreach ($tipoProdutos as $tipoProduto)
                    <tr>
                        <th scope="row">{{ $tipoProduto->id }}</th>
                        <td>{{ $tipoProduto->descricao }}</td>
                        <td>
                            <a href="{{ route('tipoproduto.show', $tipoProduto->id) }}"
                                class="btn btn-outline-primary">Mostrar</a>
                            <a href="{{ route('tipoproduto.edit', $tipoProduto->id) }}"
                                class="btn btn-outline-secondary">Editar</a>
                            <a href="#" class="btnRemover btn btn-outline-danger" data-bs-toggle="modal"
                                data-bs-target="#id-modal-destroy"
                                value="{{ route('tipoproduto.destroy', $tipoProduto->id) }}">Deletar</a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>

        {{-- FIM TABELA --}}

    </div>

    {{-- FIM CONTAINER --}}

    <div class="modal fade" id="id-modal-destroy" tabindex="-1" aria-labelledby="id-modal-label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="id-modal-label">Confirmar ação</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Tem certeza que deseja deletar o tipo produto?
                </div>
                <div class="modal-footer">
                    <form method="post" id="id-form-modal-botao-remover" action="">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-outline-danger">Deletar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

<script>
    let arrayBotaoRemover = document.querySelectorAll(".btnRemover");
    let formModalBotaoRemover = document.querySelector("#id-form-modal-botao-remover");

    arrayBotaoRemover.forEach(element => {
        element.addEventListener('click', function() {

            // Imprimindo a ação que chamou e o value
            formModalBotaoRemover.setAttribute("action", this.getAttribute("value"));
        });
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js
"></script>

</html>
