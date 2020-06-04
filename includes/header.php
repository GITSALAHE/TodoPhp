<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container">
      <?php  if(isset($_SESSION['idU'])) : ?>
        <a class="navbar-brand" href="index.php"><img src="assets/images/logos.png" style="width: 89px; height: 70px;"><span>Git</span><span style="color: #41C4F6;font-family:poppins;">odo</span></a>
    <?php else : ?>
        <a class="navbar-brand" href="#"><img src="assets/images/logos.png" style="width: 89px; height: 70px;"><span>Git</span><span style="color: #41C4F6;font-family:poppins;">odo</span></a>
    <?php endif; ?>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="home.php">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
               

               
                <div class="dropdown">
                <?php if (isset($_SESSION['idU'])) : ?>
                    <?php  
                    $var = new User();
                    $cond = ['idU' => $_SESSION['idU']];
                    $resu = $var->selectOne('user', $cond);
                ?>
                    <button style="background: #41C4F6;" class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php echo $resu['username']; ?>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="dashboard.php">Dashboard</a>
                        <a class="dropdown-item" href="logout.php">Logout</a>
                    </div>
                </div>
            <?php else : ?>
                <li class="nav-item">
                    <a class="nav-link fa fa-user" href="login-reg.php">Login | Regester</a>
                </li>
            <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>