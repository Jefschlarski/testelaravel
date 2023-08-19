<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequestCliente;
use App\Models\Cliente;
use App\Models\Componentes;
use Illuminate\Http\Request;

class ClientesController extends Controller
{   protected $cliente;
    public function __construct(Cliente $cliente)
    {
        $this->cliente = $cliente;
    }

    public function index(Request $request) 
    {   
        $pesquisar = $request->pesquisar;
        $findCliente = $this->cliente->getClientesPesquisarIndex(search: $pesquisar ?? '');
        return view('pages.clientes.paginacao', compact('findCliente'));
    }

    public function delete(Request $request){
        $id = $request->id;
        $buscaRegistro = Cliente::find($id);
        $buscaRegistro->delete();
        return response() -> json(['sucess' => true]);
    }

    //Cadastrar cliente

    public function cadastrarCliente(FormRequestCliente $request){
        if($request->method() == "POST"){
          //cria os dados
           $data = $request->all();
           Cliente::create($data);
           return redirect()->route('cliente.index');
        };
        //mostra os dados
        return view('pages.clientes.create');
    }
    
    //Editar Cliente

    public function atualizarCliente(FormRequestCliente $request, $id){
        if($request->method() == "PUT"){
          //atualizar os dados
           $data = $request->all();
           $buscaRegistro = Cliente::find($id);
           $buscaRegistro->update($data);
           return redirect()->route('cliente.index');
        };
        //mostra os dados
        $findCliente = Cliente::where('id', '=', $id)->first();
        return view('pages.clientes.atualiza', compact('findCliente'));
    }



}
