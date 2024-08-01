function buscar(){
	let id = document.getElementById("inputID").value;
	let consulta = "http://localhost/pfn/lista_productos.php";
	if (id !== "")
		consulta = "http://localhost/pfn/lista_productos.php?id=" + id;
	doGet(consulta, procesarDatos);
}
function doGet(url, callback){
	var objXMLHttpRequest = new XMLHttpRequest();
	objXMLHttpRequest.onreadystatechange = function() {
	  if(objXMLHttpRequest.readyState === 4) {
	    if(objXMLHttpRequest.status === 200) {
	         let response = JSON.parse(objXMLHttpRequest.response);
	         callback(response);
	    } else {
	          throw 'Error ' + objXMLHttpRequest.status + " " + objXMLHttpRequest.statusText;
	    }
	  }
	}
	objXMLHttpRequest.open('GET', url);
	objXMLHttpRequest.send();
}
function procesarDatos(respuesta){
	var datos = respuesta.result;

	let eliminar = document.getElementById("resultados");
	if(eliminar !=  null && eliminar != undefined){
		let padre = eliminar.parentNode;
		padre.removeChild(eliminar);
	}
	limpiarAlertas();
	if (datos == null){
		let alerta = crearAlerta("El usuario solicitado no existe", "alert alert-warning");
		document.getElementById("list_container").appendChild(alerta);
		return;
	}
	var tabla = document.createElement("table");
	tabla.className = "table table-bordered";
	tabla.id  = "resultados";
	tabla.cellspacing = 0;
	tabla.cellpadding = 0;
	var thead = document.createElement("thead");
	var tr = document.createElement("tr");
	tr.appendChild(crearTH("Producto_id"));
	tr.appendChild(crearTH("Nombres"));
	tr.appendChild(crearTH("Descripcion"));
	tr.appendChild(crearTH("precio"));
	tr.appendChild(crearTH("stock"));
	tr.appendChild(crearTH("proveedor_id"));
	tr.appendChild(crearTH("cateoria_id"));
	thead.appendChild(tr);
	tabla.appendChild(thead);
	var tbody = document.createElement("tbody");
	tbody.id = "bodytabla";
	tabla.appendChild(tbody);
	for (var i = 0; i < datos.length; i++) {
		var fila = document.createElement("tr");
		
		var celdaproducto_id = crearCelda(datos[i].producto_id);
	  	fila.appendChild(celdaproducto_id);

		var celdaNombre = crearCelda(datos[i].nombre);
	  	fila.appendChild(celdaNombre);

		var celdadescipcion = crearCelda(datos[i].descripcion);
	  	fila.appendChild(celdadescipcion);
		
		var celdaprecio = crearCelda(datos[i].precio);
	  	fila.appendChild(celdaprecio);
		
		var celdastock = crearCelda(datos[i].stock);
	  	fila.appendChild(celdastock);
		
		var celdaproveedor_id= crearCelda(datos[i].proveedor_id);
	  	fila.appendChild(celdaproveedor_id);
		
		var celdacategoria_id= crearCelda(datos[i].categoria_id);
	  	fila.appendChild(celdacategoria_id);

		tbody.appendChild(fila);
	}
	document.getElementById("list_container").appendChild(tabla);
}
function crearCelda(texto){
	var celda = document.createElement("td");
	var textoCelda = document.createTextNode(texto);
	celda.appendChild(textoCelda);
	return celda;
}
function crearTH(texto){
	var th = document.createElement("th");
	var thText = document.createTextNode(texto);
	th.appendChild(thText);
	return th;
}
function crearAlerta(texto, clase){
	var div = document.createElement("div");
	div.id = "alerta";
	div.className = clase;
	var textoDiv = document.createTextNode(texto);
	div.appendChild(textoDiv);
	return div;
}
function limpiarAlertas(){
	let alerta = document.getElementById("alerta");
	if (alerta !== null)
		alerta.parentNode.removeChild(alerta);
};
