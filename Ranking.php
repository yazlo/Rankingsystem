<!DOCTYPE html>
<?php
    $winner;
    $loser;
    
    define("DB_SERVER", "localhost");
    define("DB_USER", "root");
    define("DB_PASSWORD", "");
    define("DB_NAME", "Rankingsystem");

    $dbh = new PDO('mysql:dbname=' . DB_NAME . ';host=' . DB_SERVER . ';charset=utf8', DB_USER, DB_PASSWORD);

    $sql = "SELECT * FROM toplist WHERE namn='{$_GET["winner"]}'";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    $temp = $stmt->fetchAll();
    $winner=$temp["ranking"];

    $sql = "SELECT * FROM toplist WHERE namn='{$_GET["loser"]}'";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    $temp = $stmt->fetchAll();
    foreach($temp as $asd){
        $asd["ranking"]=$loser;
    }
    var_dump($winner);
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
                
                $x=1;
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
                <td>
                    <input type="text" name="winner">
                </td>
                <td>
                    <p>won over</p>
                </td>
                <td>
                    <input type="text" name="loser">
                </td>
                <td>
                    <input type="submit" name="action" Value="Add">
                </td>
            </tr>
        </form>
        </table>
        </div>        
    </body>
</html>
