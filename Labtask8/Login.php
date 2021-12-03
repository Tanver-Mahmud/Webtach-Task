<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  
</head>
<style >
    .error
    {
      color: red;
    }
  </style>
<body>

<?php
session_start();
if(isset($_SESSION['FlashMessage']))
{
  echo  $_SESSION['FlashMessage']="User Name or Password is Incorrect";
  session_destroy();
}

    $id = $pass = $cpass ="";
    $erid = $erpass = $ercpass ="";

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
      //User Name
      if(empty($_POST["id"]))
      {
        $erid = "Username is requied";
      }
      else
      {
        $id = test_input($_POST["id"]); $_SESSION['id']=$id;
        if(!preg_match("/^[a-zA-Z0-9-. ?!]{2,}$/",($_POST["id"])))
        {
          $erid = "At least two characters";
        }
      }
      //Password
      if(empty($_POST["pass"]))
      {
        $erpass = "Password can't be empty!";
      }
      else
      {
        $pass = test_input($_POST["pass"]); $_SESSION['pass']=$pass;

        if(empty($_POST["pass"]))
        {
          $erpass = "Password can't be empty!";
        }
        else if(empty($_POST["cpass"]))
        {
          $ercpass = "Password can't be empty!";
        }

        else if (strlen($_POST["pass"]) <= 7) 
        {
          $erpass = "Your Password Must Contain At Least 8 Characters!";
        }
        else if(!preg_match("#[a-zA-Z0-9-. ?!]+#",($_POST["pass"]))) 
        {
          $erpass = "Your Password Must Contain At Least one Number or Character!";
        }
        /*else if(!preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $pass))*/
        else if(!preg_match('/[$%@#]/', ($_POST["pass"])))
        {
          $erpass = "Your Password Must Contain At Least one special character(@,#,$,%)!";
        }
        else if(($_POST["pass"]) != ($_POST["cpass"]))
        {
          $ercpass = "Password and Confirm password must be same!";
        }
      }
    }

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }  
?>
<?php include('../Controller/LHeader.php');?>
<form method="post" action="../Controller/LoginController.php">

<fieldset>
    <legend><b>LOGIN</b></legend>
    <form action="Dashboard.php" method="POST">
        <table>
            <tr>
                <td>User Name</td>
        <td>:</td>
                <td><input type="text" name="id" value="<?php if(isset($_COOKIE['username'])) {echo $_COOKIE['username'];} ?>" ><span class="error">  <?php echo $erid;?> </span><br></td>
            </tr>
            <tr>
                <td>Password</td>
        <td>:</td>
                <td><input type="password" name="pass" value="<?php if(isset($_COOKIE['password'])) {echo $_COOKIE['password'];} ?>" ><span class="error">  <?php echo $erpass;?> </span><br>
            </tr>
        </table>
        <hr/>
    <input id="remember" type="checkbox" name="remember" <?php if(isset($_COOKIE['username'])) {echo "checked";} ?>> <label for="remember">Remember Me</label>
    <br/><br>
        <input type="submit" name="submit" value="Login" style="width: 60px">
    
        <a href="../View/Forget_Password.php">Forgot password?</a>
    </form>
</fieldset>
</form>

<?php include('../Controller/Footer.php');?>
</body>
</html>