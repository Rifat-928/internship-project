<?php
session_start();
if ($_SESSION['userType']=='editor' || $_SESSION['userType']=='user'){
    die("Access Denied");
}
include 'db.php';
if (isset($_GET['id'])){
    $id=$_GET['id'];
}

$sql="SELECT dp FROM members where id='$id'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$image=$row['dp'];

if (!empty($image) && file_exists('images/'.$image)){
    unlink('images/'.$image);
}
$sql2="DELETE FROM members where id='$id'";
$result2=mysqli_query($conn,$sql2);
if (!$result2){
    die("Query Failed");
}
else{
    header("location:faculty_list.php");
}
?>