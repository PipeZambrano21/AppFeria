<?php

include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Controlador/ControladorEstudiante.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Entidades/Estudiantes.php');



$datos=array(
    $_POST["codEstudiante"],
    $_POST["cedEstudiante"],
    $_POST["correoEstudiante"],    
    $_POST["codUsuario"],
    $_POST["nombreEstudiante"],
    $_POST["apellidoEstudiante"],
    $_POST["semestreEstudiante"],
    $_POST["correoPersonal"],
    $_POST["codProgamaAcademico"]
    
);




$controlador = new ControladorContactoEmpresa();
$contactoEmpresa=new ContactoEmpresa($datos[0], $datos[1], $datos[2], $datos[3], $datos[4], $datos[5]);

echo($controlador->actualizarContactoEmpresa($contactoEmpresa));



?>