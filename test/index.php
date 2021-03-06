<!DOCTYPE html>
<!--Connect to database server with permission of guest-->
<?php
$servername = "localhost";
$myDB="public_strat3gy";
$username = "guest";
$password = "";
$public_table="game_details";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$myDB", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully as a $username";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>

<html>
<head>
    <title>Strat3gy</title>
    <link rel="stylesheet" type="text/css" href="/css/core.css">
</head>

<body>

<header>
<h1>
    <a href ="/test">Strat3gy</a>
</h1>
<hr>
</header>

<!-- Navigation bar with links to different parts-->
<nav> <!--Should make them into a list-->
    <a class="btn" href="/faqs.html">FAQs</a>
    <a class="btn" href="/about.html">About us</a>
    <a class="btn" href="/search.html">Search</a>
    <a class="btn" href="/upload.html">Add game</a>
    <a class="btn" href="/login.html">Login/Profile</a>
    <a class="btn" href="/register.html">Register/Logout</a>
</nav>
<br>
<section>
    <table class="game_table">
        <thead style="text-align: center;">
            <tr>
                <th>Game</th>
                <th>Developer</th>
                <th>Date</th>
                <th>Platform</th>
                <th>Average rating</th>
                <th>Votes</th>
            </tr>
        </thead>
        <!--when add php, add inside tbody so a table is made and auto update-->
        <tbody>
            <?php
            //CONNECT TO THE TABLE
            $sql = "SELECT * FROM $public_table ORDER BY GameID";
            $run = $conn-> query($sql);
            $run -> setFetchMode(PDO::FETCH_ASSOC);
             //Looping through the table
             while ($element = $run->fetch()):?>
             <!--Printing the things out -->
             <tr>
                 <td><?php echo $element['GameName']?></td>
                 <td><?php echo $element['GameDeveloper']?></td>
                 <td><?php echo $element['DateRelease']?></td>
                 <td><?php echo $element['GamePlatform']?></td>
                 <td><?php echo $element['AverageRating']?></td>
                 <td><?php echo $element['UpVote']?></td>
             </tr>
            <!--End the loop -->
            <?php endwhile ?>
        </tbody>
    </table>
</section>


</body>


<footer>
    <p class="text_bottom" >made with the love of strategy games by<a class="btn" href="#">Ke Duong</a>and<a class="btn" href="#">Minh Bui</a></p>
</footer>


</html> 

<!--
    TO DO LIST LATER:
    **right now the link of login/profile: login.html**
    **right now the link of register/logout: logout.html**
    -function when you login -> replace Profile with Login
    -function when you login -> replace Register with Logout
    -will need cookie and session !
-->