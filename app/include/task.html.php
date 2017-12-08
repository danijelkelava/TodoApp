
<!-- DODAVANJE ZADATAKA U LISTU -->
<div>
    <?php
    // FORMA ZA DODAVANJE ZADATAKA U LISTU
    include $_SERVER['DOCUMENT_ROOT'] . "/app/include/taskform.html.php";
     ?>
</div>
<!-- KRAJ -->

<!-- PRIKAZ ZADATAKA U LISTI -->
<table class="table">
	<tr>
		<td><strong>Ime zadatka / Uredi</strong></td>
		<td><strong>Prioritet</strong></td>
		<td><strong>Rok za izvrsavanje</strong></td>
		<td><strong>Preostalo dana</strong></td>
		<td><strong>Status</strong></td>	
		<td></td>
	</tr>

	<?php 
	if (isset($row['taskid'])) {
		
	foreach ($taskList as $list) { ?>
	
	<tr>
		<td>	
			<a href="?edittask&id=<?php echo $list['taskid'];?>"><?php echo htmlspecialchars($list['naziv_taska'], ENT_QUOTES, 'UTF-8') ?></a>
		</td>
		<td>
			<p><?php echo htmlspecialchars($list['prioritet'], ENT_QUOTES, 'UTF-8') ?></p>
		</td>
		<td>
			<p><?php echo htmlspecialchars($list['rok'], ENT_QUOTES, 'UTF-8') ?></p>
		</td>
		<td>
			<p><?php 
					
				if ($list['status'] == 'zavrseno') {

					if ($list['datediff'] < 0) {
						echo htmlspecialchars(abs($list['datediff']), ENT_QUOTES, 'UTF-8') .' dana poslije roka';
					}else{
						echo htmlspecialchars(abs($list['datediff']), ENT_QUOTES, 'UTF-8') .' dana prije roka';
					}

				}else{

					if ($list['datediff'] >= 0) {
					    echo 'Preostalo: ';
					}else{
						echo '<span class="alert-danger">';
						echo 'Kasnjenje: ';
						echo '</span>';
					}
						echo htmlspecialchars(abs($list['datediff']), ENT_QUOTES, 'UTF-8') . ' dana';
					}
					
			?></p>
		</td>
		<td>
			<p><?php echo htmlspecialchars($list['status'], ENT_QUOTES, 'UTF-8') ?></p>
		</td>
		<td>
			<form class="form-inline" action="todo/delete-task.php" method="post">
				<div class="">				   
					<input class="btn btn-default" type="submit" name="finishTask" value="&times;" 
	                    <?php 
	                    if ($list['status'] == 'zavrseno') {
	                    	echo 'disabled';
	                    }
	                    ?>
					>						
					<input class="btn btn-danger" type="submit" name="deleteTask" value="delete">
				</div>
				<input type="hidden" name="todoID" value="<?php echo $list['todoid'];?>">
				<input type="hidden" name="id" value="<?php echo $list['taskid'];?>">	
			</form>
		</td>	
	</tr>
<?php } }?>
</table>
<!-- KRAJ PRIKAZA ZADATAKA -->

<!-- SESSION INFO AKO U LISTI NEMA ZADATAKA -->
<?php 
 if (isset($_SESSION['taskinfo'])) {
 echo '<div class="col-xs-3 alert alert-info" role="alert">';
 echo $_SESSION['taskinfo']; 
 echo '</div>'; 
 unset($_SESSION['taskinfo']);        
 }
?>
