<!DOCTYPE HTML>
<html>
<head>  
  <title>Registration Form</title>
</head>
<body>
<?php
$flag=1;
$fnameErr = $emailErr = $genderErr = $dateErr = $fname = $email = $date = $gender = "";
$username = $password = "";
$userNameErr = $passwordErr = $confirmpasswordErr = $confirmpassword = "";
$message = '';  
$error = ''; 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["fname"])) {
    $fnameErr = "Name is required";
    $flag=0;
  } else {
    $fname = test_input($_POST["fname"]);
    if (!preg_match("/^[a-zA-Z-.' ]*$/",$fname)) {
      $fnameErr = "Only letters white space, period & dash allowed";
      $fname ="";
      $flag=0;
    }
    else if (str_word_count($fname)<2) {
      $fnameErr = "At least two words needed";
      $fname ="";
      $flag=0;
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
    $flag=0;
  } else {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format Give valid";
      $email ="";
      $flag=0;
    }
  }

  if (empty($_POST["birthday"])) {
    $dateErr = "Date of birth is required";
    $flag=0;
  } else {
    $date = test_input($_POST["birthday"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Select gender";
    $flag=0;
  } else {
    $gender = test_input($_POST["gender"]);
  }

  if (empty($_POST["username"])) {
    $userNameErr = "Give user name or nick name";
    $flag=0;
  } else {
    $username = test_input($_POST["username"]);
    if (!preg_match("/^[a-zA-Z-._]*$/",$username)) {
      $userNameErr = "Only alpha numeric characters, period, dash or underscore allowed";
      $username ="";
      $flag=0;
    }
    else if (strlen($username)<2) {
      $userNameErr = "At least two charecter needed";
      $username ="";
      $flag=0;
    }
  }
   if (empty($_POST["Password"])) {
    $passwordErr = "Password is required";
    $flag=0;
  } else {
    $password = test_input($_POST["Password"]);
    if (strlen($password)<8) {
      $passwordErr = "Password must be 8 charecter";
      $password ="";
      $flag=0;
    }
    else if (!preg_match("/[@,#,$,%]/",$password)) {
      $passwordErr = "Password must contain at least one of the special characters (@, #, $,%)";
      $password ="";
      $flag=0;
    }
  }
  if (empty($_POST["confirmpass"])) {
    $confirmpasswordErr = "Retype The Current Password";
    $flag=0;
  } else {
    $confirmpassword = test_input($_POST["confirmpassword"]);
    if (strcmp($password, $confirmpassword)==1) {
      $confirmpasswordErr = "Password & Retyped Password Dose not Match";
      $confirmpassword ="";
      $flag=0;
    }
  } 
 if ($flag==1) {
 	if(isset($_POST["submit"]))  
    {
 	if(file_exists('Registration.json'))
 		{
 			$current_data = file_get_contents('Registration.json');  
            $array_data = json_decode($current_data, true);  
            $extra = array(  
                 'fname'               =>     $_POST['fname'],
                 'email'          =>     $_POST["email"],
                 'username'          =>     $_POST["username"],
                 'password'          =>     $_POST["confirmpassword"],  
                 'gender'          =>     $_POST["gender"],  
                 'dateOfBirth'     =>     $_POST["birthday"]  
                );  
            $array_data[] = $extra;  
            $final_data = json_encode($array_data);  
            if(file_put_contents('Registration.json', $final_data))  
            {  
                 $message = "<label>Data Recorded Successfully</p>";  
            }  
        }  
        else  
        {  
           $error = 'JSON File not exits';
        }  
    }
 }
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <fieldset>
            <legend>REGISTRATION:</legend>
          <label>NAME:</label>
            <input type="text" name="fname">
            <span class="error">* <?php echo $fnameErr;?></span>
            <br>
            <hr>
           <label>EMAIL:</label> <input type="text" name="email">
            <span class="error">* <?php echo $emailErr;?></span>
            <br>
            <hr>
           <label>User Name:</label><input type="text" name="username">
            <span class="error">* <?php echo $userNameErr;?></span>
            <br>
            <hr>
            <label>Password:</label><input type="Password" name="Password">
            <span class="error">* <?php echo $passwordErr;?></span>
            <br>
            <hr>
            <label>Confirm Password:</label><input type="Password" name="confirmpassword">
            <span class="error">* <?php echo $confirmpasswordErr;?></span>
            <br>
            <hr>
            <fieldset>
                <legend>Gender</legend>
                Gender:
                <input type="radio" name="gender" value="female">Female
                <input type="radio" name="gender" value="male">Male
                <input type="radio" name="gender" value="other">Other
                <span class="error">* <?php echo $genderErr;?></span>
            </fieldset>
            <hr>
            <fieldset>
                <legend>Date Of Birth</legend>
                <input type="date" name="birthday">
                <span class="error">* <?php echo $dateErr;?></span>
                <br>
            </fieldset>
            <hr>
            <input type="submit" name="submit" value="Submit"> <input type="reset" value="Reset">
        </fieldset>
    </form>
    <?php
echo $error;
echo "<br>";
echo $message;
echo "<br>";
?>
</body>

</html>