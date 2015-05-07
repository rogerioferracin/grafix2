<?php

return array(

  /*
	|--------------------------------------------------------------------------
	| Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| The following language lines contain the default error messages used by
	| the validator class. Some of these rules have multiple versions such
	| such as the size rules. Feel free to tweak each of these messages.
	|
	*/

	"accepted"       => "O <b>:attribute</b> deve ser aceite.",
	"active_url"     => "O <b>:attribute</b> não é uma URL válida.",
	"after"          => "O <b>:attribute</b> deve ser uma data após <b>:date</b>.",
	"alpha"          => "O <b>:attribute</b> só pode conter letras.",
	"alpha_dash"     => "O <b>:attribute</b> só pode conter letras, números e traços.",
	"alpha_num"      => "O <b>:attribute</b> só pode conter letras e números.",
	"before"         => "O <b>:attribute</b> deve ser uma data anterior à <b>:date</b>.",
	"between"        => array(
		"numeric" => "O <b>:attribute</b> deve estar entre :min - <b>:max</b>.",
		"file"    => "O <b>:attribute</b> deve estar entre :min - <b>:max</b> kilobytes.",
		"string"  => "O campo <b>:attribute</b> deve estar entre <b>:min</b> - <b>:max</b> caracteres.",
	),
	"confirmed"      => "O <b>:attribute</b> confirmação não coincide.",
	"date"             => "O <b>:attribute</b> não é uma data válida.",
	"date_format"      => "O <b>:attribute</b> não corresponde ao formato <b>:format</b>.",
	"different"        => "O <b>:attribute</b> e :other deve ser diferente.",
	"digits"           => "O <b>:attribute</b> deve ter <b>:digits</b> dígitos.",
	"digits_between"   => "O <b>:attribute</b> deve ter entre <b>:min</b> e <b>:max</b> dígitos.",
	"email"            => "O <b>:attribute</b> não é um e-mail válido.",
	"exists"           => "O <b>:attribute</b> selecionado é inválido.",
	"image"            => "O <b>:attribute</b> deve ser uma imagem.",
	"in"               => "O <b>:attribute</b> selecionado é inválido.",
	"integer"          => "O <b>:attribute</b> deve ser um inteiro.",
	"ip"               => "O <b>:attribute</b> deve ser um endereço IP válido.",
	"max"              => array(
		"numeric" => "O <b>:attribute</b> deve ser inferior a <b>:max</b>.",
		"file"    => "O <b>:attribute</b> deve ser inferior a <b>:max</b> kilobytes.",
		"string"  => "O campo <b>:attribute</b> deve ser inferior a <b>:max</b> caracteres.",
	),
	"mimes"            => "O <b>:attribute</b> deve ser um arquivo do tipo: <b>:values</b>.",
	"min"              => array(
		"numeric" => "O <b>:attribute</b> deve conter pelo menos <b>:min</b>.",
		"file"    => "O <b>:attribute</b> deve conter pelo menos <b>:min</b> kilobytes.",
		"string"  => "O campo <b>:attribute deve conter pelo menos <b>:min</b> caracteres.",
	),
	"not_in"           => "O <b>:attribute</b> selecionado é inválido.",
	"numeric"          => "O <b>:attribute</b> deve ser um número.",
	"regex"            => "O <b>:attribute</b> não é válido.",
	"required"         => "O campo <b>:attribute</b> deve ser preenchido.",
	"required_if"      => "O campo <b>:attribute</b> deve ser preenchido quando <b>:other</b> é <b>:value</b>.",
	"required_with"    => "O campo <b>:attribute</b> deve ser preenchido quando <b>:values</b> está presente.",
	"required_without" => "O campo <b>:attribute</b> deve ser preenchido quando <b>:values</b> não está presente.",
	"same"             => "O </b>:attribute</b> e <b>:other</b> devem ser iguais.",
	"size"             => array(
		"numeric" => "O <b>:attribute</b> deve ser <b>:size</b>.",
		"file"    => "O <b>:attribute</b> deve ter <b>:size</b> kilobyte.",
		"string"  => "O campo <b>:attribute</b> deve ter <b>:size</b> caracteres.",
	),
	"unique"           => "Este <b>:attribute</b> já existe.",
	"url"              => "O formato <b>:attribute</b> é inválido.",

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| Here you may specify custom validation messages for attributes using the
	| convention "attribute.rule" to name the lines. This makes it quick to
	| specify a specific custom language line for a given attribute rule.
	|
	*/

	'custom' => array(),

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Attributes
	|--------------------------------------------------------------------------
	|
	| The following language lines are used to swap attribute place-holders
	| with something more reader friendly such as E-Mail Address instead
	| of "email". This simply helps us make messages a little cleaner.
	|
	*/

	'attributes' => array(),

);
