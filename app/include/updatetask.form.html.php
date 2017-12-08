
<a class="" href="?action=read&id=<?php echo $row['todoID'];?>">POVRATAK NA LISTU</a>
    <form class="bg-success table form-inline" action="todo/update-task.php" method="post">
		<fieldset class="form-group">
		<label for="naziv_taska">IME ZADATKA:</label>
		<input type="text" class="form-control" id="naziv_taska" name="naziv_taska" placeholder="Ime zadatka" value="<?php echo $row['naziv_taska'];?>">
		</fieldset>

		<fieldset class="form-group">
		<label for="prioritet">PRIORITET:</label>		
		<select id="prioritet" name="prioritet">

		<?php foreach ($enum as $value) { ?>
		
			<option value="<?php echo $value; ?>" <?php if ($row['prioritet'] == $value) {
				echo 'selected';
			} ?>><?php echo $value; ?></option>

		<?php } ?>
	
		</select>
		</fieldset>

		<fieldset class="form-group">
		<label for="todo">LISTA:</label>		
		<select id="todo" name="todo">

		<?php foreach ($userLists as $value) { ?>
		
			<option value="<?php echo $value['id']; ?>" <?php if ($row['todoID'] == $value['id']) {
				echo 'selected';
			} ?>><?php echo $value['naziv_liste']; ?></option>

		<?php } ?>
	
		</select>
		</fieldset>

		<fieldset class="form-group">
		<label for="rok">ROK:</label>
		<input type="date" class="form-control" id="rok" name="rok" placeholder="MM/DD/YYY" value="<?php echo $row['rok'];?>">
		</fieldset>
	    <input type="hidden" name="todoID" value="<?php echo $row['todoID']; ?>">
	    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
		<input class="btn btn-default" type="submit" name="updateTask" value="Uredi zadatak">	
	</form>