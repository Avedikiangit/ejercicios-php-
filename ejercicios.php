<?php

function print_f($variable)
{

    if (is_array($variable)) {


        $archivo = fopen("datos.txt", "a+");

        foreach ($variable as $item) {

            fwrite($archivo, $item);
        }
        fclose($archivo);
    } else
        file_put_contents("datos.txt", $variable);
}

$anotas = array(1,2,3,4);
$msg = "hola";
print_f($anotas);

?>