<?php
include("../inc/functions.php");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Infopage</title>
    <link rel="stylesheet" href="../css/RadioWRLD.css">
</head>
<body>
    
<header id="header">

    <div id="logo"><a href="homepage.php"><img src="../img/RadioWRLD.png" alt="Radio WRLD"></a></div>

    <nav id="main-nav">
        <?php
        displayNav()
        ?>
    </nav>
    
</header>    


<div class="Jens"><img src="../img/Jens.png" alt="Dit ben ik"></div>

<div class="container-about-me">
    <h1>Mezelf even voorstellen!</h1>
    <br>
    <h2>Naam</h2>
    <p>Jens Ulrich</p>
    <h2>Leeftijd</h2>
    <p>18(5-6-2006)</p>
    <h2>woonplaats</h2>
    <p>Helmond</p>
    <h2>adres</h2>
    <p>Janssenstraat 8</p>
    <h2>Hobby's</h2>
    <p>Ik game graag. Ik voetbal graag met vrienden en ik luister vaak naar muziek</p>
    <h2>top 3 favoriete sporten</h2>
    <ol>
        <li>Voetbal</li>
        <li>Motorsport</li>
        <li>Basketbal</li>
    </ol>
</div>

<div class="muzieksmaak">
    <p>Aangezien ik veel muziek luister klik hier op deze knop hieronder om te zien wat mijn favoriete albums zijn!</p>
    <a href="albums.php"><button>Albums</button></div></a>
</div>






</body>
</html>