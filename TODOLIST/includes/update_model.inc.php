<?php
require_once "dbh.inc.php";
require_once "update_contr.inc.php";

function update_task(int $task_id, int $user_id){
    global $pdo;
    //as we are considering the security , before we deleteing the task , we need to make sure if the task exists for that certain user or not.
    //query for selecting the task by the user.
    $query = "SELECT * FROM tasks WHERE id = :task_id AND user_id = :user_id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":task_id", $task_id);
    $stmt->bindParam(":user_id", $user_id);
    $stmt->execute();

    $task_status = "complete";
    //dleteting after confirmation
    if(does_user_exist($stmt)){
        $dlt_query = "UPDATE tasks SET task_status = :task_status WHERE id = :task_id";
        $dlt_stmt = $pdo->prepare($dlt_query);
        $dlt_stmt->bindParam(":task_id", $task_id);
        $dlt_stmt->bindParam(":task_status", $task_status);
        $dlt_stmt->execute(); 
        return 1;
    }
}