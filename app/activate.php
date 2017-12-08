<?php 

include $_SERVER['DOCUMENT_ROOT'] . "/app/include/header.php";

if (isset($_SESSION['user'])) {
  header("Location: http://" . $_SERVER['HTTP_HOST'] . "/app/index.php");
}

if (isset($_GET['active']) || isset($_POST['submit'])) {
  $tk = isset($_POST['submit']) ? $_POST['active'] : $_GET['active'];
  $id = isset($_POST['submit']) ? $_POST['id'] : $_GET['id'];

  $user->activate($id, $tk);
  }
?>

    <div class="container-fluid">
      <div class="row">

        <div class="col-sm-6 col-sm-offset-3">
        <h2>Aktiviraj se</h2>
          <form method="post">
            <fieldset class="form-group">
              <label for="active">Kod za aktivaciju</label>
              <input type="text" class="form-control" id="active" name="active" placeholder="Unesi kod za aktivaciju">
            </fieldset>
            <input type="hidden" name="id" value="<?php echo $_SESSION['id']; ?>" >
            <input class="btn btn-primary" type="submit" name="submit" value="Aktiviraj se" >
          </form>
        </div> 

        

      </div>

       <div class="alert alert-info col-sm-6 col-sm-offset-3">
        <p>Poslali smo vam link za aktivaciju racuna na vasu email adresu ili unesite kod u polje za aktivaciju.</p>
        </div> 

    </div>

    

<?php 
include $_SERVER['DOCUMENT_ROOT'] . "/app/include/footer.php";
?>
