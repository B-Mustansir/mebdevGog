<?php
session_start();
if(isset($_SESSION['username'])){
	
	session_destroy();

	echo "<script> location.href='http://localhost/techie/gatesofgotham/slide-sign-in-sign-up-form/dist/login.html' </script> ";
}
else{
	
	echo "<script> location.href='http://localhost/techie/gatesofgotham/slide-sign-in-sign-up-form/dist/login.html' </script> ";
}

?>