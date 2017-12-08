<?php 
session_start();
include $_SERVER['DOCUMENT_ROOT'] . "/app/config/class.database.php";
include $_SERVER['DOCUMENT_ROOT'] . "/app/objects/class.task.php";

if (!isset($userID)) {
	header("Location: http://" . $_SERVER['HTTP_HOST'] . "/app/register.php");
}

$database = new Database();
$db = $database->getConnection();

$task = new Task($db);

$userID = $_SESSION['userID'];

if (isset($_POST['deleteTask'])) {
   $task->deleteTask($_POST['id'], $_POST['todoID']);
} 

// ZAVRSAVANJE ZADATKA
            if (isset($_POST['finishTask'])) {
              $task->finishTask($_POST['id'], $_POST['todoID']);
            } 

?>