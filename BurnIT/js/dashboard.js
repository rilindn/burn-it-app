
function showDiv(param) {

  var userlist = document.getElementById('userlist');
  var products = document.getElementById('products');
  var cartProdList = document.getElementById('cartProdList');
  var trainers = document.getElementById('trainers');

  if(param == "1"){
    userlist.style.display = "block";
    products.style.display = "none";
    cartProdList.style.display = "none";
    trainers.style.display = "none";
  }
  else if(param == "2") {
    userlist.style.display = "none";
    products.style.display = "flex";
    cartProdList.style.display = "none";
    trainers.style.display = "none";
  }
  else if(param == "3") {
    userlist.style.display = "none";
    products.style.display = "none";
    cartProdList.style.display = "block";
    trainers.style.display = "none";
  }
  else if(param == "4") {
    userlist.style.display = "none";
    products.style.display = "none";
    cartProdList.style.display = "none";
    trainers.style.display = "flex";
  }
  var items = document.getElementsByClassName('clicker');
    for (var i = 0; i < items.length; i++) {
      items[i].addEventListener('click',event=>{
        event.preventDefault();
      });
    }
}
function showEditForm(p){
  
  var items = document.getElementsByName('editForm');
      if(items[p].style.display == "table-row"){
        items[p].style.display = "none";
      }
      else {
        items[p].style.display = "table-row";
      }

  var items = document.getElementsByName('editB');
    for (var i = 0; i < items.length; i++) {
      items[i].addEventListener('click',event=>{
        event.preventDefault();
      });
    }
}