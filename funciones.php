<?php

include_once 'configForm.php';

/**
 * Función validar valida un dato de formulario con una expresión regular
 * @param datoAValidar cadena de texto que se quiere validar
 * @param expresionRegular expresión regular con la que validarla
 * 
 * @return valida true o false en función de si valida o no
 */
function validar($datoAValidar, $expresionRegular)
{

    // Valido el campo
    if (preg_match($expresionRegular, $datoAValidar)) {
        $valida = true;
    } else {
        $valida = false;
    }

    return $valida;
}

/**
 * Funcion validarFecha valida una fecha.
 * @param fecha fecha que se quiere validar.
 * 
 * @return resultado true o false en funcion de si valida la fecha o no.
 */
function validarFecha($fecha)
{
    $resultado = false;

    if ($fecha > date('Y-m-d')) { //Fecha de nacimiento posterior a hoy
        return $resultado;
        echo "Fecha posterior";
    }elseif($fecha> date("Y-m-d",strtotime($fecha."- 14 years"))){
        return $resultado;
        echo "Menor de 14";
    }
    return true;
=======
/* Funcion que valida que la fecha de nacimiento es correcta y valida, explode divide los registros en 3 valores y con checkdate verificamos que la fecha existe. */
function validarFecha($fecha){
	$valores = explode('/', $fecha);
	if(count($valores) == 3 && checkdate($valores[1], $valores[0], $valores[2])){
		return true;
    }
	return false;
>>>>>>> d8322be704ba22a9d2530fd67857e6dda5a7d168
}
