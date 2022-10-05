<?php
function validar($campoAValidar, $datoAValidar)
{

    if ($campoAValidar == "nombre") {
        if (preg_match("/([A-ZÁ-Ú]{1}[a-zá-ú]+\s?)+/A", $datoAValidar)) {
            return true;
        }
    }
    if ($campoAValidar == "curso") {
        if (preg_match('/([1-2]{1}\º){1}/A', $datoAValidar)) {
            return true;
        }
    }
    if ($campoAValidar == "ciclo") {
        if (preg_match('/(DAW|DAM|ASIR)/A', $datoAValidar)) {
            return true;
        }
    } else {
        return false;
    }
    /*
    //validar el campos
    if (preg_match("/([A-ZÁ-Ú]{1}[a-zá-ú]+\s?)+/A", $datoAValidar) || preg_match('/([1-2]{1}\º){1}/A', $datoAValidar) || preg_match('/(DAW|DAM|ASIR)/A', $datoAValidar)) {
        return true;
    } else {
        return false;
    }*/
}
