$(document).ready(function(){
    $("#member_form").submit(function(e){
        e.preventDefault();
        let namePattern=/^[A-Za-z\s]{2,}$/;
        let emailPattern=/^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        let phonePattern=/^\+8801[3-9][0-9]{8}$/;
        let dp=$("input[name='upload_dp']").val();
        let first_name=$("input[name='first_name']").val();
        let last_name=$("input[name='last_name']").val();
        let email=$("input[name='email']").val();
        let phone_number=$("input[name='phone_number']").val();
        let dob=$("input[name='dob']").val();
        let role=$("select[name='role']").val();

        $(".error_msge").remove();

        if (dp===''){
            $("input[name='upload_dp']").after("<br><small class='text-danger error_msge'>Please Insert Your Image</small>");
        }

        if (first_name===''){
            $("input[name='first_name']").after("<small class='text-danger error_msge'>Please Enter Your First Name</small>");
            
        }else if (!namePattern.test(first_name)){
            $("input[name='first_name']").after("<small class='text-danger error_msge'>Please Enter Your Correct First Name</small>");
        }

        if (last_name===''){
            $("input[name='last_name']").after("<small class='text-danger error_msge'>Please Enter Your Last Name</small>");
            
        }else if (!namePattern.test(last_name)){
            $("input[name='last_name']").after("<small class='text-danger error_msge'>Please Enter Your Correct Last Name</small>");
        }

        if (email===''){
            $("input[name='email']").after("<small class='text-danger error_msge'>Please Enter Your email</small>");
            
        }else if (!emailPattern.test(email)){
            $("input[name='email']").after("<small class='text-danger error_msge'>Please Enter a Valid Email</small>");
        }

        if (phone_number===''){
            $("input[name='phone_number']").after("<small class='text-danger error_msge'>Please Enter Your Phone Number</small>");
            
        }else if (!phonePattern.test(phone_number)){
            $("input[name='phone_number']").after("<small class='text-danger error_msge'>Please Enter a valid BD Phone Number</small>");
        }

        if (dob===''){
            $("input[name='dob']").after("<small class='text-danger error_msge'>Please Select Your Date Of Birth</small>")
        }

        if ($("input[name='gender']:checked").length===0){
            $("input[name='gender']").closest(".container-fluid").after("<small class='text-danger error_msge'>Please Select Your Gender</small>")
        }

    });
});