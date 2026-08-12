<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom d-lg-flex justify-content-lg-between">
					
	<div>
		<button class="ms-2 btn btn-default border-0" id="menu-toggle">
			<i class="bi bi-layout-sidebar"></i>
		</button>
	</div>

	<div class="d-flex">

		<div class="py-2 px-1">
			
			<a href="#" class="text-dark border rounded p-1" id="darkModeToggle">
				<i class="bi bi-sun"></i>
			</a>

		</div>

		<div class="p-2">
				
			<a href="#myProfile" data-bs-toggle="modal" style="color:inherit;">
				<i class="fa-solid fa-gear"></i>
				<?php echo explode("@",$_SESSION["admin"]->email_admin)[0] ?>
			</a>

		</div>

		<div class="p-2 mx-2">
			
			<a href="/logout" class="text-dark">				
				<i class="bi bi-box-arrow-right"></i>
			</a>

		</div>

	</div>

</nav>