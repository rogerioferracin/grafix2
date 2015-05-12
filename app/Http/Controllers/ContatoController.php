<?php namespace Grafix\Http\Controllers;

use Grafix\Http\Requests;
use Grafix\Models\Contato;
use Grafix\Http\Requests\ContatoFormRequest;

class ContatoController extends Controller
{

    /**
     * Get Contato pelo Id
     *
     * @param $id Id do contato
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function getContatoById($id)
    {
        $contato = Contato::find($id);

        if($contato) {

            $response = array(
                'success' => true,
                'contato' => $contato
            );
        } else {
            $response = array(
                'fail' => true,
                'mensagem' => 'Nenhum contato encontrado'
            );
        }

        return \Response::json($response);
    }

    public function putAlteraContato(ContatoFormRequest $request, $id)
    {

        $contato = Contato::find($id);


        \DB::beginTransaction();
        $contato->fill($request->all());
        try {

            $contato->save();
            \DB::commit();

            $mensagem = 'Contato ' . $contato->nome_fantasia . ' atualizado com sucesso';

            \Toastr::success($mensagem, 'Sucesso');

            $response = array(
                'success' => true,
                'mensagem'  => $mensagem
            );

        } catch(\Exception $e) {
            LogHelper::launchErrorLog($e);
            \DB::rollBack();

            $response = array(
                'error' => true,
                'mensagem'  => 'Ocorreu um erro ao alterar o contato. Tente novamente.'
            );

        }


        return \Response::json($response);

    }
}

