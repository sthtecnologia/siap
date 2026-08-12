<?php

require_once "../controllers/curl.controller.php";

class CartAjax{

	public $idCarts;

	function updateCart(){

		$htmlCart = "";
		$htmlCheckout = "";
		$totalPrice = 0;
		$totalList = 0;

		if(!empty($this->idCarts)){

			foreach (json_decode($this->idCarts) as $key => $value) {

				$totalList++;

				$select = "img_course,url_course,title_course,subtitle_course,name_instructor,price_course,id_course,id_coupon_course";
				$url = "relations?rel=courses,instructors&type=course,instructor&linkTo=id_course&equalTo=".$value."&select=".$select;
				$method = "GET";
				$fields = array();

				$getCourse = CurlController::request($url,$method,$fields);
				
				if($getCourse->status == 200){

					$course = $getCourse->results[0];

					$htmlCart .= '<li>
			                        <div class="item clearfix">

			                            <div class="item-image">

			                                <a href>
			                                 <img src="'.urldecode($course->img_course).'" class="img-fluid rounded" style="width: 100%;aspect-ratio: 1 / 1; object-fit: cover; object-position: center; display: block;">
			                                </a>

			                            </div>

			                            <div class="item-details">

			                                <a href="/course/'.urldecode($course->url_course).'">
			                                    <div class="course-name">
			                                        '.urldecode($course->title_course).'
			                                    </div>
			                                    <div class="instructor-name">'.urldecode($course->name_instructor).'</div>
			                                    <div class="item-price">';

			                                    if($course->price_course > 0){

			                                    	$url = "coupons?linkTo=id_coupon,status_coupon&equalTo=".$course->id_coupon_course.",1";
			                                    	$method = "GET";
				                                    $fields = array();

				                                    $getCoupon = CurlController::request($url,$method,$fields);

				                                    if($getCoupon->status == 200){

				                                    	$coupon = $getCoupon->results[0];

				                                    	if(date("Y-m-d") >= $coupon->from_coupon && date("Y-m-d") <= $coupon->until_coupon){

				                                    		$htmlCart .= '<span class="current-price">$'.number_format(urldecode($coupon->discount_coupon),2).'</span><span class="original-price">$'.number_format(urldecode($course->price_course),2).'</span>';

				                                    		$totalPrice += $coupon->discount_coupon;

				                                    	}else{

				                                    		$htmlCart .= '<span class="current-price">$'.number_format(urldecode($course->price_course),2).'</span>';

				                                    		$totalPrice += $course->price_course;
				                                    	}


				                                    }else{

				                                    	$htmlCart .= '<span class="current-price">$'.number_format(urldecode($course->price_course),2).'</span>';

				                                    	$totalPrice += $course->price_course;
				                                    }

			                                    }else{

			                                    	$htmlCart .= '<span class="current-price">GRATIS</span>';
			                                    }

			                                    $htmlCart .= '</div>

			                                </a>

			                            </div>

			                        </div>

			                    </li>';

			        $htmlCheckout .= '<div class="row border-bottom pb-3 mb-3 align-items-center">
                                <div class="col-md-8">
                                    <div class="d-flex align-items-start">
                                        <img src="'.urldecode($course->img_course).'" class="img-fluid rounded mr-3" style="width: 80px;aspect-ratio: 1 / 1; object-fit: cover; object-position: center; display: block;">
                                        <div>
                                            <h6 class="mb-2 font-weight-bold">'.urldecode($course->title_course).'</h6>
                                            <p class="text-muted small mb-0">'.urldecode($course->subtitle_course).'</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="d-flex justify-content-end align-items-center">
                                        <div class="text-right mr-3">';

                                        if($course->price_course > 0){

	                                    	$url = "coupons?linkTo=id_coupon,status_coupon&equalTo=".$course->id_coupon_course.",1";
	                                    	$method = "GET";
		                                    $fields = array();

		                                    $getCoupon = CurlController::request($url,$method,$fields);

		                                    if($getCoupon->status == 200){

		                                    	$coupon = $getCoupon->results[0];

		                                    	if(date("Y-m-d") >= $coupon->from_coupon && date("Y-m-d") <= $coupon->until_coupon){

		                                    		 $htmlCheckout .= '<span class="h5 font-weight-bold text-dark mr-2">$'.number_format(urldecode($coupon->discount_coupon),2).'</span><span class="text-muted" style="text-decoration: line-through;">$'.number_format(urldecode($course->price_course),2).'</span>';

		                                    	}else{

		                                    		 $htmlCheckout .= '<span class="h5 font-weight-bold text-dark mr-2">$'.number_format(urldecode($course->price_course),2).'</span>';
		                                    	}


		                                    }else{

		                                    	 $htmlCheckout .= '<span class="h5 font-weight-bold text-dark mr-2">$'.number_format(urldecode($course->price_course),2).'</span>';
		                                    }

	                                    }else{

	                                    	 $htmlCheckout .= '<span class="h5 font-weight-bold text-dark mr-2">GRATIS</span>';
	                                    }    
                                        
                                $htmlCheckout .= '</div>

                                        <button class="btn-link border-0 text-danger p-0 deleteCart" idCourse="'.$course->id_course.'">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>';
				}

			}
		}

		/*=============================================
	    Retornamos variables
	    =============================================*/

	    $arrayResponse = array(
	    	"htmlCart" => $htmlCart,
	    	"totalPrice" => number_format($totalPrice,2),
	    	"totalList" => $totalList,
	    	"htmlCheckout" => $htmlCheckout
	    );

	    echo json_encode($arrayResponse);

	}

}

if(isset($_POST["idCarts"])){

	$ajax = new CartAjax();
	$ajax -> idCarts = $_POST["idCarts"];
	$ajax -> updateCart();

}