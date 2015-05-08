<?php namespace Grafix\Models;

use Illuminate\Database\Eloquent\Model;


class Funcao extends Model
{

    protected $table = 'funcoes';
    protected $fillable = ['funcao', 'detalhes'];


    public static function getFuncoes()
    {
        $funcoes = Funcao::all()->lists('funcao', 'id');

        return array_merge([0 => 'Selecione um grupo...'], $funcoes);
    }

}