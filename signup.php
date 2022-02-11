<?php
$showAlert = false;
$showError = false;
$exists = false;
if($_SERVER["REQUEST_METHOD"]  == "POST") {
  include 'connection.php';
  $user_name = $_POST["user_name"];
  $user_email = $_POST["user_email"];
  $user_password  = $_POST["user_password"];
  $user_cpassword = $_POST["user_cpassword"];
  $sql = "Select * from finallogin where user_name='$user_name'";

    $result = mysqli_query($conn, $sql);

    $num = mysqli_num_rows($result);
    if($num == 0) {
        if(($user_password == $user_cpassword) ) {
            $sql = " INSERT INTO finallogin ( user_name, user_email, user_password, dt) VALUES ('$user_name','$user_email','$user_password',current_timestamp())";

            $result = mysqli_query($conn, $sql);

            if ($result) {
                $showAlert = true;
            }
        }
        else {
            $showError = true;
        }
    }
  else if ($num >0) {
     $exists = true;
   }
}

?>

<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>SignUp</title>
  </head>
  <?php include  'style.php'; ?>
  <body>
    <?php

    if($showAlert) {
      ?>
      <script>
      alert("Your Account Has Been Created !!");
      </script>
      <?php
    }
    if($showError){
      ?>
      <script>
      alert("Password Are Not Matching !!");
      </script>
      <?php
    }
    if($exists) {
      ?>
      <script>
        alert ("Username already exists") ;
      </script>
      <?php
    }
     ?>
  <div class="form">
      <form action="signup.php" method = "POST">
       <h1>Create Account </h1>  <hr>
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
                      <label class="text"> Your Email</label>

                  </td>
                  <td>

                      <input type="email" name = "user_email" placeholder = "Enter Your Email " required><br>
                  </td>
              </tr>
              <tr>
                  <td>
                      <label class="text">Set Password</label>

                  </td>
                  <td>
                      <input type="password" name = "user_password" placeholder = "password" required><br>

                  </td>
              </tr>
              <tr>
                  <td>
                      <label class="text">Re-Type Your Password</label>

                  </td>
                  <td>
                      <input type="password" name = "user_cpassword" placeholder = "Confirm Password" required ><br> <br>

                  </td>
              </tr>
              <tr>
                  <td colspan = "2">
                      <button name = "submit"> Submit </button>
                  </td>
              </tr>
          </tbody>
          <tfoot>
              <tr>
                  <th colspan = "2" >
                      <p>Already Resistered? <br> <br> <a href="login.php">Login Here</a> </p>
                  </th>
              </tr>
          </tfoot>
      </table>
      </form>
  </div>

  </body>
</html>
