<?php
include 'db.php';

$search = $_GET['search'] ?? '';

$sql = "SELECT * FROM members
where first_name LIKE '%$search%'
OR last_name LIKE '%$search%'
OR email LIKE '%$search%'
OR phone_number LIKE '%$search%'
OR gender LIKE '$search'
OR department LIKE '%$search%'
OR dob LIKE '$search'";

$result = mysqli_query($conn,$sql);
?>