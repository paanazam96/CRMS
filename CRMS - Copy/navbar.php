<!-- Navbar -->
    <style>
        .divider-vertical {
        padding-top: 7px;
        padding-bottom: 7px;
    }
    </style>
    <nav class="navbar fixed-top navbar-expand-lg navbar-light shadow p-3 mb-5" style="background-color: #f0f0ed;">
        <img src="imgs/Untitled-1.png" style="width: 200px; height: 40px;">
        <div class="" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="welcomepage.php">Home</a>
                </li>
                <li class="divider-vertical">&#124;</li>
                <li class="dropdown">
                    <a class="nav-link" href="#" data-toggle="dropdown">
                        List
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="peoplelist.php">List of Key People</a>
                        <a class="dropdown-item" href="eventslist.php">List of Events</a>
                        <a class="dropdown-item" href="plannerlist.php">List of Planners</a>
                    </div>
                </li>
                <li class="divider-vertical">&#124;</li>
                <li class="dropdown">
                    <a class="nav-link" href="#" data-toggle="dropdown">
                        Add
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="peopleadd.php">Add Key People</a>
                        <a class="dropdown-item" href="eventsadd.php">Add Event</a>
                        <a class="dropdown-item" href="detailadd.php">Add Details</a>
                    </div>
                </li>
                <li class="divider-vertical">&#124;</li>
                <li class="nav-item">
                    <a class="nav-link" href="planneradd.php">Schedule Planner</a>
                </li>
            </ul>                
        </div>
        <div class="col-4">
            <center>
                <a href="welcomepage.php"><img src="imgs/crms.png" style="width: 300px; height: 40px;"></a>
            </center>
        </div>
        <div class="">
            Welcome, <?php echo $_SESSION['email'] ?>
        </div>
        <div class="col">
            <a class="btn float-right" href="logout.php" style="color: red;">Logout</a>
        </div>
    </nav> 
<!-- /Navbar -->