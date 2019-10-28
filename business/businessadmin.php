<?php
$error_message = false;
// Connect to DBs
include "database/database.php";
            include "database/visitor.php";
            $db = Database::getDB();
            if (!is_object($db)){
                $message = "We are experiencing technical difficulties. Please check back later.";
            } else {
                $message = '';

// Check action on initial load and set it correctly
$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_visitors';
    }
}
if ($action == 'action') {
    $action = 'list_visitors';
}


// List the visitors 
if ($action == 'list_visitors') {
    $employeeID = filter_input(INPUT_GET, 'empID', FILTER_VALIDATE_INT);
    if ($employeeID == NULL || $employeeID == FALSE) {
        $employeeID = 1;
    }
    try {
        $visitors = getVisitors($employeeID);
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
}

// Executed when user clicks delete button
else if ($action == 'delete_visitor') {

    deleteVisitor($visitor_id);
    header("Location: businessadmin.php");
}
            }
?>

<!doctype html>
<html>
    <head>
        <!--
            Timothy Howell Portfolio
            Author: Timothy Howell
            Filename: businessadmin.php
        -->
        <meta charset="utf-8" />
        <meta name="description" content="Example Business Contact Page">
        <meta name="author" content="Timothy Howell">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>ADMIN</title>
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
                <h1 id="contactHeading">ADMIN</h1>
                <center>
                    <?php if (!empty($message)) {echo $message;}  ?>
                    <table class="admin">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Reason</th>
                            <th>Comment</th>
                            <th>Employee</th>
                        </tr>
                        <?php if (empty($message)){ foreach ($visitors as $visitor) : ?>
                            <tr>
                                <td><?php echo $visitor['businessContactName']; ?></td>
                                <td><?php echo $visitor['businessContactEmail']; ?></td>
                                <td><?php echo $visitor['businessContactPhone']; ?></td>
                                <td><?php echo $visitor['businessContactReason']; ?></td>
                                <td><?php echo $visitor['businessContactComment']; ?></td>
                                <td><?php echo $visitor['employeeID']; ?></td>
                                <td><form action="businessadmin.php" method="post">
                                        <input type="hidden" name="action"
                                               value="delete_visitor">
                                        <input type="hidden" name="visitor_id"
                                               value="<?php echo $visitor['businessContactID']; ?>">
                                        <input type="submit" value="Delete">
                                    </form></td>
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