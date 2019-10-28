<?php
$error_message = null;
include "database/database.php";
            include "database/employee.php";
            $db = Database::getDB();
            
            if (!is_object($db)){
                $message = "We are experiencing technical difficulties. Please check back later.";
                $message2 = "Error";
            } else {
$message = '';
$employees = EmployeeDB::getEmployees();
            }
?>

<!doctype html>
<html>
    <head>
        <!--
            Timothy Howell Portfolio
            Author: Timothy Howell
            Filename: listemployees.php
        -->
        <meta charset="utf-8" />
        <meta name="description" content="Example Business Employee List Page">
        <meta name="author" content="Timothy Howell">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Employees</title>
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
                <h1 id="contactHeading">Employees</h1>
                <center>
                    <table class="admin">
                        <tr>
                            <th>Name</th>
                            <th>Role</th>

                        </tr>
                        <?php if(!empty($message)) {echo $message;} ?>

<?php if (empty($message)) {foreach ($employees as $employee) : ?>
                            <tr>
                                <td><?php echo $employee->getName() ?></td>
                                <td><?php echo $employee->getRole(); ?></td>
                            </tr>
<?php endforeach;} ?>   
                    </table>
                </center>
            </div>
        </main>
        <footer>

        </footer>
    </body>
</html>