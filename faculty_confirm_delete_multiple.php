<?php
session_start();

include 'db.php';
include 'header.php';
include 'top_navigation.php';
if(!isset($_POST['delete']) || empty($_POST['delete'])){
    header("location:faculty_list.php");
    exit;
}
$_SESSION['delete']=$_POST['delete'];
$ids = $_SESSION['delete'] ?? [];
?>
<body>
    <div class="container mt-5">
        <div class="alert alert-warning">
            <p>Total of <strong><?php echo count($ids)?> IDs</strong> were selected: <strong><?php echo implode(', ',$ids)?></strong></p>
            <h3>Are you sure you want to <strong>Delete</strong> all the IDs?</h3>
            <a href="faculty_delete_multiple.php" class="btn btn-danger">Yes</a>
            <a href="faculty_list.php" class="btn btn-success">No</a>
        </div>
    </div>
</body>
<?php
include 'footer.php';
?>