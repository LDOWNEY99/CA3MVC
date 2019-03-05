
        <nav>
            <ul>
                <!-- display links for all departments -->
                <?php foreach($departments as $department) : ?>
                <li>
                    <a href="?department_id=<?php 
                              echo $department['departmentID']; ?>">
                        <?php echo $department['departmentName']; ?>
                    </a>
                </li>
                <?php endforeach; ?>
            </ul>
        </nav>

