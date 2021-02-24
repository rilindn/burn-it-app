<?php
include '../components/header.php';
require_once '../userLogic/userMapper.php';
require_once '../productLogic/productMapper.php';
require_once '../trainerLogic/trainerMapper.php';
if (isset($_SESSION['role']) && $_SESSION['role'] == 1) {
    $mapper =  new UserMapper();
    $userList = $mapper->getAllUsers();
} else {
    header("Location:dashboard.php");
}
$mapper =  new ProdMapper();
$productList = $mapper->getAllProducts();
$cartProd = new CartMapper();
$cartproducts =  $cartProd->getAllProducts();
?>
<head>
    <link rel="stylesheet" href="../css/dashboard.css" type="text/css" />
    </head>
<div class="dash-container">

    <div class="dash-selector">
      <ul>
        <li class="clicker" ><a href="" onclick="showDiv(1)" ><h4>User list</h4></a></li>
        <li class="clicker" ><a href="" onclick="showDiv(2)" ><h4>Product List</h4></a></li>
        <li class="clicker" ><a href="" onclick="showDiv(3)" ><h4>Cart Product List</h4></a></li>
        <li class="clicker" ><a href="" onclick="showDiv(4)" ><h4>Trainers</h4></a></li>
        </ul>
    </div>
    <div class="inner-dash-container" >
        <div id="userlist" class="" style="display:block">
        <h2 class="list-title">User list:</h2>
          <table>
            <thead>
                <tr>
                    <td>Username</td>
                    <td>Email</td>
                    <td>Promote to Admin</td>
                </tr>
            </thead>
            <tbody>
                <?php
                $count=0;
                foreach ($userList as $user) {
                  if($user['role']==0){
                    echo  '<tr>';
                    echo  '<td>'.$user['userName'].'</td>';
                    echo  '<td>'.$user['userEmail'].'</td>';
                    echo  '<td><a href= "../userLogic/promoteToAdmin.php?id='.$user['userid'].'">Promote</td>';
                    echo  '<td name="editB"><a href= "" onclick="showEditForm('.$count++.')">Edit</td>';
                    echo  '<td><a href= "../userLogic/deleteUser.php?id='.$user['userid'].'">Delete</td>';
                    echo  '</tr>';

                    echo  '<tr id="editForm" name="editForm" style="display:none">';
                    echo  '<form method="get" action="../userLogic/editUser.php" class="editForm">';
                    echo  '<td style="display:none;"><input type="number" name="userid" value="'.$user['userid'].'"/></td>';
                    echo  '<td><input class="editInput editInputName" type="text" name="edit-username" value="'.$user['userName'].'"/></td>';
                    echo  '<td><input class="editInput" type="email" name="edit-useremail" value="'.$user['userEmail'].'"/></td>';
                    echo  '<td id="emptyDiv"><input type="number" style="display:none" name="id" value="'.$user['role'].'"/></td>';
                    echo  '<td colspan="2"> <a href=""><button type="submit" class="save-btn">Save</button></td>';
                    echo  '</form>';
                    echo  '</tr>';
                    
                  } 
                  
                }
                
                ?>
               
            </tbody>
          </table>
        </div>
        <div id="products" style="display:none">
            <div>
            <h2 class="list-title">Product list</h2>
              <table>
                  <thead>
                    <tr>
                          <td>Name</td>
                            <td>Photo</td>
                            <td>Price</td>
                            <td>Type</td>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    foreach ($productList as $product) {
                        echo '<tr>';
                        echo  '<td>'.$product['prodEmri'].'</td>';
                        echo  '<td><img class="list-photos" src="../photos/'.$product['prodPhoto'].'"/></td>';
                        echo  '<td>'.$product['prodCmimi'].' EUR</td>';
                        echo  '<td>'.$product['prodType'].'</td>';
                        echo  '<td name="editB"><a href= "" onclick="showEditForm('.$count++.')">Edit</td>';
                        echo  '<td><a href= "../productLogic/deleteProduct.php?id='.$product['prodid'].'">Delete</td>';
                        echo  '</tr>';

                        echo  '<tr id="editForm" name="editForm" style="display:none">';
                        echo  '<form method="get" action="../productLogic/editProd.php" class="editForm">';
                        echo  '<td style="display:none;"><input type="number" name="id" value="'.$product['prodid'].'"/></td>';
                        echo  '<td><input class="editInput editInputPName" style="width:250px" type="text" name="edit-name" value="'.$product['prodEmri'].'"/></td>';
                        echo  '<td><input class="editInput editInputPrPhoto" style="width:75px;font-size:8pt;" type="file" name="edit-photo" value="../photos/'.$product['prodPhoto'].'"/></td>';
                        echo  '<td><input class="editInput editInputCmimi" style="width:60px" type="number" name="edit-price" value="'.$product['prodCmimi'].'"/></td>';
                        echo  '<td><input class="editInput editInputType" style="width:60px" type="text" name="edit-type" value="'.$product['prodType'].'"/></td>';
                        echo  '<td colspan="2"> <a href=""><button type="submit" class="save-btn">Save</button></td>';
                        echo  '</form>';
                        echo  '</tr>';
                      }
                    ?>
                  </tbody>
              </table>
            </div>
            <div class="form-div">
            <h2 class="list-title register-title">Register new product</h2>
              <form id="formProduct" class="formR" action="../productLogic/productAdmit.php" method="POST" >
                   <div class="form-control">
                     <label for="emri">Name</label>
                     <br>
                     <input
                       type="text"
                       name="emri"
                       id="emri"
                       class="input-field"
                     />
                   </div>
                   <div class="form-control">
                     <label for="image">Photo</label><br>
                     <input type="file" name="image" id="image" class="input-field" />

                   </div>
                   <div class="form-control">
                     <label for="price">Price</label><br>
                     <input
                       type="double"
                       name="cmimi"
                       id="price"
                       class="input-field"
                     />
                   </div>
                   <div class="form-control-select">
                   <label for="type">Type</label><br>
                   <input type="radio" id="protein" name="type" value="Protein" checked="checked">
                   <label for="protein">Protein</label>
                   <input type="radio" id="weightlifting" name="type" value="WeightLifting">
                   <label for="weightlifting">Weight Lifting</label>
                   <input type="radio" id="cardio" name="type" value="Cardio">
                   <label for="cardio">Cardio</label>
                    </div>
                   <br>
                   <button type="submit" name='register-prod' value="register">Register product</button>   
                  </form>
            </div>
        </div>

        <div id="cartProdList" class="" style="display:none">
                <h2 class="list-title">Cart product list</h2>
                <table>
                  <thead>
                      <tr>
                        <td>Purchaser Username</td>
                        <td>Product Name</td>
                        <td>Photo</td>
                        <td>Price</td>
                        
                      </tr>
                  </thead>
                
                  <tbody>
                <?php
                foreach ($cartproducts as $cProd) {
                        $um =  new UserMapper();
                        $user = $um->getUserNameById($cProd['userid']);
                        echo '<td>'.$user.'</td>';
                        echo  '<td>'.$cProd['prodEmri'].'</td>';
                        echo  '<td><img class="list-photos" src="../photos/'.$cProd['prodPhoto'].'"/></td>';
                        echo  '<td>'.$cProd['prodCmimi'].'</td>';
                        echo  '<td><a href= "../cartLogic/deleteFromCart.php?cartid='.$cProd['cartid'].'&&pageurl='.$_SERVER['PHP_SELF'].'">Delete</td>';
                        echo  '</tr>';

                        
                  }
                ?>
                  </tbody>
                </table>
      </div>
      
      <div id="trainers" style="display:none">
      <div>
            <h2 class="list-title">Trainer list</h2>
        <table>
                <thead>
                      <tr>
                        <td>Name</td>
                        <td>Photo</td>
                        <td>Age</td>
                        <td>Qualification</td>
                        
                      </tr>
                  </thead>
                
                  <tbody>
                  <?php
                  $mapper = new TrainerMapper();
                  $trainers = $mapper->getAllTrainers();
                foreach ($trainers as $trainer) {
                    echo  '<tr>';
                    echo  '<td>'.$trainer['name'].'</td>';
                    echo  '<td><img class="list-photos" src="../photos/'.$trainer['photo'].'"/></td>';
                    echo  '<td>'.$trainer['age'].'</td>';
                    echo  '<td>'.$trainer['qualification'].'</td>';
                    echo  '<td name="editB"><a href= "" onclick="showEditForm('.$count++.')">Edit</td>';
                    echo  '<td><a href= "../trainerLogic/deleteTrainer.php?id='.$trainer['trainerid'].'">Delete</td>';
                    echo  '</tr>';

                    echo  '<tr id="editForm" name="editForm" style="display:none">';
                    echo  '<form method="get" action="../trainerLogic/editTrainer.php" class="editForm">';
                    echo  '<td style="display:none;"><input type="number" name="id" value="'.$trainer['trainerid'].'"/></td>';
                    echo  '<td><input class="editInput editInputTName" style="width:55px" type="text" name="edit-name" value="'.$trainer['name'].'"/></td>';
                    echo  '<td><input class="editInput editInputPrPhoto" style="width:75px;font-size:8pt;" type="file" name="edit-photo" /></td>';
                    echo  '<td><input class="editInput editInputTAge" style="width:40px" type="number" name="edit-age" value="'.$trainer['age'].'"/></td>';
                    echo  '<td><input class="editInput editInputTQ" style="width:110px" type="text" name="edit-qualification" value="'.$trainer['qualification'].'"/></td>';
                    echo  '<td colspan="2"> <a href=""><button type="submit" class="save-btn">Save</button></td>';
                    echo  '</form>';
                    echo  '</tr>';
                  
                }
                ?>
                  </tbody>
                </table>
            </div>
      <div class="form-div">
      <h2 class="list-title register-title">Register new trainer</h2>
        <form id="formTrainer" class="formR" action="../trainerLogic/newTrainer.php" method="POST" >
          <div class="form-control">
            <label for="name">Name</label><br>
            <input
              type="text"
              name="name"
              id="name"
              class="input-field"
            />
          </div>
          <div class="form-control">
            <label for="image">Photo</label><br>
            <input type="file" name="image" id="image" class="input-field" />
            
          </div>
          <div class="form-control">
            <label for="age">Age</label><br>
            <input
              type="int"
              name="age"
              id="age"
              class="input-field"
            />
          </div>
          <div class="form-control-select">
          <label for="qualification">Qualification</label><br>
          <input type="radio" id="Trainer" name="qualification" value="Trainer" checked="checked">
          <label for="Trainer">Trainer</label>
          <input type="radio" id="Master Teacher" name="qualification" value="Master Teacher" >
          <label for="protein">Master Teacher</label><br>
          <br>
              </div>
          <button type="submit" name='register-trainer' value="register">Register trainer</button>
        </form>
        </div>
        
        </div>
    </div>
</div>
<?php 
  include '../components/footer.php';
?>
<script src="../js/dashboard.js"></script>


