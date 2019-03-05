<?php include '../view/header.php'; ?>
<main>

    <h1>department List</h1>
    <table>
        <tr>
            <th>Name</th>
            <th>&nbsp;</th>
        </tr>
        <?php foreach ($departments as $department) : ?>
        <tr>
            <td><?php echo $department['departmentName']; ?></td>
            <td>
                <form id="delete_student_form"
                      action="index.php" method="post">
                    <input type="hidden" name="action" value="delete_department">
                    <input type="hidden" name="department_id"
                           value="<?php echo $department['departmentID']; ?>">
                    <input type="submit" value="Delete">
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <br />

    <h2>Add department</h2>
    <form id="add_department_form"
          action="index.php" method="post">
        <input type="hidden" name="action" value="add_department">

        <label>Name:</label>
        <input type="input" name="name">
        <input type="submit" value="Add">
    </form>

    <p><a href="index.php?action=list_students">List Products</a></p>

</main>
<?php include '../view/footer.php'; ?>