<?php
class publication
{
	private $firstname;
	private $lastname;
	private $date;
	private $place;
	
	//constructor
	function __construct($firstname,$lastname,$date,$place)
	{
		$this->firstname=$firstname;
		$this->lastname=$lastname;
		$this->datee=$date;
		$this->place=$place;
	}
	function printPublication()
	{
		return " Firstname : $this->firstname, Lastname : $this->lastname, Date : $this->datee, Place : $this->$place";
	}
	function makeline()
	{
		echo'<li>'.$this->printPublication().'<li>';
	}
}
?>