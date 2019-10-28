<?php
$error_message = null;
$visitor_reason = filter_input(INPUT_POST, 'contactReason');
$visitor_name = filter_input(INPUT_POST, 'userName');
$visitor_email = filter_input(INPUT_POST, 'userEmail');
$visitor_phone = filter_input(INPUT_POST, 'custPhone');
$visitor_msg = filter_input(INPUT_POST, 'userFeedback');


// Select a random employee to assign
$employee = mt_rand(1, 20);



// Validate inputs
    if ($visitor_name == null) {
    $error = "Please insure the name field is filled in correctly.";
    echo "Form Data Error: " . $error;
    exit();
} else if ($visitor_email == null) {
    $error = "Please insure your email has been entered correctly.";
    echo "Form Data Error: " . $error;
    exit();
} else if ($visitor_phone == null) {
    $error = "Please enter your phone number.";
    echo "Form Data Error: " . $error;
    exit();
} else if ($visitor_msg == null) {
    $error = "Please leave a comment, any feedback is appreciated.";
    echo "Form Data Error: " . $error;
    exit();
} else {
            
            // Connect to DBs
            include "database/database.php";
            include "database/visitor.php";
            $db = Database::getDB();
            
            if (!is_object($db)){
                $message = "We are experiencing technical difficulties. Please check back later.";
                $message2 = "Error";
            } else {
                $visitor_name = add_visitor($visitor_reason, $visitor_name, $visitor_email, $visitor_phone, $visitor_msg);
                if ($visitor_name == 1) {
                    $message = "Unable to add to database. Please check back later.";
                    $message2 = "Error";
                } else{
                    $message = "Thank you, $visitor_name, for contacting me! I will get back to you shortly.";
                    $message2 = "Thank You";
                }
            }
            
            
}
?>


<!doctype html>
<html>
    <head>
        <!--
            Timothy Howell Portfolio
            Author: Timothy Howell
            Filename: businesscontactthanks.php
        -->
        <meta charset="utf-8" />
        <meta name="description" content="Example Business Contact Thank You Page">
        <meta name="author" content="Timothy Howell">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Contact</title>
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