
<!DOCTYPE HTML>
<html>
    <head>
        <title>Salon automobila</title>
        <meta charset="UTF-8">

        <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
        <link href="css/style.css" rel='stylesheet' type='text/css' />
        <link href="css/moj.css" rel='stylesheet' type='text/css' />
        <link rel="stylesheet" href="css/font-awesome.min.css">

        <script src="js/jquery.min.js"></script>
        <script src="js/script.js"></script>

        <script>
            // Ajax prikaz marka prilikom pokretanja stranice
            $.get("kontroler.php", {marka: "prikaz"})
                    .done(function (data) {
                        var ispis = '';
                        var podaci = JSON.parse(data);
                        for (var i = 0; i < podaci.length; i++) {
                            ispis += '<div class="blog_grid">' +
                                    '<h2 class="post_title">' + podaci[i].marka_naziv + '</h2>' +
                                    '<ul class="links">' +
                                    '<li><i class="fa fa-check"></i>' + podaci[i].salon_automobila_id + '</li><br>' +
                                    '<li><i class="fa fa-book"></i> ' + podaci[i].marka_opis + '</li><br>' +
                                    '<li><i class="fa fa-money"></i>' + podaci[i].marka_cena + '</li>' +
                                    '</ul>' +
                                    '</div>';
                        }
                        ;
                        $('#marka').html(ispis);
                    });


            //Ajax prikaz svih salona automobila prilikom pokretanja stranice
            $.get("kontroler.php", {salon_automobila: "prikaz"})
                    .done(function (data) {
                        var ispis = '';
                        var podaci = JSON.parse(data);
                        for (var i = 0; i < podaci.length; i++) {
                            ispis += '<li value=' + podaci[i].salon_automobila_id + '>*' + podaci[i].salon_automobila_naziv + '</li>';

                        }
                        ispis += '<a style="color:blue" href="uredjivanjeSalonaAutomobila.php">+ Dodaj novi salon koji se ne nalazi na spisku</a>';
                        $('#salon_automobila').html(ispis);
                    });
                    

            //Sortiranje
            function sortAsc() {
                $.get("kontroler.php", {marka: "sortAsc"})
                        .done(function (data) {
                            var ispis = '';
                            var podaci = JSON.parse(data);
                            for (var i = 0; i < podaci.length; i++) {
                                ispis += '<div class="blog_grid">' +
                                        '<h2 class="post_title">' + podaci[i].marka_naziv + '</h2>' +
                                        '<ul class="links">' +
                                        '<li><i class="fa fa-money"></i>' + podaci[i].marka_cena + '</li>' +
                                        '<li><i class="fa fa-book"></i> ' + podaci[i].marka_opis + '</li>' +
                                        '<li><i class="fa fa-check"></i>' + podaci[i].salon_automobila_id + '</li>' +
                                        '</ul>' +
                                        '</div>';
                            }
                            ;
                            $('#marka').html(ispis);
                        });
            }

            function sortDesc() {
                $.get("kontroler.php", {marka: "sortDesc"})
                        .done(function (data) {
                            var ispis = '';
                            var podaci = JSON.parse(data);
                            for (var i = 0; i < podaci.length; i++) {
                                ispis += '<div class="blog_grid">' +
                                        '<h2 class="post_title">' + podaci[i].marka_naziv + '</h2>' +
                                        '<ul class="links">' +
                                        '<li><i class="fa fa-money"></i>' + podaci[i].marka_cena + '</li>' +
                                        '<li><i class="fa fa-book"></i> ' + podaci[i].marka_opis + '</li>' +
                                        '<li><i class="fa fa-check"></i>' + podaci[i].salon_automobila_id + '</li>' +
                                        '</ul>' +
                                        '</div>';
                            }
                            ;
                            $('#marka').html(ispis);
                        });
            }



            // Ajax pretraga
            function search() {
                $.get("kontroler.php", {marka: 'pretraga', tekst: $('#pretraga').val()})
                        .done(function (data) {
                            var ispis = '';
                            var podaci = JSON.parse(data);
                            for (var i = 0; i < podaci.length; i++) {
                                ispis += '<div class="blog_grid">' +
                                        '<h2 class="post_title">' + podaci[i].marka_naziv + '</h2>' +
                                        '<ul class="links">' +
                                        '<li><i class="fa fa-money"></i>' + podaci[i].marka_cena + '</li>' +
                                        '<li><i class="fa fa-book"></i> ' + podaci[i].marka_opis + '</li>' +
                                        '<li><i class="fa fa-check"></i>' + podaci[i].salon_automobila_id + '</li>' +
                                        '</ul>' +
                                        '</div>';
                            }
                            ;
                            $('#marka').html(ispis);
                        });
            }

        </script>
    </head>

    <body>
        <div class="header">
            <div class="container">
                <div class="logo"> <a href="index.php"><img src="images/logo.png" alt="Salon automobila"></a> </div>
                <div class="menu"> <a class="toggleMenu" href="#"><img src="images/logo.png" alt="" /> </a>
                    <ul class="nav" id="nav">
                        <li><a href="index.php">Pocetna strana</a></li>
                        <li><a href="uredjivanjeMarke.php">Uredjivanje marki</a></li>
                    </ul>
               </div>   
        
        </div>

</div>


        <div class="about">
            <div class="container">
                <section class="title-section">
                    <h1 class="title-header text-center"> Dostupne marke automobila u salonima  u gradu </h1>
                </section>
                <button class="btn" onclick="sortDesc()">Sortiraj opadajuce</button>
                <button class="btn" onclick="sortAsc()">Sortiraj rastuce</button>
            </div>
        </div><br>



        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <input id="pretraga" type="search" onsearch="search()" class="form-control" placeholder="Pretraga..." onkeyup="search()" size="45">
                    <div id="marka">
                    </div>
                </div>

                <div class="col-md-6" >
                    <h3>Spisak svih aktivnih salona automobila u gradu:</h3>

                    <ul class="sidebar" id="salon_automobila">
                    </ul>
                </div>
            </div>
        </div>