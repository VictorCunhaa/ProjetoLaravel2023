<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoProduto;
use DB;
use Throwable;

class TipoProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipoProdutos = DB::select('select * from Tipo_Produtos');
        return view("TipoProduto/index")->with("tipoProdutos", $tipoProdutos);
    }

    public function indexMessage($message)
    {
        try {
            $tipoProdutos = DB::select('select * from Tipo_Produtos');
            return view("TipoProduto/index")->with("tipoProdutos", $tipoProdutos)->with("message", $message);
        } catch (\Throwable $th) {
            return view("TipoProduto/index")->with("tipoProdutos", [])->with("message", [$th->getMessage(), "danger"]);
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
            return view("TipoProduto/create");
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
            $tipoProduto = new TipoProduto(); // Novo objeto (lembrar use)
            $tipoProduto->descricao = $request->descricao;
            $tipoProduto->save();
            return $this->indexMessage(["Tipo Produto cadastrado com sucesso", "success"]); // Chama e reconstroi a página index
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
            $tipoproduto = DB::select(
                'SELECT *
                FROM tipo_produtos 
                WHERE id = ?',
                [$id]
            );

            // Caso não tenha um tipo produto, o array é vazio.
            if (count($tipoproduto) <= 0)
                return $this->indexMessage(["Tipo Produto não encontrado", "warning"]); // Chama e reconstroi a página index

            // Sempre que encontrar um produto ele estará na posição 0 
            else
                return view("tipoProduto/show")->with("tipoproduto", $tipoproduto[0]);
        } catch (\Throwable $th) {
            return $this->indexMessage($th->getMessage(), "danger");
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
        try{
            $tipoproduto = TipoProduto::find($id);
    
            // Carrego a view edit criando a variavel produto.
            if (isset($tipoproduto)) {
                return view("tipoProduto/edit")->with("tipoproduto", $tipoproduto);
            } else {
                return $this->indexMessage(["Tipo Produto não encontrado", "warning"]);
            }
        } catch(\Throwable $th){
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
        try{
            $tipoproduto = TipoProduto::find($id);
            if (isset($tipoproduto)) {
                $tipoproduto->descricao = $request->descricao;
                $tipoproduto->update();
                return $this->indexMessage(["Tipo produto editado com sucesso", "success"]);
            } else {
                return $this->indexMessage(["Tipo produto não econtrado", "warning"]);
            }
        } catch(\Throwable $th){
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
            $tipoProdutos = TipoProduto::find($id);

            if (isset($tipoProdutos)) {
                $tipoProdutos->delete();
                return $this->indexMessage(["Tipo Produto removido com sucesso", "success"]);
            } else {
                return $this->indexMessage(["Tipo Produto não encontrado", "danger"]);
            }
        } catch (\Throwable $th) {
            return $this->indexMessage([$th->getMessage(), "danger"]);
        }
    }
}
