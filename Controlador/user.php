<?php 
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/conexion/db.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Entidades/Empresa.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Entidades/Administrador.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Entidades/Estudiante.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Entidades/ContactoEmpresa.php');
/*   
tipo 1 admin
tipo 2 estudiante
tipo 3 empresa
tipo 4 admin-auditor
*/
class Usuario extends DB{

    private $tipoUsuario;
    private $nombreUsuario;
    private $correo;
    private $contacto_empresa;
    private $codigo;
    private $codigo2;


    public function darnombreContactoE(){
        return $this->contacto_empresa;
    }
    public function getTipoUsuario(){
        return $this->tipoUsuario;
    }

    public function darCorreo(){
        return $this->correo;
    }
    public function darNombreUsuario(){
        return $this->nombreUsuario;
    }
    public function darIngreso($user,$pass){
        $md5pass =md5($pass);
        $query=$this->connect()->prepare('SELECT * FROM usuario WHERE USER_USUARIO=:user and CONTRA_USUARIO=:cont');
        $query->execute(['user'=>$user,'cont'=>$md5pass]);
        if($query->rowCount()){
            foreach ($query as $kk) {
                $thipou=$kk['COD_TIPO_USUARIO'];
                return $thipou;
            }
        }else{ 
            return 0;
        }
    }

    public function darCodigo(){

        
        return $this->codigo;

    }

    public function darCodigo2(){

        
        return $this->codigo;

    }

    public function setUser($usuario){
        $query=$this->connect()->prepare('SELECT * FROM usuario WHERE USER_USUARIO=:user');
        $query->execute(['user'=>$usuario]);
        if($query->rowCount()){
            foreach ($query as $kk) {
                $thipou=$kk['COD_TIPO_USUARIO'];
                $cod_usuario=$kk['COD_USUARIO'];
                $this->codigo=$cod_usuario;
                $this->tipoUsuario= $thipou;
                if($thipou==1 || $thipou==4){
                    $query=$this->connect()->prepare('SELECT * FROM administrador WHERE COD_USUARIO=:id');
                    $query->execute(['id'=>$cod_usuario]);
                    foreach ($query as $kk) {
                        $this->nombreUsuario=$kk['NOMBRE_ADMINISTRADOR']." ".$kk['APELLIDO_ADMINISTRADOR'];
                        $this->correo=$kk['CORREO_ADMINISTRADOR'];
                    }
                }else if($thipou==2){
                    $query=$this->connect()->prepare('SELECT * FROM estudiante WHERE COD_USUARIO=:id');
                    $query->execute(['id'=>$cod_usuario]);
                    foreach ($query as $kk) {
                        $this->nombreUsuario=$kk['NOMBRE_ESTUDIANTE']." ".$kk['APELLIDO_ESTUDIANTE'];
                        $this->correo=$kk['CORREO_ESTUDIANTE'];
                    }
                }else {
                    $query=$this->connect()->prepare('SELECT * FROM infoempresa_contacto WHERE COD_USUARIO=:id');
                    $query->execute(['id'=>$cod_usuario]);
                    foreach ($query as $kk) {
                        $this->nombreUsuario=$kk['RAZON_SOCIAL'];
                        $this->correo=$kk['CORREO_CONTACTO'];
                        $this->contacto_empresa=$kk['NOM_CONTACTO']." ".$kk['APELLIDO_CONTACTO'];
                    }
                }
            }
        }
    }


}

?>