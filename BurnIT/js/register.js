const form = document.getElementById('form')
const username = document.getElementById('username')
const password = document.getElementById('password')
const email= document.getElementById('email')
const password2= document.getElementById('password2')

form.addEventListener('submit', event=>{
    event.preventDefault();
    checkInputs();
});
function  checkInputs(){
    const usernameValue = username.value;
    const passwordValue = password.value;
    const emailValue = email.value;
    const password2Value = password2.value;
    if (usernameValue == ''){

        setErrorFor(username,'Username cannot be empty!');
    }
    else{
        setSuccessFor(username);
    }

    if (emailValue == ''){
        setErrorFor(email,'Email cannot be empty!');
    }
    else if (!isEmail(emailValue)) {
        setErrorFor(email, 'Not a valid email');
    }
    else{
        setSuccessFor(email);
    }

    if (passwordValue == ''){
        setErrorFor(password,'Password cannot be empty!');
    }
    else{
        setSuccessFor(password);
    }

    if (password2Value == ''){
        setErrorFor(password2,'Password check cannot be empty!');
    }
    else if(passwordValue !== password2Value) {
        setErrorFor(password2, 'Passwords does not match');
    }
    else{
        setSuccessFor(password2);
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

var elementList= document.getElementsByClassName('input-field');

  for(var i=0; i<elementList.length;i++){
      elementList[i].addEventListener('keyup',function(event){
        event.preventDefault();

        loginObj={
          ...loginObj,
          [event.target.name]:event.target.value
        }
        console.log(loginObj)
      })
    }
var usernameValue1 = '';
var emailValue1 = '';
var passwordValue1 = '';
var password2Value1 = '';

var loginObj = {
  username:"",
  email:"",
  password:"",
  password2:""
}
