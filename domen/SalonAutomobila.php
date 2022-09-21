<?php

class SalonAutomobila {

    public $salon_automobila_id = 0;
    public $salon_automobila_naziv = '';

    public function getsalon_automobila_id() {
        return $this->salon_automobila_id;
    }

    public function getsalon_automobila_naziv() {
        return $this->salon_automobila_naziv;
    }

    public function setsalon_automobila_id($salon_automobila_id) {
        $this->salon_automobila_id = $salon_automobila_id;
    }

    public function setsalon_automobila_naziv($salon_automobila_naziv) {
        $this->salon_automobila_naziv = $salon_automobila_naziv;
    }

    public static function vratiSvePodatkeIzBaze() {
        include 'konekcija.php';
        $podaciIzBaze = $mysqli->query('SELECT * FROM salon_automobila');
        $SalonAutomobilaNiz = array();
        while ($red = $podaciIzBaze->fetch_assoc()) {
            $salon_automobila = new SalonAutomobila();
            $salon_automobila->setsalon_automobila_id($red['salon_automobila_id']);
            $salon_automobila->setsalon_automobila_naziv($red['salon_automobila_naziv']);
            array_push($SalonAutomobilaNiz, $salon_automobila);
        }
        return $SalonAutomobilaNiz;
    }

    public function save() {
        include_once 'konekcija.php';
        $podaciIzBaze = $mysqli->query("INSERT INTO salon_automobila (salon_automobila_naziv)
            VALUES ('$this->salon_automobila_naziv')");
        if ($podaciIzBaze > 0)
            return true;
        else
            return false;
    }

    public static function obrisi($salon_automobila_id) {
        include_once 'konekcija.php';
        $podaciIzBaze = $mysqli->query('DELETE FROM salon_automobila WHERE salon_automobila_id=' . $salon_automobila_id);
        if ($podaciIzBaze > 0)
            return true;
        else
            return false;
    }

}

?>