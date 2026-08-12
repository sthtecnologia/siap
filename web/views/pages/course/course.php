<?php

if(isset($routesArray[1])){

	$url = "relations?rel=courses,instructors&type=course,instructor&linkTo=url_course,status_course&equalTo=".$routesArray[1].",1";
	$method = "GET";
	$fields =  array();

	$getCourse = CurlController::request($url,$method,$fields);

	if($getCourse->status == 200){

		$course = $getCourse->results[0];

		/*=============================================
		Traer secciones
		=============================================*/

		$url = "sections?linkTo=id_course_section,status_section&equalTo=".$course->id_course.",1";

		$getSections = CurlController::request($url,$method,$fields);

		if($getSections->status == 200){

			$course->sections = $getSections->results;

			/*=============================================
			Traer lecciones
			=============================================*/

			foreach ($course->sections as $key => $value) {

				$url = "lections?linkTo=id_section_lection,status_lection&equalTo=".$value->id_section.",1";

				$getLections = CurlController::request($url,$method,$fields);

				if($getLections->status == 200){

					$value->lections = $getLections->results;

				}else{

					$value->lections = array();
				}
			}
		
		}else{

			$course->sections = array();
					
		}


	}else{

		echo '<script>
			window.location = "/";
		</script>';
	}

}


include "modules/header/header.php";
include "modules/body/body.php";

?>

<script src="/views/assets/js/course/course.js"></script>
