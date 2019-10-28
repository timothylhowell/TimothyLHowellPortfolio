<?php
    
    $visitor_name = filter_input(INPUT_POST, 'userName');
    $visitor_email = filter_input(INPUT_POST, 'userEmail');
    $visitor_msg = filter_input(INPUT_POST, 'userFeedback');
    /* echo "Fields: " . $visitor_name . $visitor_email . $visitor_msg;  */
    
    // Validate inputs
    if ($visitor_name == null) {
        $error = "Please insure the name field is filled in correctly.";
        echo "Form Data Error: " . $error; 
        exit();
        } else if ($visitor_email == null){
			$error = "Please insure your email has been entered correctly.";
			echo "Form Data Error: " . $error; 
			exit();
		} else if ($visitor_msg == null) {
			$error = "Please leave a comment, any feedback is appreciated.";
			echo "Form Data Error: " . $error; 
			exit();
		} else {
            $dsn = 'mysql:host=localhost;dbname=projectThreeTimothyHowell';
            $username = 'root';
            $password = 'Pa$$w0rd';

            try {
                $db = new PDO($dsn, $username, $password);

            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                echo "DB Error: " . $error_message; 
                exit();
            }

            // Add the contact info and comment to the database  
            $query = 'INSERT INTO portfolioContact
                         (contactName, contactEmail, contactComment)
                      VALUES
                         (:visitor_name, :visitor_email, :visitor_msg)';
            $statement = $db->prepare($query);
            $statement->bindValue(':visitor_name', $visitor_name);
            $statement->bindValue(':visitor_email', $visitor_email);
            $statement->bindValue(':visitor_msg', $visitor_msg);
            $statement->execute();
            $statement->closeCursor();

}

?>


<!doctype html>
<html>
<head>
<!--
    Timothy Howell Portfolio
    Author: Timothy Howell
    Filename: thankyou.php
   -->
   <meta charset="utf-8" />
   <meta name="description" content="Timothy Howell's personal portfolio">
   <meta name="author" content="Timothy Howell">
   <meta name="viewport" content="width=device-width, initial-scale=1" />
   <title>Contact</title>
   <link href="css/style1.css" rel="stylesheet" />
   <link href="css/style3.css" rel="stylesheet" />
   <link href="css/style5.css" rel="stylesheet" />
</head>
<body>
    <header>
                <div class="navigation">
                        <a href="index.html">Home</a>
                        <a href="experience.html">Experience</a>
                        <a href="projects.html">Projects</a>
                        <a href="contact.html">Contact</a>
			<a href="videos.html">Favorite Videos</a>
			<a href="business/index.html">Example Business</a>
                </div>
        </header>
    <main>
    <h1>Thank You</h1>
    <p>Thank you for contacting me.</p>
    </main>
    <footer>
<a href="http://www.github.com"><img src="images/github.png" alt="Github link" ></a>
<a href="http://www.linkedin.com"><img src="images/linkedin.png" alt="LinkedIn link" ></a>
</footer>
</body>
</html>