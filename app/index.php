<?php 

include $_SERVER['DOCUMENT_ROOT'] . "/app/include/header.php";
if (!isset($_SESSION['user'])) {
	header("Location: http://" . $_SERVER['HTTP_HOST'] . "/app/register.php");
}

?>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
          <?php 
            
            // UREDJIVANJE ZADATKA
            if (isset($_GET['edittask'])) {
              $row = $task->editTask($_GET['id']);
              $enum = $task->getEnumValues();
              $userLists = $task->getTodoNames($_SESSION['user']['id']);
              include $_SERVER['DOCUMENT_ROOT'] . "/app/include/updatetask.form.html.php";
              exit();
            }

            // UCITAVANJE LISTE ZADATAKA I SORTIRANJE

            $where = "";
            $order = " ORDER BY rok ASC";

            if (isset($_GET['action']) && $_GET['action'] == 'read') {
              
              if (isset($_POST['type']) && $_POST['type'] == 'najstarije') {
                $order = " ORDER BY rok DESC";
              }
              if (isset($_POST['type']) && $_POST['type'] == 'po nazivu') {
                $order = " ORDER BY naziv_taska ASC";
              }
              if (isset($_POST['type']) && $_POST['type'] == 'zavrseno') {
                $where = " AND status='zavrseno' ";
              }
              if (isset($_POST['type']) && $_POST['type'] == 'nije zavrseno') {
                $where = " AND status='nije zavrseno' ";
              }
              if (isset($_POST['type']) && $_POST['type'] == 'low') {
                $where = " AND prioritet='low' ";
              }
              if (isset($_POST['type']) && $_POST['type'] == 'normal') {
                $where = " AND prioritet='normal' ";
              }
              if (isset($_POST['type']) && $_POST['type'] == 'high') {
                $where = " AND prioritet='high' ";
              }

              $task->readTask($where, $order, $_GET['id']);
            }

          ?>
        </div>      
      </div>
      <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
          <h1>Dashboard</h1>
            <table class="table">
              <tr class="">
                <td class="lead"><?php echo $_SESSION['user']['ime'] . " " . $_SESSION['user']['prezime']; ?></td>
                <td class="lead">Datum zadnjeg logina: <?php echo $_SESSION['user']['zadnji_login']; ?></td>
                <td><a class="btn btn-primary" href="?addlist">DODAJ LISTU</a></td>
              </tr>
            </table>          
        </div>
      </div>

      <div class="row">
       <div class="col-sm-10 col-sm-offset-1">        

          <?php
            // DODAVANJE FORME ZA STVARANJE LISTI
            if (isset($_GET['addlist'])) {
               //$userID = $_SESSION['user']['id'];
               //$_SESSION['userID'] = $userID;
               include $_SERVER['DOCUMENT_ROOT'] . "/app/include/todoform.html.php";
               exit();
            } 
          ?>

       </div>
      </div>
    </div>
    <div class="col-sm-10 col-sm-offset-1">
    <div>
          <?php 
            // FORMA ZA SORTIRANJE LISTI
            include $_SERVER['DOCUMENT_ROOT'] . "/app/include/todosort.html.php";

          ?>
    </div>
      
          <?php
            // SORTIRANJE LISTI
               $select = 'SELECT * ';
               $from = 'FROM ';
               $order = 'ORDER BY datum_izrade DESC';

            if (isset($_POST['type']) && $_POST['type'] == 'najstarije') {
               $order = 'ORDER BY datum_izrade ASC';         
            } elseif (isset($_POST['type']) && $_POST['type'] == 'po nazivu'){
               $order = 'ORDER BY naziv_liste ASC';
            }

               $liste = $todo->readTodo($select, $from, $order, $_SESSION['user']['id']);          
            
          ?>
            
    </div>
<?php 

include $_SERVER['DOCUMENT_ROOT'] . "/app/include/footer.php";

?>
