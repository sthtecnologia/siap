<?php

require_once "../controllers/curl.controller.php";

class StudentAjax{

	public $action;
	public $value;
	public $tokenStudent;

	public function updateLectures(){

		$url = "students?linkTo=token_student&equalTo=".$this->tokenStudent;
		$method = "GET";
		$fields = array();

		$getStudent = CurlController::request($url,$method,$fields);

		if($getStudent->status == 200){

			$student = $getStudent->results[0];
			$lectures = json_decode($student->lectures_student, true);	

			if(!empty($lectures)){

				foreach ($lectures as $key => $value) {

				   if($this->action == "add"){

				    	if (!in_array(explode("_",$this->value)[1], $lectures[$key][explode("_",$this->value)[0]])){
				   	
					   		$lectures[$key][explode("_",$this->value)[0]][] = explode("_",$this->value)[1];

					   	}

					   	
				    }

				   if($this->action == "remove"){

				   	  $lectures[$key][explode("_",$this->value)[0]] = array_values(array_diff($lectures[$key][explode("_",$this->value)[0]], [explode("_",$this->value)[1]]));
				   }

				}


			}else{

				$lectures[0] = (Object) array(

					explode("_",$this->value)[0] => [explode("_",$this->value)[1]]

				);

			}

			/*=============================================
			Actualizar lecturas
			=============================================*/

			$url = "students?id=".$student->id_student."&nameId=id_student&token=".$this->tokenStudent."&table=students&suffix=student";
			$method = "PUT";
			$fields = "lectures_student=".json_encode($lectures);

			$updateStudent = CurlController::request($url,$method,$fields);

			echo $updateStudent->status;

		}

	}

}

if(isset($_POST["tokenStudent"])){

	$ajax = new StudentAjax();
	$ajax -> action = $_POST["action"];
	$ajax -> value = $_POST["value"];
	$ajax -> tokenStudent = $_POST["tokenStudent"];
	$ajax -> updateLectures();

}