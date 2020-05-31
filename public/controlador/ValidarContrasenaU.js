
document.getElementById("btnValidar").addEventListener("click",ValidarContrasena);
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
            alert('Password Valido');
           
            return true;
            
        }
    }
    alert('Password Invalido')
    document.getElementById('password').value = "";
    
    return false;
  
}
