<?php
function logout(){
	session_destroy();
	header('location:index.php');
}
?>