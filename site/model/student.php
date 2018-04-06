<?php 

class Student {
	private $surname;
	private $description;
	private $adj1;
	private $adj2;
	private $adj3;
	private $year;
	private $email;
	private $pic;
	

	public function __construct($surname, $description, $adj1, $adj2, $adj3, $year=NULL, $email=NULL, $pic=NULL) {
		$this->surname = $surname;
		$this->description = $description;
		$this->adj1 = $adj1;
		$this->adj2 = $adj2;
		$this->adj3 = $adj3;
		if(!$year==NULL & !$email==NULL & !$pic==NULL){
			$this->year = $year;
			$this->email = $email;
			$this->pic = $pic;
		}
		
		
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
	
	public function getStringAdjectives() {
		return $this->adj1." - ".adj2." - ".adj3;
	}

	public function getYear(){
		return $this->year;
	}
	public function getEmail(){
		return $this->email;
	}
	public function getPic(){
		return $this->pic;
	}

	public function to_array(){
		$return = array(
			'surname' => $this->surname,
			'description' => $this->description,
			'adj1' => $this->adj1,
			'adj2' => $this->adj2,
			'adj3' => $this->adj3,
			'year' => $this->year,
			'email' => $this->email,
			'pic' => $this->pic
		);
		return $return;
	}
}

?>
