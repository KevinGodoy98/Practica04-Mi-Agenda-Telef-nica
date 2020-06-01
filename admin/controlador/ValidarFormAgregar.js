document.getElementById("btnValidar").addEventListener("click",validar);
document.getElementById("btnValidar").addEventListener("click",ValidarCedula);
document.getElementById("btnValidar").addEventListener("click",ValidarNombre);
document.getElementById("btnValidar").addEventListener("click",ValidarApellido);
document.getElementById("btnValidar").addEventListener("click",ValidarRol);
document.getElementById("btnValidar").addEventListener("click",ValidarCorreo);
document.getElementById("btnValidar").addEventListener("click",ValidarContrasena);
document.getElementById("btnValidar").addEventListener("click",ValidarTelefono);
function validar() {
    var bandera = true

    for(var i = 0; i < document.forms[0].elements.length; i++){
    var elemento = document.forms[0].elements[i]
    if(elemento.value == '' && elemento.type == 'text'){
    if(elemento.id == 'cedula'){
        document.getElementById('cedula').innerHTML = '<br>La cedula esta vacia'
    }
    elemento.style.border = '1px red solid'
    elemento.className = 'error'
    bandera = false
    }
    }
   
    if(!bandera){
    alert('Error: revisar los campos, alguno esta vacio') 
    }
    EntrarPHP();
    return bandera
 
   }
   function validarLetras(elemento){
    if(elemento.value.length > 0){
    var miAscii = elemento.value.charCodeAt(elemento.value.length-1)
    console.log(miAscii)
   
    if(miAscii >= 97 && miAscii <= 122 || miAscii >= 65 && miAscii <= 90|| miAscii==32){
    return true
    }else {
    elemento.value = elemento.value.substring(0, elemento.value.length-1)
    return false
   }
   }else{
   return true
   
   }

  }

  function ValidarCedula() {
     var ced = document.getElementById("cedula").value;
   
    var [suma, mul, chars] = [0, 1, ced.length];
    for (var index = 0; index < chars; index += 1) {
    var num = ced[index] * mul;
    suma += num - (num > 9) * 9; 
      mul = 1 << index % 2;
}
if ((suma % 10 === 0) && (suma > 0)) {
  alert('Cedula Valida.');
  return true
} else {
  alert('revisar el campo cedula:invalida.');
  document.getElementById('cedula').value = "";
  return false
}
}
function ValidarNombre(){
    nombre1 = document.getElementById("nombre").value;
    nombre2 = nombre1.replace(/ /g, ""); 

    if (isNaN(nombre1) && (nombre1 != nombre2) && (nombre1.slice(-1) != " ")) {
        
        alert('Nombre valido')
        cont = 1;
        return true
    }else{
        
        alert('revisar el campo nombre:invalido')
        document.getElementById('nombre').value = "";
        return false
    }
}

function ValidarApellido(){
    apellido1 = document.getElementById("apellido").value;
    apellido2 = apellido1.replace(/ /g, ""); 

    if (isNaN(apellido1) && (apellido1 != apellido2) && (apellido1.slice(-1) != " ")) {
        
        alert('apellido valido')
        cont = 1;
        return true

    }else{
        
        alert('revisar el campo apellido:invalido')
        document.getElementById('apellido').value = "";
        return false
    }
}
function ValidarRol(){
    var rol = document.getElementById('rol').value;
    if (rol=='u'||rol=='U'||rol=='A'||rol=='a'){
        alert('rol valido')
        return true;
    }else{
        alert('rol invalido')
        return false;
    }
}
function ValidarTelefono(){
    ndigitos = document.getElementById("telefono").value;
     if(ndigitos.length==10){
        alert('Telefono Valido')
        return true
    }else{
        alert('Telefono Invalido')
        document.getElementById('telefono').value = "";
        return false
     }
}
function ValidarCorreo(){
    vcorreo = document.getElementById('Correo').value.split('@');

    if (vcorreo[0].length < 3) {
        alert('Correo Invalido')
        contC = 0;
    } else {
        if (!(vcorreo[1] == 'ups.edu.ec') && !(vcorreo[1] == 'est.ups.edu.ec')) {
            
            alert('Correo Invalido')
            document.getElementById('Correo').value = "";
            contC = 0;
            return true
        } else {
            
            alert('Correo Valido')
            contC = 1;
            return false
        }
    }
}
function ValidarContrasena(){
    pass = document.getElementById('password').value;
    if(pass.length >= 8)
    {		
        var mayuscula = false;
        var minuscula = false;
        var numero = false;
        var simbolo = false;
        
        for(var i = 0;i<pass.length;i++)
        {
            if(pass.charCodeAt(i) >= 65 && pass.charCodeAt(i) <= 90)
            {
                mayuscula = true;
            }
            else if(pass.charCodeAt(i) >= 97 && pass.charCodeAt(i) <= 122)
            {
                minuscula = true;
            }
            else if(pass.charCodeAt(i) >= 48 && pass.charCodeAt(i) <= 57)
            {
                numero = true;
            }
            else
            {
                simbolo = true;
            }
        }
        if(mayuscula == true && minuscula == true && simbolo == true && numero == true)
        {
            alert('Password Valido')
            return true;
            
        }
    }
    alert('Password Invalido')
    document.getElementById('password').value = "";
    return false;
  
}
function EntrarPHP(){
    
     if( ValidarCedula()==true && ValidarNombre()==true &&  ValidarApellido()==true &&  ValidarRol()==true  &&  ValidarCorreo()==true && ValidarContrasena()==true){
        return true;
  }else{
        return false;
        
  }
}