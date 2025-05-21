<?php
/**
 * deze function maakt connectie met de database
 */
function db_connect()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "radiogaga";
 
    // maakt connectie
    $conn = new mysqli($servername, $username, $password, $dbname);
    //controleert de connectie
    if ($conn->connect_error)
    {
        die("connection failed: " . $conn->connect_error);
       
    }
    return $conn;
}
 
//Dit is voor de playlistpagina.
//dit is voor het tonen van alle albums
function displayAlbums()
{
    $albums = getAlbums();
   
    echo "<div class='albums'>";
    foreach($albums as $album)
    {
        ?>
        <div class="Album1">
        <div class="Album2">
            <div>
            <h2><?php echo$album["albumTitle"];?></h2>
                <a href="playlist.php?albumId=<?php echo$album["albumId"];?>"><img src="../img/<?php echo$album["albumImage"];?>" alt=""></a>
            </div>
            <div><?php echo$album["albumDetails"];?></div>
        </div>
    </div>
        <?php
 
    }
    echo "</div>";
}
 
function getAlbums()
{
    $conn = db_connect();
    $sql = "SELECT * FROM albums";
    $resource = $conn->query($sql) or die($conn->error);
    $albums = $resource->fetch_all(MYSQLI_ASSOC);
    return $albums;
}
 
//Dit is voor de Detailpagina.
//Dit is de functie waarin hij gegevens oproept van 1 enkel album.
function displayalbum()
{
    $album = getalbum();
    //dd($album)
    ?>
    <div class="playlist-container">
    <h2><?php echo $album["albumTitle"];?></h2>
    <video controls>
    <source src="../videos/<?php echo $album['albumVid'];?>">

</video>
    <table>
        <thead>
            <tr>
                <th>track Id</th>
                <th>track Title</th>
                <th>track Duration</th>
                <th>track Play</th>
            </tr>
        </thead>
        <tbody>
 
            <?php
       
        // start een lus om alle nummers te zien
        foreach($album['tracks'] as $track)
        {
            ?>
            <tr>
                <td><?php echo $track["trackId"];?></td>
                <td><?php echo $track["trackTitle"];?></td>
                <td><?php echo formatTime( $track["trackDuration"]);?></td>
                <td><audio src="../audio/<?php echo $track["trackFile"];?>" controls></audio></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>

    </div>
    <?php
}
 
//dd($album); deze function pakt de info van 1 album
function getalbum()
{
    $conn = db_connect();
    if(isset($_GET['albumId']) && is_numeric(value: $_GET['albumId']))
    {
        $sql = "SELECT * FROM albums WHERE albumId=".$_GET["albumId"];
    }
    elseif(isset($_GET['albumId']) && !is_numeric(value: $_GET['albumId']))
    {
        return null;
    }
    else
    {
        $sql = "SELECT * FROM albums ORDER BY RAND() LIMIT 1";
    }
    // Neemt een albumId om info te krijgen
    $resource = $conn->query($sql) or die($conn->error);
    $album = $resource->fetch_assoc();
    // Pakt alle nummers van de album
    $tracks = getTracks($album['albumId']);
    // voegt de array nummers toe om een album te arrayen
    $album['tracks'] = $tracks;
    return $album;
   
}
 
function getTracks($albumId)
{
    // pakt de tracks van de gekozen album
    $conn = db_connect();
    $sql = "SELECT * FROM tracks WHERE albumId = " . $albumId;
    $resource = $conn->query($sql) or die($conn->error);    
    $tracks = $resource->fetch_all(MYSQLI_ASSOC);
    return $tracks;
}
 
 //Dit is voor debuggen
function dd($var)
{
    echo "<pre style='background-color:#fff;color:#000;'>";
    var_dump($var);
    echo "</pre>";
}
 
//Dit rekent de tijd om van seconden naar minuten
function formatTime($seconds) {
    // Zorg dat de input een geheel getal is
    $seconds = intval($seconds);
 
    // Bereken het aantal minuten
    $minutes = floor($seconds / 60);
 
    // Bereken het aantal seconden dat overblijft na het omzetten naar minuten
    $remainingSeconds = $seconds % 60;
 
    // Zorg dat de seconden altijd twee cijfers hebben met leading zeros
    $formattedSeconds = str_pad($remainingSeconds, 2, "0", STR_PAD_LEFT);
 
    // Combineer minuten en seconden in het MM:SS formaat
    return $minutes . ":" . $formattedSeconds;
}



function getPopular_artists()

{
    $conn = db_connect();
    $sql = "SELECT * FROM `popular_artists`";
    $resource = $conn->query($sql) or die($conn->error);
    $Popular_artists = $resource->fetch_all(MYSQLI_ASSOC);
    return $Popular_artists;
}
 
//Dit is voor de Detailpagina.
//Dit is de functie waarin hij gegevens oproept van 1 enkel Popular_artists.
function displayPopular_artists()
{
    $Popular_artists = getPopular_artists();
    //dd($Popular_artists)
    ?>

    <table border="1">
        <thead>
            <tr>
                <th>artist Id</th>
                <th>artist Name</th>
                <th>genre</th>
                <th>debut Year</th>
                <th>country</th>
                <th>notable Work</th>
                <th>youtube Link</th>
            </tr>
        </thead>
        <tbody>
 
            <?php
       
        // start a loop to show all tracks
        foreach($Popular_artists as $popartist)
        {
            ?>
            <tr>
                <td class="artist-table-td"><?php echo $popartist["artist_id"];?></td>
                <td class="artist-table-td"><a href="<?php echo $popartist["wikipedia_link"]; ?>" target="_blank"><?php echo $popartist["artist_name"]; ?></a></td>
                <td class="artist-table-td"><?php echo $popartist["genre"];?></td>
                <td class="artist-table-td"><?php echo $popartist["debut_year"];?></td>
                <td class="artist-table-td"><?php echo $popartist["country"];?></td>
                <td class="artist-table-td"><?php echo $popartist["notable_work"];?></td>
                <td class="artist-table-td"><a href="<?php echo $popartist["youtube_link"];?>" target="_blank"><img src="../img/YouTubeLogo.png" alt="YouTube logo" width="90" height="50"></a></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
    <?php
}

function getArtists()

{
    $conn = db_connect();
    $sql = "SELECT * FROM `artists`";
    $resource = $conn->query($sql) or die($conn->error);
    $Artists = $resource->fetch_all(MYSQLI_ASSOC);
    return $Artists;
}
 
//Dit is voor de Detailpagina.
//Dit is de functie waarin hij gegevens oproept van 1 enkel Popular_artists.
function displayArtists()
{
    $Artists = getArtists();
    //dd($Artists)
    ?>

    <table border="1">
        <thead>
            <tr>
                <th>artist Id</th>
                <th>artist</th>
                <th>Artist info</th>
                <th>top 3 </th>
            </tr>
        </thead>
        <tbody>
 
            <?php
       

        foreach($Artists as $Artist)
        {
            ?>
            <tr>
                <td class="artist-table-td"><?php echo $Artist["artistId"];?></td>
                <td class="artist-table-td"><img src="../img/<?php echo $Artist["artistImage"];?>" alt="Artiest" width="150" height="80"></a></td>
                <td class="artist-table-td">
                    <h1><?php echo $Artist["artistName"];?></h1>
                    <p><?php echo $Artist["artistDetails"];?></p>
                </td>
                <td class="artist-table-td">
                    <ul>
                        <li><?php echo $Artist["artistTop1"];?></li>
                        <li><?php echo $Artist["artistTop2"];?></li>
                        <li><?php echo $Artist["artistTop3"];?></li>
                    </ul>
                </td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
    </div >
    </div>
    <?php
}


function getNav()

{
    $conn = db_connect();
    $sql = "SELECT * FROM `nav`";
    $resource = $conn->query($sql) or die($conn->error);
    $Nav = $resource->fetch_all(MYSQLI_ASSOC);
    return $Nav;
}
 

function displayNav()
{
    $Nav = getNav();
    //dd($Nav)
    ?>
  <nav id="main-nav"></nav>
  <ul>

 
            <?php
       

        foreach($Nav as $Navbar)
        {
            ?>
          
                    <li><a href="<?php echo $Navbar["navUrl"];?>"><?php echo $Navbar["navTitle"];?></a></li>     
           
            <?php
        }
        ?>
     </ul>
     </nav>
    <?php
}