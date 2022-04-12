<?php 
$student_status = "active";
include('path.php');

include($ROOTPATH . '/app/controllers/student.php');


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php include("lender/head.php"); ?>
    <link rel="stylesheet" href="assets/css/sidenav.css">
    <link rel="stylesheet" href="assets/css/user.css">
    <script src="assets/js/sidenav.js"></script>
    <title>Result Management System</title>
</head>
<body id="body-pd">
<?php include("lender/sidebar.php"); ?>
<!--Container Main start-->
<div class="height-100 ">
    <h5>Add Student <?php echo "for class: ".$_SESSION['class_assigned'] ?></h5>
    <hr>
    <div class="col-lg-6 card">
        <div class="card-body">
            <form action="edit_student.php" class="needs-validation" method="post" novalidate>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control" value="<?php echo $name; ?>" name="name"  required>
                    <div class="invalid-feedback">
                        Student Name is required
                    </div>

                </div>
                <br>
                <div class="form-group">
                    <label for="">Date of Birth</label>
                    <input type="date" name="dob" class="form-control" value="<?php echo $dob; ?>" required>
                    <div class="invalid-feedback">
                        Date of Birth is required
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" class="form-control" value="<?php echo $email; ?>" name="email"  required>
                    <div class="invalid-feedback">
                        Student Email is required
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label for="">Student Code</label>
                    <input type="text" class="form-control <?php echo $p_status; ?>" value="<?php echo $code; ?>" name="index_number"  required>
                    <div class="invalid-feedback">
                        Student Code is required
                    </div>
                    <div class="invalid-feedback">
                        <?php echo $p; ?>
                    </div>
                </div>
                <br>
                <input type="hidden" name="class" value="<?php echo $_SESSION['class_assigned']; ?>">

                <button class="form-control p-2 btn-primary" type="submit" name="update_stu">Update Student</button>
            </form>
        </div>
    </div>
</div>

<!--Container Main end-->
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function () {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
        .forEach(function (form) {
        form.addEventListener('submit', function (event) {
            if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
            }

            form.classList.add('was-validated')
        }, false)
        })
    })()
</script>
</body>
</html>