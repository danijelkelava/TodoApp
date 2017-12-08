
<!-- FORMA ZA DODAVANJE LISTI -->
<form class="col-xs-6" action="todo/create.php" method="post">

	<fieldset class="form-group">
	<label for="naziv_liste">NAZIV LISTE:</label>
	<input type="text" class="form-control" id="naziv_liste" name="naziv_liste" placeholder="Naziv liste" value="">
	</fieldset>
    <input class="" type="hidden" name="userID" value="<?php echo $_SESSION['user']['id']; ?>">
	<input class="btn btn-primary" type="submit" name="create" value="Dodaj listu">
	
</form>