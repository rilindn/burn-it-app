const form = document.getElementById('form')
const username = document.getElementById('username')
const password = document.getElementById('password')

form.addEventListener('submit',event=>{

    if(!checkInputs()){
        event.preventDefault();
        checkInputs();
    }
});

function checkInputs(){
    const usernameValue = username.value;
    const passwordValue = password.value;
    if (usernameValue == ''){
        setErrorFor(username,'Username cannot be empty!');
        return false;
    }
    else {
        setSuccessFor(username);
    }
    if (passwordValue == ''){
        setErrorFor(password,'Password cannot be empty!');
        return false;
    }
    else{
        setSuccessFor(password);
        return true;
    }
    
}

function setErrorFor(input,message){
    const formControl = input.parentElement;
    const small = formControl.querySelector('small');

    small.innerText = message;

    formControl.className = 'form-control error';
}

function setSuccessFor(input){
    const formControl = input.parentElement;
    formControl.className = 'form-control success';
}
