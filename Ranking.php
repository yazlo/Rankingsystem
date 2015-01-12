<!DOCTYPE html>
<?php
session_start();
$winner;
$loser;
$win;
$lose;

define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_NAME", "Rankingsystem");

$dbh = new PDO('mysql:dbname=' . DB_NAME . ';host=' . DB_SERVER . ';charset=utf8', DB_USER, DB_PASSWORD);

if (isset($_GET["winner"]) and $_GET["winner"]!=null) {
    $sql = "SELECT * FROM toplist WHERE namn='{$_GET["winner"]}'";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch();
    $win = $result["ranking"];

    $sql = "SELECT * FROM toplist WHERE namn='{$_GET["loser"]}'";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch();
    $lose = $result["ranking"];

    $winner = $win + ($lose / $win * 100);
    $loser = $lose - ($lose / $win * 100);

    $sql = "UPDATE `toplist` SET `ranking`='{$winner}' WHERE namn='{$_GET["winner"]}'";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();

    $sql = "UPDATE `toplist` SET `ranking`='{$loser}' WHERE namn='{$_GET["loser"]}'";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    header("Location:?");
    exit();
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css">
        <title>Rankning!</title>
    </head>
    <body>  
        <div>
            <table>
                <?php
                $sql = "SELECT * FROM toplist ORDER BY ranking DESC";
                $stmt = $dbh->prepare($sql);
                $stmt->execute();
                $lag = $stmt->fetchAll();

                $x = 1;
                foreach ($lag as $saker) {
                    echo "<tr>";
                    echo "<td>";
                    echo $x;
                    echo "</td>";
                    echo "<td>";
                    echo $saker["namn"];
                    echo "</td>";
                    echo "<td>";
                    echo $saker["ranking"];
                    echo "</td>";
                    echo "</tr>";
                    $x++;
                }
                ?>       
                <form>
                    <tr>
                        <?php
                        if (isset($_GET["username"])) {
                            $sql = "SELECT * FROM login WHERE username='{$_GET["username"]}' AND password='{$_GET["password"]}'";
                            $stmt = $dbh->prepare($sql);
                            $stmt->execute();
                            $result = $stmt->fetch();
                        }
                        if (isset($_GET["action"])) {
                            if (strlen($result[0]) > 0 && isset($result[0]) && $_GET["action"] == "Login") {
                                $_SESSION["loggedin"] = 1;
                            } else {
                                $_SESSION["loggedin"] = null;
                            }
                        }
                        if (isset($_GET["Logout"])) {
                            $_SESSION["loggedin"] = null;
                        }
                        if(isset($_SESSION["loggedin"])){
                            if ($_SESSION["loggedin"] == 1) {
                                echo "<td>";
                                echo "<input type='text' name='winner'>";
                                echo "</td>";
                                echo "<td>";
                                echo "<p>won over</p>";
                                echo "</td>";
                                echo "<td>";
                                echo "<input type='text' name='loser'>";
                                echo "</td>";
                                echo "<td>";
                                echo "<input type='submit' name='action' Value='Add'>";
                                echo "</td>";                        
                        }
                            ?>
                </form>
                <form>
                        <?php
                            echo "<tr>";
                            echo "<td>";
                            echo "<input type='submit' name='Logout' Value='Logout'>";
                            echo "</td>";
                            echo "</tr>";
                        } else {
                            echo "<td>";
                            echo "<p>Username:</p>";
                            echo "</td>";
                            echo "<td>";
                            echo "<p>Password:</p>";
                            echo "</td>";
                            echo "<tr>";
                            echo "<td>";
                            echo "<input type='text' name='username'>";
                            echo "</td>";
                            echo "<td>";
                            echo "<input type='password' name='password'>";
                            echo "</td>";
                            echo "<td>";
                            echo "<input type='submit' name='action' Value='Login'>";
                            echo "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tr>
                </form>
            </table>
        </div>        
    </body>
</html>
