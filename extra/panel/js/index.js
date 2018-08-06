function eliminarCategoria(){
	//$("#eliminarCategoria").href= "hola mundo";
	swal({
		title: "Estas seguro?",
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
		title: "Estas seguro?",
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
