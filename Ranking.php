<!DOCTYPE html>
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
                define("DB_SERVER", "localhost");
                define("DB_USER", "root");
                define("DB_PASSWORD", "");
                define("DB_NAME", "uppgifter");
                
                $dbh = new PDO('mysql:dbname=' . DB_NAME . ';host=' . DB_SERVER . ';charset=utf8', DB_USER, DB_PASSWORD);
                
                $sql = "SELECT * FROM uppgifter WHERE 1";
                $stmt = $dbh->prepare($sql);
                $stmt->execute();
                $lag = $stmt->fetchAll();
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
        <?php
        
        ?>
    </body>
</html>
