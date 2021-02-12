<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link rel="icon" href="photos/icon.jpg" />
    <link rel="stylesheet" href="css/loginreg.css" />
    <title>Register</title>
  </head>
  <body>
    <div class="body">
      <div class="container">
        <div class="header">
          <h2>Create Account</h2>
        </div>
  <form id="form" class="form" action="businessLogic/loginVerify.php" method="POST">
          <div class="form-control">
            <label for="username">Username</label>
            <input
              type="text"
              name="register-username"
              id="username"
              class="input-field"
            />
            <i class="fa fa-check-circle"></i>
            <i class="fa fa-exclamation-circle"></i>
            <small></small>
          </div>
          <div class="form-control">
            <label for="username">Email</label>
            <input type="email" name="register-email" id="email" class="input-field" />
            <i class="fa fa-check-circle"></i>
            <i class="fa fa-exclamation-circle"></i>
            <small></small>
          </div>
          <div class="form-control">
            <label for="password">Password</label>
            <input
              type="password"
              name="register-password"
              id="password"
              class="input-field"
            />
            <i class="fa fa-check-circle"></i>
            <i class="fa fa-exclamation-circle"></i>
            <small></small>
          </div>
          <div class="form-control">
            <label for="username">Password check</label>
            <input type="password" name="register-password2" id="password2" class="input-field" />
            <i class="fa fa-check-circle"></i>
            <i class="fa fa-exclamation-circle"></i>
            <small>Error message</small>
          </div>
          <button type="submit" name='register-btn' value="Login">Register</button>
        </form>
        <div class="sign-up">
          <a href="login.php">Have an Account already? Log in!</a>
          <br>
          <a href="index.php">Return to Home!</a>
        </div>
      </div>
      
    <script src="js/registerValidate.js"></script>
      <?php 
        include 'components/footer.php';
      ?>
