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
        <li class="active"><a href="">Utak</a><span>Travels</span>
          <ul>
            <li><a href="belfold.php?sort=bycost">Belföld</a></li>
            <li><a href="kulfold.php?sort=bycost">Külföld</a></li>
          </ul>
        </li>
        <li><a href="index.php">Főoldal</a><span>Home page</span></li>
      </ul>
    </nav>
  </header>
</div>
<!-- content -->
<div class="wrapper row2">
  <div id="container" class="clear"> 
    <!-- content body -->
    <section id="content"> 

      <section>
        <h1>Külföldi utazásaink</h1>
       <div id="buttonHolder">
          <a href="kulfold.php?sort=bycost" class="button">Ár szerint növekvő</a>
          <a href="kulfold.php?sort=bystartdate" class="button">Dátum szerint növekvő</a>
       </div>
        <table class = "table">
          <tbody>
        <?php
               require_once('allandok.php');
               $dbc= mysqli_connect(HOST, USER, PASSWD, DB) or die('Nincs adatbázis kapcsolat!');
               $dbc->set_charset("utf8");
               $query="SELECT * FROM travels";

               if ($_GET['sort'] == 'bycost')
                {
                    $query .= " ORDER BY cost";
                }
                elseif ($_GET['sort'] == 'bystartdate')
                {
                    $query .= " ORDER BY startDate";
                }
               $lista=mysqli_query($dbc, $query) or die('Sikertelen lekérdezés!');
               $sotet = false;
              
              while($sor=mysqli_fetch_array($lista))
               {
                if($sor['type']== "Külföld")
                {
                    if($sotet)
                    {
                        echo '<tr class="dark">';
                    }
                    if(!$sotet)
                    {
                        echo '<tr class="light">';
                    }
                    echo '<td><img src="'.PATH.$sor['kep'].'" width="200">';
                    echo '</td>';
                    echo'<td>';
                    echo'<h3><a href="'.$sor['URL'].'">';
                    printf($sor['name']."<br>");
                    echo'</a></h3>';
                    printf($sor['description']."<br/><br/>");
                    printf("<i>".$sor['cost']." Ft-tól</i><br><br>");
                    printf("Indulás: ".$sor['startDate']."<br>");
                    echo '</td></tr>';
                    $sotet = !$sotet;
                }

               }
               mysqli_close($dbc);
        ?>
        </tbody>
       </table>
       </section>

    </section>
    <!-- right column -->
    <aside id="right_column"> 
      <!-- ########################################################################################## --> 
      <!-- ########################################################################################## --> 
      <!-- ########################################################################################## --> 
      <!-- ########################################################################################## -->
      <!-- /nav -->
      <section>
        <h2>Get In Contact</h2>
        <address>
        Utazási iroda<br>
        Cím: Széchenyi tér 1.<br>
        Város: Pécs<br>
        Irányítószám: 7621<br>
        <br>
        Tel: 0630/333-3333<br>
        Email: <a href="#">utazasiiroda@gmail.com</a>
        </address>
      </section>
      <!-- /section -->
      <!-- /section --> 
      <!-- ########################################################################################## --> 
      <!-- ########################################################################################## --> 
      <!-- ########################################################################################## --> 
      <!-- ########################################################################################## --> 
    </aside>
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