<?php
include 'db.php';

$fileName=$_FILES["upload_dp"]["name"];
$tempName=$_FILES["upload_dp"]["tmp_name"];
$folder="images/".$fileName;
move_uploaded_file($tempName,$folder);

$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];
$email = $_POST["email"];
$phone_number = $_POST["phone_number"];
$gender = $_POST["gender"];
$department = $_POST["department"];
$dob = $_POST["dob"];
$role = $_POST['role'];

$sql = "INSERT INTO members (dp,first_name,last_name,email,phone_number,role,gender,department,dob)
VALUES
('$fileName','$first_name','$last_name','$email','$phone_number','$role','$gender','$department','$dob')";

if(mysqli_query($conn,$sql)){
    if(strtolower($role)=='student'){
        header("location:student_list.php");
    exit;
    }
    else if(strtolower($role)=='faculty'){
        header("location:faculty_list.php");
        exit;
    }
    
}
else{
    echo "Error inserting data";
}
?>