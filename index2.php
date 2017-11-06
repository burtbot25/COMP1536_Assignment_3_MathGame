<?php 
session_start();


// Posted answer from the form
$total = $_POST['answer'];



// error message
if (!empty($_POST['answerField'])){
    if (!is_numeric($_POST['answerField'])) {
        header ("Location:index.php?message=You must enter a number for you answer.");
        die();
    }
} 

if (!empty($_GET['message'])) {
    $errorMSG = $_GET['message'];
}

// determining if the user is correct
if (!empty($_POST['answerField'])){
    if ($_POST['answerField'] == $total) {
        $responseMsg = "Correct";
    } else {
        $responseMsg = "INCORRECT! " . $problem . " = " . $answer;
    }
}



?>