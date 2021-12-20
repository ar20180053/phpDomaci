<?php
class Zanr
{
    public $zanr;
    public $opis;

    public function __construct($zanr = null, $opis = null)
    {
        $this->zanr = $zanr;
        $this->opis = $opis;
    }

    public static function getAll(mysqli $conn)
    {
        $query = "SELECT * FROM zanrovi";
        return $conn->query($query);
    }
}
