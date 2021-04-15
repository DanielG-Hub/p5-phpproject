<?php
    include_once 'header.php';
?>
  
<!-- Data går fra den side til andre (Begge kommunisererer med hverandre) -->
<section class="signup-form">
    <h2>Log In</h2>
    <form action="includes/login.inc.php" method="post">
        <input type="text" name="uid" placeholder="Username/E-mail">
        <input type="password" name="pwd" placeholder="Password">
        <button type="submit" name="submit">Log In</button>
</form>
<?php
if (isset($_GET["error"])) {
    if ($_GET["error"] == "emptyimput") {
        echo "<p>Fill in all fields!</p>";
    }
    else if ($_GET["error"] == "wronglogin") {
        echo "<p>Incorrect login information!</p>";
    }
}

?>

</section>

<?php
    include_once 'footer.php';
?>