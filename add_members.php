<?php
include 'header.php';
?>
<title>Members Form</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="js/member_form_validation.js"></script>
<body>
    <?php
    include 'top_navigation.php';
    ?>
    <div class="container w-50 shadow p-5 mt-4">
        <form action="insert_members.php" method="post" enctype="multipart/form-data" id="member_form">
            <div class="mb-5">
                <h1 class="d-flex justify-content-center mt-1 text-primary">Add Members</h1>
                <a href="add_members.php" class="btn btn-primary float-end">Refresh</a>
            </div>
            
            
            <div class="clearfix">
                <label for="upload_dp" class="float-start fs-4 me-5"><b>Profile Picture</b></label>
                <input type="file" name="upload_dp" class="float-middle">
            </div><br>
            
            <label for="first_name" class="form-label fs-4"><b>First Name</b></label>
            <input type="text" name="first_name" class="form-control" placeholder="First Name"><br>

            <label for="last_name" class="form-label fs-4"><b>Last Name</b></label>
            <input type="text" name="last_name" class="form-control" placeholder="Last Name"><br>

            <label for="email" class="form-label fs-4"><b>Email</b></label>
            <input type="email" name="email" class="form-control" placeholder="example@email.com"><br>

            <label for="phone_number" class="form-label fs-4"><b>Phone Number</b></label>
            <input type="text" name="phone_number" class="form-control" placeholder="+880**********"><br>

            <label for="role" class="form-label fs-4">Role</label>
            <select class="form-select" name="role">
                <option>Faculty</option>
                <option>Student</option>
            </select><br>

            <label for="gender" class="form-label fs-4"><b>Gender</b></label>
            <div class="container-fluid">
                <div class="row gap-3">
                    <div class="col bg-primary-subtle p-2 border border-secondary rounded-2">
                        <label class="form-check">
                            <input type="radio" class="form-check-input" name="gender" value="male" id="male">
                            Male
                        </label>
                    </div>
                    <div class="col bg-primary-subtle p-2 border border-secondary rounded-2">
                        <label class="form-check">
                            <input type="radio" class="form-check-input" name="gender" value="female" id="female">
                            Female
                        </label>
                    </div>
                </div>
            </div><br>
            
            <label for="department" class="form-label fs-4"><b>Department</b></label>
            <select class="form-select" name="department">
                <option>CSE</option>
                <option>EEE</option>
                <option>Civil</option>
            </select><br>

            <label for="dob" class="form-label fs-4"><b>Date Of Birth</b></label>
            <input type="date" name="dob" class="form-control"><br>

            <div class="d-flex gap-1">
                <button type="submit" class="btn btn-primary col-9">Submit</button>
                <button class="btn btn-success col-3" onclick="window.print()">Print</button>
            </div>
            
        </form>
    </div>
    <?php
    include 'footer.php';
    ?>
</body>