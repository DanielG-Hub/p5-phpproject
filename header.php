<?php
    session_start();

?>


<!DOCTYPE html>

<head>
<title>Blue Bird Inc.</title>
<link rel= "shortcut icon" href='bblogosmall.png'>
<link rel= "shortcut icon" href=''>
<link rel="stylesheet" type="text/css" href="css\index_style.css"/>
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="HandheldFriendly" content="true">
<meta charset="utf-8"> 
</head>


<body>

  <div class = "contain">

        <!--Header kode-->
        <h1> Blue Bird Inc.
        <hr style="margin-top: 10px;">
        </h1>

        <!--Kode for NavBar-->
        <div class = "topnav">
           
          <a href = index.php><i class="fa fa-home"></i> Home </a>   &nbsp &nbsp
          <a href = produkter.php><i class="fa fa-shopping-cart" aria-hidden="true"></i> Produkter </a> &nbsp &nbsp
          <a href = nyheter.php><i class="fa fa-newspaper-o" aria-hidden="true"></i> Nyhetsside </a> &nbsp &nbsp
          <a href = omoss.php><i class="fa fa-info" aria-hidden="true"></i> Om oss </a> &nbsp &nbsp
          <a href = kontakt.php><i class="fa fa-comments-o" aria-hidden="true"></i> Kontakt oss </a> &nbsp &nbsp
          <?php  
            if (isset($_SESSION["userid"])) {
                echo "<a href = profile.php><i class=@fa fa-fw fa-user@ aria-hidden=@true@></i> Profile Page</a> &nbsp &nbsp";
                echo "<a href = includes/logout.inc.php><i class=@fa fa-comments-o@ aria-hidden=@true@></i>Log out</a> &nbsp &nbsp";
            }
            else {
                echo "<a href = login.php><i class=@fa fa-fw fa-user@ aria-hidden=@true@></i> Log In</a> &nbsp &nbsp";
                echo "<a href = signup.php><i class=@fa fa-comments-o@ aria-hidden=@true@></i> Sign Up</a> &nbsp &nbsp";
            }
          ?>

      </div>

      </div>