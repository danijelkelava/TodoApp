<?php 

class Todo {

	private $db;
	private $table_name = "todo";

	private $_naziv_liste;

	public function __construct($db){
		$this->db = $db;
	}

	public function setNazivTodoListe($naziv_liste){
		$this->naziv_liste = $naziv_liste;
	}

	public function createTodoList($userID){
		
		try {
			$q = "INSERT INTO " . $this->table_name . " SET naziv_liste=:naziv_liste, datum_izrade=now(), IDkorisnika='$userID'";
		    $result = $this->db->prepare($q);
		    $this->naziv_liste = htmlspecialchars(strip_tags($this->naziv_liste), ENT_QUOTES, 'UTF-8');
		    $result->bindValue(':naziv_liste', $this->naziv_liste);
		    $result->execute();
		} catch (PDOException $e) {
			$_SESSION['error'] = "Database connection error: " . $e->getMessage();
            return;
		}

		$id = $this->db->lastInsertId();

		header("Location:http://" . $_SERVER['HTTP_HOST'] . "/app/index.php?action=read&id=" . $id );
		
	}

	public function readTodo($select, $from, $order, $id){

		try {
			$q = $select . " " . $from . " " . $this->table_name . " WHERE IDkorisnika='$id' " . $order;
		    $result = $this->db->query($q);
		
		} catch (PDOException $e) {
			$_SESSION['error'] = "Database connection error: " . $e->getMessage();
            return;
		}

		foreach ($result as $row) {
			$liste[] = array('id'=>$row['id'], 'ime'=>$row['naziv_liste'], 'datum_izrade'=>$row['datum_izrade']);
		}

		if (isset($liste)) {
			include $_SERVER['DOCUMENT_ROOT'] . "/app/include/todo.html.php";
			return $liste;
		}else{
			echo 'Korisnik nije stvorio nijednu listu.';
		}
	}

	public function deleteTodoList($id){
		try {
			$q = "DELETE FROM " . $this->table_name . " WHERE id='$id'";
		    $result = $this->db->query($q);
		} catch (PDOException $e) {
			$_SESSION['error'] = "Database connection error: " . $e->getMessage();
            return;
		}
		
		header("Location:http://" . $_SERVER['HTTP_HOST'] . "/app/index.php");

	}
}

?>