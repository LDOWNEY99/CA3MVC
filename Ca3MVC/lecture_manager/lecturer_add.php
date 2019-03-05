<?php include '../view/header.php'; ?>
<main>
    <h1>Add Product</h1>
    <form action="index.php" method="post" id="add_lecturer_form">
        <input type="hidden" name="action" value="add_lecturer">

        <label>department:</label>
        <select name="department_id">
        <?php foreach ( $departments as $department ) : ?>
            <option value="<?php echo $department['departmentID']; ?>">
                <?php echo $department['departmentName']; ?>
            </option>
        <?php endforeach; ?>
        </select>
        <br>

        <label>Lecturer name:</label>
        <input type="input" name="name">
        <br>

        <label>Lecturer DOB:</label>
        <input type="input" name="dob">
        <br>

        <label>Email:</label>
        <input type="input" name="email">
        <br>
        
        <label>Address:</label>
        <input type="input" name="add">
        <br>

        <label>&nbsp;</label>
        <input type="submit" value="Add Lecturer">
        <br>
    </form>
    <p class="last_paragraph">
        <a href="index.php?action=list_lecturers">View Lecturers List</a>
    </p>

</main>
<?php include '../view/footer.php'; ?>