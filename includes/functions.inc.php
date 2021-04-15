<?php

/*Koden under sjekker om noe er ikke skrevet. Hvis et felt er tøm, error kommer opp for å gjenta prosessen*/
function emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat) {
    $result;
    if (empty($name) || empty($email) || empty($username) || empty($pwd) || empty($pwdRepeat)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;

}

/* Koden her bruker en Søke algoritme som sjekker navnet er ok mellom nevnet søk*/
function invalidUid($username) {
    $result;
    if (!preg_match('#^[a-zA-Z0-9]*$#', $username)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;

}

/*Koden under sjekker om epost er korrekt. PHP har en filter som gjør dette */
function invalidEmail($email) {
    $result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;

}

/*Koden under gjør at begge passord blir sjekket. Hvis de ikke er samme passord, error popper opp*/
function pwdMatch($pwd, $pwdRepeat) {
    $result;
    if ($pwd !== $pwdRepeat) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;

}

/*Koden under kobler seg til selve database ved å bruke SQLi statements.
? er en placeholder, fordi hvis data blir sendt direkte til database, mulig angrep som SQL injection kan ødelegge database.
Data først blir sendt til database og etterpå data i felter er fylt inn, 2 prosedyrer.
Prepared Statements er brukt fordi de sikrer imot SQL injections.
if (!mysqli_stmt_prepare($stmt, $sql)) sjekker om den statement skal feile eller ikke, så hvis de gjør, vi går tilbake til signup.
under exit(), den koden letter etter statement, type data, og dataen som er innført.
resultData tar data med brukernavn fra database, if statement sjekker om data kommer tilbake fra database.*/
function uidExists($conn, $username, $email) {
   $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;";
   $stmt = mysqli_stmt_init($conn);
   if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: ../signup.php?error=stmtfailed");
        exit();
   }

   mysqli_stmt_bind_param($stmt, "ss", $username, $email);
   mysqli_stmt_execute($stmt);

   $resultData = mysqli_stmt_get_result($stmt);

   if ($row = mysqli_fetch_assoc($resultData)) {
    return $row;
   }
   else {
       $result = false;
       return $result;
   }

   mysqli_stmt_close($stmt);
}
/* Koden funker på nesten samme måte som denne på toppen. 
Endringer er: vi bruker INSERT INTO database (brukernavn, epost, passord, osv).
Hvis data feilet å bli bekreftet, du blir tatt tilbake til login.
Hash pass er brukt for å sikre imot unønsket tilgang "hacking" og gjør passord til rare mange tegn. Hvis passord er cracked, PHP automatisk gjøre prosessen på nytt for å sikre systemet igjen.
Data er endret til 4 s fordi vi har 4 data nå.
Data er sjekket og hvis det er riktig, du har laget bruker.*/
function createUser($conn, $name, $email, $username, $pwd) {
    $sql = "INSERT INTO users (usersName, usersEmail, usersUid, usersPwd) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
     header("location: ../signup.php?error=stmtfailed");
         exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
 
    mysqli_stmt_bind_param($stmt, "ssss",  $name, $email, $username, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../signup.php?error=none");
         exit();
 }

 /*Koden sjekker om det er tømme felter i input. Hvis ikke, fortsett videre. */
 function emptyInputLogin($username, $pwd) {
    $result;
    if (empty($username) || empty($pwd)) {
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;
}

/*Koden sjekker om info er riktig, ved laget SuperGlobal. */
function loginUser($conn, $username, $pwd) {
    $uidExists = uidExists($conn, $username, $username);

    if ($uidExists === false) {
        header("location ../login.php?error=wronglogin");
        exit();
    }
    /*Koden sjekker om både passord og hashpassord er samme.
    Hvis ikke, login error. */
    $pwdHashed = $uidExists["usersPwd"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if ($checkPwd === false) {
        header("location ../login.php?error=wronglogin");
        exit();
    }
    /*Session er informasjon du får tak i hvor som helst på nettsiden, så lenge en session er aktiv.  
    Session må først bli laget.*/
    else if ($checkPwd === true) {
        session_start();
        $_SESSION["userid"] = $uidExists["usersId"];
        $_SESSION["useruid"] = $uidExists["usersUid"];
        header("location: ../index.php");
        exit();
    }
}


