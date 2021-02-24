<?php

include_once 'userMapper.php';

if (isset($_GET['userid'])&&isset($_GET['edit-username'])&&isset($_GET['edit-useremail'])) {
    $userId = $_GET['userid'];
    $userName = $_GET['edit-username'];
    $userEmail = $_GET['edit-useremail'];
    if(empty($userName) || empty($userEmail)
    || !preg_match("/^[a-zA-Z0-9]+$/",$userName)||!preg_match("/^\S+@\S+\.\S+$/",$userEmail)){
        echo '<script type="text/javascript">'; 
        echo 'window.location.href = "../views/dashboard.php";';
        echo 'alert("Username or Email unacceptable!");';
        echo '</script>';
    }
    else{
    $mapper = new UserMapper();
    $users = $mapper->getAllUsersExcept($userId);
        foreach($users as $user){
            if($user['userName']==$userName || $user['userEmail']==$userEmail){
                echo '<script type="text/javascript">'; 
                echo 'window.location.href = "../views/dashboard.php";';
                echo 'alert("Username or Email already exists!");';
                echo '</script>';
                return true;
            }
        }
        $mapper->updateUser($userId,$userName,$userEmail);
        header("Location:../views/dashboard.php");
    }
}
?>
