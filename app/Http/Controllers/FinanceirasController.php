<?php namespace Grafix\Http\Controllers;

use Grafix\Models\Financeira;
use Grafix\Http\Requests\FinanceiraFormRequest;
use Grafix\Libraries\Helpers\LogHelper;

class FinanceirasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        \View::share('className', 'Financeiras');
    }

    /**
     * Exibe clientes cadastrados
     *
     * @return \Illuminate\View\View
     */
    public function getIndex()
    {
        $financeiras = Financeira::where('ativo', '=', 1)->get();

        return view('financeiras.index',['page_title'=>'Financeiras/Bancos cadastrados', 'financeiras' => $financeiras]);
    }

    /**
     * Exibe form para cadastro de financeira
     *
     * @return \Illuminate\View\View
     */
    public function getNovo()
    {
        return view('financeiras.novo', ['page_title'=>'Nova Financeira/Banco']);
    }

    public function postNovo(FinanceiraFormRequest $request)
    {

        \Log::info($request->all());

        return back()->withInput();
    }

}