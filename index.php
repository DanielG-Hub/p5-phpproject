<?php
    include_once 'header.php';
?>
  

<section class="contact">

  <!--Kode for bakgrunnsbilde-->
  <div class="bakgrunn">
    <img src ="img/deer.jpg" class="responsive">
 </div>

<div class = "container">
        <!-- Jumbotron -->
      <div class="jumbotron">
        <h1>Blue Bird Inc.</h1>
        <?php
     if (isset($_SESSION["userid"])) {
        echo "<p> Welcome, " . $_SESSION["useruid"] . "</p>";    
    }
    ?>
        <p class="lead">Velkommen til Blue Bird Inc.'s nettside.</p>
      </div>

      <!--Kode for kolonner-->
      <div class="row">
        <div class="column" style="background-color:#aaa;">
          <h2>Vårt oppdrag</h2> 
          <p>Vi hos Blue Bird Inc. har satt målet vårt klart og tidlig. Vi ønsker å lære mye mer om dyrene på jorda vårt og oppgaven er ikke lett. <br> <br>
            Ved å bruke GPS trackere og radio tags, gjør vi arbeidet mye enklere. Våre ansatte har jobbet for lage produkter som er ikke skadelige til både natur og dyrene.</p>
        </div>
        <div class="column" style="background-color:#bbb;">
          <h2>Fremtidsplaner</h2>
          <p>Planene våre er å gjøre det lettere for alle interessert å lære mye mer om naturen og hvordan dyr lever i den/tilpasser seg til den. <br> <br> 
            Å vite hvor dyr flytter seg gjennom sesonger kan hjelpe oss redde mange arter.</p>
        </div>
      </div>

</div>

</section>

<?php
    include_once 'footer.php';
?>