
<?php
 $count=false;//To check weather data is present in students information table
 if($_SERVER['REQUEST_METHOD']=='POST')
 {
   require("db_connect.php");
   $email=$_POST['user_name'];
   $pass=$_POST['password'];

   $sql= "SELECT * FROM `students_information` WHERE `Reg_no`='$email' AND `password`='$pass'";
   $res=mysqli_query($connect,$sql);
   if(mysqli_num_rows($res)>=1)
   {
    $count=true;//if data is present
    session_start();
    $_SESSION['User_name']=$email;
    $_SESSION['Password']=$pass;
    header("location://localhost/Project007/chat-bot_system/chat_bot.php");//redirecting page to Chatting UI
   }
   else
   {
    echo"<div class='alert alert-warning alert-dismissible fade show' role='alert'>
    <strong>Failed to Login!</strong>  --------Please Contact your College Database--------
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";
   }
}
   
   ?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Simple Login Form Example</title>
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Rubik:400,700'>
  <link rel="stylesheet" href='//localhost/Project007/chat-bot_system/login.css'>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<style>
  body
  {
    background-color:#3f4b72;
  }

.action
{
    background-color: black;
    color: white;
}
</style>
</head>
<body>

<!-- Login credentials  -->
<div class="login-form">
  <form action="//localhost/Project007/chat-bot_system/login.php" method="post">
    <h1>Login</h1>
    <div class="content">
      <div class="input-field">
        <input type="text" placeholder="Register No" name="user_name" autocomplete="nope">
      </div>
      <div class="input-field">
        <input type="password" placeholder="Password" name="password">
      </div>
    </div>
    <div class="action" id="sign_in">
      <button onclick="fun()">Sign in</button>
    </div>
  </form>
</div>
<!-- partial -->
<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"> </script>
<script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"> </script>
</body>

  <!-- <script  src="//localhost/Project007/test.js"></script> -->

</html>
