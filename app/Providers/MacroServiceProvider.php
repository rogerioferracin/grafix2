<?php namespace Grafix\Providers;

use Illuminate\Html\HtmlServiceProvider;

class MacroServiceProvider extends HtmlServiceProvider
{
    public function register()
    {
        parent::register();

        require base_path() . '/resources/macros/macros.php';
    }
}
