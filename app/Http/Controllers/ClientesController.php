<?php namespace Grafix\Http\Controllers;

use Grafix\Models\Cliente;
use Grafix\Http\Requests\ClienteFormRequest;
use Grafix\Models\Endereco;
use Grafix\Models\Contato;
use Grafix\Libraries\Helpers\LogHelper;

class ClientesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        \View::share('className', 'Clientes');
    }

    /**
     * Exibe clientes cadastrados
     *
     * @return \Illuminate\View\View
     */
    public function getIndex()
    {
        $clientes = Cliente::where('ativo', '=', 1)->get();

        return view('clientes.index',['page_title'=>'Clientes cadastrados', 'clientes' => $clientes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function getNovo()
    {
        return view('clientes.novo', ['page_title' => 'Novo cliente']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     * @param ClienteFormRequest $request
     */
    public function postNovo(ClienteFormRequest $request)
    {
        $cliente = new Cliente();
        $cliente->fill($request->all());
        $endereco = new Endereco();
        $endereco->fill($request->all());
        $contato = new Contato();
        $contato->fill($request->all());
        $contato->contato_principal = 1;

        \DB::beginTransaction();

        try {
            $cliente->save();
            $cliente->endereco()->save($endereco);
            $cliente->contatos()->save($contato);

            \DB::commit();
            \Toastr::success('Cliente ' . $cliente->nome_fantasia . ' cadastrado com sucesso', 'Sucesso');

            return redirect('/clientes');

        } catch(\Exception $e) {
            LogHelper::launchErrorLog($e);
            \DB::rollBack();
            return redirect('/');
        }
    }

    /**
     * Show lista de clientes cadastrados
     *
     * @param $id
     * @return \Illuminate\View\View
     */
    public function getFicha($id)
    {
        $cliente = Cliente::find($id);
        if(!$cliente){
            \Toastr::warning('Cliente não encontrado', 'Atenção');
            return redirect('/clientes');
        }

        return view('clientes.ficha', ['cliente'=>$cliente, 'page_title' => 'Ficha de cliente']);
    }

    /**
     * @param $id Id do cliente
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function getAltera($id)
    {
        $model = Cliente::with('endereco')->find($id);

//        dd($cliente);

        if(!$model){
            \Toastr::warning('Cliente não encontrado', 'Atenção');
            return redirect('/clientes');
        }

        return view('clientes.altera', ['model'=>$model, 'page_title' => 'Altera ficha de cliente']);
    }

    public function putAltera(ClienteFormRequest $request ,$id)
    {
        $cliente = Cliente::find($id);
        $cliente->fill($request->all());
        $cliente->endereco->fill($request->all());

        \DB::beginTransaction();

        try {

            $cliente->push();
            \DB::commit();

            \Toastr::success('Cliente ' . $cliente->namo_fantasia . ' atualizado com sucesso', 'Sucesso');

            return redirect('/clientes');

        } catch(\Exception $e) {

            \DB::rollBack();
            return redirect('/');
        }


        return redirect('clientes');
    }
}