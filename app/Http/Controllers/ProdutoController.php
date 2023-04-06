<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Tipoproduto;
use DB;
use PhpParser\Node\Stmt\TryCatch;
use Throwable;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $produtos = DB::select('SELECT produtos.*, Tipo_Produtos.descricao AS tipo_produto_descricao 
        FROM produtos 
        JOIN Tipo_Produtos 
        ON produtos.Tipo_Produtos_id = Tipo_Produtos.id');

            return view("Produto/index")->with("produtos", $produtos);
        } catch (\Throwable $th) {
            return $this->indexMessage($th->getMessage(), "danger");
        }
    }

    /**
     * Método que recebe mensagem de erro e imprime na tela
     */

    public function indexMessage($message)
    {
        try {
            $produtos = DB::select('SELECT produtos.*, Tipo_Produtos.descricao AS tipo_produto_descricao 
        FROM produtos 
        JOIN Tipo_Produtos 
        ON produtos.Tipo_Produtos_id = Tipo_Produtos.id');

            return view("Produto/index")->with("produtos", $produtos)->with("message", $message);
        } catch (\Throwable $th) {

            return view("Produto/index")->with("produtos", [])->with("message", [$th->getMessage(), "danger"]);
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            $tipoprodutos = TipoProduto::all();
            return view("produto/create")->with("tipoprodutos", $tipoprodutos);
        } catch (\Throwable $th) {
            return $this->indexMessage($th->getMessage(), "danger");
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {

            $produto = new Produto(); // Novo objeto (lembrar use)
            $produto->nome = $request->nome;
            $produto->preco = $request->preco;
            $produto->Tipo_Produtos_id = $request->Tipo_Produtos_id;
            $produto->ingredientes = $request->ingredientes;
            $produto->urlImage = $request->urlImage;
            $produto->save();
            return $this->indexMessage(["Produto cadastrado com sucesso", "success"]); // Chama e reconstroi a página index

        } catch (\Throwable $th) {
            return $this->indexMessage($th->getMessage(), "danger");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {

            $produto = DB::select(
                'SELECT produtos.*, Tipo_Produtos.descricao  
            FROM produtos 
            JOIN Tipo_Produtos 
            ON produtos.Tipo_Produtos_id = Tipo_Produtos.id    
            where produtos.id = ?',
                [$id]
            );

            // Caso não tenha um produto, o array é vazio.
            if (count($produto) <= 0) {
                return $this->indexMessage(["Produto não encontrado", "warning"]);
            }

            return view("produto/show")->with("produto", $produto[0]);
        } catch (\Throwable $th) {
            // Sempre que encontrar um produto ele estará na posição 0 
            return $this->indexMessage([$th->getMessage(), "danger"]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $produto = Produto::find($id);
            $tipoProdutos = TipoProduto::all();

            // Carrego a view edit criando a variavel produto.
            if (isset($produto)) {
                return view("produto/edit")->with("produto", $produto)->with("TipoProdutos", $tipoProdutos);
            } else {
                return $this->indexMessage(["Produto não encontrado", "warning"]);
            }
        } catch (Throwable $th) {
            return $this->indexMessage([$th->getMessage(), "danger"]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        try {
            $produto = Produto::find($id);
            if (isset($produto)) {
                $produto->nome = $request->nome;
                $produto->preco = $request->preco;
                $produto->Tipo_Produtos_id = $request->Tipo_Produtos_id;
                $produto->ingredientes = $request->ingredientes;
                $produto->urlImage = $request->urlImage;
                $produto->update();
                return $this->indexMessage(["Produto cadastrado com sucesso", "danger"]);
            } else {
                return $this->indexMessage(["Produto não encontrado", "danger"]);
            }
        } catch (\Throwable $th) {
            return $this->indexMessage([$th->getMessage(), "danger"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $produto = Produto::find($id);

            if (isset($produto)) {
                $produto->delete();
                return $this->indexMessage(["Produto removido com sucesso", "success"]);
            } else {
                return $this->indexMessage(["Produto não encontrado", "danger"]);
            }
        } catch (\Throwable $th) {
            return $this->indexMessage([$th->getMessage(), "danger"]);
        }
    }
}
