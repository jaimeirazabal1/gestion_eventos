$(document).ready(function(){
	$('body').on('click',".eliminar",function(){
		message  = $(this).attr("message");
		if (message) {
			respuesta = confirm(message);
		}else{
			respuesta = confirm("Esta seguro?");
		}
		if (!respuesta) {
			return false;
		};
	});
});