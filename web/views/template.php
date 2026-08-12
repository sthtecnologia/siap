<?php
/*=============================================
Iniciar variables de sesión
=============================================*/

ob_start();
session_start();

/*=============================================
Capturar parámetros de la url
=============================================*/

$routesArray = explode("/",$_SERVER["REQUEST_URI"]);
array_shift($routesArray);


foreach ($routesArray as $key => $value) {
   
   $routesArray[$key] = explode("?", $value)[0];
   
}

?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Plataforma de Educación Online</title>
        <meta http-equiv="Content-Type"  content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!--=============================================
        CUSTOM JS SERVER
        ===============================================-->

        <script src="/views/assets/js/alerts/alerts.js"></script>

        <!-- <base href="views/"> -->

        <link name="favicon" type="image/x-icon" href="/views/assets/img/icons/favicon.png" rel="shortcut icon">
        <link rel="favicon" href="/views/assets/img/icons/favicon.ico">
        <link rel="apple-touch-icon" href="/views/assets/img/icons/icon.png">
        <link rel="stylesheet" href="/views/assets/css/jquery.webui-popover.min.css">
        <link rel="stylesheet" href="/views/assets/css/select2.min.css">
        <link rel="stylesheet" href="/views/assets/css/slick.css">
        <link rel="stylesheet" href="/views/assets/css/slick-theme.css">
        <link rel="stylesheet" href="/views/assets/css/fontawesome-all.min.css">
        <link rel="stylesheet" href="/views/assets/css/bootstrap.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="/views/assets/css/bootstrap-tagsinput.css">
        <link rel="stylesheet" href="/views/assets/css/main.css">
        <link rel="stylesheet" href="/views/assets/css/responsive.css">
        <!-- <link href="css" rel="stylesheet"> -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700" rel="stylesheet">
        <link rel="stylesheet" href="/views/assets/css/toastr.css">
        <link rel="stylesheet" href="/views/assets/css/jquery.nestable.min.css">
        <link rel="stylesheet" href="https://unpkg.com/plyr@3.8.4/dist/plyr.css" />
        <!-- https://www.jqueryscript.net/demo/Google-Inbox-Style-Linear-Preloader-Plugin-with-jQuery-CSS3/#google_vignette -->
        <link rel="stylesheet" href="/views/assets/plugins/material-preloader/material-preloader.css">
        <!-- https://codeseven.github.io/toastr/demo.html -->
        <link rel="stylesheet" href="/views/assets/plugins/toastr/toastr.min.css">
       

        <!--=====================================
        Scripts Plugin
        ======================================-->

        <script src="/views/assets/js/vendor/modernizr-3.5.0.min.js"></script>
        <script src="/views/assets/js/jquery-3.3.1.min.js"></script>
        <!-- <script src="/views/assets/js/vendor/jquery-3.2.1.min.js"></script> -->
        <script src="/views/assets/js/popper.min.js"></script>
        <script src="/views/assets/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="/views/assets/js/slick.min.js"></script>
        <script src="/views/assets/js/select2.min.js"></script>
        <script src="/views/assets/js/tinymce.min.js"></script>
        <script src="/views/assets/js/multi-step-modal.js"></script>
        <script src="/views/assets/js/jquery.webui-popover.min.js"></script>
        <script src="/views/assets/js/O7BMTay5.js"></script>   
        <script src="/views/assets/js/toastr.min.js"></script>
        <!-- https://sweetalert2.github.io/ -->
        <script src="/views/assets/plugins/sweetalert/sweetalert.min.js"></script> 
        <!-- https://www.jqueryscript.net/demo/Google-Inbox-Style-Linear-Preloader-Plugin-with-jQuery-CSS3/ -->
        <script src="/views/assets/plugins/material-preloader/material-preloader.js"></script> 
        <!-- https://codeseven.github.io/toastr/demo.html -->
        <script src="/views/assets/plugins/toastr/toastr.min.js"></script>
        <script
            src="/views/assets/js/jquery.nestable.min.js"
            charset="utf-8"
        ></script>
        <script
            src="/views/assets/js/jquery.form.min.js"
            integrity="sha384-FzT3vTVGXqf7wRfy8k4BiyzvbNfeYjK+frTVqZeNDFl8woCbF0CYG6g2fMEFFo/i"
            crossorigin="anonymous"
        ></script>
        <script src="/views/assets/js/bootstrap-tagsinput.min.js"></script>

        <!-- http://josecebe.github.io/twbs-pagination/ -->
        <script src="/views/assets/plugins/twbs-pagination/twbs-pagination.min.js"></script>
        <script src="https://unpkg.com/plyr@3.8.4/dist/plyr.js"></script>

    </head>

    <body
        class="gray-bg"
        cz-shortcut-listen="true"
    >

        <?php
        include "modules/preload/preload.php";
        include "modules/menu/menu.php";

        if(!empty($routesArray[0])){

            if($routesArray[0] == "courses" || 
               $routesArray[0] == "course" || 
               $routesArray[0] == "checkout" || 
               $routesArray[0] == "login" ||
               $routesArray[0] == "logout" ||
               $routesArray[0] == "register" ||
               $routesArray[0] == "student" ||
               $routesArray[0] == "about" || 
               $routesArray[0] == "policy" ||
               $routesArray[0] == "terms"){

                include "pages/".$routesArray[0]."/".$routesArray[0].".php";

            }else{

                include "pages/home/home.php";
            }


        }else{

            include "pages/home/home.php";
        }

      

        include "modules/footer/footer.php";

       ?>

        <!--=====================================
        Scripts Custom
        ======================================-->

        <script src="/views/assets/js/main.js"></script>
        <script src="/views/assets/js/custom.js"></script>
        <script src="/views/assets/js/cart/cart.js"></script>
        <script src="/views/assets/js/student/student.js"></script>

    </body>

</html>
