<?php
    include_once 'header.php';
?>
  
<!-- Data går fra den side til andre (Begge kommunisererer med hverandre) -->
<section class="signup-form">
    <h2>Sign Up</h2>
    <form action="includes/signup.inc.php" method="post">
        <input type="text" name="name" placeholder="Full name">
        <input type="text" name="email" placeholder="E-mail">
        <input type="text" name="uid" placeholder="Username">
        <input type="password" name="pwd" placeholder="Password">
        <input type="password" name="pwdrepeat" placeholder="Repeat Password">
        <button type="submit" name="submit">Sign Up</button>
</form>

<!-- isset sjekker om data er submitted riktig.
GET sjekker om det er data i URL. Hvis ikke, det er post, som ikke kan ses.  -->
<?php
if (isset($_GET["error"])) {
    if ($_GET["error"] == "emptyinput") {
        echo "<p>Fill in all fields!</p>";
    }
    else if ($_GET["error"] == "invaliduid") {
        echo "<p>Choose a proper username!</p>";
    }
    else if ($_GET["error"] == "invalidemail") {
        echo "<p>Choose a proper e-mail!</p>";
    }
    else if ($_GET["error"] == "passwordnomatch") {
        echo "<p>Passwords don't match!</p>";
    }
    else if ($_GET["error"] == "stmtfailed") {
        echo "<p>Something went wrong! Try again!</p>";
    }
    else if ($_GET["error"] == "usernametaken") {
        echo "<p>Username already taken!</p>";
    }
    else if ($_GET["error"] == "none") {
        echo "<p>You have signed up!</p>";
    }
}

?>

</section>


<?php
    include_once 'footer.php';
?>