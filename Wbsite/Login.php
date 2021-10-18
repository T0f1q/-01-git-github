<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login here</title>
    <link rel="stylesheet" href="cssLogin.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400;700&display=swap" rel="stylesheet">
</head>
<body>
   <div class="overlay"></div>
   <form action="" method="post" class="box">
       <div class="header">
           <h4>Login To Your Account</h4>
           <p>Situs Penambang uang dengan mudah cepat dan aman</p>
       </div>
       <div class="login-area">
           <input type="email" class="username" placeholder="Email" name="email">
           <input type="password" class="password" placeholder="Password" name="password">
           <input type="submit" value="Login" class="submit" name="login">
           <p>You Don't have an account <a href="#">Register Here</a></p>
           <a id="forgotPass" href="#">Forgot Password?</a>
           <?php
              include"resourch.php";
              session_start();
              error_reporting(E_ALL ^ E_WARNING || E_NOTICE);
              $Email = $_POST['email'];
              $Pass = $_POST['password'];
              if (isset($_POST['login'])) {
                $sql = "SELECT * FROM `database-user` WHERE Email = '$Email' AND Password = '$Pass';";
                $query = mysqli_query($conn, $sql);
                $row = mysqli_num_rows($query);

                if ($row == 1) {
                  $_SESSION['email'] = $Email;
                  header("location:index.php");
                }else{
                  header("location:login.php");
                }
              }
            ?>
       </div>
   </form>
</body>
</html>