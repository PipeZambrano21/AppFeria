<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Controlador/user.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Daos/EmpresaDAO.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Entidades/Empresa.php');
session_start();
if (!isset($_SESSION['user'])) {

    header("location: ../index.php");
} else if (!$_SESSION['tipo'] == 3) {
    header("location: ../index.php");
}


$user = new Usuario();
$empresa_dao = new EmpresaDAO();
$user->setUser($_SESSION['user']);
$codigo= $user->darCodigo();
$empresa = $empresa_dao->devolverEmpresa($codigo);

$nombreContacto = $empresa_dao->devolverNombreContacto($codigo);

?>


<?php

include('menuEmpresa.php');
include('Header.php');
?>
<head>
<meta charset="utf-8">

</head>
<div class="content-wrapper">
    <div class="content">
        <div class="bg-white border rounded">

            <div class="row no-gutters">
                <div class="col-lg-4 col-xl-3">
                    <div class="profile-content-left pt-5 pb-3 px-3 px-xl-5">
                        <div class="card text-center widget-profile px-0 border-0">
                            <div class="card-img mx-auto rounded-circle">
                                <img src="assets/img/user/u6.jpg" alt="user image">
                            </div>
                            <div class="card-body">
                                <h4 class="py-2 text-dark">Albrecht Straub</h4>
                                
                            </div>
                        </div>

                        <hr class="w-100">

                    </div>
                </div>
                <div class="col-lg-8 col-xl-9">
                    <div class="profile-content-right py-5">
                        <ul class="nav nav-tabs px-3 px-xl-5 nav-style-border" id="myTab" role="tablist">

                        </ul>
                        <div class="tab-content px-3 px-xl-5" id="myTabContent">
                            <div class="tab-pane fade" id="timeline" role="tabpanel" aria-labelledby="timeline-tab">




                            </div>


                            <div class="tab-pane fade show active" id="settings" role="tabpanel" aria-labelledby="settings-tab">
                                <div class="mt-5">
                                    <form action="javascript: EditarPerfil();" method="POST" id="formEditar" name="formEditar">
                                        <div class="form-group row mb-6">
                                        <label for="coverImage" class="col-sm-4 col-lg-2 col-form-label">Logo nuevo</label>
                                        <div class="col-sm-8 col-lg-10">
                                            <div class="custom-file mb-1">
                                                <input type="file" class="custom-file-input" id="coverImage" value="<?php echo($empresa->getLogoEmpresa()) ?>" >
                                                <label class="custom-file-label" for="coverImage">Seleccione un archivo...</label>
                                                <div class="invalid-feedback"></div>
                                            </div>
                                        </div>
                                    </div>
                                        <div class="row mb-2">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="firstName">Nombre</label>
                                                    <input type="text" class="form-control" name="razonSocial" id="razonSocial" value="<?php echo($empresa->getRazonSocial()) ?>" required>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="lastName">NIT
                                                    </label>
                                                    <input type="text" class="form-control" name="nitEmpresa" id="nitEmpresa" value="<?php echo($empresa->getNitEmpresa()) ?>" required> 
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group mb-4">
                                            <label for="email">Correo</label>
                                            <input type="email" class="form-control" name="correoEmpresa" id="correoEmpresa" value="<?php echo($empresa->getCorreoEmpresa()) ?>" readonly>
                                        </div>
                                        <div class="form-group mb-4">
                                            <label for="userName">Nombre del contacto</label>
                                            <input type="text" class="form-control" name="contactoEmpresa" id="contactoEmpresa" value="<?php echo($nombreContacto) ?>" readonly >
                                            <span class="d-block mt-1"></span>
                                        </div>

                                        <div class="form-group mb-4">
                                            <label for="telefono">Telefono</label>
                                            <input type="text" class="form-control" name="telefonEmpresa" id="telefonEmpresa" value="<?php echo($empresa->getTelefonEmpresa()) ?>" maxlength="30" required>
                                        </div>
                                    

                                        <div class="form-group mb-4">
                                            <label for="oldPassword">Contraseña anterior</label>
                                            <input type="password" class="form-control" id="oldPassword" required>
                                        </div>

                                        <div class="form-group mb-4">
                                            <label for="newPassword">Contraseña nueva</label>
                                            <input type="password" class="form-control" id="newPassword" >
                                        </div>

                                        <div class="form-group mb-4">
                                            <label for="conPassword">Confirmar contraseña</label>
                                            <input type="password" class="form-control" id="conPassword" >
                                        </div>

                                        <div class="form-group mb-4">
                                            <label for="conPassword">Descripción</label>
                                            <textarea type="" class="form-control" id="descripcionEmpresa" name="descripcionEmpresa" cols="40" rows="9" value="<?php echo($empresa->getDescripcionEmpresa()) ?>" maxlength="1200" required> 
                                            </textarea>
                                        </div>

                                        <div class="d-flex justify-content-end mt-5">
                                            <button type="submit" class="btn btn-primary mb-2 btn-pill">Aceptar</button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   <!-- js placed at the end of the document so the pages load faster -->
   <script src="../assets/js/jquery.js"></script>
        <script src="../assets/js/jquery-1.8.3.min.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>
        <script class="include" type="text/javascript" src="../assets/js/jquery.dcjqaccordion.2.7.js"></script>
        <script src="../assets/js/jquery.scrollTo.min.js"></script>
        <script src="../assets/js/jquery.nicescroll.js" type="text/javascript"></script>
        <script src="../assets/js/jquery.sparkline.js"></script>


        <!--common script for all pages-->
        <script src="../assets/js/common-scripts.js"></script>

        <script type="text/javascript" src="../assets/js/gritter/js/jquery.gritter.js"></script>
        <script type="text/javascript" src="../assets/js/gritter-conf.js"></script>

        <!--script for this page-->
        <script src="../assets/js/sparkline-chart.js"></script>
        <script src="../assets/js/zabuto_calendar.js"></script>

        <script>
        function EditarPerfil(){
            datos = $('#formEditar').serialize();
        
                    $.ajax({
                        type: "POST",
                        data: datos,
                        url: "Editar_Perfil_Empresa.php",
                        success: function(r) {

                            console.log(r);

                            if (r == 0) {
                              
                                
                            } else {

                            }
                        }
                    });
        }

    </script>
</body>


<?php
    include('Footer.php')

    ?>