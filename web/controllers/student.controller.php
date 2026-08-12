<?php 

class StudentController{

	/*=============================================
	Registro de Estudiante
	=============================================*/

	public function register(){

		if(isset($_POST["first_name"])){

			$url = "students?register=true&suffix=student";
			$method = "POST";
			$fields = array(
				"name_student" => ucfirst(trim($_POST["first_name"]))." ".ucfirst(trim($_POST["last_name"])),
				"email_student" => trim($_POST["email"]),
				"password_student" => trim($_POST["password"]),
				"platform_student" => "web",
				"date_created_student" => date("Y-m-d")
			);

			$register = CurlController::request($url,$method,$fields);

			if($register->status == 200){

				echo '<script>
					fncFormatInputs();
					fncSweetAlert("success", "El registro ha sido exitoso", setTimeout(()=>{ window.location = "/login"},1250))
				</script>';

			}


		}
		
	}

	/*=============================================
	Login de Estudiante
	=============================================*/

	public function login(){

		if(isset($_POST["login_email"])){

			$url = "students?login=true&suffix=student";
			$method = "POST";
			$fields = array(
				"email_student" => trim($_POST["login_email"]),
				"password_student" => trim($_POST["login_password"])
			);

			$login = CurlController::request($url,$method,$fields);

			if($login->status == 400){

				echo '<script>
					fncFormatInputs();
					fncToastr("error", "El ingreso ha fallado: '.$login->results.'");
				</script>';

				return;

			}else{

				/*=============================================
				Validar estudiante activo
				=============================================*/

				if($login->results[0]->status_student == 0){

					echo '<script>
						fncFormatInputs();
						fncSweetAlert("error","El estudiante se encuentra desactivado, favor contactar con soporte",setTimeout(()=>{ window.location = "/login"},1250));
					</script>';

					return;
				}

				$_SESSION["student"] = $login->results[0];

				echo '<script>
					fncFormatInputs();
					fncSweetAlert("success","El ingreso ha sido exitoso",setTimeout(()=>{ window.location = "/student"},1250));
				</script>';
			}

		}
	}

	/*=============================================
	Olvidó contraseña
	=============================================*/

	public function forgotPass(){

		if(isset($_POST["forgot_email"])){

			$password = TemplateController::genPassword(11);

			$url = "students?id=".urlencode($_POST["forgot_email"])."&nameId=email_student&token=no&except=id_student";
			$method = "PUT";
			$fields = "password_student=".crypt($password, '$2a$07$azybxcags23425sdg23sdfhsd$');

			$newPassword = CurlController::request($url,$method,$fields);

			if($newPassword->status == 200){

				echo '<script>
					fncMatPreloader("off");
					fncFormatInputs();
					fncToastr("success", "Su nueva contraseña es: '.$password.'");
				</script>';

				return;


			}else{

				echo '<script>
					fncFormatInputs();
					fncSweetAlert("error","El email no se encuentra registrado",setTimeout(()=>{ window.location = "/register"},1250));
				</script>';

				return;

			}

		}

	}

	/*=============================================
	Checkout
	=============================================*/

	public function checkout(){		

		if(isset($_POST["checkout_courses"]) || isset($_POST["buy_now"])){

			if(isset($_POST["buy_now"])){ 

					$courses = json_decode($_POST["buy_now"]);
			}else{
				
				$courses = json_decode($_POST["checkout_courses"]);
			
			}

			if(empty($courses)){

				echo '<script>
					fncToastr("error","El Checkout está vacío");
				</script>';

				return;
			}

			$countCourses = 0;
			$totalPrice = 0;
			$idSales = [];
			$countSale = 0;

			foreach ($courses as $key => $value) {

				$url = "courses?linkTo=id_course&equalTo=".$value."&select=id_course,price_course,id_coupon_course,id_instructor_course";
				$method = "GET";
				$fields = array();

				$getCourse = CurlController::request($url,$method,$fields);

				if($getCourse->status == 200){

					$course = $getCourse->results[0];
					
					$price = $course->price_course;

					/*=============================================
					Validar cuppón
					=============================================*/

					if($price > 0){

						$url = "coupons?linkTo=id_coupon,status_coupon&equalTo=".$course->id_coupon_course.",1";
		                $method = "GET";
		                $fields = array();

		                $getCoupon = CurlController::request($url,$method,$fields);

		                if($getCoupon->status == 200){

		                	$coupon = $getCoupon->results[0];

	                		if(date("Y-m-d") >= $coupon->from_coupon && date("Y-m-d") <= $coupon->until_coupon){

	                			$price = $getCoupon->results[0]->discount_coupon;

	                		}
						}

					}

					/*=============================================
					Crear ventas
					=============================================*/

					$url = "sales?token=".$_SESSION["student"]->token_student."&table=students&suffix=student";
					$method = "POST";
					$fields = array(
						"price_sale" => $price,
						"id_student_sale" => $_SESSION["student"]->id_student,
						"id_course_sale" => $course->id_course,
						"id_instructor_sale" =>  $course->id_instructor_course,
						"status_sale" => "PENDING",
						"date_created_sale" => date("Y-m-d")
					);

					$sale = CurlController::request($url,$method,$fields);

					if($sale->status == 200){

						$countCourses++;

						$totalPrice += $price;

						array_push($idSales, $sale->results->lastId);

						if($countCourses == count($courses)){

							if($totalPrice > 0){

								$status_order = "PENDING";
							
							}else{

								$status_order = "PAID";
							}

							/*=============================================
							Crear Orden
							=============================================*/
							$reference = TemplateController::genCode(11);

							$url = "orders?token=".$_SESSION["student"]->token_student."&table=students&suffix=student";
							$fields = array(
								"reference_order" => $reference,
								"id_student_order" => $_SESSION["student"]->id_student,
								"total_order" => $totalPrice,
								"status_order" => $status_order,
								"date_order" => date("Y-m-d H:i:s"),
								"date_created_order" => date("Y-m-d")
							);

							$order = CurlController::request($url,$method,$fields);

							if($order->status == 200){

								if($status_order == "PENDING"){

									/*=============================================
									Enviar a PayPal la info para el pago total
									=============================================*/

									$url = "v2/checkout/orders";
									$method = "POST";
									$fields = '{
								        "intent": "CAPTURE",
								        "payment_source": {
								          "paypal": {
								            "experience_context": {
								              "payment_method_preference": "IMMEDIATE_PAYMENT_REQUIRED",
								              "user_action": "PAY_NOW",
								              "return_url": "http://web.academy.com/student?ref='.$reference.'",
								              "cancel_url": "http://web.academy.com/checkout"
								            }
								          }
								        },
								        "purchase_units": [
								          {
								            "reference_id": "'.$reference.'",
								            "amount": {
								              "currency_code": "USD",
								              "value": "'.$totalPrice.'"
								              }
								          }
								        ]
								      }';

									$paypal = CurlController::paypal($url,$method,$fields);
									
									if(isset($paypal->status) && $paypal->status == "PAYER_ACTION_REQUIRED"){

										/*=============================================
										Actualizar la orden con el ID de pago de PayPal
										=============================================*/

										$url = "orders?id=".$order->results->lastId."&nameId=id_order&token=".$_SESSION["student"]->token_student."&table=students&suffix=student";
										$method = "PUT";
										$fields = "id_pay_order=".$paypal->id;

										$updateOrder = CurlController::request($url,$method,$fields);

										if($updateOrder->status == 200){

											/*=============================================
											Actualizamos el id de la orden en la tabla ventas
											=============================================*/

											foreach ($idSales as $index => $item) {

												$countSale++;
												
												$url = "sales?id=".$item."&nameId=id_sale&token=".$_SESSION["student"]->token_student."&table=students&suffix=student";
												$method = "PUT";
												$fields = "id_order_sale=".$order->results->lastId;

												$updateSale = CurlController::request($url,$method,$fields);

												if($updateSale->status == 200){

													if($countSale == count($idSales)){

														echo "<script>
															localStorage.removeItem('cart');
															window.location = '".$paypal->links[1]->href."';
														</script>";	

													}

												}
											
											}

										}

									}
								
								}else{

									/*=============================================
									Actualizamos ventas gratuitas
									=============================================*/

									foreach ($idSales as $index => $item) {

										$countSale++;
										
										$url = "sales?id=".$item."&nameId=id_sale&token=".$_SESSION["student"]->token_student."&table=students&suffix=student";
										$method = "PUT";
										$fields = "id_order_sale=".$order->results->lastId."&status_sale=PAID";

										$updateSale = CurlController::request($url,$method,$fields);

										if($updateSale->status == 200){

											if($countSale == count($idSales)){

												echo '<script>
													localStorage.removeItem("cart");
													fncSweetAlert("success","Ya puedes comenzar las lecciones", setTimeout(()=>{window.location = "/student"},1250));
												</script>';	

											}

										}
									
									}

								}

							}

						}

					}

				}

			}

		}
	}

	/*=============================================
	Actualizar perfil
	=============================================*/

	public function updateProfile(){

		if(isset($_POST["update_id"])){
		

			$path = $_POST["old_picture_student"];

			/*=============================================
			Cuando viene foto
			=============================================*/

			if(isset($_FILES["profile_photo"]) && $_FILES["profile_photo"]["error"] == 0){

				/*=============================================
				Validar que el peso de la imagen no sea superior a 10MB
				=============================================*/

				if($_FILES["profile_photo"]["size"] > 10000000){

					echo '<script>
						fncToastr("error","El archivo debe pesar menos de 10MB");
					</script>';

					return;
				}

				/*=============================================
				Validar que el archivo sea Jpeg, jpg o png
				=============================================*/

				if($_FILES["profile_photo"]["type"] != "image/jpeg" && $_FILES["profile_photo"]["type"] != "image/jpg" && $_FILES["profile_photo"]["type"] != "image/png"){

					echo '<script>
						fncToastr("error","El archivo debe ser formato JPG o PNG");
					</script>';

					return;

				}

				$tmp_name = $_FILES["profile_photo"]["tmp_name"];
				$name = explode("@",$_POST["update_email"])[0];

				$folder = "views/assets/img/students/";
				$path = $folder . $_SESSION["student"]->id_student . "_" . $name.".".explode("/",$_FILES["profile_photo"]["type"])[1];

				move_uploaded_file($tmp_name, $path);

				$path = $_SERVER["REQUEST_SCHEME"]."://".$_SERVER["SERVER_NAME"]."/".$path;

			}

			/*=============================================
			Cuando viene cambio de contraseña
			=============================================*/

			$crypt = "";

			if(!empty($_POST["update_password"]) ){

				$crypt = crypt($_POST["update_password"], '$2a$07$azybxcags23425sdg23sdfhsd$');
			}

			/*=============================================
			Actualizar perfil
			=============================================*/

			$url = "students?id=".$_SESSION["student"]->id_student."&nameId=id_student&token=".$_SESSION["student"]->token_student."&table=students&suffix=student";
			$method = "PUT";

			if($crypt != ""){

				$fields = array(
					"name_student" => trim($_POST["update_name"]),
					"email_student" => trim($_POST["update_email"]),
					"picture_student" => $path,
					"password_student" => $crypt
				);

			}else{

				$fields = array(
					"name_student" => trim($_POST["update_name"]),
					"email_student" => trim($_POST["update_email"]),
					"picture_student" => $path
				);

			}

			$fields = http_build_query($fields);

			$updateStudent = CurlController::request($url,$method,$fields);

			if($updateStudent->status == 200){

				$_SESSION["student"]->name_student = trim($_POST["update_name"]);
				$_SESSION["student"]->email_student = trim($_POST["update_email"]);
				$_SESSION["student"]->picture_student = $path;
				

				echo '<script>
				  	fncMatPreloader("off");
					fncFormatInputs();
					fncSweetAlert("success", "Los cambios han sido guardados con éxito", setTimeout(()=>{ location.reload() },1250))
				</script>';
			}

		}	
	}
}