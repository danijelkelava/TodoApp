    
    <div class="table">
		<span class="lead"><?php echo $todoInfo['naziv_liste']; ?>&nbsp;|</span>
		<span>Datum kreiranja:&nbsp;<?php echo $todoInfo['datum_izrade']; ?>&nbsp;|</span>
		<span>Ukupno zadataka:&nbsp;<?php echo $taskInfo['total']; ?>&nbsp;|</span>
		<span>Nedovrsenih zadataka:&nbsp;<?php echo $taskInfo['nedovrseno']; ?>&nbsp;|</span>
		<span>Dovrseno zadataka:&nbsp;<?php echo round($taskInfo['dovrseno'], 2); ?>&nbsp;%</span>
	</div>

    <form class="bg-success table form-inline" action="todo/create-task.php" method="post">
		<fieldset class="form-group">
		<label for="naziv_taska">IME ZADATKA:</label>
		<input type="text" class="form-control" id="naziv_taska" name="naziv_taska" placeholder="Ime zadatka" value="" required>
		</fieldset>

		<fieldset class="form-group">
		<label for="prioritet">PRIORITET:</label>
		<select id="prioritet" name="prioritet">
			<option value="low">low</option>
			<option value="normal">normal</option>
			<option value="high">high</option>
		</select>
		</fieldset>

		<fieldset class="form-group">
		<label for="rok">ROK:</label>
		<input type="date" class="form-control" id="rok" name="rok" placeholder="MM/DD/YYY" value="" required>
		</fieldset>
	    <input type="hidden" name="todoID" value="<?php echo $row['todoid']; ?>">
		<input class="btn btn-default" type="submit" name="action" value="Dodaj zadatak">	
	</form>

	<form class="form-inline" action="" method="post">

	<fieldset class="form-group">
		<label for="type">Sortiraj po:</label>
		<select name="type" onchange='this.form.submit()'; required>
		    <option value="najnovije">Najnovije</option>
			<option value="najstarije" <?php if (isset($_POST['type']) && $_POST['type'] == 'najstarije') {echo 'selected';}?>>Najstarije</option>
			<option value="po nazivu" <?php if (isset($_POST['type']) && $_POST['type'] == 'po nazivu') {echo 'selected';}?>>Po nazivu</option>
			<option value="zavrseno" <?php if (isset($_POST['type']) && $_POST['type'] == 'zavrseno') {echo 'selected';}?>>Zavrseno</option>
			<option value="nije zavrseno" <?php if (isset($_POST['type']) && $_POST['type'] == 'nije zavrseno') {echo 'selected';}?>>Nije zavrseno</option>
			<option value="low" <?php if (isset($_POST['type']) && $_POST['type'] == 'low') {echo 'selected';}?>>Low</option>
			<option value="normal" <?php if (isset($_POST['type']) && $_POST['type'] == 'normal') {echo 'selected';}?>>Normal</option>
			<option value="high" <?php if (isset($_POST['type']) && $_POST['type'] == 'high') {echo 'selected';}?>>High</option>									
		</select>
	</fieldset>	

	<!--<input class="btn btn-primary btn-xs" type="submit" name="sort" value="Sortiraj">-->

    </form>