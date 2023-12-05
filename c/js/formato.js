function AceptaTodoMin(e,obj,lgd,formu) 
    {
	var ctrlDown = e.ctrlKey;
	
	var nav4 = window.Event ? true : false;
    var key = nav4 ? e.which : e.keyCode;
	
	if(obj.readOnly == true) {
		return false;
	}
	if(ctrlDown){
		//if (key==C || key==V || key==X || key==c || key==v || key==x) return false;
		if (key==67 || key==86 || key==88 || key==99 || key==118 || key==120) return true;
	}
	
	if (key==13){
		tabu(formu,obj);
		return false;
	}
	if(obj.value.length >= lgd) {
		if(key!=8 && key!=0) return false;
	}
  	if(key == 9 || key == 0 || key == 8) return true;
	if(window.Event){
		var pst = e.currentTarget.selectionStart;
		var string_start = e.currentTarget.value.substring(0,pst);
		var string_end = e.currentTarget.value.substring(pst,e.currentTarget.value.length);
		e.currentTarget.value = string_start  + String.fromCharCode(key) + string_end;
		e.currentTarget.selectionStart = pst + 1;
		e.currentTarget.selectionEnd = pst + 1;
		e.stopPropagation();
		return false;
	}
  	else if (window.event){
    	return e.keyCode =   String.fromCharCode( e.keyCode ).charCodeAt(0);
  	}
	}
	
function AceptaTodo(e,obj,lgd,formu) 
    {
	var ctrlDown = e.ctrlKey;
	
	var nav4 = window.Event ? true : false;
    var key = nav4 ? e.which : e.keyCode;
	
	if(obj.readOnly == true) {
		return false;
	}
	if(ctrlDown){
		//if (key==C || key==V || key==X || key==c || key==v || key==x) return false;
		if (key==67 || key==86 || key==88 || key==99 || key==118 || key==120) return true;
	}
	
	if (key==13){
		tabu(formu,obj);
		return false;
	}
	if(obj.value.length >= lgd) {
		if(key!=8 && key!=0) return false;
	}
  	if(key == 9 || key == 0 || key == 8) return true;
	if(window.Event){
		var pst = e.currentTarget.selectionStart;
		var string_start = e.currentTarget.value.substring(0,pst);
		var string_end = e.currentTarget.value.substring(pst,e.currentTarget.value.length);
		e.currentTarget.value = string_start  + String.fromCharCode(key).toUpperCase() + string_end;
		e.currentTarget.selectionStart = pst + 1;
		e.currentTarget.selectionEnd = pst + 1;
		e.stopPropagation();
		return false;
	}
  	else if (window.event){
    	return e.keyCode =   String.fromCharCode( e.keyCode ).toUpperCase().charCodeAt(0);
  	}
	}

function AceptaTodonguion(e,obj,lgd,formu) 
    {
	var ctrlDown = e.ctrlKey;
	
	var nav4 = window.Event ? true : false;
    var key = nav4 ? e.which : e.keyCode;
	
	if(obj.readOnly == true) {
		return false;
	}
	
	if(ctrlDown){
		//if (key==C || key==V || key==X || key==c || key==v || key==x) return false;
		if (key==67 || key==86 || key==88 || key==99 || key==118 || key==120) return true;
	}
	
	if (key==13){
		tabu(formu,obj);
		return false;
	}
	if(obj.value.length >= lgd) {
		if(key!=8 && key!=0) return false;
	}
	
	if(obj.alt!='Dua'){
		if(key==45) {
			alert('No se permite el guión ( - )');
			return false;
		}
	}
	
  	if(key == 9 || key == 0 || key == 8) return true;
	if(window.Event){
		var pst = e.currentTarget.selectionStart;
		var string_start = e.currentTarget.value.substring(0,pst);
		var string_end = e.currentTarget.value.substring(pst,e.currentTarget.value.length);
		e.currentTarget.value = string_start  + String.fromCharCode(key).toUpperCase() + string_end;
		e.currentTarget.selectionStart = pst + 1;
		e.currentTarget.selectionEnd = pst + 1;
		e.stopPropagation();
		return false;
	}
  	else if (window.event){
    	return e.keyCode =   String.fromCharCode( e.keyCode ).toUpperCase().charCodeAt(0);
  	}
	}

function AceptaNumero(evt,obj,lgd,formu) 
    {
		var ctrlDown = evt.ctrlKey;
		
        var nav4 = window.Event ? true : false;
        var key = nav4 ? evt.which : evt.keyCode; 
		
	if(obj.readOnly == true) {
		return false;
	}
	
	if(ctrlDown){
		//if (key==C || key==V || key==X || key==c || key==v || key==x) return false;
		if (key==67 || key==86 || key==88 || key==99 || key==118 || key==120) return true;
	}
	
		if (key==13){
			tabu(formu,obj);
			return false;
		}
		if(obj.value.length >= lgd) {
			if(key!=8 && key!=0)
			return false;
		}
		if(key==46) {
			return false;
		}
        return (key <= 13 || key==45 ||  (key >= 48 && key <= 57)); 

    }
	
function AceptaNumeroPer(evt,obj,lgd,formu) 
    {
		var ctrlDown = evt.ctrlKey;
		
        var nav4 = window.Event ? true : false;
        var key = nav4 ? evt.which : evt.keyCode; 
		
	if(obj.readOnly == true) {
		return false;
	}
	
	if(ctrlDown){
		//if (key==C || key==V || key==X || key==c || key==v || key==x) return false;
		if (key==67 || key==86 || key==88 || key==99 || key==118 || key==120) return true;
	}
	
		if (key==13){
			tabu(formu,obj);
			return false;
		}
		if(obj.value.length >= lgd) {
			if(key!=8 && key!=0)
			return false;
		}
		if(key==46) {
			return false;
		}
        return (key <= 13 ||  key == 48 || key == 55); 

    }

function AceptaNumeroD(evt,obj,lgd,formu) 
    {
		var ctrlDown = evt.ctrlKey;
		
        var nav4 = window.Event ? true : false;
        var key = nav4 ? evt.which : evt.keyCode; 
		
		if(obj.readOnly == true) {
			return false;
		}
		
		if(ctrlDown){
		//if (key==C || key==V || key==X || key==c || key==v || key==x) return false;
		if (key==67 || key==86 || key==88 || key==99 || key==118 || key==120) return true;
	}
		
		if (key==13){
			tabu(formu,obj);
			return false;
		}
		if(obj.value.length >= lgd) {
			if(key!=8 && key!=0)
			return false;
		}
        return (key <= 13 || key==46 ||  (key >= 48 && key <= 57)); 

    }

function AceptaNoNumero(e,obj,lgd,formu) 
    {
		var ctrlDown = e.ctrlKey;
		
		var nav4 = window.Event ? true : false;
        var key = nav4 ? e.which : e.keyCode;
		
		if(obj.readOnly == true) {
			return false;
		}
		
		if(ctrlDown){
		//if (key==C || key==V || key==X || key==c || key==v || key==x) return false;
		if (key==67 || key==86 || key==88 || key==99 || key==118 || key==120) return true;
	}
		
		if (key==13){
			tabu(formu,obj);
			return false;
		}
		if(obj.value.length >= lgd) {
			if(key!=8 && key!=0)
			return false;
		}
		if (key <= 13 || key==46 ||  (key < 38 || key > 57)){
		if(key == 9 || key == 0 || key == 8) return true;
		if(window.Event){
			var pst = e.currentTarget.selectionStart;
			var string_start = e.currentTarget.value.substring(0,pst);
			var string_end = e.currentTarget.value.substring(pst,e.currentTarget.value.length);
			e.currentTarget.value = string_start  + String.fromCharCode(key).toUpperCase() + string_end;
			e.currentTarget.selectionStart = pst + 1;
			e.currentTarget.selectionEnd = pst + 1;
			e.stopPropagation();
			return false;
		}
  		else if (window.event){
    		return e.keyCode =   String.fromCharCode( e.keyCode ).toUpperCase().charCodeAt(0);
  		}
		}
		else{
			return false;	
		}
    }
	
function tabu(form,field)
	{
		var next=0, found=false
		for(var i=0;i<form.length;i++)	{
			if(field.name==form.elements[i].name){
				next=i+1;
				found=true
				break;
			}
		}
		while(found){
			if( form.elements[next].disabled==false &&  form.elements[next].type!='hidden' &&  form.elements[next].type!='file'){
				form.elements[next].focus();
				break;
			}
			else{
				if(next<form.length-1)
					next=next+1;
				else
					break;
			}
		}
	}