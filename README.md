# About

**Your Music Rater** is a simple website designed for music enthusiasts to rate
their favorite songs and share them with others. This repository contains the
necessary HTML and CSS files to create the static landing page for this website.

# Files
* **Landing Page**: The main page is `index.php`.
* **Top Songs**: The second page, which is used within iframes, is `charts.html`.
* `controllers/`: A directory that contains all the relevant PHP files for CRUD fuctionality.
* `login.php`/`signup.php`: Implements login and signup functionality, along with token authentication and session tracking.
* `config.php`: Establishes a connection to the database server.



# Assets
All images used in the website are stored in the `assets/` directory. Additionally,
unique font icons are also located in this directory.

# Setting Up the Development Environment
To run the code on a local environment, set up a local database using phpMyAdmin and
XAMPP with MySQL Database and Apache Web Server.

![Screenshot 2023-10-18 at 2 54 12 AM](https://github.com/ryan-kobayashi/music-rater/assets/91140371/0affa9bf-ac73-49d3-b6f3-269dc926256b)
*image of the phpMyAdmin interface*

Set up your MySQL database to contain two tables, one of which stores the `users` and the other which stores the `ratings`.

![Screenshot 2023-10-18 at 2 53 02 AM](https://github.com/ryan-kobayashi/music-rater/assets/91140371/82e54910-dc94-47dd-b65c-4e30839f17ca)
![Screenshot 2023-10-18 at 2 53 36 AM](https://github.com/ryan-kobayashi/music-rater/assets/91140371/fc200dd3-3221-4143-ae94-930090c88e8e)
*table structure for `users` table and `ratings` table*

`username` is a primary key for the `users` table and a foreign key for the `ratings` table. Move any relevant code and files inside the `htdocs/` directory, which can be found as a subdirectory of where XAMPP is installed.

# Useage
To run the code and preview the website on your local machine:
1. Make sure all prerequisities are satisfied, such as installing any relevant software.
2. Clone this repository into `htdocs/`.
3. Open XAMPP and run MySQL Database and Apache Web Server.
4. Navigate to the appropriate URLs in a browser.


# Authors
* Steven Xu
* Ryan Kobayashi

*Work distribution: 50/50*

---

*This site was designed and published as part of the COMP 333 Software Engineering class at Wesleyan University. This is a training exercise.*
