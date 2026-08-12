<?php

if(isset($routesArray[2])){

    $totalLections = 0;

    /*=============================================
    Traer el curso
    =============================================*/
    $select = "id_course,title_course,subtitle_course";
    $url = "courses?linkTo=url_course&equalTo=".$routesArray[2]."&select=".$select;
    $method = "GET";
    $fields = array();

    $getCourse  = CurlController::request($url,$method,$fields);

    if($getCourse->status == 200){

        $course = $getCourse->results[0];
        
        /*=============================================
        Validar que el curso si lo haya comprado el estudiante
        =============================================*/

        $url = "relations?rel=sales,students&type=sale,student&linkTo=id_student_sale,id_course_sale,status_sale&equalTo=".$_SESSION["student"]->id_student.",".$course->id_course.",PAID&select=id_sale,lectures_student";

        $getSale = CurlController::request($url,$method,$fields);

        if($getSale->status == 200){

            /*=============================================
            Capturar lecturas de este estudiante
            =============================================*/
            $lectures = json_decode($getSale->results[0]->lectures_student,true) ?? array();
            
            $lecturesProperty = array_merge(...array_map(
                fn($item) => $item[$course->id_course] ?? [],
                $lectures
            ));

            /*=============================================
             Agregar secciones al curso
            =============================================*/    

            $url = "sections?linkTo=id_course_section,status_section&equalTo=".$course->id_course.",1";
            $getSections = CurlController::request($url,$method,$fields);

            if($getSections->status == 200){

                $course->sections = $getSections->results;
               
                
                foreach ($course->sections as $key => $value) {

                    /*=============================================
                    Agregar lecciones al curso
                    =============================================*/

                    $url = "lections?linkTo=id_section_lection,id_course_lection,status_lection&equalTo=".$value->id_section.",".$course->id_course.",1";
                    $getLections = CurlController::request($url,$method,$fields);

                    if($getLections->status == 200){

                        $value->lections = $getLections->results;
                        $totalLections += $getLections->total;

                        foreach ($value->lections as $index => $item) {

                            /*=============================================
                            Agregar adjuntos al curso
                            =============================================*/

                            $url = "attachments?linkTo=id_lection_attachment,id_course_attachment,status_attachment&equalTo=".$item->id_lection.",".$course->id_course.",1";
                            $getAttachment = CurlController::request($url,$method,$fields);

                            if($getAttachment->status == 200){

                                $item->attachment = $getAttachment->results;

                            }else{

                                $item->attachment = array();
                            }

                        }
                    
                    }else{

                        $value->lections = array();

                    }


                }

            }else{


                $course->sections = array();
            }

        }else{

            echo "<script> window.location='/' </script>";

            return;
        }

    }else{

        echo "<script> window.location='/' </script>";

        return;
    }

}else{

    echo "<script> window.location='/' </script>";

    return;
}

?>

<?php include "breadcrumb/breadcrumb.php" ?>

 <!-- =====================================
Lessons
====================================== -->

<section class="lessons-area">
    <div class="container-fluid">
        <div class="row">

            <input type="hidden" id="tokenStudent" value="<?php echo $_SESSION["student"]->token_student ?>">
            
            <!-- Video Player and Content -->
            <div class="col-lg-9 p-0">
                
                <!-- Video Player -->
                <?php include "video/video.php" ?>

                <!-- Tabs Navigation -->
                <div class="lesson-tabs-section bg-white">

                    <?php include "tabs/tabs.php" ?>
                   
                </div>

            </div>

            <!-- Course Content Sidebar -->
            <div class="col-lg-3 bg-light p-0">
                <?php include "content/content.php" ?>
            </div>

        </div>
    </div>
</section>