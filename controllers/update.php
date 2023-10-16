<?php /* to modify existing data in the database */

session_start();

# if not logged in, redirect to login page
if(!$_SESSION["loggedin"]) {
    header("Location: localhost/login.html");
    exit();
}

if (isset($_REQUEST['update'])) {
    $username = $_SESSION['USERNAME'];
    $artist = $_POST['artist'];
    $song = $_POST['song'];
    $rating = $_POST['rating'];

    # UPDATE query
    $sql = "UPDATE `ratings`
            SET `rating`='$rating'
            WHERE `username`='$username', `artist`='$artist', `song`='$song'";

    # error handling
    $result = $conn->query($sql);
    if ($result == TRUE) {
        echo "Successfully updated rankings.";
    } else {
        echo "Error: " . $sql . "</br>" . $conn->error;
    }
}

?>