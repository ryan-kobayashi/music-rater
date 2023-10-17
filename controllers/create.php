<?php /* to create new ratings in the database */

session_start();

# if not logged in, redirect to login page
if(!$_SESSION["loggedin"]) {
    header("Location: localhost/login.html");
    exit();
}

# obtain username from loggedin session, and rating fields from form fields
if (isset($_REQUEST['submit'])) {
    $username = $_SESSION['USERNAME'];
    $artist = $_POST['artist'];
    $song = $_POST['song'];
    $rating = $_POST['rating'];

    # check if an entry already exists
    $sql = "SELECT `id`
            FROM `ratings`
            WHERE `username`='$username', `artist`='$artist', `song`='$song'";
    $result = mysqli_query($conn, $sql);

    # if an entry exists, create popup window that notifies user to update ratings instead
    if ($result->num_rows > 0) {
        echo '<script type="text/javascript">
               window.onload = function { alert("You have already rated this song. Please update your ratings instead."); }
               window.location.href = "personalratings.php";
        </script>';
    # if an entry does not exist, create sql query to create new entry in db
    } else {
        $sql = "INSERT INTO `ratings`(`username`, `artist`, `song`, `rating`)
                VALUES ('$username', '$artist', '$song', '$rating')";
        $result = mysqli_query($conn, $sql);

        if ($result == TRUE) { echo "New rating created successfully."; }
        else { echo "Error: " . $sql . "</br>" . $conn->error; }
    }
}

?>