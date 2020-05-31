document.getElementById("btnBuscar").addEventListener("click",buscarAnonimo);

function buscarAnonimo() {
    var parametro = document.getElementById("BuscarParametro").value;
    if (parametro == "") {
    document.getElementById("buscar").innerHTML = "";
    } else {
    if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp = new XMLHttpRequest();
    } else {
    // code for IE6, IE5
    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    //alert("llegue");
    document.getElementById("buscar").innerHTML = this.responseText;
    }
    };
    xmlhttp.open("GET","/hypermedial/Practica-PHP/Practica04-Mi-Agenda-Telef-nica/public/vista/listarTelefonosAnonimo.php?BuscarParametro="+parametro,true);
    xmlhttp.send();
    }
    return false;
   }
