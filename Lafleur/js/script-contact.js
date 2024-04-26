function isValidEmail(email) {
    // Regular expression to validate an email address
    var regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return regex.test(email);
}

function verification_saisie(){

    vide = 0;
    // Check if inputs are not empty
    let inputs = document.getElementsByClassName('inputs');
    for(let input of inputs){
        if(input.value.trim() == ""){
            vide++;
            input.style.border ="2px solid red";
        }else{
            input.style.border="1px solid black";
        }
    }
    // Check if the email is correct
    let mail = document.getElementById('email');
    if(!isValidEmail(mail.value)){
        mail.style.border="2px solid red";        
        let element = document.getElementById('erreur_mail');
        element.innerText = "Veuillez écrire une adresse mail valide";
        event.preventDefault();
    }else{
        mail.style.border="1px solid black";
        let element = document.getElementById('erreur_mail');
        element.innerText = "";
    }

    // Check if dates are written
    let dates = document.getElementsByClassName("dates");
    for(let date of dates){
        if(date.value == ""){
            vide++;
            date.style.border = '2px solid red';
        }else{
            date.style.border = '1px solid black';
        }
    }
    // Check the selection of radio buttons
    let radios = document.getElementsByName('genre');
    let checked = false;
    for(let i = 0; i < radios.length; i++){
        if(radios[i].checked) {
            checked = true;
        }
    }
    if(!checked){
        vide++;
        for(let radio of radios){
            radio.parentNode.style.color = 'red';
        }
    }else{
        for(let radio of radios){
            radio.parentNode.style.color = 'black';
        }
    }
    // Check if the textarea is not empty
    var textarea = document.getElementById('contenu');
    var contenu = textarea.value;
    if(contenu == ""){
        textarea.style.border = "2px solid red";
        vide++;
    }else{
        textarea.style.border = "1px solid black";
    }

    if(vide > 0){
        let element = document.getElementById('champ_vide');
        element.innerText = "Veuillez remplir tous les champs de saisie qui sont rouges";
        event.preventDefault();
    }else{
        let element = document.getElementById('champ_vide');
        element.innerText = "";
    }
}
