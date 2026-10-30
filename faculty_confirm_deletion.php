<?php
include 'db.php';

$id = $_GET['id'];
include 'header.php';
include 'top_navigation.php';
?>
<body>
    <div class="container mt-5">
        <div class="alert alert-warning">
            <h3>
                Are you sure you want to <strong>Delete Id NO: <?php echo $id; ?></strong>?
            </h3>
            <a href="faculty_delete.php?id=<?php echo $id?>" class="btn btn-danger">Yes</a>
            <a href="faculty_list.php" class="btn btn-success">No</a>
        </div>
    </div>
    <?php
    include 'footer.php';
    ?>
</body>