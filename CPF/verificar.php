<?php
function validar_cpf($cpf)
{
    $cpf = preg_replace('/[^0-9]/', '', (string)$cpf);
    for ($i = 0, $j = 10, $soma = 0; $i < 9; $i++, $j--)
        $soma += $cpf{$i} * $j;
    $resto = $soma % 11;

    if ($resto < 2){
        $cpf{9} = 0;
    }else{
        $cpf{9} = 11 - $resto;
    }

    for ($i = 0, $j = 11, $soma = 0; $i < 10; $i++, $j--)
        $soma += $cpf{$i} * $j;
    $resto = $soma % 11;
    if($resto < 2){
        $cpf{10} = 0;
    }else{
        $cpf{10} = 11 - $resto;
    }
    return "Os digitos verificadores são ". $cpf{9} . " e " . $cpf{10};
}
var_dump(validar_cpf($_POST["cpf"]));