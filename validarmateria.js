let urlParams;
(window.onpopstate = function () {
    let match,
        pl     = /\+/g,  // Regex for replacing addition symbol with a space
        search = /([^&=]+)=?([^&]*)/g,
        decode = function (s) { return decodeURIComponent(s.replace(pl, " ")); },
        query  = window.location.search.substring(1);
  
    urlParams = {};
    while (match = search.exec(query))
       urlParams[decode(match[1])] = decode(match[2]);
})();

function Validar_materia(formobj) {
let fieldRequired = new Array ("materia");

let fieldDescription = new Array("Materia");

	let alertMsg = "Por favor complete el siguiente campo:\n";
        let l_Msg = alertMsg.length;
	for (let i = 0; i <= fieldRequired.length; i++)
        {
		let obj = formobj.elements[fieldRequired[i]];
                 
                if (obj)
                {
                        switch  (obj.type) {
			
			 case "text":
                           if(obj.value == "" || obj.value == null){
					alertMsg += " - " + fieldDescription[i] + "\n";
			   }
			  
			   break;
			
			default:
			}
			if (obj.type == undefined)
                        {
				let blnchecked = false;
				for (const element of obj) {
					if (element.checked){blnchecked = true;}}
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
