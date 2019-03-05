<?php
require('../model/database.php');
require('../model/student_db.php');
require('../model/department_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_students';
    }
}



if ($action == 'list_students') 
    {
    // Get the current department ID
    $department_id = filter_input(INPUT_GET, 'department_id', FILTER_VALIDATE_INT);
    if ($department_id == NULL || $department_id == FALSE) 
    {
        $department_id = 1;
    }
    
    // Get student and department data
    $department_name = get_department_name($department_id);
    $departments = get_departments();
    $students = get_students_by_department($department_id);

    // Display the student list
    include('student_list.php');
} 

else if ($action == 'show_edit_form') 
    {
    $student_id = filter_input(INPUT_POST, 'student_id', FILTER_VALIDATE_INT);
    if ($student_id == NULL || $student_id == FALSE) 
        {
        $error = "Missing or incorrect student id.";
        include('../errors/error.php');
    } 
    
    else 
        
        { 
        $student = get_student($student_id);
        include('student_edit.php');
    }
} 


else if ($action == 'update_student') 
    {
    $student_id = filter_input(INPUT_POST, 'student_id', 
            FILTER_VALIDATE_INT);
    $department_id = filter_input(INPUT_POST, 'department_id', 
            FILTER_VALIDATE_INT);
    $studentName = filter_input(INPUT_POST, 'name');
    $studentDOB = filter_input(INPUT_POST, 'dob');
    $studentEmail = filter_input(INPUT_POST, 'email');
    $studentAdd = filter_input(INPUT_POST, 'add');


    // Validate the inputs
    if ($student_id == NULL || $student_id == FALSE || $department_id == NULL || 
            $department_id == FALSE || $studentName == NULL || $studentDOB == NULL || 
            $studentEmail == NULL || $studentAdd == NULL) 
        
        {
        $error = "Invalid student data. Check all fields and try again.";
        include('../errors/error.php');
    } 
    
    else 
        
        {
        update_student($student_id, $department_id, $studentName, $studentDOB, $studentEmail, $studentAdd);

        // Display the Product List page for the current department
        header("Location: .?department_id=$department_id");
    }
} 

else if ($action == 'delete_student') {
    $student_id = filter_input(INPUT_POST, 'student_id', 
            FILTER_VALIDATE_INT);
    $department_id = filter_input(INPUT_POST, 'department_id', 
            FILTER_VALIDATE_INT);
    if ($department_id == NULL || $department_id == FALSE ||
            $student_id == NULL || $student_id == FALSE) 
        
        {
        $error = "Missing or incorrect student id or department id.";
        include('../errors/error.php');
    } 
    
    else 
        
        { 
        delete_student($student_id);
        header("Location: .?department_id=$department_id");
    }
} 

else if ($action == 'show_add_form') 
    
    {
    $departments = get_departments();
    include('student_add.php');
} 

else if ($action == 'add_student') 
    {
    $department_id = filter_input(INPUT_POST, 'department_id', FILTER_VALIDATE_INT);
    $studentName = filter_input(INPUT_POST, 'name');
    $studentDOB = filter_input(INPUT_POST, 'dob');
    $studentEmail = filter_input(INPUT_POST, 'email');
    $studentAdd = filter_input(INPUT_POST, 'add');

    if ($department_id == NULL || $department_id == FALSE || $studentName == NULL || 
            $studentDOB == NULL || $studentEmail == NULL || $studentAdd == NULL) 
        {
        $error = "Invalid student data. Check all fields and try again.";
        include('../errors/error.php');
    } 
    
    else 
        { 
        add_student($department_id, $studentName, $studentDOB, $studentEmail, $studentAdd);
        header("Location: .?department_id=$department_id");
    }
} 



else if ($action == 'list_departments') 
    
    {
    $departments = get_departments();
    include('department_list.php');
} 




else if ($action == 'add_department') {
    $name = filter_input(INPUT_POST, 'name');

    // Validate inputs
    if ($name == NULL) 
        {
        $error = "Invalid department name. Check name and try again.";
        include('../errors/error.php');
    } 
    
    else 
        {
        add_department($name);
        header('Location: .?action=list_departments');  // display the department List page
    }
} 



else if ($action == 'delete_department') 
    {
    $department_id = filter_input(INPUT_POST, 'department_id', 
            FILTER_VALIDATE_INT);
    delete_department($department_id);
    header('Location: .?action=list_departments');      // display the department List page
}
?>