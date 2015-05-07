<?php namespace Grafix\Libraries\Helpers;

class LogHelper
{

    public static function launchErrorLog(\Exception $e)
    {
        \Log::error('Ocorreu um erro ao gravar a entidade: ['
            . $e->getCode() . ']['
            . $e->getFile() . ' ::::: '
            . $e->getLine() . '] - '
            . $e->getMessage());

        \Toastr::error('Ocorreu um erro grave. Contate o suport técnico', 'Erro');
    }

}