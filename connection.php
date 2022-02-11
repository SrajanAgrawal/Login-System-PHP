<?php
$server = "localhost";
$username = "root";
$password = "";
$database_name = "final-login";
$conn = mysqli_connect ($server , $username , $password , $database_name);
if($conn ) {
  ?>
  <script>
    alert("connected Successfully ");
  </script>
  <?php
}
else {
  ?>
    <script>
      alert ("No Connection");
    </script>
  <?php
  die("Error". mysqli_connect_error());
}









 ?>
