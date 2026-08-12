
/*=============================================
Cuando olvidó la clave
=============================================*/

function toggoleForm(show,hide) {


	$("."+show).show();
	$("."+hide).hide();
}

/*=============================================
Buscador de cursos
=============================================*/

$("#searchMyCourse").on("keyup", function () {

	var q = $(this).val().toLowerCase();

	$("#listCourses li").each(function () {
		
		var text  = $(this).text().toLowerCase();
		$(this).toggle(text.includes(q));

	})

})

/*=============================================
Subir foto de perfil
=============================================*/

if($("#profile_photo").length > 0){

	$("#profile_photo").change(function(e){

		var file = e.target.files[0];
		if (!file) return;

		var reader = new FileReader();

		reader.onload = function(event) {

			$(".profile-photo-large img").attr("src", event.target.result);
		}

		reader.readAsDataURL(file);

	})
}

/*=============================================
Reproductor Player
=============================================*/

var player = new Plyr('#player', {
    controls: ['play-large', 'play', 'progress', 'current-time', 'mute', 'volume', 'settings', 'fullscreen'],
    settings: ['quality', 'speed'],
    quality: {
        default: 720,
        options: [1080, 720, 480, 360]
    }
});

function cambiarVideo(src){

	player.source = {
    type: 'video',
    sources: [
      {
        src: src,
        type: 'video/mp4'
      }
    ]
  };
}

cambiarVideo($("#player source").attr("src"));

/*=============================================
Cambiar de lección
=============================================*/

$(document).on("click",".thisLection",function(){

	/*=============================================
	Subir scroll a la parte superior
	=============================================*/

	$("html, body").animate({ scrollTop: 0 }, 500);

	/*=============================================
	Pausamos el video
	=============================================*/

	player.pause();

	/*=============================================
	Capturamos la ruta del video
	=============================================*/

	var video = $(this).attr("video");

	/*=============================================
	Capturamos las etiquetas con la clase thisLection
	=============================================*/

	var thisLection = $(".thisLection");

	thisLection.each((i)=>{

	    $(thisLection[i]).removeClass("bg-academy");

	 })

	$(this).addClass("bg-academy");

	$(".text-white")
    .removeClass("text-white")
    .addClass("text-muted");

    $(this).find(".text-muted")
    .removeClass("text-muted")
    .addClass("text-white");

    /*=============================================
	Visualizar el Preload
	=============================================*/

     $(".preloadVideo").css({"opacity":1,"z-index":1000});

    if(video == ""){

    	$(".plyr").hide();

    	/*=============================================
		Mostramos contenido HTML
		=============================================*/

    	var html = $(this).attr("html");

    	$("#contentHTML").html(atob(html));

    	$(".video-player-section").css({"overflow-y":"scroll","background":"white"});

    }else{

    	$(".plyr").show();

    	$("#contentHTML").html('');

    	$(".video-player-section").css({"overflow-y":"hidden","background":"black"});

	    /*=============================================
		Disparamos la función cambiar Video
		=============================================*/

	    cambiarVideo(video)  

	}

	$(".preloadVideo").animate({"opacity":0,"z-index":-10},1250);

})

/*=============================================
Gestionar avances de lecturas
=============================================*/

$(document).on("change",".checkLection",function(){

	var action = "add";

	if($(this).prop("checked") == false){

		action = "remove";
		 
	}

	var value = $(this).val();
	var tokenStudent = $("#tokenStudent").val();

	var data = new FormData();
	data.append("action",action);
	data.append("value",value);
	data.append("tokenStudent", tokenStudent);

	$.ajax({
	    url:"/ajax/student.ajax.php",
	    method: "POST",
	    data: data,
	    contentType: false,
	    cache: false,
	    processData: false,
	    success: function (response){
	    	
	    	console.log("response", response);

	    }

	})

})