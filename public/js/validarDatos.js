function validar(e){
    e.preventDefault();

    let pass     = document.getElementById('pass').value;
    let passR     = document.getElementById('passR').value;

    if(pass !== passR){
    
        
        $('#text-alert').text('las contraseñas no coinciden');
        $('#alert-form').show(200);
        setTimeout(()=>
        {
            $('#alert-form').hide(200);
        },2000);
     
    }


}

const $form = document.getElementById("form-registro");


$form.addEventListener('submit',validar);
