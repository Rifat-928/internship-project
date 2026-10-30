<?php
include 'header.php';
?>
<title>Home Page</title>
<body>
    <?php
    include 'top_navigation.php';
    ?>
    <div class="container">
        <div class="row mt-4">
            <img src="images/image.png" alt="Student Information" height="400px">
        </div>
    </div>
    <div class="container-fluid mt-4 d-flex justify-content-center gap-4">
        <a href="add_members.php" class="btn btn-primary p-2 border-none rounded-3 d-flex justify-content-center">Add Members</a>
        <a href="student_list.php" class="btn btn-white p-2 border border-none rounded-3 d-flex justify-content-center">Student List</a>
        <a href="faculty_list.php" class="btn btn-primary p-2 border-none rounded-3 d-flex justify-content-center">Faculty List</a>
    </div>
    <?php
    include 'footer.php';
    ?>
</body>
</html>