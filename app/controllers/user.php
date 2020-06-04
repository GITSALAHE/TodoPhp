<?php
//initializate 
$data = new User();
$table = 'user';
$errors = array();
$errorl = array();
$fname = '';
$lname = '';
$username = '';
$password = '';
$email = '';

//register
if (isset($_POST['register'])) {
    $errors = validateUser($_POST);

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

    if (count($errors) === 0) {
        unset($_POST['register']);
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $user_id = $data->addUser($table, $_POST);
        $user = $data->selectOne($table, ['idU' => $user_id]);
        loginUser($user);
    } else {
        $username = $_POST['username'];
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $email = $_POST['email'];
    }
}


//update user 
if (isset($_POST['update'])) {
    $errors = validateUpdate($_POST);

    if (!empty($_FILES['photo']['name'])) {
        $image_name = time() . '_' . $_FILES['photo']['name'];
        $destination = "assets/images/" . $image_name;

        $result =   move_uploaded_file($_FILES['photo']['tmp_name'], $destination);

        if ($result) {
            $_POST['photo'] = $image_name;
        } 
        else {
            array_push($errors, "failed to upload image");
        }
    } 
    else {
        array_push($errors, 'Post image requiered');
    }
    if (count($errors) === 0) {
        $id = $_POST['idU'];
        unset($_POST['update'], $_POST['idU']);
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



//login 
function loginUser($user)
{
    $_SESSION['idU'] = $user['idU'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['message'] = 'YOU ARE NOW LOGGED IN';
    $_SESSION['type'] = 'success';
    header('location:index.php');
    exit();
}

//login now 
if (isset($_POST['login'])) {
    $errorl = validateLogin($_POST);
    if (count($errorl) === 0) {
        $user = $data->selectOne($table, ['username' => $_POST['username']]);
        if ($user && password_verify($_POST['password'], $user['password'])) {
            loginUser($user);
        } else {
            array_push($errorl, 'Wrong login');
        }
    }
    $username = $_POST['username'];
}




//validate register form
function validateUser($user)
{
    $errors = array();
    $data = new User;
    //Validate user 
    if (empty($user['firstname'])) {
        array_push($errors, 'firstname is required');
    }
    if (empty($user['lastname'])) {
        array_push($errors, 'lastname is required');
    }
    if (empty($user['username'])) {
        array_push($errors, 'Username is required');
    }
    if (empty($user['email'])) {
        array_push($errors, 'email is required');
    }
    if (empty($user['password'])) {
        array_push($errors, 'password is required');
    }
    $existingMail = $data->selectOne('user', ['email' => $user['email']]);
    if ($existingMail) {
        if ($user['register'] && $existingMail['idU'] != $user['idU']) {
            array_push($errors, 'Email already exists');
        }
    }
    return $errors;
    //end verification
}

function validateUpdate($user)
{
    $errors = array();
    $data = new User;
    //Validate user 
    if (empty($user['firstname'])) {
        array_push($errors, 'firstname is required');
    }
    if (empty($user['lastname'])) {
        array_push($errors, 'lastname is required');
    }
    if (empty($user['username'])) {
        array_push($errors, 'Username is required');
    }
    if (empty($user['email'])) {
        array_push($errors, 'email is required');
    }
    if (empty($user['password'])) {
        array_push($errors, 'password is required');
    }

    return $errors;
    //end verification
}

//validate login 
function validateLogin($user)
{
    $errors = array();
    if (empty($user['username'])) {
        array_push($errors, 'Username is required');
    }

    if (empty($user['password'])) {
        array_push($errors, 'password is required');
    }

    return $errors;
}
