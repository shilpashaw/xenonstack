<?php
require 'config.php';
if(!empty($_SESSION["id"])){
  header("Location: index.php");
}
if(isset($_POST["submit"])){
  $name = $_POST["name"];
  $username = $_POST["username"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $confirmpassword = $_POST["confirmpassword"];
  $duplicate = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username' OR email = '$email'");
  if(mysqli_num_rows($duplicate) > 0){
    echo
    "<script> alert('Username or Email Has Already Taken'); </script>";
  }
  else{
    if($password == $confirmpassword){
      $query = "INSERT INTO tb_user VALUES('','$name','$username','$email','$password')";
      mysqli_query($conn, $query);
      echo
      "<script> alert('Registration Successful'); </script>";
    }
    else{
      echo
      "<script> alert('Password Does Not Match'); </script>";
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.tutorialjinni.com/intl-tel-input/17.0.8/css/intlTelInput.css"/>
    <script src="https://cdn.tutorialjinni.com/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
 
</head>
<body>
    <div class="container">
        <form id="contact" action="" method="post">
            <h1>Registration Form</h1>
            <h3>Fill the form below and press the submit button!</h3>
            <div class="row">
                <!-- first column -->
                <div class="column">                        
                    <fieldset>
                        <input type="text" placeholder="Full Name *" name="name" required autofocus>
                    </fieldset>
                    <fieldset>
                        <input type="text" placeholder="Father name *" name="fname" required autofocus>
                    </fieldset>
                    <fieldset>
                        <input type="email" placeholder="Your email *" name="email" required autofocus>
                    </fieldset>
                    <fieldset>
                        <input type="text" placeholder="Date of birth *" name="date" onfocus="(this.type = 'date')" required autofocus>
                    </fieldset>
                    <!-- adding all country code list -->
                    <fieldset>
                        <input type="text" placeholder="Phone number *" name="phone" id="phone" required autofocus>
                    </fieldset>
                </div>
                </div>
            </div>
            <!-- submit button -->
            <fieldset>
                <button type="submit" id="button">Submit Now</button>
            </fieldset>
        </form>
    </div>
 
 
    <!-- Javascript to initialize the code list -->
    <script>
    var input = document.querySelector("#phone");
    window.intlTelInput(input, {
     separateDialCode: true
     });
  </script>
</body>
</html>