<!DOCTYPE html>
<html>

<head>
    <title>Strat3gy</title>
    <link rel="stylesheet" type="text/css" href="/basic.css">
    <link rel="stylesheet" type="text/css" href="home.css">
</head>
<body>
<h1 class="page_tittle">Strat3gy</h1>
<hr>
<!-- connecting to the database--->
<?php
require_once '../dbconfig.php';
//connect to the databse and display
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $sql="SELECT game_id,game_title, game_date, game_developer, game_image
        FROM game
        ORDER BY game_id
    ";
    $q= $pdo -> query($sql);
    $q -> setFetchMode(PDO::FETCH_ASSOC);
} catch (PDOException $pe) {//if fails
    die("Could not connect to the database $dbname :" . $pe->getMessage());
}
?>
<!--the link to other sub-pages-->
<nav>
    <a href="../Search/search.html">Search</a>
    <a href="../Profile/profile.html">Profile</a>
    <a href="../About/about.html">About</a>
    <a href="../Login/login.html">Login</a>
    <a href="../Register/register.html">Register</a>
</nav>
<br>

<!--Table of games-->
<table class="game_table">
    <!--The titles of the table-->
    <tr>
        <th>Game</th>
        <th>Date</th>
        <th>Developer</th>
    </tr>
    <!--running php while loop printing all from the databse out-->
    <?php while($element = $q->fetch()):?>
        <tr>
            <!--<?php echo htmlspecialchars($element['game_id'])?>-->
            <td><?php echo htmlspecialchars($element['game_title'])?>
            <?php echo htmlspecialchars($element['game_image'])?>
            </td>    
            <td><?php echo htmlspecialchars($element['game_date']) ?></td>
            <td><?php echo htmlspecialchars($element['game_developer']) ?></td>
        </tr>
    <?php 
    //get the latest id of the game
    $latestid=htmlspecialchars($element['game_id']);
    endwhile;
    ?>
</table>
<br>
<!--Form for testing adding into database-->
<!--Did put 'few' css in there -->
<form action="" method="get">
    <fieldset>
        <div class="game_form">
            <legend>Add game</legend>
            <table>
                <tr>
                    <td class="lbl"><label for="title">Title</label></td>
                    <td><input class="fld" name="title" type="text"></td>
                </tr>
                <tr>
                    <td class="lbl"><label for="date">Date</label></td>
                    <td><input class="fld" name="date" type="date"></td>
                </tr>
                <tr>
                    <td class="lbl"><label for="developer">Developer</label></td>
                    <td><input class="fld" name="developer"type="text"></td>
                </tr>
                <tr>
                    <td class="lbl"><label for="image">Image</label></td>
                    <td><input class="fld" name="image"type="text"></td>
                </tr>
            </table>
            <br>
            <input style="width: 100px "name ="submit" id="submitbutton"type="submit"value="Add"/>
        </div>
    </fieldset>
</form>
<br><hr> 
<!--Footer of the pages-->
<footer style="color:gray">
    <h3>Contact</h3>
    <p>E-mail: david778933@gmail.com</p>
    <p>Copy right:</p>
    <p>Privacy:</p>
    <a href="/Login/login.html">Login</a><p></p>
    <a href="/Register/register.html">Register</a>
</footer>

</body>

<!--Check if the submit button is click-->
<?php
    try{
        if(isset($_GET["submit"])){
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql="ALTER TABLE game AUTO_INCREMENT = $latestid";
            //reset the autoincrement
            $pdo->exec($sql);
            $sql="INSERT INTO game(game_title,game_date, game_developer, game_image)
            VALUES ('$_GET[title]','$_GET[date]','$_GET[developer]','$_GET[image]')
            ";
            $pdo->exec($sql);
            header("Location: /Home/");
        }
    } catch (PDOException $pe) {//if fails
        die("ERROR");
    }
?>


</html> 

<!--
    To Do list:
        -if the login is sucessful -> only display Profile
            =>No login nor reigster and vice versa
-->