<?php 
//prije prekida sessiona moramo startati session
session_start();
session_destroy();

header("Location: http://" . $_SERVER['HTTP_HOST'] . "/app/login.php");

?>