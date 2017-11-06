<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Math Game</title>
        <link rel="stylesheet" href="css/bootstrap.min.css" />
        <link rel="stylesheet" href="css/style.css" type="text/css" />
    </head>
    <body>
        <div class="container-fluid all">
            <div>
                <h1 class="text-center">Please Log In To Enjoy Our Math Game!</h1>
            </div>
            <br />
            <div>
                <form role="form" method="post" action="login2.php">
                    <table>
                        <tr>
                            <td><label for="email">Email</label></td>
                            <td><input type="text" class="form-control" name="email" id="email" placeholder="E-mail"/></td>
                        </tr>
                        <tr>
                            <td><label for="password">Password:</label></td>
                            <td><input type="text" class="form-control" name="password" id="password" placeholder="Password"/></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><button type="submit" class="btn btn-primary" name="login" value="login">Login</button></td>
                        </tr>
                    </table>
                   <div>
                        <?php
                            if(!empty($_GET['invalid'])) {
                                $valid = $_GET['invalid'];
                                echo "<br /><p class='error text-center'>" . $valid . "</p>";
                            }
                        ?>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>