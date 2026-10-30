<?php
session_start();
include 'db.php';
include 'header.php';
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<?php
$username = $_SESSION['userName'] ?? '';
$userType = $_SESSION['userType'] ?? '';
$role = $_SESSION['role'] ?? '';
$id = $_SESSION['id'] ?? '';

if($username==''){
    header("location:student_login.php");
    exit;
}

if (strtolower($role) != 'student'){
    die("Access Denied.For <strong>Student List</strong> Login to <a href='student_login.php' class='btn btn-info' class='btn btn-danger' >Click here</a><br><a href='javascript:history.back()' class='btn btn-secondary'>Back</a>");
}

?>
<title>Students Information</title>
<body>
    <?php
    include 'top_navigation.php';
    ?>
    <div class="container mt-1">
        
        <div class="d-flex flex-wrap justify-content-between align-items-center mb-2 gap-2">
            <h2><b>Students List</b></h2>
            <form method="get" class="d-flex">
                <input type="text" name="search" placeholder="search" class="rounded-start-4 border-end-0">
                <button type="submit" class="btn btn-primary rounded-start-0 rounded-end-4 border-start-0">
                    <img src="images/search.png" height="18px" width="18px">
                </button>
            </form>
            <div class="d-flex gap-1">
                <a href="add_members.php" class="btn btn-secondary">Add Member</a><br>
                <a href="student_list.php" class="btn btn-light">Refresh</a>
            </div>
        </div>

        <div class="table-responsive-md">
            <form action="student_confirm_delete_multiple.php" method="post">
                <table class="table table-bordered table-hover" id="studentTable">
                    <thead class="table-dark">
                        <tr>
                            <?php
                            if ($userType=='admin'){
                            ?>
                            <th></th>
                            <?php } ?>
                            <th>Student ID</th>
                            <th>Profile Picture</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Designation</th>
                            <th>Gender</th>
                            <th>Department</th>
                            <th>Date of Birth</th>
                            <th>Update</th>
                            <?php
                            if ($userType=='admin'){
                            ?>
                            <th>Delete</th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <?php
                    ?>
                    <tbody>
                        <?php
                        include 'db.php';
                        $search = $_GET['search'] ?? '';
                        $sql = "SELECT * FROM members
                        where role='student' and (first_name LIKE '%$search%'
                        OR last_name LIKE '%$search%'
                        OR email LIKE '%$search%'
                        OR phone_number LIKE '%$search%'
                        OR gender LIKE '$search'
                        OR department LIKE '%$search%'
                        OR dob LIKE '$search')";

                        $result=mysqli_query($conn,$sql);
                        while ($row = mysqli_fetch_assoc($result)){
                        ?>
                        <tr>
                            <?php
                            if ($userType=='admin'){
                            ?>
                            <td><input type="checkbox" name="delete[]" value="<?php echo $row['id'] ?>"></td>
                            <?php } ?>
                            <td><?php echo $row['id'] ?></td>
                            <td class="text-center"><img src="images/<?php echo $row['dp']?>" height="100px" width="100px"></td>
                            <td><?php echo $row['first_name']?></td>
                            <td><?php echo $row['last_name']?></td>
                            <td><?php echo $row['email']?></td>
                            <td><?php echo $row['phone_number']?></td>
                            <td><?php echo $row['role']?></td>
                            <td><?php echo strtoupper($row['gender'])?></td>
                            <td><?php echo strtoupper($row['department'])?></td>
                            <td><?php echo $row['dob']?></td>
                            <td>
                                <?php if ($userType == 'admin' || $userType == 'editor' || $row['id'] == $id) { ?>
                                    <a href="student_update.php?id=<?php echo $row['id']; ?>" class="btn btn-success">
                                        Update
                                    </a>
                                <?php } ?>
                            </td>
                            <?php if ($userType == 'admin') { ?>
                                <td>
                                    <a href="#" data-id="<?php echo $row['id'] ?>" class="btn btn-danger deleteBtn">
                                        Delete
                                    </a>
                                </td>
                            <?php } ?>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <div class="clearfix justify-content-between">
                    <?php
                    if ($userType=='admin'){
                    ?>
                    <div class="clearfix">
                        <button type="submit" class="btn btn-danger float-strat col-2">Delete Selected</button>
                        <button class="btn btn-success float-end col-1" onclick="window.print()">Print</button>
                    </div>
                    <?php }
                    else{
                    ?>
                        <button class="btn btn-success float-end col-2" onclick="window.print()">Print</button>
                    <?php } ?>
                </div>
            </form>
        </div>
    </div>
    <script src="js/confirm_delete_student.js"></script>
    <?php
    include 'footer.php';
    ?>
</body>