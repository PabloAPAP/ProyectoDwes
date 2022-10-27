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

/**
 * Esta función busca en el fichero donde tenemos almacenadas las credenciales.
 * @param nombreABuscar es el nombre que se quiere comprobar
 * Devuelve el numero de linea donde está el nombre buscado.
 */
function buscarUsuario($nombreABuscar)
{
    $archivo = file_get_contents('acceso/usuariosPassword.txt');
    return strpos($archivo, $nombreABuscar);
}
/**
 * Esta funcion recupera los datos del usuario del fichero
 * @param nombreABuscar es el nombre del usuario del cual se quieren los datos.
 * @return arrayDatos es el array con los datos del usuario
 */
function recuperarUsuario($nombreABuscar)
{
    //Abrimos el archivo
    fopen("acceso/usuariosPassword.txt", "r");
    //comprobamos que el archivo exista
    $db_txt = 'acceso/usuariosPassword.txt';
    //cargamos el archivo a la variable como tipo array
    $lineas = file($db_txt);
    //recorremos el array
    foreach ($lineas as $linea) {
        //dividimos la linea por el separador '|'
        //usamos trim() para quitar los espacios vacios y los saltos de linea
        //luego divimos la linea con explode dandole como limite 2 , para así decir que si encuentra mas '|' los ignore.
        list($user, $pass) = explode("|", trim($linea), 2);
        //comparamos que el user y la pass no sean vacios o que contengan strings
        if (is_string($user)  &&  is_string($pass)) {
            if ($nombreABuscar === $user){
            $arrayDatos = [$user, $pass];
            return $arrayDatos;}                
        }
    }
}
