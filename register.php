<?php
require 'db_connect.php';
if(!empty($_SESSION["id"])){
  header("location:login.php");
}
if(isset($_POST["submit"])){
  $school_id = $_POST["school_id"];
  $firstname = $_POST["firstname"];
  $lastname = $_POST["lastname"];
  $email = $_POST["email"];
  $duplicate = mysqli_query($conn, "SELECT * FROM student_list WHERE email = '$email'");
  if(mysqli_num_rows($duplicate) > 0){
    echo
    "<script> alert('Email has already taken.'); </script>";
  }
  else{
      $query = "INSERT INTO student_list VALUES('','$school_id','$firstname','$lastname','$email','','','',now())";
      mysqli_query($conn, $query);
      echo
      "<script> alert('Registration successful, please wait for a mail that will be sent to your email address containing your account password. Thank you!'); </script>";
    }
  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Register | Faculty Evaluation System</title>
  </head>
  <body>
    <div class="container" align="center">
    <h2>REGISTRATION FORM</h2><br>
    <form class="" action="" id="registration" method="post" autocomplete="off">
      <label for="school_id">School ID : </label>
      <input type="text" name="school_id" id = "school_id" required value="<?php echo isset($school_id) ? $school_id : '' ?>"><br>
      <label for="firstname">First Name : </label>
      <input type="text" name="firstname" id = "firstname" required value="<?php echo isset($firstname) ? $firstname : '' ?>"> <br>
      <label for="lastname">Last Name : </label>
      <input type="text" name="lastname" id = "lastname" required value="<?php echo isset($lastname) ? $lastname : '' ?>"> <br>
      <label for="email">Email : </label>
      <input type="email" name="email" id = "email" required value="<?php echo isset($email) ? $email : '' ?>"> <br>
      <h5><font color="gray">Please enter a valid email address.</font></h5><br>
      <button type="submit" name="submit"><b>SUBMIT</b></a></button><br>
      <h5> Already have an account? <a href="login.php">Sign in</a>
</div>
    </form>
  </body>
</html>