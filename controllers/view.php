<?php /* to view details about a single rating */

session_start();

# if not logged in, redirect to login page
if(!$_SESSION["loggedin"]) {
    header("Location: $root/login.php");
    exit();
} else {
    include "config.php";
    echo '<p>You are logged in as user: ' . $_SESSION["username"] . '</p>';
}
echo '<a href="logout.php">Log Out</a>';

$rating_id = $_GET['id'];
$sql = "SELECT * FROM `ratings` WHERE `id`='$rating_id'";
$result = mysqli_query($conn, $sql);
if ($result) {
    $row = mysqli_fetch_assoc($result);
    $username = $row['username'];
    $artist = $row['artist'];
    $song = $row['song'];
    $rating = $row['rating'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset='utf-8' />
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta name="description" content="See the newest song rantings by users of Your Music Rater!">
    <title>Your Music Rater - Ratings</title>
    <link rel="stylesheet" href="../iconfontstyle.css"/>
</head>

<body>
    <header>
        <nav class="navbar container flex">
            <!-- TODO: replace with an actual logo down the line -->
            <h1 id='navlogo' class='logo'>
                <span class='name'>Your Music Rater</span>
                <span class='logoicon'>&#127925;</span>
            </h1>
            <div class="searchbar">
                <input type="search" placeholder="Search">
                <span class="fa fa-search"></span>
            </div>
            <!-- TODO: bug with onle one nav link showing up in mobile mode-->
            <ul class="navlinks flex">
                <li><a href='../index.html'>Home</a></li>
                <li><a href='../charts.html'>Charts</a></li>
                <li><a href='../index.html#aboutsection'>About</a></li>
                <li><a href='../index.html#faqsection'>FAQs</a></li>
                <li><a href='../index.html#contactsection'>Contact</a></li>
                <li><span id="hamburger" class='icon-bars-solid'></span></li>
                <li><span id="account-btn" class='icon-user-solid'></span></li>
            </ul>
        </nav>
    </header>

    <h1>Viewing Rating</h1>
    <p>Username</p>
    <b><?php echo $username; ?></b>
    <p>Artist</p>
    <b><?php echo $artist; ?></b>
    <p>Song</p>
    <b><?php echo $song; ?></b>
    <p>Rating</p>
    <b><?php echo $rating; ?></b>
    <p></p>

    <?php echo '<a href="read.php">Back</a>'; ?>

<body>