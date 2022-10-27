
<?php

// Expresiones regulares para validar usuario, password, email y fecha de nacimiento.

/*VALIDA_USUARIO: Acepta letras de la A a la Z (mayusculas y minusculas),
 numeros del 0 al 9 y los caracteres "." y "-"
 */
define("VALIDA_USUARIO", "/[\w.\-]{3,25}/A"); 

/*VALIDA_PASSWORD: Debe contener al menos 8 caracteres, que deberán ser
una mayuscula, una minuscula y un numero.
 */
define("VALIDA_PASSWORD", "/(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}/A");

/*VALIDA_EMAIL: cepta letras de la A a la Z (mayusculas y minusculas),
 numeros del 0 al 9 y los caracteres "-" y ".". 
 Después deberá contener una "@", cualquier caracter alfanumérico, un "." y 
 por último entre 2 y 4 caracteres alfanuméricos
*/
define("VALIDA_EMAIL", "/[\w\.]+@([\w-]+\.)+[\w-]{2,4}/A");

/*VALIDA_FECHA_NAC: 

PROBLEMAS: no tiene que coger años > actual. No 31 febrero, si 29 febrero..
*/
define("VALIDA_FECHA_NAC", "/([0-9]{4})\-([0-9]{2})\-([0-9]{2})/A");


?>