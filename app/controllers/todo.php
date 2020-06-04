<?php
$errors = array();
$name = '';
$color = '';
$idU = '';
$idTd = '';

if (isset($_GET['idTd'])) {
    $selected = $todo->selectOne('todolist', ['idTd' => $_GET['idTd']]);
    $idTd = $selected['idTd'];
    $name = $selected['name'];
    $color = $selected['color'];
}

//add TODOLIST
if (isset($_POST['ptodo'])) {
    $errors = validateTodo($_POST);
    if (count($errors) === 0) {
        $nameAdd = $_POST['name'];
        $colorAdd = '#' . $_POST['color'];
        $idUAdd = $_SESSION['idU'];
        $res = $todo->addTodo($nameAdd, $colorAdd, $idUAdd);
        header('location:manageTodo.php');
        exit();
    }
}


$errorU = array();
//SHOW TODOLIST 
$conditionTodo = ['idU' => $_SESSION['idU']];
$todos = $todo->selectAll('todolist', $conditionTodo);
//SHOW TASK IN TODOLIST CARD 
if (isset($_GET['showtask'])) {

    //Todo setup 
    $idtask = $_GET['showtask'];
    $todoData = $todo->selectOne('todolist', ['idTd' => $idtask]);
    $nameTodo = $todoData['name'];
    $colorTodo = $todoData['color'];

    // showing all tasks of todoList 
    $allTasks = $task->selectTasks('task', ['idTd' => $idtask]);
}

//edit TODOLIST 
if (isset($_POST['updatetodo'])) {
    $errorU = validateTodo($_POST);
    if (count($errorU) === 0) {
        $namedit = $_POST['name'];
        $colordit = '#' . $_POST['color'];
        $idTddit = $_POST['idTd'];
        $resup = $todo->updateTodo($namedit, $colordit, $idTddit);
        header('location:manageTodo.php');
        exit();
    } else {
        $namedit = $_POST['name'];
        $colordit = $_POST['color'];
    }
}

//delete todoliste 
if (isset($_GET['del_td'])) {
    $idTd = $_GET['del_td'];
    $count = $todo->deleteTodo($idTd);
    header('location:manageTodo.php');
    exit();
}
// VALIDATION TODOLISTE
function validateTodo($user)
{
    $errors = array();
    if (empty($user['name'])) {
        array_push($errors, 'name todoList required');
    }
    if ($user['color'] === 'FFFFFF') {
        array_push($errors, 'Please choose another color');
    }
    return $errors;
}
