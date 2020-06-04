<?php
include("app/database/connect.php");
include("app/database/db.php");

$data = new User();
$todo = new Todo();
$condition = ['idU' => $_SESSION['idU']];
$res = $data->selectOne('user', $condition);
$image = 'assets/images/' . $res['photo'];
include("app/controllers/todo.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add TodoList | Gitodo</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <!-- Bootstrap CSS -->
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<link rel="stylesheet" href="assets/css/dash.css">

<body>
    <?php include('includes/aside.php') ?>
    <div class="container" style="margin-top: 100px;display: flex;justify-content:center;flex-direction:column">
    <h1>Add New <span style="color:#41C4F6">Todolist</span> </h1>
        <div class="col" >
       
            <form action="addTodo.php" method="post">
                <div class="form-group">
                    <input type="text" class="form-control" name="name" placeholder="TODO NAME *" />
                </div>
                <div class="form-group">
                    <input class="jscolor" name="color" value="<?php echo $colorAdd ?>">
                </div>
                <input type="submit" class="btn btn-success" style="background:#67DAD5" name="ptodo">
            </form>
        </div>
    </div>

   

    <script src="assets/js/jscolor.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
</body>

</html>