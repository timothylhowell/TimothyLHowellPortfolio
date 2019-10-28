<?php
$error_message = null;
$visitor_firstname = filter_input(INPUT_POST, 'userNameFirst');
$visitor_lastname = filter_input(INPUT_POST, 'userNameLast');
$visitor_email = filter_input(INPUT_POST, 'userEmailNews');



// Validate inputs
if ($visitor_firstname == null) {
    $error = "Please insure the first name field is filled in correctly.";
    echo "Form Data Error: " . $error;
    exit();
} else if ($visitor_email == null) {
    $error = "Please insure your email has been entered correctly.";
    echo "Form Data Error: " . $error;
    exit();
} else if ($visitor_lastname == null) {
    $error = "Please insure the last name field is filled in correctly.";
    echo "Form Data Error: " . $error;
    exit();
} else {
    // Connect to DBs
            include "database/database.php";
            $db = Database::getDB();
            if (!is_object($db)){
                $message = "We are experiencing technical difficulties. Please check back later.";
                $message2 = "Error";
            } else {
                // Add the contact info, reason, and comment to the database 
    $query = 'INSERT INTO newslettercontact
                         (newsletterFirstName, newsletterLastName, newsletterEmail)
                      VALUES
                         (:visitor_firstname, :visitor_lastname, :visitor_email)';
    $statement = $db->prepare($query);
    $statement->bindValue(':visitor_firstname', $visitor_firstname);
    $statement->bindValue(':visitor_lastname', $visitor_lastname);
    $statement->bindValue(':visitor_email', $visitor_email);
    $statement->execute();
    $statement->closeCursor();

                    $message = "Thank you, $visitor_firstname, for signing up for our newsletter.";
                    $message2 = "Thank You";
                }
            }

    
?>


<!doctype html>
<html>
    <head>
        <!--
            Timothy Howell Portfolio
            Author: Timothy Howell
            Filename: businessnewsletterthanks.php
        -->
        <meta charset="utf-8" />
        <meta name="description" content="Example Business Newsletter Thank You Page">
        <meta name="author" content="Timothy Howell">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Newsletter</title>
        <link href="css/style1.css" rel="stylesheet" />
    </head>
    <body>
        <header>
            <div class="navigation"> 
                <img src="image/produceOne.jpg" alt="Produce Stand" >
                <p id="businessName">Business Corp. Produce</p>
                <a href="index.html">Home</a>
                <a href="contact.html">Contact Us</a>
                <a href="newsletter.html">E-Newsletter</a>
                <a href="listemployees.php">Employee List</a>
                <a href="login.php">ADMIN</a>
            </div>
        </header>
        <main>
            <div id="mainSection">
                <h1 id="contactHeading"><?php echo $message2; ?></h1>
                <center><?php echo $message; ?></center>
        </main>
        <footer>

        </footer>
    </body>
</html>