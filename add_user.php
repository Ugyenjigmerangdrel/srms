<?php 
$user_status = "active";
include('path.php');
include($ROOTPATH . '/app/controllers/users.php');
superadminOnly();
$users_d = selectAll('r_users');
$classes = selectAll('classes');
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
    <h5>Add User</h5>
    <hr>
    <div class="col-lg-6 card">
        <div class="card-body">
            <form action="add_user.php" class="needs-validation" method="post" novalidate>
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control" value="<?php echo $name; ?>" name="name" required>
                    <div class="invalid-feedback">
                        Name is required
                    </div>

                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" class="form-control" value="<?php echo $email;?>" name="email" required>
                    <div class="invalid-feedback">
                        Email is required
                    </div>
                    <div class="text-danger">
                        
                        <?php echo $p[0] ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Role</label>
                   <select name="role"  id="" class="form-control" required>
                       <?php if ($role !== '') {?>
                       <option value="<?php echo $role?>" selected><?php echo $role?></option>
                       
                       <option value="Superadmin">Super Admin</option>
                       <option value="Admin">Admin</option>
                       <?php } else {?>
                        <option value="" selected></option>
                       <option value="Superadmin">Super Admin</option>
                       <option value="Admin">Admin</option>
                       <?php } ?>
                   </select>
                    <div class="invalid-feedback">
                        Role is required
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Class Assigned</label>
                    <select name="class_assigned"  id="" class="form-control" required>
                       <?php if ($class_assigned !== '') {?>
                       <option value="<?php echo $class_assigned?>" selected><?php echo $class_assigned?></option>
                       <?php foreach ($classes as $key => $mem): ?>
                        <option value="<?php echo $mem['class_comb']?>"><?php echo $mem['class_comb']?></option>
                        
                        <?php endforeach;?>
                       <?php } else {?>
                        <option value="" selected></option>
                        <?php foreach ($classes as $key => $mem): ?>
                        <option value="<?php echo $mem['class_comb']?>"><?php echo $mem['class_comb']?></option>
                        <?php endforeach;?>
                      
                       <?php } ?>
                   </select>
                    <div class="invalid-feedback">
                        Select A Class
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Contact</label>
                    <input type="text" class="form-control" value="<?php echo $contact ?>" name="contact" required>
                    <div class="invalid-feedback">
                        Contact is required
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" class="form-control" value="" name="password"required>
                    <div class="invalid-feedback">
                        Password is required
                    </div>
                    
                </div>
                <div class="form-group">
                    <label for="">Password Confirmation</label>
                    <input type="password" class="form-control" value="" name="password_conf" required>
                    <div class="invalid-feedback">
                        Password Confirmation is required
                    </div>
                    <div class="text-danger">
                        
                        <?php echo $p[1] ?>
                    </div>
                </div>
                <button class="form-control p-2 btn-primary" type="submit" name="register-btn">Register</button>
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