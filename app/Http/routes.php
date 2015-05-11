<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use Grafix\Models\Endereco;

Route::get('/', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

/**
 * USERS
 */
Route::controller('usuarios', 'UsersController');

/**
 * CLIENTES
 */
Route::controller('clientes', 'ClientesController');




Route::resource('tintas', 'TintaController');

Route::get('tintas/{id}/delete', [
    'as' => 'tintas.delete',
    'uses' => 'TintaController@destroy',
]);


/**
 * ENDERECOS
 */
Route::get('enderecos/pesquisa/{pesquisa}', function($pesquisa){

    $data = \DB::table('ceps')
        ->where('cep', 'like', '%'.$pesquisa.'%')
        ->orWhere('logradouro', 'like', '%'.$pesquisa.'%')
        ->get();

    if($data) {
        $response = array(
            'success'   => true,
            'data'      => $data
        );
    } else {
        $response = array(
            'fail'   => true,
            'message'   => 'Nenhum resultado encontrado na pesquisa!'
        );
    }
    return \Response::json($response);

});