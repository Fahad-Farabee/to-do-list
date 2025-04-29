<?php
require_once 'dbh.inc.php';

function get_tasks_by_user( int $user_id){
    global $pdo;
    //Query for getting the tasks of the user.
    $query = "SELECT * FROM tasks  WHERE user_id = :user_id ORDER BY due_date ASC ";
    //preparing statement.
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":user_id", $user_id);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;

}