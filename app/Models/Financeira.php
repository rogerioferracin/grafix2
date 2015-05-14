<?php namespace Grafix\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Financeira extends Model {

    //Relations ------------------------------------------------------------------------------
    public function endereco()
    {
        return $this->morphOne('Grafix\Models\Endereco', 'endereco_morph');
    }
    public function contatos()
    {
        return $this->morphOne('Grafix\Models\Contato', 'contato_morph');
    }

    //Validation rules -----------------------------------------------------------------------------
    public static function rules()
    {
        return array(
            'financeira' => 'required',
            'taxa_juros' => 'required|numeric',
        );
    }

    //Table name -----------------------------------------------------------------------------
    protected $table = 'financeiras';

    //Softdelete -----------------------------------------------------------------------------
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    //Fillable -------------------------------------------------------------------------------
    protected $fillable = array('nome', 'agencia', 'conta', 'taxa_juros', 'observacoes');

}
