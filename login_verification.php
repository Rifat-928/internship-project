<?php
session_start();
include 'db.php';
if ($_SERVER['REQUEST_METHOD']=='POST'){
    $_SESSION['userName'] = $_POST['userName'];
    

    $sql = "SELECT * FROM users
    where userName='$_POST[userName]'
    AND password='$_POST[password]'";

    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);

    $user_id = $row['id'];

    $sql2 = "SELECT * FROM members WHERE id='$user_id'";
    $result2 = mysqli_query($conn, $sql2);
    $member = mysqli_fetch_assoc($result2);
    $role = $member['role'] ?? '';

    if ($row){
        $_SESSION['userType']=$row['userType'];
        $_SESSION['id'] = $member['id'];
        $_SESSION['role']=$role;
        if(strtolower($role)==='student'){
            header("location:student_list.php");
            exit;
        }
        else if(strtolower($role)==='faculty'){
            header("location:faculty_list.php");
            exit;
        }
    }
    else{
        header("location:login.php?error=invalid username or password");
        exit;
    }
}
?>