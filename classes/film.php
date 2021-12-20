<?php require_once "../db/db.php";
class Film extends db
{

    public function insert($n, $z, $t)
    {
        $query = "INSERT INTO filmovi(naziv,zanr,trajanje) VALUES(?,?,?)";
        $connectQuery = $this->connect()->prepare($query);
        if ($connectQuery->execute([$n, $z, $t])) {
            echo "Film je uspesno unet.";
        }
    }

    public function get_row($id)
    {
        $query = "SELECT * FROM filmovi WHERE id = ? ";
        $connectQuery = $this->connect()->prepare($query);
        $connectQuery->execute([$id]);
        while ($row = $connectQuery->fetch(PDO::FETCH_ASSOC)) {
            return $row;
        }
    }

    public function load()
    {
        $query = "SELECT * FROM filmovi ";
        $connectQuery = $this->connect()->prepare($query);
        $connectQuery->execute();
        $out = "";
        $out = "<table class='table table-hover' id='table'>
        <thead>
            <tr>
                <th scope='col'>Naziv</th>
                <th scope='col'>Zanr</th>
                <th scope='col'>Trajanje (min)</th>
                <th scope='col'>Edit</th>
                <th scope='col'>Delete</th>
            </tr>
        </thead>";
        while ($row = $connectQuery->fetch(PDO::FETCH_ASSOC)) {
            $id = $row['id'];
            $naziv = $row['naziv'];
            $zanr = $row['zanr'];
            $trajanje = $row['trajanje'];
            $out .= "<tr><td>$naziv</td><td>$zanr</td><td>$trajanje</td>";
            $out .= "<td><a href='edit.php?id=$id' class='edit submit-button' title='edit'><i class='fa fa-fw fa-pencil'></i></a></td>";
            $out .= "<td><span id='$id' class='del submit-button' title='delete'><i class='fa fa-fw fa-trash'></i></span></td>";
        }
        $out .= "</table>";
        return $out;
        return $out;
    }

    public function update($n, $z, $t, $id)
    {
        $query = "UPDATE filmovi SET naziv = ?, zanr = ? , trajanje = ? where id = ? ";
        $connectQuery = $this->connect()->prepare($query);
        if ($connectQuery->execute([$n, $z, $t, $id])) {
            echo "Data updated! <a href='index.php'>view</a>";
        }
    }

    public function delete($id)
    {
        $query = "DELETE FROM filmovi WHERE id = ?";
        $connectQuery = $this->connect()->prepare($query);
        if ($connectQuery->execute([$id])) {
            echo "1 record deleted.";
        }
    }
}
