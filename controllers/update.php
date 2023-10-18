<?php /* to modify existing data in the database */

session_start();

# if not logged in, redirect to login page
if(!$_SESSION["loggedin"]) {
    header("Location: localhost/login.html");
} else {
    include "config.php";
    echo '<p>You are logged in as user: ' . $_SESSION["username"] . '</p>';
}
echo '<a href="logout.php">Log Out</a>';

if (isset($_POST['artist']) && isset($_POST['song']) && isset($_POST['rating'])) {
    $username = $_SESSION['username'];
    $artist = $_POST['artist'];
    $song = $_POST['song'];
    $rating = $_POST['rating'];

    $sql_id = "SELECT `id` FROM `ratings` WHERE `username`= ? AND `artist`= ? AND `song`= ?";
    $stmt = mysqli_prepare($conn, $sql_id);
    mysqli_stmt_bind_param($stmt, "sss", $username, $artist, $song);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_array($result);

    if ($result->num_rows == 0) {
        echo '<script type="text/javascript">
               window.onload = function () { alert("You have not rated this song. Please create a rating instead."); }
        </script>';
    } else {
        $sql = "UPDATE `ratings` SET `rating`='$rating' WHERE `id`= ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $row[0]);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($stmt) {
            echo '<script>
            alert("Update successful.");
            window.location.href="read.php";
            </script>';
        }
    }
} else {
    $rating_id = $_GET['id'];
    $sql_prepop = "SELECT * FROM `ratings` WHERE `id`= ?";
    $stmt = mysqli_prepare($conn, $sql_prepop);
    mysqli_stmt_bind_param($stmt, "s", $rating_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if ($stmt) {
        $row = mysqli_fetch_assoc($result);
        $artist = $row['artist'];
        $song = $row['song'];
        $rating = $row['rating'];
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

    <h1>Update Rating</h1>
    <p>Here you can update your ratings.</p>
    <?php echo "Username: " .$_SESSION["username"]; ?>
    <form class="form" action="update.php" method="post" id="update">
        <div class="form_input_group">
            <label>Artist</label>
            <input type="text" class="form_input" name="artist" value="<?php echo $artist?>" required>
            <label>Song</label>
            <input type="text" class="form_input" name="song" value="<?php echo $song ?>" required>
            <label>Rating</label>
            <input type="number" class="form_input" name="rating" value="<?php echo $rating ?>" min="1" max="5" required>
        </div>
        <input type="submit" value="Submit">
        <?php echo '<a href="read.php">Cancel</a>'; ?>
    </form>

<body>