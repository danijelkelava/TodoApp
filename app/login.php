<?php 

include $_SERVER['DOCUMENT_ROOT'] . "/app/include/header.php";

if (isset($_SESSION['user'])) {
  header("Location: http://" . $_SERVER['HTTP_HOST'] . "/app/index.php");
}

if (Input::exists()) {  
$validate = new Validate();
$validation = $validate->check($_POST, array(
    'email' => array(
      'required'=>true,
      'email'=>'true'
      ),
    'lozinka' => array(
      'required'=>true,
      'min'=>6
      )
  ));

  if ($validation->passed()) {
    if (isset($_POST['submit']) && $_POST['submit'] == 'Logiraj se') {
      $user->setEmail($_POST['email']);
      $user->setLozinka($_POST['lozinka']);
      $user->login();
    }
  }else{
    $validationErrors = $validation->errors();
  }
}

?>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
        <h2>Login</h2>
        <?php 
          if (isset($_SESSION['error'])) {
           echo '<div class="alert alert-danger" role="alert">';
           echo $_SESSION['error']; 
           echo '</div>'; 
           unset($_SESSION['error']);        
          }
        ?>
          <form method="post">
            <fieldset class="form-group">
              <label for="email">Email</label>
              <input type="text" class="form-control" id="email" name="email" placeholder="Enter email" value="">
              <p class="text-danger"><?php if(isset($validationErrors['email'])){ echo $validationErrors['email']; } ?></p>
            </fieldset>
            <fieldset class="form-group">
              <label for="lozinka">Password</label>
              <input type="password" class="form-control" id="lozinka" name="lozinka" placeholder="Enter password">
              <p class="text-danger"><?php if(isset($validationErrors['lozinka'])){ echo $validationErrors['lozinka']; } ?></p>
            </fieldset>
            <input class="btn btn-primary" type="submit" name="submit" value="Logiraj se" >
          </form>
        </div>
      </div>
    </div>

<?php 
include $_SERVER['DOCUMENT_ROOT'] . "/app/include/footer.php";
?>
