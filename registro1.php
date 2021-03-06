<!DOCTYPE html>
<html lang="en">

<head>

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="description"
            content="Sleek Dashboard - Free Bootstrap 4 Admin Dashboard Template and UI Kit. It is very powerful bootstrap admin dashboard, which allows you to build products like admin panels, content management systems and CRMs etc.">


        <title></title>

        <!-- GOOGLE FONTS -->




        <link id="sleek-css" rel="stylesheet" href="assets/css/sleek.css" />
        <link href="assets/plugins/toastr/toastr.min.css" rel="stylesheet" />
        <script src="assets/plugins/nprogress/nprogress.js"></script>
    </head>

</head>
<style>
body {
    background-color: #CCCCCC;
    background-image: url(assets/img/UEB.jpg);
    background-size:  100% 100%;

}
</style>

<body class="" id="body">

    <div class="container d-flex flex-column justify-content-between vh-30">
        <div class="row justify-content-center mt-5">
            <div class="col-lg-8 col-sm-offset-1">
                <div class="card card-default">
                    <div class="card-header card-header  d-flex justify-content-center">
                        <img src="assets/img/logo.png" style="width:150px ;" alt="">
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-pills nav-justified nav-style-fill" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home3-tab" data-toggle="tab" href="#home3" role="tab"
                                    aria-controls="home3" aria-selected="true">Registro Empresa</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile3-tab" data-toggle="tab" href="#profile3" role="tab"
                                    aria-controls="profile3" aria-selected="false">Registro Estudiante</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent4">
                            <div class="tab-pane pt-3 fade show active" id="home3" role="tabpanel"
                                aria-labelledby="home3-tab">

                                <?php include_once 'registro_empresa.php'; ?>

                                <!--  fin del primer tab-->
                            </div>
                            <div class="tab-pane pt-3 fade" id="profile3" role="tabpanel"
                                aria-labelledby="profile3-tab">
                                <?php include_once 'registro_estudiante.php'; ?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <p class="text-center">&copy; 2018 Copyright Sleek Dashboard Bootstrap Template by
        <a class="text-primary" href="http://www.iamabdus.com/" target="_blank">Abdus</a>.
    </p>
    </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.16/vue.min.js"> </script>
    <script src="https://cdn.emailjs.com/dist/email.min.js" type="text/javascript"> </script>
    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <script src="assets/plugins/slimscrollbar/jquery.slimscroll.min.js"></script>
    <script src="assets/plugins/jekyll-search.min.js"></script>
    <script src="assets/js/sleek.bundle.js"></script>
    <script src="assets/plugins/select2/js/select2.min.js"></script>
    <script src="assets/plugins/jquery-mask-input/jquery.mask.min.js"></script>

    <script src="assets/plugins/toastr/toastr.min.js"></script>

    <script>
    $(document).ready(function() {
        $("#logo").change(function() {
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


</body>

</html>