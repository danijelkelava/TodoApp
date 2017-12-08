<?php 
session_start();

$current_url = $_SERVER['SERVER_NAME'].''.$_SERVER['REQUEST_URI'];

include $_SERVER['DOCUMENT_ROOT'] . "/app/config/class.database.php";
include $_SERVER['DOCUMENT_ROOT'] . "/app/objects/class.input.php";
include $_SERVER['DOCUMENT_ROOT'] . "/app/objects/class.validate.php";
include $_SERVER['DOCUMENT_ROOT'] . "/app/objects/class.user.php";
include $_SERVER['DOCUMENT_ROOT'] . "/app/objects/class.todo.php";
include $_SERVER['DOCUMENT_ROOT'] . "/app/objects/class.task.php";

$database = new Database();
$db = $database->getConnection();

$user = new User($db);
$todo = new Todo($db);
$task = new Task($db);


if (isset($_GET['addlist'])) {
   $pageTitle = 'Add List';
}else{
  $pageTitle = 'Task List';
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php echo $pageTitle; ?></title>

    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!--<script src="app.js"></script> -->  

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
 <body>

 <?php 
 if (strpos($current_url, 'activate.php') === false) {
   include $_SERVER['DOCUMENT_ROOT'] . "/app/include/nav.php";
 }

?>