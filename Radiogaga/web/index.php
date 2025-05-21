<?php
include("../inc/functions.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage/radioWRLD</title>
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

    
        <video class="background-video" src="../videos/RadioWRLDbackground.mp4" autoplay loop poster="../img/yachty.jpg"></video>
   </header>      
<div class="container">
    <div class="text-box">
        <h1>Welkom bij Radio WRLD</h1>
        <p>Dit is mijn website over muziek die ik luister in het dagelijks leven!</p>
    </div>
</div>

</body>
</html>