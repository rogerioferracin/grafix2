<?php namespace Grafix\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contato extends Model {

    protected $table = 'contatos';

    /**
     * Fillable -------------------------------------------------------------------------------
     * @var array
     */
    protected $fillable = array('nome', 'sobrenome', 'cargo', 'setor', 'telefone',
        'celular', 'email', 'skype', 'observacoes', 'contato_principal', 'aniversario');

    /**
     * Softdelete -----------------------------------------------------------------------------
     */
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    /**
     * MORPH
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function contato_morph()
    {
        return $this->morphTo();
    }

    /**
     * VALIDATION RULES
     * @return array
     */
    public static function rules()
    {
        return array(
            'nome'      => 'required',
            'telefone'  => 'required'
        );
    }

    /**
     * MUTATORS
     */
    public function setAniversarioAttribute($value)
    {
        if($value) {
            $date = \DateTime::createFromFormat('d/m/Y', $value)->getTimestamp();
            $this->attributes['aniversario'] = date('Y-m-d', $date);
        } else {
            $this->attributes['aniversario'] = '';
        }
    }

    public function getAniversarioAttribute()
    {
        if($this->attributes['aniversario'] == '0000-00-00') {
            return '';
        } else {
            return date('d/m/Y', strtotime($this->attributes['aniversario']));
        }
    }

}
