<?php
if(session_status()===PHP_SESSION_NONE){
    session_start();
}
?>
<body>
    <div class="container-fluid">
        <div class="row text-bg-secondary fs-5 p-2">
            <div class="col text-warning">Student Information Management System</div>
            <div class="col-auto">
                <a href="home.php" class="text-white text-decoration-none me-3">Home</a>
                <a href="services.php" class="text-white text-decoration-none me-3">Services</a>
                <a href="aboutUs.php" class="text-white text-decoration-none me-3">About Us</a>
                <a href="contacts.php" class="text-white text-decoration-none me-3">Contacts</a>
                <?php
                if (isset($_SESSION['userName'])){
                ?>
                <a href="logout.php" class="btn btn-danger">Logout</a>
                <?php } 
                else{?>
                <a href="login.php" class="btn btn-success">Login</a>
                <?php } ?>
            </div>
        </div>
    </div>
</body>