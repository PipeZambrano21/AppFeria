<?php
session_start();
if (!isset($_SESSION['user'])) {

    header("location: ../index.php");
} else if (!($_SESSION['tipo'] == 1 || $_SESSION['tipo'] == 4)) {
    header("location: index.php");
}


include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Modelo/Entidades/Empresa.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/ProyectoFeria/AppFeria/Controlador/ControladorEmpresa.php');

$objeto = new ControladorEmpresas();
$lista = $objeto->darListaEmpresasInscritas();
?>


<link href="../assets/plugins/nprogress/nprogress.css" rel="stylesheet" />
<link href="../assets/plugins/daterangepicker/daterangepicker.css" rel="stylesheet" />
<link href="../assets/plugins/data-tables/datatables.bootstrap4.min.css" rel="stylesheet" />
<link href="../assets/plugins/data-tables/responsive.datatables.min.css" rel="stylesheet" />
<?php

include('Header.php');
include('menuAdmi.php')


?>


<div class="content-wrapper">
    <div class="content">
        <div class="breadcrumb-wrapper">
            <h1>Empresas inscritas</h1>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb p-0">
                    <li class="breadcrumb-item">
                        <a href="IndexAdmi.php">
                            <span class="mdi mdi-home"></span>
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        Empresas
                    </li>
                    <li class="breadcrumb-item" aria-current="page">Validar</li>
                </ol>
            </nav>

        </div>

        <div class="row">
            <div class="col-12">
                <div class="card card-default">


                    <div class="card-body">
                        <div class="responsive-data-table">
                            <table id="tabladatatable" class="table dt-responsive nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Nombre Empresa</th>
                                        <th>NIT</th>
                                        <th>Telefono</th>
                                        <th>Correo</th>
                                        <th>Camara Comercio</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <?php
                                    foreach ($lista as $key) {
                                        echo ("<tr>");
                                        echo ("<td>" . $key[2] . "</td>");
                                        echo ("<td>" . $key[1] . "</td>");
                                        echo ("<td>" . $key[3] . "</td>");
                                        echo ("<td>" . $key[4] . "</td>");
                                        echo ("<td> <button type='button' class='mb-1 btn btn-primary'>
                                                <i class='mdi mdi-star-outline mr-1'></i>PDF</button> </td>");
                                        echo ("<td> <button type='button' class='mb-1 btn btn-success' onclick='aceptar(".'"'.$key[0].'"'.")'>Aceptar</button>
                                        <button type='button' class='mb-1 btn btn-danger'>Rechazar</button></td>");
                                    ?>


                                    <?php

                                        echo ("</tr>");
                                    }

                                    ?>




                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                        </div>
                    </div>
                </div>



                <script src="../assets/plugins/data-tables/jquery.datatables.min.js"></script>
                <script src="../assets/plugins/data-tables/datatables.bootstrap4.min.js"></script>



    <script src="../assets/plugins/data-tables/datatables.responsive.min.js"></script>
    <script>
        jQuery(document).ready(function() {
            jQuery('#responsive-data-table').DataTable({
                "aLengthMenu": [
                    [20, 30, 50, 75, -1],
                    [20, 30, 50, 75, "All"]
                ],
                "pageLength": 20,
                "dom": '<"row justify-content-between top-information"lf>rt<"row justify-content-between bottom-information"ip><"clear">'
            });
        });
    </script>

    <script>
        function aceptar(cod){
            console.log(cod);
            window.location.href='aceptarEmpresa.php?action='+cod;
        }
    </script>




    <?php


    include('Footer.php')

    ?>