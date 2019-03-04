<?php include '../view/header.php'; ?>
<main>
    <h1>Edit Product</h1>
    <form action="index.php" method="post" id="add_lecturer_form">

        <input type="hidden" name="action" value="update_lecturer">

        <input type="hidden" name="lecturer_id"
               value="<?php echo $lecturer['lecturerID']; ?>">

        <label>department ID:</label>
        <input type="department_id" name="department_id"
               value="<?php echo $lecturer['departmentID']; ?>">
        <br>

        <label>Name:</label>
        <input type="input" name="name"
               value="<?php echo $lecturer['lecturerName']; ?>">
        <br>

        <label>Dob:</label>
        <input type="input" name="dob"
               value="<?php echo $lecturer['lecturerDOB']; ?>">
        <br>

        <label>email:</label>
        <input type="input" name="email"
               value="<?php echo $lecturer['lecturerEmail']; ?>">
        <br>
        
        <label>address:</label>
        <input type="input" name="add"
               value="<?php echo $lecturer['lecturerAdd']; ?>">
        <br>

        <label>&nbsp;</label>
        <input type="submit" value="Save Changes">
        <br>
    </form>
    <p><a href="index.php?action=list_lecturers">View Student List</a></p>

</main>
<?php include '../view/footer.php'; ?>