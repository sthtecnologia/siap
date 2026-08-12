
<?php if (!empty($categories)): ?>

    <?php foreach ($categories as $key => $value): ?>

        <section class="course-carousel-area">

            <div class="container-lg">

                <div class="row">

                    <div class="col">

                        <h2 class="course-carousel-title text-center">
                            <a href="/courses/<?php echo urldecode($value->url_category) ?>">
                                <?php echo urldecode($value->title_category) ?>   
                            </a>
                        </h2>

                        <div class="course-carousel carousel1 carousel_<?php echo $key ?>">
                            
                            <?php

                            $select = "img_course,title_course,name_instructor,score_course,price_course,url_course,date_updated_course,subtitle_course,outcomes_course,id_coupon_course,id_course"; 

                                $url = "relations?rel=courses,instructors&type=course,instructor&linkTo=id_category_course,status_course&equalTo=".$value->id_category.",1&orderBy=id_course&orderMode=DESC&startAt=0&endAt=8&select=".$select;
                                $method = "GET";
                                $fields = array();

                                $getCourses = CurlController::request($url,$method,$fields);

                                if($getCourses->status == 200){

                                    $courses = $getCourses->results;
    
                                }else{

                                    $courses = array();
                                }
                                
                            ?>

                            <?php if (!empty($courses)): ?>

                                <?php foreach ($courses as $index => $item): ?>

                                    <div class="course-box-wrap">

                                        <a href="/course/<?php echo urldecode($item->url_course) ?>" class="has-popover">

                                            <div class="course-box">

                                                <div class="course-image">
                                                    <img src="<?php echo urldecode($item->img_course) ?>" class="img-fluid" style="width: 100%;aspect-ratio: 1.5 / 1; object-fit: cover; object-position: center; display: block;">
                                                </div>

                                                <div class="course-details">
                                                    <h5 class="title">
                                                       <?php echo urldecode($item->title_course) ?>
                                                    </h5>
                                                    <p class="instructors">
                                                        <?php echo urldecode($item->name_instructor) ?>
                                                    </p>

                                                    <!--===============================================
                                                    RESEÑAS
                                                    =================================================-->

                                                    <div class="rating">

                                                        <?php for($i = 1; $i <= 5; $i++): ?>

                                                            <?php if ($i <= $item->score_course): ?>
                                                                <i class="fas fa-star filled"></i>
                                                            <?php else: ?>
                                                                <i class="fas fa-star"></i>
                                                            <?php endif ?>
                                                            
                                                        <?php endfor ?>

                                                        <span class="d-inline-block average-rating"><?php echo $item->score_course ?></span>
                                                    </div>

                                                    <!--===============================================
                                                    CUPONES
                                                    =================================================-->

                                                    <?php

                                                    if($item->price_course > 0){

                                                        $url = "coupons?linkTo=id_coupon,status_coupon&equalTo=".$item->id_coupon_course.",1";

                                                        $getCoupon = CurlController::request($url,$method,$fields);

                                                        if($getCoupon->status == 200){

                                                            $coupon = $getCoupon->results[0];

                                                            if(date("Y-m-d") >= $coupon->from_coupon && date("Y-m-d") <= $coupon->until_coupon){

                                                                echo '<p class="price text-right">
                                                                    <small>$'.number_format(urldecode($item->price_course),2).'</small>
                                                                    $'.number_format(urldecode($coupon->discount_coupon),2).'
                                                                </p>'; 

                                                            }else{

                                                                echo '<p class="price text-right">
                                                                    $'.number_format(urldecode($item->price_course),2).'
                                                                </p>';  
                                                            }


                                                        }else{

                                                           echo '<p class="price text-right">
                                                                    $'.number_format(urldecode($item->price_course),2).'
                                                                </p>'; 
                                                        }

                                                    }else{

                                                        echo '<p class="price text-right">GRATIS</p>';  
                                                    }

                                                    ?>

                                                </div>

                                            </div>

                                        </a>
                                        
                                        <!--===============================================
                                        POPOVER
                                        =================================================-->

                                        <div class="webui-popover-content">
                                            <div class="course-popover-content">
                                                <div class="last-updated">Last updater <?php echo TemplateController::formatDate(1,urldecode($item->date_updated_course)) ?></div>

                                                <div class="course-title">
                                                    <a href="/course/<?php echo urldecode($item->url_course) ?>">
                                                        <?php echo urldecode($item->title_course) ?>
                                                    </a>
                                                </div>
                                                <div class="course-meta">
                                                    <span class>
                                                        <i class="fas fa-play-circle"></i>

                                                        <!--===============================================
                                                        TRAER TOTAL LECCIONES
                                                        =================================================-->

                                                        <?php

                                                        $url = "academy?custom=".urlencode("SELECT COUNT(*) AS total FROM lections WHERE status_lection = 1 AND id_course_lection = $item->id_course");

                                                        $getLections = CurlController::request($url,$method,$fields);

                                                        if($getLections->status == 200){

                                                            echo $getLections->results[0]->total.' Lessons'; 

                                                        }else{

                                                           echo ' 0 Lessons'; 
                                                        }

                                                        ?>
                                                       
                                                    </span>
                                                    <span class>
                                                        <i class="far fa-clock"></i>

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
                                                <div class="course-subtitle">
                                                    <?php echo urldecode($item->subtitle_course) ?>
                                                </div>
                                                <div class="what-will-learn">
                                                    <ul>
                                                        <?php if (count(json_decode(urldecode($item->outcomes_course),true))>0): ?>

                                                            <?php foreach (json_decode(urldecode($item->outcomes_course)) as $num => $elem): ?>
                                                                <li><?php echo $elem ?></li>
                                                            <?php endforeach ?>
                                                            
                                                        <?php endif ?>
                                                    </ul>
                                                </div>
                                                <div class="popover-btns">
                                                    <button type="button" class="btn add-to-cart-btn addToCart" idCourse="<?php echo $item->id_course ?>">
                                                        Add to cart
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                 <?php endforeach ?>

                            <?php else: ?>

                                <script>
                                    
                                    $(".carousel_<?php echo $key ?>").parent().parent().parent().parent().remove();

                                </script>
                                
                            <?php endif ?>

                        </div>

                    </div>

                </div>

            </div>

        </section>
        
    <?php endforeach ?>
    
<?php endif ?>