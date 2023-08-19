<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequestVenda;
use App\Models\Cliente;
use App\Models\Componentes;
use App\Models\Produto;
use App\Models\Venda;
use Illuminate\Http\Request;

class VendasController extends Controller
{
    protected $venda;
    public function __construct(Venda $venda)
    {
        $this->venda = $venda;
    }

    public function index(Request $request) 
    {   
        $pesquisar = $request->pesquisar;
        $findVenda = $this->venda->getVendasPesquisarIndex(search: $pesquisar ?? '');
        return view('pages.vendas.paginacao', compact('findVenda'));
    }

    //Cadastrar venda

    public function cadastrarVenda(FormRequestVenda $request){
        $findNumeracao = Venda::max('numero_da_venda') +1;
        $findProduto = Produto::all();
        $findCliente = Cliente::all();
        if($request->method() == "POST"){
          //cria os dados
           $data = $request->all();
           $data['numero_da_venda'] = $findNumeracao;
           Venda::create($data);
           return redirect()->route('venda.index');
        };
        //mostra os dados
        return view('pages.vendas.create', compact('findNumeracao' , 'findProduto', 'findCliente'));
    }
    
}
