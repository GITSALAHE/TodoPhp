<?php

$errortsk = array();
$idTodo = '';
$taskText = '';
//adding task with id todolist 

if(isset($_POST['addtask'])){
    $errortsk = validateTask($_POST);
    if(count($errortsk) === 0){
        $idTodo = $_POST['idTd'];
        $taskText = $_POST['taskText'];
        $result = $task->addTask($taskText, $idTodo);
        header('location:manageTodo.php');
        exit();
    }
}
$text ='';
//Update task with id todolist 
if(isset($_GET['idtask']) && $_GET['idtodo']){
    $todoid = $_GET['idtodo'];
    $onetask = $task->selectTask('task', ['idTs' => $_GET['idtask']]);
    $text = $onetask['taskText'];
    $idTask = $onetask['idTs'];
    $statusTs = $onetask['done'];
}
    if(isset($_POST['editTask'])){
        
        $errortsk = validateTask($_POST);
        if(count($errortsk) === 0){
            $red = $_POST['idtodo'];
            $idTsk = $_POST['idTs'];
            $nom = $_POST['taskText'];
            $_POST['done'] = isset($_POST['done']) ? 1 : 0;
            $done = $_POST['done'];
            $res = $task->updateTask($idTsk, $nom, $done);
           
            header("location:singleTodo.php?showtask=" . $red . "");
            exit();

           
        }
    }


    //Update status 
    if(isset($_GET['done']) && isset($_GET['idtask']) && isset($_GET['idtodo'])){
        $ideTs = $_GET['idtask'];
        $doneit = $_GET['done'];
        $todow = $_GET['idtodo'];
        $count = $task->updateStatus($ideTs, $doneit);
        header("location:singleTodo.php?showtask=" . $todow . "");
        exit();
    }
    //delete task 
    if(isset($_GET['del_idTs']) && isset($_GET['idTd'])){
        $idts = $_GET['del_idTs'];
        $direction = $_GET['idTd'];
        $del = $task->deleteTask($idts);
        header("location:singleTodo.php?showtask=" . $direction . "");
        exit();
    }
    
function validateTask($task){
    $erreur = array();
    if(empty($_POST['taskText'])){
        array_push($erreur, "Task text required");
    }
    return $erreur;
}