<?php 
$combo_status = "active";
include('path.php');
include($ROOTPATH . '/app/controllers/subjectcombo.php');
adminOnly();
$classes = selectAll('classes'); 
$subject = selectAll('subject');
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
    <h5>Add Subject Combination</h5>
    <hr>
    <div class="col-lg-6 card">
        <div class="card-body">
            <form action="add_subjectcomb.php" class="needs-validation" method="post" novalidate>
                <div class="form-group">
                    <label for="">Class</label>
                    
                    <select name="class" class="form-control" id="" required>
                    <option value=""></option>
                    <option value="7">7</option>  
                    <option value="8">8</option>  
                    <option value="9">9</option>  
                    <option value="10">10</option>  
                    <option value="11 Arts">11 Arts</option>
                    <option value="11 Com">11 Com</option> 
                    <option value="11 Sci">11 Sci</option>   
                    <option value="12 Arts">12 Arts</option>
                    <option value="12 Com">12 Com</option> 
                    <option value="12 Sci">12 Sci</option>   
                    </select>
                </div>
                <br>
                <div class="form-group">
                    <label for="">Subject</label>
                    
                    <select name="subject" class="form-control" id="" required>
                    <option value=""> </option>
                        <?php foreach ($subject as $key => $mem): ?>
                        <option value="<?php echo $mem['subject']."(".$mem['subject_type'].")"; ?>"><?php echo $mem['subject']."(".$mem['subject_type'].")"; ?></option>
                        <?php endforeach;?>
                    </select>
                    <br>
                </div>
                <button class="form-control p-2 btn-primary" type="submit" name="subject-combo">Add Combination</button>
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