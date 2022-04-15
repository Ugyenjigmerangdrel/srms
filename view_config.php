<?php 
$config_status = "active";
include('path.php');
include($ROOTPATH . '/app/controllers/published.php');
adminOnly();
//$pub = selectOne('result_publish');

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
    <h5>Result Publish Settings</h5>
    <hr>
    <h1>Total Students</h1>
    <form action="view_config.php" class="needs-validation" method="post" novalidate>
        <div class="form-group">
            <label for="">Total Students</label>
            <input type="hidden" class="form-control" value="<?php echo $_GET['config_id']; ?>" name="id"  required>
            <input type="text" class="form-control" value="<?php echo $no; ?>" name="total_students"  required>
            <div class="invalid-feedback">
                Total Students is required
            </div>

        </div>
        <br>
        
        <button class="form-control p-2 btn-primary" type="submit" name="upt-btn">Update Configuration</button>
    </form>
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