<?php 

class TemplateController{


	/*=============================================
	Traemos la vista principal de la plantilla
	=============================================*/

	public function index(){

		include "views/template.php";
	}

	/*=============================================
	Función para dar formato a las fechas
	=============================================*/

	static public function formatDate($type, $value){

		if($type == 0){

			list($hours, $minutes, $seconds) = explode(":", $value);

			$totalMinutes = ($hours * 60) + $minutes;

			return $totalMinutes . " min";
		}

		// Crear un objeto DateTime con la fecha
		$fecha = new DateTime($value, new DateTimeZone('America/Bogota'));

		if($type == 1){

			$format = "d 'de' MMMM, yyyy";
		}

		if($type == 2){

			$format = "MMM yyyy";
		}

		if($type == 3){

			$format = "d - MM - yyyy";
		}

		if($type == 4){

			$format = "EEEE d 'de' MMMM yyyy 'a las' h a";
		}

		if($type == 5){

			$format = "d/MM/yyyy";
		}

		if($type == 6){

			$format = "h':'mm a";
		}

		if($type == 7){

			$format = "EEEE d 'de' MMMM, yyyy";
		}

		if($type == 8){

			$format = "yyyy-MM-dd";
		}


		// Crear el formateador de fecha en español
		$formatter = new IntlDateFormatter(
		    'es_ES',
		    IntlDateFormatter::FULL,
		    IntlDateFormatter::NONE,
		    'America/Bogota',
		    IntlDateFormatter::GREGORIAN,
		    $format // Formato deseado
		);

		// Formatear la fecha
		$fecha_formateada = $formatter->format($fecha);
		// echo '<pre>$fecha_formateada '; print_r($fecha_formateada); echo '</pre>';

		return $fecha_formateada;

	}

	/*=============================================
	Función para generar códigos alfanuméricos aleatorios
	=============================================*/

	static public function genPassword($length){

		$password = "";
		$chain = "0123456789abcdefghijklmnopqrstuvwxyz";

		$password = substr(str_shuffle($chain),0,$length);

		return $password;
	}

	/*=============================================
	Función para generar números aleatorios
	=============================================*/

	static public function genCode($length){

		$code = "";
		$chain = "0123456789";

		$code = substr(str_shuffle($chain),0,$length);

		return $code;
	}

}
