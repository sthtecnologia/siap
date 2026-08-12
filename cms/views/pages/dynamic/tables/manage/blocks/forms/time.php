<?php if ($module->columns[$i]->type_column == "time"): ?>

	<div class="input-group">
		
		<input 
		type="text" 
		class="form-control rounded-start timepicker" 
		placeholder="HH:mm:ss"
		id="<?php echo $module->columns[$i]->title_column ?>"  
		name="<?php echo $module->columns[$i]->title_column ?>"
		value="<?php if (!empty($data)): ?><?php echo urldecode($data[$module->columns[$i]->title_column]) ?><?php endif ?>"
		>

		<div class="input-group-text rounded-end">
			<i class="far fa-clock"></i>
		</div>

	</div>

	<script>
		
		function getMp4Duration(url) {
		  return new Promise((resolve, reject) => {
		    const video = document.createElement("video");
		    video.preload = "metadata";

		    // ⚠️ Si el mp4 está en otro dominio, esto evita problemas CORS en algunos casos
		    video.crossOrigin = "anonymous";

		    video.onloadedmetadata = () => {
		      resolve(video.duration); // duración en segundos (float)
		    };

		    video.onerror = () => reject("No se pudo cargar el video o hay problema CORS");

		    video.src = url;
		  });
		}

		function secondsToHMS(seconds) {
		  seconds = Math.floor(seconds); // quitamos decimales

		  const h = Math.floor(seconds / 3600);
		  const m = Math.floor((seconds % 3600) / 60);
		  const s = seconds % 60;

		  return (
		    String(h).padStart(2, "0") + ":" +
		    String(m).padStart(2, "0") + ":" +
		    String(s).padStart(2, "0")
		  );
		}

	</script>

<?php endif ?>