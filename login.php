<?php
session_start();
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
        <form action="login2.php" method="post">
            <div class="container">
                <header class="content">
                    <h2 class="text-center">Login to Enjoy Our Math Game</h2>
                </header>
                <div class="row">
                    <div class="col-xs-6">
                        <label class="label-field" for="email">Email: </label>
                    </div>
                    <div class="col-xs-6">
                        <input class="login-field" type="text" id="email" name="email" placeholder="Email" autocomplete="off" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-6">
                        <label class="label-field" for="password">Password: </label>
                    </div>
                    <div class="col-xs-6">
                        <input class="login-field" type="text" id="password" name="password" placeholder="Password" autocomplete="off" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <br /><button type="submit" class="btn btn-default" name="login" value="login">Login</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <?php
                        if(!empty($_GET['invalid'])) {
                                $valid = $_GET['invalid'];
                                echo "<p class='error'>" . $valid . "</p>";
                            }
                        ?>
                    </div>
                </div>
            </div>
        </form>
    </body>
</html>