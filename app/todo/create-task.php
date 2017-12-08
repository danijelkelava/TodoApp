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

if (isset($_POST['action']) && $_POST['action'] =='Dodaj zadatak') {
    $task->setNazivTaska($_POST['naziv_taska']);
    $task->setPrioritet($_POST['prioritet']);
    $task->setRok($_POST['rok']);
    $task->createTask($_POST['todoID']);
}

?>