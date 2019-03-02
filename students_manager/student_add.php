<?php include '../view/header.php'; ?>
<main>
    <h1>Add Product</h1>
    <form action="index.php" method="post" id="add_student_form">
        <input type="hidden" name="action" value="add_student">

        <label>department:</label>
        <select name="department_id">
        <?php foreach ( $departments as $department ) : ?>
            <option value="<?php echo $department['departmentID']; ?>">
                <?php echo $department['departmentName']; ?>
            </option>
        <?php endforeach; ?>
        </select>
        <br>

        <label>Student name:</label>
        <input type="input" name="name">
        <br>

        <label>Student DOB:</label>
        <input type="input" name="dob">
        <br>

        <label>Email:</label>
        <input type="input" name="email">
        <br>
        
        <label>Address:</label>
        <input type="input" name="add">
        <br>

        <label>&nbsp;</label>
        <input type="submit" value="Add Student">
        <br>
    </form>
    <p class="last_paragraph">
        <a href="index.php?action=list_students">View Students List</a>
    </p>

</main>
<?php include '../view/footer.php'; ?>