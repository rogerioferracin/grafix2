<?php namespace Grafix\Http\Requests;

use Grafix\Http\Requests\Request;
use Grafix\Models\Contato;
use Illuminate\Http\JsonResponse;

class ContatoFormRequest extends Request {

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

       return Contato::rules();

	}

    /**
     * @param array $errors
     * @return $this|JsonResponse
     */
    public function response(array $errors)
    {
        if ($this->ajax() || $this->wantsJson())
        {
            $response = array(
                'error'  => true,
                'errors' => $errors,
                'mensagem'  => 'Existem erros de validação'
            );
            \Log::alert('Retornando erros');

            return \Response::json($response);
        }
        \Toastr::warning('Ocorreu um erro ao validar os dados!', 'Atenção');
        return $this->redirector->to($this->getRedirectUrl())
            ->withInput($this->except($this->dontFlash))
            ->withErrors($errors, $this->errorBag);
    }

}
