<?php

include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Controlador/ControladorHojaVida.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Entidades/HojaDeVida.php');

include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Controlador/ControladorReferencia.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Entidades/ReferenciaHoja.php');

include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Controlador/ControladorAcademicaHoja.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Entidades/AcademicaHoja.php');

include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Controlador/ControladorFormacionComp.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Entidades/FormacionComplementaria.php');

include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Controlador/ControladorProcesosFormativos.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Entidades/ProcesosFormativos.php');

include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Controlador/ControladorExperienciaHoja.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Entidades/ExperienciaHoja.php');

// $i=2;
// $variable=$_POST["academica"];
// $variable2=$_POST["academica".$i];
// print_r($variable);
// print_r($variable2);
 

 $numeroComplementarias=$_POST["numComplementaria"];
 $rangoComplementrarias=range(1,$numeroComplementarias);



 $numeroAcademicas=intval($_POST["numAcademica"]);
 $rangoAcademicas=range(1,$numeroAcademicas);
 
 
 print_r($rangoAcademicas);
 echo $numeroAcademicas;
 
 

//  echo( "NUMERO ACADEMICAS: ".$numeroAcademicas."   ");


 $numeroAcademicas=$_POST["numExAcademicas"];
 $numeroProfesionales=$_POST["numExProfesionales"];



 

//  $academica=$_POST["numAcademica"];

//  if($academica==0)
//  {
//      if(isset($_POST["academica"]))
//      {

//          $arreglo=$_POST["academica"];
         

//      }
    
//  }else
//  {
    $arreglo=array();
     foreach($rangoAcademicas as $numero)
     {
        //  echo($numeroAcademicas);
        echo "ESTE ES EL NUMERO: ".$numero;
        // array_push($arreglo,$_POST["academica".$numero]);
        
     }
  
    //  print_r($arreglo);

     
//  }
//  print_r($arreglo);




?>