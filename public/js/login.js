
if(localStorage.getItem('activo'))window.location.href = "asistencia.html"; 


let user={
    "email":"admin@gmail.com",
    "pass":"123",
    "nombre":"Johan robles"
};





function IniciarSesion( e ){
    
    e.preventDefault();
    
    let username = document.getElementById('mail').value;
    let pass     = document.getElementById('pass').value;
     
    

    if(username.toLowerCase() === user['email'] && pass === user['pass']){
       
       
        window.location.href = "asistencia.html";
        localStorage.setItem('activo',user.nombre);

    }else{
        
        $('#text-alert').text('Correo o Contraseña incorrectos');
        $('#alert-form').show(200);
        setTimeout(()=>
        {
            $('#alert-form').hide(200);
        },2000);

    }

}



const $form = document.getElementById("form-login");


$form.addEventListener('submit', IniciarSesion);
