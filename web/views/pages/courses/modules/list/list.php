<!-- =====================================
Course List
====================================== -->

<div class="category-course-list" id="interfazList" style="display:none">
    <ul id="ulList">

        <?php if (!empty($courses)): ?>

        <?php foreach ($courses as $index => $item): ?>

            <li>
                <div class="course-box-2">
                    <div class="course-image">
                        <a href="/course/<?php echo urldecode($item->url_course) ?>" onclick="alertClick('Direccionando al curso...')">
                            <img src="<?php echo urldecode($item->img_course) ?>" class="img-fluid" style="width: 100%;aspect-ratio: 1.5 / 1; object-fit: cover; object-position: center; display: block;">
                        </a>
                    </div>
                    <div class="course-details">
                        <a href="/course/<?php echo urldecode($item->url_course) ?>" class="course-title" onclick="alertClick('Direccionando al curso...')"> 
                            <?php echo urldecode($item->title_course) ?>
                        </a>
                        <p class="course-instructor">
                            <span class="instructor-name"><?php echo urldecode($item->name_instructor) ?></span>
                        </p>
                        <div class="course-subtitle">
                             <?php echo urldecode($item->subtitle_course) ?>
                        </div>
                        <div class="course-meta">
                            <span class="">
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
                            <span class="">
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
                    </div>
                    <div class="course-price-rating">
                        <div class="course-price">
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

                                        echo '<span class="current-price">$'.number_format(urldecode($coupon->discount_coupon),2).'</span><span class="original-price">$'.number_format(urldecode($item->price_course),2).'</span>';


                                    }else{

                                       echo '<span class="current-price">$'.number_format(urldecode($item->price_course),2).'</span>'; 
                                    }


                                }else{

                                  echo '<span class="current-price">$'.number_format(urldecode($item->price_course),2).'</span>'; 
                                }

                            }else{

                                  echo '<span class="current-price">GRATIS</span>'; 
                            }

                            ?>

                        </div>
                        <div class="rating">
                            <?php for($i = 1; $i <= 5; $i++): ?>

                                <?php if ($i <= $item->score_course): ?>
                                    <i class="fas fa-star filled"></i>
                                <?php else: ?>
                                    <i class="fas fa-star"></i>
                                <?php endif ?>
                                
                            <?php endfor ?>

                        </div>

                        <div class="popover-btns mt-2 rounded">
                            <button type="button" class="btn add-to-cart-btn addToCart" idCourse="<?php echo $item->id_course ?>">
                                Add to cart
                            </button>
                        </div>
                     
                    </div>
          
                </div>
            </li>

        <?php endforeach ?>

        <?php endif ?>

    </ul>
</div>
   
