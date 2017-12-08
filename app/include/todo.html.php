
<!-- PRIKAZ TODO LISTI U DASHBOARDU -->
<table class="table">
	<tr>
		<td><strong>Ime liste</strong></td>
		<td><strong>Datum kreiranja</strong></td>
		<td><strong></strong></td>
	</tr>
	<?php foreach ($liste as $list) { ?>
	<tr>
	<td>
		<a href="index.php?action=read&id=<?php echo $list['id'];?>"><?php echo htmlspecialchars($list['ime'], ENT_QUOTES, 'UTF-8') ?></a>
	</td>
	<td>
		<p><?php echo htmlspecialchars($list['datum_izrade'], ENT_QUOTES, 'UTF-8') ?></p>
	</td>
	<td>
		<form class="" action="todo/delete.php" method="get">

			<div class="form-group">
				<input class="btn btn-danger" type="submit" name="action" value="delete">
			</div>

			<input type="hidden" name="id" value="<?php echo $list['id'];?>">	

		</form>
	</td>	
	</tr>
<?php } ?>
</table>
<!-- KRAJ PRIKAZA LISTI -->

<!-- SESSION INFO AKO NEMA LISTI U DASHBOARDU -->
<?php 
 if (isset($_SESSION['listinfo'])) {
 echo '<div class="col-xs-3 alert alert-info" role="alert">';
 echo $_SESSION['listinfo']; 
 echo '</div>'; 
 unset($_SESSION['listinfo']);        
 }
?>