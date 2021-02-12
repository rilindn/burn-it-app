<?php 
        include '../components/header.php';
        require_once '../productLogic/productMapper.php';
        require_once '../userLogic/userMapper.php';
        $mapper =  new ProdMapper();
        $productList = $mapper->getAllProducts();
        if(isset($_SESSION['role'])){
        $mappers1 = new UserMapper();
        $user = $mappers1->getLogedInUserId($_SESSION['userName']);
      }
    ?>
    <head>
    <link rel="stylesheet" href="../css/shop.css" type="text/css" /></head>
  <body>
    <div class="shop-container">
      <h1>SHOP</h1>
      <h2>Proteins</h2>
      <div class="proteins-shop shop">
        <?php 
            foreach ($productList as $produkti){
              if($produkti['prodType']=="Protein"){
             echo '<div class="prod protein-prod">';
             echo '<img src="../photos/'.$produkti['prodPhoto'].'"/>';
             echo '<h3>'.$produkti['prodEmri'].'</h3>';
             echo '<h4>'.$produkti['prodCmimi'].'<sub>EUR</sub></h4>';
             if(isset($_SESSION['role'])){
             echo '<a href="../cartLogic/addProductToCart.php?userid='.$user['userid'].
             '&&prodid='.$produkti['prodid'].'&&prodEmri='.$produkti['prodEmri'].'
             &&prodPhoto='.$produkti['prodPhoto'].'&&prodCmimi='.$produkti['prodCmimi'].'
             &&prodType='.$produkti['prodType'].'"><button>Add to Cart</button></a>';}
             else{
              echo '<a href="login.php"><button>Add to Cart</button></a>';
             }
             echo '</div>';
              }
            }
        ?>
      </div> 

      <h2>Cardio Equipments</h2>
      <div class="cardio-shop shop">

        <?php 
            foreach ($productList as $produkti){
              if($produkti['prodType']=='Cardio'){
             echo '<div class="prod equipment-prod">';
             echo '<img src="../photos/'.$produkti['prodPhoto'].'" alt="" class="equipment-img"/>';
             echo '<h3>'.$produkti['prodEmri'].'</h3>';
             echo '<h4>'.$produkti['prodCmimi'].'<sub>EUR</sub></h4>';
             if(isset($_SESSION['role'])){
              echo '<a href="../cartLogic/addProductToCart.php?userid='.$user['userid'].
              '&&prodid='.$produkti['prodid'].'&&prodEmri='.$produkti['prodEmri'].'
              &&prodPhoto='.$produkti['prodPhoto'].'&&prodCmimi='.$produkti['prodCmimi'].'
              &&prodType='.$produkti['prodType'].'"><button>Add to Cart</button></a>';}
              else{
               echo '<a href="login.php"><button>Add to Cart</button></a>';
              }
             echo '</div>';
              }
            }
        ?>

      </div>
      <h2>Weight Lifting Equipments</h2>
      <div class="weight-shop shop">

      <?php
            foreach ($productList as $produkti){
              if($produkti['prodType']=='WeightLifting'){
             echo '<div class="prod equipment-prod">';
             echo '<img src="../photos/'.$produkti['prodPhoto'].'" alt="" class="equipment-img"/>';
             echo '<h3>'.$produkti['prodEmri'].'</h3>';
             echo '<h4>'.$produkti['prodCmimi'].'<sub>EUR</sub></h4>';
             if(isset($_SESSION['role'])){
              echo '<a href="../cartLogic/addProductToCart.php?userid='.$user['userid'].
              '&&prodid='.$produkti['prodid'].'&&prodEmri='.$produkti['prodEmri'].'
              &&prodPhoto='.$produkti['prodPhoto'].'&&prodCmimi='.$produkti['prodCmimi'].'
              &&prodType='.$produkti['prodType'].'"><button>Add to Cart</button></a>';}
              else{
               echo '<a href="login.php"><button>Add to Cart</button></a>';
              }
             echo '</div>';
              }
            }
        ?>
      </div>
    </div>
    <?php 
        include '../components/footer.php';
    ?>
