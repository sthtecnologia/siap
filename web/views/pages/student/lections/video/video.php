<style>

.video-player-section {

    width: 100%;
    aspect-ratio: 16 / 9;   /* 🔥 CLAVE */
    background: #000;
    overflow:hidden;
}

.preloadVideo {

    width: 100%;
    aspect-ratio: 16 / 9;   /* 🔥 CLAVE */
    background: #000;
    overflow: hidden;
    z-index:-10;
    top:0;
    left:0;
    opacity:0;

}

.video-player-section video {

    width: 100%;
    height: 100%;
    object-fit: contain;   /* o cover */
    aspect-ratio: 16 / 9;
}


.contentHTML {

    width: 100%;
    height: 100%;
    aspect-ratio: 16 / 9;   /* 🔥 CLAVE */
    overflow-y: scroll;
    object-fit: contain;   /* o cover */
    z-index:1000;

}

    


</style>

<div class="video-player-section">
    <video id="player" playsinline controls autoplay>
        <source src="<?php echo $course->sections[0]->lections[0]->video_lection ?>" type="video/mp4" />
    </video>

    <div id="contentHTML" class="bg-white p-5"></div>

    <div class="preloadVideo d-flex justify-content-center position-absolute">  

        <div class="spinner-border my-5 align-self-center"></div>

    </div>
</div>