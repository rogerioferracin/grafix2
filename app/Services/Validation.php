<?php namespace Grafix\Services;

use Illuminate\Validation\Validator;

class Validation extends Validator
{
    /**
     * Verifica se CNPJ / CPF é unico
     * @param $attribute
     * @param $value
     * @param $parameters
     * @return bool
     */
    public function validateUniqueCnpjCpf($attribute, $value, $parameters)
    {
        $value = preg_replace('/\D/', '', $value);

        if($value === '00000000000000' || $value === '00000000000') {
            return true;
        }

        $table = $parameters[0];
        $field = $parameters[1];
        $id    = $parameters[2];
        $id = intval($id);

        $result = \DB::table($table)->where($field, 'LIKE', $value)->first();

//        dd($parameters);

        if($result) {
            if($result->id === $id) {
                return true;
            } else {
                return false;
            }
        } else {
            return true;
        }
    }

    /**
     * Valida se CNPJ / CPF é válido
     * @param $attribute
     * @param $value
     * @param $parameter
     * @return bool
     */
    public function validateCnpjCpf($attribute, $value, $parameter)
    {
        if($value === '00000000000000' || $value === '00000000000') {
            return true;
        }

        $value = preg_replace('/\D/', '', $value);
        $num = array();
        for($i = 0; $i < (strlen($value)); $i++) {
            $num[] = $value[$i];
        }

        //valida como cpf ****************************************************************************************
        if(strlen($value) === 11) {

            /*
            Elimina combinações como 00000000000 e 22222222222 embora
            não sejam cpfs reais resultariam em cpfs
            válidos.
            */
            for($i=0; $i<10; $i++)
            {
                if ($num[0]==$i && $num[1]==$i && $num[2]==$i
                    && $num[3]==$i && $num[4]==$i && $num[5]==$i
                    && $num[6]==$i && $num[7]==$i && $num[8]==$i)
                {
                    return false;
                    break;
                }
            }

            //calcula e compara o primeiro digito verificador
            $j = 10;
            for($i=0; $i <9; $i++) {
                $multiplica[$i] = $num[$i]*$j;
                $j--;
            }
            $soma = array_sum($multiplica);
            $resto = $soma%11;
            if($resto < 2) {
                $dg = 0;
            } else {
                $dg = 11 - $resto;
            }

            if($dg!=$num[9]) {
                return false;
            }

            /*
            Calcula e compara o segundo dígito verificador.
            */
            $j=11;
            for($i=0; $i<10; $i++) {
                $multiplica[$i]=$num[$i]*$j;
                $j--;
            }
            $soma = array_sum($multiplica);
            $resto = $soma%11;
            if($resto<2) {
                $dg=0;
            } else {
                $dg=11-$resto;
            }

            if($dg!=$num[10]) {
                return false;
            } else {
                return true;
            }

        }
        //valida como cnpj ****************************************************************************************
        elseif(strlen($value) === 14) {
            if ($num[0]==0 && $num[1]==0 && $num[2]==0
                && $num[3]==0 && $num[4]==0 && $num[5]==0
                && $num[6]==0 && $num[7]==0 && $num[8]==0
                && $num[9]==0 && $num[10]==0 && $num[11]==0)
            {
                return false;
            }
            //Etapa 4: Calcula e compara o primeiro dígito verificador.
            else
            {
                $j=5;
                for($i=0; $i<4; $i++)
                {
                    $multiplica[$i]=$num[$i]*$j;
                    $j--;
                }
                $soma = array_sum($multiplica);
                $j=9;
                for($i=4; $i<12; $i++)
                {
                    $multiplica[$i]=$num[$i]*$j;
                    $j--;
                }
                $soma = array_sum($multiplica);
                $resto = $soma%11;
                if($resto<2)
                {
                    $dg=0;
                }
                else
                {
                    $dg=11-$resto;
                }
                if($dg!=$num[12])
                {
                    return false;
                }
            }
            //Etapa 5: Calcula e compara o segundo dígito verificador.

            $j=6;
            for($i=0; $i<5; $i++)
            {
                $multiplica[$i]=$num[$i]*$j;
                $j--;
            }
            $soma = array_sum($multiplica);
            $j=9;
            for($i=5; $i<13; $i++)
            {
                $multiplica[$i]=$num[$i]*$j;
                $j--;
            }
            $soma = array_sum($multiplica);
            $resto = $soma%11;
            if($resto<2)
            {
                $dg=0;
            }
            else
            {
                $dg=11-$resto;
            }
            if($dg!=$num[13])
            {
                return false;
            }
            else
            {
                return true;
            }
        //valida falsa ***************************************
        } else {
            return false;
        }
    }
}