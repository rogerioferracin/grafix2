<?php namespace Grafix\Http\Controllers;

use Grafix\Http\Requests;
use Grafix\Http\Controllers\Controller;

use Grafix\Libraries\Helpers\LogHelper;
use Grafix\Http\Requests\UserFormRequest;
use Grafix\User;

class UsersController extends Controller {


    public function __construct()
    {
        $this->middleware('auth');
        \View::share('className', 'Usuarios');
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
        $users = User::where('ativo', '=', 1)->get();

		return view('users.index', ['users'=>$users])
            ->with('page_title', 'Lista usuários');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function getNovo()
	{
		return view('users.novo', ['page_title', 'Novo usuário']);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
     * @param UserFormRequest $request
     */
	public function postNovo(UserFormRequest $request)
	{
		$user = new User();
        $user->fill($request->all());

        \DB::beginTransaction();

        try {
            $user->save();
            \DB::commit();
            \Toastr::success('Usuário ' . $user->name . 'cadastrado com sucesso', 'Sucesso');

            return redirect('/usuarios');

        } catch(\Exception $e) {
            LogHelper::launchErrorLog($e);
            \DB::rollBack();
            return redirect('/');
        }
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getFicha($id)
	{
		$user = User::find($id);

        return view('users.ficha', ['page_title'=>'Ficha de usuário', 'user'=>$user]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getAltera($id)
	{
		$user = User::find($id);

        if(!$user){
            \Toastr::warning('Usuário não encontrado', 'Atenção');
            return redirect('/usuarios');
        }

		return view('users.altera', ['page_title'=>'Altera usuário', 'model'=>$user]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 * @param UserFormRequest $request
	 */
	public function putAltera(UserFormRequest $request, $id)
	{

        $user = User::find($id);
        $user->fill($request->all());

        \DB::beginTransaction();

        try {

            $user->save();
            \DB::commit();

            \Toastr::success('Usuário ' . $user->name . ' atualizado com sucesso', 'Sucesso');

            return redirect('/usuarios');

        } catch(\Exception $e) {
            LogHelper::launchErrorLog($e);
            \DB::rollBack();
            return redirect('/');
        }

	}

	/**
	 * Remove the specified resource from storage.
	 * TODO Método para exlcuir usuário com angular
	 * @param  int  $id
	 * @return Response
	 */
	public function deleteApagar($id)
	{
        $user = User::find($id);

        if(!$user) {
            $response = array(
                'fail'   => true,
                'mensagem'  => 'Usuário não encontrado. Tente novamente!'
            );
        }
	}

    /**
     * ALtera senha de usuário
     * @param $id id do usuário
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function putAlteraSenha($id)
    {

        $user = User::find($id);

        if(!$user) {
            $response = array(
                'fail'   => true,
                'mensagem'  => 'Usuário não encontrado. Tente novamente!'
            );
        } else {

            if(!\Hash::check(\Input::get('senha_atual'), $user->password)) {
                $response = array(
                    'fail'   => true,
                    'mensagem'  => 'Senha atual não coincide. Tente novamente!'
                );
            } else {

                $user->password = \Input::get('nova_senha');

                \DB::transaction(function() use ($user) {
                    $user->save();
                });

                $response = array(
                    'success'   => true,
                    'mensagem'  => 'Senha alterada com sucesso. Você será deslogado para logar com a nova senha!'
                );
            }
        }

        return \Response::json($response);
    }

}
