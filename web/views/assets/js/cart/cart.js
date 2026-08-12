/*=============================================
Llevando cursos al carrito de compras
=============================================*/

$(document).on("click",".addToCart", function(){

	var idCourse = $(this).attr("idCourse");

	/*=============================================
	Cuando no está definido la variable cart en el localstorage
	=============================================*/

	if(localStorage.getItem("cart") == undefined){

		var cart = [idCourse];

		localStorage.setItem("cart",JSON.stringify(cart));

	}else{

		var cart = JSON.parse(localStorage.getItem("cart"));

		if (!cart.includes(idCourse)) {

			cart.push(idCourse);

		}else{

			fncToastr("success", "El curso ya existe en el carrito de compras");

	  		return;
		}

		localStorage.setItem("cart",JSON.stringify(cart));

	}

	fncToastr("success", "El curso fue agregado al carrito de compras");

	updateCart();
		
})

/*=============================================
Eliminar curso del carrito de compras
=============================================*/

$(document).on("click",".deleteCart",function(){

	var idCourse = $(this).attr("idCourse");

	$(this).parent().parent().parent().remove();

	if(localStorage.getItem("cart") != undefined){

		var cart = JSON.parse(localStorage.getItem("cart"));
		var updatedCourses = cart.filter(id => id !== idCourse);	

		localStorage.setItem("cart",JSON.stringify(updatedCourses));
	}

	fncToastr("success", "El curso fue eliminado del carrito de compras");

	updateCart();

})

/*=============================================
Trayendo cursos desde BD al carrito de compras
=============================================*/

function updateCart(){	

	if(localStorage.getItem("cart") != undefined){

		var data = new FormData();
		data.append("idCarts",localStorage.getItem("cart"));

		$.ajax({
			url:"/ajax/cart.ajax.php",
			method: "POST",
			data: data,
			contentType: false,
			cache: false,
			processData: false,
			success: function (response){
				
				if(JSON.parse(response).htmlCart != undefined){

					$("#listCart").html(JSON.parse(response).htmlCart);
					$(".totalPrice").html("$"+JSON.parse(response).totalPrice);
					$(".numberListCart").html(JSON.parse(response).totalList);
					$("#listCheckout").html(JSON.parse(response).htmlCheckout);
					$("input[name='checkout_courses']").val(localStorage.getItem("cart"));
				}

			}

		})

	}
}

updateCart();