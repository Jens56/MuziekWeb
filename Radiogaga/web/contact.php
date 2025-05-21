<?php
include("../inc/functions.php");

?>

<?php
// Variabelen
$gender = $voornaam = $tussenvoegsel = $achternaam = $email = $day = $month = $year = $extra_info = '';

// Verwerk formuliergegevens als het formulier is ingediend
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verzamel formuliergegevens
    $gender = $_POST['operator'] ?? ''; // Operator
    $voornaam = $_POST['Voornaam'] ?? ''; // Voornaam
    $tussenvoegsel = $_POST['tussenvoegsel'] ?? ''; // Tussenvoegsel
    $achternaam = $_POST['Achternaam'] ?? ''; // Achternaam
    $email = $_POST['email'] ?? ''; // E-mail
    
    $day = $_POST['day'] ?? ''; // Dag
    $month = $_POST['month'] ?? ''; // Maand
    $year = $_POST['year'] ?? ''; // Jaar
    $geboortedatum = $day . "-" . $month . "-" . $year; // Geboortedatum samenstellen
    $extra_info = $_POST['Extra_info'] ?? ''; // Extra info
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contactpagina</title>
    <link rel="stylesheet" type="text/css" href="../css/RadioWRLD.css">
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

<div class="contact-page">
    <form method="post" action="">
        <ul>
            <li>
                <label>Gender</label>
                <select name="operator" required>
                    <option value=""></option>
                    <option value="Man">man</option>
                    <option value="Vrouw">vrouw</option>
                    <option value="wil liever niet zeggen">wil liever niet zeggen</option>
                </select>
            </li>
            <li>
                <label>Voornaam</label>
                <input type="text" name="Voornaam" placeholder="Voornaam" required>
            </li>
            <li>
                <label>Tussenvoegsel</label>
                <input type="text" name="Tussenvoegsel" value="" placeholder="Tussenvoegsel">
            </li>
            <li>
                <label>Achternaam</label>
                <input type="text" name="Achternaam" value="" placeholder="Achternaam" required>
            </li>

            <li>
                <label>E-mail</label>
                <input type="email" name="email" value="" placeholder="email" required>
            </li>
            <li>
                <label for="day">Dag:</label>
                <input type="number" id="day" name="day" min="1" max="31" value="" placeholder="Dag" required>
                
                <label for="month">Maand:</label>
                <input type="number" id="month" name="month" min="1" max="12" value="" placeholder="Maand" required>
                
                <label for="year">Jaar:</label>
                <input type="number" id="year" name="year" min="1900" value="" placeholder="Jaar" required>
            </li>
            <li>
                <label>Extra info</label>
                <input type="text" name="Extra_info" value="" placeholder="Extra info" required>
            </li>
            <li>
                <input type="submit" name="Verzenden" value="Verzenden">
            </li>
            <li>
                <input type="reset" name="reset" value="reset">
            </li>
        </ul>
    </form>
    </div>
    <?php
    // Als het formulier is verzonden, toon de ingevulde gegevens
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo "<h3>Bedankt voor het invullen $voornaam $tussenvoegsel $achternaam!</h3>";
        echo "<h3>Uw persoonlijke gegevens:</h3>";
        echo "Gender: " . $gender . "<br>";
        echo "Voornaam: " . $voornaam . "<br>";
        echo "Tussenvoegsel: " . $tussenvoegsel . "<br>";
        echo "Achternaam: " . $achternaam . "<br>";
        echo "E-mail: " . $email . "<br>";
        echo "Geboortedatum: " . $geboortedatum . "<br>";
        echo "Extra info: " . $extra_info . "<br>";
    }
    ?>


</body>
</html>