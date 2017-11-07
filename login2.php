<?php
session_start();
extract($_POST);

$info = file("credentials.config");

//Explode login verification
for ($i = 0; $i < count($info); ++$i){
    $login = explode(", ", $info[$i]);
    $login_trim = array_map('trim', $login);
    $emailMatch[$i] = $login_trim[0];
    $passwordMatch[$i] = $login_trim[1];
}

//Verifies if user's credentials
for($j = 0; $j<count($emailMatch); ++$j) {
    if ($email == $emailMatch[$j] && $password == $passwordMatch[$j]) {
        $_SESSION['login'] = true;
        //Redirects if credentials match
        header("Location: index.php"); 
        //Stops at redirect if matches, otherwise redirects back into login page
        die();
    }
}

//Redirects to login page if credentials didn't match. Also displays invalid message.
header("Location: login.php?invalid=invalid login credentials");
    die();


?>
