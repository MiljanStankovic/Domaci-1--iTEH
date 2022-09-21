<?php
include 'domen/SalonAutomobila.php';
include 'domen/Marka.php';

if (isset($_GET['salon_automobila']) && $_GET['salon_automobila'] == 'prikaz') {
    echo json_encode(SalonAutomobila::vratiSvePodatkeIzBaze());
}

if (isset($_GET['marka']) && $_GET['marka'] == 'prikaz') {
    echo json_encode(Marka::vratiSvePodatkeIzBaze());
}

if (isset($_GET['marka']) && $_GET['marka'] == 'pretraga') {
    if (isset($_GET['tekst'])) {
        echo json_encode(Marka::vratiPoNazivu($_GET['tekst']));
    }
}

if (isset($_GET['marka']) && $_GET['marka'] == 'sortAsc') {
    echo json_encode(Marka::sortAsc());
}

if (isset($_GET['marka']) && $_GET['marka'] == 'sortDesc') {
    echo json_encode(Marka::sortDesc());
}

if (isset($_GET['obrisi']) && $_GET['obrisi'] == 'marka') {
    if (Marka::obrisi($_GET['id'])){
        echo 'OK';
    }
    else{
        echo 'ERR';
    }
}

if (isset($_GET['obrisi']) && $_GET['obrisi'] == 'salon_automobila') {
    if (SalonAutomobila::obrisi($_GET['id'])){
        echo 'OK';
    }
    else{
        echo 'ERR';
    }
}


?>