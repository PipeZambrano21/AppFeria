<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Controlador/user.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Modelo/Daos/EstudianteDAO.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Modelo/Entidades/Estudiante.php');
session_start();
if (!isset($_SESSION['user'])) {

    header("location: ../index.php");
} else if (!$_SESSION['tipo'] == 2) {
    header("location: ../index.php");
}

$user = new Usuario();
$estudiante_dao = new EstudianteDAO();
$user->setUser($_SESSION['user']);
$codigo = $user->darCodigo();
$estudiante = $estudiante_dao->devolverEstudiante($codigo);

?>
<?php
include('menuEstudiante.php');
include('Header.php');
?>

<div class="content-wrapper">
    <div class="content">
        <link href="../assets/plugins/nprogress/nprogress.css" rel="stylesheet" />
        <!-- SLEEK CSS -->
        <link id="sleek-css" rel="stylesheet" href="../assets/css/sleek.css" />
        <!-- FAVICON -->
        <link href="../assets/img/favicon.png" rel="shortcut icon" />
        <!--
    HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries
  -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
        <script src="../assets/plugins/nprogress/nprogress.js"></script>
        </head>

        <style>
            body {
                background-color: #CCCCCC;
                background-image: url(../assets/img/UEB.jpg);
            }
        </style>


        <div class="row justify-content-center mt-5">
            <div class="col-lg-8 col-sm-offset-1">
                <div class="card card-default">
                    <div class="card-header card-header  d-flex justify-content-center">
                        <center> <img src="../assets/img/logo.png" style="width:180px ;" alt=""></center>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-pills nav-justified nav-style-fill" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home3-tab" data-toggle="tab" href="#home3" role="tab" aria-controls="home3" aria-selected="true">Datos Personales</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile3-tab" data-toggle="tab" href="#profile3" role="tab" aria-controls="profile3" aria-selected="false">Contenido General</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile3-tab" data-toggle="tab" href="#profile4" role="tab" aria-controls="profile4" aria-selected="false">Referencias</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent4">
                            <div class="tab-pane pt-3 fade show active" id="home3" role="tabpanel" aria-labelledby="home3-tab">

                                <?php include_once 'datosPersonalesCV.php'; ?>

                                <!--  fin del primer tab-->
                            </div>
                            <div class="tab-pane pt-3 fade" id="profile3" role="tabpanel" aria-labelledby="profile3-tab">
                                <?php include_once 'contenidoGeneralCV.php'; ?>
                            </div>
                            <div class="tab-pane pt-3 fade" id="profile4" role="tabpanel" aria-labelledby="profile3-tab">
                                <?php include_once 'referenciasCV.php'; ?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>




<script src="../assets/plugins/jquery/jquery.min.js"></script>
<script src="../assets/plugins/slimscrollbar/jquery.slimscroll.min.js"></script>
<script src="../assets/plugins/jekyll-search.min.js"></script>
<script src="../assets/js/sleek.bundle.js"></script>
<script src="../assets/plugins/select2/js/select2.min.js"></script>
<script src="../assets/plugins/jquery-mask-input/jquery.mask.min.js"></script>
<script>
    $(document).ready(function() {
        $("#wizard-picture").change(function() {
            readURL(this);
        });
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#wizardPicturePreview').attr('src', e.target.result).fadeIn('slow');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<?php

include('Footer.php')

?>
</div>
</div>



