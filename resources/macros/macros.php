<?php
/**
 * Form macro que gera input field com erro de validação
 */
Form::macro('text_with_error', function($name, $value = null, $options = null, $errors){

    if($errors->has($name)) {
        $input = Form::text($name, $value, $options) . '<span class="text-danger small">' . $errors->first($name) . '</span>';
        return $input;
    } else {
        return Form::text($name, $value, $options);
    }

});
