<?php
include("../inc/functions.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RadioWRLD/Albums</title>
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
    
</header>   2e

<div class="main-container">
    <?php
    displayAlbums()
    ?>
     <?php
    displayalbum()
    ?>
</div>


</body>
</html>

