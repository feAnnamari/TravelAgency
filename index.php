<!DOCTYPE html>
<html>
<head>
<title>Utazási iroda</title>
<meta charset="utf-8">
<link rel="stylesheet" href="layout/styles/layout.css" type="text/css">
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/slides.min.jquery.js"></script>
<script>
$(function () {
    $('#slides').slides({
        preload: true,
        preloadImage: 'layout/images/slider/loading.gif',
        play: 5000,
        pause: 2500,
        hoverPause: true
    });
});
</script>
</head>
<body id="top">
<div class="wrapper row0">
  <header id="topbar" class="clear">
  </header>
</div>
<div class="wrapper row1">
  <header id="header" class="clear">
    <div id="hgroup">
      <h1><a href="index.php">Utazási iroda</a></h1>
      <h2>Travel agency</h2>
    </div>
    <nav>
      <ul>
        <li class="last"><a href="kapcsolat.html">Kapcsolat</a><span>contact</span></li>
        <li><a href="utazasifeltetelek.html">Utazási feltételek</a><span>travel conditions</span></li>
        <li><a href="foglalas.php">Foglalás</a><span>reserve</span></li>    
        <li><a href="">Utak</a><span>Travels</span>
          <ul>
            <li><a href="belfold.php?sort=bycost">Belföld</a></li>
            <li><a href="kulfold.php?sort=bycost">Külföld</a></li>
          </ul>
        </li>
        <li class="active"><a href="index.php">Főoldal</a><span>Home page</span></li>
      </ul>
    </nav>
  </header>
</div>
<!-- content -->
<div class="wrapper row2">
  <div id="container" class="clear"> 
    <!-- content body -->
    <section id="slides">
      <div id="controls"> 
        <!-- Controls --> 
        <a href="#" class="prev"><img src="layout/images/slider/arrow-prev.png" alt="Previous"></a> <a href="#" class="next"><img src="layout/images/slider/arrow-next.png" alt="Next"></a> 
        <!-- Frame --> 
        <img src="layout/images/slider/frame.png" alt="" id="frame"> 
        <!-- / Frame -->
        <div class="slidescontainer">
          <figure class="slide"><a href="izland.html"><img src="images/01.jpg" width="940" height="360" alt=""></a>
            <figcaption class="caption">
              <h2>Izlandi csoportos körutazás</h2>
              <p>Gejzírek, vízesések, fjordok, jéghegyek, lávahomokos tengerpartok - nem kérdéses, hogy Izland a világ egyik legszebb országa. Fedezzék fel velünk kényelmes tempóban a szigetország látnivalóit körutazásunk során!</p>
              440 000 Ft-tól
            </figcaption>
          </figure>
          <figure class="slide"><a href="ujzeland.html"><img src="images/02.jpg" width="940" height="360" alt=""></a>
            <figcaption class="caption">
              <h2>Körutazás Ausztria és Új-Zéland tájain</h2>
              <p>Ez a körutazásunk Ausztrália és Új-Zéland azon vidékeit járja be, melyek a leginkább érdeklődésre tarthatnak számot a magyar turisták körében. Míg Ausztrália Földünk legöregebb kontinense, ahol a hegységek lekoptak, addig Új-Zélandon a Déli-Al­pok, mely végigvonul szinte az egész Déli-szi­ge­ten, a világ egyik legfiatalabb lánc­hegy­sége.</p>
            </figcaption>
          </figure>
          <figure class="slide"><a href="szlovenia.html"><img src="images/03.jpg" width="940" height="360" alt=""></a>
            <figcaption class="caption">
              <h2>Szlovénia gyöngyszemei</h2>
              <p>Nem véletlenül nevezik a „miniatűr Európának”, hiszen minden megtalálható itt, egymástól szinte karnyújtásnyira: smaragd színű, kristálytiszta és gyors sodrású folyók, égig érő, hósipkás hegyek, festői szurdokvölgyek, tavak, vízesések, mediterrán tengerpartok, álmos kis városkák, lankás borvidékek. </p>
            </figcaption>
          </figure>
          <figure class="slide"><a href="ausztria.html"><img src="images/04.jpg" width="940" height="360" alt=""></a>
            <figcaption class="caption">
              <h2>Készülődés a téli szezonra</h2>
              <p>Töltsd aktívan a nyarat a csodás Kaprun-Zell am See régióban. Négycsillagos wellness szálloda bővített gourmet ellátással, felvonóbérlet a gleccserre, a Schmitten hegyre, strandbelépők, hajókázás a tavon, magyar túravezetés, magyar képviselet.</p>
              <b>254 Euro</b>
            </figcaption>
          </figure>
          <figure class="slide"><a href="japan.html"><img src="images/05.jpg" width="940" height="360" alt=""></a>
            <figcaption class="caption">
              <h2>Japán, a felkelő nap országa!</h2>
              <p>Japán Földünk egyik legkülönlegesebb országa. Sok évszázados elszigeteltsége a külvilágtól egy sajátos, az európaitól teljesen különböző kultúrát hozott létre (furcsa szokások, eltérő életszemlélet, megdöbbentően változatos ételek, egzotikus mű­em­lékek stb.).</p>
            </figcaption>
          </figure>
          <figure class="slide"><a href="dunakanyar.html"><img src="images/06.jpg" width="940" height="360" alt=""></a>
            <figcaption class="caption">
              <h2>Utazás a Dunakanyarhoz</h2>
              <p>A folyó és a hegyek festői randevúja, a Visegrádi-hegység és a Börzsöny hegyei közé szorított Duna kanyarulata Magyarország egyik legszebb pontja. A természeti szépségek, történelmi emlékek, a művészeti látnivalók rengeteg izgalmas, érdekes kirándulást ígérnek.</p>
            </figcaption>
          </figure>
          <!-- / Slide Container --> 
        </div>
        <!-- / Controls --> 
      </div>
    </section>
    <!-- Services area -->
    <section class="services clear"> 
        <?php
               require_once('allandok.php');
               $dbc= mysqli_connect(HOST, USER, PASSWD, DB) or die('Nincs adatbázis kapcsolat!');
               $dbc->set_charset("utf8");
               $query="SELECT * FROM travels";
               $lista=mysqli_query($dbc, $query) or die('Sikertelen lekérdezés!');
               $szamlalo = 1;
               $kiegeszitoszoveg='';
              while($sor=mysqli_fetch_array($lista))
               {       
                    if($szamlalo%3==0)
                    {
                        $kiegeszitoszoveg = ' class="last"';
                    }
                    
                    else{
                      $kiegeszitoszoveg = '';
                    }
                    echo '<article'.$kiegeszitoszoveg.'><strong>'.$sor['name'].'</strong><p><figure><img  style="margin: 10px;" src="'.PATH.$sor['kep'].'" width="78" height="78" alt=""></figure>'.$sor['description'].'</p><p class="more"><a href="'.$sor['URL'].'">Megtekintés &raquo;</a></p></article>';
                    $szamlalo=$szamlalo+1;
               }
               mysqli_close($dbc);
        ?>
    </section>
    <!-- / content body --> 
  </div>
</div>
<!-- footer -->
<div class="wrapper row3">
  <footer id="footer" class="clear">
    <p class="fl_left">Copyright &copy; 2018 - All Rights Reserved - <a href="#">Utazási iroda</a></p>
    <p class="fl_right">Készítette: Fekete Annamária</p>
  </footer>
</div>
</body>
</html>