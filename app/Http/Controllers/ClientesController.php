<?php namespace Grafix\Http\Controllers;

use Grafix\Models\Cliente;

class ClientesController extends Controller
{
    public function __construct()
    {
        \View::share('className', 'Clientes');
    }

    public function getIndex()
    {
        $clientes = Cliente::where('ativo', '=', 1);
        return view('clientes.index',['page_title'=>'Clientes cadastrados', 'clientes'=>$clientes]);
    }
}