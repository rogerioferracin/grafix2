<?php namespace Grafix\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model {

	protected $table = 'clientes';

    /**
     * Fillable -------------------------------------------------------------------------------
     * @var array
     */
    protected $fillable = array('razao_social', 'nome_fantasia', 'cnpj_cpf', 'ie_rg', 'im',
        'cliente_desde', 'observacoes','ativo');

    /**
     * RELATIONS
     */
    public function contatos()
    {
        return $this->morphMany('Grafix\Models\Contato', 'contato_morph');
    }

    public function endereco()
    {
        return $this->morphOne('Grafix\Models\Endereco', 'endereco_morph');
    }

    public function contatoPrincipal()
    {
        return $this->morphOne('Grafix\Models\Contato', 'contato_morph')
            ->where('contato_principal', '=', 1);
    }

    /**
    * Softdelete -----------------------------------------------------------------------------
    */
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    /**
     * RULES
     * @param null $id Id for unique fields
     * @return array rules for validation
     */
    public static function rules($id = null)
    {
        return [
            'razao_social'  => 'required',
            'nome_fantasia'  => 'required',
            'cnpj_cpf'      => 'required|unique:clientes,cnpj_cpf' . ($id ? ",$id" : ''),
        ];
    }

    //Mutators ------------------------------------------------------------------------------
    public function setClienteDesdeAttribute($value){
        if($value) {
            $date = \DateTime::createFromFormat('d/m/Y', $value)->getTimestamp();
            $this->attributes['cliente_desde'] = date('Y-m-d', $date);
        } else {
            $this->attributes['cliente_desde'] = '';
        }
    }

    public function getClienteDesdeAttribute()
    {
        if($this->attributes['cliente_desde'] == '0000-00-00') {
            return '';
        } else {
            return date('d/m/Y', strtotime($this->attributes['cliente_desde']));
        }
    }

    public function setCnpjCpfAttribute($value){
        $value = preg_replace('/\D/', '', $value);

        $this->attributes['cnpj_cpf'] = $value;
    }

    public function getCnpjCpfAttribute()
    {
        $value = $this->attributes['cnpj_cpf'];

        if(strlen($value) === 11) {
            $value = substr($value, 0, 3) . '.';
            return $value;
        } elseif(strlen($value) === 14) {
            $value = substr($value, 0, 2) . '.' .
                substr($value, 2, 3) . '.' .
                substr($value, 5, 3) . '/' .
                substr($value, 8, 4) . '-' .
                substr($value, 12, 2);

            return $value;
        } elseif(strlen($value) === 6) {
            $value = substr($value, 0, 3) . '.' . substr($value, 3, 3);
            return $value;
        } else {
            return '';
        }
    }

}
