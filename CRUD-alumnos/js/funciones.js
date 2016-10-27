function estasSeguro(id) {
	var	confirmacion=confirm("Estás seguro de borrar el registro número"+ id);
	if (confirmacion) {
		// si se confirmó el borrado, redireccionamos a delete.php, con el id del registro
		document.location.href="delete.php?id=" + id;
	}

}