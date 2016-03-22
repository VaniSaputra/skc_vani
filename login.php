<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED );

include "lib/config.php"; 

    $user=$_POST['user'];
    $password = $_POST['password'];
    $button=$_POST['button'];

if($button){
    $sql = "select * from admin where user='$user' and password='$password'";
    $query= mysql_query($sql);
    $data = mysql_fetch_array($query);
    if($data !=""){
        //berhasil login
        $_SESSION['user']=$data['user'];

    ?>
        <script language script="JavaScript">
        alert("Anda berhasil Login!");
        document.location ='index.php';
        </script>
    <?php
    }else{
        //gagal login
            ?>
                <script language script="JavaScript">
                alert("Login Gagal!");
                </script>
        <?php

    }
}
?>

<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Login & Register form</title>
        <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>
    <div class="login-wrap">
  <h2>Login</h2>
  
  <div class="form">
    <input type="text" placeholder="Username" name="user" />
    <input type="password" placeholder="Password" name="password" />
    <button name='button'> Sign in</button>
    <a href="#"> <p> Don't have an account? Register </p></a>
  </div>
</div>
    <script src='https://code.jquery.com/jquery-1.10.0.min.js'></script>
    <script src="assets/js/index.js"></script>
  </body>
</html>
