<?php

$limit = 3;
$titleFilter = "All";
$filterType = "All";
$filterValue = "";
$totalPages = 1;

if(isset($routesArray[1])){

    /*=============================================
    Filtrar cursos por categorías
    =============================================*/

    $select = "img_course,title_course,name_instructor,score_course,price_course,url_course,date_updated_course,subtitle_course,outcomes_course,id_coupon_course,id_course,title_category"; 

    $url = "relations?rel=courses,categories,instructors&type=course,category,instructor&linkTo=url_category,status_course&equalTo=".$routesArray[1].",1&orderBy=id_course&orderMode=DESC&startAt=0&endAt=".$limit."&select=".$select;
    $method = "GET";
    $fields = array();

    $getCourses = CurlController::request($url,$method,$fields);

    if($getCourses->status == 200){

        $courses = $getCourses->results;

        $url = "relations?rel=courses,categories,instructors&type=course,category,instructor&linkTo=url_category,status_course&equalTo=".$routesArray[1].",1&select=id_course";
        $getTotalCourses = CurlController::request($url,$method,$fields)->total;
        $totalPages = ceil($getTotalCourses/$limit);

        $titleFilter = urldecode($courses[0]->title_category);
        $filterType = "Categories";
        $filterValue = $routesArray[1];

    }else{

        /*=============================================
        Filtrar cursos por subcategorías
        =============================================*/

        $select = "img_course,title_course,name_instructor,score_course,price_course,url_course,date_updated_course,subtitle_course,outcomes_course,id_coupon_course,id_course,title_subcategory"; 

        $url = "relations?rel=courses,subcategories,instructors&type=course,subcategory,instructor&linkTo=url_subcategory,status_course&equalTo=".$routesArray[1].",1&orderBy=id_course&orderMode=DESC&startAt=0&endAt=".$limit."&select=".$select;
        $method = "GET";
        $fields = array();

        $getCourses = CurlController::request($url,$method,$fields);

        if($getCourses->status == 200){

            $courses = $getCourses->results;

            $url = "relations?rel=courses,subcategories,instructors&type=course,subcategory,instructor&linkTo=url_subcategory,status_course&equalTo=".$routesArray[1].",1&select=id_course";
            $getTotalCourses = CurlController::request($url,$method,$fields)->total;
            $totalPages = ceil($getTotalCourses/$limit);

            $titleFilter = urldecode($courses[0]->title_subcategory);
            $filterType = "Subcategories";
            $filterValue = $routesArray[1];     

        }else{

            $courses = array();
        }
        
    }

}else if(isset($_GET["query"])){

    /*=============================================
    Filtrar cursos por buscador
    =============================================*/

    $linkTo = ["title_course","subtitle_course","name_instructor"];

    $select = "img_course,title_course,name_instructor,score_course,price_course,url_course,date_updated_course,subtitle_course,outcomes_course,id_coupon_course,id_course"; 

    foreach ($linkTo as $key => $value) {
        
        $url = "relations?rel=courses,instructors&type=course,instructor&linkTo=".$value.",status_course&search=".urlencode($_GET["query"]).",1&orderBy=id_course&orderMode=DESC&startAt=0&endAt=".$limit."&select=".$select;
    
        $method = "GET";
        $fields = array();

        $getCourses = CurlController::request($url,$method,$fields);

        if($getCourses->status == 200){

            $courses = $getCourses->results;

            $url = "relations?rel=courses,instructors&type=course,instructor&linkTo=".$value.",status_course&search=".urlencode($_GET["query"]).",1&select=id_course";
            $getTotalCourses = CurlController::request($url,$method,$fields)->total;
            $totalPages = ceil($getTotalCourses/$limit);

            $titleFilter = urldecode($_GET["query"]);
            $filterType = "Search";
            $filterValue = $_GET["query"];     

            break;
        
        }else{

            $courses = array();
        }
    }


}else{

    /*=============================================
    Todos los cursos
    =============================================*/

    $select = "img_course,title_course,name_instructor,score_course,price_course,url_course,date_updated_course,subtitle_course,outcomes_course,id_coupon_course,id_course"; 

    $url = "relations?rel=courses,instructors&type=course,instructor&linkTo=status_course&equalTo=1&orderBy=id_course&orderMode=DESC&startAt=0&endAt=".$limit."&select=".$select;
    $method = "GET";
    $fields = array();

    $getCourses = CurlController::request($url,$method,$fields);

    if($getCourses->status == 200){

        $courses = $getCourses->results;

        $url = "academy?custom=".urlencode("SELECT COUNT(*) AS total FROM courses WHERE status_course = 1");
        $getTotalCourses = CurlController::request($url,$method,$fields)->results[0]->total;
        $totalPages = ceil($getTotalCourses/$limit);
    
    }else{

        $courses = array();
    }

}


include "modules/breadcrumb/breadcrumb.php";

?>

 <!-- =====================================
Course Content
====================================== -->

<section class="category-course-list-area">

    <input type="hidden" id="filterType" value="<?php echo $filterType ?>">
    <input type="hidden" id="filterValue" value="<?php echo $filterValue ?>">
    <input type="hidden" id="limit" value="<?php echo $limit ?>">

    <div class="container">
        
        <div class="category-filter-box filter-box clearfix">
            <span>Showing on this page : <span class="titleFilter"><?php echo $titleFilter ?></span></span>

            <a href="#" class="typeInterfaz" interfaz="grid" style="float: right; font-size: 19px; margin-left: 5px;">
                <i class="fas fa-th"></i>
            </a>
            
            <a href="#" class="typeInterfaz" interfaz="list" style="float: right; font-size: 19px;">
                <i class="fas fa-th-list"></i>
            </a>

            <a href="/courses" style="float: right; font-size: 19px; margin-right: 5px;"><i
                class="fas fa-sync-alt"></i>
            </a>

        </div>

        <div class="row">

            <div class="col-lg-3 filter-area">

                <?php 

                    include "modules/filters/filters.php";

                ?>

            </div>

            <div class="col-lg-9">

        	<?php

                if(!empty($courses)){
	
            		include "modules/grid/grid.php";
            		include "modules/list/list.php";

                }else{

                    echo '<div class="jumbotron jumbotron-fluid rounded bg-white">
                          <div class="container text-center">
                            <h1>Ups! Aún no hay cursos</h1>      
                            <p>Próximamente habrán cursos disponibles en esta búsqueda</p>
                          </div>';
                }
        	?>

            <?php if (!empty($courses)): ?>

                <!--=========================================
                Paginación
                ===========================================-->

                <div class="d-flex justify-content-center">

                    <div class="mb-3" id="cont-pagination">

                        <ul id="pagination" class="pagination pagination-sm rounded" totalPages="<?php echo $totalPages ?>">
                        </ul>

                    </div>

                </div>  
                
            <?php endif ?>

            </div>

        </div>

    </div>

</section>

<script src="/views/assets/js/courses/courses.js"></script>