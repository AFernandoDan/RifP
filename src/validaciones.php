<?php 
function validarNombre($nombre){
	$error;

    if (empty($nombre)) {
    	$error = "El nombre no puede estar vacio o ser nulo";
    	return $error;
    }
    
    if (!is_string($nombre)) {
    	$error = "El nombre ingresado ser de tipo texto";
    	return $error;
    }
    
    if (trim($nombre) == "") {
    	$error = "El nombre ingresado no pueden ser solo espacios";
    	return $error;
    }
    
    if (!ctype_alnum(str_replace(" ","",$nombre))) {
       	$error = "El nombre ingresado solo puede contener caracteres alfanumericos y espacios";
    	return $error;
    }
    
    if (strlen(trim($nombre)) > 70) {
    	$error = "El nombre ingresado es demasiado largo (maximo 70 caracteres)";
    	return $error;
    }
    
    if (strlen(trim($nombre)) < 4) {
    	$error = "El nombre ingresado es demasiado corto (minimo 4 caracteres)";
    	return $error;
    }
}

function validarNumero($numero){
    $error;
    
    if (!is_int($numero)) {
    	$error = "El numero de boletos ingresado no es un numero entero";
    	return $error;
    }
    
    if ($numero >= 300) {
    	$error = "El numero de boletos debe ser menor o igual a 300";
    	return $error;
    }
    
    if ($numero <= 0) {
    	$error = "El numero de boletos debe ser mayor a 0";
    	return $error;
    }
}
?>