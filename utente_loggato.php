<?php

class utenteLoggato
{
    var $id;
    var $nome;
    var $cognome;
    var $data_nascita;
    var $cf;
    var $email;
    var $indirizzo;
    var $residenza;
    var $telefono;
    var $ruolo; //valori: docente, studente, admin

    public function __construct()
    {
        $this->cf = null;
        $this->nome = null;
        $this->cognome = null;
        $this->matricola = null;
        $this->ruolo = null;
    }

    function __destroy()
    {
        $this->cf = null;
        $this->nome = null;
        $this->cognome = null;
        $this->matricola = null;
        $this->ruolo = null;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function set_parameter($id, $nome, $cognome, $data_nascita, $cf, $email, $indirizzo, $residenza, $telefono)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->cognome = $cognome;
        $this->data_nascita = $data_nascita;
        $this->cf = $cf;
        $this->email = $email;
        $this->indirizzo = $indirizzo;
        $this->residenza = $residenza;
        $this->telefono = $telefono;
    }

    public function set_ruolo($ruolo)
    {
        $this->ruolo = $ruolo;
    }

    public function get_ruolo(){
        return $this->ruolo;
    }


    public function reloadUser($connessione){
        $query = "SELECT * FROM anagrafe WHERE Id=" . $this->id;
        $risultato = $connessione->query($query);
        $res = $risultato->fetch_assoc();
        if ($risultato->num_rows == 1) {
            self::set_parameter($this->id, $res["Nome"], $res["Cognome"], $res["Data_nascita"], $res["Codice_fiscale"], $res["Email"], $res["Indirizzo"], $res["Residenza"], $res["Telefono"]);
        }
    }

}


?>
