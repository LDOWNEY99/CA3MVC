<?php
require('../model/database.php');
require('../model/lecturer_db.php');
require('../model/department_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_lecturers';
    }
}



if ($action == 'list_lecturers') 
    {
    // Get the current department ID
    $department_id = filter_input(INPUT_GET, 'department_id', FILTER_VALIDATE_INT);
    if ($department_id == NULL || $department_id == FALSE) 
    {
        $department_id = 1;
    }
    
    // Get lecturer and department data
    $department_name = get_department_name($department_id);
    $departments = get_departments();
    $lecturers = get_lecturers_by_department($department_id);

    // Display the lecturer list
    include('lecturer_list.php');
} 

else if ($action == 'show_edit_form') 
    {
    $lecturer_id = filter_input(INPUT_POST, 'lecturer_id', FILTER_VALIDATE_INT);
    if ($lecturer_id == NULL || $lecturer_id == FALSE) 
        {
        $error = "Missing or incorrect lecturer id.";
        include('../errors/error.php');
    } 
    
    else 
        
        { 
        $lecturer = get_lecturer($lecturer_id);
        include('lecturer_edit.php');
    }
} 


else if ($action == 'update_lecturer') 
    {
    $lecturer_id = filter_input(INPUT_POST, 'lecturer_id', 
            FILTER_VALIDATE_INT);
    $department_id = filter_input(INPUT_POST, 'department_id', 
            FILTER_VALIDATE_INT);
    $lecturerName = filter_input(INPUT_POST, 'name');
    $lecturerDOB = filter_input(INPUT_POST, 'dob');
    $lecturerEmail = filter_input(INPUT_POST, 'email');
    $lecturerAdd = filter_input(INPUT_POST, 'add');


    // Validate the inputs
    if ($lecturer_id == NULL || $lecturer_id == FALSE || $department_id == NULL || 
            $department_id == FALSE || $lecturerName == NULL || $lecturerDOB == NULL || 
            $lecturerEmail == NULL || $lecturerAdd == NULL) 
        
        {
        $error = "Invalid lecturer data. Check all fields and try again.";
        include('../errors/error.php');
    } 
    
    else 
        
        {
        update_lecturer($lecturer_id, $department_id, $lecturerName, $lecturerDOB, $lecturerEmail, $lecturerAdd);

        // Display the Product List page for the current department
        header("Location: .?department_id=$department_id");
    }
} 

else if ($action == 'delete_lecturer') {
    $lecturer_id = filter_input(INPUT_POST, 'lecturer_id', 
            FILTER_VALIDATE_INT);
    $department_id = filter_input(INPUT_POST, 'department_id', 
            FILTER_VALIDATE_INT);
    if ($department_id == NULL || $department_id == FALSE ||
            $lecturer_id == NULL || $lecturer_id == FALSE) 
        
        {
        $error = "Missing or incorrect lecturer id or department id.";
        include('../errors/error.php');
    } 
    
    else 
        
        { 
        delete_lecturer($lecturer_id);
        header("Location: .?department_id=$department_id");
    }
} 

else if ($action == 'show_add_form') 
    
    {
    $departments = get_departments();
    include('lecturer_add.php');
} 

else if ($action == 'add_lecturer') 
    {
    $department_id = filter_input(INPUT_POST, 'department_id', FILTER_VALIDATE_INT);
    $lecturerName = filter_input(INPUT_POST, 'name');
    $lecturerDOB = filter_input(INPUT_POST, 'dob');
    $lecturerEmail = filter_input(INPUT_POST, 'email');
    $lecturerAdd = filter_input(INPUT_POST, 'add');

    if ($department_id == NULL || $department_id == FALSE || $lecturerName == NULL || 
            $lecturerDOB == NULL || $lecturerEmail == NULL || $lecturerAdd == NULL) 
        {
        $error = "Invalid lecturer data. Check all fields and try again.";
        include('../errors/error.php');
    } 
    
    else 
        { 
        add_lecturer($department_id, $lecturerName, $lecturerDOB, $lecturerEmail, $lecturerAdd);
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