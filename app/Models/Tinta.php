<?php namespace Grafix\Models;

use Illuminate\Database\Eloquent\Model;

class Tinta extends Model
{
    
	public $table = "tintas";

	public $primaryKey = "id";
    
	public $timestamps = true;

	public $fillable = [
	    "nome",
		"escala",
		"ativo"
	];

	public static $rules = [
	    "nome" => "required",
		"escala" => "required",
		"ativo" => "observacoes:mediumText"
	];

}
