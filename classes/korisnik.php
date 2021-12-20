<?php
class Korisnik
{

    public $id_korisnika;
    public $ime;
    public $prezime;
    public $JMBG;

    public function __construct($id_korisnika = null, $ime = null, $prezime = null, $JMBG = null)
    {
        $this->id_korisnika = $id_korisnika;
        $this->ime = $ime;
        $this->prezime = $prezime;
        $this->JMBG = $JMBG;
    }

    public static function logInKorisnik($user, mysqli $conn)
    {
        $query = "SELECT * FROM korisnici WHERE ime='$user->ime' and prezime='$user->prezime'";
        return $conn->query($query);
    }
}
