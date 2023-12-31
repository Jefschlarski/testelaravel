<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequestProduto;
use App\Models\Componentes;
use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{   
    protected $produto;
    public function __construct(Produto $produto)
    {
        $this->produto = $produto;
    }

    public function index(Request $request) 
    {   
        $pesquisar = $request->pesquisar;
        $findProduto = $this->produto->getProdutosPesquisarIndex(search: $pesquisar ?? '');
        return view('pages.produtos.paginacao', compact('findProduto'));
    }

    public function delete(Request $request){
        $id = $request->id;
        $buscaRegistro = Produto::find($id);
        $buscaRegistro->delete();
        return response() -> json(['sucess' => true]);
    }

    //Cadastrar produto

    public function cadastrarProduto(FormRequestProduto $request){
        if($request->method() == "POST"){
          //cria os dados
           $data = $request->all();
           $componentes = new Componentes();
           $data['valor'] = $componentes->formatacaoMascaraDinheiroDecimal($data['valor']);
           Produto::create($data);
           return redirect()->route('produto.index');
        };
        //mostra os dados
        return view('pages.produtos.create');
    }
    
    //Editar Produto

    public function atualizarProduto(FormRequestProduto $request, $id){
        if($request->method() == "PUT"){
          //atualizar os dados
           $data = $request->all();
           $componentes = new Componentes();
           $data['valor'] = $componentes->formatacaoMascaraDinheiroDecimal($data['valor']);
           $buscaRegistro = Produto::find($id);
           $buscaRegistro->update($data);
           return redirect()->route('produto.index');
        };
        //mostra os dados
        $findProduto = Produto::where('id', '=', $id)->first();
        return view('pages.produtos.atualiza', compact('findProduto'));
    }



}
