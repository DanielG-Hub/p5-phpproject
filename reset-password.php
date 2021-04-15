<?php
    include_once 'header.php';
?>
  
<!-- Data går fra den side til andre (Begge kommunisererer med hverandre) -->
<section class="signup-form">
    <h2>Reset your password</h2>
    <p>An e-mail will be sent to you with instructions on how to reset your password.</p>
<form action="includes/reset-requests.inc.php" method="post">
    <input type="text" name="email" placeholder="Enter your e-mail address">
    <button type="submit" name="reset-requests-submit">Receive new password by e-mail</button>
</form>
<?php
if (isset($_GET["reset"])) {
    if ($_GET["reset"] == "success") {
        echo "<p>Check your e-mail!</p>";
    }
}
?>

</section>

<?php
    include_once 'footer.php';
?>