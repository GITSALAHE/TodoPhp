<?php
$data = new User();
$table = 'user';
$erreur = array();
$username = '';
$firstname = '';
$lastname = '';
$email = '';
$photo = '';
$id = '';
$password = '';



if (isset($_POST['update'])) {
    $erreur = validateUpdate($_POST);
   
    if (!empty($_FILES['photo']['name'])) {
        $image_name = time() . '_' . $_FILES['photo']['name'];
        $destination = "assets/images/" . $image_name;

        $result =   move_uploaded_file($_FILES['photo']['tmp_name'], $destination);

        if ($result) {
            $_POST['photo'] = $image_name;
        } else {
            array_push($errors, "failed to upload image");
        }
    } else {
        array_push($errors, 'Post image requiered');
    }
    echo "<pre>", print_r($_POST), "</pre>";
    if (count($errors) === 0) {
        $id = $_POST['idU'];
        
       
        $username = $_POST['username'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $photo = $_POST['photo'];

        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $password = $_POST['password'];
        $count = $data->updateUser($username, $password, $email, $firstname, $lastname, $photo, $id);
        $_SESSION['message'] = 'User updated !';
        $_SESSION['type'] = 'success';
        header('location:dashboard.php');
        exit();
    }
}


function validateUpdate($user)
{
    $erreur = array();
    //Validate user 
    if (empty($user['firstname'])) {
        array_push($erreur, 'firstname is required');
    }
    if (empty($user['lastname'])) {
        array_push($erreur, 'lastname is required');
    }
    if (empty($user['username'])) {
        array_push($erreur, 'Username is required');
    }
    if (empty($user['email'])) {
        array_push($erreur, 'email is required');
    }
    if (empty($user['password'])) {
        array_push($erreur, 'password is required');
    }

    return $erreur;
    //end verification
}
