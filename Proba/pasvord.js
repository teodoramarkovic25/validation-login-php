var forma = document.getElementById('forma1');

function duzinaLozinke(){
    var lozinka= document.getElementById('password').value;
    if(lozinka.length>5){
 
        forma.submit();
    }else{
        alert("lozinka mora imati više od 5 karaktera");
        forma.reset();
    }
}
