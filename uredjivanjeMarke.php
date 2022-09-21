<?php

include 'domen/Marka.php';

if (isset($_POST['marka_naziv'])) {

    $marka = new marka();
    $marka->setMarka_naziv($_POST['marka_naziv']);
    $marka->setMarka_cena($_POST['marka_cena']);
    $marka->setMarka_opis($_POST['marka_opis']);
    $marka->setSalon_automobila_id($_POST['salon_automobila_id']);


    $marka->save();
}
?>


<!DOCTYPE HTML>
<html>
    <head>
        <title>Saloni</title>
        <meta charset="UTF-8">

        <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
        <link href="css/style.css" rel='stylesheet' type='text/css' />
        <link rel="stylesheet" href="css/font-awesome.min.css">

        <script src="js/jquery.min.js"></script>
        <script src="js/script.js"></script>


        <script src="//cdn.ckeditor.com/4.5.5/basic/ckeditor.js"></script>

        <script>
            $.get("kontroler.php", {marka: "prikaz"})
                    .done(function (data) {
                        var ispis = '';
                        var podaci = JSON.parse(data);
                        ispis = '';
                        for (var i = 0; i < podaci.length; i++) {
                            ispis += '<div class="blog_grid">' +
                                    '<p>' + podaci[i].marka_naziv + ' - ' + podaci[i].marka_opis + '</p>' +
                                    '<ul class="links">' +
                                    '<li><button type="button" onclick="obrisi(' + podaci[i].marka_id + ')" >Obrisi</button></li>' +
                                    '</ul>' +
                                    '</div>';
                        }
                        ;
                        $('#firme').html(ispis);
                    });

            $.get("kontroler.php", {salon_automobila: "prikaz"})
                    .done(function (data) {
                        var ispis = '';
                        var podaci = JSON.parse(data);
                        for (var i = 0; i < podaci.length; i++) {
                            ispis += '<option  value=' + podaci[i].salon_automobila_id + '>' + podaci[i].salon_automobila_naziv + '</option>';
                        }
                        ;
                        $('#saloni').html(ispis);
                    });


            function obrisi(id) {
                $.get('kontroler.php',
                        {obrisi: 'marka', id: id})
                        .done(function (data) {
                            if (data == 'OK') {
                                location.reload();
                            } else {
                                alert('Greska');
                            }
                        });
            }

        </script>

    <div class="about">
        <div class="container">
            <section class="title-section">
                <h1 class="text-center" class="title-header"> Informacije o markama </h1>
                <a href="index.php">< Povratak na pocetnu</a>
            </section>
        </div>
    </div>

    <div class="container">
        <div id="content_left">
            <h1 class="text-center">Unos marke</h1>

            <div class="box">

                <p>
                <form class="form-group"  action="" method="POST" name="unos" >
                    <p>Naziv marke</p>
                    <input class="form-control" type="text" name="marka_naziv" >
                    <p>Salon u kome je dostupna marka</p>
                    <select class="form-control" id="saloni" name="salon_automobila_id">
                    </select>
                    <p>Opis</p>
                    <textarea name="marka_opis"></textarea> 
                    <script>
                        CKEDITOR.replace('marka_opis');
                    </script>
                    <p>Cena</p>
                    <input type="text" class="form-control" name="marka_cena" >
                    <p></p><br><br>
                    <button type="submit" class="form-control" class="btn btn-danger">Zapamti</button>

                </form>             
                </p>
            </div>
            
            <div class="row">
                <div class="col-md-6" id="firme">
                </div>
            </div>
        </div>
    </div>

?>