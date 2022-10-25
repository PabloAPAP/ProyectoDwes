<?php

include_once 'scripts/configForm.php';

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
    $resultado = true;

    //Transformamos el string a DateTime
    $fechaActual = new DateTime(date("Y-m-d"));
    $fechaNacimiento = new DateTime($fecha);
    $anios = $fechaActual->diff($fechaNacimiento)->y;

    //Si contiene una fecha entra por aqui.    
    if (strlen($fecha) > 0) {
        if ($fechaNacimiento > $fechaActual) { //Fecha de nacimiento posterior a hoy
            $resultado = false;
            return $resultado;
        } elseif ($anios < 14) {
            $resultado = false;
            return $resultado;
        }
    } else { //Si no contiene fecha entra por aquí
        $resultado = false;
        return $resultado;
    }

    return $resultado;
}


function buscarUsuario($nombreABuscar){
    $archivo = file_get_contents('acceso/usuariosPassword.txt');
    return strpos($archivo, $nombreABuscar);
}