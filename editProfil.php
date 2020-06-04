<?php
include("app/database/connect.php");
include("app/database/db.php");
include("app/controllers/updateUser.php");


$condition = ['idU' => $_SESSION['idU']];
$res = $data->selectOne('user', $condition);
$image = 'assets/images/' . $res['photo'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php include('includes/header.php'); ?>


    <div class="container" style="margin-top:120px;">
        <div class="row flex-lg-nowrap">


            <div class="col">
                <div class="row">
                    <div class="col mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="e-profile">
                                    <div class="row">
                                        <div class="col-12 col-sm-auto mb-3">
                                            <div class="mx-auto" style="width: 140px;">
                                                <img src="<?php echo $image ?>" alt="" style="width: 100%;">
                                            </div>
                                        </div>

                                        <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                                            <div class="text-center text-sm-left mb-2 mb-sm-0">
                                                <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap" style="text-transform: capitalize;">
                                                    <?php echo $res['firstname'] . ' ' . $res['lastname'] ?></h4>
                                                <p class="mb-0">@<?php echo $res['username'] ?></p>
                                            <form class="form" action="editProfil.php" method="post" enctype="multipart/form-data">
                                                <input type="hidden" name="idU" value="<?php echo $res['idU'] ?>">
                                                    <div class="mt-2">
                                                        <button class="btn btn-primary" type="button" onclick="infile()">
                                                            <input type="file" value="<?php echo $res['photo'] ?>" style="display:none" name="photo" id="fil">
                                                            <i class="fa fa-fw fa-camera"></i>
                                                            <span>Change Photo</span>
                                                        </button>
                                                        <span id="fil-name"></span>
                                                    </div>
                                           
                                            <div class="text-center text-sm-right">
                                                <span class="badge badge-secondary">User Normal</span>
                                            </div>
                                        
                                   
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item"><a href="" class="active nav-link">Settings</a></li>
                                    </ul>
                                    <div class="tab-content pt-3">
                                        <div class="tab-pane active">

                                            <div class="row">
                                                <div class="col">
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label>First Name</label>
                                                                <input class="form-control" type="text" name="firstname" placeholder="John Smith" value="<?php echo $res['firstname'] ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Last Name</label>
                                                                <input class="form-control" type="text" name="lastname" placeholder="John Smith" value="<?php echo $res['lastname'] ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label>Username</label>
                                                                <input class="form-control" type="text" name="username" placeholder="johnny.s" value="<?php echo $res['username'] ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label>Email</label>
                                                                <input class="form-control" type="text" name="email" value="<?php echo $res['email'] ?>" placeholder="user@example.com">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-sm-6 mb-3">
                                                    <div class="mb-2"><b>Change Password</b></div>
                                                   
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label>New Password</label>
                                                                <input class="form-control" name="password" type="password" placeholder="••••••">
                                                            </div>
                                                        </div>
                                                    </div>
                                                   
                                                </div>
                                                <div class="col-12 col-sm-5 offset-sm-1 mb-3">
                                                    <div class="mb-2"><b>Keeping in Touch</b></div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <label>Email Notifications</label>
                                                            <div class="custom-controls-stacked px-2">
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" id="notifications-blog" checked="">
                                                                    <label class="custom-control-label" for="notifications-blog">Blog posts</label>
                                                                </div>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" id="notifications-news" checked="">
                                                                    <label class="custom-control-label" for="notifications-news">Newsletter</label>
                                                                </div>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input" id="notifications-offers" checked="">
                                                                    <label class="custom-control-label" for="notifications-offers">Personal
                                                                        Offers</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col d-flex justify-content-end">
                                                <input type="submit" class="btn btn-primary" name="update" />
                                
                                                </div>
                                            </div>
                                            </form>
                                            </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>

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