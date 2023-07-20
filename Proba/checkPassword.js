var form = document.getElementById('form');

function checkPassword(){
   var pass = document.getElementById('password').value;
    if (pass.length > 5)
    {
        form.submit();
    }
    else{
        alert("Password must be at least 6 characters long!");
        form.reset();
    }
}