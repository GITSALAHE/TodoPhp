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
include("app/controllers/task.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task | Gitodo</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<link rel="stylesheet" href="assets/css/dash.css">

<body>
    <?php include('includes/aside.php') ?>
    <div class="container-fluide" style="margin-top: 200px;">
        <div class="col">
            <h1>Edit task <span style="color:#41C4F6;font-family:poppins"><?php echo '' . $text . ''?></span></h1>
            <form action="editTask.php" method="post">
                <input type="hidden" name="idtodo" value="<?php echo $todoid ?>">
                <input type="hidden" name="idTs" value="<?php echo $idTask ?>">
                <div class="form-group">
                    <input type="text" placeholder="Text Task" class="form-control" value="<?php echo $text ?>" name="taskText">
                </div>
                <?php if ($statusTs == 1) : ?>
                    <div class="form-group">
                        <span>Unfinishid it</span>
                    <input type="checkbox" name="done" checked>
                    </div>
                <?php else : ?>
                    <div class="form-group">
                        <span>Finish it</span>
                    <input type="checkbox" name="done">
                    </div>
                <?php endif; ?>
                <input type="submit" class="btn btn-success" style="background-color:#41C4F6" name="editTask">
            </form>
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