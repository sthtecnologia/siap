<?php 

if(!isset($_SESSION["student"])){

    echo "<script> window.location='/';<script>";

    return;
}

if(!isset($routesArray[1])){

    include "courses/courses.php";

}else{

    if($routesArray[1] == "account" || $routesArray[1] == "lections" || $routesArray[1] == "courses"){

        include $routesArray[1]."/".$routesArray[1].".php";

    }else{

        include "courses/courses.php";

    }
}


?>


