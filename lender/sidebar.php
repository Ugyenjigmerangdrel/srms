<header class="header" id="header">
    <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
    <div><h6>Logged In As: <span class="text-success"><?php echo $_SESSION['name'];?></span></h6></div>
</header>
<div class="l-navbar" id="nav-bar">
    <nav class="nav">
        <div> <a href="#" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> <span class="nav_logo-name">SRMS 101</span> </a>
            <div class="nav_list"> 
                <a href="dashboard.php" class="nav_link <?php echo $dashboard_status; ?>"> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Dashboard</span> </a> 

                <a href="user_edit.php" class="nav_link <?php echo $user_status; ?>"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">Users</span> </a> 

                <a href="classes_list.php" class="nav_link <?php echo $class_status; ?>"> <i class='bx bx-book-reader nav_icon'></i> <span class="nav_name">Class</span> </a> 

                <a href="subject_list.php" class="nav_link <?php echo $subject_status; ?>"> <i class='bx bx-bookmark nav_icon'></i> <span class="nav_name">Bookmark</span> </a> 

                <a href="#" class="nav_link <?php echo $x; ?>"> <i class='bx bx-folder nav_icon'></i> <span class="nav_name">Files</span> </a> 

                <a href="#" class="nav_link <?php echo $y; ?>"> <i class='bx bx-bar-chart-alt-2 nav_icon'></i> <span class="nav_name">Stats</span> </a> 
            </div>
        </div> <a href="#" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">SignOut</span> </a>
    </nav>
</div>