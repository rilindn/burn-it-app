const form = document.getElementById('form')
const username = document.getElementById('username')
const password = document.getElementById('password')
const email= document.getElementById('email')
const password2= document.getElementById('password2')

form.addEventListener('submit',event=>{

    if(!checkInputs()){
        event.preventDefault();
        checkInputs();
    }
});
var usernameRegex = /^[a-zA-Z0-9]+$/;
var passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;

function  checkInputs(){
    const usernameValue = username.value;
    const passwordValue = password.value;
    const emailValue = email.value;
    const password2Value = password2.value;
    if (usernameValue == ''){
        setErrorFor(username,'Username cannot be empty!');
        return false;
    }
    else if (!usernameRegex.test(usernameValue)){
        setErrorFor(username,'Username not valid!');
        return false;
    }
    else{
        setSuccessFor(username);
    }
  
    if (emailValue == ''){
        setErrorFor(email,'Email cannot be empty!');
        return false;
    }
    else if (!isEmail(emailValue)) {
        setErrorFor(email, 'Not a valid email');
        return false;
    }
    else{
        setSuccessFor(email);
    }

    if (passwordValue == ''){
        setErrorFor(password,'Password cannot be empty!');
        return false;
    }
    else if (!passwordRegex.test(passwordValue)){
        setErrorFor(password,'Password not valid!');
        return false;
    }
    else{
        setSuccessFor(password);
    }

    if (password2Value == ''){
        setErrorFor(password2,'Password check cannot be empty!');
        return false;
    }
    else if(passwordValue !== password2Value) {
        setErrorFor(password2, 'Passwords does not match');
        return false;
    }
    else{
        setSuccessFor(password2);
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

function isEmail(email) {
	return /^\S+@\S+\.\S+$/.test(email);
}
