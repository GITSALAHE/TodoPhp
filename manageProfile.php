<?php
include("app/database/connect.php");
include("app/database/db.php");


$data = new User();
$condition = ['idU' => $_SESSION['idU']];
$res = $data->selectOne('user', $condition);
$image = 'assets/images/' . $res['photo'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>MANAGE PROFILE | GITODO</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<link rel="stylesheet" href="assets/css/dash.css">
<link rel="stylesheet" href="assets/css/profile.css">

<body>
<?php include('includes/header.php') ?>
    <?php include('includes/aside.php') ?>
    <main>
        <div class="container">
            <h1>Profile User</h1>
            <h2>All Your Information Here</h2>
            <div class="service-details">
                <img src="<?php echo $image ?>" alt="realm">
                <div class="service-hover-text">
                    <?php if (isset($res['username']) && isset($res['email'])) : ?>

                        <h3 style="color: #259DE8;font-family:poppins">Username :</h3>
                        <h4 style="color: #000;font-family:poppins"><?php echo $res['username']; ?></h4>
                        <h3 style="color: #259DE8;font-family:poppins">First Name :</h3>
                        <h4 style="color: #000;font-family:poppins"><?php echo $res['firstname']; ?></h4>
                        <h3 style="color: #259DE8;font-family:poppins">Last Name :</h3>
                        <h4 style="color: #000;font-family:poppins"><?php echo $res['lastname']; ?></h4>
                </div>
                <div class="service-white service-text">
                    <p>Email</p>
                    <a href=""><?php echo $res['email']; ?></a>
                </div>
            </div>
            <div>
           <a href="editProfil.php"><button style="background-color: #67DAD5;color:#000" class="btn btn-success" >Edit Profile</button></a> 
        </div>
        </div>
       
    <?php endif ?>

    </main>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
</body>

</html>