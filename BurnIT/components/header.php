<?php
  session_start();
  require_once '../cartLogic/cartMapper.php';
  require_once '../userLogic/userMapper.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Burn It</title>
    <link rel="icon" href="../photos/icon.jpg" />
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link
      rel="stylesheet"
      href="../fontawesome-free-5.15.1-web/css/all.css"
    />
    <link
      href="//db.onlinewebfonts.com/c/dbf69272e2482b8d0f1fc45d9f9a45b8?family=OitaW01-CondDemiItalic"
      rel="stylesheet"
      type="text/css"
    />
    <link
      href="../css/header.css"
      rel="stylesheet"
      type="text/css"
    />
  </head>
  <nav class="header-nav">
    <input type="checkbox" id="check" />
    <label for="check" class="checkbtn">
      <i class="fas fa-bars"></i>
    </label>
    <label class="logo">
      <img src="../photos/logo-pic.jpg" alt="" class="logo-pic" />
    </label>
    <ul>
      <li><a href="../views/index.php">Home</a></li>
      <li><a href="../views/memberships.php">Memberships</a></li>
      <li><a href="../views/shop.php">Shop</a></li>
      <li><a href="../views/personaltraining.php">Personal Training</a></li>
  
      
      <?php 
          if(isset($_SESSION['role'])&& $_SESSION['role']=='1'){
            echo '<li><a id="dashboard" href="../views/dashboard.php">Dashboard</a></li>';
          }

          if(isset($_SESSION['role'])&& $_SESSION['role']=='0'){
            echo '<li id="shopping-cart" class="shopping-cartDesktop"><a href="" onclick="showDiv()"><i class="fas fa-shopping-cart"></i></a></li>';
          }
          
          if(!isset($_SESSION['role'])){
            echo '<li><a id="login" href="../views/login.php">Log in</a></li>';
          }
     
          if (isset($_SESSION["role"])) {
            echo '<li><a id="login" href="../userLogic/logout.php">Log out</a></li>';
          }
      ?>
      </ul>
  </nav>
      <?php
         if(isset($_SESSION['role'])&& $_SESSION['role']=='0'){
          $cartProd = new CartMapper();
          $products =  $cartProd->getAllProducts();
          $mappers1 = new UserMapper();
          $user = $mappers1->getLogedInUserId($_SESSION['userName']);
          echo '<div id="cart-div"> <h1>CART</h1>';
          if(empty($products)){
            echo '<div class="empty-cart"><h3 >Cart is empty.</h3></div>';
          }
          else{
              foreach($products as $prod){
                if($user['userid']===$prod['userid']){
                  echo '<div class="inner-cart-div">';
                  echo '<img src="../photos/'.$prod['prodPhoto'].'"/>';
                  echo '<div class="description-div">';
                  echo '<h3>'.$prod['prodEmri'].'</h3>';
                  echo '<h4>'.$prod['prodCmimi'].'EUR</h4>';
                  echo '</div>';
                  echo '<a href= "../cartLogic/deleteFromCart.php?cartid='.$prod['cartid'].'&&pageurl='.$_SERVER['PHP_SELF'].'"><i class="fa fa-remove"></i></a>';
                  echo '</div>';
                }
              }
          }
          
          echo '</div>';
        }
        if(isset($_SESSION['role'])&& $_SESSION['role']=='0'){
        echo '<li id="shopping-cartM"><a href="" onclick="showDiv()"><i class="fas fa-shopping-cart"></i></a></li>';
        }
      ?>
  
  <script>
    function showDiv() {

      var cart = document.getElementById('cart-div');
      if(cart.style.display == "block"){
        cart.style.display = "none";
      }
      else {
        cart.style.display = "block";
      }
      document.getElementById('shopping-cart').addEventListener('click',event=>{
        event.preventDefault();
      });
      document.getElementById('shopping-cartM').addEventListener('click',event=>{
        event.preventDefault();
      });
    }
  </script>