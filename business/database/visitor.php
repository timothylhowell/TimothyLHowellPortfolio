<?php
    // Add the visitor to the database  
    function add_visitor ($visitor_reason, $visitor_name, $visitor_email, $visitor_phone, $visitor_msg) {
        global $db;
        // Select a random employee to assign
$employee = mt_rand(1, 20);
        // Add the contact info, reason, employee ID, and comment to the database
    $query = 'INSERT INTO businessContact
                         (businessContactReason, businessContactName, businessContactEmail, businessContactPhone, businessContactComment, employeeID)
                      VALUES
                         (:visitor_reason, :visitor_name, :visitor_email, :visitor_phone, :visitor_msg, :employee_ID)';
    $statement = $db->prepare($query);
    $statement->bindValue(':visitor_reason', $visitor_reason);
    $statement->bindValue(':visitor_name', $visitor_name);
    $statement->bindValue(':visitor_email', $visitor_email);
    $statement->bindValue(':visitor_phone', $visitor_phone);
    $statement->bindValue(':visitor_msg', $visitor_msg);
    $statement->bindValue(':employee_ID', $employee);
    $count = $statement->execute();
    $statement->closeCursor();
    
    if ($count == 1){
            return $visitor_name;
        } else {
            return 1;
        }
    }
    
    // Get Visitors
        function getVisitors($employeeID){
        global $db;

        $query2 = 'SELECT * from businesscontact
                         ORDER BY businessContactName';
        $statement2 = $db->prepare($query2);
        $statement2->bindValue(":employeeID", $employeeID);
        $statement2->execute();
        $visitors = $statement2;
        return $visitors;
    }
    
    // Delete Visitors
    function deleteVisitor($visitor_id){
        global $db;
        $visitor_id = filter_input(INPUT_POST, 'visitor_id', 
                FILTER_VALIDATE_INT);
        $query = 'DELETE FROM businessContact
                  WHERE businessContactID = :visitor_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':visitor_id', $visitor_id);
       $count = $statement->execute();
        $statement->closeCursor();
        
        if ($count > 0){
            return $visitor_id;
        } else {
            return 1;
        }
        
    }
?>