<!DOCTYPE html>
<html>
<head>
  <title>Registration</title>
  </head>
<body>


<form>
  <fieldset>
  <legend><b>REGISTRATION</b></legend>

  <label for="name" >Name<span class="error">* </label>
  <input type="text" name="name">
  <hr>

  <label for="email" >Email</label>
  <input type="text" name="email"><br>
  <hr>

  <label for="id" >User Name</label>
  <input type="text" name="id"><br>
  <hr>

  <label for="pass" >Password</label>
  <input type="password" name="pass">
  <hr>

  <label for="cpass" >Confirm Password<span class="error">* </label>
  <input type="password" name="cpass"><br>
  <hr>

  <fieldset style="width: 700px; ">
  <legend><b>GENDER</b></legend>
  <input  type="radio" name="gender">Male

  <input type="radio" name="gender">Female  

  <input type="radio" name="gender">Other 
  <br>  
  
  </fieldset>

  <fieldset style="width: 700px; ">
  <legend>Date of Birth</legend>
  <table>

  <tr>
    <td><input type="text" name="dd"></td>
    <td>/</td>
    <td><input type="text" name="mm"></td>
    <td>/</td>
    <td><input type="text" name="yyyy"></td>

    <label for="dd" >dd/</label></th>
   <label for="mm" >mm/</label></th>
    <label for="yyyy">yyyy</label></th>

    </td>
  </tr>

  </table>
  </fieldset>
  <hr>

  <center><input type="submit" name="submit" value="Submit" style="width: 60px">
  <input type="reset" name="reset" value="Reset">
  <br></br>
  <center>Already Register? <a href="Login.php">Login</a></center>

  </form>
</fieldset>
</form>
</body>
</html>