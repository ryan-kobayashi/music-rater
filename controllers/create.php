<?php /* to create new ratings in the database */

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

# obtain username from loggedin session, and rating fields from form fields
if (isset($_POST['artist']) && isset($_POST['song']) && isset($_POST['rating'])) {
    $username = $_SESSION['username'];
    $artist = $_POST['artist'];
    $song = $_POST['song'];
    $rating = $_POST['rating'];

    # check if an entry already exists
    $sql = "SELECT `id`
            FROM `ratings`
            WHERE `username`='$username' AND `artist`='$artist' AND `song`='$song'";
    $result = mysqli_query($conn, $sql);

    # if an entry exists, create popup window that notifies user to update ratings instead
    if ($result->num_rows > 0) {
        echo '<script>
               alert("You have already rated this song. Please update your rating instead.");
               window.location.href = "update.php";
        </script>';
    # if an entry does not exist, create sql query to create new entry in db
    } else {
        $sql = "INSERT INTO `ratings`(`username`, `artist`, `song`, `rating`)
                VALUES ('$username', '$artist', '$song', '$rating')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo '<script>
                   alert("New rating created successfully.");
                   window.location.href="read.php";
            </script>';
        } else { echo "Error: " . $sql . "</br>" . $conn->error; }
    }
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

    <h1>Create Rating</h1>
    <p>Here you can create a new rating.</p>
    <?php echo "Username: " .$_SESSION["username"]; ?>
    <form class="form" action="create.php" method="post" id="create">
        <div class="form_input_group">
            <input type="text" class="form_input" name="artist" autofocus placeholder="Artist" required>
            <input type="text" class="form_input" name="song" autofocus placeholder="Song" required>
            <input type="number" class="form_input" name="rating" autofocus placeholder="Rating" required min="1" max="5">
        </div>
        <input type="submit" value="Submit">
    </form>
    <?php echo '<a href="read.php">Cancel</a>'; ?>

<body>