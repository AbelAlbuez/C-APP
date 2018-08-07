function eliminarCategoria(){
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
				document.getElementById("eliminarCategoria").click();
			  });  
			  
		} else {
			console.log("Cancelado");
		  	swal("Ha sido cancelado!");
		}
	  });
}
function eliminarSubCategoria(){
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
				document.getElementById("eliminarSubCategoria").click();
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
				document.getElementById("eliminarEventos").click();
			  });  
			  
		} else {
			console.log("Cancelado");
		  	swal("Ha sido cancelado!");
		}
	  });
}
function eliminarNoticias(){
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
				document.getElementById("eliminarNoticias").click();
			  });  
			  
		} else {
			console.log("Cancelado");
		  	swal("Ha sido cancelado!");
		}
	  });
}
function eliminarBanner(){
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
				document.getElementById("eliminarNoticias").click();
			  });  
			  
		} else {
			console.log("Cancelado");
		  	swal("Ha sido cancelado!");
		}
	  });
}


