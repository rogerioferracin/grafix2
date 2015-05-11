<?php namespace Grafix;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword, SoftDeletes;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'email', 'password', 'username', 'ativo', 'observacoes', 'funcao_id', 'dica_de_senha'];

    /**
     * RULES
     * @param null $id
     * @return array
     */
    public static function rules($id = null)
    {
        return [
            'name'      => 'required',
            'username'  => 'required|between:4,20|unique:users,username' . ($id ? ",$id" : ''),
            'email'     => 'required|email',
            'funcao_id' => 'required|numeric|not_in:0',
            'password'  => 'sometimes|required|between:4,12|confirmed',
        ];
    }

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

    //Softdelete -----------------------------------------------------------------------------
    protected $dates = ['deleted_at'];

    /** ***************************************************************************************************************
     * Relations
     */
    public function funcao()
    {
        return $this->belongsTo('Grafix\Models\Funcao');
    }

    /** ***************************************************************************************************************
     * Mutators
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = \Hash::make($value);
    }

}
