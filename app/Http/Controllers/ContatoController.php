<?php namespace Grafix\Http\Controllers;

use Grafix\Http\Requests;
use Grafix\Models\Contato;
use Grafix\Models\Cliente;
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


    public function postNovo(ContatoFormRequest $request, $entidade, $entidadeId)
    {
        $classe = '\\Grafix\\Models\\' . $entidade;

        $model = $classe::find($entidadeId);

        //se o modelo não for encontrado retorna um erro
        if(!$model) {
            return \Response::json($response = array(
                'error' => true,
                'mensagem' => 'Houve um erro ao buscar ' . $entidade
            ));
        }

        $contato = new Contato();
        $contato->fill($request->all());

        \Log::info($contato);

        //inicia a transaction
        \DB::beginTransaction();

        try {

            $model->contatos()->save($contato);

            \DB::commit();

            $response = array(
                'success' => true,
                'mensagem' => 'Contato gravado com sucesso'
            );

        } catch(\Exception $e) {
            LogHelper::launchErrorLog($e);
            \DB::rollBack();

            $response = array(
                'error' => true,
                'mensagem' => 'Ocorreu um erro ao acessar o BD. Entre em contato com o suporte!'
            );
        }

        return \Response::json($response);
    }

    /**
     * Altera contato
     * @param ContatoFormRequest $request
     * @param $data
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function putAlteraContato(ContatoFormRequest $request, $data)
    {

        //checa se foi enviado um Id na request e carrega o contato
        if (array_key_exists('id', $request->all())) {
            $contato = Contato::find($request->get('id'));
            if(!$contato) {
                $response = array(
                    'error' => true,
                    'mensagem'  => 'Contato não encontrado, tente novamente!'
                );
            }
            $contato->fill($request->all());

        } else {

            $data = json_decode($data, true);

            $contato = new Contato();
            $contato->fill($request->all());

            $modelPath = '';
            $class = $modelPath . $data['business'];
            $modelId = $data['businessId'];

            $model = new $class();
            $model->find($modelId);

            $contato->contato_morph()->associate($model);

            \Log::info($contato);


        }


        $response = array(
            'success' => true,
            'mensagem'  => 'Contato ' . $contato->nome_fantasia . ' gravado com sucesso'
        );


//        \DB::beginTransaction();
//        try {
//
//            $contato->save();
//            \DB::commit();
//
//            $mensagem = 'Contato ' . $contato->nome_fantasia . ' gravado com sucesso';
//
//            \Toastr::success($mensagem, 'Sucesso');
//
//            $response = array(
//                'success' => true,
//                'mensagem'  => $mensagem
//            );
//
//        } catch(\Exception $e) {
//            LogHelper::launchErrorLog($e);
//            \DB::rollBack();
//
//            $response = array(
//                'error' => true,
//                'mensagem'  => 'Ocorreu um erro ao alterar o contato. Tente novamente.'
//            );
//
//        }

        return \Response::json($response);

    }
}

