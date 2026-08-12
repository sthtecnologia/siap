<!-- =====================================
course-header-area
====================================== -->

<section class="course-header-area">
    <div class="container">
        <div class="row align-items-right">
            <div class="col-lg-8">
                <div class="course-header-wrap">
                    <h1 class="title"><?php echo urldecode($course->title_course) ?></h1>
                    <p class="subtitle"><?php echo urldecode($course->subtitle_course) ?></p>
                    <div class="rating-row">

                        <?php for ($i = 1; $i <= 5; $i++): ?>

                            <?php if ($i <= $course->score_course): ?>

                                <i class="fas fa-star text-warning"></i>
                                
                            <?php else: ?>

                                <i class="fas fa-star"></i>

                            <?php endif ?>

                        <?php endfor ?>
                        <span class="d-inline-block average-rating">(<?php echo $course->score_course ?> Ratings)</span>

                        <span class="enrolled-num">
                            
                            <!--===============================================
                            TRAER TOTAL ESTUDIANTES
                            =================================================-->

                            <?php

                                $url = "academy?custom=".urlencode("SELECT COUNT(*) AS total FROM sales WHERE id_course_sale = $course->id_course");
                                $method = "GET";
                                $fields = array();

                                $getStudents = CurlController::request($url,$method,$fields);

                                if($getStudents->status == 200){

                                    echo $getStudents->results[0]->total." Students enrolled";
                                
                                }else{

                                    echo "0 Students enrolled";
                                }

                            ?>
                        </span>
                    </div>
                    <div class="created-row">
                        <span class="created-by">
                           Created by <a href="#"><?php echo urldecode($course->name_instructor) ?></a>
                        </span>
                        <span class="last-updated-date">Last updated <?php echo TemplateController::formatDate(1,urldecode($course->date_updated_course)) ?></span>
                    </div>
                </div>
                <div class="col-lg-4">

                </div>
            </div>
        </div>
</section>