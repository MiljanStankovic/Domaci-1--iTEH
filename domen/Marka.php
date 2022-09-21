<?php

class Marka {

    public $marka_id;
    public $marka_naziv;
    public $marka_opis;
    public $marka_cena;
    public $salon_automobila_id;

    public function getMarka_id() {
        return $this->marka_id;
    }

    public function getMarka_naziv() {
        return $this->marka_naziv;
    }

    public function getMarka_opis() {
        return $this->marka_opis;
    }

    public function getMarka_cena() {
        return $this->marka_cena;
    }

    public function getSalon_automobila_id() {
        return $this->salon_automobila_id;
    }

    public function setMarka_id($marka_id) {
        $this->marka_id = $marka_id;
    }

    public function setMarka_naziv($marka_naziv) {
        $this->marka_naziv = $marka_naziv;
    }

    public function setMarka_opis($marka_opis) {
        $this->marka_opis = $marka_opis;
    }

    public function setMarka_cena($marka_cena) {
        $this->marka_cena = $marka_cena;
    }

    public function setSalon_automobila_id($salon_automobila_id) {
        $this->salon_automobila_id = $salon_automobila_id;
    }

    public static function vratiSvePodatkeIzBaze() {
        include_once 'konekcija.php';
        $podaciIzBaze = $mysqli->query('SELECT marka_id, marka_naziv, marka_opis, marka_cena, salon_automobila_naziv 
                                        FROM salon_automobila, marka 
                                        WHERE salon_automobila.salon_automobila_id=marka.salon_automobila_id');
        $markaNiz = array();
        while ($red = $podaciIzBaze->fetch_assoc()) {
            $marka = new marka();
            $marka->setMarka_id($red['marka_id']);
            $marka->setMarka_naziv($red['marka_naziv']);
            $marka->setMarka_opis($red['marka_opis']);
            $marka->setMarka_cena($red['marka_cena']);
            $marka->setSalon_automobila_id($red['salon_automobila_naziv']);
            array_push($markaNiz, $marka);
        }
        return $markaNiz;
    }

    public static function sortAsc() {
        include_once 'konekcija.php';
        $podaciIzBaze = $mysqli->query("SELECT marka_id, marka_naziv, marka_opis, marka_cena, salon_automobila_naziv 
                                        FROM salon_automobila, marka 
                                        WHERE salon_automobila.salon_automobila_id=marka.salon_automobila_id
                                        ORDER BY marka_cena ASC");
        $markaNiz = array();
        while ($red = $podaciIzBaze->fetch_assoc()) {
            $marka = new marka();
            $marka->setMarka_id($red['marka_id']);
            $marka->setMarka_naziv($red['marka_naziv']);
            $marka->setMarka_opis($red['marka_opis']);
            $marka->setMarka_cena($red['marka_cena']);
            $marka->setSalon_automobila_id($red['salon_automobila_naziv']);

            array_push($markaNiz, $marka);
        }
        return $markaNiz;
    }

    public static function sortDesc() {
        include_once 'konekcija.php';
        $podaciIzBaze = $mysqli->query("SELECT marka_id, marka_naziv, marka_opis, marka_cena, salon_automobila_naziv 
                                        FROM salon_automobila, marka 
                                        WHERE salon_automobila.salon_automobila_id=marka.salon_automobila_id
                                        ORDER BY marka_cena DESC");
        $markaNiz = array();
        while ($red = $podaciIzBaze->fetch_assoc()) {
            $marka = new marka();
            $marka->setMarka_id($red['marka_id']);
            $marka->setMarka_naziv($red['marka_naziv']);
            $marka->setMarka_opis($red['marka_opis']);
            $marka->setMarka_cena($red['marka_cena']);
            $marka->setSalon_automobila_id($red['salon_automobila_naziv']);

            array_push($markaNiz, $marka);
        }
        return $markaNiz;
    }

    public static function vratiPoNazivu($pretraga) {
        include_once 'konekcija.php';
        $podaciIzBaze = $mysqli->query("SELECT marka_id, marka_naziv, marka_opis, marka_cena, salon_automobila_naziv 
                                        FROM salon_automobila, marka 
                                        WHERE salon_automobila.salon_automobila_id=marka.salon_automobila_id 
                                        and marka_naziv LIKE '%$pretraga%'");
        $markaNiz = array();
        while ($red = $podaciIzBaze->fetch_assoc()) {
            $marka = new marka();
            $marka->setMarka_id($red['marka_id']);
            $marka->setMarka_naziv($red['marka_naziv']);
            $marka->setMarka_opis($red['marka_opis']);
            $marka->setMarka_cena($red['marka_cena']);
            $marka->setSalon_automobila_id($red['salon_automobila_naziv']);

            array_push($markaNiz, $marka);
        }
        return $markaNiz;
    }

    public function save() {
        include_once 'konekcija.php';
        $podaciIzBaze = $mysqli->query("INSERT INTO marka (marka_naziv, marka_opis, marka_cena, salon_automobila_id)
            VALUES ('$this->marka_naziv', '$this->marka_opis', '$this->marka_cena', '$this->salon_automobila_id')");
        if ($podaciIzBaze > 0)
            return true;
        else
            return false;
    }

    public static function obrisi($marka_id) {
        include_once 'konekcija.php';
        $podaciIzBaze = $mysqli->query('DELETE FROM marka WHERE marka_id=' . $marka_id);
        if ($podaciIzBaze > 0)
            return true;
        else
            return false;
    }



}

?>