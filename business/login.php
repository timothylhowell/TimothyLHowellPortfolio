<?php
$action = filter_input (INPUT_POST, 'action');
$username = filter_input(INPUT_POST, 'username');
$password = filter_input(INPUT_POST, 'password');

if($action == NULL){
    
} else if (empty($username) || empty($password)) {
    header ("Location: login.php");
} else {
    header('Location: businessadmin.php');
}

?>


<html>
    <head>
        <!--
            Timothy Howell Portfolio
            Author: Timothy Howell
            Filename: login.html
        -->
        <meta charset="utf-8" />
        <meta name="description" content="Example Business Admin Login Page">
        <meta name="author" content="Timothy Howell">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Login</title>
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
                <h1 id="loginHeading">Admin Login</h1>
                <form id="login" method="post" action="businessadmin.php" >

                    <fieldset id="custInfo">

                        <div class="formRow">
                            <label for="username"> Username</label>
                            <input name="username" id="username" type="text" placeholder="Username" required />
                        </div>

                        <div class="formRow">
                            <label for="password">Password</label>
                            <input name="password" id="password" type="text" placeholder="Password"  required/>
                            <input type="hidden" name="action" value="action" />
                        </div>
                    </fieldset>
                    <div id="buttons">
                        <input type="submit" value="Login">
                    </div>
                </form>
            </div>
        </main>
        <footer>
        </footer>
    </body>
</html>