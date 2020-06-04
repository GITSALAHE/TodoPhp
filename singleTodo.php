<?php
include("app/database/connect.php");
include("app/database/db.php");
$data = new User();
$todo = new Todo();
$task = new Task();
$condition = ['idU' => $_SESSION['idU']];
$res = $data->selectOne('user', $condition);
$image = 'assets/images/' . $res['photo'];
include("app/controllers/todo.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="assets/css/manageTodo.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Task "<?php ?>" | Gitodo</title>
</head>
<link rel="stylesheet" href="assets/css/dash.css">

<body>
    <?php include('includes/aside.php') ?>
  
        <div class="container" style="margin-top: 200px;display:flex;justify-content:center;flex-direction:column;    align-items: center" >
            <div style="color:black">
                <h2>Manage Task of <span style="color: #41C4F6;"><?php echo $nameTodo ?></span> </h2>
            </div>
            <div class="col-md-4">
                <div class="card-box" style="background-color: <?php echo $colorTodo ?> !important">
                    <div class="card-title">
                        
                        <h2 style="color:#fff;"><?php echo $nameTodo ?></h2>
                    </div>
                    <div style="color: white;font-family:poppins">
                        <?php foreach($allTasks as $task) : ?>
                        <p><?php echo $task['taskText'] ?></p>
                        <a href="editTask.php?idtodo=<?php echo $task['idTd']?>&idtask=<?php echo $task['idTs']?>"> <span>edit it ?</span> </a>
                        <a href="editTask.php?idTd=<?php echo $task['idTd']?>&del_idTs=<?php echo $task['idTs']?>"> <span>delete it ?</span> </a>

                        <?php if($task['done'] == 1){
                            echo "<p>Situation : Done</p>";
                                ?>
                            <a href="editTask.php?done=0&idtask=<?php echo $task['idTs']?>&idtodo=<?php echo $task['idTd']?>"> <span>Unfinished it ?</span> </a>
                       <?php }
                       else{
                            echo "<p>Situation : Unfinishid</p>";
                            ?>
                            
                             <a href="editTask.php?done=1&idtask=<?php echo $task['idTs']?>&idtodo=<?php echo $task['idTd']?>"> <span>finish it ?</span> </a>
                              <?php
                        } 
                        ?>
                        <?php endforeach; ?>
                    </div>
                    
                </div>
            </div>
        </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
</body>

</html>