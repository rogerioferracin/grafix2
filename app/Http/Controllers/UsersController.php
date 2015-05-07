<?php namespace Grafix\Http\Controllers;

use Grafix\Http\Requests;
use Grafix\Http\Controllers\Controller;

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
//        dd($request->all());

		$user = new User();
        $user->fill($request->all());

        \DB::beginTransaction();

        try {
            $user->save();
            \DB::commit();
            \Toastr::info('Usuário ' . $user->name . 'cadastrado com sucesso', 'Sucesso');

            return redirect('/usuarios');

        } catch(\Exception $e) {
            \Log::error('Ocorreu um erro ao gravar a entidade: ['
                . $e->getCode() . ']['
                . $e->getLine() . '] - '
                . $e->getMessage());

            \Toastr::error('Ocorreu um erro grave. Contate o suport técnico', 'Erro');

            return redirect('/');
        }
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
