<?php
include("../inc/functions.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Popular artists</title>
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

<div>
    <?php
    displayPopular_artists()
    ?>
</div>

</body>
</html>