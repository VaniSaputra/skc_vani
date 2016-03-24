<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED );

// koneksi
$koneksi=mysql_connect('localhost','root',''); 
$db = mysql_select_db("skc_solocup"); 

//mengamil data dari input
    $user=$_POST['user'];
    $password = $_POST['password'];
    $submit=$_POST['submit'];

//mengechek database untuk login
if($submit){
        $sql = "select * from admin where user='$user' and password='$password'";
        $query= mysql_query($sql);
        $result = mysql_fetch_array($query);
        if($result !=""){
            //berhasil login
            $_SESSION['user']=$result['user'];
            $_SESSION['status']=$result['status'];
            //login sebagai admin
            if ( $_SESSION['user']=="admin"){
                ?>
                    <script language script="JavaScript">
                        alert("Anda Login sebagai <?php echo $_SESSION['status'];?>");
                        document.location ='index.php';
                    </script>
                <?php

            //login sebagai user
            }elseif($_SESSION['user']=="drower"){
                    ?>
                    <script language script="JavaScript">
                        alert("Anda Login sebagai <?php echo $_SESSION['status'];?>");
                        document.location ='index.php';
                    </script>
                <?php
            }elseif($_SESSION['user']=="user"){
                    ?>
                    <script language script="JavaScript">
                        alert("Anda Login sebagai <?php echo $_SESSION['status'];?>");
                        document.location ='index.php';
                    </script>
                <?php
            }
         }else {
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
  <h2>Login to service</h2>
  
  <!-- form login -->
  <div class="form">
  <form name='myform' method="post" action="login.php" enctype="multipart/form-data">
    <input type="text" placeholder="Username" name="user" />
    <input type="password" placeholder="Password" name="password" />
    <input type="submit" name="submit" value="Sign in" />
    <a href="#"> <p> Don't have an account? Register </p></a>
    </form>
    </div>
  
</div>
    <script src='https://code.jquery.com/jquery-1.10.0.min.js'></script>
    <script src="assets/js/index.js"></script>
  </body>
</html>
