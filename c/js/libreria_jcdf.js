// JavaScript Document

var marcados
var isNS4 = (navigator.appName=="Netscape")?1:0;
var bShow2 = true;
var message="";

/*-----------------------------------------------------------------------------------------------------------------------*/

function MO(e,tipoobj)
{
if (!e)
var e=window.event;
if(isNS4){
	var S=e.target;
	while (S.tagName!=tipoobj)
	{S=S.parentNode;}
	}
else {
	var S=e.srcElement;
	while (S.tagName!=tipoobj)
	{S=S.parentElement;}
	}
if(tipoobj=='TR')
	S.className="gridfilaon";   
else
	S.className="T";
}

/*-----------------------------------------------------------------------------------------------------------------------*/

function MU(e,tipoobj)
{
if (!e)
var e=window.event;
if(isNS4){
	var S=e.target;
	while (S.tagName!=tipoobj)
	{S=S.parentNode;}
	}
else{
	var S=e.srcElement;
	while (S.tagName!=tipoobj)
	{S=S.parentElement;}
	}
if(tipoobj=='TR')
	S.className="gridfilaoff";
else
	S.className="P";
}

/*-----------------------------------------------------------------------------------------------------------------------*/
/* pintar listados */
function pintar(objeto,col)
{
  objeto.bgColor=col;
}

/*-----------------------------------------------------------------------------------------------------------------------*/
/* seleccionar uno de listados */

function checkform(objform,objckeck)
{
	
	var max = objform.elements.length;
	if (objckeck.name=='checkall'){
		for (var idx = 0; idx < max; idx++) {
			var e = objform.elements[idx]
			if (e.type=='checkbox' && e.name=='chk[]'){
				e.checked=objckeck.checked;
				_color=objckeck.checked==true?"#8DA7BC":"";
				e.parentNode.parentNode.parentNode.style.backgroundColor = _color;
				
			}
		}
	}else{
		checkBoxAll = true;
		for (var idx = 0; idx < max; idx++) {
			var e = objform.elements[idx]
			if (e.type=='checkbox' && e.name=='chk[]'){
				if (e.checked==false){
					e.parentNode.parentNode.parentNode.style.backgroundColor = '';
					checkBoxAll = false;
				}else{
					e.parentNode.parentNode.parentNode.style.backgroundColor = '#8DA7BC';
				}
			}
		}
		if(typeof objform.checkall!='undefined') // Me aseguro de que el objeto existe, para el caso de las listas donde no necesito tener un checkbox que seleccione a todos los demás
			objform.checkall.checked=checkBoxAll;
	}
}

/*-----------------------------------------------------------------------------------------------------------------------*/
/* Eventos en los listados */

function Subm(act,first,dosub,pagina,e){
	if (!e)	var e=window.event;
	
	if (act=='delete'){
		num=vChk(igrid.window.document.frmList);
	}
	if (act=='cobrarexp'){
		num=vChkcobrar(igrid.window.document.frmList);
	}
	if (act=='anucobrarexp'){
		num=vChkanularcobranza(igrid.window.document.frmList);
	}
	
	if (act=='select'){
		num=vChkprograma(igrid.window.document.frmList);
	}
	if (act=='ejemplar'){
		num=vChkejemplar(igrid.window.document.frmList);
	}
	if (num!=false){
		if (num!=true) pagina=num;
		igrid.window.document.frmList.action=pagina;
		igrid.window.document.frmList.submit();
	}
	
}

function SubmDafu(act,first,dosub,pagina,e){
	if (!e)	var e=window.event;
	
	if (act=='delete'){
		num=vChk(igrid.window.document.frmList);
	}
	
	if (act=='select'){
		num=vChkprograma(igrid.window.document.frmList);
	}
	if (act=='habi'){
		num=vChkhabi(igrid.window.document.frmList);
	}
	if (act=='recibir'){
		num=vChkrecibir(igrid.window.document.frmList);
	}
	if (act=='editarexp'){
		num=vChkeditarexp(igrid.window.document.frmList,dosub);
	}
	if (act=='derivar'){
		num=vChkderivar(igrid.window.document.frmList);
	}
	if (act=='delderivar'){
		num=vChkdelderivar(igrid.window.document.frmList);
	}
	if (act=='archivar'){
		num=vChkarchivar(igrid.window.document.frmList);
	}
	if (act=='adjuntar'){
		num=vChkadjuntar(igrid.window.document.frmList);
	}
	if (act=='devolver'){
		num=vChkdevolver(igrid.window.document.frmList);
	}
	if (num!=false){
		igrid.window.document.frmList.action=pagina;
		igrid.window.document.frmList.target='igrid';
		igrid.window.document.frmList.submit();
	}
	
}

function SubmMatri(act,first,dosub,pagina,e){
	if (!e)	var e=window.event;
	
	if (act=='cambiosec'){
		num=vChkmatri(window.document.frmList);
	}
	
	if (num!=false){
		if (num!=true) pagina=num;
		window.document.frmList.action=pagina;
		window.document.frmList.submit();
	}
	
}

function vChk(frm){ 
	var sw=0;
	for(var i=0;i<frm.length;i++){
		if(frm.elements[i].checked){
			sw=1;
		}		
	}
	if(sw!=1){
		alert("No hay ningun registro seleccionado.");
		return(false);
	}
	rpta=confirm("Esta seguro de Eliminar estos Registros?");
	if (rpta==false){
		return(false);
	}
	return true;
}

function vChkcobrar(frm){ 
	var sw=0;
	for(var i=0;i<frm.length;i++){
		if(frm.elements[i].checked){
			sw=1;
		}		
	}
	if(sw!=1){
		alert("No hay ningun registro seleccionado.");
		return(false);
	}
	rpta=confirm("Esta seguro de Cobrar este(os) Expediente(s)?");
	if (rpta==false){
		return(false);
	}
	return true;
}

function vChkanularcobranza(frm){ 
	var sw=0;
	for(var i=0;i<frm.length;i++){
		if(frm.elements[i].checked){
			sw=1;
		}		
	}
	if(sw!=1){
		alert("No hay ningun registro seleccionado.");
		return(false);
	}
	rpta=confirm("Esta seguro de Anular la Cobranza de este(os) Expediente(s)?");
	if (rpta==false){
		return(false);
	}
	return true;
}

function vChkprograma(frm){ 
	var sw=0;
	for(var i=0;i<frm.length;i++){
		if(frm.elements[i].checked){
			sw=1;
		}		
	}
	if(sw!=1){
		alert("No hay ningun registro seleccionado.");
		return(false);
	}
	//rpta=confirm("Esta seguro de Realizar esta Operación?");
	rpta=true;
	if (rpta==false){
		return(false);
	}
	return true;
}

function vChkejemplar(frm){ 
	var sw=0;
	for(var i=0;i<frm.length;i++){
		if(frm.elements[i].checked){
			sw=1;
			pagtmp=frm.elements[i].id;
		}		
	}
	if(sw!=1){
		alert("No hay ningun registro seleccionado.");
		return(false);
	}
	//rpta=confirm("Esta seguro de Realizar esta Operación?");
	rpta=true;
	if (rpta==false){
		return(false);
	}
	if(pagtmp=='2'){
		pagtmp='libro_ejemplar_mantenimiento_v.php?sw=2';
	}else if(pagtmp=='3'){
		pagtmp='libro_ejemplar_mantenimiento.php?sw=2';
	}else{
		pagtmp='libro.php';
	}
	
	return pagtmp;
}

function vChkmatri(frm){ 
	var sw=0;
	for(var i=0;i<frm.length;i++){
		if(frm.elements[i].checked){
			sw=1;
		}		
	}
	if(sw!=1){
		alert("No hay ningun registro seleccionado.");
		return(false);
	}
	rpta=confirm("Esta seguro de realizar estos cambios?");
	if (rpta==false){
		return(false);
	}
	pagtmp='matricula_seccion.php';
	
	return pagtmp;
}
/*-------------------------------------------------------------------------------------------------------------------*/

function deshabilitar(){
	for (i=0;i<document.form1.length;i++) {
		if(document.form1[i].name=='actualizar') document.form1[i].style.visibility="hidden"; 
		if(document.form1[i].name!='volver') document.form1[i].disabled=true;
	}
}

function desfor_pruba(){
	for (i=0;i<document.for_pruba.length;i++) {
		if(document.for_pruba[i].name=='actualizar') document.for_pruba[i].style.visibility="hidden"; 
		if(document.for_pruba[i].name!='volver') document.for_pruba[i].disabled=true;
	}
	for (i=0;i<document.formtpruba.length;i++) {
		if(document.formtpruba[i].name=='actualizar') document.formtpruba[i].style.visibility="hidden"; 
		if(document.formtpruba[i].name!='volver') document.formtpruba[i].disabled=true;
	}
}
/*-------------------------------------------------------------------------------------------------------------------*/

function tree(namePage, width, height) {
	
	newWindow = window.open(namePage,
				 'newWin',
				 'toolbar=no,location=no,scrollbars=yes,resizable=no,width='+width+',height='+height+',top=95,left=50');
}

/*-------------------------------------------------------------------------------------------------------------------*/

function treenew(namePage, width, height) {
	
	newWindow = window.open(namePage,
				 'otroWin',
				 'toolbar=no,location=no,scrollbars=yes,resizable=no,width='+width+',height='+height+',top=95,left=450');
}

/*-------------------------------------------------------------------------------------------------------------------*/