<?php

//include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Controlador/ControladorAdministrador.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Controlador/user.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Daos/AdministradorDAO.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/ProyectoFeria/AppFeria/Modelo/Entidades/Administrador.php');
session_start();
if (!isset($_SESSION['user'])) {

    header("location: ../index.php");
} else if (!($_SESSION['tipo'] == 1 || $_SESSION['tipo'] == 4 )) {
    header("location: index.php");
}


$user = new Usuario();
$user->setUser($_SESSION['user']);
$codigo= $user->darCodigo();

$administrador_dao = new AdministradorDAO();
$administrador = $administrador_dao->devolverAdministrador($codigo);


?>


<?php

include('menuAdmi.php');
include('Header.php');
?>

<link href="../assets/plugins/toastr/toastr.min.css" rel="stylesheet" />

<body>
    <div class="content-wrapper">
        <div class="content">
            <div class="bg-white border rounded">

                <div class="col-lg-8 col-xl-9">
                    <div class="profile-content-right py-5">
                        <ul class="nav nav-tabs px-3 px-xl-5 nav-style-border" id="myTab" role="tablist">

                        </ul>
                        <div class="tab-content px-3 px-xl-5" id="myTabContent">
                            <div class="tab-pane fade" id="timeline" role="tabpanel" aria-labelledby="timeline-tab">




                            </div>

                            <div class="tab-pane fade show active" id="settings" role="tabpanel"
                                aria-labelledby="settings-tab">
                                <div class="mt-5">
                                    <form action="javascript:editarPerfil()" method="POST" id="editarAdministrador"
                                        name="editarAdministrador">

                                        <div class="row mb-2">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="firstName">Nombres</label>
                                                    <input type="text" name="nomAdministrador" class="form-control"
                                                        id="nomAdministrador"
                                                        value="<?php echo($administrador->getNomAdministrador()) ?>">
                                                    <input type="hidden" id="codAdministrador" name="codAdministrador"
                                                        value='<?php echo($administrador->getCodAdministrador()) ?>'>
                                                    <input type="hidden" id="codUsuario" name="codUsuario"
                                                        value='<?php echo($codigo) ?>'>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="lastName">Apellidos
                                                    </label>
                                                    <input type="text" name="apellidoAdministrador" class="form-control"
                                                        id="apellidoAdministrador"
                                                        value="<?php echo($administrador->getApellidoAdministrador()) ?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group mb-4">
                                            <label for="userName">Nombre de usuario</label>

                                            <input type="text" class="form-control" name="userName" id="userName"
                                                value=<?php echo ('"'.($_SESSION['user']).'"')  ?> readonly></input>

                                            <span class="d-block mt-1"></span>
                                        </div>

                                        <div class="form-group mb-4">
                                            <label for="email">Correo</label>
                                            <input type="email" class="form-control" name="correoAdministrador"
                                                id="correoAdministrador"
                                                value="<?php echo($administrador->getCorreoAdministrador()) ?>"
                                                readonly>
                                        </div>

                                        <div class="form-group mb-4">
                                            <label for="conPassword1">Contraseña actual</label>
                                            <input type="password" class="form-control" id="conPassword1"
                                                name="conPassword1" value="">
                                        </div>


                                        <div class="form-group mb-4">
                                            <label for="newPassword">Contraseña nueva</label>
                                            <input type="password" class="form-control" id="newPassword"
                                                name="newPassword" value="">
                                        </div>

                                        <div class="form-group mb-4">
                                            <label for="conPassword">Confirmar contraseña</label>
                                            <input type="password" class="form-control" id="conPassword"
                                                name="conPassword" value="">
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

    <script src="../assets/plugins/toastr/toastr.min.js"></script>
    <script>
    
    function editarPerfil() {

        datos = $('#editarAdministrador').serialize();



        $.ajax({
            type: "POST",
            data: datos,
            url: "editar_perfil.php",
            success: function(r) {

                console.log(r);
                if (r == 1) {
                    window.location.href = "index.php";
                } if (r == 11) {
                    window.location.href = "index.php";
                } else if (r == 3) {
                    toastr["success"](r, "ERROR");
                } else {

                    toastr["success"](r, "ERROR");

                }
            }
        });

    }
    </script>
<?php

include('Footer.php')

?>