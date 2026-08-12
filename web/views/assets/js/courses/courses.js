/*=============================================
Cambio de Interfaz
=============================================*/

$(document).on("click",".typeInterfaz",function(e){

	e.preventDefault();

	var interfaz = $(this).attr("interfaz");

	if(interfaz == "grid"){

		$("#interfazGrid").show();
		$("#interfazList").hide();
	}

	if(interfaz == "list"){

		$("#interfazGrid").hide();
		$("#interfazList").show();
	}

})

/*=============================================
Paginación
=============================================*/

function initPagination(){

	var totalPages =  $('#pagination').attr("totalPages");

	var defaultOpts = {
		totalPages: totalPages,
		first: '<i class="fas fa-angle-double-left"></i>',
		last: '<i class="fas fa-angle-double-right"></i>',
		prev: '<i class="fas fa-angle-left"></i>',
		next: '<i class="fas fa-angle-right"></i>',
		onPageClick: function (event, page) {

			if(page == 1){
				$(".page-item.first").css({"color":"#fff !important"})
				$(".page-item.prev").css({"color":"#fff !important"})
			}

			if(page == totalPages){

				$(".page-item.next").css({"color":"#aaa !important"})
				$(".page-item.last").css({"color":"#aaa !important"})
			}


		}

	}

	$('#pagination').twbsPagination(defaultOpts).on("page", function(event,page){
		
		var filterType = $("#filterType").val();
		var filterValue = $("#filterValue").val();
		var page = page;

		getAjaxCourses(filterType,filterValue,page);

	});

}

initPagination();

/*=============================================
=            Section comment block            =
=============================================*/

$(document).on("change",".changeFilters",function(){

	$("#filterType").val($(this).attr("filter"));
	$("#filterValue").val($(this).val().split("_")[0]);

	var filterType = $("#filterType").val();
	var filterValue = $("#filterValue").val();
	var page = 1;

	$(".titleFilter").html($(this).val().split("_")[1]);

	getAjaxCourses(filterType,filterValue,page);


})



/*=====  End of Section comment block  ======*/


/*=============================================
Traer los cursos desde AJAX
=============================================*/

function getAjaxCourses(filterType,filterValue,page){

	$("#divGrid").html(`<div 
					class="preload d-flex justify-content-center" 
					style="width:100%; height:100vh; position:relative; z-index:1000000">    
					        <div class="spinner-border my-5 align-self-center"></div>
					</div>`)

	$("#ulList").html(`<div 
					class="preload d-flex justify-content-center" 
					style="width:100%; height:100vh; position:relative; z-index:1000000">    
					        <div class="spinner-border my-5 align-self-center"></div>
					</div>`)


	var data = new FormData();
	data.append("filterType",filterType);
	data.append("filterValue",filterValue);
	data.append("limit", $("#limit").val());
	data.append("page", page);

	$.ajax({
		url:"/ajax/courses.ajax.php",
		method: "POST",
		data: data,
		contentType: false,
		cache: false,
		processData: false,
		success: function (response){
			
			if(JSON.parse(response).htmlGrid != "" && JSON.parse(response).htmlList != ""){

				$("#divGrid").html(JSON.parse(response).htmlGrid);
				$("#ulList").html(JSON.parse(response).htmlList);

				/*=============================================
				Reactivar el popover
				=============================================*/

				$('a.has-popover').webuiPopover({
			        trigger:'hover',
			        placement:'horizontal',
			        delay: {
			            show: 300,
			            hide: null
			        },
			        width: 335
			    });

			    /*=============================================
				Actualizamos la paginación
				=============================================*/

				if(filterType == "All" || filterType == "Categories" || filterType == "Subcategories" || filterType == "Prices"){

					if(page == 1){

						$("#cont-pagination").html(`

							<ul id="pagination" 
							class="pagination pagination-sm rounded" 
							totalPages="${JSON.parse(response).totalPages}">
				        	</ul>

						`)

						initPagination();

					}

				}

			}else{

				$("#divGrid").html(`<div class="jumbotron jumbotron-fluid rounded bg-white">
                          <div class="container text-center">
                            <h1>Ups! Aún no hay cursos</h1>      
                            <p>Próximamente habrán cursos disponibles en esta búsqueda</p>
                          </div>`);

				$("#ulList").html(`<div class="jumbotron jumbotron-fluid rounded bg-white">
                          <div class="container text-center">
                            <h1>Ups! Aún no hay cursos</h1>      
                            <p>Próximamente habrán cursos disponibles en esta búsqueda</p>
                          </div>`);

				$("#cont-pagination").html('');
			}

		}

	})

}