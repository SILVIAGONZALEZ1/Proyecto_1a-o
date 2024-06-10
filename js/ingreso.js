function Inicio(){
    document.getElementById("usuario").focus();
    }
    
    var http = getXmlHttpObject();
    var numero = Math.random().toString();
    
    
    function eliminaEspacios(cadena)
    {
    // Funcion para eliminar espacios delante y detras de cada cadena
    while(cadena.charAt(cadena.length-1)==" ") cadena=cadena.substr(0, cadena.length-1);
    while(cadena.charAt(0)==" ") cadena=cadena.substr(1, cadena.length-1);
    return cadena;
    }
    
    function calculaMD5(obj)
    {
    var u = document.forms["form1"].elements["usuario"].value;
    var p = document.getElementById("pass").value;
    
    // Elimino espacios por delante y detras de lo ingresado por el usuario
    valor=eliminaEspacios(u);
    
    // Si el ingreso es invalido...
    if(u == "" || u == undefined || u == null)
    {
    document.getElementById('mensaje').innerHTML="El Usuario ingresado contiene una longitud inv&aacute;lida";
    return false;
    }
    else if(p == "" || p == undefined || p == null)
    {
    document.getElementById('mensaje').innerHTML="La clave ingresada contiene caracteres o longitud inv&aacute;lida";
    return false;
    }
    else{
        var hash = hex_md5(p);
        document.getElementById("pass").value = hash;
        http.open("POST","chk_validat_user.php", true);
        http.onreadystatechange = handleHttpResponse_name;
        http.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        http.send("pass="+hash+"&usuario="+u);
        return false;
    }
    }
    
    function handleHttpResponse_name(){
    
        if (http.readyState == 1){
            document.getElementById('mensaje').innerHTML = "Analizando...";
        }
        if (http.readyState == 4){ 
            //Clave Incorrecta     document.getElementById('form1').submit();
            //Usuario Incorrecto o Inexistente
            //Usuario y Clave Incorrectos
            results_name = http.responseText;
            if(results_name == "00"){ document.getElementById('form1').submit(); }
            else if(results_name == "02"){ document.getElementById('mensaje').innerHTML= "Clave Incorrecta"; return false; }
            else if(results_name == "10"){ document.getElementById('mensaje').innerHTML= "Usuario Incorrecto o Inexistente"; return false; }
            else if(results_name == "12"){ document.getElementById('mensaje').innerHTML= "Usuario y Clave Incorrectos"; return false; }
            else{ document.getElementById('mensaje').innerHTML = ""; return false; }
        }
    }
    
    function getXmlHttpObject(){
        var xmlhttp; 
    
        /*@cc_on
        @if (@_jscript_version >= 5) 
        try{ 
        xmlhttp = window.XMLHttpRequest?new XMLHttpRequest(): new ActiveXObject("Msxml2.XMLHTTP");
        //xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
        } 
        catch (e){ 
        try{ 
        xmlhttp = window.XMLHttpRequest?new XMLHttpRequest(): new ActiveXObject("Microsoft.XMLHTTP");
        //xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        } 
        catch (e){ 
        xmlhttp = false; 
        } 
        } 
        @else 
        xmlhttp = false; 
        @end @*/ 
    
        if (!xmlhttp && typeof XMLHttpRequest != 'undefined'){ 
            try{ 
                xmlhttp = new XMLHttpRequest(); 
            } 
            catch (e){ 
                xmlhttp = false; 
            } 
        } 
        return xmlhttp; 
    } 
    