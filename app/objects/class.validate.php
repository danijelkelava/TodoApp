<?php 

class Validate {

	private $_passed = false,
	        $_errors = array();

	public function __construct(){
		
	}

	public function check($source, $items = array()){

		foreach ($items as $item => $rules) {
			foreach ($rules as $rule => $rule_value) {
				$value = trim($source[$item]);

		        if ($rule === 'required' && empty($value)) {
		        	
		        	if ($item == 'lozinka') {
		        		$this->addError($item, "{$item} je obavezna");
		        	}elseif($item == 'email'){
		        		$this->addError($item, "{$item} je obavezan");
		        	}
		        	else{
		        		$this->addError($item, "{$item} je obavezno");
		        	}
		        	
		        }elseif(!empty($value)){

		        	switch ($rule) {

		        		case 'min':
		        			if (strlen($value) < $rule_value) {
		        				$this->addError($item, "{$item} treba sadrzavati minimalno {$rule_value} znakova");
		        			}
		        			break;
		        		case 'max':
		        		    if (strlen($value) > $rule_value) {
		        				$this->addError($item, "{$item} moze sadrzavati maksimalno {$rule_value} znakova");
		        			}
		        		break;
		        		case 'text':
		        		    if (!preg_match("/^[a-zA-Z ]*$/", $value)) {
		        			$this->addError($item, "{$item} smije sadrzavati samo slova");
		        		    }
		        		break;
		        		case 'email':
		        		   if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$value)) {
						   $this->addError($item, "unesite valjan {$item}");
						   }
		        		default:		        			
		        			break;
		        	}

		        }
			}
		}

		if (empty($this->_errors)) {
			$this->_passed = true;
		}

		return $this;
	}

	private function addError($item, $error){
		$this->_errors[$item] = $error;
	}

	public function passed(){
		return $this->_passed;
	}

	public function errors(){
		return $this->_errors;
	}
	
}

?>