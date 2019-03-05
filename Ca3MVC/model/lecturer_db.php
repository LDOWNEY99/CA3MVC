<?php
function get_lecturers() {
    global $db;
    $query = 'SELECT * FROM lecturers
              ORDER BY lecturerID';
    $statement = $db->prepare($query);
    $statement->execute();
    $lecturers = $statement->fetchAll();
    $statement->closeCursor();
    return $lecturers;
}

function get_lecturers_by_department($department_id) {
    global $db;
    $query = 'SELECT * FROM lecturers
              WHERE lecturers.departmentID = :department_id
              ORDER BY lecturerID';
    $statement = $db->prepare($query);
    $statement->bindValue(":department_id", $department_id);
    $statement->execute();
    $lecturers = $statement->fetchAll();
    $statement->closeCursor();
    return $lecturers;
}

function get_lecturer($lecturer_id) {
    global $db;
    $query = 'SELECT * FROM lecturers
              WHERE lecturerID = :lecturer_id';
    $statement = $db->prepare($query);
    $statement->bindValue(":lecturer_id", $lecturer_id);
    $statement->execute();
    $lecturer = $statement->fetch();
    $statement->closeCursor();
    return $lecturer;
}

function delete_lecturer($lecturer_id) {
    global $db;
    $query = 'DELETE FROM lecturers
              WHERE lecturerID = :lecturer_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':lecturer_id', $lecturer_id);
    $statement->execute();
    $statement->closeCursor();
}

function add_lecturer($department_id, $lecturerName, $lecturerDOB, $lecturerEmail, $lecturerAdd) {
    global $db;
    $query = 'INSERT INTO lecturers
                 (departmentID, lecturerName, lecturerDOB, lecturerEmail, lecturerAdd)
              VALUES
                 (:department_id, :name, :dob, :email, :add)';
    $statement = $db->prepare($query);
    $statement->bindValue(':department_id', $department_id);
    $statement->bindValue(':name', $lecturerName);
    $statement->bindValue(':dob', $lecturerDOB);
    $statement->bindValue(':email', $lecturerEmail);
    $statement->bindValue(':add', $lecturerAdd);
    $statement->execute();
    $statement->closeCursor();
}

function update_lecturer($lecturer_id, $department_id, $lecturerName, $lecturerDOB, $lecturerEmail, $lecturerAdd) {
    global $db;
    $query = 'UPDATE lecturers
              SET departmentID = :department_id,
                  lecturerName = :name,
                  lecturerDOB = :dob,
                  lecturerEmail = :email,
                  lecturerAdd = :add,
               WHERE lecturerID = :lecturer_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':department_id', $department_id);
   $statement->bindValue(':name', $lecturerName);
    $statement->bindValue(':dob', $lecturerDOB);
    $statement->bindValue(':email', $lecturerEmail);
    $statement->bindValue(':add', $lecturerAdd);
    $statement->bindValue(':lecturer_id', $lecturer_id);
    $statement->execute();
    $statement->closeCursor();
}
?>