<?php
class utenteLoggato{
	var $cf;
	var $nome;
	var $cognome;
	var $matricola;
	var $ruolo;

	public function __construct(){
		$this->cf=null;
		$this->nome=null;
		$this->cognome=null;
		$this->matricola=null;
		$this->ruolo=null;
	}

	function __destroy(){
		$this->cf=null;
		$this->nome=null;
		$this->cognome=null;
		$this->matricola=null;
		$this->ruolo=null;
	}

	public function set_parameter($cf,$nome,$cognome,$matricola,$ruolo){
		$this->cf=$cf;
		$this->nome=$nome;
		$this->cognome=$cognome;
		$this->matricola=$matricola;
		$this->ruolo=$ruolo;
	}
}
?>