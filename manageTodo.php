<?php
include("app/database/connect.php");
include("app/database/db.php");
$myId = '';
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
    <title>Manage TODO | Gitodo</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<link rel="stylesheet" href="assets/css/dash.css">

<body>
    <?php include('includes/aside.php') ?>


    <div class="container" style="margin-top: 200px;">
        <div style="display:flex;justify-content:center;color:black">
            <h2>Manage <span style="color: #41C4F6;">TodoLists</span> </h2>
        </div>

        <div class="row">


            <?php foreach ($todos as $detail) : ?>
                <?php $conditionTask = ['idTd' => $detail['idTd']]; ?>
                <div class="col-md-4">
                    <div class="card-box" style="background-color: <?php echo $detail['color'] ?> !important">
                        <div class="card-title">
                            <h2 style="color:#fff;"><?php echo $detail['name'] ?></h2>
                        </div>
                        <div>
                            <div>


                            </div>
                            <a href="singleTodo.php?showtask=<?php echo $detail['idTd'] ?>" class="btn btn-primary a-btn-slide-text">
                                <span class="glyphicon glyphicon-add" aria-hidden="true"></span>
                                <span><strong>show Tasks</strong></span>
                            </a>
                            <a href="addTask.php?idTd=<?php echo $detail['idTd'] ?>" class="btn btn-primary a-btn-slide-text">
                                <span class="glyphicon glyphicon-add" aria-hidden="true"></span>
                                <span><strong>add Task</strong></span>
                            </a>
                            <a href="editTodo.php?idTd=<?php echo $detail['idTd'] ?>" class="btn btn-primary a-btn-slide-text">
                                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                <span><strong>Edit</strong></span>
                            </a>
                            <a href="editTodo.php?del_td=<?php echo $detail['idTd'] ?>" class="btn btn-primary a-btn-slide-text">
                                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                <span><strong>Delete</strong></span>
                            </a>
                        </div>

                    </div>
                </div>
            <?php endforeach; ?>


        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
    <script>
        if (document.getElementById('name').style.color === 'white' || document.getElementById('name').style.color === '#FFF' || document.getElementById('name').style.color === '#FFFFF') {
            var des = document.getElementById('name').value;
            var res = des.style.color === 'black';

        }
    </script>
</body>

</html>