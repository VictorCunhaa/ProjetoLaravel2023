<?php

use Illuminate\Support\Facades\Route;
use App\Models\TipoProduto;
use App\Models\Produto;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('teste', function () {
    echo "<html>";
    echo "<h1>Hello World</h1>";
    echo "</html>";
});

Route::get('ola/{nome}/{sobrenome}', function ($nome, $sobrenome) {
    echo "Olá! Seja bem vindo $nome $sobrenome";
});

Route::get('ola/{nome?}', function ($nome = null) {

    if (isset($nome))
        echo "Olá! Seja bem vindo $nome.";

    else
        echo "Olá! Seja bem vindo usuário anônimo.";
});

Route::get('rotacomregra/{nome}/{n}', function ($nome, $n) {

    for ($i = 0; $i < $n; $i++) {
        echo "Olá! Seja bem vindo $nome <br>";
    }
});

Route::prefix('/app')->group(function () {

    Route::get('/', function () {
        echo "página no app";
    });

    Route::get('/user', function () {
        echo "página do usuário";
    });

    Route::get('/admin', function () {
        echo "página do admin";
    });
});

// Verificar o use no topo do arquivo.

Route::get("tipoproduto/add/{descricao}", function($descricao){

    $tipoProduto = new TipoProduto(); // Novo objeto
    $tipoProduto->descricao = $descricao;
    $tipoProduto->save();
    echo 'Dado salvo com sucesso!';
});

Route::get("produto/add/{nome}/{preco}/{Tipo_Produtos_id}/{ingredientes}/{urlImage}",
function($nome, $preco, $Tipo_Produtos_id, $ingredientes, $urlImage){

$produto = new Produto();
$produto->nome = $nome;
$produto->preco = $preco;
$produto->Tipo_Produtos_id = $Tipo_Produtos_id;
$produto->ingredientes = $ingredientes;
$produto->urlImage = $urlImage;

$produto->save();
echo 'Dados salvos com sucesso!';

});

//Quando acessado, o arquivo encaminhara a requisição ao controlador responsável.

// ROTAS TIPO PRODUTO

// route::get("/tipoproduto","\App\Http\Controllers\TipoProdutoController@index")->name("tipoproduto.index");
// route::get("/tipoproduto/create","\App\Http\Controllers\TipoProdutoController@create")->name("tipoproduto.create");
// route::get("/tipoproduto/{id}","\App\Http\Controllers\TipoProdutoController@show")->name("tipoproduto.show");
// route::post("/tipoproduto","\App\Http\Controllers\TipoProdutoController@store")->name("tipoproduto.store");
// route::get("/tipoproduto/{id}/edit","\App\Http\Controllers\TipoProdutoController@edit")->name("tipoproduto.edit");
// route::put("/tipoproduto/{id}","\App\Http\Controllers\TipoProdutoController@update")->name("tipoproduto.update");

Route::resource("tipoproduto", "\App\Http\Controllers\TipoProdutoController");



// ROTAS PRODUTO

// route::get("/produto","\App\Http\Controllers\ProdutoController@index")->name("produto.index");
// route::get("/produto/create","\App\Http\Controllers\ProdutoController@create")->name("produto.create");
// route::get("/produto/{id}","\App\Http\Controllers\ProdutoController@show")->name("produto.show");
// route::post("/produto","\App\Http\Controllers\ProdutoController@store")->name("produto.store");
// route::get("/produto/{id}/edit","\App\Http\Controllers\ProdutoController@edit")->name("produto.edit");
// route::put("/produto/{id}","\App\Http\Controllers\ProdutoController@update")->name("produto.update");
// route::delete("/produto/{id}","\App\Http\Controllers\ProdutoController@destroy")->name("produto.destroy");

Route::resource("produto", "\App\Http\Controllers\ProdutoController");


