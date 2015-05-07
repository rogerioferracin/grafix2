<?php namespace app\Models;

use Illuminate\Database\Eloquent\Model;


class Funcao extends Model
{

    protected $table = 'funcoes';
    protected $fillable = ['funcao', 'detalhes'];


}