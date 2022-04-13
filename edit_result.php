<?php 
$result_status = "active";
include('path.php');

include($ROOTPATH . '/app/controllers/result.php');

$students = selectAll('student', ['class' => $_SESSION['class_assigned']]);
//printD($students);
$subjects = selectAll('subject_combo', ['class' => substr($_SESSION['class_assigned'], 0, 2)] );


//printD(substr('12sc', 0,2));
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
    <h5>Add Subject</h5>
    <hr>
    <div class="col-lg-6 card">
        <div class="card-body">
            <form action="edit_result.php" class="needs-validation" method="post" novalidate>
                <div class="form-group">
                    <label for="">Student Name</label>
                    <input type="text" name="s_name" class="form-control  <?php echo $p_status; ?>" id="txtCode" value="<?php echo $s_name; ?>" required readonly>
                    <div class="invalid-feedback">
                        Student Name is required
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label for="">Student Code</label>
                    <input type="text" name="s_code" class="form-control  <?php echo $p_status; ?>" id="txtCode" value="<?php echo $s_code; ?>" required readonly>
                    
                    
                </div>
                <br>
               <table class="table table-hover">
                   <tr>
                       <th>Subject</th>
                   
                       <th>Marks</th>
                   </tr>
                   <?php foreach($datas as $data): ?>
                    <tr>
                        <td><?php echo $data['subject'] ?><input type="hidden" value="<?php echo $data['subject'] ?>" name="subject[]"></td>
                        
                        <td><input type="number" class="form-control" name="marks[]" value="<?php echo $data['marks']?>" required>
                        <div class="invalid-feedback">
                        <?php echo $data['subject']?> marks is required
                    </div>
                    </td>
                    </tr>
                    
                    <?php endforeach; ?>
               </table>
               <br>
                <button class="form-control p-2 btn-primary" type="submit" name="update-result">Update</button>
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