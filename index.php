<?php session_start(); 

extract($_POST);

// Posted answer from the form
$total = $_POST['answer'];


// Count Initial
if ($_SESSION['attemptCount'] == 0){
    $_SESSION['correctCount'] = 0;
    $_SESSION['attemptCount'] = 0;
}


// determining if the user is correct and ups the counters
if ($answerField == $total && !empty($answerField)) {
    $resultMsg =  '<p class="correct">' . 'Correct' . '</p>';
    $_SESSION['correctCount'] += 1;
    $_SESSION['attemptCount'] += 1;
} else if ($answerField != $total){
    $resultMsg = '<p class="error">' . 'INCORRECT! ' . $problem . ' = ' . $answer . '</p>';
    $_SESSION['attemptCount'] += 1;
}

// error message for non-numeric and empty
if (isset($_POST['answerField']) && !is_numeric($answerField)){
    header ("Location:index.php?message=You must enter a number for your answer.");
    die();
}

?>

<html lang="en">
    <head>
        <title>Math Game</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <div class="container-fluid text-center">
            
            <!-- Title and Logout -->
            <div>
                <h1>Math Game</h1>
                <!-- Log out button -->
                <a href="logout.php"><input type="button" class="btn btn-primary" name="logout" id="logout" value="Logout"/></a>
                <br />
                <br />
            </div>

            <!-- Math Problem --> 
            <div>
                <?php
                // variables
                $num1 = rand(0,50);
                $num2 = rand(0,50);
                $operator = rand(0,1);
                $problem;
                // 0 = add, 1 = subtract
                if ($operator == 0){
                    $answer = $num1 + $num2;
                } else if ($operator == 1){
                    $answer = $num1 - $num2;
                }

                // problem to solve
                if ($operator == 0){
                    $problem = $num1 . " + " . $num2;
                } else if ($operator == 1){
                    $problem = $num1 . " - " . $num2;
                }
                echo $problem; ?>
            </div>
            
            <!-- Form Controls -->
            <div>
                <form class="form" role="form" method="post" action="index.php">
                    <input class="text-center" type="text" name="answerField" id="answerField" placeholder="Enter answer"/>
                    <input type="hidden" name="answer" id="answer" value='<?php echo $answer;?>'>
                    <input type="hidden" name="problem" id="problem" value='<?php echo $problem;?>'>
                    <br />
                    <br />
                    <input type="submit" class="btn btn-primary" name="submit" id="submit" value="Submit"/>
                </form>
            </div>
            
            <!-- Error Message-->
            <div>
                <?php
                if (!empty($_GET['message'])) {
                    $errorMSG = $_GET['message'];
                }
                // Error message
                echo '<p class="error">' . $errorMSG . '</p>'; 
                // Right or Wrong
                echo $resultMsg; 
                // Counter
                echo '<p> Score: ' . $_SESSION['correctCount'] . ' / ' . $_SESSION['attemptCount'] . '</p>'; 
                ?>
            </div>
        </div>
    </body>
</html>