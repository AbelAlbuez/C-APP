

function eliminarCategoria(id){
	//$("#eliminarCategoria").href= "hola mundo";
	swal({
		title: "Estas seguro de eliminar esta categoria?",
		text: "Una vez eliminado, no podrá recuperar este archivo!",
		icon: "warning",
		buttons: true,
		dangerMode: true,
	  })
	  .then((willDelete) => {
		if (willDelete) {
				swal("El archivo fue eliminado correctamente!", {
				icon: "success",
			  }).then((eliminado) =>{
				document.getElementById("eliminarCategoria"+id).click();
			  });  
			  
		} else {
			console.log("Cancelado");
		  	swal("Ha sido cancelado!");
		}
	  });
}
function eliminarSubCategoria(id){
	//$("#eliminarCategoria").href= "hola mundo";
	swal({
		title: "Estas seguro de eliminar esta subcategoria?",
		text: "Una vez eliminado, no podrá recuperar este archivo!",
		icon: "warning",
		buttons: true,
		dangerMode: true,
	  })
	  .then((willDelete) => {
		if (willDelete) {
				swal("El archivo fue eliminado correctamente!", {
				icon: "success",
			  }).then((eliminado) =>{
				document.getElementById("eliminarSubCategoria"+id).click();
			  });  
			  
		} else {
			console.log("Cancelado");
		  	swal("Ha sido cancelado!");
		}
	  });
}
function eliminarEventos(){
	swal({
		title: "Estas seguro de eliminar esta eventos?",
		text: "Una vez eliminado, no podrá recuperar este evento!",
		icon: "warning",
		buttons: true,
		dangerMode: true,
	  })
	  .then((willDelete) => {
		if (willDelete) {
				swal("El evento fue eliminado correctamente!", {
				icon: "success",
			  }).then((eliminado) =>{
				document.getElementById("eliminarEventos"+id).click();
			  });  
			  
		} else {
			console.log("Cancelado");
		  	swal("Ha sido cancelado!");
		}
	  });
}
function eliminarNoticias(id){
	swal({
		title: "Estas seguro de eliminar esta noticia?",
		text: "Una vez eliminado, no podrá recuperar este archivo!",
		icon: "warning",
		buttons: true,
		dangerMode: true,
	  })
	  .then((willDelete) => {
		if (willDelete) {
				swal("El archivo fue eliminado correctamente!", {
				icon: "success",
			  }).then((eliminado) =>{
				document.getElementById("eliminarNoticias"+id).click();
			  });  
			  
		} else {
			console.log("Cancelado");
		  	swal("Ha sido cancelado!");
		}
	  });
}
function eliminarBanner(id){

	swal({
		title: "Estas seguro de eliminar este Banner?",
		text: "Una vez eliminado, no podrá recuperar este banner!",
		icon: "warning",
		buttons: true,
		dangerMode: true,
	  })
	  .then((willDelete) => {
		if (willDelete) {
				swal("El banner fue eliminado correctamente!", {
				icon: "success",
			  }).then((eliminado) =>{
					document.getElementById("eliminarBanner"+id).click();
			  });  
			  
		} else {
			console.log("Cancelado");
		  	swal("Ha sido cancelado!");
		}
	  });
}

function init() {
 
}



