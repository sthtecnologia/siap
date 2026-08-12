<div class="preview-video-box">
    <a href="#" class="openVideo" src="<?php echo urldecode($course->video_course) ?>">
        <img src="<?php echo urldecode($course->img_course) ?>" class="img-fluid" style="width: 100%;aspect-ratio: 1.5 / 1; object-fit: cover; object-position: center; display: block;">
        <span class="preview-text">Preview this course</span>
        <span class="play-btn"></span>
    </a>
</div>
<div class="course-sidebar-text-box">
    <div class="price">
        <!--===============================================
        CUPONES
        =================================================-->

        <?php

        if($course->price_course > 0){

            $url = "coupons?linkTo=id_coupon,status_coupon&equalTo=".$course->id_coupon_course.",1";
            $method = "GET";
            $fields = array();

            $getCoupon = CurlController::request($url,$method,$fields);

            if($getCoupon->status == 200){

                $coupon = $getCoupon->results[0];

                if(date("Y-m-d") >= $coupon->from_coupon && date("Y-m-d") <= $coupon->until_coupon  ){

                    echo '<span class="current-price">$'.number_format(urldecode($coupon->discount_coupon),2).'</span>
                    <span class="original-price">$'.number_format(urldecode($course->price_course),2).'</span>';
                
                }else{
                    
                    echo '<span class="current-price">
                        $'.number_format(urldecode($course->price_course),2).'
                    </span>';

                }

            }else{

                echo '<span class="current-price">
                       
                    $'.number_format(urldecode($course->price_course),2).'
                </span>';

            }

        }else{

            echo '<span class="current-price">    
                    GRATIS
                </span>';
        }

        ?>
    </div>


    <div class="buy-btns">

        <form method="POST">

            <input type="hidden" name="buy_now" value='[<?php echo $course->id_course ?>]'>

            <button type="submit" class="btn btn-buy-now" onclick="alertClick('Direccionando a la pasarela de pagos...')">Buy now</button>

            <?php 

                require_once "controllers/student.controller.php";
                $checkout = new StudentController();
                $checkout -> checkout();

            ?>

        </form>


        <button class="btn btn-add-cart addToCart" type="button" idCourse="<?php echo $course->id_course ?>">
            Add to cart
        </button>
    </div>


    <div class="includes">
        <div class="title"><b>Includes:</b></div>
        <ul>
            <li>
                <i class="far fa-file-video"></i>
                <!--===============================================
                TRAER TOTAL DURACIÓN 
                =================================================-->

                <?php

                    $url = "academy?custom=".urlencode("SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(duration_lection))) AS total_duration FROM lections WHERE status_lection = 1 AND id_course_lection = $course->id_course");
                    $method = "GET";
                    $fields = array();

                    $getLections = CurlController::request($url,$method,$fields);

                    if($getLections->status == 200){

                        if($getLections->results[0]->total_duration == null){

                            echo "00:00:00 Hours On demand videos";
                        
                        }else{

                            echo $getLections->results[0]->total_duration." Hours On demand videos";
                        }
                    
                    }


                ?> 
            </li>
            <li>
                <i class="far fa-file"></i>
                <!--===============================================
                TRAER TOTAL LECCIONES
                =================================================-->

                <?php

                    $url = "academy?custom=".urlencode("SELECT COUNT(*) AS total FROM lections WHERE status_lection = 1 AND id_course_lection = $course->id_course");
                    $method = "GET";
                    $fields = array();

                    $getLections = CurlController::request($url,$method,$fields);

                    if($getLections->status == 200){

                        echo $getLections->results[0]->total." Lessons";
                    
                    }else{

                        echo "0 Lessons";
                    }

                ?>

            </li>
            <li><i class="far fa-compass"></i>Full lifetime access</li>
            <li><i class="fas fa-mobile-alt"></i>Access on mobile and tv</li>
        </ul>
    </div>
</div>