<?php
     class Employee {

    private $id;
    private $name;
    private $role;

    public function __construct($id, $name, $role) {
        $this->id = $id;
        $this->name = $name;
        $this->role = $role;
    }

    public function getID() {
        return $this->id;
    }

    public function setID($value) {
        $this->id = $value;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($value) {
        $this->name = $value;
    }

    public function getRole() {
        return $this->role;
    }

    public function setRole($value) {
        $this->role = $value;
    }

}

class EmployeeDB {

    public static function getEmployees() {
        global $db;
        $query = 'SELECT * FROM employeeslist
                  ORDER BY employeeID';
        $statement = $db->prepare($query);
        $statement->execute();

        $employees = array();
        foreach ($statement as $row) {
            $employee = new Employee($row['employeeID'], $row['employeeName'], $row['employeeRole']);
            $employees[] = $employee;
        }
        return $employees;
    }

}
?>