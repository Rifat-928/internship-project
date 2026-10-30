<?php
session_start();
include 'header.php';
?>
<title>Login</title>
<?php
include 'top_navigation.php';
?>
<body>
    <div class="container w-25 mt-5 mb-5 bg-secondary" style="box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px;">
        <h2 class="text-center">Login</h2>
        <form action="login_verification.php" method="post">
            <label class="form-label">Username</label>
            <input type="text" class="form-control" name="userName">

            <label class="form-label">Password</label>
            <input type="password" class="form-control" name="password"> 

            <button type="submit" name="login_button" class="btn btn-primary mt-3 mb-3">Login</button>

            <div class="text-center fs-5">
                <?php
                $error=$_GET['error'] ?? '';
                if($error!="")
                {
                    echo $error;
                }
                ?>
            </div>
        </form>
    </div>
</body>
<?php
include 'footer.php';
?>