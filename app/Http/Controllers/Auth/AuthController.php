<?php namespace Grafix\Http\Controllers\Auth;

use Grafix\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

use Grafix\User;
use Grafix\Http\Requests\Auth\LoginRequest;

class AuthController extends Controller {

	/**
     * model instance
     *
     * @var User
     */
    protected $user;

    /**
     * guard implementation
     *
     * @var Authenticator
     */
    protected $auth;

    /**
     * cretae a new controller instance
     *
     * @var
     *
     */
    public function __construct(Guard $auth, User $user)
    {
        $this->user = $user;
        $this->auth = $auth;

        $this->middleware('guest', ['except' => ['getLogout']]);
    }

    /**
     * Show login form
     */
    public function getLogin()
    {
        return view('auth.login');
    }

    /**
     * handle a login form request
     *
     * @param LoginRequest $request
     * @return Response
     */
    public function postLogin(LoginRequest $request)
    {
        if($this->auth->attempt($request->only('username', 'password'))) {
            return redirect('/');
        }

        return redirect('auth/login')
            ->withErrors([
                'username' => 'Seu username ou senha não conferem. Tente novamente'
            ]);
    }

    /**
     * logout a user from the system
     *
     * @return Response
     */
    public function getLogout()
    {
        $this->auth->logout();

        return redirect('/');
    }

}
