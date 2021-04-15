<?php
    include_once 'header.php';
?>
  
<!-- Data går fra den side til andre (Begge kommunisererer med hverandre) -->
<section class="signup-form">
     
    <?php
        $selector = $_GET["selector"];
        $validator = $_GET["validator"];

        if (empty($selector || empty($validator))) {
            echo "We could not validate your request!";
        }
        else {
            if(ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false ) {
                ?>

                <form action ="includes/reset-password.inc.php" method="post">
                    <input type="hidden" name="selector" value="<?php echo $selector ?>">;
                    <input type="hidden" name="selector" value="<?php echo $selector ?>">;
                    <input type="password" name="pwd" placeholder="Enter a new password">;
                    <input type="password" name="pwd-repeat" placeholder="Repeat new password">;
                    <button type="submit" name="reset-password-submit">Reset password</button>
                </form>

                <?php


            }
        }
    ?>

</section>

<?php
    include_once 'footer.php';
?>