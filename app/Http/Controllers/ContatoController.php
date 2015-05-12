<?php namespace Grafix\Http\Controllers;

use Grafix\Http\Requests;
use Illuminate\Support\ClassLoader;
use Grafix\Models\Cliente;

class ContatoController extends Controller
{

    public function __construct()
    {

    }

    public function getNovo($className, $id)
    {
        $model = new $className();

        dd($model);

        $model->find($id);

        return view('contatos.novo');
    }

    public function getAltera($className, $id)
    {
        \Toastr::info('Alterando contato');
        return view('clientes');
    }

}
