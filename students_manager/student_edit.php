<?php include '../view/header.php'; ?>
<main>
    <h1>Edit Product</h1>
    <form action="index.php" method="post" id="add_student_form">

        <input type="hidden" name="action" value="update_student">

        <input type="hidden" name="student_id"
               value="<?php echo $student['studentID']; ?>">

        <label>department ID:</label>
        <input type="department_id" name="department_id"
               value="<?php echo $student['departmentID']; ?>">
        <br>

        <label>Name:</label>
        <input type="input" name="name"
               value="<?php echo $student['studentName']; ?>">
        <br>

        <label>Dob:</label>
        <input type="input" name="dob"
               value="<?php echo $student['studentDOB']; ?>">
        <br>

        <label>email:</label>
        <input type="input" name="email"
               value="<?php echo $student['studentEmail']; ?>">
        <br>
        
        <label>address:</label>
        <input type="input" name="add"
               value="<?php echo $student['studentAdd']; ?>">
        <br>

        <label>&nbsp;</label>
        <input type="submit" value="Save Changes">
        <br>
    </form>
    <p><a href="index.php?action=list_students">View Student List</a></p>

</main>
<?php include '../view/footer.php'; ?>