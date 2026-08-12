<?php

require_once "../controllers/curl.controller.php";
require_once "../controllers/template.controller.php";

class CoursesAjax{

	public $filterType;
	public $filterValue;
	public $limit;
	public $page;

	public function getCourses(){

	

		$limit = $this->limit;
		$startAt = ($this->page-1) * $limit;
		$totalPages = 1;

		if($this->filterType == "All"){

			/*=============================================
		    Todos los cursos
		    =============================================*/

		    $select = "img_course,title_course,name_instructor,score_course,price_course,url_course,date_updated_course,subtitle_course,outcomes_course,id_coupon_course,id_course"; 

		    $url = "relations?rel=courses,instructors&type=course,instructor&linkTo=status_course&equalTo=1&orderBy=id_course&orderMode=DESC&startAt=".$startAt."&endAt=".$limit."&select=".$select;
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

		if($this->filterType == "Categories"){

			/*=============================================
		    Filtrar cursos por categorías
		    =============================================*/

		    $select = "img_course,title_course,name_instructor,score_course,price_course,url_course,date_updated_course,subtitle_course,outcomes_course,id_coupon_course,id_course,title_category"; 

		    $url = "relations?rel=courses,categories,instructors&type=course,category,instructor&linkTo=url_category,status_course&equalTo=".$this->filterValue.",1&orderBy=id_course&orderMode=DESC&startAt=".$startAt."&endAt=".$limit."&select=".$select;
		    $method = "GET";
		    $fields = array();

		    $getCourses = CurlController::request($url,$method,$fields);

		    if($getCourses->status == 200){

		        $courses = $getCourses->results;

		        $url = "relations?rel=courses,categories,instructors&type=course,category,instructor&linkTo=url_category,status_course&equalTo=".$this->filterValue.",1&select=id_course";
		        $getTotalCourses = CurlController::request($url,$method,$fields)->total;
		        $totalPages = ceil($getTotalCourses/$limit);

		    }else{

		        $courses = array();
		       
		    }

		}

		if($this->filterType == "Subcategories"){

			/*=============================================
	        Filtrar cursos por subcategorías
	        =============================================*/

	        $select = "img_course,title_course,name_instructor,score_course,price_course,url_course,date_updated_course,subtitle_course,outcomes_course,id_coupon_course,id_course,title_subcategory"; 

	        $url = "relations?rel=courses,subcategories,instructors&type=course,subcategory,instructor&linkTo=url_subcategory,status_course&equalTo=".$this->filterValue.",1&orderBy=id_course&orderMode=DESC&startAt=".$startAt."&endAt=".$limit."&select=".$select;
	        $method = "GET";
	        $fields = array();

	        $getCourses = CurlController::request($url,$method,$fields);

	        if($getCourses->status == 200){

	            $courses = $getCourses->results;

	            $url = "relations?rel=courses,subcategories,instructors&type=course,subcategory,instructor&linkTo=url_subcategory,status_course&equalTo=".$this->filterValue.",1&select=id_course";
	            $getTotalCourses = CurlController::request($url,$method,$fields)->total;
	            $totalPages = ceil($getTotalCourses/$limit);

	        }else{

		        $courses = array();
		       
		    }

		}

		if($this->filterType == "Search"){


			/*=============================================
		    Filtrar cursos por buscador
		    =============================================*/

		    $linkTo = ["title_course","subtitle_course","name_instructor"];

		    $select = "img_course,title_course,name_instructor,score_course,price_course,url_course,date_updated_course,subtitle_course,outcomes_course,id_coupon_course,id_course"; 

		    foreach ($linkTo as $key => $value) {
		        
		        $url = "relations?rel=courses,instructors&type=course,instructor&linkTo=".$value.",status_course&search=".urlencode($this->filterValue).",1&orderBy=id_course&orderMode=DESC&startAt=".$startAt."&endAt=".$limit."&select=".$select;
		    
		        $method = "GET";
		        $fields = array();

		        $getCourses = CurlController::request($url,$method,$fields);

		        if($getCourses->status == 200){

		            $courses = $getCourses->results;

		            $url = "relations?rel=courses,instructors&type=course,instructor&linkTo=".$value.",status_course&search=".urlencode($this->filterValue).",1&select=id_course";
		            $getTotalCourses = CurlController::request($url,$method,$fields)->total;
		            $totalPages = ceil($getTotalCourses/$limit);

		            break;
		        
		        }else{

		            $courses = array();
		        }
		    }
		}

		if($this->filterType == "Prices"){

			/*=============================================
		    Todos los cursos
		    =============================================*/

		    $select = "img_course,title_course,name_instructor,score_course,price_course,url_course,date_updated_course,subtitle_course,outcomes_course,id_coupon_course,id_course"; 

		    if($this->filterValue == 0){

		    	$url = "relations?rel=courses,instructors&type=course,instructor&linkTo=status_course,price_course&equalTo=1,0&orderBy=id_course&orderMode=DESC&startAt=".$startAt."&endAt=".$limit."&select=".$select;

		    } 

		    if($this->filterValue == "$"){

		    	$url = "relations?rel=courses,instructors&type=course,instructor&linkTo=price_course&between1=1&between2=10000000&filterTo=status_course&inTo=1&orderBy=id_course&orderMode=DESC&startAt=".$startAt."&endAt=".$limit."&select=".$select;
		    }

		    $method = "GET";
		    $fields = array();

		    $getCourses = CurlController::request($url,$method,$fields);

		    if($getCourses->status == 200){

		        $courses = $getCourses->results;

		        if($this->filterValue == 0){
		        	$url = "relations?rel=courses,instructors&type=course,instructor&linkTo=status_course,price_course&equalTo=1,0&select=id_course";
		        }

		        if($this->filterValue == "$"){
		        	$url = "relations?rel=courses,instructors&type=course,instructor&linkTo=price_course&between1=1&between2=10000000&filterTo=status_course&inTo=1&select=id_course";
		        }

		        $getTotalCourses = CurlController::request($url,$method,$fields)->total;
		        $totalPages = ceil($getTotalCourses/$limit);
		    
		    }else{

		        $courses = array();
		       
		    }

		}

	    /*=============================================
	    Retornar la Información
	    =============================================*/

	    $htmlGrid = "";
		$htmlList = "";

		if(!empty($courses)){

			foreach ($courses as $index => $item){

				/*=============================================
			    Retornar Cuadrícula
			    =============================================*/

			    $htmlGrid .= '<div class="col-md-4 col-lg-4">

            					<div class="course-box-wrap">

            					   <a href="/course/'.urldecode($item->url_course).'" class="has-popover" onclick="alertClick(\'Direccionando al curso...\')">

            					   		<div class="course-box">

            					   			<div class="course-image">
				                                <img src="'.urldecode($item->img_course).'" class="img-fluid" style="width: 100%;aspect-ratio: 1.5 / 1; object-fit: cover; object-position: center; display: block;">
				                            </div>

				                            <div class="course-details">
		                                        <h5 class="title">
		                                            '.urldecode($item->title_course).'
		                                        </h5>
		                                        <p class="instructors">
		                                            '.urldecode($item->name_instructor).'
		                                        </p>

		                                        <div class="rating">';

		                                            for ($i = 1; $i <= 5; $i++){

		                                                if ($i <= $item->score_course){

		                                                    $htmlGrid .= '<i class="fas fa-star filled"></i>';
		                                                    
		                                                }else{

		                                                    $htmlGrid .= '<i class="fas fa-star"></i>';

		                                                }
		    
		                                            }
		                                            
		                                            $htmlGrid .= '<span class="d-inline-block average-rating">'.$item->score_course.'</span>
		                                        </div>';

		                                        if($item->price_course > 0){

		                                            $url = "coupons?linkTo=id_coupon,status_coupon&equalTo=".$item->id_coupon_course.",1";
		                                            $method = "GET";
		                                            $fields = array();

		                                            $getCoupon = CurlController::request($url,$method,$fields);

		                                            if($getCoupon->status == 200){

		                                                $coupon = $getCoupon->results[0];

		                                                if(date("Y-m-d") >= $coupon->from_coupon && date("Y-m-d") <= $coupon->until_coupon  ){

		                                                    $htmlGrid .= '<p class="price text-right">
		                                                        <small>$'.number_format(urldecode($item->price_course),2).'</small>
		                                                        $'.number_format(urldecode($coupon->discount_coupon),2).'
		                                                    </p>';
		                                                
		                                                }else{
		                                                    
		                                                    $htmlGrid .= '<p class="price text-right">
		                                                        $'.number_format(urldecode($item->price_course),2).'
		                                                    </p>';

		                                                }

		                                            }else{

		                                                $htmlGrid .= '<p class="price text-right">
		                                                       
		                                                    $'.number_format(urldecode($item->price_course),2).'
		                                                </p>';

		                                            }

		                                        }else{

		                                            $htmlGrid .= '<p class="price text-right">GRATIS</p>';
		                                        }

	                                        $htmlGrid .= '</div>

		                                </div>

		                            </a>

            					   	<div class="webui-popover-content">
		                                <div class="course-popover-content">
		                                    <div class="last-updated">Last updater '.TemplateController::formatDate(1,urldecode($item->date_updated_course)).'</div>

		                                    <div class="course-title">
		                                        <a href="/course/'.urldecode($item->url_course).'">
		                                            '.urldecode($item->title_course).'
		                                        </a>
		                                    </div>
		                                    <div class="course-meta">
		                                        <span class>
		                                            <i class="fas fa-play-circle"></i>';
		                  
		                                                $url = "academy?custom=".urlencode("SELECT COUNT(*) AS total FROM lections WHERE status_lection = 1 AND id_course_lection = $item->id_course");
		                                                $method = "GET";
		                                                $fields = array();

		                                                $getLections = CurlController::request($url,$method,$fields);

		                                                if($getLections->status == 200){

		                                                    $htmlGrid .= $getLections->results[0]->total.' Lessons';
		                                                
		                                                }else{

		                                                    $htmlGrid .= '0 Lessons';
		                                                }

		                                           
		                                        $htmlGrid .= '</span>
		                                        <span class>
		                                            <i class="far fa-clock"></i>';
		        
		                                            $url = "academy?custom=".urlencode("SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(duration_lection))) AS total_duration FROM lections WHERE status_lection = 1 AND id_course_lection = $item->id_course");
		                                            $method = "GET";
		                                            $fields = array();

		                                            $getLections = CurlController::request($url,$method,$fields);

		                                            if($getLections->status == 200){

		                                                if($getLections->results[0]->total_duration == null){

		                                                   $htmlGrid .= '00:00:00 Hours';
		                                                
		                                                }else{

		                                                  $htmlGrid .= $getLections->results[0]->total_duration.' Hours';
		                                                }
		                                            
		                                            }

		                                        $htmlGrid .= '</span>
		                                       
		                                    </div>
		                                    <div class="course-subtitle">
		                                        '.urldecode($item->subtitle_course).'
		                                    </div>
		                                    <div class="what-will-learn">
		              
		                                        <ul>';

		                                            foreach (json_decode(urldecode($item->outcomes_course)) as $num => $elem){
		                                                $htmlGrid .= '<li>'.$elem.'</li>';
		                                                
		                                            }

		                                        $htmlGrid .= '</ul>

		                                    </div>
		                                    <div class="popover-btns">
		                                        <button type="button" class="btn add-to-cart-btn addToCart" idCourse="'.$item->id_course.'">
		                                            Add to cart
		                                        </button> 
		                                    </div>
		                                </div>

		                            </div>

            					</div>

            				</div>';

				/*=============================================
				Retornar lista
				=============================================*/
				
				$htmlList .='<li>
	                        	<div class="course-box-2">
		                            <div class="course-image">
		                                <a href="/course/'.urldecode($item->url_course).'" onclick="alertClick(\'Direccionando al curso...\')">
		                                    <img src="'.urldecode($item->img_course).'" alt class="img-fluid" style="width: 100%;aspect-ratio: 1.5 / 1; object-fit: cover; object-position: center; display: block;" >
		                                </a>
		                            </div>
	                            		<div class="course-details">
			                                <a href="/course/'.urldecode($item->url_course).'" class="course-title" onclick="alertClick(\'Direccionando al curso...\')">
			                                    '.urldecode($item->title_course).'
			                                </a>
			                                <p class="course-instructor">
			                                    <span class="instructor-name">'.urldecode($item->name_instructor).'</span>
			                                </p>
			                                <div class="course-subtitle">
			                                   '.urldecode($item->subtitle_course).'      
			                                </div>
	                                	<div class="course-meta">
	                                    	<span class=""><i class="fas fa-play-circle"></i>';
	        
		                                    $url = "academy?custom=".urlencode("SELECT COUNT(*) AS total FROM lections WHERE status_lection = 1 AND id_course_lection = $item->id_course");
		                                    $method = "GET";
		                                    $fields = array();

		                                    $getLections = CurlController::request($url,$method,$fields);

		                                    if($getLections->status == 200){

		                                        $htmlList .= $getLections->results[0]->total.' Lessons';
		                                    
		                                    }else{

		                                        $htmlList .='0 Lessons';
		                                    }

		                                    $htmlList .='</span>
	                                    	<span class=""><i class="far fa-clock"></i>';

			                                    $url = "academy?custom=".urlencode("SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(duration_lection))) AS total_duration FROM lections WHERE status_lection = 1 AND id_course_lection = $item->id_course");
			                                    $method = "GET";
			                                    $fields = array();

			                                    $getLections = CurlController::request($url,$method,$fields);

			                                    if($getLections->status == 200){

			                                        if($getLections->results[0]->total_duration == null){

			                                            $htmlList .= '00:00:00 Hours';
			                                        
			                                        }else{

			                                            $htmlList .= $getLections->results[0]->total_duration.' Hours';
			                                        }
			                                    
			                                    }

	                                     	$htmlList .='</span>
		                                </div>
		                            </div>
	                            	<div class="course-price-rating">
	                                	<div class="course-price">';

		                                if($item->price_course > 0){

		                                    $url = "coupons?linkTo=id_coupon,status_coupon&equalTo=".$item->id_coupon_course.",1";
		                                    $method = "GET";
		                                    $fields = array();

		                                    $getCoupon = CurlController::request($url,$method,$fields);

		                                    if($getCoupon->status == 200){

		                                        $coupon = $getCoupon->results[0];

		                                        if(date("Y-m-d") >= $coupon->from_coupon && date("Y-m-d") <= $coupon->until_coupon  ){

		                                            $htmlList .='<span class="current-price">$'.number_format(urldecode($coupon->discount_coupon),2).'</span>
		                                                  <span class="original-price">$'.number_format(urldecode($item->price_course),2).'</span>';
		                                        
		                                        }else{
		                                            
		                                           $htmlList .='<span class="current-price">$'.number_format(urldecode($item->price_course),2).'</span>';

		                                        }

		                                    }else{

		                                        $htmlList .='<span class="current-price">$'.number_format(urldecode($item->price_course),2).'</span>';

		                                    }

		                                }else{

		                                    $htmlList .='<span class="current-price">GRATIS</span>'; 
		                                }

	                                	$htmlList .='</div>
	                                	<div class="rating">';

		                                    for ($i = 1; $i <= 5; $i++){

		                                        if ($i <= $item->score_course){

		                                            $htmlList .='<i class="fas fa-star filled"></i>';
		                                            
		                                        }else{

		                                            $htmlList .='<i class="fas fa-star"></i>';

		                                        }

		                                    }
		                                    
		                                    $htmlList .='</div>
		                                    <div class="popover-btns mt-2 rounded">
		                                        <button type="button" class="btn add-to-cart-btn addToCart" idCourse="'.$item->id_course.'">
		                                            Add to cart
		                                        </button> 
		                                    </div>
	                               
                            		</div>
	                  
	                        	</div>
	                    	</li>';

			}
		}

		/*=============================================
	    Retornamos variables
	    =============================================*/

	    $arrayResponse = array(
	    	"htmlGrid" => $htmlGrid,
	    	"htmlList" => $htmlList,
	    	"totalPages" => $totalPages
	    );

	    echo json_encode($arrayResponse);
		

	}


}

$ajax = new CoursesAjax();
$ajax -> filterType = $_POST["filterType"];
$ajax -> filterValue = $_POST["filterValue"];
$ajax -> limit = $_POST["limit"];
$ajax -> page = $_POST["page"];
$ajax -> getCourses();