<?php /* to check if the user is logged in */
session_start();
if(!$_SESSION["loggedin"]) {
    header("Location: ../login.php");
    exit();
} else {
    echo '<p>You are logged in as user: ' . $_SESSION["username"] . '</p>';
}
echo '<a href="logout.php">Log Out</a>';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset='utf-8' />
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta name="description" content="See the newest song rantings by users of Your Music Rater!">
    <title>Your Music Rater - Ratings</title>
    <link rel="stylesheet" href="../style.css" />
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
                <li><a href='../index.php'>Home</a></li>
                <li><a href='../index.php#charts'>Charts</a></li>
                <li><a href='../index.php#aboutsection'>About</a></li>
                <li><a href='../index.php#faqsection'>FAQs</a></li>
                <li><a href='../index.php#contactsection'>Contact</a></li>
                <li><span id="hamburger" class='icon-bars-solid'></span></li>
                <li><span id="account-btn" class='icon-user-solid'></span></li>
            </ul>
        </nav>
    </header>

    <main>
        <?php /* to display the ratings database */
        echo '<a href="create.php">Add New Song Rating</a>';
        include "config.php";
        $sql = "SELECT * FROM `ratings`";
        $result = mysqli_query($conn, $sql);
        ?>
    </main>

    <section class = "ratings">
        <div class = "container">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Artist</th>
                        <th>Song</th>
                        <th>Rating</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                    ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['username']; ?></td>
                        <td><?php echo $row['artist']; ?></td>
                        <td><?php echo $row['song']; ?></td>
                        <td><?php echo $row['rating']; ?></td>
                        <td><?php echo '<a href="view.php?id='.$row['id'].'">View</a>'; ?>
                    <?php
                        if ($_SESSION['username'] == $row['username']) {
                            echo '<a href="update.php?id=' .$row['id'].'">Update </a>';
                            echo '<a href="delete.php?id='.$row['id'].'">Delete</a>';
                        }
                    ?>
                    <?php
                            }
                        }
                    ?>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
</html>