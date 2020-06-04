<?php
session_start();
class User extends DB
{
    public function addUser($table, $data)
    {
        $conn = $this->connect();

        $sql = "INSERT INTO $table SET ";

        $i = 0;
        foreach ($data as $key => $value) {
            if ($i === 0) {
                $sql = $sql . " $key=?";
            } else {
                $sql = $sql . ", $key=?";
            }
            $i++;
        }

        $stmt = $conn->prepare($sql);
        $value = array_values($data);
        $type = str_repeat('s', count($value));
        $stmt->bind_param($type, ...$value);
        $stmt->execute();



        $id = $stmt->insert_id;
        return $id;
    }

    public function selectOne($table, $condition)
    {
        $conn = $this->connect();
        $sql = "SELECT * FROM $table";
        $i = 0;
        foreach ($condition as $key => $value) {
            if ($i === 0) {
                $sql = $sql . " WHERE $key=?";
            } else {
                $sql = $sql . " AND $key=?";
            }
            $i++;
        }
        $sql = $sql . " LIMIT 1";

        $stmt = $conn->prepare($sql);
        $value = array_values($condition);
        $type = str_repeat('s', count($value));
        $stmt->bind_param($type, ...$value);
        $stmt->execute();
        $records = $stmt->get_result()->fetch_assoc();
        return $records;
    }
    public function updateUser($username, $password, $email, $firstname, $lastname, $photo, $id)
    {
        $up = ("UPDATE `user` SET `username` = '$username', `password` = '$password', `email` = '$email', `firstname` = '$firstname', `lastname` = '$lastname', `photo` = '$photo' WHERE `user`.`idU` = $id");
        $result = $this->connect()->query($up);
        return $result;
    }
}

class Todo extends DB
{


    public function addTodo($name, $color, $idU)
    {
        $sql = ("INSERT INTO `todolist`(`name`, `color`, `idU`) VALUES ('$name', '$color', '$idU')");
        $result = $this->connect()->query($sql);
        return $result;
    }

    public function selectAll($table, $condition = [])
    {
        $conn = $this->connect();
        $sql = "SELECT * FROM $table";
        if (empty($condition)) {
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
            return $records;
        } else {
            $i = 0;
            foreach ($condition as $key => $value) {
                if ($i === 0) {
                    $sql = $sql . " WHERE $key=?";
                } else {
                    $sql = $sql . " AND $key=?";
                }
                $i++;
            }
        }
        $stmt = $conn->prepare($sql);
        $value = array_values($condition);
        $type = str_repeat('s', count($value));
        $stmt->bind_param($type, ...$value);
        $stmt->execute();

        $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $records;
    }



    public function selectOne($table, $condition)
    {
        $conn = $this->connect();
        $sql = "SELECT * FROM $table";
        $i = 0;
        foreach ($condition as $key => $value) {
            if ($i === 0) {
                $sql = $sql . " WHERE $key=?";
            } else {
                $sql = $sql . " AND $key=?";
            }
            $i++;
        }
        $sql = $sql . " LIMIT 1";

        $stmt = $conn->prepare($sql);
        $value = array_values($condition);
        $type = str_repeat('s', count($value));
        $stmt->bind_param($type, ...$value);
        $stmt->execute();
        $records = $stmt->get_result()->fetch_assoc();
        return $records;
    }

    public function updateTodo($name, $color, $id)
    {
        $upe = ("UPDATE `todolist` SET `name` = '$name', `color` = '$color' WHERE `todolist`.`idTd` = $id");
        $result = $this->connect()->query($upe);
        return $result;
    }
    public function deleteAllTasks(){
        $query2 =("DELETE FROM `task`");
        $result = $this->connect()->query($query2);
        return $result;
    }
    public function deleteTodo($idTd)
    {   $this->deleteAllTasks();
        $query1 = ("DELETE FROM `todolist` WHERE `todolist`.`idTd` = $idTd;");
        $result = $this->connect()->query($query1);
        return $result;
    }
}

class Task extends DB
{
    public function addTask($taskText, $idTd)
    {
        $upe = ("INSERT INTO `task`(`taskText`, `idTd`) VALUES ('$taskText','$idTd')");
        $result = $this->connect()->query($upe);
        return $result;
    }

    public function updateTask($idTs, $taskText, $done)
    {
        $upe = ("UPDATE `task` SET `taskText`='$taskText',`done`= '$done' WHERE `task`.`idTs` = $idTs");
        $result = $this->connect()->query($upe);
        return $result;
    }
    public function updateStatus($idTs, $done)
    {
        $upe = ("UPDATE `task` SET `done`= '$done' WHERE `task`.`idTs` = $idTs");
        $result = $this->connect()->query($upe);
        return $result;
    }
    public function deleteTask($idTs)
    {
        $upe = ("DELETE FROM `task` WHERE `task`.`idTs` = $idTs");
        $result = $this->connect()->query($upe);
        return $result;
    }
    public function selectTasks($table, $condition = [])
    {
        $conn = $this->connect();
        $sql = "SELECT * FROM $table";
        if (empty($condition)) {
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
            return $records;
        } else {
            $i = 0;
            foreach ($condition as $key => $value) {
                if ($i === 0) {
                    $sql = $sql . " WHERE $key=?";
                } else {
                    $sql = $sql . " AND $key=?";
                }
                $i++;
            }
        }
        $stmt = $conn->prepare($sql);
        $value = array_values($condition);
        $type = str_repeat('s', count($value));
        $stmt->bind_param($type, ...$value);
        $stmt->execute();

        $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $records;
    }
    public function selectTask($table, $condition)
    {
        $conn = $this->connect();
        $sql = "SELECT * FROM $table";
        $i = 0;
        foreach ($condition as $key => $value) {
            if ($i === 0) {
                $sql = $sql . " WHERE $key=?";
            } else {
                $sql = $sql . " AND $key=?";
            }
            $i++;
        }
        $sql = $sql . " LIMIT 1";

        $stmt = $conn->prepare($sql);
        $value = array_values($condition);
        $type = str_repeat('s', count($value));
        $stmt->bind_param($type, ...$value);
        $stmt->execute();
        $records = $stmt->get_result()->fetch_assoc();
        return $records;
    }
}
