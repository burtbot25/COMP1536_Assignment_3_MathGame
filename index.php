<?php
session_start();
extract($_POST);

if (!isset($_SESSION['login'])) {
    header("Location: login.php"); die();
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Math Game</title>
        <link rel="stylesheet" href="style/boostrap.min.css" />
        <link rel="stylesheet" href="style/bootstrap.css" />
        <link rel="stylesheet" href="style/mathgame.css" type="text/css" />
    </head>
    <body>
        <form action="index2.php" method="post">
        <?php
            $valueOne = rand(0,50);
            $valueTwo = rand(0,50);
            $operator = rand(0,1);
            if ($_SESSION['total'] == 0){
                $_SESSION['total'] = 0;
                $_SESSION['score'] = 0;
            }
        ?>
            <div class="container">
                <div class="row">
                    <div class="col-xs-4 col-xs-offset-4">
                        <h1 class="text-center">Math Game</h1>
                    </div>
                    <div class="col-xs-4">
                        <a href="logout.php" class="btn btn-default">Logout</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-4">
                        <?php
                            echo "<p class='one'>" . $valueOne . "</p>";
                        ?>
                    </div>
                    <div class="col-xs-4">
                        <?php
                            if ($operator == 0) {
                                echo "<p>+</p>";
                            } else {
                                echo "<p>-</p>";
                            }
                        ?>
                    </div>
                    <div class="col-xs-4">
                        <?php
                            echo "<p class='two'>" . $valueTwo . "</p>";
                        ?>
                    </div>               
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <br />
                        <input type="text" name="answer" size="20" placeholder="Enter Answer" />
                    </div>
                </div>
                <div>
                    <?php
                        echo "<input type='hidden' name='valueOne' value='$valueOne' />";
                        echo "<input type='hidden' name='valueTwo' value='$valueTwo' />";
                        echo "<input type='hidden' name='operator' value='$operator' />";
                    ?>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <br />
                        <button type="submit" class="btn btn-default" name="submit" value="Submit">Submit</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <?php
                        echo "<br /><p>Score: " . $_SESSION["score"] . "/" . $_SESSION["total"] . "</p>";
                        if(!empty($_GET['error'])) {
                            $message = $_GET['error'];
                            echo "<p class='error'>" . $message . "</p>";
                        }
                        if(!empty($_GET['correct'])) {
                            $message = $_GET['correct'];
                            echo "<p class='correct'>" . $message . "</p>";
                        }
                        if(!empty($_GET['incorrect'])) {
                            $message = $_GET['incorrect'];
                            echo "<p class='error'>" . $message . "</p>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </form>
    </body>
</html>
