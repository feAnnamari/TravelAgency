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
        <li class="active"><a href="foglalas.php">Foglalás</a><span>reserve</span></li>    
        <li><a href="">Utak</a><span>Travels</span>
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
      <!-- ########################################################################################## --> 
      <!-- ########################################################################################## --> 
      <!-- ########################################################################################## --> 
      <!-- ########################################################################################## -->
      <section>
<?php
      require_once('allandok.php');
      if(isset($_POST['submit']))
      {
          $firstname=$_POST['firstname'];
          $lastname=$_POST['lastname'];
          $email=$_POST['email'];
          $birthdate=$_POST['birthdate'];
          $travelID=$_POST['travelID'];
          $numberofperson=$_POST['numberofperson'];
          $megjegyzes=$_POST['megjegyzes'];
      
          if(!empty($firstname) && !empty($lastname) && !empty($email) && $birthdate!=0)
           {
                   $dbc=mysqli_connect(HOST, USER, PASSWD, DB) or die('Nincs adatbázis kapcsolat!');
                   $dbc->set_charset("utf8");
                   $query="INSERT INTO jelentkezok(firstname, lastname, birthdate, email, travelID, numberofperson, megjegyzes) VALUES('$firstname', '$lastname', '$birthdate', '$email', '$travelID', '$numberofperson', '$megjegyzes')";

                   mysqli_query($dbc, $query) or die('Sikertelen lekérdezés!').mysqli_error($dbc);
                   mysqli_close($dbc);
                   echo '<h1>Sikeres foglalás!</h1>';
            }
           if(empty($firstname))
            {
              echo '<h1>Nem adta meg a keresztnevét!</h1>';
            }
            if(empty($lastname))
            {
              echo '<h1>Nem adta meg a vezetéknevét!</h1>';
            }
            if(empty($email))
            {
              echo '<h1>Nem adta meg az email címét!</h1>';
            }
            if(empty($birthdate))
            {
              echo '<h1>Nem adta meg a születési dátumát!</h1>';
            }
      }
 ?>

      <form id="formId" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
      <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo MAXFS; ?>"/>
      <fieldset>
       <p>Vezetéknév: <input type="text" id="lastname" name="lastname" value="<?php if(!empty($lastname)){echo $lastname;} ?>"/> </p>
       <p>Keresztnév: <input type="text" id="firstname" name="firstname" value="<?php if(!empty($firstname)){echo $firstname;} ?>"/> </p>
       <p>Email: <input type="text" id="email" name="email" value="<?php if(!empty($email)){echo $email;} ?>"/></p>
       <p>Születési dátum: <input id="birthdate" name="birthdate" type="date" value="<?php if(!empty($birthdate)){echo $birthdate;} ?>" /> </p>
       <script type="text/javascript">document.getElementById('birthdate').valueAsDate = new Date();</script>
      </fieldset>
<table style="border: 0px; margin: 0px">
  <tr>
    <td style="border: 0px;">Melyik útra szeretne jelentkezni?</td>
    <td style="border: 0px;">Hány fő?</td>
  </tr>
  <tr>
    <td style="border: 0px; padding: 0px; padding-right:10px;">      <fieldset>
      <select id="travelID" name="travelID">
      <?php
               require_once('allandok.php');
               $dbc= mysqli_connect(HOST, USER, PASSWD, DB) or die('Nincs adatbázis kapcsolat!');
               $dbc->set_charset("utf8");
               $query="SELECT * FROM travels";
               $lista=mysqli_query($dbc, $query) or die('Sikertelen lekérdezés!');
              
              while($sor=mysqli_fetch_array($lista))
               {
                echo '<option value="'.$sor['id'].'">'.$sor['name'].' - '.$sor['cost'].' Ft</option>';
               }
               mysqli_close($dbc);
        ?>
       </select>
</fieldset></td>
    <td style="border: 0px; padding: 0px;"><fieldset>
       <div class="select-style">
       <select id="numberofperson" name="numberofperson">
       <option value="1">1</option>
       <option value="2">2</option>
       <option value="3">3</option>
       <option value="4">4</option>
       <option value="5">5</option>
       <option value="6">6</option>
       <option value="7">7</option>
       <option value="8">8</option>
       <option value="9">9</option>
       <option value="10">10</option>
       </select>
       </div>
      </fieldset></td>

</table>
      

      <fieldset>
       <label for="megjegyzes">Megjegyzés:</label><br/>
       <textarea name="megjegyzes" wrap="hard" cols="40" rows="10" id="megjegyzes"
       placeholder="(legfeljebb 500 karakterben)"></textarea>
      </fieldset>
      <fieldset id="utolso">
       <div id="buttonHolder">
       <p id="gombok">
       <input class="button" type="reset" value="Űrlap alaphelyzet">
       <input class="button" type="submit" name="submit" value="Foglalás" id="reserve">
      </p>
       </div>
      </fieldset>

      <p><ul id="hibalista"></ul></p>
      </form>































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