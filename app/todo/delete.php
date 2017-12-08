<?php 
session_start();
include $_SERVER['DOCUMENT_ROOT'] . "/app/config/class.database.php";
include $_SERVER['DOCUMENT_ROOT'] . "/app/objects/class.todo.php";

if (!isset($userID)) {
	header("Location: http://" . $_SERVER['HTTP_HOST'] . "/app/register.php");
}

$database = new Database();
$db = $database->getConnection();

$todo = new Todo($db);

$userID = $_SESSION['userID'];


// BRISANJE LISTI
if (isset($_GET['action']) && $_GET['action'] == 'delete') {
   $todo->deleteTodoList($_GET['id']);
} 

?>