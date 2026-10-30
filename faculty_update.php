<?php
session_start();
include 'db.php';
?>
<link rel="stylesheet" href="css/bootstrap.min.css">
<?php
$id=$_GET['id'];
$sql0="SELECT * FROM members WHERE id='$id'";
$result0=mysqli_query($conn,$sql0);
$members=mysqli_fetch_assoc($result0);
$target_role=$members['role'];

if ($_SESSION['role']!=$target_role){
    die("Access Denied <a href='faculty_list.php' class='btn btn-success'>Back</a>");
}

if (strtolower($_SESSION['userType'])=='user'){
    if ($_GET['id']!=$_SESSION['id']){
        die("Access Denied <a href='faculty_list.php' class='btn btn-success'>Back</a>");
    }
}
else{
    if (!($_SESSION['userType']=='admin' || $_SESSION['userType']=='editor')){
        die("Access Denied <a href='faculty_list.php' class='btn btn-success'>Back</a>");
    }
}

include 'header.php';
?>
<title>Update</title>
<?php
include 'top_navigation.php';

include 'db.php';
$row=[];

if(isset ($_GET['id'])){
    $id=$_GET['id'];
    $sql="SELECT * FROM members where id='$id'";
    $result=mysqli_query($conn,$sql);

    if (!$result){
        die('Query Failed');
    }
    else{
        $row=mysqli_fetch_assoc($result);
    }
}

if (isset($_POST['update_info'])){
    $id=$_POST['id'];
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $phone_number = $_POST["phone_number"];
    $gender = $_POST["gender"];
    $department = $_POST["department"];
    $dob = $_POST["dob"];

    $fileName=$_FILES["upload_dp"]["name"];
    $tempName=$_FILES["upload_dp"]["tmp_name"];
    $folder="images/".$fileName;

    if (!empty($fileName)){
        move_uploaded_file($tempName,$folder);
    }
    else{
        $fileName=$row['dp'];
    }

    $sql="UPDATE members set
    dp='$fileName',
    first_name='$first_name',
    last_name='$last_name',
    email='$email',
    phone_number='$phone_number',
    gender='$gender',
    department='$department',
    dob='$dob'
    where id='$id'";

    $result=mysqli_query($conn,$sql);

    if (!$result){
        die("Query failed");
    }
    else{
        header("location:faculty_list.php");
        exit;
    }
}
?>
<div class="container w-50 shadow p-5 mt-4">
    <form action="" method="post" enctype="multipart/form-data">
        <h1 class="d-flex justify-content-center mt-1 text-primary">Faculty Info</h1><br>
        
        <label><b>Id</b></label>
        <input type="hidden" name="id" value="<?php echo $row['id']?>">
        
        <div class="clearfix">
            <label for="upload_dp" class="float-start fs-4 me-5"><b>Profile Picture</b></label>
            <input type="file" name="upload_dp" class="float-middle">
        </div><br>
        
        <label for="first_name" class="form-label fs-4"><b>First Name</b></label>
        <input type="text" name="first_name" class="form-control" value="<?php echo $row['first_name']?>" placeholder="First Name" required><br>

        <label for="last_name" class="form-label fs-4"><b>Last Name</b></label>
        <input type="text" name="last_name" class="form-control" value="<?php echo $row['last_name']?>" placeholder="Last Name" required><br>

        <label for="email" class="form-label fs-4"><b>Email</b></label>
        <input type="email" name="email" class="form-control" value="<?php echo $row['email']?>" placeholder="example@email.com" required><br>

        <label for="phone_number" class="form-label fs-4"><b>Phone Number</b></label>
        <input type="text" name="phone_number" class="form-control" value="<?php echo $row['phone_number']?>" placeholder="+880**********" required><br>

        <label for="gender" class="form-label fs-4"><b>Gender</b></label>
        <div class="container-fluid">
            <div class="row gap-2">
                <div class="col-5 bg-primary-subtle p-2 border border-secondary rounded-2">
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="gender" value="male"<?php if ($row['gender']=='male') echo'checked'?> required>
                        <label class="form-check-label" for="male" >Male</label>
                    </div>
                </div>
                <div class="col-5 ms-auto bg-primary-subtle p-2 border border-secondary rounded-2">
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="gender" value="female"<?php if ($row['gender']=='female') echo'checked'?> required>
                        <label class="form-check-label" for="female">Female</label>
                    </div>
                </div>
            </div>
        </div><br>
        
        <label for="department" class="form-label fs-4"><b>Department</b></label>
        <select class="form-select" name="department" required>
            <option value="cse" <?php if ($row['department']=='cse') echo'selected'?>>CSE</option>
            <option value="eee" <?php if ($row['department']=='eee') echo'selected'?>>EEE</option>
            <option value="civil" <?php if ($row['department']=='civil') echo'selected'?>>Civil</option>
        </select><br>
        <label for="dob" class="form-label fs-4"><b>Date Of Birth</b></label>
        <input type="date" name="dob" value="<?php echo $row['dob']?>" class="form-control" required><br>

        <button type="submit" name="update_info" value="update" class="btn btn-primary col-12">Update</button>
    </form>
</div>
<?php
include 'footer.php';
?>