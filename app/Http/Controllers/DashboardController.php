<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Produto;
use App\Models\Venda;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $totalDeProdutoCadastrado = $this->buscaTotaldeProdutoCadastrado();
        $totalDeClienteCadastrado = $this->buscaTotaldeClienteCadastrado();
        $totalDeVendas = $this->buscaTotaldeVendas();
        return view('pages.dashboard.dashboard', compact('totalDeProdutoCadastrado', 'totalDeClienteCadastrado', 'totalDeVendas'));
    }

    public function buscaTotalDeProdutoCadastrado(){
        $findProduto = Produto::all()->count();
        return $findProduto;
    }
    public function buscaTotalDeClienteCadastrado(){
        $findCliente = Cliente::all()->count();
        return $findCliente;
    }
    public function buscaTotalDeVendas(){
        $findVendas = Venda::all()->count();
        return $findVendas;
    }
};

