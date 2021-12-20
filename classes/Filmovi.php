<?php
class Filmovi
{
    public $id;
    public $naziv;
    public $zanr;
    public $trajanje;

    public function __construct($id = null, $naziv = null, $zanr = null, $trajanje = null)
    {
        $this->id = $id;
        $this->predmet = $naziv;
        $this->katedra = $zanr;
        $this->sala = $trajanje;
    }

    public static function getAll(mysqli $conn)
    {
        $query = "SELECT * FROM filmovi";
        return $conn->query($query);
    }

    public static function getById($id, mysqli $conn)
    {
        $query = "SELECT * FROM filmovi WHERE id=$id";
        $myArray = array();
        $rezultat = $conn->query($query);
        if ($rezultat) {
            while ($red = $rezultat->fetch_array()) {
                $myArray[] = $red;
            }
        }

        return $myArray;
    }

    public function deleteById(mysqli $conn)
    {
        $query = "DELETE FROM filmovi WHERE id=$this->id";
        return $conn->query($query);
    }

    public static function add(Filmovi $film, mysqli $conn)
    {
        $q = "INSERT INTO filmovi(naziv,zanr,trajanje) VALUES('$film->naziv','$film->zanr','$film->trajanje')";
        return $conn->query($q);
    }

    public function update(mysqli $conn)
    {
        $q = "UPDATE filmovi SET naziv ='$this->naziv', zanr='$this->zanr',trajanje='$this->trajanje'";
        return $conn->query($q);
    }
}
