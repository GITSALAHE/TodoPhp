<?php
include('app/database/connect.php');
include('app/database/db.php');
include('app/controllers/user.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login or register | Gitodo</title>
</head>

<body>

<?php include('includes/header.php'); ?>

<div class="container login-container">
    <div class="row">
        <div class="col-md-6 login-form-1">
            <h3>Login</h3>
            <div>
                <?php include('validation/formError.php'); ?>

            </div>
            <form action="login-reg.php" method="post">
                <div class="form-group">
                    <input type="text" class="form-control" name="username" placeholder="Your username *" value="<?php echo $username; ?>" />
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Your Password *" value="" />
                </div>
                <div class="form-group">
                    <input type="submit" name="login" class="btnSubmit" />
                </div>
            </form>
        </div>
        <div class="col-md-6 login-form-2">
            <h3>Register</h3>
            <div>
                <?php include('validation/formErro.php'); ?>
            </div>

            <form method="post" action="login-reg.php" enctype="multipart/form-data">
                <input type="hidden" name="idU">
                <div class="form-group">
                    <input type="text" class="form-control" name="firstname" placeholder="Your firstname *" value="<?php echo $fname; ?>" />
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="lastname" placeholder="Your Lastname *" value="<?php echo $lname; ?>" />
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="username" placeholder="username *" value="<?php echo $username; ?>" />
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="email" placeholder="Your Email *" value="<?php echo $email; ?>" />
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Your Password *" value="" />
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="button" onclick="infile()">
                        <input type="file" value="<?php echo $res['photo'] ?>" style="display:none" name="photo" id="fil">
                        <i class="fa fa-fw fa-camera"></i>
                        <span>Change Photo</span>
                    </button>
                </div>


                <div class="form-group">
                    <input type="submit" class="btnSubmit" name="register" />
                </div>

            </form>
        </div>
    </div>
</div>



    <script>
        function infile() {
            document.getElementById('fil').click()

        }
    </script>

</body>

</html>