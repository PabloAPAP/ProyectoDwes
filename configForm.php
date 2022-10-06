
<?php

// Expresiones regulares para validar usuario, password, email y fecha de nacimiento.

/*VALIDA_USUARIO: Acepta letras de la A a la Z (mayusculas y minusculas),
 numeros del 0 al 9 y los caracteres "." y "-"
 */
define("VALIDA_USUARIO", "/[\w.\-]{3,25}"); 

/*VALIDA_PASSWORD: Debe contener al menos 8 caracteres, que deberán ser
una mayuscula, una minuscula y un numero.
 */
define("VALIDA_PASSWORD", "/(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}");

/*VALIDA_EMAIL: cepta letras de la A a la Z (mayusculas y minusculas),
 numeros del 0 al 9 y los caracteres "-" y ".". 
 Después deberá contener una "@", cualquier caracter alfanumérico, un "." y 
 por último entre 2 y 4 caracteres alfanuméricos
*/
define("VALIDA_EMAIL", "/[\w-\.]+@([\w-]+\.)+[\w-]{2,4}");

/*VALIDA_FECHA_NAC: 

PROBLEMAS: no tiene que coger años > actual. No 31 febrero, si 29 febrero..
*/
define("VALIDA_FECHA_NAC", "/([0-9]{2})\/([0-9]{2})\/([0-9]{4})");


/* Funcion que valida que la fecha de nacimiento es correcta y valida, explode divide los registros en 3 valores y con checkdate verificamos que la fecha existe. */
function validarFecha($fecha){
	$valores = explode('/', $fecha);
	if(count($valores) == 3 && checkdate($valores[1], $valores[0], $valores[2])){
		return true;
    }
	return false;
}

?>