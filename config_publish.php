<?php 
$config_status = "active";
include('path.php');
include($ROOTPATH . '/app/controllers/published.php');
adminOnly();
$pub = selectAll('result_publish');
//printD($pub[0]);
if (count($pub) == 1){
    header('location:'. $BASE_URL. "view_config.php?config_id=".$pub[0]['id']);
} else{

}
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
    <h5>Configure Result Publish Settings</h5>
    <hr>
    <div class="col-lg-6 card">
        <div class="card-body">
            <form action="config_publish.php" class="needs-validation" method="post" novalidate>
                <div class="form-group">
                    <label for="">Total Students</label>
                    <input type="text" class="form-control" value="<?php echo $total_students; ?>" name="total_students"  required>
                    <div class="invalid-feedback">
                        Total Students is required
                    </div>

                </div>
                <br>
                
                <button class="form-control p-2 btn-primary" type="submit" name="add-btn">Add Configuration</button>
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