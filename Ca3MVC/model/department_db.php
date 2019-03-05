<?php

require('database.php');


function get_departments() {
    global $db;
    $query = 'SELECT * FROM departments
              ORDER BY departmentID';
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement; 
}

function get_department_name($department_id) {
    global $db;
    $query = 'SELECT * FROM departments
              WHERE departmentID = :department_id';    
    $statement = $db->prepare($query);
    $statement->bindValue(':department_id', $department_id);
    $statement->execute();    
    $department = $statement->fetch();
    $statement->closeCursor();    
    $department_name = $department['departmentName'];
    return $department_name;
}

function add_department($name) {
    global $db;
    $query = 'INSERT INTO departments (departmentName)
              VALUES (:name)';
    $statement = $db->prepare($query);
    $statement->bindValue(':name', $name);
    $statement->execute();
    $statement->closeCursor();    
}

function delete_department($department_id) {
    global $db;
    $query = 'DELETE FROM departments
              WHERE departmentID = :department_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':department_id', $department_id);
    $statement->execute();
    $statement->closeCursor();
}
?>