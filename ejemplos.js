var urlParams;
(window.onpopstate = function () {
    var match,
        pl     = /\+/g,  // Regex for replacing addition symbol with a space
        search = /([^&=]+)=?([^&]*)/g,
        decode = function (s) { return decodeURIComponent(s.replace(pl, " ")); },
        query  = window.location.search.substring(1);
  
    urlParams = {};
    while (match = search.exec(query))
       urlParams[decode(match[1])] = decode(match[2]);
})();

function mostrar() {

  document.getElementById('linea_1_1').innerHTML = urlParams['car'];
  document.getElementById('linea_2_1').innerHTML = urlParams['nombre'];
  document.getElementById('linea_3_1').innerHTML = urlParams['apellidos'];
  document.getElementById('linea_4_1').innerHTML = urlParams['nrodoc'];
  document.getElementById('linea_5_1').innerHTML = urlParams['nroinsc'];
  document.getElementById('linea_6_1').innerHTML = urlParams['nrocel'];
  document.getElementById('linea_7_1').innerHTML = urlParams['provincia'];
  document.getElementById('linea_8_1').innerHTML = urlParams['coment'];
  


  document.getElementById('nombre').value = urlParams['nombre'];
  document.getElementById('apellidos').value = urlParams['apellidos'];
  document.getElementById('car').value = urlParams['car'];
  document.getElementById('nrodoc').value = urlParams['nrodoc'];
  document.getElementById('nroinsc').value = urlParams['nroinsc'];
  document.getElementById('nrocel').value = urlParams['nrocel'];
  
  if(urlParams['provincia'] == "Mendoza"){
     document.getElementById('provincia').value.selected = "selected";
  }
  else if(urlParams['provincia'] == "Cordoba"){
    document.getElementById('provincia').value.selected = "selected";
  }

}




function Validar_formulario(formobj)
{
var fieldRequired = new Array ("nombre","apellidos", "car", "nrodoc", "nroinsc","nrocel","provincia","coment");

var fieldDescription = new Array("Nombre","Apellidos", "Carrera", "Nro Doc", "Nro Insc","Nro Cel", "Provincia", "Comentarios");

	var alertMsg = "Por favor complete el siguiente campo:\n";
        var l_Msg = alertMsg.length;
	for (var i = 0; i <= fieldRequired.length; i++)
        {
		var obj = formobj.elements[fieldRequired[i]];
                 //alert(obj.name);
                if (obj)
                {
			switch(obj.type)
                        {
			 case "select-one":
                           if(obj.options[obj.selectedIndex].value == "" || obj.options[obj.selectedIndex].text == "Seleccionar")
                           {
					alertMsg += " - " + fieldDescription[i] + "\n";
                           }
			   break;
			 case "text":
                           if(obj.value == "" || obj.value == null){
					alertMsg += " - " + fieldDescription[i] + "\n";
			   }
			   if(obj.name == "nrodoc" && !Esentero(obj.value)){
                             	        alertMsg += " - " + fieldDescription[i] + "\n";
                           }
                           else if(obj.name == "nroinsc" && !Esentero(obj.value)){
                             	        alertMsg += " - " + fieldDescription[i] + "\n";
                           }
         if(obj.name == "nrocel" && !Esentero(obj.value)){
                            alertMsg += " - " + fieldDescription[i] + "\n";
                }
                else if(obj.name == "nrocel" && !Esentero(obj.value)){
                            alertMsg += " - " + fieldDescription[i] + "\n";
                }
			   break;
			 case "textarea":
			   if (obj.value == "" || obj.value == null)
                           {
					alertMsg += " - " + fieldDescription[i] + "\n";
			   }
			   break;
			default:
			}
			if (obj.type == undefined)
                        {
				var blnchecked = false;
				for (var j = 0; j < obj.length; j++)
                                {
					if (obj[j].checked){blnchecked = true;}
				}
				if (!blnchecked){alertMsg += " - " + fieldDescription[i] + "\n";}
			}
		}
	}
        if (alertMsg.length == l_Msg)
        {
                return true;
        }
        else{
                alert(alertMsg);
                return false;
        }

}

//CHEQUEO DE LETRAS

function letras(field, event)
{
    var nav4 = window.Event ? true : false;
    var keyCode = event.keyCode ? event.keyCode : event.which ? event.which : event.charCode;

    if (test(field.value,/^[0-9]{1,10}$/))
    {
      return field.value;
    }
    else
    {
      var str = field.value.substr(0,field.value.length-1);
      return str;
    }
}

//COLOREO DE CELDAS
function colorear(a,b)
{
   //alert(a);
   if(b == true)
   { 
      for (var i = 1; i < 6; i++)
      {
           document.getElementById("linea_"+i+"_"+a).style.background='#f5f5f5';
      }
   }
   else if(b == false)
   {
      for (var o = 1; o < 6; o++)
      {
           document.getElementById("linea_"+o+"_"+a).style.background='#CCCCCC';
      }
   }
   return true;
}

//EVITA SE PRESIONE EL BOTON ENTER
function iSubmitEnter(oEvento, oFormulario){
     var iAscii; 

     if (oEvento.keyCode) 
         iAscii = oEvento.keyCode; 
     else if (oEvento.which) 
         iAscii = oEvento.which;
     else 
         return false;

     if (iAscii == 13)
     {
       oFormulario.submit();
     }
     return true; 
}

//FUNCION CONFIRM
function Preguntar(oFormulario)
{
  if(confirm("Despu�s de confirmar esta rendici�n los ingresos correspondientes no podr�n modificarse.\n\t\t�Est� seguro que desea Confirmar esta rendici�n?"))
  {
     oFormulario.submit();
     return true;
  }
  else{
     return false;
  }
}

//VERIFICA QUE SEA UN NUMERO ENTERO   124444
function Esentero(valor){
        if(!isNaN(valor)){
            for(var i = 0; i<valor.length;i++){
                if(valor.charCodeAt(i)<48 || valor.charCodeAt(i)>57)
                    return false;
            }
        }else{
            return false;
        }

        return true;
}

// Funcion para eliminar espacios delante y detras de cada cadena
function eliminaEspacios(cadena)
{
while(cadena.charAt(cadena.length-1)==" ") cadena=cadena.substr(0, cadena.length-1);
while(cadena.charAt(0)==" ") cadena=cadena.substr(1, cadena.length-1);
return cadena;
}

//LIMITA LA CANTIDAD DE CARACTERES DE UN TEXAREA
function textCounter(field, maxlimit)
{
  var countfield = 200;
  if (field.value.length > maxlimit) // if too long...trim it!
      field.value = field.value.substring(0, maxlimit);
      //otherwise, update 'characters left' counter
  else
     countfield.value = maxlimit - field.value.length;
}

//ACTIVO O DESACTIVO CAMPOS
function On_Off_Campo(campo){
  if(campo.name == 'exa_trabaja')
  {
        if(campo.value == 1){ document.getElementById("exa_tra_afi1").disabled = false; }
        else{ document.getElementById("exa_hor_sem").disabled  = true; }
  }
}

//EXPRESIONES REGULARES
moneda=/^[0-9]{0,4}(\.[0-9]{2}|[0-9])$/
peso=/^[0-9]{0,6}(\.[0-9]{2}|[0-9])$/
imc=/^[0-9]{0,3}(\.[0-9]{1}|[0-9])$/
entero=/^[0-9]{1,3}$/
fecha=/^([012][0-9]|3[01])\/(0[1-9]|1[012])\/(199[4-9]|20[0-9][0-9])$/
function eregular(campo,exp){
  if(exp.test(campo.value)){
      return true
  }else{
      if(exp == fecha)
      {
      alert('Fecha incorrecta');
      campo.select();
      campo.focus();
      }
      else if(exp == entero)
      {
      alert('N�mero incorrecto');
      campo.select();
      campo.focus();
      }
      else if(exp == moneda)
      {
      alert('Cantidad de tragos incorrecta');
      campo.value = '0.00';
      campo.select();
      campo.focus();
      }
      else if(exp == peso)
      {
      alert('Peso incorrecto');
      campo.value = '0';
      campo.select();
      campo.focus();
      }
      else if(exp == imc)
      {
      alert('IMC incorrecto');
      campo.value = '0';
      campo.select();
      campo.focus();
      }
      return false;
  }
}