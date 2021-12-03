<!DOCTYPE HTML>  
<html>
  <head >
  <title>login</title>
    </head >
    <body> 
		    <p> <h1 > Login  </h1> </p>
		       <h3 align= "right">
			      <hr>
		      <a href="Public_home.php">  Home  </a> 
		       <a href="login.php">  Login </a>  
		       <a href="registration.php">  Registration </a>
		   </h3>  	
    <?php   

    $errCount = 0;    
    if (isset($_POST['rembr'])) {
$time = time();
setcookie('username', $username, $time + 300);
setcookie('password', $password, $time + 300);
}



if (isset($_POST['rembr'])) {
setcookie('username', $username, $time + 60);
setcookie('password', $password, $time + 60);
}
if ($errCount < 1){ $strJsonFileContents = file_get_contents("labtask6.sql"); $arra = json_decode($strJsonFileContents);}
 
    ?>        
		  <fieldset>
		  <legend>Login</legend>
          <form action="controller/login.php" method="POST" enctype="multipart/form-data"> 
		  
		  
		       <b> <label for="username"> Username : </label> </b>
			   <input type="text" name="username" >			  
               <br><br>
			  
			    <b> <label for="password"> Password : </label> </b>
                <input type="password" name="password" >              
                <br><br>
				
                <hr>
                <input type="checkbox" name="rembr"> Remember Me <br><br>
                <input type="submit" name="submit" value="Submit"> 				
               			
							
         </form> <br><br>
				
            </fieldset>            		
         </form> 
	 
    </body>
</html>