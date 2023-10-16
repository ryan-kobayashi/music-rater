<?php /* to delete existing data in the database */

session_start();

if (isset($_REQUEST['confirm-delete'])) {
    $ratings_id = $_GET['id'];
    $sql = "DELETE FROM `ratings`
            WHERE `id`='$ratings_id'";
    $result = $conn->query($sql);
    if ($result == TRUE) {
        echo "Successfully deleted review.";
        header("Location: localhost/charts.html");
    } else {
        echo "Error: " . $sql . "</br>" . $conn->error;
    }
}


?>