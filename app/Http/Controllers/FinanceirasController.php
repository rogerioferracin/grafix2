<?php namespace Grafix\Http\Controllers;

use Grafix\Models\Financeira;
use Grafix\Models\Endereco;
use Grafix\Models\Contato;
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

    /**
     * Cadastra financeira no banco
     *
     * @param FinanceiraFormRequest $request
     * @return $this
     */
    public function postNovo(FinanceiraFormRequest $request)
    {

        $financeira = new Financeira();
        $financeira->fill($request->all());
        $endereco = new Endereco();
        $endereco->fill($request->all());
        $contato = new Contato();
        $contato->fill($request->all());
        $contato->contato_principal = 1;

        \DB::beginTransaction();

        try {
            $financeira->save();
            $financeira->endereco()->save($endereco);
            $financeira->contatos()->save($contato);

            \DB::commit();
            \Toastr::success('Financeira ' . $financeira->financeira . ' cadastrada com sucesso', 'Sucesso');

            return redirect('/financeiras');

        } catch(\Exception $e) {
            LogHelper::launchErrorLog($e);
            \DB::rollBack();
            return redirect('/');
        }
    }

    /**
     * ABre ficha de atualização de financeira
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function getAltera($id)
    {
        $financeira = Financeira::with('contatos', 'endereco')->find($id);

        if(!$financeira){
            \Toastr::warning('Financeira não encontrada', 'Atenção');
            return redirect('/financeiras');
        }

        return view('financeiras.altera', ['model'=>$financeira]);
    }

    public function putAltera(FinanceiraFormRequest $request, $id)
    {
        $financeira = Financeira::find($id);
        $financeira->fill($request->all());
        $financeira->endereco->fill($request->all());

        \DB::beginTransaction();

        try {

            $financeira->push();
            \DB::commit();

            \Toastr::success('Financeira ' . $financeira->financeira . ' atualizada com sucesso', 'Sucesso');

            return redirect('/financeiras');

        } catch(\Exception $e) {

            \DB::rollBack();
            return redirect('/');
        }
    }


    /**
     * Abre ficha de cadastro de financeira
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function getFicha($id)
    {
        $financeira = Financeira::with('contatos', 'endereco')->find($id);

        if(!$financeira){
            \Toastr::warning('Financeira não encontrada', 'Atenção');
            return redirect('/financeiras');
        }

        return view('financeiras.ficha', ['financeira'=>$financeira, 'page_title' => 'Ficha de financeira']);
    }

}