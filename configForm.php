
<?php

// Expresiones regulares para validar usuario, password, email y fecha de nacimiento.

/*VALIDA_USUARIO: Acepta letras de la A a la Z (mayusculas y minusculas),
 numeros del 0 al 9 y el caracter _
 */
define("VALIDA_USUARIO", "/[A-Za-z0-9_]{3,25}"); 

/*VALIDA_PASSWORD: Debe contener al menos 8 caracteres, que deberán ser
una mayuscula, una minuscula y un numero.
 */
define("VALIDA_PASSWORD", "/(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}");

/*VALIDA_EMAIL: 
*/
define("VALIDA_EMAIL", "/[\w-\.]+@([\w-]+\.)+[\w-]{2,4}");

/**/
define("VALIDA_FECHA_NAC", "");

?>