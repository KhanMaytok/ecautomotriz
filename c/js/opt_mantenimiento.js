document.onkeydown = function (e) {
// var nav4 = window.Event ? true : false;
var key = (document.all) ? event.keyCode : e.which;
switch(key)
	{
		case 112:
			//alert("AYUDA: " + key);F1
			if(top.escritorio.document.getElementById('opt_ayuda')==null) return false;
			top.escritorio.document.getElementById('opt_ayuda').onclick();
			return false;
			break;
		case 113:
			//alert("BUSCAR: " + key);F2
			if(top.escritorio.document.getElementById('opt_buscar')==null) return false;
			top.escritorio.document.getElementById('opt_buscar').onclick();
			return false;
			break;
		case 114:
			//alert("NUEVO: " + key);F3
			if(top.escritorio.document.getElementById('opt_nuevo')==null) return false;
			top.escritorio.document.getElementById('opt_nuevo').onclick();
			return false;
			break;
		case 115:
			//alert("EDITAR: " + key);F4
			if(top.escritorio.document.getElementById('opt_editar')==null) return false;
			top.escritorio.document.getElementById('opt_editar').onclick();
			return false;
			break;
		case 117:
			//alert("VISUALIZAR: " + key);F6
			if(top.escritorio.document.getElementById('opt_visualizar')==null) return false;
			top.escritorio.document.getElementById('opt_visualizar').onclick();
			return false;
			break;
		case 118:
			//alert("PERMISOS: " + key);F7
			if(top.escritorio.document.getElementById('opt_permiso')==null) return false;
			top.escritorio.document.getElementById('opt_permiso').onclick();
			return false;
			break;
		case 119:
			//alert("BLOQUE: " + key);F8
			if(top.escritorio.document.getElementById('opt_bloque')==null) return false;
			top.escritorio.document.getElementById('opt_bloque').onclick();
			return false;
			break;
		case 120:
			//alert("EJEMPLAR: " + key);F9
			if(top.escritorio.document.getElementById('opt_ejemplar')==null) return false;
			top.escritorio.document.getElementById('opt_ejemplar').onclick();
			return false;
			break;
		case 121:
			//alert("SUBIR ARCHIVO: " + key);F10
			if(top.escritorio.document.getElementById('opt_subir')==null) return false;
			top.escritorio.document.getElementById('opt_subir').onclick();
			return false;
			break;
		case 122:
			//alert("ADJUNTAR ARCHIVO: " + key);F11
			//if(top.escritorio.document.getElementById('opt_subir')==null) return false;
			//top.escritorio.document.getElementById('opt_subir').onclick();
			return false;
			break;
		case 123:
			//alert("REPORTE XLS: " + key);F12
			if(top.escritorio.document.getElementById('opt_reporte')==null) return false;
			top.escritorio.document.getElementById('opt_reporte').onclick();
			return false;
			break;
		case 46:
			//alert("ELIMINAR: " + key);
			if(top.escritorio.document.getElementById('opt_eliminar')==null) return false;
			top.escritorio.document.getElementById('opt_eliminar').onclick();
			return false;
			break;
		case 27:
			//alert("OCULTAR AYUDANTE: " + key);
			if(top.escritorio.document.getElementById('helpdavilaSN')==null) return false;
			top.escritorio.document.getElementById('helpdavilaSN').onclick();
			return false;
			break;
		case 116:
			alert("Seleccione Otra Opción");
			return false;
			break;
	}
} 

function Ocultahelp(){

if (top.escritorio.document.getElementById('helpdasonet').style.display=='none'){
	top.escritorio.document.getElementById('helpdasonet').style.display='';
}else{
	top.escritorio.document.getElementById('helpdasonet').style.display='none';
}
}