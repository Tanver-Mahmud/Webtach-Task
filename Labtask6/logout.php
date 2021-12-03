<?php
session_start();
if (isset($_SESSION['username'])) {
	session_destroy();
	header("location:Public_home.php");
}
else{header("location:Public_home.php");}
 ?>
