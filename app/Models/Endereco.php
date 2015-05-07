<?php namespace Grafix\Models;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    
	public $table = "enderecos";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "logradouro",
		"numero",
		"complemento",
		"bairro",
		"cidade",
		"uf",
		"observacoes"
	];

	public static $rules = [
	    "logradouro" => "required",
		"numero" => "required"
	];

}
