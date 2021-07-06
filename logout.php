<?php
session_start();
if(isset($_SESSION["member"])){
	unset($_SESSION["member"]);
	header("location: login.php");
}
?>