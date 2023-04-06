<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Criar Tipo produto</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css
    ">
</head>

<body style="background-color: rgb(194, 209, 216)">
    
    <div class="container mt-5 shadow p-5 bg-light rounded">
        
        <h3 class="text-center mb-5">Criar tipo produto</h3>
        <hr class="mb-5">
        
          <form method="POST" action="{{route("tipoproduto.store")}}">
            
            {{-- Permite gerar informações, passando pela segurança. --}}
            @csrf 

            <div class="mb-3">
              <label for="id-input-id" class="form-label ">ID</label>
              <input disabled type="text" class="form-control" id="id-input-id" placeholder="Automaticamente gerado">
            </div>

            <div class="mb-3">
              <label for="descricao-input-descricao" class="form-label">Descrição</label>
              <input type="text" class="form-control" id="descricao-input-descricao" placeholder="Insira uma descrição" name="descricao">
            </div>

            <button type="submit" class="btn btn-outline-primary mt-3">Salvar</button>
            <a href="{{route("tipoproduto.index")}}" class="btn btn-outline-danger mt-3">Cancelar</a>

          </form>

        
        
    </div>
 

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js
"></script>

</html>