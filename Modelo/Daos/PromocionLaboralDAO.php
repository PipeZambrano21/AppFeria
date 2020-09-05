<?php

include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Entidades/PromocionLaboral.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/conexion/db.php');


/**
 * Representa el DAO de la clase PromocionPostulacion
 */
class PromocionLaboralDAO
{
    
    private $con;
    private $promocion;

    
    public function __construct()
    {
        $claseCon = new DB();
        $this->con =$claseCon->connect();
    }
    
   



    public function totalVacantesActivas(){
        $sentencia = $this->con->prepare("SELECT * FROM vacantes_disponibles");
        $sentencia->execute();
        $em = array();
         while ($fila = $sentencia->fetch()) {
            $em[] = $fila;
        }
        return $em;
    }
    public function vistaPromocionLaboral(){
        $sentencia = $this->con->prepare("SELECT * FROM promocion_laboral");
        $sentencia->execute();
        $em = array();
         while ($fila = $sentencia->fetch()) {
            $em[] = $fila;
        }
        return $em;
    }
    public function detallesPostulacion($pCodigoPromocion){
        $sentencia = $this->con->prepare("SELECT * FROM promocion_laboral2 WHERE cod_promocion_laboral =" .$pCodigoPromocion);
        $sentencia->execute();
        $row = $sentencia->fetch();

        $promocion = new PromocionLaboral($row[0], $row[1],$row[2], 
        $row[3],$row[4], $row[5], $row[6], 
        $row[7],$row[8], $row[9], $row[10],$row[11], 
        $row[12],$row[13],$row[14],$row[15]);
        return $promocion;
    }
    public function verOfertas($pCodigo){
        $sentencia = $this->con->prepare("SELECT * FROM promocion_laboral WHERE cod_empresa =:empresa"); 
        $sentencia->execute(['empresa'=>$pCodigo]);
        $em = array();
         while ($fila = $sentencia->fetch()) {
            $em[] = $fila;
        }
        return $em;
    }

    public function agregarOfertas($oferta){
        $sentencia = $this->con->prepare("INSERT INTO promocion_laboral (PROMOCION_PERFIL, PROMOCION_CONOCIMIENTO_BASE, PROMOCIO_HORARIO, PROMOCION_COMPENSACION, PROMOCION_RANGO_COMPENSACION, PROMOCION_BENEFICIOS, PROMOCION_CARGO_FUNCION, PROMOCION_INICIO, PROMOCION_DESCRIPCCION, COD_EMPRESA, PROMOCION_FECHA, PROMOCION_CIUDAD, TITULO_PROMOCION, LIMITE_VACANTES, PROMOCION_ESTADO)
                                             values (:1, :2, :3, :4, :5, :6, :7, :8, :9, :10, :11, :12, :13, :14, :15"); 
        $respuesta = $sentencia->execute(['1'=>$oferta->getPromocionPerfil(), 
                                        '2'=>NULL,
                                        '3'=>$oferta->getPromocionHorario(),
                                        '4'=>$oferta->getPromocionCompensacion(),
                                        '5'=>$oferta->getPromocionRangoCompensacion(),
                                        '6'=>$oferta->getPromocionBeneficios(),
                                        '7'=>$oferta->getPromocionCargoFuncion(),
                                        '8'=>$oferta->getPromocionInicio(),
                                        '9'=>$oferta->getPromocionDescripcion(),
                                        '10'=>$oferta->getCodEmpresa(),
                                        '11'=>$oferta->getPromocionFecha(),
                                        '12'=>$oferta->getPromocionCiudad(),
                                        '13'=>$oferta->getTituloPromocion(),
                                        '14'=>$oferta->getLimiteVacantes(),
                                        '15'=>$oferta->getPromocionEstado()]);
        return $respuesta;
    }

      
    public function darPromocionXCodigo($cod){
        
        $sentencia = $this->con->prepare("SELECT * FROM promocion_laboral WHERE COD_PROMOCION_LABORAL=".$cod);
        $sentencia->execute();
        while ($fila = $sentencia->fetch()) {
            $promocion = new PromocionLaboral($fila[0],
            $fila[1],$fila[2],$fila[3],$fila[4],$fila[5],
            $fila[6],$fila[7],$fila[8],$fila[9],
            $fila[10],$fila[11],$fila[12],$fila[13],$fila[14],
            $fila[15]);
        }
        return $promocion;
    }
    
    public function editarVacante(PromocionLaboral $promocion)
    {
        $sentencia = $this->con->prepare("UPDATE promocion_laboral SET 
        promocion_perfil='".$promocion->getPromocionPerfil()."',
        promocion_conocimiento_base='".$promocion->getPromocionConocimientoBase()."',
        promocio_horario='".$promocion->getPromocionHorario()."',
        promocion_compensacion=".$promocion->getPromocionCompensacion().",
        promocion_rango_compensacion='".$promocion->getPromocionRangoCompensacion()."',
        promocion_beneficios='".$promocion->getPromocionBeneficios()."',
        promocion_cargo_funcion='".$promocion->getPromocionCargoFuncion()."',
        promocion_inicio='".$promocion->getPromocionInicio()."',
        promocion_descripccion='".$promocion->getPromocionDescripcion()."',
        promocion_fecha='".$promocion->getPromocionFecha()."',
        promocion_ciudad='".$promocion->getPromocionCiudad()."',
        titulo_promocion='".$promocion->getTituloPromocion()."',
        limite_vacantes=".$promocion->getLimiteVacantes().",
        promocion_estado=".$promocion->getPromocionEstado()." 
        WHERE COD_PROMOCION_LABORAL =".$promocion->getCodPromocion());

        $res=$sentencia->execute();
        return $res;
    }

}
?>