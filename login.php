<?php

$login = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"]  == "POST") {
  include 'connection.php';
  $user_name = $_POST["user_name"];
  $user_password  = $_POST["user_password"];
  $sql = " Select * from finallogin where user_name='$user_name' AND user_password='$user_password'";

    $result = mysqli_query($conn, $sql);

    $num = mysqli_num_rows($result);
    if($num == 1) {
        $login = true;
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['user_name'] = $user_name;
        header("location:welcome.php");
    }

  else if ($num == 0) {
     $showError = true;
 }
}   ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>SignUp</title>
  </head>
  <?php include  'style.php'; ?>
  <body>
    <?php

    if($login) {
      ?>
      <script>
      alert("You are Successfully logged in!!");
      </script>
      <?php

    }
    if($showError){
      ?>
      <script>
      alert("Invalid Creditentials");
      </script>
      <?php
    }
     ?>

  <div class="form">
      <form action="login.php" method = "POST">
       <h1> Login</h1>  <hr>
      <table cellspacing = "10px">
          <tbody>
              <tr>
                  <td>
                      <label class="text"> Your Name </label>
                  </td>
                  <td>
                      <input type="text" name = "user_name" placeholder = "Enter Your Name" autocomplete = "name"  required> <br>
                  </td>
              </tr>
              <tr>
                  <td>
                      <label class="text">Password</label>

                  </td>
                  <td>
                      <input type="password" name = "user_password" placeholder = "password" required><br>

                  </td>
              </tr>
              <tr>
                  <td colspan = "2">
                      <button name = "submit"> Login </button>
                  </td>
              </tr>
          </tbody>
          <tfoot>
              <tr>
                  <th colspan = "2" >
                      <p>Don't Have An Account? <br> <br> <a href="signup.php"> Sign Up Now</a> </p>
                  </th>
              </tr>
          </tfoot>
      </table>
      </form>
  </div>

  </body>
</html>
