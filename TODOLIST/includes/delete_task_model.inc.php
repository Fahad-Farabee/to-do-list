<?php
require_once "dbh.inc.php";
require_once "delete_task_contr.inc.php";

function delete_task(int $task_id, int $user_id){
    global $pdo;
    //as we are considering the security , before we deleteing the task , we need to make sure if the task exists for that certain user or not.
    //query for selecting the task by the user.
    $query = "SELECT * FROM tasks WHERE id = :task_id AND user_id = :user_id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":task_id", $task_id);
    $stmt->bindParam(":user_id", $user_id);
    $stmt->execute();
    //dleteting after confirmation
    if(does_user_exist($stmt)){
        $dlt_query = "DELETE FROM tasks WHERE id = :task_id";
        $dlt_stmt = $pdo->prepare($dlt_query);
        $dlt_stmt->bindParam(":task_id", $task_id);
        $dlt_stmt->execute(); 
        return 1;
    }
}