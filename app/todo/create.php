<?php 
//session_start();
include $_SERVER['DOCUMENT_ROOT'] . "/app/config/class.database.php";
include $_SERVER['DOCUMENT_ROOT'] . "/app/objects/class.todo.php";

if (!isset($userID)) {
	header("Location: http://" . $_SERVER['HTTP_HOST'] . "/app/register.php");
}

$database = new Database();
$db = $database->getConnection();

$todo = new Todo($db);

//$userID = $_SESSION['userID'];

if (isset($_POST['create'])) {
    $todo->setNazivTodoListe($_POST['naziv_liste']);
    $todo->createTodoList($_POST['userID']);
}

$select = 'SELECT * ';
$from = 'FROM ';
$order = 'ORDER BY datum_izrade DESC';

$result = $todo->readTodo($select, $from, $order, 75);
print_r($result);
?>