<?php namespace Grafix\Http\Requests;

use Grafix\Http\Requests\Request;
use Grafix\Models\Cliente;
use Grafix\Models\Endereco;
use Grafix\Models\Contato;

class ClienteFormRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
        return array_merge(
            Cliente::rules(), Contato::rules(), Endereco::$rules
        );
	}

}
