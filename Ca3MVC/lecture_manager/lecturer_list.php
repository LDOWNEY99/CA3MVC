<?php include '../view/header.php'; ?>
<main>

    <h1>Product List</h1>

    <aside>
        <!-- display a list of departments -->
        <h2>departments</h2>
        <?php include '../view/department_nav.php'; ?>        
    </aside>

    <section>
        <!-- display a table of lecturers -->
        <h2><?php echo $department_name; ?></h2>
        <table>
            <tr>
                <th>Name</th>
                <th>Dob</th>
                <th>Email</th>
                <th>Address</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($lecturers as $lecturer) : ?>
            <tr>
                <td><?php echo $lecturer['lecturerName']; ?></td>
                <td><?php echo $lecturer['lecturerDOB']; ?></td>
                <td><?php echo $lecturer['lecturerEmail']; ?></td>
                <td><?php echo $lecturer['lecturerAdd']; ?></td>

                <td><form action="." method="post">
                    <input type="hidden" name="action"
                           value="show_edit_form">
                    <input type="hidden" name="lecturer_id"
                           value="<?php echo $lecturer['lecturerID']; ?>">
                    <input type="hidden" name="department_id"
                           value="<?php echo $lecturer['departmentID']; ?>">
                    <input type="submit" value="Edit">
                </form></td>
                <td><form action="." method="post">
                    <input type="hidden" name="action"
                           value="delete_lecturer">
                    <input type="hidden" name="lecturer_id"
                           value="<?php echo $lecturer['lecturerID']; ?>">
                    <input type="hidden" name="department_id"
                           value="<?php echo $lecturer['departmentID']; ?>">
                    <input type="submit" value="Delete">
                </form></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <p><a href="?action=show_add_form">Add Student</a></p>
        <p><a href="?action=list_departments">List departments</a></p>
    </section>

</main>
<?php include '../view/footer.php'; ?>