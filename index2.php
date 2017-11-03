<?php
extract($_POST);
session_start();

switch ($operator) {
    case 0:
        $result = $valueOne + $valueTwo;
        $text = "" . $valueOne . " %2B " . $valueTwo . "";
        break;
    case 1:
        $result = $valueOne - $valueTwo;
        $text = "" . $valueOne . " - " . $valueTwo . "";
        break;
}
if (!isset($answer) || !is_numeric($answer)) {
    header("Location: index.php?error=You must enter a number for your answer"); die();
}
if ($answer == 0) {
    if ($answer == ($result)) {
        $_SESSION["score"] = ($_SESSION["score"] + 1);
        $_SESSION["total"] = ($_SESSION["total"] + 1);
        header("Location: index.php?correct=Correct"); die();
    }
    if ($answer != ($result)) {
        $_SESSION["total"] = ($_SESSION["total"] + 1);
        header("Location: index.php?incorrect=Incorrect, " . $text . " is " . ($result)); die();
    }
}
if ($answer == ($result)) {
    $_SESSION["score"] = ($_SESSION["score"] + 1);
    $_SESSION["total"] = ($_SESSION["total"] + 1);
    header("Location: index.php?correct=Correct"); die();
}
if ($answer != ($result)) {
    $_SESSION["total"] = ($_SESSION["total"] + 1);
    header("Location: index.php?incorrect=Incorrect, " . $text . " is " . ($result)); die();
}

?>