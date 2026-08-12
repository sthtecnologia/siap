<?php

$notification = 0;

if(isset($_GET["ref"]) && isset($_GET["PayerID"])){

  $url = "orders?linkTo=status_order,id_student_order,reference_order&equalTo=PENDING,".$_SESSION["student"]->id_student.",".$_GET["ref"]."&select=id_pay_order,id_order";
  $method = "GET";
  $fields = array();

  $getOrder = CurlController::request($url,$method,$fields);

  if($getOrder->status == 200){

    $order = $getOrder->results[0];
    
    /*=============================================
    Validamos el pago en PayPal
    =============================================*/

    $url = "v2/checkout/orders/".$order->id_pay_order;
    $paypal = CurlController::paypal($url,$method,$fields);

    if(isset($paypal->status) && $paypal->status == "APPROVED"){

      $url = "orders?id=".$order->id_order."&nameId=id_order&token=".$_SESSION["student"]->token_student."&table=students&suffix=student";
      $method = "PUT";
      $fields = "status_order=PAID";

      $updateOrder = CurlController::request($url,$method,$fields);

      $url = "sales?id=".$order->id_order."&nameId=id_order_sale&token=".$_SESSION["student"]->token_student."&table=students&suffix=student";
      $method = "PUT";
      $fields = "status_sale=PAID";

      $updateSales = CurlController::request($url,$method,$fields);

      if($updateOrder->status == 200 && $updateSales->status == 200){

        $notification = 1;

      }

    }else{

      $notification = 2;
    }

  }

}

/*=============================================
Listar cursos pagados
=============================================*/

$select = "title_course,name_instructor,picture_instructor,img_course,score_course,url_course,id_course,lectures_student";
$url = "relations?rel=sales,courses,instructors,students&type=sale,course,instructor,student&linkTo=status_sale,id_student_sale&equalTo=PAID,".$_SESSION["student"]->id_student."&select=".$select."&orderBy=id_sale&orderMode=DESC";
$method = "GET";
$fields = array();

$getCourses = CurlController::request($url,$method,$fields);

if($getCourses->status == 200){

  $courses = $getCourses->results;
 

}else{

  $courses = array();

}

?>


<section class="category-header-area">
    <div class="container-lg">
        <div class="row">
            <div class="col">
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                          <a href="/">
                            <i class="fas fa-home"></i>
                          </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#">
                                My Courses
                            </a>
                        </li>
                    </ol>
                </nav>
                <h1 class="category-name">
                 My Courses
                </h1>
            </div>
        </div>
    </div>
</section>

 <!-- =====================================
My Courses
====================================== -->

<section class="category-course-list-area mt-4 pt-1">
  
  <div class="container">

    <?php if ($notification == 1): ?>

      <div class="jumbotron bg-academy text-white p-3 mb-3">
        <h1>¡En Hora Buena!</h1>
        <p>Haz adquiridos nuevos cursos en nuestra Academia</p>
      </div>

    <?php endif ?>

    <?php if ($notification == 2): ?>

      <div class="jumbotron  bg-danger text-white p-3 mb-3">
        <h1>¡Lo sentimos!</h1>
        <p>Ha ocurrido un problema con el pago de alguno de tus cursos, comunícate con soporte</p>
      </div>

    <?php endif ?>

    <div class="row justify-content-center">
      <div class="col-lg-9">
        <div class="user-dashboard-box mt-3">

          <div class="user-dashboard-content w-100">
            
            <div class="content-title-box">
 
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Search your courses" aria-label="Search courses" id="searchMyCourse">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search"></i>
                </button>
              </div> 

            </div>
                    
            <ul class="content-box p-5" id="listCourses" style="list-style: none;">

              <?php if (!empty($courses)): ?>

                <?php foreach ($courses as $key => $item): $lectures = json_decode($item->lectures_student ,true) ?? array();  ?>

                  <li class="course-item-student mb-5">
                      <div class="row">
                          <div class="col-md-3">
                              <div class="course-thumbnail">
                                  <img src="<?php echo urldecode($item->img_course) ?>"  class="img-fluid rounded" style="width: 100%;aspect-ratio: 1.5 / 1; object-fit: cover; object-position: center; display: block;">
                              </div>
                          </div>
                          <div class="col-md-9">
                              <div class="course-info-student">
                                  <div class="d-flex justify-content-between align-items-start">
                                      <h5 class="course-title-student mb-2"><?php echo urldecode($item->title_course) ?></h5>
                                     
                                  </div>
                                  <div class="course-meta-student mb-2">

                                    <span class="me-3">
                                      <i class="fas fa-play-circle me-1"></i> 
                                      <!--===============================================
                                      TRAER TOTAL LECCIONES
                                      =================================================-->

                                      <?php

                                      $url = "academy?custom=".urlencode("SELECT COUNT(*) AS total FROM lections WHERE status_lection = 1 AND id_course_lection = $item->id_course");

                                      $getLections = CurlController::request($url,$method,$fields);

                                      $totalLections = 0;

                                      if($getLections->status == 200){

                                          $totalLections = $getLections->results[0]->total;

                                          echo 'Lectures '.$getLections->results[0]->total; 

                                      }else{

                                         echo 'Lectures 0'; 
                                      }

                                      ?>
                                    </span>

                                    <span>
                                      <i class="far fa-clock me-1"></i> 
                                      <!--===============================================
                                      TRAER DURACIÓN TOTAL
                                      =================================================-->

                                      <?php

                                      $url = "academy?custom=".urlencode("SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(duration_lection))) AS total_duration FROM lections WHERE status_lection = 1 AND id_course_lection = $item->id_course");

                                      $getDurations = CurlController::request($url,$method,$fields);

                                      if($getDurations->status == 200){

                                          if($getDurations->results[0]->total_duration == null){

                                              echo '00:00:00 Hours'; 
                                          
                                          }else{

                                              echo $getDurations->results[0]->total_duration.' Hours'; 
                                          }

                                      }else{

                                         echo '00:00:00 Hours'; 
                                      }

                                      ?>
                                    </span>
                                  </div>

                                  <?php

                                    if(!empty($lectures)){

                                      /*=============================================
                                      Capturar lecturas de este estudiante
                                      =============================================*/

                                      $lecturesProperty = array_merge(...array_map(
                                          fn($elem) => $elem[$item->id_course] ?? [],
                                          $lectures
                                      ));

                                    }else{

                                      $lecturesProperty = [];

                                    }

                                    if($totalLections == 0){

                                       $totalLections = 1;

                                    }
                                    
                                  ?>
                                  <div class="progress mb-2" style="height: 8px;">
                                      <div class="progress-bar" role="progressbar" style="width: <?php echo ceil(count($lecturesProperty)*100/$totalLections) ?>%;" aria-valuenow="28" aria-valuemin="0" aria-valuemax="100"></div>
                                  </div>
                                  <div class="d-flex justify-content-between align-items-center mb-2">
                                      <span class="text-muted small"><?php echo ceil(count($lecturesProperty)*100/$totalLections) ?>%</span>
                                  </div>
                                  
                                  <div class="d-flex justify-content-between align-items-center">
                                      <div class="instructor-info-student">
                                          <img src="<?php echo urldecode($item->picture_instructor) ?>" class="rounded-circle me-2" style="width: 30px;aspect-ratio: 1 / 1; object-fit: cover; object-position: center; display: block;">
                                          <span class="me-2"><?php echo urldecode($item->name_instructor) ?></span>
                                          <span class="text-warning">
                                              <?php for($i = 1; $i <= 5; $i++): ?>

                                                    <?php if ($i <= $item->score_course): ?>
                                                         <i class="fas fa-star"></i>
                                                    <?php else: ?>
                                                        <i class="far fa-star"></i>
                                                    <?php endif ?>
                                                    
                                                <?php endfor ?>
                                          </span>
                                      </div>
                                      <a href="/student/lections/<?php echo urldecode($item->url_course) ?>" class="btn btn-primary btn-sm">
                                          <i class="fas fa-play-circle me-1"></i> Start now
                                      </a>
                                  </div>
                                  
                              </div>
                          </div>
                      </div>
                  </li>
                  
                <?php endforeach ?>

              <?php else: ?>

                <div class="jumbotron bg-default text-dark bg-white pl-0">
                  <h1>¡Aún no tienes cursos agregados!</h1>
                  <p>Utiliza nuestro buscador de cursos y adquiérelos al instante</p>
                </div>
                
              <?php endif ?>
  
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
