<?php 

class Student {
	private $surname;
	private $description;
	private $adj1;
	private $adj2;
	private $adj3;

	public function __construct($surname, $description, $adj1, $adj2, $adj3) {
		$this->surname = $surname;
		$this->description = $description;
		$this->adj1 = $adj1;
		$this->adj2 = $adj2;
		$this->adj3 = $adj3;
	}

	public function getSurname() {
		return $this->surname;
	}

	public function getDescription() {
		return $this->surname;
	}

	public function getAdjectives() {
		return array($this->adj1, $this->adj2, $this->adj3);
	}

	public function to_array(){
		$return = array(
			'surname' => $this->surname,
			'description' => $this->description,
			'adj1' => $this->adj1,
			'adj2' => $this->adj2,
			'adj3' => $this->adj3
		);
		return $return;
	}
}

?>
