<?php 
$user_status = "active";
include('path.php');
include($ROOTPATH . '/app/controllers/class.php');

$users_d = selectAll('r_users');
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
    <h5>Add Class</h5>
    <hr>
    <div class="col-lg-6 card">
        <div class="card-body">
            <form action="add_class.php" class="needs-validation" method="post" novalidate>
                <div class="form-group">
                    <label for="">Class Name</label>
                    <input type="text" class="form-control" value="<?php echo $class_name; ?>" name="class_name" placeholder="eg.Eight, Nine" required>
                    <div class="invalid-feedback">
                        Class Name is required
                    </div>

                </div>
                <br>
                <div class="form-group">
                    <label for="">Class(Number Format)</label>
                    <input type="text" class="form-control" value="<?php echo $number_name;?>" name="number_name" placeholder="eg.11, 12" required>
                    <div class="invalid-feedback">
                        Class(Number Format) is required
                    </div>
                   
                </div>
                <br>
                <div class="form-group">
                    <label for="">Stream</label>
                    <select name="stream" class="form-control"  id="" required>
                        <option value=""></option>
                        <option value="none">None</option>
                        <option value="Arts">Arts</option>
                        <option value="Commmerce">Commerce</option>
                        <option value="Science">Science</option>
                    </select>
                    <div class="invalid-feedback">
                        Select a Stream
                    </div>

                </div>
               <br>
                <div class="form-group">
                    <label for="">Section</label>
                    <input type="text" class="form-control" value="<?php echo $section; ?>" name="section" required>
                    <div class="invalid-feedback">
                        Section is required
                    </div>

                </div>
               <br>
                <button class="form-control p-2 btn-primary" type="submit" name="add-btn">Add Class</button>
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