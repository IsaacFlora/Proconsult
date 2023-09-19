<?php


if ( ! function_exists('mask')) {
    function mask($val, $mask)
    {
        $maskared = '';
        $k = 0;
        for ($i = 0; $i <= strlen($mask) - 1; ++$i) {
            if ($mask[$i] == '#') {
                if (isset($val[$k])) {
                    $maskared .= $val[$k++];
                }
            } else {
                if (isset($mask[$i])) {
                    $maskared .= $mask[$i];
                }
            }
        }

        return $maskared;
    }
}


/*
Retorna o valor de decimal para formato real
*/
if ( ! function_exists('decimalBr')) {
    function decimalBr($valor)
    {

        return number_format($valor, 2, ',', '.');
    }
}


function dataBR($data, $time = false){

    $data= str_replace("-", "/", $data);

    if($time)
        return date("d/m/Y H:i:s", strtotime($data));
    else
        return date("d/m/Y", strtotime($data));
}


?>