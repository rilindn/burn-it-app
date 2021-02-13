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
    document.getElementById('clicker1').addEventListener('click',event=>{
      event.preventDefault();
    });
    document.getElementById('clicker2').addEventListener('click',event=>{
      event.preventDefault();
    });
    document.getElementById('clicker3').addEventListener('click',event=>{
      event.preventDefault();
    });
    document.getElementById('clicker4').addEventListener('click',event=>{
      event.preventDefault();
    });
  }