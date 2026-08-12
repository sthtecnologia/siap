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


var src;

/*=============================================
Apertura Modal
=============================================*/

$(document).on("click",".openVideo",function(e){

	e.preventDefault();

	src = $(this).attr("src");

	$("#CoursePreviewModal").modal("show"); 

})

/*=============================================
Reproducir Video
=============================================*/

$("#CoursePreviewModal").on('show.bs.modal', function () {

	 cambiarVideo(src)

});

/*=============================================
Detener Video
=============================================*/

$("#CoursePreviewModal").on('hide.bs.modal', function(){     

    player.pause();
 
});
