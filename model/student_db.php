<?php
function get_students() {
    global $db;
    $query = 'SELECT * FROM students
              ORDER BY studentID';
    $statement = $db->prepare($query);
    $statement->execute();
    $students = $statement->fetchAll();
    $statement->closeCursor();
    return $students;
}

function get_students_by_department($department_id) {
    global $db;
    $query = 'SELECT * FROM students
              WHERE students.departmentID = :department_id
              ORDER BY studentID';
    $statement = $db->prepare($query);
    $statement->bindValue(":department_id", $department_id);
    $statement->execute();
    $students = $statement->fetchAll();
    $statement->closeCursor();
    return $students;
}

function get_student($student_id) {
    global $db;
    $query = 'SELECT * FROM students
              WHERE studentID = :student_id';
    $statement = $db->prepare($query);
    $statement->bindValue(":student_id", $student_id);
    $statement->execute();
    $student = $statement->fetch();
    $statement->closeCursor();
    return $student;
}

function delete_student($student_id) {
    global $db;
    $query = 'DELETE FROM students
              WHERE studentID = :student_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':student_id', $student_id);
    $statement->execute();
    $statement->closeCursor();
}

function add_student($department_id, $studentName, $studentDOB, $studentEmail, $studentAdd) {
    global $db;
    $query = 'INSERT INTO students
                 (departmentID, studentName, studentDOB, studentEmail, studentAdd)
              VALUES
                 (:department_id, :name, :dob, :email, :add)';
    $statement = $db->prepare($query);
    $statement->bindValue(':department_id', $department_id);
    $statement->bindValue(':name', $studentName);
    $statement->bindValue(':dob', $studentDOB);
    $statement->bindValue(':email', $studentEmail);
    $statement->bindValue(':add', $studentAdd);
    $statement->execute();
    $statement->closeCursor();
}

function update_student($student_id, $department_id, $studentName, $studentDOB, $studentEmail, $studentAdd) {
    global $db;
    $query = 'UPDATE students
              SET departmentID = :department_id,
                  studentName = :name,
                  studentDOB = :dob,
                  studentEmail = :email,
                  studentAdd = :add,
               WHERE studentID = :student_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':department_id', $department_id);
   $statement->bindValue(':name', $studentName);
    $statement->bindValue(':dob', $studentDOB);
    $statement->bindValue(':email', $studentEmail);
    $statement->bindValue(':add', $studentAdd);
    $statement->bindValue(':student_id', $student_id);
    $statement->execute();
    $statement->closeCursor();
}
?>