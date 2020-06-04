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
</head>

<body>
    <form action="editTask.php" method="post">
        <input type="hidden" name="idtodo" value="<?php echo $todoid ?>">
        <input type="hidden" name="idTs" value="<?php echo $idTask ?>">
        <input type="text" placeholder="Text Task" value="<?php echo $text ?>" name="taskText">
        <?php if ($statusTs == 1) : ?>
            <input type="checkbox" name="done" checked>
        <?php else : ?>
            <input type="checkbox" name="done">
        <?php endif; ?>
        <input type="submit" name="editTask">
    </form>


</body>

</html>