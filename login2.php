<?php
extract($_POST);
session_start();

$info=file("./credentials.config");


for ($pair=0; $pair<count($info); ++$pair) {
    $pair_array = explode(", ",$info[$pair]);
    $pair_array_trim=array_map('trim',$pair_array);
    $mail[$pair]=$pair_array_trim[0];
    $pass[$pair]=$pair_array_trim[1];
}

for($check=0; $check<count($mail); ++$check) {
    if ($email == $mail[$check] && $password == $pass[$check]) {
        $_SESSION['login'] = true;
        header("Location: index.php"); die();
    }
}

header("Location: login.php?invalid=Invalid login credentials"); die();

?>