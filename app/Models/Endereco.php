<?php namespace Grafix\Models;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    
	public $table = "enderecos";

    /**
     * Fillable -------------------------------------------------------------------------------
     * @var array
     */
	public $fillable = [
	    "logradouro", "numero", "complemento", "bairro", "cidade", "uf", "observacoes", "cep"
	];

    /**
     * MORPH
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function endereco_morph()
    {
        return $this->morphTo();
    }

    /**
     * VALIDATION RULES
     * @return array
     */
	public static $rules = [
	    "logradouro" => "required",
		"numero" => "required"
	];

}
