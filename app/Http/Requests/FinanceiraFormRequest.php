<?php namespace Grafix\Http\Requests;

use Grafix\Http\Requests\Request;
use Grafix\Models\Financeira;
use Grafix\Models\Endereco;
use Grafix\Models\Contato;

class FinanceiraFormRequest extends Request {

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

        $id = $this->route()->parameter('one');

        switch($this->method()) {
            case 'POST' : {
                return array_merge(
                    Financeira::rules(),
                    Contato::rules(),
                    Endereco::$rules

                );
            }
            case 'PUT' : {
                return array_merge(
                    Financeira::rules(),
                    Endereco::$rules
                );
            }
        }

	}

}
