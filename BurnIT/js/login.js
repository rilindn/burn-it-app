const form = document.getElementById('form')
const username = document.getElementById('username')
const password = document.getElementById('password')

form.addEventListener('submit', event=>{
    event.preventDefault();
    checkInputs();
});
function  checkInputs(){
    const usernameValue = username.value;
    const passwordValue = password.value;
    if (usernameValue == ''){

        setErrorFor(username,'Username cannot be empty!');
    }
    else{
        setSuccessFor(username);
    }
    if (passwordValue == ''){
        setErrorFor(password,'Password cannot be empty!');
    }
    else{
        setSuccessFor(password);
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
var passwordValue1 = '';

var loginObj = {
  username:"",
  password:""
}
