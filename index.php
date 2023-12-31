<?php
session_start();

include "config.php";
?>


<!DOCTYPE html>
<html lang='en'>

<!--
    Header:
        meta,
        title,
        link to css style sheet,
-->
<head>
    <meta charset='utf-8' />
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta name="description" content="Welcome to Your Music Rater! From this page, learn more about the website and navigate the charts and reviews. Start your music critic journey here!">
    <title>Your Music Rater - Welcome</title>
    <link rel="preload stylesheet" as="style" href='index.css'/>
    <link rel="stylesheet" href="iconfontstyle.css"/>
</head>

<!--
    Body:
        header,
            navbar logo
            searchbar
            navlinks/menu
        hero section pt 1,
        hero section pt 2,
        charts section,
        about us section,
        faqs section,
        contacts section,
        footer,
        .js scripts,
-->
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
                <li><a href='index.html'>Home</a></li>
                <li><a href='#charts'>Charts</a></li>
                <li><a href='#aboutsection'>About</a></li>
                <li><a href='#faqsection'>FAQs</a></li>
                <li><a href='#contactsection'>Contact</a></li>
                <li><span id="hamburger" class='icon-bars-solid'></span></li>
                <li><a href="signup.php">

                    <?php if (! $_SESSION["loggedin"]): ?>
                    <span id="account-btn" class='icon-user-solid'></span>
                    <?php else: ?>
                        <?php echo $_SESSION["username"]; ?>
                    <?php endif; ?>

                </a></li>
            </ul>
        </nav>
    </header>

    <!-- homepage part 1, hero section -->
    <section class="homepage" id="home">
        <div class="content flex">
            <img src="assets/monkeyband.webp" alt="Band of monkeys" id="hpimg">
            <div class="text">
                <h1>The perfect complement</h1>
                <p>to anyone who enjoys music! Share your favorite songs, hear what friends say
                   about the latest albums, and get recommendations for your next favorite playlist.
                </p>
            </div>
        </div>
    </section>

    <!-- homepage part 2, useage section -->
    <section class="use" id="usesection">
        <div class="container">
            <div class="use-title">
                <h1>Simple and easy to use</h1>
                <p>with a free online account.</p>
            </div>
            <!--
                cards containing image and text, placed in a flexbox that
                can be adjusted horizontally or vertically depending on the
                screen dimensions
            -->
            <ul class="cards flex">
                <li class="card">
                    <img src="assets/search.webp" alt="Search for song">
                    <h2>Find a song!</h2>
                </li>
                <li class="card">
                    <img src="assets/rate.webp" alt="Review the song">
                    <h2>Give it stars!</h2>
                </li>
                <li class="card">
                    <img src="assets/review.webp" alt="Rate the song">
                    <h2>Write a review!</h2>
                </li>
            </ul>
        </div>
    </section>

    <!-- homepage pt 2, charts section -->
    <section class="charts" id="charts">
        <div class="container">
            <div class="chart-title">
                <h1>Charts</h1>
                <p>The top and trending songs of the month</p>
            </div>
            <div class="chart-flex">
                <!--
                    each chart consists of a title and an iframe where the
                    title dictates what the chart is about and the iframe
                    contains another html page with songs and their ratings
                -->
                <div class="chart">
                    <div class="chart-head">
                        <p>Top Songs</p>
                    </div>
                    <iframe src="charts.html" title="top-songs"></iframe>
                </div>
                <div class="chart">
                    <div class="chart-head">
                        <p>Trending Songs</p>
                    </div>
                    <iframe src="charts.html" title="trending-songs"></iframe>
                </div>
            </div>
        </div>
    </section>

    <!-- about us section -->
    <section class="about" id="aboutsection">
        <div class="container">
            <div class="about-title">
                <h1>About Us</h1>
                <p>Welcome to our music-loving corner of the internet! As two people
                    who are passionate about music, we believe that music is a
                    universal language that should be shared, celebrated, and
                    enjoyed by all. It is this belief that inspired us to create
                    this online platform.
                </p>
            </div>

            <div class="row info">
                <h2>Our Story</h2>
                <p>Our journey began with a shared love for music across different
                    genres. We understand that music has the extraordinary power
                    to connect people, evoke emotions, and create lasting
                    friends. This has been true in our lives and in the lives of
                    our many friends and family, and we want to make this possible
                    for others too.
                </p>

                <h2>Our Vision</h2>
                <p>With this in mind, we wanted to create a space where music
                    ethusiasts can come together. Our website is a place where you
                    can rate and share your favorite songs, discover music loved
                    by others, and make friends. Your ratings help others
                    discover hidden gems, and likewise, you get to find songs
                    that like-minded music lovers enjoy. Add friends with whom you
                    share the same taste in music and listen to some songs
                    together!
                </p>
            </div>

            <div class="row team">
                <h2>Our Team</h2>
                <ul>
                    <li>Ryan Kobayashi</li>
                    <li>Haoran Xu</li>
                </ul>
            </div>
        </div>
    </section>


    <!-- frequently asked section -->
    <section class="frequentlyasked" id="faqsection">
        <div class="container">
            <div class="faq-title">
                <h1>Frequently Asked Questions</h1>
            </div>
            <div class="question-container">
                <details class="question">
                    <summary>How does the rating system work on this website?</summary>
                    <p>For every song, users can rate the song from one to five stars.
                        They can also write a review for the song to further boost the visibility
                        of their rating!
                    </p>
                </details>
                <details class="question">
                    <summary>Why use this app as opposed to another music rating app on the internet?</summary>
                    <p>With our app, you can rate music, customize your profile, create
                        custom playlists depending on your favorite songs, and listen to
                        music with friends in a listening party! Our music rating app
                        is both a central place for your songs and a social place for
                        you and your friends.
                    </p>
                </details>
                <details class="question">
                    <summary>Where do I start?</summary>
                    <p>It's super easy to get started! Just hit the sign up
                        button in the top right corner and rate away!
                    </p>
                </details>
                <details class="question">
                    <summary>How do I add friends?</summary>
                    <p>Your main feed has curated music ratings that fit your
                        preferred music tastes! If you see a review you like or
                        one that resonates with you, you can click on the profile
                        name next to the review! This will take you to the reviwer's
                        profile page where you can add them as friends!
                </details>
                <details class="question">
                    <summary>I have a question or feedback. How do I reach out?</summary>
                    <p>Go to the Contact Us section at the bottom of the home page.
                        There, you write your question or feedback and we'll read it!
                    </p>
                </details>
            </div>
        </div>
    </section>

    <!-- contacts section-->
    <section class="contact" id="contactsection">
        <div class="container">
            <div class="contact-title">
                <h1>Contact Us</h1>
                <p>We're here to hear from you! Whether you have questions, suggestions,
                    or just wnat to share your thoughts about the website, we're all ears.
                    Feel free to drop us a message and we'll get back to you as
                    soon as possible. Your feedback matters, and we can't wait to hear
                    from you!
                </p>
            </div>
            <div class="row flex">
                <!-- contact and general information -->
                <div class="col information">
                    <div class="contact-details">
                        <p>
                            <i class="icon-location-dot-solid"></i>
                            45 Wyllys Avenue, Middletown, CT 06457
                        </p>
                        <p><i class="icon-envelope-solid"></i> info@yourmusicrater.com</p>
                        <p><i class="icon-phone-solid"></i> (123) 456-7890</p>
                        <p><i class="icon-user-solid"></i> www.yourmusicrater.com</p>
                    </div>
                </div>
                <!-- form for users to send an email -->
                <div class="class form">
                    <form action="#">
                        <input type="text" placeholder="Name*" required>
                        <input type="email" placeholder="Email*" required>
                        <textarea placeholder="Message*" required></textarea>
                        <button id="submit" type="submit">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer">
        <div class="container">
            <span>Copyright (c) 2023 All Rights Reserved Your Music Rater</span>
        </div>
    </section>

    <!-- script for hamburger functionality in mobile mode -->
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script>
        $('#hamburger').click(function(){
            $('.navlinks a').toggleClass("show");
        });
    </script>

</body>

</html>