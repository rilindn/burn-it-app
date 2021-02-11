<?php
include 'components/header.php';
require_once 'businessLogic/userMapper.php';
if (isset($_SESSION['role']) && $_SESSION['role'] == 1) {
    $mapper =  new UserMapper();
    $userList = $mapper->getAllUsers();
} else {
    header("Location:dashboard.php");
}
?>
<head>
    <link rel="stylesheet" href="css/dashboard.css" type="text/css" />
    </head>
<div class="dash-container">
    <div class="inner-dash-container" >
        <div id="userlist" class="">
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
                     foreach ($userList as $user) {
                        if($user['role']==0){
                            echo '<tr>';
                            echo  '<td>'.$user['userName'].'</td>';
                            echo  '<td>'.$user['userEmail'].'</td>';
                            echo  '<td><a href= "businessLogic/promoteToAdmin.php?id='.$user['userid'].'">Promote</td>';
                            echo  '<td><a href= "businessLogic/deleteUser.php?id='.$user['userid'].'">Delete</td>';
                            echo  '</tr>';
                            }
                  
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php 
  include 'components/footer.php';
?>


