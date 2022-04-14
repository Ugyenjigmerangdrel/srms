<header class="header" id="header">
    <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
    <div><a href="logout.php" class="text-dark"> <i class='bx bx-log-out nav_icon'></i></a></div>
</header>
<div class="l-navbar" id="nav-bar">
    <nav class="nav">
        <div> <a href="#" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> <span class="nav_logo-name">SRMS 101</span> </a>
            <div class="nav_list"> 
                <a href="dashboard.php" class="nav_link <?php echo $dashboard_status; ?>"> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Dashboard</span> </a> 

                <a href="user_edit.php" class="nav_link <?php echo $user_status; ?>"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">Users</span> </a> 

                <a href="classes_list.php" class="nav_link <?php echo $class_status; ?>"> <i class='bx bx-book-reader nav_icon'></i> <span class="nav_name">Class</span> </a> 

                <a href="subject_list.php" class="nav_link <?php echo $subject_status; ?>"> <i class='bx bx-bookmark nav_icon'></i> <span class="nav_name">Subjects</span> </a> 

                <a href="scombo_list.php" class="nav_link <?php echo $combo_status; ?>"> <i class='bx bx-folder nav_icon'></i> <span class="nav_name">Subject Combination</span> </a> 

                <a href="student_list.php" class="nav_link <?php echo $student_status; ?>"> <i class='bx bx-home nav_icon'></i> <span class="nav_name">Students</span> </a> 

                <a href="result_list.php" class="nav_link <?php echo $result_status; ?>"> <i class='bx bx-bar-chart-alt-2 nav_icon'></i> <span class="nav_name">Result</span> </a> 
            </div>
        </div> 
    </nav>
</div>